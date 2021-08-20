<?php
    //btn nav
    session_start();
    $user = $_SESSION['adm_usr_nombre'];
    $home = '../../home.php';
    $back = 'index.php';
    $docOne = '#';
    $docTwo = '#';
    $window = 'ma_requestsForAdditionOdPowersOfAttoneryFromUsers.php';
    $logout = '../../interbase/logout.php';
  
    //id del menu modulos_l
    $menu = 14;

    //titulo del modulo
    $title = 'REQUESTS FOR ADDITION OF POWERS OF ATTONERY FROM USERS';

    

    require_once '../../api/manage-users/user_ma_requestsForAdditionOfPowersOfAttoneryFromUsers.php';

    require_once '../../api/admMenu.php';
     
    require_once '../dependenciasHead.php';

    require_once '../../api/manage-users/user_ma_requestsForAdditionOfPowersOfAttoneryFromUsersAJAX.php';

    //require_once '../../layout/nav.php';

    require_once '../../layout/menu.php';

    require_once '../../layout/manage-users/ma_requestsForAdditionOfPowersOfAttoneryFromUsersComponent.php';
    
    require_once '../dependenciasFooter.php';

?>

