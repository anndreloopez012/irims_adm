<?php 
// VALIDATION INSERT UPDATE DELETE
if ( isset($_GET["validaciones"]) && !empty($_GET["validaciones"]) ){
    require_once '../../interbase/tmfAdm.php';

    $insert = 1;
    $update = 2;
    $delete = 3;
    $replace = 4;

    $rs = pg_query("SELECT count(*)FROM  ctg_modulos_l");
        if ($row = pg_fetch_row($rs)) {
            $idRow = trim($row[0]);
        }
    $idMax = $idRow+2;
    $id = isset( $_POST["id"]  )? $_POST["id"]  :'';
    $code = isset( $_POST["code"]  )? $_POST["code"]  :'';
    $description = isset( $_POST["description"]  )? $_POST["description"]  :'';
    $comments = isset( $_POST["comments"]  )? $_POST["comments"]  :'';
    $status = 1;
    $fechaIng = date('Y-m-d H:i:s');
    $usuario = "user";
    $order = $idRow+1;
    $link = isset( $_POST["rtu"]  )? $_POST["rtu"]  :'';
    $btn = isset( $_POST["btn"]  )? $_POST["btn"]  :'';
    $admUser = 1;

    $strTipoValidacion = isset($_REQUEST["validaciones"] )?$_REQUEST["validaciones"] :'';

        if ( $strTipoValidacion == "insert" ){

            if (empty($id)) {
                header('Content-Type: application/json');
                $var_consulta="SELECT system_06010101($insert,'$description','$btn','$link',$status,'$usuario','$fechaIng',$order,$admUser,'$comments',$code,$idMax)";
                $val = 1;
                if (pg_query($rmfAdm, $var_consulta)) {
                    $arrInfo['status'] = $val;
                } else {
                    $arrInfo['status'] = 0;
                    $arrInfo['error'] = $var_consulta;
                }
            } else {
                header('Content-Type: application/json');
                $var_consulta="SELECT system_06010101($update,'$description','$btn','$link',$status,'$usuario','$fechaIng',$order,$admUser,'$comments',$code,$idMax)";
                $val = 1;
                if (pg_query($rmfAdm, $var_consulta)) {
                    $arrInfo['status'] = $val;
                } else {
                    $arrInfo['status'] = 0;
                    $arrInfo['error'] = $var_consulta;
                }
            }
            //print_r ($var_consulta);
            print json_encode($arrInfo);
            die();

        }

        else if ( $strTipoValidacion == "replace" ){
            header('Content-Type: application/json');
            $var_consulta="SELECT system_06010101($replace,'$description','$btn','$link',$status,'$usuario','$fechaIng',$order,$admUser,'$comments',$code,$idMax)";
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
            $var_consulta="SELECT system_06010101($delete,'$description','$btn','$link',$status,'$usuario','$fechaIng',$order,$admUser,'$comments',$code,$idMax)";
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
                
                $var_consulta ="SELECT * FROM ctg_modulos_l WHERE id  = $intData";  
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
$var_consulta= "SELECT * FROM ctg_modulos_l ORDER BY id ";

$qTMP = pg_query($rmfAdm, $var_consulta);
while ( $rTMP = pg_fetch_assoc($qTMP) ){

    $arrTypeProduct[$rTMP["id"]]["id"]                 = $rTMP["id"];
    $arrTypeProduct[$rTMP["id"]]["adm_name"]                 = $rTMP["adm_name"];
    $arrTypeProduct[$rTMP["id"]]["adm_status"]                 = $rTMP["adm_status"];
    $arrTypeProduct[$rTMP["id"]]["ctg_obs"]                 = $rTMP["ctg_obs"];
    $arrTypeProduct[$rTMP["id"]]["adm_btn"]                 = $rTMP["adm_btn"];
    $arrTypeProduct[$rTMP["id"]]["adm_rtu"]                 = $rTMP["adm_rtu"];

    
}
pg_free_result($qTMP);
?>
<?php 
    //BOTONES GENERALES DE FORMULARIO
    require_once '../../interbase/tmfAdm.php';
    $arrTypeMSM= array();
    $var_consulta= "SELECT * FROM ctg_texto_campos ORDER BY ctg_id_mod";

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

