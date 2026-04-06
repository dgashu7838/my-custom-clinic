<?php 
if(!defined("ABSPATH")) exit;

function myTheme_stats_section($wp_customize){
    // section
    $wp_customize->add_section("clinic_stats_section",[
        "title"=>__("Clinic Stats","myTheme"),
        "panel"=>"clinic_global_panel",
    ]);

    $stats = [
        "patients_treated"=>15000,
        "years_experince"=>25,
        "medical_specialists"=>50,
    ];

    foreach($stats as $stat=>$val){

        // section
        $wp_customize->add_setting("topbar_{$stat}",[
            "default"=>ucwords(str_replace("_"," ",$stat)),
            "sanitize_callback"=>"sanitize_text_field",
        ]);      

        

        $wp_customize->add_control("topbar_{$stat}",[
            "label"=>__(ucwords(str_replace("_"," ",$stat)),"myTheme"),
            "section"=>"clinic_stats_section",
            "type"=>"text",
        ]);
        // value
        $wp_customize->add_setting("topbar_{$stat}_value",[
            "default"=>"$val",
            "sanitize_callback"=>"absint",
        ]);             

        $wp_customize->add_control("topbar_{$stat}_value",[
            "label"=>__(ucwords(str_replace("_"," ",$stat)." Value"),"myTheme"),
            "section"=>"clinic_stats_section",
            "type"=>"absint",
        ]);

        
    }
}

add_action("customize_register","myTheme_stats_section");