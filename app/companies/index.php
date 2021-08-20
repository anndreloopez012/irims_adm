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
    $menu = 13;
    $title = 'Companies';
     
    require_once '../dependenciasHead.php';
    
    require_once '../../api/admMenu.php';

    require_once '../../api/companies/admCompanies.php';

    require_once '../../layout/nav.php';

    //require_once '../../layout/menu.php';

    require_once '../../layout/companies/companiesComponent.php';
    
    require_once '../dependenciasFooter.php';

?>
