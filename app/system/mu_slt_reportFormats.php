<?php
    //btn nav
    session_start();
    $user = $_SESSION['adm_usr_nombre'];
    $home = '../../home.php';
    $back = '../system/index.php';
    $docOne = '#';
    $docTwo = '#';
    $window = 'mu_slt_reportFormats.php';
    $logout = '../../interbase/logout.php';
  
    //id del menu modulos_l
    $menu = 6;

    //titulo del modulo
    $title = 'REPORT FORMATS';

    require_once '../../api/system/adm_mu_slt_reportFormats.php';

    require_once '../../api/admMenu.php';

    require_once '../dependenciasHead.php';
    
    require_once '../../api/system/adm_mu_slt_reportFormatsAJAX.php';

    //require_once '../../layout/nav.php';

    require_once '../../layout/menu.php';

    require_once '../../layout/system/mu_slt_reportFormatsComponent.php';
    
    require_once '../dependenciasFooter.php';

?>
