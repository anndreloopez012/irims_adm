<?php
    //btn nav
    session_start();
    $user = $_SESSION['adm_usr_nombre'];
    $home = '../../home.php';
    $back = 'index.php';
    $docOne = '#';
    $docTwo = '#';
    $window = 'mu_m_admMessages.php';
    $logout = '../../interbase/logout.php';
  
    //id del menu modulos_l
    $menu = 6;

    //titulo del modulo
    $title = 'ADM MENU MESSAGES';

    require_once '../../api/admMenu.php';

    require_once '../../api/system/adm_mu_m_admMessages.php';
     
    require_once '../dependenciasHead.php';
    
    //require_once '../../layout/nav.php';

    require_once '../../layout/menu.php';

    require_once '../../layout/system/mu_m_admMessagesComponent.php';
    
    require_once '../dependenciasFooter.php';

?>
