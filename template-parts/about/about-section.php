<?php 
if(!defined("ABSPATH")) exit;
?>
<div class="row align-items-center">
    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
    <div class="about-content">
       <?php echo wp_kses_post(get_the_content()); ?>

        <div class="stats-grid">
        <div class="stat-item">
            <span class="stat-number" data-purecounter-start="0" data-purecounter-end="15000"
            data-purecounter-duration="2">15000</span>
            <span class="stat-label">Patients Treated</span>
        </div>
        <div class="stat-item">
            <span class="stat-number" data-purecounter-start="0" data-purecounter-end="25"
            data-purecounter-duration="2">25</span>
            <span class="stat-label">Years Experience</span>
        </div>
        <div class="stat-item">
            <span class="stat-number" data-purecounter-start="0" data-purecounter-end="50"
            data-purecounter-duration="2">50</span>
            <span class="stat-label">Medical Specialists</span>
        </div>
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