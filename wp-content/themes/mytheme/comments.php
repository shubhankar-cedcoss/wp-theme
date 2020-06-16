<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage mytheme
 */

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
					printf(
						esc_html(/* translators: %s: search term */
							_nx(
								'%s reply',
								'%s replies',
								get_comments_number(),
								'comments title',
								'mytheme'
							)
						),
						esc_html( number_format_i18n( get_comments_number() ) ),
						'<span>' . esc_html( get_the_title() ) . '</span>'
					);
			?>
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments(
					array(
						'style'       => 'ol',
						'short_ping'  => true,
						'avatar_size' => 74,
					)
				);
			?>
		</ol><!-- .comment-list -->

		<?php
			// Are there comments to navigate through?
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
			?>
		<nav class="navigation comment-navigation" role="navigation">
			<h1 class="screen-reader-text section-heading"><?php esc_html_e( 'Comment navigation', 'mytheme' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&amp;larr; Older Comments', 'mytheme' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &amp;rarr;', 'mytheme' ) ); ?></div>
		</nav><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation. ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'mytheme' ); ?></p>
		<?php endif; ?>

	<?php endif; ?>
	<?php comment_form(); ?>

</div><!-- #comments -->
