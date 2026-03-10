<!DOCTYPE html>
<html <?php language_attributes (); ?>>

<head>
  <meta charset=<?php bloginfo('charset'); ?>>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <?php wp_head(); ?>

</head>

<body  <?php body_class("index-page") ?>>

  <header id="header" class="header fixed-top">
    <?php if(get_theme_mod("topbar_show",true)){ ?>
        <div class="topbar d-flex align-items-center dark-background">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <?php if(get_theme_mod("topbar_email")){?>
            <i class="bi bi-envelope d-flex align-items-center"><a
              href="mailto:<?php echo esc_attr(get_theme_mod("topbar_email")); ?>"><?php echo esc_html(get_theme_mod("topbar_email")); ?></a></i>
          <?php } ?>

          <?php if(get_theme_mod("topbar_number")){?>
            <i class="bi bi-phone d-flex align-items-center ms-4"><a
              href="tel:<?php echo esc_attr(get_theme_mod("topbar_number")); ?>"><?php echo esc_html(get_theme_mod("topbar_number")); ?></a></i>
          <?php } ?>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
          <?php 
              $socials = [
                  "twitter"=>"bi bi-twitter-x",
                  "facebook"=>"bi bi-facebook",
                  "instagram"=>"bi bi-instagram",
                  "linkedin"=>"bi bi-linkedin",
              ];

              foreach($socials as $social=>$icon){
                $url = get_theme_mod("topbar_{$social}");
                if($url){ ?>
                  <a href="<?php echo esc_url($url); ?>" class="<?php echo esc_attr($social) ?>"><i class="<?php echo esc_attr($icon) ?>"></i></a>
              <?php   }
              }
          ?>
        </div>
      </div>
    </div><!-- End Top Bar -->
    <?php } ?>
    

    <div class="branding d-flex align-items-cente">

      <div class="container position-relative d-flex align-items-center justify-content-between">
        <div class="logo d-flex align-items-center">
          <?php
            if(has_custom_logo()){
              the_custom_logo();
            };
            if(get_theme_mod("show_site_title",true)){
          ?>
          <h1 class="sitename"><?php bloginfo("name"); ?></h1>

          <?php } ?>
        </div>

        <nav id="navmenu" class="navmenu">
          <?php
              if(has_nav_menu("primary")){
                wp_nav_menu([
                  "theme_location"=>"primary",
                  "container"=>false,
                  "menu_class"=>"",
                  "walker"=>new MyTheme_Nav_Walker(),
                  "fallback_cb"=>false,
                ]);
              }
          
          ?>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

      </div>

    </div>

  </header>