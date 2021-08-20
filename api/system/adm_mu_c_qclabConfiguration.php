<?php
// VALIDATION INSERT UPDATE DELETE
if (isset($_GET["validaciones"]) && !empty($_GET["validaciones"])) {
    require_once '../../interbase/tmfAdm.php';
    $update = 2;

    $id = isset( $_POST["id"]  )? intval($_POST["id"])  : 1;

    $qcl_cnf_pais = isset( $_POST["codigo"]  )? intval($_POST["codigo"])  :'';
    $qcl_cnf_siglas = isset( $_POST["qcl_cnf_siglas"]  )? trim($_POST["qcl_cnf_siglas"])  :'';
    $qcl_cnf_licence = isset( $_POST["qcl_cnf_licence"]  )? trim($_POST["qcl_cnf_licence"])  :'';
    $qcl_cnf_licence2 = isset( $_POST["qcl_cnf_licence2"]  )? trim($_POST["qcl_cnf_licence2"])  :'';
    $qcl_cnf_ver = isset( $_POST["qcl_cnf_ver"]  )? trim($_POST["qcl_cnf_ver"])  :'';
    $qcl_cnf_lang = isset( $_POST["qcl_cnf_lang"]  )? trim($_POST["qcl_cnf_lang"])  :0;
    $qcl_cnf_email1 = isset( $_POST["email1"]  )? trim($_POST["email1"])  :'';
    $qcl_cnf_email2 = isset( $_POST["email2"]  )? trim($_POST["email2"])  :'';
    $qcl_cnf_email3 = isset( $_POST["email3"]  )? trim($_POST["email3"])  :'';
    $qcl_cnf_pagadere = isset( $_POST["pagadere"]  )? trim($_POST["pagadere"])  :0;
    $qcl_cnf_frame = isset( $_POST["cnf_frame"]  )? intval($_POST["cnf_frame"])  :0;
    $qcl_cnf_backup = isset( $_POST["adm_cnf_backup"]  )? intval($_POST["adm_cnf_backup"])  :0;
    $qcl_cnf_acceso = isset( $_POST["acceso"]  )? trim($_POST["acceso"])  :0;
    $qcl_cnf_diasven = isset( $_POST["diasven"]  )? trim($_POST["diasven"])  :0;

    $strTipoValidacion = isset($_REQUEST["validaciones"]) ? $_REQUEST["validaciones"] : '';
    if ($strTipoValidacion == "insert") {
        header('Content-Type: application/json');
        $var_consulta = "SELECT system_06010405_qclab($update,'$qcl_cnf_pais','$qcl_cnf_siglas','$qcl_cnf_licence','$qcl_cnf_licence2','$qcl_cnf_ver',$qcl_cnf_lang,'$qcl_cnf_email1','$qcl_cnf_email2','$qcl_cnf_email3',$qcl_cnf_pagadere,$qcl_cnf_frame,$qcl_cnf_backup,$qcl_cnf_acceso,$qcl_cnf_diasven,$id)";
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
    else if ($strTipoValidacion == "busqueda_geografia") {
        $strSearch = isset($_POST["Search"]) ? $_POST["Search"]  : '';

        $strFilter = "";
        if (!empty($strSearch)) {
            $strFilter = " AND ( UPPER(ctg_geo_desc) LIKE '%{$strSearch}%' ) ";
        }

        $arrGeo = array();
        $var_consulta = "SELECT * 
                        FROM ctg_geografia
                        WHERE ctg_geo_parent = '0'
                        $strFilter 
                        ORDER BY ctg_geo_desc";

        $qTMP = pg_query($rmfAdm, $var_consulta);
        while ($rTMP = pg_fetch_assoc($qTMP)) {

            $arrGeo[$rTMP["ctg_id"]]["ctg_id"]                 = $rTMP["ctg_id"];
            $arrGeo[$rTMP["ctg_id"]]["ctg_geo_id"]                 = $rTMP["ctg_geo_id"];
            $arrGeo[$rTMP["ctg_id"]]["ctg_geo_desc"]                 = $rTMP["ctg_geo_desc"];
            $arrGeo[$rTMP["ctg_id"]]["ctg_geo_obs"]                 = $rTMP["ctg_geo_obs"];
            $arrGeo[$rTMP["ctg_id"]]["ctg_geo_parent"]                 = $rTMP["ctg_geo_parent"];
            $arrGeo[$rTMP["ctg_id"]]["ctg_geo_moneda"]                 = $rTMP["ctg_geo_moneda"];
            $arrGeo[$rTMP["ctg_id"]]["ctg_geo_cambio"]                 = $rTMP["ctg_geo_cambio"];
            $arrGeo[$rTMP["ctg_id"]]["ctg_geo_cambio_dt"]                 = $rTMP["ctg_geo_cambio_dt"];
            $arrGeo[$rTMP["ctg_id"]]["ctg_geo_sta"]                 = $rTMP["ctg_geo_sta"];
            $arrGeo[$rTMP["ctg_id"]]["ctg_geo_usr"]                 = $rTMP["ctg_geo_usr"];
            $arrGeo[$rTMP["ctg_id"]]["ctg_geo_dt"]                 = $rTMP["ctg_geo_dt"];
            $arrGeo[$rTMP["ctg_id"]]["ctg_geo_pais"]                 = $rTMP["ctg_geo_pais"];
            $arrGeo[$rTMP["ctg_id"]]["ctg_geo_nivel"]                 = $rTMP["ctg_geo_nivel"];
        }
        pg_free_result($qTMP);

?>
        <div class="col-md-12 tableFixHead">
            <table id="tableData" class="table table-bordered table-striped table-hover table-sm">
                <thead>
                    <tr class="table-info">
                        <th>Code</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    if (is_array($arrGeo) && (count($arrGeo) > 0)) {
                        $intContador = 1;
                        reset($arrGeo);
                        foreach ($arrGeo as $rTMP['key'] => $rTMP['value']) {
                    ?>
                            <tr data-dismiss="modal" style="cursor:pointer;" onclick="fntSelect('<?php print $intContador; ?>');">
                                <td><?php echo  $rTMP["value"]['ctg_geo_id']; ?></td>
                                <td><?php echo  $rTMP["value"]['ctg_geo_desc']; ?></td>
                            </tr>
                            <input type="hidden" name="hidId_<?php print $intContador; ?>" id="hidId_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['ctg_geo_id']; ?>">
                            <input type="hidden" name="hidCode_<?php print $intContador; ?>" id="hidCode_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['ctg_geo_desc']; ?>">
                        <?PHP
                            $intContador++;
                        }
                    } else {
                        ?>
                        <div class="col-md-12">
                            <div class="alert alert-danger" role="alert">
                                Digit at least 1 character please
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

   
}
?>
<?php
require_once '../../interbase/tmfUser.php';
$arrConfig = array();
$var_consulta = "SELECT * FROM qcl_config
                ORDER BY ctg_id";

$qTMP = pg_query($rmfUser, $var_consulta);
while ($rTMP = pg_fetch_assoc($qTMP)) {

    $arrConfig[$rTMP["ctg_id"]]["ctg_id"]                 = $rTMP["ctg_id"];
    $arrConfig[$rTMP["ctg_id"]]["qcl_cnf_pais"]                 = $rTMP["qcl_cnf_pais"];
    $arrConfig[$rTMP["ctg_id"]]["qcl_cnf_siglas"]                 = $rTMP["qcl_cnf_siglas"];
    $arrConfig[$rTMP["ctg_id"]]["qcl_cnf_licence"]                 = $rTMP["qcl_cnf_licence"];
    $arrConfig[$rTMP["ctg_id"]]["qcl_cnf_licence2"]                 = $rTMP["qcl_cnf_licence2"];
    $arrConfig[$rTMP["ctg_id"]]["qcl_cnf_ver"]                 = $rTMP["qcl_cnf_ver"];
    $arrConfig[$rTMP["ctg_id"]]["qcl_cnf_lang"]                 = $rTMP["qcl_cnf_lang"];
    $arrConfig[$rTMP["ctg_id"]]["qcl_cnf_email1"]                 = $rTMP["qcl_cnf_email1"];
    $arrConfig[$rTMP["ctg_id"]]["qcl_cnf_email2"]                 = $rTMP["qcl_cnf_email2"];
    $arrConfig[$rTMP["ctg_id"]]["qcl_cnf_email3"]                 = $rTMP["qcl_cnf_email3"];
    $arrConfig[$rTMP["ctg_id"]]["qcl_cnf_pagadere"]                 = $rTMP["qcl_cnf_pagadere"];
    $arrConfig[$rTMP["ctg_id"]]["qcl_cnf_frame"]                 = $rTMP["qcl_cnf_frame"];
    $arrConfig[$rTMP["ctg_id"]]["qcl_cnf_backup"]                 = $rTMP["qcl_cnf_backup"];
    $arrConfig[$rTMP["ctg_id"]]["qcl_cnf_acceso"]                 = $rTMP["qcl_cnf_acceso"];
    $arrConfig[$rTMP["ctg_id"]]["qcl_cnf_diasven"]                 = $rTMP["qcl_cnf_diasven"];


}
pg_free_result($qTMP);
//print_r($arrConfig);

?>

<?php
    if (is_array($arrConfig) && (count($arrConfig) > 0)) {
        reset($arrConfig);
        foreach ($arrConfig as $rTMP['key'] => $rTMP['value']) {
            $ctg_id = $rTMP["value"]['ctg_id'];
            $qcl_cnf_pais = $rTMP["value"]['qcl_cnf_pais'];
            $qcl_cnf_siglas = $rTMP["value"]['qcl_cnf_siglas'];
            $qcl_cnf_licence = $rTMP["value"]['qcl_cnf_licence'];
            $qcl_cnf_licence2 = $rTMP["value"]['qcl_cnf_licence2'];
            $qcl_cnf_ver = $rTMP["value"]['qcl_cnf_ver'];
            $qcl_cnf_lang = $rTMP["value"]['qcl_cnf_lang'];
            $qcl_cnf_email1 = $rTMP["value"]['qcl_cnf_email1'];
            $qcl_cnf_email2 = $rTMP["value"]['qcl_cnf_email2'];
            $qcl_cnf_email3 = $rTMP["value"]['qcl_cnf_email3'];
            $qcl_cnf_pagadere = $rTMP["value"]['qcl_cnf_pagadere'];
            $qcl_cnf_frame = $rTMP["value"]['qcl_cnf_frame'];
            $qcl_cnf_backup = $rTMP["value"]['qcl_cnf_backup'];
            $qcl_cnf_acceso = $rTMP["value"]['qcl_cnf_acceso'];
            $qcl_cnf_diasven = $rTMP["value"]['qcl_cnf_diasven'];

        }
    } 
?>


