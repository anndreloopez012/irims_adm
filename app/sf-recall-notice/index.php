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
    $menu = 10;
    $title = 'Sf-Recall-Notice';
     
    require_once '../dependenciasHead.php';
    
    require_once '../../api/admMenu.php';

    require_once '../../api/sf-recall-notice/admSf-recall-notice.php';

    require_once '../../layout/nav.php';

    //require_once '../../layout/menu.php';

    require_once '../../layout/sf-recall-notice/sf-recall-noticeComponent.php';
    
    require_once '../dependenciasFooter.php';

?>
