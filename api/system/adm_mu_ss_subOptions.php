<?php 
// VALIDATION INSERT UPDATE DELETE
if ( isset($_GET["validaciones"]) && !empty($_GET["validaciones"]) ){
    require_once '../../interbase/tmfAdm.php';

    $insert = 1;
    $update = 2;
    $delete = 3;
    $replace = 4;

    $numOrder = isset( $_POST["numOrder"]  )? $_POST["numOrder"]  :'';
    $idModulo = isset( $_POST["modulo"]  )? $_POST["modulo"]  :'';
    $idModulo_ll = isset( $_POST["modulo_ll"]  )? $_POST["modulo_ll"]  :'';
    $link = isset( $_POST["rtu"]  )? $_POST["rtu"]  :'';
    $activo = 1;

    $rs = pg_query("SELECT count(*)FROM  ctg_modulos_lll");
        if ($row = pg_fetch_row($rs)) {
            $idRow = trim($row[0]);
        }
    $idMax = $idRow+1;
    $id = isset( $_POST["id"]  )? $_POST["id"]  :'';
    $categori = isset( $_POST["categori"]  )? $_POST["categori"]  :'';
    $code = isset( $_POST["code"]  )? $_POST["code"]  :'';
    $options = isset( $_POST["Options"]  )? $_POST["Options"]  :'';
    $subOptions = isset( $_POST["Sub_Option"]  )? $_POST["Sub_Option"]  :'';
    $description = isset( $_POST["description"]  )? $_POST["description"]  :'';
    $comments = isset( $_POST["comments"]  )? $_POST["comments"]  :'';
    $status = 1;
    $fechaIng = date('Y-m-d H:i:s');
    $usuario = "user";

    $strTipoValidacion = isset($_REQUEST["validaciones"] )?$_REQUEST["validaciones"] :'';

        if ( $strTipoValidacion == "insert" ){

            if (empty($id)) {
                header('Content-Type: application/json');
                $var_consulta="SELECT system_06010104($insert,'$numOrder','$description','$comments','$link','$usuario',$status,'$fechaIng',$options,$idMax,$code,$categori,$subOptions)";
                $val = 1;
                if (pg_query($rmfAdm, $var_consulta)) {
                    $arrInfo['status'] = $val;
                } else {
                    $arrInfo['status'] = 0;
                    $arrInfo['error'] = $var_consulta;
                }
            } else {
                header('Content-Type: application/json');
                $var_consulta="SELECT system_06010104($update,'$numOrder','$description','$comments','$link','$usuario',$status,'$fechaIng',$options,$idMax,$code,$categori,$subOptions)";
                $val = 1;
                if (pg_query($rmfAdm, $var_consulta)) {
                    $arrInfo['status'] = $val;
                } else {
                    $arrInfo['status'] = 0;
                    $arrInfo['error'] = $var_consulta;
                }
            }
            //print_r ($var_consulta);
            //print_r($var_consulta);
            print json_encode($arrInfo);
            die();

        }

        else if ( $strTipoValidacion == "replace" ){
            header('Content-Type: application/json');
            $var_consulta="SELECT system_06010104($replace,'$numOrder','$description','$comments','$link','$usuario',$status,'$fechaIng',$options,$idMax,$code,$categori,$subOptions)";
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
            $var_consulta="SELECT system_06010104($delete,'$numOrder','$description','$comments','$link','$usuario',$status,'$fechaIng',$options,$idMax,$code,$categori,$subOptions)";
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
                            <input type="hidden" name="hidCode_<?php print $intContador; ?>" id="hidCode_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['id']; ?>">
                            <input type="hidden" name="hidNameMod_l_<?php print $intContador; ?>" id="hidNameMod_l_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['adm_nombre_menu']; ?>">
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
        
                $arrTypeModel_ll[$rTMP["id"]]["id"]                       = $rTMP["id"];
                $arrTypeModel_ll[$rTMP["id"]]["id_modulo"]                = $rTMP["id_modulo"];
                $arrTypeModel_ll[$rTMP["id"]]["id_modulo_ll"]             = $rTMP["id_modulo_ll"];
                $arrTypeModel_ll[$rTMP["id"]]["adm_acceso_pertenece"]      = $rTMP["adm_acceso_pertenece"];
                $arrTypeModel_ll[$rTMP["id"]]["adm_order"]                 = $rTMP["adm_order"];
                $arrTypeModel_ll[$rTMP["id"]]["adm_name"]                 = $rTMP["adm_name"];
                $arrTypeModel_ll[$rTMP["id"]]["adm_descrip"]              = $rTMP["adm_descrip"];
                $arrTypeModel_ll[$rTMP["id"]]["adm_link"]              = $rTMP["adm_link"];
               
            }
            pg_free_result($qTMP);
            //echo $var_consulta;
            
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
                            <input type="hidden" name="hidIdModulo_ll_<?php print $intContador; ?>" id="hidIdModulo_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['adm_name']; ?>">
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
            WHERE adm_acceso_pertenece = $strMenu_lll ";
        
            $qTMP = pg_query($rmfAdm, $var_consulta);
            //echo $var_consulta;

            while ( $rTMP = pg_fetch_assoc($qTMP) ){
        
                $arrTypeModel_lll[$rTMP["id"]]["id"]                              = $rTMP["id"];
                $arrTypeModel_lll[$rTMP["id"]]["adm_name"]                 = $rTMP["adm_name"];
                $arrTypeModel_lll[$rTMP["id"]]["id_modulo"]                 = $rTMP["id_modulo"];
                $arrTypeModel_lll[$rTMP["id"]]["id_modulo_ll"]                 = $rTMP["id_modulo_ll"];
                $arrTypeModel_lll[$rTMP["id"]]["adm_acceso_pertenece"]                 = $rTMP["adm_acceso_pertenece"];
                $arrTypeModel_lll[$rTMP["id"]]["adm_order"]                 = $rTMP["adm_order"];
                $arrTypeModel_lll[$rTMP["id"]]["adm_descrip"]                 = $rTMP["adm_descrip"];
                $arrTypeModel_lll[$rTMP["id"]]["adm_link"]                 = $rTMP["adm_link"];
               
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
                            <input type="hidden" name="hidIdModulo_ll_<?php print $intContador; ?>" id="hidIdModulo_ll_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['id_modulo_ll']; ?>">
                            <input type="hidden" name="hidIdAcceso_<?php print $intContador; ?>" id="hidIdAcceso_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['adm_acceso_pertenece']; ?>">
                            <input type="hidden" name="hidIdModulo_<?php print $intContador; ?>" id="hidIdModulo_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['id_modulo']; ?>">
                            <input type="hidden" name="hidNum_<?php print $intContador; ?>" id="hidNum_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['adm_order']; ?>">
                            <input type="hidden" name="hidDescrip_<?php print $intContador; ?>" id="hidDescrip_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['adm_name']; ?>">
                            <input type="hidden" name="hidObs_<?php print $intContador; ?>" id="hidObs_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['adm_descrip']; ?>">
                            <input type="hidden" name="hidRtu_<?php print $intContador; ?>" id="hidRtu_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['adm_link']; ?>">
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
                
                $var_consulta ="SELECT * FROM ctg_modulos_lll WHERE id  = $intData";  
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

        else if ( $strTipoValidacion == "validacion_options" ){
        
            $intData = isset($_GET["Options"]) ? intval($_GET["Options"]) : "";
            
            $boolExiste = false;
            
            if ($intData){
                
                $var_consulta ="SELECT * FROM ctg_modulos_ll WHERE id  = $intData";  
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

        else if ( $strTipoValidacion == "validacion_sub_options" ){
        
            $intData = isset($_GET["Sub_Option"]) ? intval($_GET["Sub_Option"]) : "";
            
            $boolExiste = false;
            
            if ($intData){
                
                $var_consulta ="SELECT * FROM ctg_modulos_lll WHERE id  = $intData";  
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


