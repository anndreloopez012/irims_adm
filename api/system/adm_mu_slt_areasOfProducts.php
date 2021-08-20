<?php 
// VALIDATION INSERT UPDATE DELETE
if ( isset($_GET["validaciones"]) && !empty($_GET["validaciones"]) ){
    require_once '../../interbase/tmfAdm.php';

    $insert = 1;
    $update = 2;
    $delete = 3;
    $replace = 4;

    $rs = pg_query("SELECT count(*)FROM ctg_areas");
        if ($row = pg_fetch_row($rs)) {
            $idRow = trim($row[0]);
        }
    $id = $idRow+1;
    $code = isset( $_POST["code"]  )? $_POST["code"]  :'';
    $description = isset( $_POST["description"]  )? $_POST["description"]  :'';
    $acronym = isset( $_POST["acronym"]  )? $_POST["acronym"]  :0;
    $comments = isset( $_POST["comments"]  )? $_POST["comments"]  :'';
    $status = 1;
    $fechaIng = date('Y-m-d H:i:s');
    $usuario = "";

    $strTipoValidacion = isset($_REQUEST["validaciones"] )?$_REQUEST["validaciones"] :'';

        if ( $strTipoValidacion == "insert" ){
            header('Content-Type: application/json');
            $arrInfo = array();
            if (empty($id)) {
                $var_consulta="SELECT system_06011000($insert,'$code','$description','$comments','$acronym','$status','$usuario','$fechaIng')";
                $val = 1;
                if (pg_query($rmfAdm, $var_consulta)) {
                    $arrInfo['status'] = $val;
                } else {
                    $arrInfo['status'] = 0;
                    $arrInfo['error'] = $var_consulta;
                }
            } else {
                $var_consulta="SELECT system_06011000($update,'$code','$description','$comments','$acronym','$status','$usuario','$fechaIng')";
                $val = 1;
                if (pg_query($rmfAdm, $var_consulta)) {
                    $arrInfo['status'] = $val;
                } else {
                    $arrInfo['status'] = 0;
                    $arrInfo['error'] = $var_consulta;
                }
            }
            print json_encode($arrInfo);
            die();
        }

        else if ( $strTipoValidacion == "replace" ){
            header('Content-Type: application/json');
            $var_consulta="SELECT system_06011000($replace,'$code','$description','$comments','$acronym','$status','$usuario','$fechaIng')";
            $val = 1;
            if (pg_query($rmfAdm, $var_consulta)) {
                $arrInfo['status'] = $val;
            } else {
                $arrInfo['status'] = 0;
                $arrInfo['error'] = $var_consulta;
            }
            print json_encode($arrInfo);
             die();
        }

        else if ( $strTipoValidacion == "delete" ){
            header('Content-Type: application/json');
            $var_consulta="SELECT system_06011000($delete,'$code','$description','$comments','$acronym','$status','$usuario','$fechaIng')";
            $val = 1;
            if (pg_query($rmfAdm, $var_consulta)) {
                $arrInfo['status'] = $val;
            } else {
                $arrInfo['status'] = 0;
                $arrInfo['error'] = $var_consulta;
            }
            print json_encode($arrInfo);
            die();
        }

        else if ( $strTipoValidacion == "validacion_code" ){
        
            $intData = isset($_GET["code"]) ? intval($_GET["code"]) : "";
            
            $boolExiste = false;
            
            if ($intData){
                
                $var_consulta ="SELECT * FROM ctg_areas WHERE ctg_are_id  = '$intData'";  
                    if (pg_query($rmfAdm, $var_consulta)) {
                        $boolExiste = true;
                    } else {
                        echo "Error: " . $var_consulta . "<br>" ;
                    }
            }
            
            $strTextoFinal = $boolExiste ? "Y" : "N";
            print $strTextoFinal;
            die();
            
        }
      
    die();   
}
?>
<?php 
require_once '../../interbase/tmfAdm.php';
$arrTypeProduct= array();
$var_consulta= "SELECT * FROM ctg_areas ORDER BY ctg_are_id";

$qTMP = pg_query($rmfAdm, $var_consulta);
while ( $rTMP = pg_fetch_assoc($qTMP) ){

    $arrTypeProduct[$rTMP["ctg_are_id"]]["ctg_id"]                 = $rTMP["ctg_id"];
    $arrTypeProduct[$rTMP["ctg_are_id"]]["ctg_are_id"]                 = $rTMP["ctg_are_id"];
    $arrTypeProduct[$rTMP["ctg_are_id"]]["ctg_are_desc"]                 = $rTMP["ctg_are_desc"];
    $arrTypeProduct[$rTMP["ctg_are_id"]]["ctg_are_obs"]                 = $rTMP["ctg_are_obs"];
    $arrTypeProduct[$rTMP["ctg_are_id"]]["ctg_are_siglas"]                 = $rTMP["ctg_are_siglas"];
    
}
pg_free_result($qTMP);
?>

<?php 
    //BOTONES GENERALES DE FORMULARIO
    require_once '../../interbase/tmfAdm.php';
    $arrTypeMSM= array();
    $var_consulta= "SELECT * FROM ctg_texto_campos";

    $qTMP = pg_query($rmfAdm, $var_consulta);
    while ( $rTMP = pg_fetch_assoc($qTMP) ){

        $arrTypeMSM[$rTMP["id"]]["id"]                 = $rTMP["id"];
        $arrTypeMSM[$rTMP["id"]]["ctg_tipo"]                 = $rTMP["ctg_tipo"];
        $arrTypeMSM[$rTMP["id"]]["ctg_variable"]                 = $rTMP["ctg_variable"];
        $arrTypeMSM[$rTMP["id"]]["ctg_name_l"]                 = $rTMP["ctg_name_l"];
        $arrTypeMSM[$rTMP["id"]]["ctg_name_ll"]                 = $rTMP["ctg_name_ll"];
        $arrTypeMSM[$rTMP["id"]]["ctg_name_lll"]                 = $rTMP["ctg_name_lll"];
        $arrTypeMSM[$rTMP["id"]]["ctg_obs"]                 = $rTMP["ctg_obs"];
        $arrTypeMSM[$rTMP["id"]]["ctg_id_mod"]                 = $rTMP["ctg_id_mod"];
        
    }
    pg_free_result($qTMP);
    
?>
 <?php
    if ( is_array($arrTypeMSM) && ( count($arrTypeMSM)>0 ) ){
        reset($arrTypeMSM);
    foreach( $arrTypeMSM as $rTMP['key'] => $rTMP['value'] ){

        //$_a.$rTMP["value"]['ctg_name_l'] = $rTMP["value"]['ctg_name_l'];

    }
        }
?> 

