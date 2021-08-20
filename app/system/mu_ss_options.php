<?php
    //btn nav
    session_start();
    $user = $_SESSION['adm_usr_nombre'];
    $home = '../../home.php';
    $back = '../system/index.php';
    $docOne = '#';
    $docTwo = '#';
    $window = 'mu_ss_options.php';
    $logout = '../../interbase/logout.php';
  
    //id del menu modulos_l
    $menu = 6;

    //titulo del modulo
    $title = 'OPTIONS';

    require_once '../../api/admMenu.php';

    require_once '../../api/system/adm_mu_ss_options.php';
     
    require_once '../dependenciasHead.php';

    require_once '../../api/system/adm_mu_ss_optionsAJAX.php';

    //require_once '../../layout/nav.php';

    require_once '../../layout/menu.php';

    require_once '../../layout/system/mu_ss_optionsComponent.php';
    
    require_once '../dependenciasFooter.php';

?>
