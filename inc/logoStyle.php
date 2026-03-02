<?php 

if(!defined("ABSPATH")){
    exit;
}

function myThemeCustomLogoCss(){
    $logoWidth = absint(get_theme_mod("logo_width",100) );

    $css = "
        .custom-logo {
            width: {$logoWidth}px;
            height:auto;
        }
    ";

    wp_add_inline_style("mainCss",$css);
}

add_action("wp_enqueue_scripts","myThemeCustomLogoCss");