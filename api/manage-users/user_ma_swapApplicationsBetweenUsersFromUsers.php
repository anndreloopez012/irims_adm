<?php
//GLOBAL VARIABLE
require_once '../../api/var_global.php';

// VALIDATION INSERT UPDATE DELETE
if (isset($_GET["validaciones"]) && !empty($_GET["validaciones"])) {
    require_once '../../interbase/tmfUser.php';

    //PERSONAL INFORMATION NEW USER
    $first_name = isset($_POST["codigo_des"]) ? $_POST["codigo_des"]  : '';
    $last_name = isset($_POST["last_name"]) ? $_POST["last_name"]  : '';


    $strTipoValidacion = isset($_REQUEST["validaciones"]) ? $_REQUEST["validaciones"] : '';

    if ($strTipoValidacion == "proces") {
        header('Content-Type: application/json');
        $tpr_siglas = 'ef';
        $var_consulta = "UPDATE vus_tramites_{$tpr_siglas} SET 
        vus_{$tpr_siglas}_usr_id='{$_POST['nusrid']}', 
        vus_{$tpr_siglas}_sta='2', 
        vus_{$tpr_siglas}_usr ='" . trim($_SESSION['adm_usr_ci']) . "', 
        vus_{$tpr_siglas}_dt ='" . date("Y-m-d H:i:s") . "' 
        WHERE vus_{$tpr_siglas}_usr_id='{$_POST['codigo_des']}'; ";
        $val = 1;
        if (pg_query($rmfUser, $var_consulta)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }
        //print_r($var_consulta);
        //print json_encode($arrInfo);

        $var_consulta = "UPDATE vus_tramites_{$tpr_siglas}1 SET 
        vus_{$tpr_siglas}_usr_id='{$_POST['nusrid']}', 
        vus_{$tpr_siglas}_sta='2', 
        vus_{$tpr_siglas}_usr ='" . trim($_SESSION['adm_usr_ci']) . "', 
        vus_{$tpr_siglas}_dt ='" . date("Y-m-d H:i:s") . "' 
        WHERE vus_{$tpr_siglas}_usr_id='{$_POST['codigo_des']}'; ";
        $val = 2;
        if (pg_query($rmfUser, $var_consulta)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }
        //print_r($var_consulta);
        //print json_encode($arrInfo);

        $var_consulta = "UPDATE vus_tramites_{$tpr_siglas}2 SET 
        vus_{$tpr_siglas}_usr_id='{$_POST['nusrid']}', 
        vus_{$tpr_siglas}_sta='2', 
        vus_{$tpr_siglas}_usr ='" . trim($_SESSION['adm_usr_ci']) . "', 
        vus_{$tpr_siglas}_dt ='" . date("Y-m-d H:i:s") . "' 
        WHERE vus_{$tpr_siglas}_usr_id='{$_POST['codigo_des']}'; ";
        $val = 2;
        if (pg_query($rmfUser, $var_consulta)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }
        //print_r($var_consulta);
        //print json_encode($arrInfo);

        $var_consulta = "UPDATE vus_tramites_{$tpr_siglas}3 SET 
        vus_{$tpr_siglas}_usr_id='{$_POST['nusrid']}', 
        vus_{$tpr_siglas}_sta='2', 
        vus_{$tpr_siglas}_usr ='" . trim($_SESSION['adm_usr_ci']) . "', 
        vus_{$tpr_siglas}_dt ='" . date("Y-m-d H:i:s") . "' 
        WHERE vus_{$tpr_siglas}_usr_id='{$_POST['codigo_des']}'; ";
        $val = 2;
        if (pg_query($rmfUser, $var_consulta)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }
        //print_r($var_consulta);
        //print json_encode($arrInfo);

        $tpr_siglas = 'mm';
        $var_consulta = "UPDATE vus_tramites_{$tpr_siglas} SET 
        vus_{$tpr_siglas}_usr_id='{$_POST['nusrid']}', 
        vus_{$tpr_siglas}_sta='2', 
        vus_{$tpr_siglas}_usr ='" . trim($_SESSION['adm_usr_ci']) . "', 
        vus_{$tpr_siglas}_dt ='" . date("Y-m-d H:i:s") . "' 
        WHERE vus_{$tpr_siglas}_usr_id='{$_POST['codigo_des']}'; ";
        $val = 2;
        if (pg_query($rmfUser, $var_consulta)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }
        //print_r($var_consulta);
        //print json_encode($arrInfo);

        $var_consulta = "UPDATE vus_tramites_{$tpr_siglas}1 SET 
        vus_{$tpr_siglas}_usr_id='{$_POST['nusrid']}', 
        vus_{$tpr_siglas}_sta='2', 
        vus_{$tpr_siglas}_usr ='" . trim($_SESSION['adm_usr_ci']) . "', 
        vus_{$tpr_siglas}_dt ='" . date("Y-m-d H:i:s") . "' 
        WHERE vus_{$tpr_siglas}_usr_id='{$_POST['codigo_des']}'; ";
        $val = 2;
        if (pg_query($rmfUser, $var_consulta)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }
        //print_r($var_consulta);
        //print json_encode($arrInfo);

        $var_consulta = "UPDATE vus_tramites_{$tpr_siglas}2 SET 
        vus_{$tpr_siglas}_usr_id='{$_POST['nusrid']}', 
        vus_{$tpr_siglas}_sta='2', 
        vus_{$tpr_siglas}_usr ='" . trim($_SESSION['adm_usr_ci']) . "', 
        vus_{$tpr_siglas}_dt ='" . date("Y-m-d H:i:s") . "' 
        WHERE vus_{$tpr_siglas}_usr_id='{$_POST['codigo_des']}'; ";
        $val = 2;
        if (pg_query($rmfUser, $var_consulta)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }
        //print_r($var_consulta);
        //print json_encode($arrInfo);

        $var_consulta = "UPDATE vus_tramites_{$tpr_siglas}3 SET 
        vus_{$tpr_siglas}_usr_id='{$_POST['nusrid']}', 
        vus_{$tpr_siglas}_sta='2', 
        vus_{$tpr_siglas}_usr ='" . trim($_SESSION['adm_usr_ci']) . "', 
        vus_{$tpr_siglas}_dt ='" . date("Y-m-d H:i:s") . "' 
        WHERE vus_{$tpr_siglas}_usr_id='{$_POST['codigo_des']}'; ";
        $val = 2;
        if (pg_query($rmfUser, $var_consulta)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }
        //print_r($var_consulta);
        //print json_encode($arrInfo);

        $tpr_siglas = 'pa';
        $var_consulta = "UPDATE vus_tramites_{$tpr_siglas} SET 
        vus_{$tpr_siglas}_usr_id='{$_POST['nusrid']}', 
        vus_{$tpr_siglas}_sta='2', 
        vus_{$tpr_siglas}_usr ='" . trim($_SESSION['adm_usr_ci']) . "', 
        vus_{$tpr_siglas}_dt ='" . date("Y-m-d H:i:s") . "' 
        WHERE vus_{$tpr_siglas}_usr_id='{$_POST['codigo_des']}'; ";
        $val = 2;
        if (pg_query($rmfUser, $var_consulta)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }
        //print_r($var_consulta);
        //print json_encode($arrInfo);

        $var_consulta = "UPDATE vus_tramites_{$tpr_siglas}1 SET 
        vus_{$tpr_siglas}_usr_id='{$_POST['nusrid']}', 
        vus_{$tpr_siglas}_sta='2', 
        vus_{$tpr_siglas}_usr ='" . trim($_SESSION['adm_usr_ci']) . "', 
        vus_{$tpr_siglas}_dt ='" . date("Y-m-d H:i:s") . "' 
        WHERE vus_{$tpr_siglas}_usr_id='{$_POST['codigo_des']}'; ";
        $val = 2;
        if (pg_query($rmfUser, $var_consulta)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }
        //print_r($var_consulta);
        //print json_encode($arrInfo);

        $var_consulta = "UPDATE vus_tramites_{$tpr_siglas}2 SET 
        vus_{$tpr_siglas}_usr_id='{$_POST['nusrid']}', 
        vus_{$tpr_siglas}_sta='2', 
        vus_{$tpr_siglas}_usr ='" . trim($_SESSION['adm_usr_ci']) . "', 
        vus_{$tpr_siglas}_dt ='" . date("Y-m-d H:i:s") . "' 
        WHERE vus_{$tpr_siglas}_usr_id='{$_POST['codigo_des']}'; ";
        $val = 2;
        if (pg_query($rmfUser, $var_consulta)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }
        //print_r($var_consulta);
        //print json_encode($arrInfo);

        $var_consulta = "UPDATE vus_tramites_{$tpr_siglas}3 SET 
        vus_{$tpr_siglas}_usr_id='{$_POST['nusrid']}', 
        vus_{$tpr_siglas}_sta='2', 
        vus_{$tpr_siglas}_usr ='" . trim($_SESSION['adm_usr_ci']) . "', 
        vus_{$tpr_siglas}_dt ='" . date("Y-m-d H:i:s") . "' 
        WHERE vus_{$tpr_siglas}_usr_id='{$_POST['codigo_des']}'; ";
        $val = 2;
        if (pg_query($rmfUser, $var_consulta)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }
        //print_r($var_consulta);
        //print json_encode($arrInfo);


        $tpr_siglas = 'pb';
        $var_consulta = "UPDATE vus_tramites_{$tpr_siglas} SET 
        vus_{$tpr_siglas}_usr_id='{$_POST['nusrid']}', 
        vus_{$tpr_siglas}_sta='2', 
        vus_{$tpr_siglas}_usr ='" . trim($_SESSION['adm_usr_ci']) . "', 
        vus_{$tpr_siglas}_dt ='" . date("Y-m-d H:i:s") . "' 
        WHERE vus_{$tpr_siglas}_usr_id='{$_POST['codigo_des']}'; ";
        $val = 2;
        if (pg_query($rmfUser, $var_consulta)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }
        //print_r($var_consulta);
        //print json_encode($arrInfo);

        $var_consulta = "UPDATE vus_tramites_{$tpr_siglas}1 SET 
        vus_{$tpr_siglas}_usr_id='{$_POST['nusrid']}', 
        vus_{$tpr_siglas}_sta='2', 
        vus_{$tpr_siglas}_usr ='" . trim($_SESSION['adm_usr_ci']) . "', 
        vus_{$tpr_siglas}_dt ='" . date("Y-m-d H:i:s") . "' 
        WHERE vus_{$tpr_siglas}_usr_id='{$_POST['codigo_des']}'; ";
        $val = 2;
        if (pg_query($rmfUser, $var_consulta)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }
        //print_r($var_consulta);
        //print json_encode($arrInfo);

        $var_consulta = "UPDATE vus_tramites_{$tpr_siglas}2 SET 
        vus_{$tpr_siglas}_usr_id='{$_POST['nusrid']}', 
        vus_{$tpr_siglas}_sta='2', 
        vus_{$tpr_siglas}_usr ='" . trim($_SESSION['adm_usr_ci']) . "', 
        vus_{$tpr_siglas}_dt ='" . date("Y-m-d H:i:s") . "' 
        WHERE vus_{$tpr_siglas}_usr_id='{$_POST['codigo_des']}'; ";
        $val = 2;
        if (pg_query($rmfUser, $var_consulta)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }
        //print_r($var_consulta);
        //print json_encode($arrInfo);

        $var_consulta = "UPDATE vus_tramites_{$tpr_siglas}3 SET 
        vus_{$tpr_siglas}_usr_id='{$_POST['nusrid']}', 
        vus_{$tpr_siglas}_sta='2', 
        vus_{$tpr_siglas}_usr ='" . trim($_SESSION['adm_usr_ci']) . "', 
        vus_{$tpr_siglas}_dt ='" . date("Y-m-d H:i:s") . "' 
        WHERE vus_{$tpr_siglas}_usr_id='{$_POST['codigo_des']}'; ";
        $val = 2;
        if (pg_query($rmfUser, $var_consulta)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }
        //print_r($var_consulta);
        //print json_encode($arrInfo);


        $tpr_siglas = 'pc';
        $var_consulta = "UPDATE vus_tramites_{$tpr_siglas} SET 
        vus_{$tpr_siglas}_usr_id='{$_POST['nusrid']}', 
        vus_{$tpr_siglas}_sta='2', 
        vus_{$tpr_siglas}_usr ='" . trim($_SESSION['adm_usr_ci']) . "', 
        vus_{$tpr_siglas}_dt ='" . date("Y-m-d H:i:s") . "' 
        WHERE vus_{$tpr_siglas}_usr_id='{$_POST['codigo_des']}'; ";
        $val = 2;
        if (pg_query($rmfUser, $var_consulta)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }
        //print_r($var_consulta);
        //print json_encode($arrInfo);

        $var_consulta = "UPDATE vus_tramites_{$tpr_siglas}1 SET 
        vus_{$tpr_siglas}_usr_id='{$_POST['nusrid']}', 
        vus_{$tpr_siglas}_sta='2', 
        vus_{$tpr_siglas}_usr ='" . trim($_SESSION['adm_usr_ci']) . "', 
        vus_{$tpr_siglas}_dt ='" . date("Y-m-d H:i:s") . "' 
        WHERE vus_{$tpr_siglas}_usr_id='{$_POST['codigo_des']}'; ";
        $val = 2;
        if (pg_query($rmfUser, $var_consulta)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }
        //print_r($var_consulta);
        //print json_encode($arrInfo);

        $var_consulta = "UPDATE vus_tramites_{$tpr_siglas}2 SET 
        vus_{$tpr_siglas}_usr_id='{$_POST['nusrid']}', 
        vus_{$tpr_siglas}_sta='2', 
        vus_{$tpr_siglas}_usr ='" . trim($_SESSION['adm_usr_ci']) . "', 
        vus_{$tpr_siglas}_dt ='" . date("Y-m-d H:i:s") . "' 
        WHERE vus_{$tpr_siglas}_usr_id='{$_POST['codigo_des']}'; ";
        $val = 2;
        if (pg_query($rmfUser, $var_consulta)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }
        //print_r($var_consulta);
        //print json_encode($arrInfo);

        $var_consulta = "UPDATE vus_tramites_{$tpr_siglas}3 SET 
        vus_{$tpr_siglas}_usr_id='{$_POST['nusrid']}', 
        vus_{$tpr_siglas}_sta='2', 
        vus_{$tpr_siglas}_usr ='" . trim($_SESSION['adm_usr_ci']) . "', 
        vus_{$tpr_siglas}_dt ='" . date("Y-m-d H:i:s") . "' 
        WHERE vus_{$tpr_siglas}_usr_id='{$_POST['codigo_des']}'; ";
        $val = 2;
        if (pg_query($rmfUser, $var_consulta)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }
        //print_r($var_consulta);
        //print json_encode($arrInfo);

        $tpr_siglas = 'pn';
        $var_consulta = "UPDATE vus_tramites_{$tpr_siglas} SET 
        vus_{$tpr_siglas}_usr_id='{$_POST['nusrid']}', 
        vus_{$tpr_siglas}_sta='2', 
        vus_{$tpr_siglas}_usr ='" . trim($_SESSION['adm_usr_ci']) . "', 
        vus_{$tpr_siglas}_dt ='" . date("Y-m-d H:i:s") . "' 
        WHERE vus_{$tpr_siglas}_usr_id='{$_POST['codigo_des']}'; ";
        $val = 2;
        if (pg_query($rmfUser, $var_consulta)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }
        //print_r($var_consulta);
        //print json_encode($arrInfo);

        $var_consulta = "UPDATE vus_tramites_{$tpr_siglas}1 SET 
        vus_{$tpr_siglas}_usr_id='{$_POST['nusrid']}', 
        vus_{$tpr_siglas}_sta='2', 
        vus_{$tpr_siglas}_usr ='" . trim($_SESSION['adm_usr_ci']) . "', 
        vus_{$tpr_siglas}_dt ='" . date("Y-m-d H:i:s") . "' 
        WHERE vus_{$tpr_siglas}_usr_id='{$_POST['codigo_des']}'; ";
        $val = 2;
        if (pg_query($rmfUser, $var_consulta)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }
        //print_r($var_consulta);
        //print json_encode($arrInfo);

        $var_consulta = "UPDATE vus_tramites_{$tpr_siglas}2 SET 
        vus_{$tpr_siglas}_usr_id='{$_POST['nusrid']}', 
        vus_{$tpr_siglas}_sta='2', 
        vus_{$tpr_siglas}_usr ='" . trim($_SESSION['adm_usr_ci']) . "', 
        vus_{$tpr_siglas}_dt ='" . date("Y-m-d H:i:s") . "' 
        WHERE vus_{$tpr_siglas}_usr_id='{$_POST['codigo_des']}'; ";
        $val = 2;
        if (pg_query($rmfUser, $var_consulta)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }
        //print_r($var_consulta);
        //print json_encode($arrInfo);

        $var_consulta = "UPDATE vus_tramites_{$tpr_siglas}3 SET 
        vus_{$tpr_siglas}_usr_id='{$_POST['nusrid']}', 
        vus_{$tpr_siglas}_sta='2', 
        vus_{$tpr_siglas}_usr ='" . trim($_SESSION['adm_usr_ci']) . "', 
        vus_{$tpr_siglas}_dt ='" . date("Y-m-d H:i:s") . "' 
        WHERE vus_{$tpr_siglas}_usr_id='{$_POST['codigo_des']}'; ";
        $val = 2;
        if (pg_query($rmfUser, $var_consulta)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }
        //print_r($var_consulta);
        //print json_encode($arrInfo);


        $tpr_siglas = 'qc';
        $var_consulta = "UPDATE vus_tramites_{$tpr_siglas} SET 
        vus_{$tpr_siglas}_usr_id='{$_POST['nusrid']}', 
        vus_{$tpr_siglas}_sta='2', 
        vus_{$tpr_siglas}_usr ='" . trim($_SESSION['adm_usr_ci']) . "', 
        vus_{$tpr_siglas}_dt ='" . date("Y-m-d H:i:s") . "' 
        WHERE vus_{$tpr_siglas}_usr_id='{$_POST['codigo_des']}'; ";
        $val = 2;
        if (pg_query($rmfUser, $var_consulta)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }
        //print_r($var_consulta);
        //print json_encode($arrInfo);

        $var_consulta = "UPDATE vus_tramites_{$tpr_siglas}1 SET 
        vus_{$tpr_siglas}_usr_id='{$_POST['nusrid']}', 
        vus_{$tpr_siglas}_sta='2', 
        vus_{$tpr_siglas}_usr ='" . trim($_SESSION['adm_usr_ci']) . "', 
        vus_{$tpr_siglas}_dt ='" . date("Y-m-d H:i:s") . "' 
        WHERE vus_{$tpr_siglas}_usr_id='{$_POST['codigo_des']}'; ";
        $val = 2;
        if (pg_query($rmfUser, $var_consulta)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }
        //print_r($var_consulta);
        //print json_encode($arrInfo);

        $var_consulta = "UPDATE vus_tramites_{$tpr_siglas}2 SET 
        vus_{$tpr_siglas}_usr_id='{$_POST['nusrid']}', 
        vus_{$tpr_siglas}_sta='2', 
        vus_{$tpr_siglas}_usr ='" . trim($_SESSION['adm_usr_ci']) . "', 
        vus_{$tpr_siglas}_dt ='" . date("Y-m-d H:i:s") . "' 
        WHERE vus_{$tpr_siglas}_usr_id='{$_POST['codigo_des']}'; ";
        $val = 2;
        if (pg_query($rmfUser, $var_consulta)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }
        //print_r($var_consulta);
        //print json_encode($arrInfo);

        $var_consulta = "UPDATE vus_tramites_{$tpr_siglas}3 SET 
        vus_{$tpr_siglas}_usr_id='{$_POST['nusrid']}', 
        vus_{$tpr_siglas}_sta='2', 
        vus_{$tpr_siglas}_usr ='" . trim($_SESSION['adm_usr_ci']) . "', 
        vus_{$tpr_siglas}_dt ='" . date("Y-m-d H:i:s") . "' 
        WHERE vus_{$tpr_siglas}_usr_id='{$_POST['codigo_des']}'; ";
        $val = 2;
        if (pg_query($rmfUser, $var_consulta)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }
        //print_r($var_consulta);
        //print json_encode($arrInfo);


        $tpr_siglas = 'lc';
        $var_consulta = "UPDATE vus_tramites_{$tpr_siglas} SET 
        vus_{$tpr_siglas}_usr_id='{$_POST['nusrid']}', 
        vus_{$tpr_siglas}_sta='2', 
        vus_{$tpr_siglas}_usr ='" . trim($_SESSION['adm_usr_ci']) . "', 
        vus_{$tpr_siglas}_dt ='" . date("Y-m-d H:i:s") . "' 
        WHERE vus_{$tpr_siglas}_usr_id='{$_POST['codigo_des']}'; ";
        $val = 2;
        if (pg_query($rmfUser, $var_consulta)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }
        //print_r($var_consulta);
        //print json_encode($arrInfo);

        $var_consulta = "UPDATE vus_tramites_{$tpr_siglas}1 SET 
        vus_{$tpr_siglas}_usr_id='{$_POST['nusrid']}', 
        vus_{$tpr_siglas}_sta='2', 
        vus_{$tpr_siglas}_usr ='" . trim($_SESSION['adm_usr_ci']) . "', 
        vus_{$tpr_siglas}_dt ='" . date("Y-m-d H:i:s") . "' 
        WHERE vus_{$tpr_siglas}_usr_id='{$_POST['codigo_des']}'; ";
        $val = 2;
        if (pg_query($rmfUser, $var_consulta)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }
        //print_r($var_consulta);
        //print json_encode($arrInfo);

        $var_consulta = "UPDATE vus_tramites_{$tpr_siglas}2 SET 
        vus_{$tpr_siglas}_usr_id='{$_POST['nusrid']}', 
        vus_{$tpr_siglas}_sta='2', 
        vus_{$tpr_siglas}_usr ='" . trim($_SESSION['adm_usr_ci']) . "', 
        vus_{$tpr_siglas}_dt ='" . date("Y-m-d H:i:s") . "' 
        WHERE vus_{$tpr_siglas}_usr_id='{$_POST['codigo_des']}'; ";
        $val = 2;
        if (pg_query($rmfUser, $var_consulta)) {
            $arrInfo['status'] = $val;
        } else {
            $arrInfo['status'] = 0;
            $arrInfo['error'] = $var_consulta;
        }
        //print_r($var_consulta);
        //print json_encode($arrInfo);

        $var_consulta = "UPDATE vus_tramites_{$tpr_siglas}3 SET 
        vus_{$tpr_siglas}_usr_id='{$_POST['nusrid']}', 
        vus_{$tpr_siglas}_sta='2', 
        vus_{$tpr_siglas}_usr ='" . trim($_SESSION['adm_usr_ci']) . "', 
        vus_{$tpr_siglas}_dt ='" . date("Y-m-d H:i:s") . "' 
        WHERE vus_{$tpr_siglas}_usr_id='{$_POST['codigo_des']}'; ";
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

    //DIBUJO DE TABLA PRODUCTOS CATEGORIAS
    else if ($strTipoValidacion == "busqueda_tabla") {
        $strCategori = isset($_POST["categori"]) ? $_POST["categori"]  : '';
        $strSearch = isset($_POST["Search"]) ? $_POST["Search"]  : '';

        $strFilter = "";
        if (!empty($strSearch)) {
            $strFilter = " AND ( UPPER(a.vus_usr_nombre) LIKE UPPER('%{$strSearch}%')  ) ";
        }

        $arrTypeMessage = array();
        $var_consulta = "SELECT a.* ,b.*
                        FROM vus_usuarios a, vus_usuarios_productos b 
                        WHERE a.vus_usr_id = b.vus_usp_id 
                        AND b.vus_usp_tpr_id = '$strCategori' 
                        $strFilter
                        AND a.vus_usr_estatus IN (1) 
                        ORDER BY a.vus_usr_id";

        $qTMP = pg_query($rmfUser, $var_consulta);
        //echo $var_consulta;
        while ($rTMP = pg_fetch_assoc($qTMP)) {

            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_id"]                 = $rTMP["vus_usr_id"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_fecaut"]                 = $rTMP["vus_usr_fecaut"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_alias"]                 = $rTMP["vus_usr_alias"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_tipcta"]                 = $rTMP["vus_usr_tipcta"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_ci"]                 = $rTMP["vus_usr_ci"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_ci_tpo"]                 = $rTMP["vus_usr_ci_tpo"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_colfar"]                 = $rTMP["vus_usr_colfar"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_msds"]                 = $rTMP["vus_usr_msds"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_inprefar"]                 = $rTMP["vus_usr_inprefar"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_razsoc"]                 = $rTMP["vus_usr_razsoc"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_nme1"]                 = $rTMP["vus_usr_nme1"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_nme2"]                 = $rTMP["vus_usr_nme2"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_ape1"]                 = $rTMP["vus_usr_ape1"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_ape2"]                 = $rTMP["vus_usr_ape2"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_nombre"]                 = $rTMP["vus_usr_nombre"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_emp_rif"]                 = $rTMP["vus_usr_emp_rif"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_password"]                 = $rTMP["vus_usr_password"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_email"]                 = $rTMP["vus_usr_email"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_tel"]                 = $rTMP["vus_usr_tel"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_cel"]                 = $rTMP["vus_usr_cel"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["ctg_geo_id"]                 = $rTMP["ctg_geo_id"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_urb"]                 = $rTMP["vus_usr_urb"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_ave"]                 = $rTMP["vus_usr_ave"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_edi"]                 = $rTMP["vus_usr_edi"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_pis"]                 = $rTMP["vus_usr_pis"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_codpos"]                 = $rTMP["vus_usr_codpos"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_punref"]                 = $rTMP["vus_usr_punref"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_estatus"]                 = $rTMP["vus_usr_estatus"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_estatus_aut"]                 = $rTMP["vus_usr_estatus_aut"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_obs"]                 = $rTMP["vus_usr_obs"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_dir"]                 = $rTMP["vus_usr_dir"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_ciudad"]                 = $rTMP["vus_usr_ciudad"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_emptpo"]                 = $rTMP["vus_usr_emptpo"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_pasw_asist"]                 = $rTMP["vus_usr_pasw_asist"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_sta"]                 = $rTMP["vus_usr_sta"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_usr"]                 = $rTMP["vus_usr_usr"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_dt"]                 = $rTMP["vus_usr_dt"];
        }
        pg_free_result($qTMP);

?>
        <div class="col-md-12 tableFixHead">
            <table id="tableData" class="table table-bordered table-striped table-hover table-sm">
                <thead>
                    <tr class="table-info">
                        <th>User Id</th>
                        <th>Date</th>
                        <th>User name</th>
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
                                <td WIDTH="5%"><?php echo  $rTMP["value"]['vus_usr_id']; ?></td>
                                <td WIDTH="80%"><?php echo  $rTMP["value"]['vus_usr_nombre']; ?></td>
                            </tr>
                            <input type="hidden" name="hid_codigo_des<?php print $intContador; ?>" id="hid_codigo_des<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_usr_id']; ?>">
                            <input type="hidden" name="hid_fecsol<?php print $intContador; ?>" id="hid_fecsol<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_usr_estatus_aut']; ?>">
                            <input type="hidden" name="hid_tipcta_desc<?php print $intContador; ?>" id="hid_tipcta_desc<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_usr_tipcta']; ?>"><!-- ACCOUNT TYPE-->
                            <input type="hidden" name="hid_alias<?php print $intContador; ?>" id="hid_alias<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_usr_alias']; ?>">
                            <input type="hidden" name="hid_statusOne<?php print $intContador; ?>" id="hid_statusOne<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_usr_estatus']; ?>"> <!-- STATUS -->
                            <input type="hidden" name="hid_email<?php print $intContador; ?>" id="hid_email<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_usr_email']; ?>">
                            <input type="hidden" name="hid_pass<?php print $intContador; ?>" id="hid_pass<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_usr_password']; ?>">

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
    }else if ($strTipoValidacion == "busqueda_tabla_usuarios") {
        $strCategori = isset($_POST["categori"]) ? $_POST["categori"]  : '';
        $strSearch = isset($_POST["Search"]) ? $_POST["Search"]  : '';
        $strUser = isset($_POST["User"]) ? $_POST["User"]  : '';

        $strFilter = "";
        if (!empty($strSearch)) {
            $strFilter = " AND ( UPPER(vus_usr_nombre) LIKE UPPER('%{$strSearch}%')  ) ";
        }

        $arrTypeMessage = array();
        $var_consulta = "SELECT a.* ,b.*
                        FROM vus_usuarios a, vus_usuarios_productos b 
                        WHERE a.vus_usr_id = b.vus_usp_id 
                        AND b.vus_usp_tpr_id = '$strCategori' 
                        AND a.vus_usr_id <> $strUser 
                        $strFilter
                        AND a.vus_usr_estatus IN (1) 
                        ORDER BY a.vus_usr_id";

        $qTMP = pg_query($rmfUser, $var_consulta);
        //echo $var_consulta;
        while ($rTMP = pg_fetch_assoc($qTMP)) {

            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_id"]                 = $rTMP["vus_usr_id"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_fecaut"]                 = $rTMP["vus_usr_fecaut"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_alias"]                 = $rTMP["vus_usr_alias"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_tipcta"]                 = $rTMP["vus_usr_tipcta"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_ci"]                 = $rTMP["vus_usr_ci"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_ci_tpo"]                 = $rTMP["vus_usr_ci_tpo"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_colfar"]                 = $rTMP["vus_usr_colfar"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_msds"]                 = $rTMP["vus_usr_msds"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_inprefar"]                 = $rTMP["vus_usr_inprefar"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_razsoc"]                 = $rTMP["vus_usr_razsoc"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_nme1"]                 = $rTMP["vus_usr_nme1"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_nme2"]                 = $rTMP["vus_usr_nme2"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_ape1"]                 = $rTMP["vus_usr_ape1"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_ape2"]                 = $rTMP["vus_usr_ape2"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_nombre"]                 = $rTMP["vus_usr_nombre"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_emp_rif"]                 = $rTMP["vus_usr_emp_rif"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_password"]                 = $rTMP["vus_usr_password"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_email"]                 = $rTMP["vus_usr_email"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_tel"]                 = $rTMP["vus_usr_tel"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_cel"]                 = $rTMP["vus_usr_cel"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["ctg_geo_id"]                 = $rTMP["ctg_geo_id"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_urb"]                 = $rTMP["vus_usr_urb"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_ave"]                 = $rTMP["vus_usr_ave"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_edi"]                 = $rTMP["vus_usr_edi"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_pis"]                 = $rTMP["vus_usr_pis"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_codpos"]                 = $rTMP["vus_usr_codpos"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_punref"]                 = $rTMP["vus_usr_punref"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_estatus"]                 = $rTMP["vus_usr_estatus"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_estatus_aut"]                 = $rTMP["vus_usr_estatus_aut"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_obs"]                 = $rTMP["vus_usr_obs"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_dir"]                 = $rTMP["vus_usr_dir"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_ciudad"]                 = $rTMP["vus_usr_ciudad"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_emptpo"]                 = $rTMP["vus_usr_emptpo"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_pasw_asist"]                 = $rTMP["vus_usr_pasw_asist"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_sta"]                 = $rTMP["vus_usr_sta"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_usr"]                 = $rTMP["vus_usr_usr"];
            $arrTypeMessage[$rTMP["vus_usr_id"]]["vus_usr_dt"]                 = $rTMP["vus_usr_dt"];
        }
        pg_free_result($qTMP);

?>
        <div class="col-md-12 tableFixHead">
            <table id="tableData" class="table table-bordered table-striped table-hover table-sm">
                <thead>
                    <tr class="table-info">
                        <th>User Id </th>
                        <th>User name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (is_array($arrTypeMessage) && (count($arrTypeMessage) > 0)) {
                        $intContador = 1;
                        reset($arrTypeMessage);
                        foreach ($arrTypeMessage as $rTMP['key'] => $rTMP['value']) {
                    ?>
                            <tr style="cursor:pointer;" onclick="fntSelectUser('<?php print $intContador; ?>');" data-dismiss="modal">
                                <td WIDTH="5%"><?php echo  $rTMP["value"]['vus_usr_id']; ?></td>
                                <td WIDTH="90%"><?php echo  $rTMP["value"]['vus_usr_nombre']; ?></td>
                            </tr>
                            <input type="hidden" name="hid_nusrid<?php print $intContador; ?>" id="hid_nusrid<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_usr_id']; ?>">
                            <input type="hidden" name="hid_nusr_nombre<?php print $intContador; ?>" id="hid_nusr_nombre<?php print $intContador; ?>" value="<?php echo  $rTMP["value"]['vus_usr_nombre']; ?>">

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