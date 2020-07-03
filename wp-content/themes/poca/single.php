<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package poca
 */

get_header();
?>

	<main id="primary" class="site-main">

	<!-- ***** Breadcrumb Area Start ***** -->
	<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/bg-img/2.jpg);">
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
				<li class="breadcrumb-item"><a href="#">Blog</a></li>
				<li class="breadcrumb-item active" aria-current="page">Blog Single</li>
				</ol>
			</nav>
			</div>
		</div>
		</div>
	</div>
	<!-- ***** Breadcrumb Area End ***** -->

	<!-- ***** Blog Details Area Start ***** -->
	<section class="blog-details-area">
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-8">
					<div class="podcast-details-content d-flex mt-5 mb-80">
						<?php
						if( have_posts() ){
							while( have_posts() ){
								the_post();
						?>	

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

						<!-- Post Details Text -->
						<div class="post-details-text">
							<?php the_post_thumbnail(); ?>

							<div class="post-content">
								<a href="#" class="post-date"><?php the_date(); ?></a>
								<h2><?php the_title(); ?></h2>
								<div class="post-meta">
									<a href="#" class="post-author">By <?php the_author(); ?></a> |
									<a href="#" class="post-catagory"><?php the_category(','); ?></a>
								</div>
							</div>

						<?php the_content(); ?>


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
						
						<?php
						// Exit the function when comments for the post are closed.
						if ( ! comments_open() ) {
							/**
							* Fires after the comment form if comments are closed.
							*
							* @since 3.0.0
							*/
							do_action( 'comment_form_comments_closed' );
					
							return;
						}
						?>

						<div class="contact-form">
							<h5 class="mb-30">Leave A Comment</h5>

							<!-- Form -->
							<form action="#" method="post">
								<div class="row">
									<div class="col-lg-6">
										<input type="text" name="message-name" class="form-control mb-30" placeholder="Name">
									</div>
									<div class="col-lg-6">
										<input type="email" name="message-email" class="form-control mb-30" placeholder="Email">
									</div>
									<div class="col-12">
										<textarea name="message" class="form-control mb-30" placeholder="Comment"></textarea>
									</div>
									<div class="col-12">
										<button type="submit" class="btn poca-btn mt-30">Post Comment</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				
			</div>
			<?php get_sidebar(); ?>			
		</div>
  </section>

  <!-- ***** Blog Details Area End ***** -->

	</main><!-- #main -->

<?php

get_footer();
