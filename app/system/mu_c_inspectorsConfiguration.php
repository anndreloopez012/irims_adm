<?php
    session_start();
    $user = $_SESSION['adm_usr_nombre'];
    $home = '../../home.php';
    $back = '../system/index.php';
    $docOne = '#';
    $docTwo = '#';
    $window = 'mu_c_inspectorsConfiguration.php';
    $logout = '../../interbase/logout.php';
  
    $menu = 6;

    $title = 'INSPECTORS CONFIGURATION';

    require_once '../../api/system/insp_mu_c_inspectorsConfiguration.php';

    require_once '../../api/admMenu.php';

    require_once '../dependenciasHead.php';

    require_once '../../api/system/inps_mu_c_inspectorsConfigurationAJAX.php';

    //require_once '../../layout/nav.php';      

    require_once '../../layout/menu.php';

    require_once '../../layout/system/mu_c_inspectorsConfigurationComponent.php';
    
    require_once '../dependenciasFooter.php';

?>
