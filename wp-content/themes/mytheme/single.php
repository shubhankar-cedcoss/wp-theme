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
 * @subpackage mytheme
 * @since mytheme
 */

get_header(); ?>

<!-- Page Content -->
<div class="container">

<div class="row">

<!-- Blog Entries Column -->
<div class="col-md-8">
	<?php
	if ( ! is_single( 2102 ) ) {
		?>
		<h1 class="my-4">Page Heading
		<small>Secondary Text</small>
		</h1>	
		<?php
	}

	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			?>
<!-- Blog Post -->
<div class="card mb-4">
			<?php
			if ( ! is_single( 2102 ) ) {
				?>
					<img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
					<?php
			}
			?>
	<div class="card-body">        
		<h2 class="card-title"><?php the_title(); ?></h2>
			<?php
			the_content();

			if ( ! is_single( 2102 ) ) {
				?>
				<a href="#" class="btn btn-primary">Read More &rarr;</a>
				<?php
			}
			?>
	</div>
	<div class="card-footer text-muted">
			<?php the_date(); ?>
		<a href="#"><?php the_author(); ?></a>
	</div>
			<?php
			if ( ! is_single( 2102 ) ) {
				if ( comments_open() ) {
					?>
					<div class="comments-area">
						<?php comments_template(); ?>
					</div>
					<?php
				}
			}
			?>
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

<?php
the_posts_pagination(
	array(
		'prev_text'          => __( 'Older', 'mytheme' ),
		'next_text'          => __( 'Newer', 'mytheme' ),
		'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'mytheme' ) . ' </span>',
	)
);

?>

</div>

<?php get_sidebar(); ?>

</div>
<!-- /.row -->

</div>
<!-- /.container -->

<?php get_footer(); ?>
