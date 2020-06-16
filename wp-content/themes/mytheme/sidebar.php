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

?>

<!-- Sidebar Widgets Column -->
	<div class="col-md-4">

		<div id="sidebar-primary" class="sidebar">
			<?php if ( is_active_sidebar( 'primary' ) ) : ?>
				<?php dynamic_sidebar( 'primary' ); ?>
				<?php
					else :
						echo 'hello world';
						?>
				<!-- Time to add some widgets! -->
			<?php endif; ?>
		</div>
</div>
