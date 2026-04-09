<?php
if(!defined("ABSPATH")) exit;
// add meta box
function myTheme_add_values_metabox($post_type,$post){
    add_meta_box(
        "myTheme_values",
        __("Core Values Section","myTheme"),
        "myTheme_values_callback",
        "page",
        "normal",
        "high"
    );
};
add_action("add_meta_boxes","myTheme_add_values_metabox",10,2);

// metabox ui
function myTheme_values_callback($post) {
    echo "Hi";
}

// metabox data save
