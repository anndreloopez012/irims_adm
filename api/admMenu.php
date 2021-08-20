<?php 

require_once '../../interbase/tmfAdm.php';
    $arrNav= array();
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

    require_once '../../interbase/tmfAdm.php';
    $userid = $_SESSION['adm_usr_ci'];
    $arrModulo= array();
    $var_consulta= "SELECT  content.id contenido_id,
                            content.adm_nombre_menu contenido_nombre,
                            content.adm_btn contenido_btn,
                            content.adm_link contenido_link,
                            content.adm_order ,
                            
                            acceso.id acceso_id,
                            acceso.adm_order adm_order,
                            acceso.adm_name  acceso_nombre,
                            acceso.adm_btn acceso_btn,
                            acceso.adm_link acceso_link,
                            acceso.adm_acceso_pertenece acceso_pertenece,
                                                        
                            menu.adm_usm_ci
                        FROM ctg_modulos_ll content
                        LEFT JOIN ctg_modulos_lll acceso
                        ON content.id = acceso.id_modulo_ll 
                            INNER JOIN adm_usuarios_menu menu 
                                ON menu.ctg_men_id = acceso.adm_order
                            INNER JOIN adm_usuarios_menu menu_l
                                ON menu_l.ctg_men_id = content.adm_order
                        WHERE content.adm_contenido = $menu 
                            AND menu.ctg_men_id = acceso.adm_order
                            AND menu_l.ctg_men_id = content.adm_order
                            AND menu.adm_usm_ci='$userid'
                        ORDER BY acceso.adm_order";
                    
    //print $var_consulta;

    $qTMP = pg_query($rmfAdm, $var_consulta);
    while ( $rTMP = pg_fetch_assoc($qTMP) ){
        $arrModulo  [$rTMP["contenido_id"]]["id"] = $rTMP["contenido_id"]; 
        $arrModulo  [$rTMP["contenido_id"]]["nombre"] = $rTMP["contenido_nombre"]; 
        $arrModulo  [$rTMP["contenido_id"]]["btn"]  = $rTMP["contenido_btn"]; 
        $arrModulo  [$rTMP["contenido_id"]]["link"] = $rTMP["contenido_link"]; 
                                                
        if( isset( $rTMP['acceso_id']  ) && intval( $rTMP['acceso_id']  ) > 0  ){
    
            if( isset($rTMP['acceso_pertenece']) && intval( $rTMP['acceso_pertenece'] ) > 0  ){
                if ( isset($arrModulo[$rTMP['contenido_id']]['accesos'][ $rTMP['acceso_pertenece'] ]) ){
                    $arrModulo  [$rTMP['contenido_id']]['accesos'][ $rTMP['acceso_pertenece'] ]['hijos'][ $rTMP['acceso_id'] ] ['nombre']        = $rTMP['acceso_nombre'];
                    $arrModulo  [$rTMP['contenido_id']]['accesos'][ $rTMP['acceso_pertenece'] ]['hijos'][ $rTMP['acceso_id'] ]['btn']        = $rTMP['acceso_btn'];
                    $arrModulo  [$rTMP['contenido_id']]['accesos'][ $rTMP['acceso_pertenece'] ]['hijos'][ $rTMP['acceso_id'] ]['link']        = $rTMP['acceso_link'];
            
                }              
            }
            else{
                $arrModulo  [$rTMP['contenido_id']]['accesos'][ $rTMP['acceso_id'] ]['nombre']        = $rTMP['acceso_nombre'];
                $arrModulo  [$rTMP['contenido_id']]['accesos'][ $rTMP['acceso_id'] ]['btn']        = $rTMP['acceso_btn'];
                $arrModulo  [$rTMP['contenido_id']]['accesos'][ $rTMP['acceso_id'] ]['link']        = $rTMP['acceso_link'];
            
            }
        }

    }
    //print_r($arrModulo);
    pg_free_result($qTMP);
?>

