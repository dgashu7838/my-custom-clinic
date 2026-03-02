<?php 

if(!defined("ABSPATH")){
    exit;
}

function myThemeCustomizeRegister($wp_customize){
    // logo width
    $wp_customize->add_setting("logo_width",[
        "default"=>200,
        "santize_callback"=>"absint",
    ]);

    $wp_customize->add_control("logo_width",[
        'label'=>__("Logo Width(px)","mytheme"),
        "section"=>"title_tagline",
        "type"=>"number",
        "input_attrs"=>[
            "min"=>50,
            "max"=>600,
            "step"=>10
        ],
    ]);

    // logo show/hide option

    $wp_customize->add_setting("show_site_title",[
            "default"=>true,
            "sanitize_callback"=>"wp_validate_boolean",
    ]);

    $wp_customize->add_control("show_site_title",[
        "label" => __("Display Site Title","myTheme"),
        "section"=>"title_tagline",
        "type"=>"checkbox",
    ]);
}
add_action("customize_register","myThemeCustomizeRegister");