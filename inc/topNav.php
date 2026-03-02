<?php
if(!defined("ABSPATH")) exit;

function myThemeToNavCustomizer($wp_customize){
    // new section

    $wp_customize->add_section("clinic_topbar_section",[
        "title"=>__("Topbar Nav Settings","myTheme"),
        "priority"=>30,
    ]);

    // show/hide Topbar

    $wp_customize->add_setting("topbar_show",[
        "default"=>true,
        "sanitize_callback"=>"wp_validate_boolean",
    ]);

    $wp_customize->add_control("topbar_show",[
        "label"=>__("Display Topbar","myTheme"),
        "section"=>"clinic_topbar_section",
        "type"=>"checkbox",
    ]);

}

add_action("customize_register","myThemeToNavCustomizer");