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
<!-- Footer -->
<footer class="py-5 bg-dark">
<div class="container">
<p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
<?php

$option = get_option( 'wporg_options ' );

?>
<a href="<?php echo( $option['wporg_field_fb'] ); ?>" ><span class="iconify" data-icon="dashicons:facebook" height="50" width="40" data-inline="false"></span></a>


<a href="<?php echo( $option['wporg_field_twitter'] ); ?>" ><span class="iconify" data-icon="dashicons:twitter" height="50" width="40" data-inline="false"></span></a>

</div>
<!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->

<?php wp_footer(); ?>

</body>

</html>

