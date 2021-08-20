<?php
//GLOBAL VARIABLE
require_once '../../api/var_global.php';

// VALIDATION INSERT UPDATE DELETE
if (isset($_GET["validaciones"]) && !empty($_GET["validaciones"])) {
    require_once '../../interbase/tmfUser.php';

    $insert = 1;
    $update = 2;
    $delete = 3;

    $numSol = isset($_POST["num_sol"]) ? $_POST["num_sol"]  : '';
    $userId = isset($_POST["codigo_des"]) ? $_POST["codigo_des"]  : '';
    $fecsol = isset($_POST["fecsol"]) ? $_POST["fecsol"]  : '';
    $tipcta_desc = isset($_POST["data_tipcta_desc"]) ? $_POST["data_tipcta_desc"]  : '';
    $alias = isset($_POST["alias"]) ? $_POST["alias"]  : '';
    $adm_cnf_licence2 = isset($_POST["adm_cnf_licence2"]) ? $_POST["adm_cnf_licence2"]  : '';
    $email = isset($_POST["email"]) ? $_POST["email"]  : '';
    $pass = isset($_POST["pass"]) ? $_POST["pass"]  : '';

    //PERSONAL INFORMATION
    $first_name = isset($_POST["first_name"]) ? $_POST["first_name"]  : '';
    $last_name = isset($_POST["last_name"]) ? $_POST["last_name"]  : '';
    $ci = isset($_POST["ci"]) ? $_POST["ci"]  : '';
    $ci_tpo = 1; //PENDIENTE
    $tel = isset($_POST["tel"]) ? $_POST["tel"]  : '';
    $geo_desc = isset($_POST["geo_desc"]) ? $_POST["geo_desc"]  : '';
    $dir = isset($_POST["dir"]) ? $_POST["dir"]  : '';
    $cel = isset($_POST["cel"]) ? $_POST["cel"]  : '';
    $codpos = isset($_POST["codpos"]) ? $_POST["codpos"]  : '';
    $emptpo = 0; //PENDIENTE

    //FECHA DE VENCIMIENTO
    $rs = pg_query("SELECT vus_cnf_pagadere FROM vus_config ");
    if ($row = pg_fetch_array($rs)) {
        $idRow = trim($row[0]);
    }
    $pagadere = $idRow;
    $VenDere = NULL;
    if ($pagadere == 2) {
        $dias = 3650;
        $VenDere = date("Y-m-d", strtotime("$dias days"));
    } else {
        $dias = 365;
        $VenDere = date("Y-m-d", strtotime("$dias days"));
    }

    //IF
    $Name = isset($_POST["Name"]) ? $_POST["Name"]  : '';

    //ACTION
    $estatus = isset($_POST["estatus"]) ? $_POST["estatus"]  : '';
    $obs = isset($_POST["obs"]) ? $_POST["obs"]  : '';

    //COMPANY
    $rif = isset($_POST["rif"]) ? $_POST["rif"]  : '';
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"]  : '';
    $tels = isset($_POST["tels"]) ? $_POST["tels"]  : '';
    $fax = isset($_POST["fax"]) ? $_POST["fax"]  : '';
    $email1 = isset($_POST["email1"]) ? $_POST["email1"]  : '';
    $email2 = isset($_POST["email2"]) ? $_POST["email2"]  : '';
    $pweb = isset($_POST["pweb"]) ? $_POST["pweb"]  : '';

    $status = 1;
    $fechaIng = date('Y-m-d');
    $usuario = $_SESSION['adm_usr_ci'];

    $colfar = 1; //PENDIENTE
    $msds = 1; //PENDIENTE
    $inprefar = 1; //PENDIENTE
    $patro = 1; //PENDIENTE
    $rege = 1; //PENDIENTE


    $strTipoValidacion = isset($_REQUEST["validaciones"]) ? $_REQUEST["validaciones"] : '';

    if ($strTipoValidacion == "proces_update") {
        require_once '../../interbase/tmfUser.php';
        if ($estatus == 1) {
            header('Content-Type: application/json');
            $status = 1;
            $var_consulta = "UPDATE vus_usuarios_solicitud_registro SET vus_solreg_estatus_aut = '$fechaIng', vus_solreg_estatus = '1'WHERE vus_solreg_id = $userId ;";
            $val = 1;
            if (pg_query($rmfUser, $var_consulta)) {
                $arrInfo['status'] = $val;
            } else {
                $arrInfo['status'] = 0;
                $arrInfo['error'] = $var_consulta;
            }
            //print_r($var_consulta);
            print json_encode($arrInfo);

            die();
        } else {
            $status = 2;
            $var_consulta = "UPDATE vus_usuarios_solicitud_registro SET vus_solreg_estatus_rec = '$fechaIng', vus_solreg_estatus = '2' WHERE vus_solreg_id = $userId ;";
            $val = 2;
            if (pg_query($rmfUser, $var_consulta)) {
                $arrInfo['status'] = $val;
            } else {
                $arrInfo['status'] = 0;
                $arrInfo['error'] = $var_consulta;
            }
            //print_r($var_consulta);
            print json_encode($arrInfo);

            die();
        }
    } else if ($strTipoValidacion == "proces_insert_usuarios") {
        require_once '../../interbase/tmfUser.php';
        header('Content-Type: application/json');
        $var_consulta = "INSERT INTO vus_usuarios (vus_usr_id,vus_usr_fecaut,vus_usr_alias,vus_usr_tipcta,vus_usr_ci,vus_usr_ci_tpo,vus_usr_nme1,vus_usr_ape1,vus_usr_nombre,vus_usr_emp_rif,vus_usr_password,vus_usr_email,vus_usr_tel,vus_usr_cel,ctg_geo_id,vus_usr_codpos,vus_usr_estatus,vus_usr_estatus_aut,vus_usr_obs,vus_usr_dir,vus_usr_emptpo,vus_usr_sta,vus_usr_usr,vus_usr_dt) 
            VALUES ($userId,'$fechaIng','$alias',$tipcta_desc,'$ci','$ci_tpo','$first_name','$last_name','$first_name $last_name','$rif','$pass','$email','$tel','$cel','$geo_desc','$codpos','$estatus','$fechaIng','$obs','$dir','$emptpo','$status','$usuario','$fechaIng')";
        //print_r($var_consulta);
        $val = 1;
        if (pg_query($rmfUser, $var_consulta)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }
        print json_encode($arrInfo);
        die();
    } else if ($strTipoValidacion == "proces_insert_farmac") {
        require_once '../../interbase/tmfAdm.php';
        $rs = "SELECT ctg_farm_ci FROM ctg_farmaceuticos WHERE ctg_farm_ci = '$ci'";
        $qTMP = pg_query($rmfAdm, $rs);
        if ($row = pg_fetch_array($qTMP)) {
            $idRow = trim($row[0]);
        }
        $id = $idRow;
        if ($id == $ci) {
            header('Content-Type: application/json');
            $var_consulta = "UPDATE ctg_farmaceuticos SET ctg_farm_citpo = '$ci_tpo',ctg_farm_colfar = '$colfar',ctg_farm_msds = '$msds',ctg_farm_inprefar = '$inprefar',ctg_farm_nme1 = '$first_name',ctg_farm_ape1 = '$last_name',ctg_farm_nombre = '$Name',ctg_farm_telpar = '$tel',ctg_farm_telcel = '$cel',ctg_farm_email1 = '$email1',ctg_farm_email2 = '$email2',ctg_geo_id = '$geo_desc',ctg_farm_dir = '$dir',ctg_farm_patro = $patro,ctg_farm_rege = $rege,ctg_farm_obs = '$obs',ctg_farm_sta = '$estatus',ctg_farm_usr = '$userId',ctg_farm_dt = '$fechaIng' WHERE ctg_farm_ci = '$ci'";
            print_r($var_consulta);
            $val = 1;
            if (pg_query($rmfAdm, $var_consulta)) {
                $arrInfo['status'] = $val;
            } else {
                $arrInfo['status'] = 0;
                $arrInfo['error'] = $var_consulta;
            }
            print json_encode($arrInfo);
        } else {
            $rs = "SELECT ctg_id FROM ctg_farmaceuticos ORDER BY ctg_id DESC LIMIT 1";
            $qTMP = pg_query($rmfAdm, $rs);
            print_r($rs);
            if ($row = pg_fetch_array($qTMP)) {
                $id = trim($row[0]);
            }
            $idMax = $id + 1;
            header('Content-Type: application/json');
            $var_consulta = "INSERT INTO ctg_farmaceuticos (ctg_farm_ci,ctg_farm_citpo,ctg_farm_colfar,ctg_farm_msds,ctg_farm_inprefar,ctg_farm_nme1,ctg_farm_ape1,ctg_farm_nombre,ctg_farm_telpar,ctg_farm_telcel,ctg_farm_email1,ctg_farm_email2,ctg_geo_id,ctg_farm_dir,ctg_farm_patro,ctg_farm_rege,ctg_farm_obs,ctg_farm_sta,ctg_farm_usr,ctg_farm_dt,ctg_id) VALUES ('$ci','$ci_tpo','$colfar','$msds','$inprefar','$first_name','$last_name','$Name','$tel','$cel','$email1','$email2','$geo_desc','$dir',$patro,$rege,'$obs','$estatus','$userId','$fechaIng',$idMax)";
            $val = 1;
            if (pg_query($rmfAdm, $var_consulta)) {
                $arrInfo['status'] = $val;
            } else {
                $arrInfo['status'] = 0;
                $arrInfo['error'] = $var_consulta;
            }
            print json_encode($arrInfo);
            
        }
        die();
    }

    //DFDA
    else if ($strTipoValidacion == "proces_insert_dfda") {
        $arrDataId = array();
        $var_consulta = "SELECT * FROM vus_usuarios_solicitud_registro_productos WHERE vus_solreg_p_sta = '1' AND vus_solreg_p_id = '$userId'";
        //print $var_consulta;
        $arrFiltroProductos = array();
        $qTMP = pg_query($rmfUser, $var_consulta);
        while ($rTMP = pg_fetch_assoc($qTMP)) {


            $arrDataId[$rTMP["vus_solreg_p_id"]]["vus_solreg_p_id"]                 = $rTMP["vus_solreg_p_id"];
            $arrDataId[$rTMP["vus_solreg_p_id"]]["vus_solreg_p_on"]                 = $rTMP["vus_solreg_p_on"];
            $arrDataId[$rTMP["vus_solreg_p_id"]]["vus_solreg_tpr_id"]                 = $rTMP["vus_solreg_tpr_id"];
            $arrFiltroProductos[$rTMP["vus_solreg_tpr_id"]] = " '{$rTMP["vus_solreg_tpr_id"]}' ";
        }
        pg_free_result($qTMP);

        $arrData = array();
        $strFilterProductos = (count($arrFiltroProductos) > 0) ? implode(',', $arrFiltroProductos) : "0";
        $var_consulta = "SELECT * FROM ctg_tipo_productos WHERE ctg_tpr_id IN ($strFilterProductos) ";
        //print $var_consulta;
        $qTMP = pg_query($rmfAdm, $var_consulta);
        while ($rTMP = pg_fetch_assoc($qTMP)) {

            $arrData[$rTMP["ctg_tpr_id"]]["ctg_tpr_id"]                 = $rTMP["ctg_tpr_id"];
            $arrData[$rTMP["ctg_tpr_id"]]["ctg_tpr_desc"]                 = $rTMP["ctg_tpr_desc"];
        }
        pg_free_result($qTMP);

        if (is_array($arrData) && (count($arrData) > 0)) {
            $intContador = 1;
            reset($arrData);
            foreach ($arrData as $rTMP['key'] => $rTMP['value']) {

                $isp_on = isset($_POST["usp_on"]) ? $_POST["usp_on"]  : '1';

                $tpr_id =  $rTMP["value"]['ctg_tpr_id'];
                $isp_on = 1;

                header('Content-Type: application/json');
                $var_consulta = "INSERT INTO vus_usuarios_productos (vus_usp_id,vus_usp_tpr_id,vus_usp_on,vus_usp_ven,vus_usp_sta,vus_usp_usr,vus_usp_dt) VALUES ($userId,'$tpr_id',$isp_on,'$VenDere','$estatus','$usuario','$fechaIng')";
                //print $var_consulta;
                $val = 1;
                if (pg_query($rmfUser, $var_consulta)) {
                    $arrInfo['status'] = $val;
                } else {
                    $arrInfo['status'] = 0;
                    $arrInfo['error'] = $var_consulta;
                }
                print json_encode($arrInfo);
            }
        }
        die();
    }

    //DIBUJO DE TABLA PRODUCTOS CATEGORIAS
    else if ($strTipoValidacion == "busqueda_tabla") {
        $strCategori = isset($_POST["categori"]) ? $_POST["categori"]  : '';
        $strSearch = isset($_POST["Search"]) ? $_POST["Search"]  : '';

        $strFilter = "";
        if (!empty($strSearch)) {
            $strFilter = " AND ( UPPER(a.vus_solreg_nombre) LIKE UPPER('%{$strSearch}%') ) ";
        }

        $arrTypeMessage = array();
        $var_consulta = "SELECT a.*,b.* 
                            FROM vus_usuarios_solicitud_registro a, 
                            vus_usuarios_solicitud_registro_productos b 
                            WHERE a.vus_solreg_id = b.vus_solreg_p_id 
                            AND b.vus_solreg_tpr_id = '$strCategori' 
                            AND a.vus_solreg_estatus = 0 
                            $strFilter
                            ORDER BY a.vus_solreg_id";

        $qTMP = pg_query($rmfUser, $var_consulta);
        //echo $var_consulta;
        while ($rTMP = pg_fetch_assoc($qTMP)) {

            $arrTypeMessage[$rTMP["vus_id"]]["vus_id"]                 = $rTMP["vus_id"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_id"]                 = $rTMP["vus_solreg_id"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_fecsol"]                 = $rTMP["vus_solreg_fecsol"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_alias"]                 = $rTMP["vus_solreg_alias"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_tipcta"]                 = $rTMP["vus_solreg_tipcta"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_ci"]                 = $rTMP["vus_solreg_ci"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_ci_tpo"]                 = $rTMP["vus_solreg_ci_tpo"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_colfar"]                 = $rTMP["vus_solreg_colfar"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_msds"]                 = $rTMP["vus_solreg_msds"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_inprefar"]                 = $rTMP["vus_solreg_inprefar"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_nme1"]                 = $rTMP["vus_solreg_nme1"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_nme2"]                 = $rTMP["vus_solreg_nme2"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_ape1"]                 = $rTMP["vus_solreg_ape1"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_ape2"]                 = $rTMP["vus_solreg_ape2"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_nombre"]                 = $rTMP["vus_solreg_nombre"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_emp_rif"]                 = $rTMP["vus_solreg_emp_rif"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_password"]                 = $rTMP["vus_solreg_password"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_email"]                 = $rTMP["vus_solreg_email"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_tel"]                 = $rTMP["vus_solreg_tel"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_cel"]                 = $rTMP["vus_solreg_cel"];
            $arrTypeMessage[$rTMP["vus_id"]]["ctg_geo_id"]                 = $rTMP["ctg_geo_id"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_urb"]                 = $rTMP["vus_solreg_urb"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_ave"]                 = $rTMP["vus_solreg_ave"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_edi"]                 = $rTMP["vus_solreg_edi"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_pis"]                 = $rTMP["vus_solreg_pis"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_codpos"]                 = $rTMP["vus_solreg_codpos"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_punref"]                 = $rTMP["vus_solreg_punref"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_estatus"]                 = $rTMP["vus_solreg_estatus"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_estatus_aut"]                 = $rTMP["vus_solreg_estatus_aut"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_estatus_rec"]                 = $rTMP["vus_solreg_estatus_rec"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_obs"]                 = $rTMP["vus_solreg_obs"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_dir"]                 = $rTMP["vus_solreg_dir"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_ciudad"]                 = $rTMP["vus_solreg_ciudad"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_origen"]                 = $rTMP["vus_solreg_origen"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_emptpo"]                 = $rTMP["vus_solreg_emptpo"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_file1"]                 = $rTMP["vus_solreg_file1"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_file2"]                 = $rTMP["vus_solreg_file2"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_file3"]                 = $rTMP["vus_solreg_file3"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_file4"]                 = $rTMP["vus_solreg_file4"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_file5"]                 = $rTMP["vus_solreg_file5"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_file6"]                 = $rTMP["vus_solreg_file6"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_file7"]                 = $rTMP["vus_solreg_file7"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_file8"]                 = $rTMP["vus_solreg_file8"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_file9"]                 = $rTMP["vus_solreg_file9"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_sta"]                 = $rTMP["vus_solreg_sta"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_usr"]                 = $rTMP["vus_solreg_usr"];
            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_dt"]                 = $rTMP["vus_solreg_dt"];

            $arrTypeMessage[$rTMP["vus_id"]]["vus_solreg_tpr_id"]                 = $rTMP["vus_solreg_tpr_id"];
        }
        pg_free_result($qTMP);

?>
        <div class="col-md-12 tableFixHead">
            <table id="tableData" class="table table-bordered table-striped table-hover table-sm">
                <thead>
                    <tr class="table-info">
                        <th>Application number </th>
                        <th>Date</th>
                        <th>User name</th>
                        <th>Account type </th>
                        <th>E-mail </th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (is_array($arrTypeMessage) && (count($arrTypeMessage) > 0)) {
                        $intContador = 1;
                        reset($arrTypeMessage);
                        foreach ($arrTypeMessage as $rTMP['key'] => $rTMP['value']) {
                    ?>
                            <tr style="cursor:pointer;" onclick="fntSelect('<?php print $intContador; ?>');">
                                <td WIDTH="5%"><?php echo  $rTMP["value"]['vus_solreg_id']; ?></td>
                                <td WIDTH="5%"><?php echo  $rTMP["value"]['vus_solreg_fecsol']; ?></td>
                                <td><?php echo  $rTMP["value"]['vus_solreg_nombre']; ?></td>
                                <td>
                                    <?php
                                    if ($rTMP["value"]['vus_solreg_tipcta'] == 1) {
                                        echo 'Patrocinante';
                                    } else if ($rTMP["value"]['vus_solreg_tipcta'] == 2) {
                                        echo 'Empresa';
                                    } else if ($rTMP["value"]['vus_solreg_tipcta'] == 3) {
                                        echo 'Persona_individual';
                                    } else if ($rTMP["value"]['vus_solreg_tipcta'] == 4) {
                                        echo 'Funcionario_msds';
                                    }
                                    ?>
                                </td>
                                <td><?php echo  $rTMP["value"]['vus_solreg_email']; ?></td>
                                <td><?php
                                    if ($rTMP["value"]['vus_solreg_estatus'] == 0) {
                                        echo 'Pending';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <input type="hidden" name="hid_num_sol<?php print $intContador; ?>" id="hid_num_sol<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_solreg_id']; ?>">
                            <input type="hidden" name="hid_codigo_des<?php print $intContador; ?>" id="hid_codigo_des<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_id']; ?>">
                            <input type="hidden" name="hid_fecsol<?php print $intContador; ?>" id="hid_fecsol<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_solreg_fecsol']; ?>">
                            <input type="hidden" name="hid_tipcta_desc<?php print $intContador; ?>" id="hid_tipcta_desc<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_solreg_tipcta']; ?>"><!-- ACCOUNT TYPE-->
                            <input type="hidden" name="hid_alias<?php print $intContador; ?>" id="hid_alias<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_solreg_alias']; ?>">
                            <input type="hidden" name="hid_statusOne<?php print $intContador; ?>" id="hid_statusOne<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_solreg_estatus']; ?>"> <!-- STATUS -->
                            <input type="hidden" name="hid_email<?php print $intContador; ?>" id="hid_email<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_solreg_email']; ?>">
                            <input type="hidden" name="hid_pass<?php print $intContador; ?>" id="hid_pass<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_solreg_password']; ?>">

                            <input type="hidden" name="hid_first_name<?php print $intContador; ?>" id="hid_first_name<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_solreg_nme1']; ?>">
                            <input type="hidden" name="hid_last_name<?php print $intContador; ?>" id="hid_last_name<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_solreg_ape1']; ?>">
                            <input type="hidden" name="hid_ci<?php print $intContador; ?>" id="hid_ci<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_solreg_ci']; ?>">
                            <input type="hidden" name="hid_tel<?php print $intContador; ?>" id="hid_tel<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_solreg_tel']; ?>">
                            <input type="hidden" name="hid_cel<?php print $intContador; ?>" id="hid_cel<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_solreg_cel']; ?>">
                            <input type="hidden" name="hid_geo_desc<?php print $intContador; ?>" id="hid_geo_desc<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['ctg_geo_id']; ?>">
                            <input type="hidden" name="hid_dir<?php print $intContador; ?>" id="hid_dir<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_solreg_dir']; ?>">
                            <input type="hidden" name="hid_codpos<?php print $intContador; ?>" id="hid_codpos<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_solreg_codpos']; ?>">

                            <input type="hidden" name="hid_tpr_g<?php print $intContador; ?>" id="hid_tpr_g<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_solreg_tpr_id']; ?>">

                            <input type="hidden" name="hid_estatus<?php print $intContador; ?>" id="hid_estatus<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_solreg_estatus']; ?>">
                            <input type="hidden" name="hid_obs<?php print $intContador; ?>" id="hid_obs<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_solreg_obs']; ?>">

                            <input type="hidden" name="hid_rif<?php print $intContador; ?>" id="hid_rif<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_solreg_emp_rif']; ?>">

                            <input type="hidden" name="hid_doc1<?php print $intContador; ?>" id="hid_doc1<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_solreg_file1']; ?>">
                            <input type="hidden" name="hid_doc2<?php print $intContador; ?>" id="hid_doc2<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_solreg_file2']; ?>">
                            <input type="hidden" name="hid_doc3<?php print $intContador; ?>" id="hid_doc3<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_solreg_file3']; ?>">
                            <input type="hidden" name="hid_doc4<?php print $intContador; ?>" id="hid_doc4<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_solreg_file4']; ?>">
                            <input type="hidden" name="hid_doc5<?php print $intContador; ?>" id="hid_doc5<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_solreg_file5']; ?>">
                            <input type="hidden" name="hid_doc6<?php print $intContador; ?>" id="hid_doc6<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_solreg_file6']; ?>">
                            <input type="hidden" name="hid_doc7<?php print $intContador; ?>" id="hid_doc7<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_solreg_file7']; ?>">
                            <input type="hidden" name="hid_doc8<?php print $intContador; ?>" id="hid_doc8<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_solreg_file8']; ?>">
                            <input type="hidden" name="hid_doc9<?php print $intContador; ?>" id="hid_doc9<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_solreg_file9']; ?>">

                    <?PHP
                            $intContador++;
                        }

                        die();
                    }
                    ?>
                </tbody>
            </table>
        </div>



    <?php
        die();
    } else if ($strTipoValidacion == "vus_solreg_ids") {
        require_once '../../interbase/tmfUser.php';
        $vus_solreg_id = isset($_POST["hid_codigo_des"]) ? $_POST["hid_codigo_des"]  : '';
        $arrDataId = array();
        $var_consulta = "SELECT * FROM vus_usuarios_solicitud_registro_productos WHERE vus_solreg_p_sta = '1' AND vus_solreg_p_id = '$vus_solreg_id'";
        //print $var_consulta;
        $arrFiltroProductos = array();
        $qTMP = pg_query($rmfUser, $var_consulta);
        while ($rTMP = pg_fetch_assoc($qTMP)) {


            $arrDataId[$rTMP["vus_solreg_p_id"]]["vus_solreg_p_id"]                 = $rTMP["vus_solreg_p_id"];
            $arrDataId[$rTMP["vus_solreg_p_id"]]["vus_solreg_p_on"]                 = $rTMP["vus_solreg_p_on"];
            $arrDataId[$rTMP["vus_solreg_p_id"]]["vus_solreg_tpr_id"]                 = $rTMP["vus_solreg_tpr_id"];
            $arrFiltroProductos[$rTMP["vus_solreg_tpr_id"]] = " '{$rTMP["vus_solreg_tpr_id"]}' ";
        }
        pg_free_result($qTMP);

        $arrData = array();
        $strFilterProductos = (count($arrFiltroProductos) > 0) ? implode(',', $arrFiltroProductos) : "0";
        require_once '../../interbase/tmfAdm.php';
        $var_consulta = "SELECT * FROM ctg_tipo_productos WHERE ctg_tpr_id IN ($strFilterProductos) ";
        //print $var_consulta;
        $qTMP = pg_query($rmfAdm, $var_consulta);
        while ($rTMP = pg_fetch_assoc($qTMP)) {

            $arrData[$rTMP["ctg_tpr_id"]]["ctg_tpr_id"]                 = $rTMP["ctg_tpr_id"];
            $arrData[$rTMP["ctg_tpr_id"]]["ctg_tpr_desc"]                 = $rTMP["ctg_tpr_desc"];
        }
        pg_free_result($qTMP);

    ?>
        <?php
        if (is_array($arrData) && (count($arrData) > 0)) {
            $intContador = 1;
            reset($arrData);
            foreach ($arrData as $rTMP['key'] => $rTMP['value']) {
        ?>
                <div class="col-sm-6">
                    <div class="form-check" style="text-align: left !important;">
                        <input type="checkbox" value="1" name="<?php echo  $rTMP["value"]['ctg_tpr_desc']; ?>" id="<?php echo  $rTMP["value"]['ctg_tpr_desc']; ?>" class="form-check-input">
                        <input type="hidden" name="<?php echo  $rTMP["value"]['ctg_tpr_desc']; ?>_" id="<?php echo  $rTMP["value"]['ctg_tpr_desc']; ?>_" class="form-check-input">
                        <label class="form-check-label"><?php echo  $rTMP["value"]['ctg_tpr_desc']; ?></label>
                    </div>
                </div>

        <?PHP

            }
        }
        ?>
    <?php
        die();
    } else if ($strTipoValidacion == "data_company") {
        require_once '../../interbase/tmfAdm.php';
        $vus_solreg_emp_rif = isset($_POST["rif"]) ? $_POST["rif"]  : '';
        $arrCompany = array();
        $var_consulta = "SELECT * FROM ctg_empresas WHERE ctg_emp_rif = '$vus_solreg_emp_rif'";

        $qTMP = pg_query($rmfAdm, $var_consulta);
        while ($rTMP = pg_fetch_assoc($qTMP)) {

            $arrCompany[$rTMP["ctg_id"]]["ctg_id"]                 = $rTMP["ctg_id"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_rif"]                 = $rTMP["ctg_emp_rif"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_tpoper"]                 = $rTMP["ctg_emp_tpoper"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_origen"]                 = $rTMP["ctg_emp_origen"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_nombre"]                 = $rTMP["ctg_emp_nombre"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_nit"]                 = $rTMP["ctg_emp_nit"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_ci"]                 = $rTMP["ctg_emp_ci"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_ci_tpo"]                 = $rTMP["ctg_emp_ci_tpo"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_geo_id"]                 = $rTMP["ctg_geo_id"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_urb"]                 = $rTMP["ctg_emp_urb"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_ave"]                 = $rTMP["ctg_emp_ave"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_edi"]                 = $rTMP["ctg_emp_edi"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_piso"]                 = $rTMP["ctg_emp_piso"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_codpos"]                 = $rTMP["ctg_emp_codpos"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_punref"]                 = $rTMP["ctg_emp_punref"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_ciudad"]                 = $rTMP["ctg_emp_ciudad"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_dir"]                 = $rTMP["ctg_emp_dir"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_dir_c"]                 = $rTMP["ctg_emp_dir_c"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_tels"]                 = $rTMP["ctg_emp_tels"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_fax"]                 = $rTMP["ctg_emp_fax"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_email1"]                 = $rTMP["ctg_emp_email1"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_email2"]                 = $rTMP["ctg_emp_email2"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_pweb"]                 = $rTMP["ctg_emp_pweb"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_tit"]                 = $rTMP["ctg_emp_tit"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_prop"]                 = $rTMP["ctg_emp_prop"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_fabr1"]                 = $rTMP["ctg_emp_fabr1"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_enva"]                 = $rTMP["ctg_emp_enva"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_impo"]                 = $rTMP["ctg_emp_impo"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_dist"]                 = $rTMP["ctg_emp_dist"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_repr"]                 = $rTMP["ctg_emp_repr"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_acon"]                 = $rTMP["ctg_emp_acon"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_alma"]                 = $rTMP["ctg_emp_alma"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_labo"]                 = $rTMP["ctg_emp_labo"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_farm_id"]                 = $rTMP["ctg_emp_farm_id"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_obs"]                 = $rTMP["ctg_emp_obs"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_estatus"]                 = $rTMP["ctg_emp_estatus"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_fabr2"]                 = $rTMP["ctg_emp_fabr2"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_fabr3"]                 = $rTMP["ctg_emp_fabr3"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_fabr4"]                 = $rTMP["ctg_emp_fabr4"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_fabr5"]                 = $rTMP["ctg_emp_fabr5"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_fabr6"]                 = $rTMP["ctg_emp_fabr6"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_fabr7"]                 = $rTMP["ctg_emp_fabr7"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_fabr"]                 = $rTMP["ctg_emp_fabr"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_pesc"]                 = $rTMP["ctg_emp_pesc"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_penc"]                 = $rTMP["ctg_emp_penc"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_geo_dep_id"]                 = $rTMP["ctg_geo_dep_id"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_geo_mun_id"]                 = $rTMP["ctg_geo_mun_id"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_aldea"]                 = $rTMP["ctg_emp_aldea"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_catef"]                 = $rTMP["ctg_emp_catef"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_numlic"]                 = $rTMP["ctg_emp_numlic"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_estlic"]                 = $rTMP["ctg_emp_estlic"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_fec_aut"]                 = $rTMP["ctg_emp_fec_aut"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_fec_ven"]                 = $rTMP["ctg_emp_fec_ven"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_fec_can"]                 = $rTMP["ctg_emp_fec_can"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_fec_sus"]                 = $rTMP["ctg_emp_fec_sus"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_fec_ren"]                 = $rTMP["ctg_emp_fec_ren"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_can_obs"]                 = $rTMP["ctg_emp_can_obs"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_sus_obs"]                 = $rTMP["ctg_emp_sus_obs"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_ren_obs"]                 = $rTMP["ctg_emp_ren_obs"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_rol_id"]                 = $rTMP["ctg_rol_id"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_ultinsp_fec"]                 = $rTMP["ctg_emp_ultinsp_fec"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_ultinsp_obs"]                 = $rTMP["ctg_emp_ultinsp_obs"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_catgid"]                 = $rTMP["ctg_emp_catgid"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_catgdes"]                 = $rTMP["ctg_emp_catgdes"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_remi"]                 = $rTMP["ctg_emp_remi"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_dtc"]                 = $rTMP["ctg_emp_dtc"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_geo_desc"]                 = $rTMP["ctg_geo_desc"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_sta"]                 = $rTMP["ctg_emp_sta"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_usr"]                 = $rTMP["ctg_emp_usr"];
            $arrCompany[$rTMP["ctg_id"]]["ctg_emp_dt"]                 = $rTMP["ctg_emp_dt"];
        }
        pg_free_result($qTMP);
    ?>
        <?php
        if (is_array($arrCompany) && (count($arrCompany) > 0)) {
            $intContador = 1;
            reset($arrCompany);
            foreach ($arrCompany as $rTMP['key'] => $rTMP['value']) {
        ?>

                <input type="hidden" name="hid_nombre" id="hid_nombre" value="<?php echo  $rTMP["value"]['ctg_emp_nombre']; ?>">
                <input type="hidden" name="hid_tels" id="hid_tels" value="<?php echo  $rTMP["value"]['ctg_emp_tels']; ?>">
                <input type="hidden" name="hid_fax" id="hid_fax" value="<?php echo  $rTMP["value"]['ctg_emp_fax']; ?>">
                <input type="hidden" name="hid_email1" id="hid_email1" value="<?php echo  $rTMP["value"]['ctg_emp_email1']; ?>">
                <input type="hidden" name="hid_email2" id="hid_email2" value="<?php echo  $rTMP["value"]['ctg_emp_email2']; ?>">
                <input type="hidden" name="hid_pweb" id="hid_pweb" value="<?php echo  $rTMP["value"]['ctg_emp_pweb']; ?>">
        <?PHP

            }
        }
        die();
    } else if ($strTipoValidacion == "data_dowload") {

        $vus_solreg_id = isset($_POST["vus_solreg_id"]) ? $_POST["vus_solreg_id"]  : '';
        $vus_solreg_fecsol = isset($_POST["vus_solreg_fecsol"]) ? $_POST["vus_solreg_fecsol"]  : '';

        //name docs 
        $docName1 = isset($_POST["doc1"]) ? $_POST["doc1"]  : '';
        $docName2 = isset($_POST["doc2"]) ? $_POST["doc2"]  : '';
        $docName3 = isset($_POST["doc3"]) ? $_POST["doc3"]  : '';
        $docName4 = isset($_POST["doc4"]) ? $_POST["doc4"]  : '';
        $docName5 = isset($_POST["doc5"]) ? $_POST["doc5"]  : '';
        $docName6 = isset($_POST["doc6"]) ? $_POST["doc6"]  : '';
        $docName7 = isset($_POST["doc7"]) ? $_POST["doc7"]  : '';
        $docName8 = isset($_POST["doc8"]) ? $_POST["doc8"]  : '';
        $docName9 = isset($_POST["doc9"]) ? $_POST["doc9"]  : '';

        //type count
        $IdDocument = isset($_POST["tipcta_desc"]) ? $_POST["tipcta_desc"]  : 1;

        //ADITIONAL DOCUMENT
        //name documents variables temporal
        $strDoc1Name = "Dictamen o nombramiento  otorgado al quimico farmaceutico ";
        $strDoc2Name = "Poder que lo designe como representante de la empresa";
        $strDoc3Name = "Nombramiento otorgado al profesional responsable que lo acredite como Director Tecnico";
        $strDoc4Name = "Poder o  comunicacion que lo designe como funcionario";
        $strDoc5Name = "Licencia Sanitaria de la Empresa";
        $strDoc6Name = "Carnet o RTU del numero de identificacion tributaria del Farmaceutico Responsable";
        $strDoc7Name = "Documento de identificacion personal ";
        $strDoc8Name = "Firma grafica ";
        $strDoc9Name = "Certificado de Instalacion y funcionamiento de la casa de representacion";
        //required document validate
        $strDoc1 = false; // Dictamen o nombramiento  otorgado al quimico farmaceutico 
        $strDoc2 = false; // Poder que lo designe como representante de la empresa
        $strDoc3 = false; // Nombramiento otorgado al profesional responsable que lo acredite como Director Tecnico
        $strDoc4 = false; // Poder o  comunicacion que lo designe como funcionario
        $strDoc5 = false; // Licencia Sanitaria de la Empresa
        $strDoc6 = false; // Carnet o RTU del numero de identificacion tributaria del Farmaceutico Responsable
        $strDoc7 = false; // Documento de identificacion personal 
        $strDoc8 = false; // Firma grafica 
        $strDoc9 = false; // Certificado de Instalacion y funcionamiento de la casa de representacion
        $id = isset($vus_solreg_id) ? intval($vus_solreg_id)  : 0;
        $fecsol = isset($vus_solreg_fecsol) ? trim($vus_solreg_fecsol)  : 0;
        $year = date("Y", strtotime($fecsol));
        $month = date("m", strtotime($fecsol));

        $htpp = "http://";
        $htpps = "https://";

        if ($ip_int == $ip_ext) {
            $ipServer = $htpp . $ip_int;
        } else if ($ip_int <> $ip_ext) {
            $ipServer = $htpps . $ip_ext;
        };

        $urlDoc =  $ipServer . "/" . $location_vus . "/docs/solicitudes/" . $id . "_" . $year . "_" . $month . "/";

        switch ($country) {
            case "VEN":
                switch ($IdDocument) {
                    case 1:
                        $strDoc1 = false;
                        $strDoc5 = false;
                        $strDoc6 = true;
                        $strDoc7 = true;
                        $strDoc8 = true;
                        break;
                    case 2:
                        $strDoc2 = true;
                        $strDoc5 = false;
                        $strDoc6 = true;
                        $strDoc8 = false;
                        $strDoc9 = true;
                        break;
                    case 3:
                        $strDoc3 = false;
                        $strDoc5 = false;
                        $strDoc6 = true;
                        $strDoc7 = true;
                        $strDoc8 = true;
                        break;
                    case 4:
                        $strDoc4 = true;
                        $strDoc7 = true;
                        $strDoc8 = true;
                        break;
                }
                break;
            case "GUT":
                switch ($IdDocument) {
                    case 1:
                        $strDoc1 = true;
                        $strDoc5 = false;
                        $strDoc6 = true;
                        $strDoc7 = true;
                        $strDoc8 = true;
                        break;
                    case 2:
                        $strDoc2 = true;
                        $strDoc5 = true;
                        $strDoc6 = true;
                        $strDoc8 = true;
                        $strDoc9 = true;
                        break;
                    case 3:
                        $strDoc3 = true;
                        $strDoc5 = true;
                        $strDoc6 = true;
                        $strDoc7 = true;
                        $strDoc8 = true;
                        break;
                    case 4:
                        $strDoc4 = true;
                        $strDoc7 = true;
                        $strDoc8 = true;
                        break;
                }
                break;
            case "PAK":
                switch ($IdDocument) {
                    case 1:
                        $strDoc1 = true;
                        $strDoc5 = false;
                        $strDoc6 = true;
                        $strDoc7 = true;
                        $strDoc8 = true;
                        break;
                    case 2:
                        $strDoc2 = true;
                        $strDoc5 = true;
                        $strDoc6 = true;
                        $strDoc8 = true;
                        $strDoc9 = true;
                        break;
                    case 3:
                        $strDoc3 = true;
                        $strDoc5 = true;
                        $strDoc6 = true;
                        $strDoc7 = true;
                        $strDoc8 = true;
                        break;
                    case 4:
                        $strDoc4 = true;
                        $strDoc7 = true;
                        $strDoc8 = true;
                        break;
                }
                break;
            case "MMR":
                switch ($IdDocument) {
                    case 1:
                        $strDoc2 = true;
                        $strDoc7 = true;
                        $strDoc8 = true;
                        break;
                    case 2:
                        $strDoc1 = true;
                        $strDoc5 = false;
                        $strDoc6 = true;
                        $strDoc7 = true;
                        $strDoc8 = true;
                        break;
                    case 3:
                        $strDoc3 = false;
                        $strDoc5 = false;
                        $strDoc6 = false;
                        $strDoc7 = true;
                        $strDoc8 = true;
                        break;
                    case 4:
                        $strDoc4 = false;
                        $strDoc7 = true;
                        $strDoc8 = true;
                        break;
                }
                break;
            case "THA":
                switch ($IdDocument) {
                    case 1:
                        $strDoc2 = true;
                        $strDoc7 = true;
                        $strDoc8 = true;
                        break;
                    case 2:
                        $strDoc1 = true;
                        $strDoc5 = false;
                        $strDoc6 = true;
                        $strDoc7 = true;
                        $strDoc8 = true;
                        break;
                    case 3:
                        $strDoc3 = true;
                        $strDoc5 = true;
                        $strDoc6 = true;
                        $strDoc7 = true;
                        $strDoc8 = true;
                        break;
                    case 4:
                        $strDoc4 = false;
                        $strDoc7 = true;
                        $strDoc8 = true;
                        break;
                }
                break;
        }
        ?>
        <table id="tableData" class="table table-hover table-dark table-sm">
            <tbody>
                <?php if ($strDoc1) { ?>
                    <tr id="fa">
                        <td WIDTH="3%">1</td>
                        <td WIDTH="87%"><?php echo  $strDoc1Name; ?></td>
                        <td WIDTH="5%"><a href="<?php echo  $urlDoc . $docName1; ?>" target="_blank" name="file1" id="file1"> <i class="fas fa-eye"></i></a></td>
                        <td WIDTH="5%"><a href="<?php echo  $urlDoc . $docName1; ?>" download="NombreDelArchivo" name="file1" id="file1"><i class="fas fa-file-download"></i></a></td>
                    </tr>
                <?php } ?>
                <?php if ($strDoc2) { ?>
                    <tr id="fb">
                        <td WIDTH="3%">2</td>
                        <td WIDTH="87%"><?php echo  $strDoc2Name ?></td>
                        <td WIDTH="5%"><a href="<?php echo  $urlDoc . $docName2; ?>" target="_blank" name="file2" id="file2"><i class="fas fa-eye"></i></a></td>
                        <td WIDTH="5%"><a href="<?php echo  $urlDoc . $docName2; ?>" download="NombreDelArchivo" name="file2" id="file2"><i class="fas fa-file-download"></i></a></td>
                    </tr>
                <?php } ?>
                <?php if ($strDoc3) { ?>
                    <tr id="fc">
                        <td WIDTH="3%">3</td>
                        <td WIDTH="87%"><?php echo  $strDoc3Name; ?></td>
                        <td WIDTH="5%"><a href="<?php echo  $urlDoc . $docName3; ?>" target="_blank" name="file3" id="file3"><i class="fas fa-eye"></i></a></td>
                        <td WIDTH="5%"><a href="<?php echo  $urlDoc . $docName3; ?>" download="NombreDelArchivo" name="file3" id="file3"><i class="fas fa-file-download"></i></a></td>
                    </tr>
                <?php } ?>
                <?php if ($strDoc4) { ?>
                    <tr id="fd">
                        <td WIDTH="3%">4</td>
                        <td WIDTH="87%"><?php echo  $strDoc4Name; ?></td>
                        <td WIDTH="5%"><a href="<?php echo  $urlDoc . $docName4; ?>" target="_blank" name="file4" id="file4"><i class="fas fa-eye"></i></a></td>
                        <td WIDTH="5%"><a href="<?php echo  $urlDoc . $docName4; ?>" download="NombreDelArchivo" name="file4" id="file4"><i class="fas fa-file-download"></i></a></td>
                    </tr>
                <?php } ?>
                <?php if ($strDoc5) { ?>
                    <tr id="fe">
                        <td WIDTH="3%">5</td>
                        <td WIDTH="87%"><?php echo  $strDoc5Name; ?></td>
                        <td WIDTH="5%"><a href="<?php echo  $urlDoc . $docName5; ?>" target="_blank" name="file5" id="file5"><i class="fas fa-eye"></i></a></td>
                        <td WIDTH="5%"><a href="<?php echo  $urlDoc . $docName5; ?>" download="NombreDelArchivo" name="file5" id="file5"><i class="fas fa-file-download"></i></a></td>
                    </tr>
                <?php } ?>
                <?php if ($strDoc6) { ?>
                    <tr id="ff">
                        <td WIDTH="3%">6</td>
                        <td WIDTH="87%"><?php echo  $strDoc6Name; ?></td>
                        <td WIDTH="5%"><a href="<?php echo  $urlDoc . $docName6; ?>" target="_blank" name="file6" id="file6"><i class="fas fa-eye"></i></a></td>
                        <td WIDTH="5%"><a href="<?php echo  $urlDoc . $docName6; ?>" download="NombreDelArchivo" name="file6" id="file6"><i class="fas fa-file-download"></i></a></td>
                    </tr>
                <?php } ?>
                <?php if ($strDoc7) { ?>
                    <tr id="fg">
                        <td WIDTH="3%">7</td>
                        <td WIDTH="87%"><?php echo  $strDoc7Name; ?></td>
                        <td WIDTH="5%"><a href="<?php echo  $urlDoc . $docName7; ?>" target="_blank" name="file7" id="file7"><i class="fas fa-eye"></i></a></td>
                        <td WIDTH="5%"><a href="<?php echo  $urlDoc . $docName7; ?>" download="NombreDelArchivo" name="file7" id="file7"><i class="fas fa-file-download"></i></a></td>
                    </tr>
                <?php } ?>
                <?php if ($strDoc8) { ?>
                    <tr id="fh">
                        <td WIDTH="3%">8</td>
                        <td WIDTH="87%"><?php echo  $strDoc8Name; ?></td>
                        <td WIDTH="5%"><a href="<?php echo  $urlDoc . $docName8; ?>" target="_blank" name="file8" id="file8"><i class="fas fa-eye"></i></a></td>
                        <td WIDTH="5%"><a href="<?php echo  $urlDoc . $docName8; ?>" download="NombreDelArchivo" name="file8" id="file8"><i class="fas fa-file-download"></i></a></td>
                    </tr>
                <?php } ?>
                <?php if ($strDoc9) { ?>
                    <tr id="fh">
                        <td WIDTH="3%">9</td>
                        <td WIDTH="87%"><?php echo  $strDoc9Name; ?></td>
                        <td WIDTH="5%"><a href="<?php echo  $urlDoc . $docName9; ?>" target="_blank" name="file9" id="file9"><i class="fas fa-eye"></i></a></td>
                        <td WIDTH="5%"><a href="<?php echo  $urlDoc . $docName9; ?>" download="NombreDelArchivo" name="file9" id="file9"><i class="fas fa-file-download"></i></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
<?php

        die();
    }

    die();
}
?>

<?php
require_once '../../interbase/tmfAdm.php';
$userid = $_SESSION['adm_usr_ci'];
$arrTypeProduct = array();
$var_consulta = "SELECT prod.*, user_prod.* 
                    FROM ctg_tipo_productos prod
                    INNER JOIN adm_usuarios_productos user_prod
                    ON user_prod.adm_ust_tpr_id = prod.ctg_tpr_id
                    WHERE prod.ctg_tpr_on = '1'
                    AND prod.ctg_tpr_id <> '99'
                    AND user_prod.adm_ust_ci = '$userid'
                    ORDER BY prod.ctg_tpr_id";

$qTMP = pg_query($rmfAdm, $var_consulta);
while ($rTMP = pg_fetch_assoc($qTMP)) {

    $arrTypeProduct[$rTMP["ctg_tpr_id"]]["ctg_id"]                 = $rTMP["ctg_id"];
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