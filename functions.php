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
}

add_action("wp_enqueue_scripts","clinicAssets");