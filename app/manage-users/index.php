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
    $menu = 14;
    $title = 'Manage-Users';
     
    require_once '../dependenciasHead.php';
    
    require_once '../../api/admMenu.php';

    require_once '../../api/manage-users/admManage-users.php';

    require_once '../../layout/nav.php';

    //require_once '../../layout/menu.php';

    require_once '../../layout/manage-users/manage-usersComponent.php';
    
    require_once '../dependenciasFooter.php';

?>
