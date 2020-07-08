<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage poca
 */
get_header();
?>

<!-- ***** Breadcrumb Area Start ***** -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/bg-img/2.jpg);">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <h2 class="title mt-70">Podcasts</h2>
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
              <li class="breadcrumb-item active" aria-current="page">Podcasts</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <!-- ***** Breadcrumb Area End ***** -->

  <!-- ***** Featured Music Area Start ***** -->
  <div class="poca-featured-music-area mt-50">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="poca-music-area box-shadow d-flex align-items-center flex-wrap border" data-animation="fadeInUp" data-delay="900ms">
            <div class="poca-music-thumbnail">
              <img src="<?php echo get_template_directory_uri(); ?>/img/bg-img/4.jpg" alt="">
            </div>
            <div class="poca-music-content">
              <span class="music-published-date">December 9, 2018</span>
              <h2>Episode 203 - The Last Blockbuster</h2>
              <div class="music-meta-data">
                <p>By <a href="#" class="music-author">Admin</a> | <a href="#" class="music-catagory">Tutorials</a> | <a href="#" class="music-duration">00:02:56</a></p>
              </div>
              <!-- Music Player -->
              <div class="poca-music-player">
                <audio preload="auto" controls>
                  <source src="audio/dummy-audio.mp3">
                </audio>
              </div>
              <!-- Likes, Share & Download -->
              <div class="likes-share-download d-flex align-items-center justify-content-between">
                <a href="#"><i class="fa fa-heart" aria-hidden="true"></i> Like (29)</a>
                <div>
                  <a href="#" class="mr-4"><i class="fa fa-share-alt" aria-hidden="true"></i> Share(04)</a>
                  <a href="#"><i class="fa fa-download" aria-hidden="true"></i> Download (12)</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ***** Featured Music Area End ***** -->

  <!-- ***** Latest Episodes Area Start ***** -->
  <section class="poca-latest-epiosodes section-padding-80">
    <div class="container">
      <div class="row">
        <!-- Section Heading -->
        <div class="col-12">
          <div class="section-heading text-center">
            <h2>Latest Episodes</h2>
            <div class="line"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Projects Menu -->
    <div class="container">
      <div class="poca-projects-menu mb-30 wow fadeInUp" data-wow-delay="0.3s">
        <div class="text-center portfolio-menu">
          <button class="btn active" data-filter="*">All</button>
          <button class="btn" data-filter=".entre">Entrepreneurship</button>
          <button class="btn" data-filter=".media">Media</button>
          <button class="btn" data-filter=".tech">Tech</button>
          <button class="btn" data-filter=".tutor">Tutorials</button>
        </div>
      </div>
    </div>
    
    <div class="container">
        <div class="row poca-portfolio">   
        <!-- Single gallery Item -->
            <?php
            $args = array(  
            'post_type'      => 'podcast',
            'post_status'    => 'publish',
            'posts_per_page' => 6,
            ); 
        
            $loop = new WP_Query( $args ); 

            while ( $loop->have_posts() ) : $loop->the_post(); 
            ?>  
            <div class="col-12 col-md-6 single_gallery_item entre wow fadeInUp" data-wow-delay="0.2s"> 
            <!-- Welcome Music Area -->
                <div class="poca-music-area style-2 d-flex align-items-center flex-wrap">
                    <div class="poca-music-thumbnail">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="poca-music-content text-center">
                        <span class="music-published-date mb-2"><?php echo get_the_date(); ?></span>
                        <h2><?php the_title(); ?></h2>
                       <?php
                       $list = wp_get_post_terms($post->ID, 'Category_taxonomy', array( 'fields' => 'all' ) );
                       //print_r($list);
                       foreach($list as $taxonomy) {           
                        ?>   
                        <div class="music-meta-data">
                            <p>By <a href="#" class="music-author"><?php the_author(); ?></a> | <a href="<?php echo $taxonomy->slug ?>" class="music-catagory"><?php echo $taxonomy->name; ?></a> | <a href="#" class="music-duration">00:02:56</a></p>
                        </div>
                       <?php } ?>
                        <!-- Music Player -->
                        <div class="poca-music-player">
                            <audio preload="auto" controls>
                            <source src="<?php echo get_template_directory_uri(); ?>/audio/dummy-audio.mp3">
                            </audio>
                        </div>
                        <!-- Likes, Share & Download -->
                        <div class="likes-share-download d-flex align-items-center justify-content-between">
                            <a href="#"><i class="fa fa-heart" aria-hidden="true"></i> Like (29)</a>
                            <div>
                            <a href="#" class="mr-4"><i class="fa fa-share-alt" aria-hidden="true"></i> Share(04)</a>
                            <a href="#"><i class="fa fa-download" aria-hidden="true"></i> Download (12)</a>
                        </div>
                        </div>
                    </div>                    
                </div>
            </div>
            <?php
            endwhile;

            wp_reset_postdata();
            ?>
        </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <a href="#" class="btn poca-btn mt-70">Load More</a>
        </div>
      </div>
    </div>
  </section>
  <!-- ***** Latest Episodes Area End ***** -->
    




  <?php get_footer(); ?>