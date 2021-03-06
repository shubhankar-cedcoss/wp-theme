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
 */

get_header();
$user = get_user_role();
echo $user;


?>

<?php if ( get_theme_mod( 'basic-author-callout-display' ) === 'Yes' ) { ?>
<div class="row row-padding author">
	<div class="col-6 author-image">
	<img src="<?php echo wp_get_attachment_url( get_theme_mod( 'basic-author-callout-image' ) ); ?>" alt="Author Image">
	</div>
	<div class="col-6 author-content">
		<?php
		$author_text = get_theme_mod( 'basic-author-callout-text' );
		if ( '' !== $author_text ) {
				echo wpautop( $author_text );
		} else {
				echo 'Edit this by going to your Dashboard -> Appearance -> Customise -> Author Editor';
		}
		?>
	</div>
</div> 
<?php } ?>



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
