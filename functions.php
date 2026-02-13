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
}
add_action("customize_register","myThemeCustomizeRegister");




