<?php 
if(!defined("ABSPATH")) exit;
?>
<div class="row align-items-center">
    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
    <div class="about-content">
       <?php echo wp_kses_post(get_the_content()); ?>

        <div class="stats-grid">
            <?php
                $stats = [
                    "patients_treated" =>[15000,"Patients Treated"],
                    "years_experince" =>[25,"Years Experinced"],
                    "medical_specialists" =>[50,"Medical Specialists"],
                ];

                foreach($stats as $key=>$data){
                    $value = get_theme_mod("topbar_{$key}_value",$data[0]);

                    // Enusure numeric
                    $value = is_numeric($value) ? $value : $data[0];

                    $label_name = get_theme_mod("topbar_{$key}",$data[1]); 
                    
                    if(empty($value) || empty($label_name)){
                        continue;
                    }
                    
                    ?>

                    <div class="stat-item">
                        <span class="stat-number" data-purecounter-start="0" data-purecounter-end="<?php echo esc_attr($value); ?>"
                        data-purecounter-duration="2"><?php echo esc_html($value); ?></span>
                        <span class="stat-label"><?php echo esc_html($label_name); ?></span>
                    </div>
               <?php  }

            ?>

        </div><!-- End Stats Grid -->
    </div><!-- End About Content -->
    </div>

    <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
    <div class="image-wrapper">
        <img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" class="img-fluid main-image" alt="<?php echo esc_attr(get_the_title()); ?>">
        <div class="floating-image" data-aos="zoom-in" data-aos-delay="400">
        <img src="<?php echo get_theme_file_uri()."/assets/img/health/staff-8.webp" ?>" class="img-fluid" alt="Medical team">
        </div>
    </div><!-- End Image Wrapper -->
    </div>
</div>