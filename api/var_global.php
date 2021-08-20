<?php
//VARIABLES GLOBALES
//global location
require_once '../../interbase/tmfAdm.php';
$arrConfig = array();
$var_consulta = "SELECT * FROM adm_config";

$qTMP = pg_query($rmfAdm, $var_consulta);
while ($rTMP = pg_fetch_assoc($qTMP)) {

    $arrConfig[$rTMP["ctg_id"]]["ctg_id"]                 = $rTMP["ctg_id"];
    $arrConfig[$rTMP["ctg_id"]]["adm_cnf_numfal"]         = $rTMP["adm_cnf_numfal"];
    $arrConfig[$rTMP["ctg_id"]]["adm_cnf_numfaldias"]     = $rTMP["adm_cnf_numfaldias"];
    $arrConfig[$rTMP["ctg_id"]]["adm_cnf_numbol"]         = $rTMP["adm_cnf_numbol"];
    $arrConfig[$rTMP["ctg_id"]]["adm_cnf_numboldias"]     = $rTMP["adm_cnf_numboldias"];
    $arrConfig[$rTMP["ctg_id"]]["adm_cnf_firma"]          = $rTMP["adm_cnf_firma"];
    $arrConfig[$rTMP["ctg_id"]]["adm_cnf_firma2"]         = $rTMP["adm_cnf_firma2"];
    $arrConfig[$rTMP["ctg_id"]]["adm_cnf_desig1"]         = $rTMP["adm_cnf_desig1"];
    $arrConfig[$rTMP["ctg_id"]]["adm_cnf_desig2"]         = $rTMP["adm_cnf_desig2"];
    $arrConfig[$rTMP["ctg_id"]]["adm_cnf_backup"]         = $rTMP["adm_cnf_backup"];
    $arrConfig[$rTMP["ctg_id"]]["sistema_siglas"]         = $rTMP["sistema_siglas"];
    $arrConfig[$rTMP["ctg_id"]]["adm_cnf_location_adm"]  = $rTMP["adm_cnf_location_adm"];
    $arrConfig[$rTMP["ctg_id"]]["adm_cnf_location_vus"]   = $rTMP["adm_cnf_location_vus"];
    $arrConfig[$rTMP["ctg_id"]]["adm_cnf_location_insp"] = $rTMP["adm_cnf_location_insp"];
    $arrConfig[$rTMP["ctg_id"]]["adm_cnf_acceso"]         = $rTMP["adm_cnf_acceso"];
    $arrConfig[$rTMP["ctg_id"]]["adm_cnf_email1"]         = $rTMP["adm_cnf_email1"];
    $arrConfig[$rTMP["ctg_id"]]["adm_cnf_email2"]        = $rTMP["adm_cnf_email2"];
    $arrConfig[$rTMP["ctg_id"]]["adm_cnf_email3"]         = $rTMP["adm_cnf_email3"];
    $arrConfig[$rTMP["ctg_id"]]["adm_cnf_color"]          = $rTMP["adm_cnf_color"];
    $arrConfig[$rTMP["ctg_id"]]["adm_cnf_timref"]         = $rTMP["adm_cnf_timref"];
    $arrConfig[$rTMP["ctg_id"]]["adm_cnf_pais"]           = $rTMP["adm_cnf_pais"];
    $arrConfig[$rTMP["ctg_id"]]["adm_cnf_ipint"]          = $rTMP["adm_cnf_ipint"];
    $arrConfig[$rTMP["ctg_id"]]["adm_cnf_ipext"]          = $rTMP["adm_cnf_ipext"];
    $arrConfig[$rTMP["ctg_id"]]["adm_cnf_ip_insp"]        = $rTMP["adm_cnf_ip_insp"];
    $arrConfig[$rTMP["ctg_id"]]["sistema_logo"]           = $rTMP["sistema_logo"];
    $arrConfig[$rTMP["ctg_id"]]["sistema_name"]           = $rTMP["sistema_name"];
    $arrConfig[$rTMP["ctg_id"]]["sistema_version"]        = $rTMP["sistema_version"];
    $arrConfig[$rTMP["ctg_id"]]["adm_cnf_licence3"]       = $rTMP["adm_cnf_licence3"];
    $arrConfig[$rTMP["ctg_id"]]["adm_cnf_actividades"]    = $rTMP["adm_cnf_actividades"];
    $arrConfig[$rTMP["ctg_id"]]["adm_cnf_mensajes"]       = $rTMP["adm_cnf_mensajes"];
    $arrConfig[$rTMP["ctg_id"]]["adm_cnf_notas"]          = $rTMP["adm_cnf_notas"];
    $arrConfig[$rTMP["ctg_id"]]["adm_cnf_frame"]          = $rTMP["adm_cnf_frame"];
}
pg_free_result($qTMP);
?>
<?php
if (is_array($arrConfig) && (count($arrConfig) > 0)) {
    $intContador = 1;
    reset($arrConfig);
    foreach ($arrConfig as $rTMP['key'] => $rTMP['value']) {

        $adm_cnf_numfal = $rTMP["value"]['adm_cnf_numfal'];
        $adm_cnf_numfaldias = $rTMP["value"]['adm_cnf_numfaldias'];
        $adm_cnf_numbol = $rTMP["value"]["adm_cnf_numbol"];
        $adm_cnf_numboldias = $rTMP["value"]['adm_cnf_numboldias'];
        $adm_cnf_firma = $rTMP["value"]['adm_cnf_firma'];
        $adm_cnf_firma2 = $rTMP["value"]['adm_cnf_firma2'];
        $adm_cnf_desig1 = $rTMP["value"]['adm_cnf_desig1'];
        $adm_cnf_desig2 = $rTMP["value"]['adm_cnf_desig2'];
        $adm_cnf_backup = $rTMP["value"]['adm_cnf_backup'];
        $company = $rTMP["value"]['sistema_siglas'];
        $location_adm = $rTMP["value"]['adm_cnf_location_adm'];
        $location_vus = $rTMP["value"]['adm_cnf_location_vus'];
        $location_ins = $rTMP["value"]['adm_cnf_location_insp'];
        $acceso = $rTMP["value"]['adm_cnf_acceso'];
        $company_email = $rTMP["value"]['adm_cnf_email1'];
        $company_email2 = $rTMP["value"]['adm_cnf_email2'];
        $company_email3 = $rTMP["value"]['adm_cnf_email3'];
        $adm_cnf_color = $rTMP["value"]['adm_cnf_color'];
        $adm_cnf_timref = $rTMP["value"]['adm_cnf_timref'];
        $country = $rTMP["value"]['adm_cnf_pais'];
        $ip_int = $rTMP["value"]['adm_cnf_ipint'];
        $ip_ext = $rTMP["value"]['adm_cnf_ipext'];
        $ip_ins = $rTMP["value"]['adm_cnf_ip_insp'];
        $logo = $rTMP["value"]['sistema_logo'];
        $nombre_sistema = $rTMP["value"]['sistema_name'];
        $version = $rTMP["value"]['sistema_version'];
        $direccion_institucion = $rTMP["value"]['adm_cnf_licence3'];
        $arr_utilidades_flg1 = $rTMP["value"]['adm_cnf_actividades'];
        $arr_utilidades_flg2 = $rTMP["value"]['adm_cnf_mensajes'];
        $arr_utilidades_flg3 = $rTMP["value"]['adm_cnf_notas'];
        $frame_on = $rTMP["value"]['adm_cnf_frame'];
    }
}

// ip global
//if($ip_int == $ip_ext){
//    echo $ip_int;
//}else if($ip_int <> $ip_ext){
//    echo $ip_ext;};


?>

