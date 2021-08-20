<?php
    //btn nav
    session_start();
    $user = $_SESSION['adm_usr_nombre'];
    $home = '../../home.php';
    $back = 'index.php';
    $docOne = '#';
    $docTwo = '#';
    $window = 'ma_viewDelatedAccountInformationFromUsers.php';
    $logout = '../../interbase/logout.php';
  
    //id del menu modulos_l
    $menu = 14;

    //titulo del modulo
    $title = 'VIEW DETAILED ACCOUNT INFORMATION FROM USERS';

    

    require_once '../../api/manage-users/user_ma_viewDetiledAccountInformationFromUsers.php';

    require_once '../../api/admMenu.php';
     
    require_once '../dependenciasHead.php';

    require_once '../../api/manage-users/user_ma_viewDetiledAccountInformationFromUsersAJAX.php';

    //require_once '../../layout/nav.php';

    require_once '../../layout/menu.php';

    require_once '../../layout/manage-users/ma_viewDetiledAccountInformationFromUsersComponent.php';
    
    require_once '../dependenciasFooter.php';

?>

