<?php 
// VALIDATION INSERT UPDATE DELETE
if ( isset($_GET["validaciones"]) && !empty($_GET["validaciones"]) ){
    require_once '../../interbase/tmfInsp.php';

    $insert = 1;
    $update = 2;
    $delete = 3;
    $replace = 4;

    $rs = pg_query("SELECT count(*)FROM  ctg_tipo_productos_categorias");
        if ($row = pg_fetch_row($rs)) {
            $idRow = trim($row[0]);
        }
    $idMax = $idRow+1;
    $id = isset( $_POST["id"]  )? $_POST["id"]  :'';
    $idTpr = isset( $_POST["categori"]  )? $_POST["categori"]  :'';
    $code = isset( $_POST["code"]  )? $_POST["code"]  :'';
    $description = isset( $_POST["description"]  )? $_POST["description"]  :'';
    $review = isset( $_POST["review"]  )? $_POST["review"]  :0;
    $approved = isset( $_POST["approved"]  )? $_POST["approved"]  :0;
    $final = isset( $_POST["final"]  )? $_POST["final"]  :0;
    $vus = isset( $_POST["vus"]  )? $_POST["vus"]  :0;
    $comments = isset( $_POST["comments"]  )? $_POST["comments"]  :'';
    $status = 1;
    $fechaIng = date('Y-m-d H:i:s');
    $usuario = "user";

        if ( $_GET["validaciones"] == "insert" ){

            if (empty($id)) {
                $var_consulta="SELECT system_06011002($insert,'$idTpr','$description','$comments','$code',$review,$approved,$final,$vus,'$status','$usuario','$fechaIng','$id',$idMax)";
                $val = 1;
                if (pg_query($rmfAdm, $var_consulta)) {
                    echo $val;
                } else {
                    echo "Error: " . $var_consulta . "<br>" ;
                }
            } else {
                $var_consulta="SELECT system_06011002($update,'$idTpr','$description','$comments','$code',$review,$approved,$final,$vus,'$status','$usuario','$fechaIng','$id',$idMax)";
                $val = 1;
                if (pg_query($rmfAdm, $var_consulta)) {
                    echo $val;
                } else {
                    echo "Error: " . $var_consulta . "<br>" ;
                }
            }

            die();

        }

        if ( $_GET["validaciones"] == "replace" ){

            $var_consulta="SELECT system_06011002($replace,'$idTpr','$description','$comments','$code',$review,$approved,$final,$vus,'$status','$usuario','$fechaIng','$id',$idMax)";
            $val = 1;
            if (pg_query($rmfAdm, $var_consulta)) {
                echo $val;
            } else {
                echo "Error: " . $var_consulta . "<br>" ;
            }

            die();
        }

        if ( $_GET["validaciones"] == "delete" ){
            

            $var_consulta="SELECT system_06011002($delete,'$idTpr','$description','$comments','$code',$review,$approved,$final,$vus,'$status','$usuario','$fechaIng','$id',$idMax)";
            $val = 1;
            if (pg_query($rmfAdm, $var_consulta)) {
                echo $val;
            } else {
                echo "Error: " . $var_consulta . "<br>" ;
            }
            
            die();
        }

//DIBUJO DE TABLA PRODUCTOS CATEGORIAS
        if ( $_GET["validaciones"] == "busqueda_messages" ){
            $strCategori = isset( $_POST["categori"]  )? $_POST["categori"]  :'';
            $strSearch = isset( $_POST["Search"]  )? $_POST["Search"]  :'';

            $strFilter = "";
            if ( !empty($strSearch) ){
                $strFilter = " AND ( UPPER(adm_msg_desc) LIKE '%{$strSearch}%' ) ";
            }
            
            $arrTypeMessage= array();
            $var_consulta= "SELECT * 
                            FROM adm_mensajes
                            WHERE adm_msg_tipo = $strCategori
                            $strFilter";
        
            $qTMP = pg_query($rmfAdm, $var_consulta);
           // echo $var_consulta;
            while ( $rTMP = pg_fetch_assoc($qTMP) ){
        
                $arrTypeMessage[$rTMP["adm_msg_id"]]["adm_msg_id"]                 = $rTMP["adm_msg_id"];
                $arrTypeMessage[$rTMP["adm_msg_id"]]["adm_msg_desc"]                 = $rTMP["adm_msg_desc"];
                $arrTypeMessage[$rTMP["adm_msg_id"]]["adm_msg_tipo"]                 = $rTMP["adm_msg_tipo"];
                
            }
            pg_free_result($qTMP);
            
            ?>
            <div class="col-md-12 tableFixHead">
            <table id="tableData" class="table table-bordered table-striped table-hover table-sm">
                    <thead>
                        <tr  class="table-info">
                            <th>is</th>
                            <th>Description</th>
                            <th>type</th>
                        </tr>
                    </thead>
                <tbody>

                <?php
                    if ( is_array($arrTypeMessage) && ( count($arrTypeMessage)>0 ) ){
                    $intContador = 1;
                        reset($arrTypeMessage);
                    foreach( $arrTypeMessage as $rTMP['key'] => $rTMP['value'] ){
                ?> 
                        <tr onclick="fntSelect()">
                            <td><?php echo  $rTMP["value"]['adm_msg_id']; ?></td>
                            <td><?php echo  $rTMP["value"]['adm_msg_desc']; ?></td>
                            <td><?php echo  $rTMP["value"]['adm_msg_tipo']; ?></td>
                        </tr>
                            <input type="hidden" name="hidCode_<?php print $intContador; ?>" id="hidCode_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['adm_msg_id']; ?>">
                            <input type="hidden" name="hidDescription_<?php print $intContador; ?>" id="hidDescription_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['adm_msg_desc']; ?>">
                            <input type="hidden" name="hidCategori_<?php print $intContador; ?>" id="hidCategori_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['adm_msg_tipo']; ?>">
                        
                <?PHP
                        $intContador++;                    
                        }
                        die();
                    }

                else{
                    ?>
                    <div class="col-md-12">
                        <div class="alert alert-danger" role="alert">
                            SELECCIONE UNA CATEGORIA
                        </div>
                    </div>
                    <?php
                    die();
                }
                    ?>
            </tbody>
            </table>
            </div>
            <?php
            die();
        }
      
    die();   
}
?>


