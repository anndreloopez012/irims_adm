<?php 
// VALIDATION INSERT UPDATE DELETE
if ( isset($_GET["validaciones"]) && !empty($_GET["validaciones"]) ){
    require_once '../../interbase/tmfAdm.php';

    $insert = 1;
    $update = 2;
    $delete = 3;
    $replace = 4;

    $id = isset( $_POST["id"]  )? $_POST["id"]  :'';
    $unit = isset( $_POST["categori"]  )? $_POST["categori"]  :'';
    $code = isset( $_POST["code"]  )? $_POST["code"]  :'';
    $description = isset( $_POST["description"]  )? $_POST["description"]  :'';
    $comments = isset( $_POST["comments"]  )? $_POST["comments"]  :'';
    $status = 1;
    $fechaIng = date('Y-m-d H:i:s');
    $usuario = "user";

    $rs = pg_query("SELECT count(*)FROM  ctg_formularios");
        if ($row = pg_fetch_row($rs)) {
            $idRow = trim($row[0]);
        }
    $idMax = $idRow+1;
    $strTipoValidacion = isset($_REQUEST["validaciones"] )?$_REQUEST["validaciones"] :'';

        if ( $strTipoValidacion == "insert" ){

            if (empty($id)) {
                header('Content-Type: application/json');
                $var_consulta="SELECT system_06011004($insert,'$code','$description','$comments','$unit','$status','$usuario','$fechaIng',$idMax)";
                $val = 1;
                if (pg_query($rmfAdm, $var_consulta)) {
                    $arrInfo['status'] = $val;
                } else {
                    $arrInfo['status'] = 0;
                    $arrInfo['error'] = $var_consulta;
                }
            } else {
                header('Content-Type: application/json');
                $var_consulta="SELECT system_06011004($update,'$code','$description','$comments','$unit','$status','$usuario','$fechaIng',$idMax)";
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
            $var_consulta="SELECT system_06011004($replace,'$code','$description','$comments','$unit','$status','$usuario','$fechaIng',$idMax)";
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
            $var_consulta="SELECT system_06011004($delete,'$code','$description','$comments','$unit','$status','$usuario','$fechaIng',$idMax)";
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

//DIBUJO DE TABLA PRODUCTOS CATEGORIAS
        else if ( $strTipoValidacion == "busqueda_categoria" ){
            $strCategori = isset( $_POST["categori"]  )? $_POST["categori"]  :'';
            $strSearch = isset( $_POST["Search"]  )? $_POST["Search"]  :'';

            $strFilter = "";
            if ( !empty($strSearch) ){
                $strFilter = " AND ( UPPER(ctg_frm_desc) LIKE '%{$strSearch}%' ) ";
            }
            
            $arrFormulario= array();
            $var_consulta= "SELECT * FROM ctg_formularios 
                            WHERE ctg_tpr_id = '$strCategori' 
                            $strFilter
                            ORDER BY ctg_frm_desc";
        
            $qTMP = pg_query($rmfAdm, $var_consulta);
            while ( $rTMP = pg_fetch_assoc($qTMP) ){
        
                $arrFormulario[$rTMP["ctg_id"]]["ctg_id"]                 = $rTMP["ctg_id"];
                $arrFormulario[$rTMP["ctg_id"]]["ctg_frm_id"]                 = $rTMP["ctg_frm_id"];
                $arrFormulario[$rTMP["ctg_id"]]["ctg_frm_desc"]                 = $rTMP["ctg_frm_desc"];
                $arrFormulario[$rTMP["ctg_id"]]["ctg_frm_obs"]                 = $rTMP["ctg_frm_obs"];
                $arrFormulario[$rTMP["ctg_id"]]["ctg_tpr_id"]                 = $rTMP["ctg_tpr_id"];
                $arrFormulario[$rTMP["ctg_id"]]["ctg_frm_sta"]                 = $rTMP["ctg_frm_sta"];
                $arrFormulario[$rTMP["ctg_id"]]["ctg_frm_usr"]                 = $rTMP["ctg_frm_usr"];
                $arrFormulario[$rTMP["ctg_id"]]["ctg_frm_dt"]                 = $rTMP["ctg_frm_dt"];
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
                    if ( is_array($arrFormulario) && ( count($arrFormulario)>0 ) ){
                      $intContador = 1;
                        reset($arrFormulario);
                    foreach( $arrFormulario as $rTMP['key'] => $rTMP['value'] ){
                ?> 
                    <tr data-dismiss="modal" style="cursor:pointer;" onclick="fntSelect('<?php print $intContador; ?>');">
                        <td><?php echo  $rTMP["value"]['ctg_frm_id']; ?></td>
                        <td><?php echo  $rTMP["value"]['ctg_frm_desc']; ?></td>
                    </tr>
                        <input type="hidden" name="hidId_<?php print $intContador; ?>" id="hidId_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['ctg_id']; ?>">
                        <input type="hidden" name="hidCode_<?php print $intContador; ?>" id="hidCode_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['ctg_frm_id']; ?>">
                        <input type="hidden" name="hidDescription_<?php print $intContador; ?>" id="hidDescription_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['ctg_frm_desc']; ?>">
                        <input type="hidden" name="hidComment_<?php print $intContador; ?>" id="hidComment_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['ctg_frm_obs']; ?>">
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
                
                $var_consulta ="SELECT * FROM ctg_formularios WHERE ctg_frm_id  = '$intData'";  
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
    $var_consulta= "SELECT * FROM ctg_tipo_productos ORDER BY ctg_tpr_id";

    $qTMP = pg_query($rmfAdm, $var_consulta);
    while ( $rTMP = pg_fetch_assoc($qTMP) ){

        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_id"]                 = $rTMP["ctg_tpr_id"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_desc"]                 = $rTMP["ctg_tpr_desc"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_obs"]                 = $rTMP["ctg_tpr_obs"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_expe_loc"]                 = $rTMP["ctg_tpr_expe_loc"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_resu_loc"]                 = $rTMP["ctg_tpr_resu_loc"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_dpre"]                 = $rTMP["ctg_tpr_dpre"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_email"]                 = $rTMP["ctg_tpr_email"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_coradm"]                 = $rTMP["ctg_tpr_coradm"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_cuopat"]                 = $rTMP["ctg_tpr_cuopat"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_cuoemp"]                 = $rTMP["ctg_tpr_cuoemp"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_cuofun"]                 = $rTMP["ctg_tpr_cuofun"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_cuoper"]                 = $rTMP["ctg_tpr_cuoper"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_validez"]                 = $rTMP["ctg_tpr_validez"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_poder"]                 = $rTMP["ctg_tpr_poder"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_emp"]                 = $rTMP["ctg_tpr_emp"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_image"]                 = $rTMP["ctg_tpr_image"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_uso"]                 = $rTMP["ctg_tpr_uso"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_on"]                 = $rTMP["ctg_tpr_on"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_req_fab"]                 = $rTMP["ctg_tpr_req_fab"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_req_fabadi"]                 = $rTMP["ctg_tpr_req_fabadi"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_req_fabpriact"]                 = $rTMP["ctg_tpr_req_fabpriact"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_req_fabprofin"]                 = $rTMP["ctg_tpr_req_fabprofin"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_req_fabmatpri"]                 = $rTMP["ctg_tpr_req_fabmatpri"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_req_fabenv"]                 = $rTMP["ctg_tpr_req_fabenv"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_req_fabenvadi"]                 = $rTMP["ctg_tpr_req_fabenvadi"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_req_prop"]                 = $rTMP["ctg_tpr_req_prop"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_req_repr"]                 = $rTMP["ctg_tpr_req_repr"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_req_imp"]                 = $rTMP["ctg_tpr_req_imp"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_req_alm"]                 = $rTMP["ctg_tpr_req_alm"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_req_dist"]                 = $rTMP["ctg_tpr_req_dist"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_req_formula"]                 = $rTMP["ctg_tpr_req_formula"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_req_sec"]                 = $rTMP["ctg_tpr_req_sec"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_req_titular"]                 = $rTMP["ctg_tpr_req_titular"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_req_acon"]                 = $rTMP["ctg_tpr_req_acon"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_req_asq"]                 = $rTMP["ctg_tpr_req_asq"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_req_dci"]                 = $rTMP["ctg_tpr_req_dci"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_size"]                 = $rTMP["ctg_tpr_size"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_req_pesc"]                 = $rTMP["ctg_tpr_req_pesc"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_req_penc"]                 = $rTMP["ctg_tpr_req_penc"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_req_mon"]                 = $rTMP["ctg_tpr_req_mon"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_req_ins"]                 = $rTMP["ctg_tpr_req_ins"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_req_val"]                 = $rTMP["ctg_tpr_req_val"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_req_abo"]                 = $rTMP["ctg_tpr_req_abo"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_req_enva"]                 = $rTMP["ctg_tpr_req_enva"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_email1"]                 = $rTMP["ctg_tpr_email1"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_email2"]                 = $rTMP["ctg_tpr_email2"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_email3"]                 = $rTMP["ctg_tpr_email3"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_email4"]                 = $rTMP["ctg_tpr_email4"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_vus_nusolemp"]                 = $rTMP["ctg_tpr_vus_nusolemp"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_vus_nusolpat"]                 = $rTMP["ctg_tpr_vus_nusolpat"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_vus_newing"]                 = $rTMP["ctg_tpr_vus_newing"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_req_remi"]                 = $rTMP["ctg_tpr_req_remi"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_desc_email"]                 = $rTMP["ctg_tpr_desc_email"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_sig1"]                 = $rTMP["ctg_tpr_sig1"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_sig2"]                 = $rTMP["ctg_tpr_sig2"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_sig3"]                 = $rTMP["ctg_tpr_sig3"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_sig4"]                 = $rTMP["ctg_tpr_sig4"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_sig5"]                 = $rTMP["ctg_tpr_sig5"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_correg"]                 = $rTMP["ctg_tpr_correg"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_numimg"]                 = $rTMP["ctg_tpr_numimg"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_sta"]                 = $rTMP["ctg_tpr_sta"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_usr"]                 = $rTMP["ctg_tpr_usr"];
        $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_tpr_dt"]                 = $rTMP["ctg_tpr_dt"];
        
    }
    pg_free_result($qTMP);

    ?>

    