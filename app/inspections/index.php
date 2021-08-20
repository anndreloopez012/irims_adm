<?php
    require_once '../../interbase/auth.php';
    $logout = '../../interbase/logout.php';
    require_once '../../interbase/timeLog.php';

    //btn nav
    $user = $_SESSION['username'];
    $home = '../../home.php';
    $back = '../../home.php';
    $docOne = '#';
    $docTwo = '#';
    $window = 'index.php';
    $menu = 8;
    $title = 'Inspections';
     
    require_once '..//dependenciasHead.php';
    
    require_once '../../api/admMenu.php';

    require_once '../../api/inspections/admInspections.php';

    require_once '../../layout/nav.php';

    //require_once '../../layout/menu.php';

    require_once '../../layout/inspections/inspectionsComponent.php';
    
    require_once '../dependenciasFooter.php';

?>
