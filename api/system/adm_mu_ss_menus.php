<?php 
// VALIDATION INSERT UPDATE DELETE
if ( isset($_GET["validaciones"]) && !empty($_GET["validaciones"]) ){
    require_once '../../interbase/tmfAdm.php';

    $insert = 1;
    $update = 2;
    $delete = 3;
    $replace = 4;

    $numOrder = isset( $_POST["numOrder"]  )? $_POST["numOrder"]  :'';
    $link = "";
    $activo = 1;

    $rs = pg_query("SELECT count(*)FROM  ctg_modulos_ll");
        if ($row = pg_fetch_row($rs)) {
            $idRow = trim($row[0]);
        }
    $idMax = $idRow+1;
    $id = isset( $_POST["id"]  )? $_POST["id"]  :'';
    $categori = isset( $_POST["categori"]  )? $_POST["categori"]  :'';
    $code = isset( $_POST["categori"]  )? $_POST["categori"]  :'';
    $description = isset( $_POST["description"]  )? $_POST["description"]  :'';
    $comments = isset( $_POST["comments"]  )? $_POST["comments"]  :'';
    $status = 1;
    $fechaIng = date('Y-m-d H:i:s');
    $usuario = "user";

    $strTipoValidacion = isset($_REQUEST["validaciones"] )?$_REQUEST["validaciones"] :'';

        if ( $strTipoValidacion == "insert" ){

            if (empty($id)) {
                header('Content-Type: application/json');
                $var_consulta="SELECT system_06010102($insert,'$numOrder','$description','$comments','$link','$usuario',$activo,'$fechaIng',$code,'$comments','$status',$id,$idMax)";
                $val = 1;
                if (pg_query($rmfAdm, $var_consulta)) {
                    $arrInfo['status'] = $val;
                } else {
                    $arrInfo['status'] = 0;
                    $arrInfo['error'] = $var_consulta;
                }
            } else {
                header('Content-Type: application/json');
                $var_consulta="SELECT system_06010102($update,'$numOrder','$description','$comments','$link','$usuario',$activo,'$fechaIng',$code,'$comments','$status',$id,$idMax)";
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
            $var_consulta="SELECT system_06010102($replace,'$numOrder','$description','$comments','$link','$usuario',$activo,'$fechaIng',$code,'$comments','$status',$id,$idMax)";
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
            $var_consulta="SELECT system_06010102($delete,'$numOrder','$description','$comments','$link','$usuario',$activo,'$fechaIng',$code,'$comments','$status',$id,$idMax)";
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

//DIBUJO DE TABLA PRODUCTOS MENU_l
        else if ( $strTipoValidacion == "busqueda_modulos_l" ){
            $strMenu_l = isset( $_POST["categori"]  )? $_POST["categori"]  :'';
            
            $arrTypeModel_l= array();
            $var_consulta= "SELECT * 
            FROM ctg_modulos_ll
            WHERE adm_contenido = $strMenu_l ORDER BY id";
        
            $qTMP = pg_query($rmfAdm, $var_consulta);
            while ( $rTMP = pg_fetch_assoc($qTMP) ){
        
                $arrTypeModel_l[$rTMP["id"]]["id"]                              = $rTMP["id"];
                $arrTypeModel_l[$rTMP["id"]]["adm_order"]                 = $rTMP["adm_order"];
                $arrTypeModel_l[$rTMP["id"]]["adm_obs"]                 = $rTMP["adm_obs"];
                $arrTypeModel_l[$rTMP["id"]]["adm_nombre_menu"]                 = $rTMP["adm_nombre_menu"];
                
            }
            pg_free_result($qTMP);
            
            ?>
            <div class="col-md-12 tableFixHead">
            <table id="tableData" class="table table-bordered table-striped table-hover table-sm">
                    <thead>
                        <tr  class="table-info">
                            <th>Code</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                <tbody>

                <?php
                    if ( is_array($arrTypeModel_l) && ( count($arrTypeModel_l)>0 ) ){
                    $intContador = 1;
                        reset($arrTypeModel_l);
                    foreach( $arrTypeModel_l as $rTMP['key'] => $rTMP['value'] ){
                ?> 
                        <tr data-dismiss="modal" style="cursor:pointer;" onclick="fntSelectModulo_l('<?php print $intContador; ?>');">
                            <td><?php echo  $rTMP["value"]['id']; ?></td>
                            <td><?php echo  $rTMP["value"]['adm_nombre_menu']; ?></td>
                        </tr>
                        <input type="hidden" name="hidId_<?php print $intContador; ?>" id="hidId_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['id']; ?>">
                            <input type="hidden" name="hidNum_<?php print $intContador; ?>" id="hidNum_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['adm_order']; ?>">
                            <input type="hidden" name="hidCode_<?php print $intContador; ?>" id="hidCode_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['id']; ?>">
                            <input type="hidden" name="hidDescrip_<?php print $intContador; ?>" id="hidDescrip_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['adm_nombre_menu']; ?>">
                            <input type="hidden" name="hidObs_<?php print $intContador; ?>" id="hidObs_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['adm_obs']; ?>">
                <?PHP
                        $intContador++;                    
                        }
                    }

                else{
                    ?>
                    <div class="col-md-12">
                        <div class="alert alert-danger" role="alert">
                            SELECCIONE UNA CATEGORIA
                        </div>
                    </div>
                    <?php
                }
                        
                    ?>
                    
            </tbody>
            </table>
            
            </div>
            <?php
            die();
        }

        //DIBUJO DE TABLA PRODUCTOS MENU_ll
        else if ( $strTipoValidacion == "busqueda_modulos_ll" ){
            $strMenu_ll = isset( $_POST["code"]  )? $_POST["code"]  :'';
            
            $arrTypeModel_ll= array();
            $var_consulta= "SELECT * 
            FROM ctg_modulos_lll
            WHERE id_modulo_ll = $strMenu_ll AND adm_acceso_pertenece is null ORDER BY id";
        
            $qTMP = pg_query($rmfAdm, $var_consulta);
            while ( $rTMP = pg_fetch_assoc($qTMP) ){
        
                $arrTypeModel_ll[$rTMP["id"]]["id"]                              = $rTMP["id"];
                $arrTypeModel_ll[$rTMP["id"]]["adm_name"]                 = $rTMP["adm_name"];
               
            }
            pg_free_result($qTMP);
            //echo $var_consulta;
            
            ?>
            <tbody class="col-md-12 tableFixHead">
            <table id="tableData" class="table table-bordered table-striped table-hover table-sm">
                    <thead>
                        <tr  class="table-info">
                            <th>Code</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                <tbody>

                <?php
                    if ( is_array($arrTypeModel_ll) && ( count($arrTypeModel_ll)>0 ) ){
                    $intContador = 1;
                        reset($arrTypeModel_ll);
                    foreach( $arrTypeModel_ll as $rTMP['key'] => $rTMP['value'] ){
                ?> 
                        <tr data-dismiss="modal" style="cursor:pointer;" onclick="fntSelectModulo_ll('<?php print $intContador; ?>');">
                            <td><?php echo  $rTMP["value"]['id']; ?></td>
                            <td><?php echo  $rTMP["value"]['adm_name']; ?></td>
                        </tr>
                            <input type="hidden" name="hidId_ll_<?php print $intContador; ?>" id="hidId_ll_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['id']; ?>">
                            <input type="hidden" name="hidCode_ll_<?php print $intContador; ?>" id="hidCode_ll_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['id']; ?>">
                <?PHP
                        $intContador++;                    
                        }
                    }

                else{
                    ?>
                    <div class="col-md-12">
                        <div class="alert alert-danger" role="alert">
                            SELECCIONE UNA CATEGORIA
                        </div>
                    </div>
                    <?php
                }
                        
                    ?>
                    
            </tbody>
            </table>
            </div>
            <?php
            die();
        }

        //DIBUJO DE TABLA PRODUCTOS MENUlll
        else if ( $strTipoValidacion == "busqueda_modulos_lll" ){
            $strMenu_lll = isset( $_POST["Options"]  )? $_POST["Options"]  :'';
            
            $arrTypeModel_lll= array();
            $var_consulta= "SELECT * 
            FROM ctg_modulos_lll
            WHERE adm_acceso_pertenece = $strMenu_lll ORDER BY id";
        
            $qTMP = pg_query($rmfAdm, $var_consulta);
            //echo $var_consulta;

            while ( $rTMP = pg_fetch_assoc($qTMP) ){
        
                $arrTypeModel_lll[$rTMP["id"]]["id"]                              = $rTMP["id"];
                $arrTypeModel_lll[$rTMP["id"]]["adm_name"]                 = $rTMP["adm_name"];
                $arrTypeModel_lll[$rTMP["id"]]["adm_acceso_pertenece"]                 = $rTMP["adm_acceso_pertenece"];
               
            }
            pg_free_result($qTMP);
            
            ?>
            <div class="col-md-12 tableFixHead">
            <table id="tableData" class="table table-bordered table-striped table-hover table-sm">
                    <thead>
                        <tr  class="table-info">
                            <th>Code</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                <tbody>

                <?php
                    if ( is_array($arrTypeModel_lll) && ( count($arrTypeModel_lll)>0 ) ){
                    $intContador = 1;
                        reset($arrTypeModel_lll);
                    foreach( $arrTypeModel_lll as $rTMP['key'] => $rTMP['value'] ){
                ?> 
                        <tr data-dismiss="modal" style="cursor:pointer;" onclick="fntSelectModulo_lll('<?php print $intContador; ?>');">
                            <td><?php echo  $rTMP["value"]['id']; ?></td>
                            <td><?php echo  $rTMP["value"]['adm_name']; ?></td>
                        </tr>
                            <input type="hidden" name="hidId_lll_<?php print $intContador; ?>" id="hidId_lll_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['id']; ?>">
                            <input type="hidden" name="hidCode_lll_<?php print $intContador; ?>" id="hidCode_lll_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['id']; ?>">
                <?PHP
                        $intContador++;                    
                        }
                    }

                else{
                    ?>
                    <div class="col-md-12">
                        <div class="alert alert-danger" role="alert">
                            SELECCIONE UNA CATEGORIA
                        </div>
                    </div>
                    <?php
                }
                        
                    ?>
                    
            </tbody>
            </table>
            </div>
            <?php
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
$arrTypeModulo= array();
$var_consulta= "SELECT * FROM ctg_modulos_l ORDER BY id";

$qTMP = pg_query($rmfAdm, $var_consulta);
while ( $rTMP = pg_fetch_assoc($qTMP) ){

    $arrTypeModulo[$rTMP["id"]]["id"]                 = $rTMP["id"];
    $arrTypeModulo[$rTMP["id"]]["adm_name"]                 = $rTMP["adm_name"];
    $arrTypeModulo[$rTMP["id"]]["adm_status"]                 = $rTMP["adm_status"];
    $arrTypeModulo[$rTMP["id"]]["ctg_obs"]                 = $rTMP["ctg_obs"];

    
}
pg_free_result($qTMP);
?>


