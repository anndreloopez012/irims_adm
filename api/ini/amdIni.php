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
        $arrNav[$rTMP["id"]]["adm_log_enc_lg"] = $rTMP["adm_log_enc_lg"];
        $arrNav[$rTMP["id"]]["adm_input_name_lg"] = $rTMP["adm_input_name_lg"];
        $arrNav[$rTMP["id"]]["adm_input_pass_lg"] = $rTMP["adm_input_pass_lg"];
        $arrNav[$rTMP["id"]]["adm_bt_lg"] = $rTMP["adm_bt_lg"];     
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
        $adm_log_enc_lg = $rTMP["value"]['adm_log_enc_lg'];
        $adm_input_name_lg = $rTMP["value"]['adm_input_name_lg'];
        $adm_input_pass_lg = $rTMP["value"]['adm_input_pass_lg'];
        $adm_bt_lg = $rTMP["value"]['adm_bt_lg'];

    }
        }

    
?>




