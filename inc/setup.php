<?php 

if(!defined("ABSPATH")){
    exit;
}

function myThemeSetup(){
    // title tag
    add_theme_support("title-tag");

    // post thumbnails
    add_theme_support("post-thumbnails");

    // custom Logo
    add_theme_support("custom-logo",[
        "height"=>100,
        "width"=>100,
        "flex-height"=>true,
        "flex-witdth"=>true,
    ]);

    // register menus
    register_nav_menus([
        "primary"=>__("Primary Menu","mytheme"),
    ]);

    // excerpt enable on page

    add_post_type_support( "page", "excerpt" );
}
add_action("after_setup_theme","myThemeSetup");