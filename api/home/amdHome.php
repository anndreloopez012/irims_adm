

<?php 

require_once 'interbase/tmfAdm.php';
    $arrModulo= array();
    $var_consulta= "SELECT * FROM amd_general_cont WHERE id = 1 LIMIT 1 ";

    $qTMP = pg_query($rmfAdm, $var_consulta);
    while ( $rTMP = pg_fetch_assoc($qTMP) ){

        $arrNav[$rTMP["id"]]["id"] = $rTMP["id"];
        $arrNav[$rTMP["id"]]["adm_enc_izq_lg"] = $rTMP["adm_enc_izq_lg"];
        $arrNav[$rTMP["id"]]["adm_enc_der_lg"] = $rTMP["adm_enc_der_lg"];
        $arrNav[$rTMP["id"]]["adm_enc_img"] = $rTMP["adm_enc_img"];
        $arrNav[$rTMP["id"]]["adm_cont_arr_lg"] = $rTMP["adm_cont_arr_lg"];
        $arrNav[$rTMP["id"]]["adm_cont_aba_lg"] = $rTMP["adm_cont_aba_lg"];
        $arrNav[$rTMP["id"]]["adm_cont_img"] = $rTMP["adm_cont_img"];   
    }
    pg_free_result($qTMP);
    
    if ( is_array($arrNav) && ( count($arrNav)>0 ) ){
        reset($arrNav);
    foreach( $arrNav as $rTMP['key'] => $rTMP['value'] ){
        
        $adm_enc_izq_lg = $rTMP["value"]['adm_enc_izq_lg'];
        $adm_enc_der_lg = $rTMP["value"]['adm_enc_der_lg'];
        $adm_enc_img = $rTMP["value"]['adm_enc_img'];
        $adm_cont_arr_lg = $rTMP["value"]['adm_cont_arr_lg'];
        $adm_cont_aba_lg = $rTMP["value"]['adm_cont_aba_lg'];
        $adm_cont_img = $rTMP["value"]['adm_cont_img'];

    }
        }

    $userid = $_SESSION['adm_usr_ci'];
    $arrModulo= array();
    $var_consulta= "SELECT modulos.*, menu.ctg_men_id
                    FROM ctg_modulos_l modulos
                    INNER JOIN adm_usuarios_menu menu 
                    ON menu.ctg_men_id=modulos.adm_modulo
                    WHERE adm_usm_ci='$userid' 
                    AND  modulos.adm_modulo=menu.ctg_men_id
                    AND adm_status = 1
                    ORDER BY adm_order";

    $qTMP = pg_query($rmfAdm, $var_consulta);
   // print_r($var_consulta);
    while ( $rTMP = pg_fetch_assoc($qTMP) ){

        $arrModulo  [$rTMP["id"]]   ["id"]               = $rTMP["id"]; 
        $arrModulo  [$rTMP["id"]]   ["adm_name"]             = $rTMP["adm_name"]; 
        $arrModulo  [$rTMP["id"]]   ["adm_btn"]              = $rTMP["adm_btn"]; 
        $arrModulo  [$rTMP["id"]]   ["adm_rtu"]               = $rTMP["adm_rtu"]; 
    }
    pg_free_result($qTMP);
?>