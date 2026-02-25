<?php 

// include css and js

function clinicAssets() {
    // font
    wp_enqueue_style("google-font","https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" );

    // css include
    wp_enqueue_style("bootstrap-min",get_template_directory_uri()."/assets/vendor/bootstrap/css/bootstrap.min.css",[],"1.0");
    wp_enqueue_style("bootstrap-icon",get_template_directory_uri()."/assets/vendor/bootstrap-icons/bootstrap-icons.css",[],"1.0");
    wp_enqueue_style("aos",get_template_directory_uri()."/assets/vendor/aos/aos.css",[],"1.0");
    wp_enqueue_style("glightbox",get_template_directory_uri()."/assets/vendor/glightbox/css/glightbox.min.css",[],"1.0");
    wp_enqueue_style("all-min",get_template_directory_uri()."/assets/vendor/fontawesome-free/css/all.min.css",[],"1.0");
    wp_enqueue_style("swiper-min",get_template_directory_uri()."/assets/vendor/swiper/swiper-bundle.min.css",[],"1.0");
    wp_enqueue_style("main",get_template_directory_uri()."/assets/css/main.css",[],"1.0");

    wp_enqueue_style("mainCss",get_stylesheet_uri(),[],1.0);


    // js include
    wp_enqueue_script("bootstrapjs-min", get_template_directory_uri()."/assets/vendor/bootstrap/js/bootstrap.bundle.min.js",[],"1.0",true);
    wp_enqueue_script("validate", get_template_directory_uri()."/assets/vendor/php-email-form/validate.js",[],"1.0",true);
    wp_enqueue_script("aos", get_template_directory_uri()."/assets/vendor/aos/aos.js",[],"1.0",true);
    wp_enqueue_script("glightbox-min", get_template_directory_uri()."/assets/vendor/glightbox/js/glightbox.min.js",[],"1.0",true);
    wp_enqueue_script("purecounter", get_template_directory_uri()."/assets/vendor/purecounter/purecounter_vanilla.js",[],"1.0",true);
    wp_enqueue_script("swiper-bundel", get_template_directory_uri()."/assets/vendor/swiper/swiper-bundle.min.js",[],"1.0",true);
    wp_enqueue_script("main", get_template_directory_uri()."/assets/js/main.js",[],"1.0",true);


}

add_action("wp_enqueue_scripts","clinicAssets");

// to inject url as a resources

function myThemeResource($urls,$relation_type){
    if('preconnect'=== $relation_type){
        $urls[]=[
            "href" => "https://fonts.googleapis.com"
        ];
        $urls[]=[
            "href"=>"https://fonts.gstatic.com",
            'crossorigin'=>'anonymous'
        ];
    }

    return $urls;
}

add_filter("wp_resource_hints","myThemeResource",10,2);

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
}
add_action("after_setup_theme","myThemeSetup");


// customizer

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







