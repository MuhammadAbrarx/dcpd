<?php /*
  Template Name: Home
  Author: Muhammad Abrar
  Theme URI: Dailychandpurdarpan.com
  Description: A handrolled WordPress Multipurpose Bootstrap theme
  Version: 2.4
  Tags: responsive, sky blue, bootstrap
  
  License: Free for Personal Use Only
  License URI:
  
  */
  
  get_header();
  ?>
<!-- BEGIN #content -->
<main id="content">
  <!-- BEGIN .wrapper -->
  <div class="ot-content-wrapper-full">
    <!-- BEGIN TOP POSTS & LATEST POSTS  -->
    <?php get_template_part( 'template-parts/content','topnews-latestnews'); ?>
    <!-- END TOP POSTS & LATEST POSTS -->
  </div>
  

  <!-- BEGIN POSTS GALLERY-->
    <?php get_template_part( 'template-parts/content','posts-gallery'); ?>
  
  <!-- BEGIN .wrapper -->
  <!-- BEGIN UPOJELAR KHOBOR & MOST READ ARTICLES-->
    <?php get_template_part( 'template-parts/content','upojelarkhobor-mostreadarticles'); ?>
  <!-- END UPOJELAR KHOBOR & MOST READ ARTICLES -->
</main>
<!-- Footer starts -->
<?php
get_footer();
?>