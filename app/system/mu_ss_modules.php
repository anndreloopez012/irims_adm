<?php
    //btn nav
    session_start();
    $user = $_SESSION['adm_usr_nombre'];
    $home = '../../home.php';
    $back = '../system/index.php';
    $docOne = '#';
    $docTwo = '#';
    $window = 'mu_ss_modules.php';
    $logout = '../../interbase/logout.php';
  
    //id del menu modulos_l
    $menu = 6;

    //titulo del modulo
    $title = 'MODULES';

    require_once '../../api/system/adm_mu_ss_modules.php';

    require_once '../../api/admMenu.php';
     
    require_once '../dependenciasHead.php';

    require_once '../../api/system/adm_mu_ss_modulesAJAX.php';
    
    //require_once '../../layout/nav.php';

    require_once '../../layout/menu.php';

    require_once '../../layout/system/mu_ss_modulesComponent.php';
    
    require_once '../dependenciasFooter.php';

?>
