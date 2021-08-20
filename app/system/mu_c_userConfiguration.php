<?php
    //btn nav
    session_start();
    $user = $_SESSION['adm_usr_nombre'];
    $home = '../../home.php';
    $back = '../system/index.php';
    $docOne = '#';
    $docTwo = '#';
    $window = 'mu_c_userConfiguration.php';
    $logout = '../../interbase/logout.php';
  
    //id del menu modulos_l
    $menu = 6;

    //titulo del modulo
    $title = 'USER CONFIGURATION';

    require_once '../../api/system/user_mu_c_userConfiguration.php';

    require_once '../../api/admMenu.php';

    require_once '../dependenciasHead.php';

    require_once '../../api/system/user_mu_c_userConfigurationAJAX.php';

    //require_once '../../layout/nav.php';

    require_once '../../layout/menu.php';

    require_once '../../layout/system/mu_c_userConfigurationComponent.php';
    
    require_once '../dependenciasFooter.php';

?>
