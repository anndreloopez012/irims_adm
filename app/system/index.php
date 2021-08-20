<?php
    //SESSION
    require_once '../../interbase/auth.php';
    $logout = '../../interbase/logout.php';
    require_once '../../interbase/timeLog.php';
    
    $user = $_SESSION['adm_usr_nombre'];
    $home = '../../home.php';
    $back = '../../home.php';
    $docOne = '#';
    $docTwo = '#';
    $window = 'index.php';

    $menu = 6;
    $title = 'SYSTEM';

    require_once '../dependenciasHead.php';

    require_once '../../api/admMenu.php';
 
    require_once '../../api/system/admSystem.php';
 
    require_once '../../layout/nav.php';
 
    //require_once '../../layout/menu.php';
 
    require_once '../../layout/system/systemComponent.php';
     
    require_once '../dependenciasFooter.php';

?>
