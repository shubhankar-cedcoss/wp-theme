<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package poca
 */

get_header();
?>

	<main id="primary" class="site-main">
	
	<!-- ***** Breadcrumb Area Start ***** -->
	<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/bg-img/2.jpg)">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <h2 class="title mt-70"><?php the_title(); ?></h2>
        </div>
      </div>
    </div>
  </div>
  <div class="breadcumb--con">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
              <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <!-- ***** Breadcrumb Area End ***** -->

	<!-- ***** Contact Area Start ***** -->
	 <!-- ****** About Us Area Start ******* -->
   <section class="about-us-area section-padding-0-80 mt-50">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
          <div class="about-us-content">
            <img src="<?php echo get_template_directory_uri() ?>/img/bg-img/20.jpg" class="mb-30" alt="">
            <?php
              if( have_posts() ) {
                while( have_posts() ) {
                  the_post();
            ?>
              <h1><?php the_title(); ?></h1>
              <p><?php the_content(); ?></p>
              <p><?php the_content(); ?></p>
              <p><?php the_content(); ?></p>
              <!-- Blockquote -->
              <blockquote class="poca-blockquote d-flex">
                <div class="icon">
                  <i class="fa fa-quote-left" aria-hidden="true"></i>
                </div>
                <div class="text">
                  <h5><?php the_content(); ?></h5>
                  <h6><?php the_author(); ?></h6>
                </div>
              </blockquote>
              <h2><?php the_content(); ?></h2>
              <p><?php the_content(); ?></p>
              <p><?php the_content(); ?></p>
              <p><?php the_content(); ?></p>
              <?php 
                }
              }
              ?>
            </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ****** About Us Area End ****** -->

<?php
get_footer();
