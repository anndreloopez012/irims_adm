<?php
    //btn nav
    session_start();
    $user = $_SESSION['adm_usr_nombre'];
    $home = '../../home.php';
    $back = '../system/index.php';
    $docOne = '#';
    $docTwo = '#';
    $window = 'mu_slt_typeOfProducts.php';
    $logout = '../../interbase/logout.php';
  
    //id del menu modulos_l
    $menu = 6;

    //titulo del modulo
    $title = 'TYPE OF PRODUCTS';

    require_once '../../api/system/adm_mu_slt_typeOfProducts.php';

    require_once '../../api/admMenu.php';

    require_once '../dependenciasHead.php';

    require_once '../../api/system/adm_mu_slt_typeOfProductsAJAX.php';

    //require_once '../../layout/nav.php';

    require_once '../../layout/menu.php';

    require_once '../../layout/system/mu_slt_typeOfProductsComponent.php';
    
    require_once '../dependenciasFooter.php';

?>
