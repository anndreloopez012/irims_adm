<?php
    //btn nav
    session_start();
    $user = $_SESSION['adm_usr_nombre'];
    $home = '../../home.php';
    $back = 'index.php';
    $docOne = '#';
    $docTwo = '#';
    $window = 'ma_requestsForAddingProductsToPowersOfAttoneryFromUsers.php';
    $logout = '../../interbase/logout.php';
  
    //id del menu modulos_l
    $menu = 14;

    //titulo del modulo
    $title = 'REQUESTS FOR ADDING PRODUCTS TO POWERS OF ATTONERY FROM USERS';

    

    require_once '../../api/manage-users/user_ma_requestsForAddingProductsToPowersOfAttoneryFromUsers.php';

    require_once '../../api/admMenu.php';
     
    require_once '../dependenciasHead.php';

    require_once '../../api/manage-users/user_ma_requestsForAddingProductsToPowersOfAttoneryFromUsersAJAX.php';

    //require_once '../../layout/nav.php';

    require_once '../../layout/menu.php';

    require_once '../../layout/manage-users/ma_requestsForAddingProductsToPowersOfAttoneryFromUsersComponent.php';
    
    require_once '../dependenciasFooter.php';

?>

