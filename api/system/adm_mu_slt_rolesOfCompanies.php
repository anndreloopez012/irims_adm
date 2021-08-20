<?php 
// VALIDATION INSERT UPDATE DELETE
if ( isset($_GET["validaciones"]) && !empty($_GET["validaciones"]) ){
    require_once '../../interbase/tmfAdm.php';

    $insert = 1;
    $update = 2;
    $delete = 3;
    $replace = 4;

    
    $rolId = isset( $_POST["code"]  )? $_POST["code"]  :'';
    $description = isset( $_POST["description"]  )? $_POST["description"]  :'';
    $comments = isset( $_POST["comments"]  )? $_POST["comments"]  :'';

    $applicant = isset($POST['radio{applicant]'])?$POST['radio{applicant]']:0;
    $Representatives = isset($POST['radio{Representatives]'])?$POST['radio{Representatives]']:0;
    $Distributors = isset($POST['radio{Distributors]'])?$POST['radio{Distributors]']:0;
    $Warehouses = isset($POST['radio{Warehouses]'])?$POST['radio{Warehouses]']:0;
    $Providers = isset($POST['radio{Providers]'])?$POST['radio{Providers]']:0;
    $Packing = isset($POST['radio{Packing]'])?$POST['radio{Packing]']:0;
    $Owners = isset($POST['radio{Owners]'])?$POST['radio{Owners]']:0;
    $Importers = isset($POST['radio{Importers]'])?$POST['radio{Importers]']:0;
    $Conditioner = isset($POST['radio{Conditioner]'])?$POST['radio{Conditioner]']:0;
    $Manufacturers = isset($POST['radio{Manufacturers]'])?$POST['radio{Manufacturers]']:0;
    $Formulator = isset($POST['radio{Formulator]'])?$POST['radio{Formulator]']:0;
    $Sender = isset($POST['radio{Sender]'])?$POST['radio{Sender]']:0;

    $status = 1;
    $fechaIng = date('Y-m-d');
    $usuario = "user";

    $rs = pg_query("SELECT count(*)FROM ctg_rol_empresas");
        if ($row = pg_fetch_row($rs)) {
            $idRow = trim($row[0]);
        }

    $id= $idRow;
    $idMax = $idRow+1;
    
    $strTipoValidacion = isset($_REQUEST["validaciones"] )?$_REQUEST["validaciones"] :'';

        if ( $strTipoValidacion == "insert" ){
            header('Content-Type: application/json');
            if (empty($id)) {
                $var_consulta="SELECT system_06011003($insert,'$rolId','$description','$comments',$applicant,
                $Representatives,$Distributors,$Warehouses,$Providers,$Packing,$Owners,$Importers,$Conditioner,
                $Manufacturers,$Formulato,$Sender,'$status','$usuario','$fechaIng',$idMax,$id)";
                $val = 1;
                if (pg_query($rmfAdm, $var_consulta)) {
                    $arrInfo['status'] = $val;
                } else {
                    $arrInfo['status'] = 0;
                    $arrInfo['error'] = $var_consulta;
                }
            } else {
                $var_consulta="SELECT system_06011003($update,'$rolId','$description','$comments',$applicant,$Representatives,$Distributors,$Warehouses,$Providers,$Packing,$Owners,$Importers,$Conditioner,$Manufacturers,$Formulato,$Sender,'$status','$usuario','$fechaIng',$idMax,$id)";
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

        if ( $strTipoValidacion == "replace" ){
            header('Content-Type: application/json');
            $var_consulta="SELECT system_06011003($replace,'$rolId','$description','$comments',$applicant,$Representatives,$Distributors,$Warehouses,$Providers,$Packing,$Owners,$Importers,$Conditioner,$Manufacturers,$Formulato,$Sender,'$status','$usuario','$fechaIng',$idMax,$id)";
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

        if ( $strTipoValidacion == "delete" ){
            header('Content-Type: application/json');
            $var_consulta="SELECT system_06011003($delete,'$rolId','$description','$comments',$applicant,$Representatives,$Distributors,$Warehouses,$Providers,$Packing,$Owners,$Importers,$Conditioner,$Manufacturers,$Formulato,$Sender,'$status','$usuario','$fechaIng',$idMax,$id)";
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

        if ( $strTipoValidacion == "validacion_code" ){
        
            $intData = isset($_GET["code"]) ? intval($_GET["code"]) : "";
            
            $boolExiste = false;
            
            if ($intData){
                
                $var_consulta ="SELECT * FROM ctg_rol_empresas WHERE ctg_rol_id  = '$intData'";  
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
    $arrRoles= array();
    $var_consulta= "SELECT * FROM ctg_rol_empresas ORDER BY ctg_rol_id";

    $qTMP = pg_query($rmfAdm, $var_consulta);
    while ( $rTMP = pg_fetch_assoc($qTMP) ){

        $arrRoles[$rTMP["ctg_id"]]["ctg_id"]                 = $rTMP["ctg_id"];
        $arrRoles[$rTMP["ctg_id"]]["ctg_rol_id"]                 = $rTMP["ctg_rol_id"];
        $arrRoles[$rTMP["ctg_id"]]["ctg_rol_desc"]                 = $rTMP["ctg_rol_desc"];
        $arrRoles[$rTMP["ctg_id"]]["ctg_rol_obs"]                 = $rTMP["ctg_rol_obs"];
        $arrRoles[$rTMP["ctg_id"]]["ctg_rol_tit"]                 = $rTMP["ctg_rol_tit"];
        $arrRoles[$rTMP["ctg_id"]]["ctg_rol_prop"]                 = $rTMP["ctg_rol_prop"];
        $arrRoles[$rTMP["ctg_id"]]["ctg_rol_repr"]                 = $rTMP["ctg_rol_repr"];
        $arrRoles[$rTMP["ctg_id"]]["ctg_rol_fabr"]                 = $rTMP["ctg_rol_fabr"];
        $arrRoles[$rTMP["ctg_id"]]["ctg_rol_enva"]                 = $rTMP["ctg_rol_enva"];
        $arrRoles[$rTMP["ctg_id"]]["ctg_rol_dist"]                 = $rTMP["ctg_rol_dist"];
        $arrRoles[$rTMP["ctg_id"]]["ctg_rol_alma"]                 = $rTMP["ctg_rol_alma"];
        $arrRoles[$rTMP["ctg_id"]]["ctg_rol_impo"]                 = $rTMP["ctg_rol_impo"];
        $arrRoles[$rTMP["ctg_id"]]["ctg_rol_labo"]                 = $rTMP["ctg_rol_labo"];
        $arrRoles[$rTMP["ctg_id"]]["ctg_rol_otr"]                 = $rTMP["ctg_rol_otr"];
        $arrRoles[$rTMP["ctg_id"]]["ctg_rol_acon"]                 = $rTMP["ctg_rol_acon"];
        $arrRoles[$rTMP["ctg_id"]]["ctg_rol_pat"]                 = $rTMP["ctg_rol_pat"];
        $arrRoles[$rTMP["ctg_id"]]["ctg_rol_patadj"]                 = $rTMP["ctg_rol_patadj"];
        $arrRoles[$rTMP["ctg_id"]]["ctg_rol_pesc"]                 = $rTMP["ctg_rol_pesc"];
        $arrRoles[$rTMP["ctg_id"]]["ctg_rol_penc"]                 = $rTMP["ctg_rol_penc"];
        $arrRoles[$rTMP["ctg_id"]]["ctg_rol_remi"]                 = $rTMP["ctg_rol_remi"];
        $arrRoles[$rTMP["ctg_id"]]["ctg_rol_sta"]                 = $rTMP["ctg_rol_sta"];
        $arrRoles[$rTMP["ctg_id"]]["ctg_rol_usr"]                 = $rTMP["ctg_rol_usr"];
        $arrRoles[$rTMP["ctg_id"]]["ctg_rol_dt"]                 = $rTMP["ctg_rol_dt"];

        
    }
    pg_free_result($qTMP);

    ?>