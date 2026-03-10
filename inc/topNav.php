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

    // email

    $wp_customize->add_setting("topbar_email",[
        "default"=>"contact@example.com",
        "sanitize_callback"=>"sanitize_email",
    ]);

    $wp_customize->add_control("topbar_email",[
        "label"=>__("Email Address","myTheme"),
        "section"=>"clinic_topbar_section",
        "type"=>"text",
    ]);

    // phone number
    $wp_customize->add_setting("topbar_number",[
        "default"=>"+1 5589 55488 55",
        "sanitize_callback"=>"sanitize_text_field",
    ]);

    $wp_customize->add_control("topbar_number",[
        "label"=>__("Phone Number","myTheme"),
        "section"=>"clinic_topbar_section",
        "type"=>"text",
    ]);

    // social

    $socials = [
        "twitter",
        "facebook",
        "instagram",
        "linkedin",
    ];

    foreach($socials as $social) {
        $wp_customize->add_setting("topbar_{$social}",[
            "default"=>"#!",
            "sanitize_callback"=>"esc_url_raw",
        ]);

        $wp_customize->add_control("topbar_{$social}",[
            "label"=>__(ucfirst($social).' URL',"myTheme"),
            "section"=>"clinic_topbar_section",
            "type"=>"url",
        ]);
    }
}

add_action("customize_register","myThemeToNavCustomizer");