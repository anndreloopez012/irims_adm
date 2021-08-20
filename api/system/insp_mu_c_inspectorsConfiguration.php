<?php
// VALIDATION INSERT UPDATE DELETE
if (isset($_GET["validaciones"]) && !empty($_GET["validaciones"])) {
    require_once '../../interbase/tmfInsp.php';

    $update = 2;

    $rs = pg_query("SELECT count(*)FROM vus_config");
    if ($row = pg_fetch_row($rs)) {
        $idRow = trim($row[0]);
    }
    $idMax = $idRow + 1;
    $id = isset($_POST["id"]) ? intval($_POST["id"])  : 0;

    $vus_cnf_pais = isset($_POST["codigo"]) ? trim($_POST["codigo"])  : '';
    $vus_cnf_siglas = isset($_POST["vus_cnf_siglas"]) ? trim($_POST["vus_cnf_siglas"])  : '';
    $vus_cnf_licence = isset($_POST["vus_cnf_licence"]) ? trim($_POST["vus_cnf_licence"])  : '';
    $vus_cnf_licence2 = isset($_POST["vus_cnf_licence2"]) ? trim($_POST["vus_cnf_licence2"])  : '';
    $vus_cnf_ver = isset($_POST["vus_cnf_ver"]) ? trim($_POST["vus_cnf_ver"])  : '';
    $vus_cnf_lang = isset($_POST["vus_cnf_lang"]) ? trim($_POST["vus_cnf_lang"])  : '';
    $vus_cnf_email1 = isset($_POST["email1"]) ? trim($_POST["email1"])  : '';
    $vus_cnf_email2 = isset($_POST["email2"]) ? trim($_POST["email2"])  : '';
    $vus_cnf_email3 = isset($_POST["email3"]) ? trim($_POST["email3"])  : '';
    $vus_cnf_pagadere = isset($_POST["pagadere"]) ? trim($_POST["pagadere"])  : '';
    $vus_cnf_frame = isset($_POST["cnf_frame"]) ? intval($_POST["cnf_frame"])  : 0;
    $vus_cnf_backup = isset($_POST["adm_cnf_backup"]) ? intval($_POST["adm_cnf_backup"])  : 0;
    $vus_cnf_acceso = isset($_POST["acceso"]) ? trim($_POST["acceso"])  : '';
    $vus_cnf_diasven = isset($_POST["diasven"]) ? trim($_POST["diasven"])  : '';

    $status = 1;
    $fechaIng = date('Y-m-d H:i:s');
    $usuario = "user";

    $strTipoValidacion = isset($_REQUEST["validaciones"]) ? $_REQUEST["validaciones"] : '';
    if ($strTipoValidacion == "update") {
        header('Content-Type: application/json');
        $var_consulta = "SELECT system_06010404_insp($insert,'$vus_cnf_pais','$vus_cnf_siglas','$vus_cnf_licence','$vus_cnf_licence2','$vus_cnf_ver',$vus_cnf_lang,
        $vus_cnf_email1,$vus_cnf_email2,'$vus_cnf_email3',$vus_cnf_pagadere,$vus_cnf_frame,$vus_cnf_backup,$vus_cnf_acceso,$vus_cnf_diasven,$id)";
        $val = 1;
        if (pg_query($rmfInsp, $var_consulta)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }

        print_r($var_consulta);
        print json_encode($arrInfo);
        die();
    }

    //DIBUJO DE TABLA PRODUCTOS CATEGORIAS
    else if ($strTipoValidacion == "busqueda_geografia") {
        require_once '../../interbase/tmfAdm.php';
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

    die();
}
?>
<?php
require_once '../../interbase/tmfInsp.php';
$arrInsp = array();
$var_consulta = "SELECT * FROM vus_config";

$qTMP = pg_query($rmfInsp, $var_consulta);
while ($rTMP = pg_fetch_assoc($qTMP)) {

    $arrInsp[$rTMP["vus_id"]]["vus_id"]                 = $rTMP["vus_id"];
    $arrInsp[$rTMP["vus_id"]]["vus_cnf_pais"]                 = $rTMP["vus_cnf_pais"];
    $arrInsp[$rTMP["vus_id"]]["vus_cnf_siglas"]                 = $rTMP["vus_cnf_siglas"];
    $arrInsp[$rTMP["vus_id"]]["vus_cnf_licence"]                 = $rTMP["vus_cnf_licence"];
    $arrInsp[$rTMP["vus_id"]]["vus_cnf_licence2"]                 = $rTMP["vus_cnf_licence2"];
    $arrInsp[$rTMP["vus_id"]]["vus_cnf_ver"]                 = $rTMP["vus_cnf_ver"];
    $arrInsp[$rTMP["vus_id"]]["vus_cnf_lang"]                 = $rTMP["vus_cnf_lang"];
    $arrInsp[$rTMP["vus_id"]]["vus_cnf_email1"]                 = $rTMP["vus_cnf_email1"];
    $arrInsp[$rTMP["vus_id"]]["vus_cnf_email2"]                 = $rTMP["vus_cnf_email2"];
    $arrInsp[$rTMP["vus_id"]]["vus_cnf_email3"]                 = $rTMP["vus_cnf_email3"];
    $arrInsp[$rTMP["vus_id"]]["vus_cnf_pagadere"]                 = $rTMP["vus_cnf_pagadere"];
    $arrInsp[$rTMP["vus_id"]]["vus_cnf_frame"]                 = $rTMP["vus_cnf_frame"];
    $arrInsp[$rTMP["vus_id"]]["vus_cnf_backup"]                 = $rTMP["vus_cnf_backup"];
    $arrInsp[$rTMP["vus_id"]]["vus_cnf_acceso"]                 = $rTMP["vus_cnf_acceso"];
    $arrInsp[$rTMP["vus_id"]]["vus_cnf_diasven"]                 = $rTMP["vus_cnf_diasven"];
}
pg_free_result($qTMP);

if (is_array($arrInsp) && (count($arrInsp) > 0)) {
    reset($arrInsp);
    foreach ($arrInsp as $rTMP['key'] => $rTMP['value']) {

        $vus_id = $rTMP["value"]['vus_id'];
        $vus_cnf_pais = $rTMP["value"]['vus_cnf_pais'];
        $vus_cnf_siglas = $rTMP["value"]['vus_cnf_siglas'];
        $vus_cnf_licence = $rTMP["value"]['vus_cnf_licence'];
        $vus_cnf_licence2 = $rTMP["value"]['vus_cnf_licence2'];
        $vus_cnf_ver = $rTMP["value"]['vus_cnf_ver'];
        $vus_cnf_lang = $rTMP["value"]['vus_cnf_lang'];
        $vus_cnf_email1 = $rTMP["value"]['vus_cnf_email1'];
        $vus_cnf_email2 = $rTMP["value"]['vus_cnf_email2'];
        $vus_cnf_email3 = $rTMP["value"]['vus_cnf_email3'];
        $vus_cnf_pagadere = $rTMP["value"]['vus_cnf_pagadere'];
        $vus_cnf_frame = $rTMP["value"]['vus_cnf_frame'];
        $vus_cnf_backup = $rTMP["value"]['vus_cnf_backup'];
        $vus_cnf_acceso = $rTMP["value"]['vus_cnf_acceso'];
        $vus_cnf_diasven = $rTMP["value"]['vus_cnf_diasven'];
    }
}
?>