<?php
/*
Template Name:About Page
*/
get_header();
?>
<main class="main">

<!-- Page Title -->
 <?php get_template_part( "template-parts/about/page", "title"); ?>
<!-- End Page Title -->

<!-- About Section -->
<section id="about" class="about section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

    <?php get_template_part( "template-parts/about/about", "section"); ?>

    <?php get_template_part( "template-parts/about/values", "section"); ?>
    <!-- End Values Section -->
    <?php get_template_part( "template-parts/about/certifications"); ?>
    <!-- End Certifications Section -->

    </div>

</section><!-- /About Section -->

</main>

<?php get_footer(); ?>
