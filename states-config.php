<?php 
// This version changes it from a long list to a loop, 
// fixes some weirdness with the "enable" flag, and 
// fixes the issue with apostrophes breaking hover content.

$wp_map = $this->options;
$isos = explode(",","iso_blank,iso_al,iso_ak,iso_az,iso_ar,iso_ca,iso_co,iso_ct,iso_de,iso_fl,iso_ga,iso_hi,iso_id,iso_il,iso_in,iso_ia,iso_ks,iso_ky,iso_la,iso_me,iso_md,iso_ma,iso_mi,iso_mn,iso_ms,iso_mo,iso_mt,iso_ne,iso_nv,iso_nh,iso_nj,iso_nm,iso_ny,iso_nc,iso_nd,iso_oh,iso_ok,iso_or,iso_pa,iso_ri,iso_sc,iso_sd,iso_tn,iso_tx,iso_ut,iso_vt,iso_va,iso_wa,iso_wv,iso_wi,iso_wy,iso_dc");
?>

var st_config = {
	'default':{
		'bordercolor':'<?php echo str_replace("'", "\'",$wp_map['border_color']); ?>',
		'namescolor':'<?php echo str_replace("'", "\'",$wp_map['short_names']); ?>',
		'shadowcolor':'<?php echo str_replace("'", "\'",$wp_map['shadow_color']); ?>',
		'lakesfill':'<?php echo str_replace("'", "\'",$wp_map['lake_fill']); ?>',
		'lakesoutline':'<?php echo str_replace("'", "\'",$wp_map['lake_outline']); ?>',
	},
    <?php
    for($i = 1; $i <= 51; $i++){
        $confstr = '';
        $confstr .= "'st_" . $i . "':{'hover': '" . str_replace(array("\n","\r","\r\n","'"),"", is_array($wp_map['hover_content_' . $i]) ? array_map('stripslashes_deep', $wp_map['hover_content_' . $i]) : stripslashes($wp_map['hover_content_' . $i])) . "',\n";
        $confstr .= "'url':'" . str_replace("'", "\'",$wp_map['url_' . $i]) . "',\n";
        $confstr .= "'target':'" . str_replace("'", "\'",$wp_map['open_url_' . $i]) . "',\n";
        $confstr .= "'upcolor':'" . str_replace("'", "\'",$wp_map['up_color_' . $i]) . "',\n";
        $confstr .= "'overcolor':'" . str_replace("'", "\'",$wp_map['over_color_' . $i]) . "',\n";
        $confstr .= "'downcolor':'" . str_replace("'", "\'",$wp_map['down_color_' . $i]) . "',\n";
        $confstr .= "'enable':";
        if(!array_key_exists('enable_region_' . $i, $wp_map) || $wp_map['enable_region_' .$i] != '1'){ 
            $confstr .= "false,\n"; 
        } else {
            $confstr .= "true,\n"; 
        }
        $confstr .= "'iso':'" . $isos[$i] . "',},\n";
        echo $confstr;
    }
    ?>
}
