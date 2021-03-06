<?php
/**
 * Template Name: No-header
 * Template Post Type: post, page, event
 *
 * @package WordPress
 * @subpackage mytheme
 */

// get_header(); .
?>



<!-- Page Content -->
<div class="container">

		<div class="row">

			<!-- Blog Entries Column -->
			<div class="col-md-8">

				<h1 class="my-4">Page Heading
					<small>Secondary Text</small>
				</h1>
				<?php
				if ( have_posts() ) {
					while ( have_posts() ) {
							the_post();
						?>
				<!-- Blog Post -->				
				<div class="card mb-4">
					<img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
					<div class="card-body">					
						<h2 class="card-title"><?php the_title(); ?></h2>
						<?php the_content(); ?>
						<a href="#" class="btn btn-primary">Read More &rarr;</a>
					</div>
					<div class="card-footer text-muted">
						Posted on <?php the_date(); ?> by
						<a href="#"><?php the_author(); ?></a>
					</div>
				</div>
						<?php
					}
				}
				?>

				<!-- Pagination -->
				<ul class="pagination justify-content-center mb-4">
					<li class="page-item">
						<a class="page-link" href="#">&larr; Older</a>
					</li>
					<li class="page-item disabled">
						<a class="page-link" href="#">Newer &rarr;</a>
					</li>
				</ul>

			</div>

<?php get_sidebar(); ?>

		</div>
		<!-- /.row -->

	</div>
	<!-- /.container -->

<?php get_footer(); ?>
