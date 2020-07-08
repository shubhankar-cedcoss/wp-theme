<?php
/**
 * Template for displaying prodcasts .
 * @package poca
 */

get_header();
?>

<!-- ***** Breadcrumb Area Start ***** -->
<div class="breadcumb-area single-podcast-breadcumb bg-img bg-overlay" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/bg-img/2.jpg);">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
          <!-- Music Area -->
          <div class="poca-music-area style-2 bg-transparent mb-0">
            <div class="poca-music-content text-center">
              <span class="music-published-date mb-2">December 9, 2018</span>
              <h2 class="text-white">Episode 201 - You Don’t Know Squat!</h2>
              <div class="music-meta-data">
                <p class="text-white">By <a href="#" class="music-author text-white">Admin</a> | <a href="#" class="music-catagory  text-white">Tutorials</a> | <a href="#" class="music-duration  text-white">00:02:56</a></p>
              </div>
              <!-- Music Player -->
              <div class="poca-music-player style-2">
                <audio preload="auto" controls>
                  <source src="<?php echo get_template_directory_uri() ?>/audio/dummy-audio.mp3">
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

<div class="breadcumb--con">
    <div class="container">
    <div class="row">
        <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#">Blog</a></li>
            <li class="breadcrumb-item active" aria-current="page">Single</li>
            </ol>
        </nav>
        </div>
    </div>
    </div>
</div>
<!-- ***** Breadcrumb Area End ***** -->

 <!-- ***** Podcast Details Area Start ***** -->
<section class="podcast-details-area">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
            <div class="podcast-details-content d-flex mt-5 mb-80">

                <!-- Post Share -->
                <div class="post-share">
                <p>Share</p>
                <div class="social-info">
                    <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="#" class="google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                    <a href="#" class="pinterest"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    <a href="#" class="thumb-tack"><i class="fa fa-thumb-tack" aria-hidden="true"></i></a>
                </div>
                </div>
                <?php 
                if(have_posts()) {
                    while(have_posts()) {
                        the_post();                
                
                ?>
                <!-- Post Details Text -->
                <div class="post-details-text">
                <?php //the_content(); ?>

                <!-- Blockquote -->
                <!-- <blockquote class="poca-blockquote d-flex">
                    <div class="icon">
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                    </div>
                    <div class="text">
                    <h5></h5>
                    <h6><?php //the_author(); ?></h6>
                    </div>
                </blockquote> -->

                <h2><?php the_title(); ?></h2>
                <p><?php the_content(); ?></p>
                <p></p>
                <p></p>
    
                <!-- Post Catagories -->
                <div class="post-catagories d-flex align-items-center">
                    <h6>Categories:</h6>
                    <ul class="d-flex flex-wrap align-items-center">
                    <li><a href="#"><?php the_category(',') ?></a></li>
                    
                    </ul>
                </div>

                <!-- Pagination -->
                <div class="poca-pager d-flex mb-30">
                    <?php
                    $pre_post = get_adjacent_post(false,'', true);
                    $next_post = get_adjacent_post(false,'',false);
                    ?>
                    <a href="<?php echo get_permalink($pre_post->ID) ?>">Previous Post <span><?php echo ($pre_post->post_title) ?></span></a>
                    <a href="<?php echo get_permalink($next_post->ID) ?>">Next Post <span><?php echo ($next_post->post_title) ?></span></a>
                </div>
                
                <?php 
                    }
                }
                ?> 

                <!-- Comments Area -->
                <?php
                        if ( comments_open() ) {
                            ?>
                            <div class="comments-area">
                                <?php comments_template(); ?>
                            </div>
                            <?php
                        }
                    ?>

                    <div class="contact-form">
                        <?php
                            $comment_name= 'Name';//placeholder
                            $comment_email= 'Email';
                            $comment_body= 'Comment';

                            $args =  array(
                            'fields' => array(
                                'author' => '<div class="col-lg-6">
                                            <input type="text" name="author" id="author" class="form-control mb-30" placeholder="'. $comment_name .'">
                                            </div>',
                                
                                'email'  => '<div class="col-lg-6">
                                            <input type="email" name="email" id="email" class="form-control mb-30" placeholder="'. $comment_email .'">
                                            </div>',

                            ),
                            'comment_field' => '<div class="col-12">
                                            <textarea name="comment" id="comment" class="form-control mb-30" placeholder="'. $comment_body .'"></textarea>
                                            </div>',
                            'submit_button' => '<div class="col-12">
                                            <button name="%1$s" type="submit" id="%2$s" value="%4$s"  class="btn poca-btn mt-30 %3$s">Post Comment</button>
                                            </div>',
                            
                            'title_reply' => '<h5> Leave A Comment </h5>', 
                        );
                        
                        comment_form($args)
                        ?>
                    </div>
                </div>
            </div>
            </div>

        <?php get_sidebar(); ?>	
    </div>
</section>        

<?php get_footer(); ?>
