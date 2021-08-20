<?php
    session_start();
    $user = $_SESSION['adm_usr_nombre'];
    $home = '../../home.php';
    $back = '../system/index.php';
    $docOne = '#';
    $docTwo = '#';
    $window = 'mu_c_qclabConfiguration.php';
    $logout = '../../interbase/logout.php';
  
    $menu = 6;

    $title = 'QCLAB CONFIGURATION';

    require_once '../../api/system/adm_mu_c_qclabConfiguration.php';

    require_once '../../api/admMenu.php';

    require_once '../dependenciasHead.php';

    require_once '../../api/system/adm_mu_c_qclabConfigurationAJAX.php';

    //require_once '../../layout/nav.php';      

    require_once '../../layout/menu.php';

    require_once '../../layout/system/mu_c_qclabConfigurationComponent.php';
    
    require_once '../dependenciasFooter.php';

?>
