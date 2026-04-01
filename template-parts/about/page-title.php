<?php 
if(!defined("ABSPATH")) exit;
?>
<div class="page-title">
    <div class="heading">
    <div class="container">
        <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-8">
            <h1 class="heading-title"><?php echo esc_html(get_the_title()); ?></h1>
            <p class="mb-0">
            <?php echo esc_html(substr(get_the_excerpt(),0,260)); ?>
            </p>
        </div>
        </div>
    </div>
    </div>
    <nav class="breadcrumbs">
    <div class="container">
        <ol>
        <li><a href="<?php echo esc_url(site_url("/")); ?>">Home</a></li>
        <li class="current"><?php echo esc_html(get_the_title()); ?></li>
        </ol>
    </div>
    </nav>
</div>