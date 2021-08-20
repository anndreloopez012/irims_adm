<?php
// VALIDATION INSERT UPDATE DELETE
if (isset($_GET["validaciones"]) && !empty($_GET["validaciones"])) {
    require_once '../../interbase/tmfUser.php';

    $insert = 1;
    $update = 2;
    $delete = 3;
    //caculo de diferencia entre fechas
    $date1 = new DateTime("2015-02-14");
    $date2 = new DateTime("2015-02-10");
    $diff = $date1->diff($date2);
    $total = $diff->days;

    $rs = pg_query("SELECT count(*)FROM  vus_config_calendario");
    if ($row = pg_fetch_row($rs)) {
        $idRow = trim($row[0]);
    }
    $idMax = $idRow + 1;
    $id = isset($_POST["id"]) ? intval($_POST["id"])  : 0;
    $start = isset($_POST["start"]) ? trim($_POST["start"])  : 0000-00-00;
    $end = isset($_POST["end"]) ? trim($_POST["end"])  : 0000-00-00;
    $strTipoValidacion = isset($_REQUEST["validaciones"]) ? $_REQUEST["validaciones"] : '';
    if ($strTipoValidacion == "insert") {
        header('Content-Type: application/json');
        if (empty($id)) {
            $var_consulta = "SELECT system_06010403_user($insert,'$start','$end','$idMax')";
            $val = 1;
            if (pg_query($rmfAdm, $var_consulta)) {
                $arrInfo['status'] = $val;
            } else {
                $arrInfo['status'] = 0;
                $arrInfo['error'] = $var_consulta;
            }
        } else {
            $var_consulta = "SELECT system_06010403_user($update,'$start','$end','$id')";
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
    } else if ($strTipoValidacion == "delete") {
        header('Content-Type: application/json');
        $var_consulta = "SELECT system_06010403_user($delete,'$start','$end','$id')";
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
    else if ($strTipoValidacion == "busqueda_tabla") {

        $arrCalendar = array();
        $var_consulta = "SELECT * 
            FROM vus_config_calendario
            ORDER BY vus_cal_id";

        $qTMP = pg_query($rmfAdm, $var_consulta);
        while ($rTMP = pg_fetch_assoc($qTMP)) {

            $arrCalendar[$rTMP["vus_cal_id"]]["vus_cal_id"]                 = $rTMP["vus_cal_id"];
            $arrCalendar[$rTMP["vus_cal_id"]]["vus_cal_perini"]                 = $rTMP["vus_cal_perini"];
            $arrCalendar[$rTMP["vus_cal_id"]]["vus_cal_perfin"]                 = $rTMP["vus_cal_perfin"];
        }
        pg_free_result($qTMP);

?>
        <br>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 tableFixHead">
                <table id="tableData" class="table table-bordered table-striped table-hover table-sm">
                    <thead>
                        <tr class="table-info">
                            <th>Start date </th>
                            <th>End date </th>
                            <th>Days </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if (is_array($arrCalendar) && (count($arrCalendar) > 0)) {
                            $intContador = 1;
                            reset($arrCalendar);
                            foreach ($arrCalendar as $rTMP['key'] => $rTMP['value']) {
                        ?>

                                <tr data-dismiss="modal" style="cursor:pointer;" onclick="fntSelect('<?php print $intContador; ?>');">

                                    <td><?php echo  $rTMP["value"]['vus_cal_perini']; ?></td>
                                    <td><?php echo  $rTMP["value"]['vus_cal_perfin']; ?></td>
                                    <td><?php echo  $rTMP["value"]['vus_cal_id']; ?></td>
                                </tr>

                                <input type="hidden" name="hidvus_cal_id_<?php print $intContador; ?>" id="hidvus_cal_id_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_cal_id']; ?>">
                                <input type="hidden" name="hidvus_cal_perini_<?php print $intContador; ?>" id="hidvus_cal_perini_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_cal_perini']; ?>">
                                <input type="hidden" name="hidvus_cal_perfin_<?php print $intContador; ?>" id="hidvus_cal_perfin_<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_cal_perfin']; ?>">
                        <?PHP
                                $intContador++;
                            }
                        }

                        ?>

                    </tbody>
                </table>
            </div>
        </div>
<?php
        die();
    }

    die();
}
?>