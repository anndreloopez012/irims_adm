<?php
// VALIDATION INSERT UPDATE DELETE
if (isset($_GET["validaciones"]) && !empty($_GET["validaciones"])) {
    require_once '../../interbase/tmfAdm.php';

    $update = 2;
    $id = isset($_POST["id"]) ? intval($_POST["id"])  : 0;

    $adm_cnf_pais =  isset($_POST["id"]) ? trim($_POST["id"])  : '';
    $adm_cnf_siglas =  isset($_POST["adm_cnf_siglas"]) ? trim($_POST["adm_cnf_siglas"])  : '';
    $adm_cnf_licence  =  isset($_POST["adm_cnf_licence"]) ? trim($_POST["adm_cnf_licence"])  : '';
    $adm_cnf_licence2 =  isset($_POST["adm_cnf_licence2"]) ? trim($_POST["adm_cnf_licence2"])  : '';
    $adm_cnf_ver =  isset($_POST["adm_cnf_ver"]) ? trim($_POST["adm_cnf_ver"])  : '';
    $adm_cnf_lang =  isset($_POST["adm_cnf_lang"]) ? trim($_POST["adm_cnf_lang"])  : '';
    $adm_cnf_tit_cor =  isset($_POST["adm_cnf_tit_cor"]) ? trim($_POST["adm_cnf_tit_cor"])  : '';
    $adm_cnf_user =  isset($_POST["adm_cnf_user"]) ? trim($_POST["adm_cnf_user"])  : '';
    $adm_cnf_passw =  isset($_POST["adm_cnf_passw"]) ? trim($_POST["adm_cnf_passw"])  : '';
    $adm_cnf_email1 =  isset($_POST["email1"]) ? trim($_POST["email1"])  : '';
    $adm_cnf_email2 =  isset($_POST["email2"]) ? trim($_POST["email2"])  : '';
    $adm_cnf_email3 =  isset($_POST["email3"]) ? trim($_POST["email3"])  : '';
    $adm_cnf_ipint =  isset($_POST["ipint"]) ? trim($_POST["ipint"])  : '';
    $adm_cnf_ipext =  isset($_POST["ipext"]) ? trim($_POST["ipext"])  : '';
    $adm_cnf_acceso =  isset($_POST["acceso"]) ? trim($_POST["acceso"])  : '';
    $adm_cnf_color =  isset($_POST["adm_cfg_color"]) ? trim($_POST["adm_cfg_color"])  : '';
    $adm_cnf_timref =  isset($_POST["adm_cnf_timref"]) ? trim($_POST["adm_cnf_timref"])  : '';
    $adm_cnf_actividades =isset ($_POST["cnf_actividades"]) ? intval($_POST["cnf_actividades"])  : '';
    $adm_cnf_mensajes =isset($_POST["cnf_mensajes"]) ? intval($_POST["cnf_mensajes"])  : '';
    $adm_cnf_notas =isset($_POST["cnf_notas"]) ? intval($_POST["cnf_notas"])  : '';
    $adm_cnf_frame =isset($_POST["cnf_frame"]) ? intval($_POST["cnf_frame"])  : '';
    $adm_cnf_uts_costo =isset($_POST["uts_costo"]) ? intval($_POST["uts_costo"])  : '';
    $adm_cnf_numfal =isset($_POST["adm_cnf_numfal"]) ? intval($_POST["adm_cnf_numfal"])  : '';
    $adm_cnf_numfaldias =isset($_POST["adm_cnf_numfaldias"]) ? intval($_POST["adm_cnf_numfaldias"])  : '';
    $adm_cnf_numbol =isset($_POST["id"]) ? intval($_POST["id"])  : '';
    $adm_cnf_numboldias =isset($_POST["id"]) ? intval($_POST["id"])  : '';
    $adm_cnf_filesizeupl =isset($_POST["adm_cnf_filesizeupl"]) ? intval($_POST["adm_cnf_filesizeupl"])  : '';
    $sistema_siglas = isset($_POST["sistema_siglas"]) ? trim($_POST["sistema_siglas"])  : '';
    $sistema_name = isset($_POST["sistema_name"]) ? trim($_POST["sistema_name"])  : '';
    $sistema_version = isset($_POST["sistema_version"]) ? trim($_POST["sistema_version"])  : '';
    $adm_cnf_firma = isset($_POST["adm_cnf_firma"]) ? trim($_POST["adm_cnf_firma"])  : '';
    $adm_cnf_firma2 = isset($_POST["adm_cnf_firma2"]) ? trim($_POST["adm_cnf_firma2"])  : '';
    $adm_cnf_desig1 = isset($_POST["adm_cnf_desig1"]) ? trim($_POST["adm_cnf_desig1"])  : '';
    $adm_cnf_desig2 = isset($_POST["adm_cnf_desig2"]) ? trim($_POST["adm_cnf_desig2"])  : '';
    $adm_cnf_cdvcor = isset($_POST["adm_cnf_cdvcor"]) ? trim($_POST["adm_cnf_cdvcor"])  : '';
    $adm_cnf_backup =isset($_POST["adm_cnf_backup"]) ? intval($_POST["adm_cnf_backup"])  : '';
    $adm_cnf_revfalbol =isset($_POST["adm_cnf_revfalbol"]) ? intval($_POST["adm_cnf_revfalbol"])  : '';
    $adm_cnf_formnr = isset($_POST["adm_cnf_formnr"]) ? trim($_POST["adm_cnf_formnr"])  : '';
    $adm_cnf_versnr = isset($_POST["adm_cnf_versnr"]) ? trim($_POST["adm_cnf_versnr"])  : '';
    $adm_cnf_sopnr = isset($_POST["adm_cnf_sopnr"]) ? trim($_POST["adm_cnf_sopnr"])  : '';
    $adm_cnf_formnr2 = isset($_POST["adm_cnf_formnr2"]) ? trim($_POST["adm_cnf_formnr2"])  : '';
    $adm_cnf_versnr2 = isset($_POST["adm_cnf_versnr2"]) ? trim($_POST["adm_cnf_versnr2"])  : '';
    $adm_cnf_sopnr2 = isset($_POST["adm_cnf_sopnr2"]) ? trim($_POST["adm_cnf_sopnr2"])  : '';
    $adm_cnf_superoff = isset($_POST["adm_cnf_superoff"]) ? trim($_POST["adm_cnf_superoff"])  : '';
    $sistema_logo = isset($_POST["sistema_logo"]) ? trim($_POST["sistema_logo"])  : '';

    $strTipoValidacion = isset($_REQUEST["validaciones"]) ? $_REQUEST["validaciones"] : '';
    if ($strTipoValidacion == "update") {
        header('Content-Type: application/json');
        $var_consulta = "SELECT system_06010401_adm($update,'$adm_cnf_pais','$adm_cnf_siglas','$adm_cnf_licence','$adm_cnf_licence2','$adm_cnf_ver',$adm_cnf_lang,$adm_cnf_tit_cor,'$adm_cnf_user',
        '$adm_cnf_passw','$adm_cnf_email1', $adm_cnf_email2,'$adm_cnf_email3','$adm_cnf_ipint','$adm_cnf_ipext',$adm_cnf_acceso,'$adm_cnf_color',$adm_cnf_timref,
        $adm_cnf_actividades,$adm_cnf_mensajes,$adm_cnf_notas,$adm_cnf_frame,$adm_cnf_uts_costo,$adm_cnf_numfal,$adm_cnf_numfaldias,$adm_cnf_numbol,$adm_cnf_numboldias,$adm_cnf_filesizeupl,'$sistema_siglas','$sistema_name',
        '$sistema_version','$adm_cnf_firma','$adm_cnf_firma2','$adm_cnf_desig1','$adm_cnf_desig2',$adm_cnf_cdvcor,$adm_cnf_backup,$adm_cnf_revfalbol,'$adm_cnf_formnr','$adm_cnf_versnr','$adm_cnf_sopnr','$adm_cnf_formnr2','$adm_cnf_versnr2','$adm_cnf_sopnr2'
        ,'$adm_cnf_superoff','$sistema_logo',$id)";
        $val = 1;
        if (pg_query($rmfAdm, $var_consulta)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }
        //print_r($var_consulta);
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

    die();
}
require_once '../../interbase/tmfAdm.php';
$arrAdm = array();
$var_consulta = "SELECT * 
            FROM adm_config
            ORDER BY ctg_id";

$qTMP = pg_query($rmfAdm, $var_consulta);
while ($rTMP = pg_fetch_assoc($qTMP)) {

    $arrAdm[$rTMP["ctg_id"]]["ctg_id"]                 = $rTMP["ctg_id"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_pais"]                 = $rTMP["adm_cnf_pais"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_siglas"]                 = $rTMP["adm_cnf_siglas"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_licence"]                 = $rTMP["adm_cnf_licence"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_licence2"]                 = $rTMP["adm_cnf_licence2"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_ver"]                 = $rTMP["adm_cnf_ver"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_lang"]                 = $rTMP["adm_cnf_lang"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_tit_cor"]                 = $rTMP["adm_cnf_tit_cor"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_user"]                 = $rTMP["adm_cnf_user"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_passw"]                 = $rTMP["adm_cnf_passw"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_email1"]                 = $rTMP["adm_cnf_email1"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_email2"]                 = $rTMP["adm_cnf_email2"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_email3"]                 = $rTMP["adm_cnf_email3"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_ipint"]                 = $rTMP["adm_cnf_ipint"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_ipext"]                 = $rTMP["adm_cnf_ipext"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_acceso"]                 = $rTMP["adm_cnf_acceso"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_color"]                 = $rTMP["adm_cnf_color"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_timref"]                 = $rTMP["adm_cnf_timref"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_masktels"]                 = $rTMP["adm_cnf_masktels"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_maskdates"]                 = $rTMP["adm_cnf_maskdates"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_maskvalues"]                 = $rTMP["adm_cnf_maskvalues"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_actividades"]                 = $rTMP["adm_cnf_actividades"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_mensajes"]                 = $rTMP["adm_cnf_mensajes"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_notas"]                 = $rTMP["adm_cnf_notas"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_frame"]                 = $rTMP["adm_cnf_frame"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_uts_costo"]                 = $rTMP["adm_cnf_uts_costo"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_numfal"]                 = $rTMP["adm_cnf_numfal"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_numfaldias"]                 = $rTMP["adm_cnf_numfaldias"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_numbol"]                 = $rTMP["adm_cnf_numbol"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_numboldias"]                 = $rTMP["adm_cnf_numboldias"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_filesizeupl"]                 = $rTMP["adm_cnf_filesizeupl"];
    $arrAdm[$rTMP["ctg_id"]]["sistema_siglas"]                 = $rTMP["sistema_siglas"];
    $arrAdm[$rTMP["ctg_id"]]["sistema_name"]                 = $rTMP["sistema_name"];
    $arrAdm[$rTMP["ctg_id"]]["sistema_version"]                 = $rTMP["sistema_version"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_firma"]                 = $rTMP["adm_cnf_firma"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_firma2"]                 = $rTMP["adm_cnf_firma2"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_desig1"]                 = $rTMP["adm_cnf_desig1"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_desig2"]                 = $rTMP["adm_cnf_desig2"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_cdvcor"]                 = $rTMP["adm_cnf_cdvcor"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_backup"]                 = $rTMP["adm_cnf_backup"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_revfalbol"]                 = $rTMP["adm_cnf_revfalbol"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_formnr"]                 = $rTMP["adm_cnf_formnr"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_versnr"]                 = $rTMP["adm_cnf_versnr"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_sopnr"]                 = $rTMP["adm_cnf_sopnr"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_formnr2"]                 = $rTMP["adm_cnf_formnr2"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_versnr2"]                 = $rTMP["adm_cnf_versnr2"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_sopnr2"]                 = $rTMP["adm_cnf_sopnr2"];
    $arrAdm[$rTMP["ctg_id"]]["adm_cnf_superoff"]                 = $rTMP["adm_cnf_superoff"];
    $arrAdm[$rTMP["ctg_id"]]["sistema_logo"]                 = $rTMP["sistema_logo"];
}
pg_free_result($qTMP);

if (is_array($arrAdm) && (count($arrAdm) > 0)) {
    reset($arrAdm);
    foreach ($arrAdm as $rTMP['key'] => $rTMP['value']) {
        $adm_cnf_pais = $rTMP["value"]['adm_cnf_pais'];
        $adm_cnf_siglas = $rTMP["value"]['adm_cnf_siglas'];
        $adm_cnf_licence = $rTMP["value"]['adm_cnf_licence'];
        $adm_cnf_licence2 = $rTMP["value"]['adm_cnf_licence2'];
        $adm_cnf_ver = $rTMP["value"]['adm_cnf_ver'];
        $adm_cnf_lang = $rTMP["value"]['adm_cnf_lang'];
        $adm_cnf_tit_cor = $rTMP["value"]['adm_cnf_tit_cor'];

        $adm_cnf_user = $rTMP["value"]['adm_cnf_user'];
        $adm_cnf_passw = $rTMP["value"]['adm_cnf_passw'];
        $adm_cnf_email1 = $rTMP["value"]['adm_cnf_email1'];
        $adm_cnf_email2 = $rTMP["value"]['adm_cnf_email2'];
        $adm_cnf_email3 = $rTMP["value"]['adm_cnf_email3'];
        $adm_cnf_ipint = $rTMP["value"]['adm_cnf_ipint'];
        $adm_cnf_ipext = $rTMP["value"]['adm_cnf_ipext'];
        $adm_cnf_acceso = $rTMP["value"]['adm_cnf_acceso'];
        $adm_cnf_color = $rTMP["value"]['adm_cnf_color'];
        $adm_cnf_timref = $rTMP["value"]['adm_cnf_timref'];
        $adm_cnf_masktels = $rTMP["value"]['adm_cnf_masktels'];
        $adm_cnf_maskdates = $rTMP["value"]['adm_cnf_maskdates'];
        $adm_cnf_maskvalues = $rTMP["value"]['adm_cnf_maskvalues'];

        $adm_cnf_actividades = $rTMP["value"]['adm_cnf_actividades'];
        $adm_cnf_mensajes = $rTMP["value"]['adm_cnf_mensajes'];
        $adm_cnf_notas = $rTMP["value"]['adm_cnf_notas'];
        $adm_cnf_frame = $rTMP["value"]['adm_cnf_frame'];

        $adm_cnf_uts_costo = $rTMP["value"]['adm_cnf_uts_costo'];

        $adm_cnf_numfal = $rTMP["value"]['adm_cnf_numfal'];
        $adm_cnf_numfaldias = $rTMP["value"]['adm_cnf_numfaldias'];
        $adm_cnf_numbol = $rTMP["value"]['adm_cnf_numbol'];
        $adm_cnf_numboldias = $rTMP["value"]['adm_cnf_numboldias'];
        $adm_cnf_filesizeupl = $rTMP["value"]['adm_cnf_filesizeupl'];

        $sistema_siglas = $rTMP["value"]['sistema_siglas'];
        $sistema_name = $rTMP["value"]['sistema_name'];
        $sistema_version = $rTMP["value"]['sistema_version'];
        $adm_cnf_firma = $rTMP["value"]['adm_cnf_firma'];
        $adm_cnf_firma2 = $rTMP["value"]['adm_cnf_firma2'];
        $adm_cnf_desig1 = $rTMP["value"]['adm_cnf_desig1'];
        $adm_cnf_desig2 = $rTMP["value"]['adm_cnf_desig2'];
        $adm_cnf_cdvcor = $rTMP["value"]['adm_cnf_cdvcor'];

        $adm_cnf_backup = $rTMP["value"]['adm_cnf_backup'];
        $adm_cnf_revfalbol = $rTMP["value"]['adm_cnf_revfalbol'];

        $adm_cnf_formnr = $rTMP["value"]['adm_cnf_formnr'];
        $adm_cnf_versnr = $rTMP["value"]['adm_cnf_versnr'];
        $adm_cnf_sopnr = $rTMP["value"]['adm_cnf_sopnr'];

        $adm_cnf_formnr2 = $rTMP["value"]['adm_cnf_formnr2'];
        $adm_cnf_versnr2 = $rTMP["value"]['adm_cnf_versnr2'];
        $adm_cnf_sopnr2 = $rTMP["value"]['adm_cnf_sopnr2'];
        $adm_cnf_superoff = $rTMP["value"]['adm_cnf_superoff'];

        $sistema_logo = $rTMP["value"]['sistema_logo'];
    }
}
?>