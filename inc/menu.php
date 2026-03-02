<?php 

if(!defined("ABSPATH")){
    exit;
}

class MyTheme_Nav_Walker extends Walker_Nav_Menu {
    // start Menu
    function start_lvl(&$output,$depth=0,$arg=null){
        $output .='<ul>';
    }

    // start menu item
    function start_el(&$output,$item,$depth=0,$args=null,$id=0){
        // echo "<pre>";
        // print_r($item);

        // check if has children
        $has_children = in_array("menu-item-has-children",$item->classes);

        // wordpress active class
        $active_classes = [
            "current-menu-item",
            "current-menu-parent",
            "current-menu-ancestor",
            "current-page-item",
            "current_page_parent"
        ];

        // get active class
        $is_active = array_intersect($active_classes,$item->classes);

        // li create
        $li_class = $has_children ? " class ='dropdown'" : "";
        $output .= "<li ".$li_class.">";

        // link class
        $link_class = $is_active ? "class='active'":"";

        $atts = "href='".esc_url($item->url)."'".$link_class;

        // output link
        if($has_children){
            $output .="<a ".$atts.">";
            $output .="<span>". esc_html($item->title)."</span>";
            $output .="<i class='bi bi-chevron-down toggle-dropdown'></i>";
            $output .="</a>";
        }else{
            $output .="<a ".$atts.">";
            $output .= esc_html($item->title);
            $output .="</a>";
        }


    }

    // end menu item
    function end_el(&$output,$item,$depth=0,$args=null){
        $output .="</li>";
    }
}