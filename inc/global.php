<?php 
if(!defined("ABSPATH")) exit;

function myThemeGlobalCustomizer($wp_customize){
    // create Panel
    $wp_customize->add_panel("clinic_global_panel",[
        "title" => __("Global Settings","myTheme"),
        "priority"=>20,
    ]);
}

add_action("customize_register","myThemeGlobalCustomizer");