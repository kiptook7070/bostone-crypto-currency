<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bostone
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div class="post__commets my-5">
	<div id="comments" class="comments-area">

		<?php
		// You can start editing here -- including this comment!
		if ( have_comments() ) :
			?>
			<h4 class="title mb-4">
				<?php
			$bostone_comment_count = get_comments_number();
			if ( '1' === $bostone_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( '(01) Comment  ', 'bostone' ),
					''
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '(%1$s) Comment ', '(%1$s) Comments', $bostone_comment_count, 'comments title', 'bostone' ) ),
					number_format_i18n( $bostone_comment_count ),
					''
				);
			}
			?>
			</h4><!-- .comments-title -->

			<?php the_comments_navigation(); ?>
			<div class="comments__wrapper">
				<ol class="comment-list">
					<?php
					wp_list_comments( array(
						'callback'      => 'bostone_comments',
					) );
					?>
				</ol><!-- .comment-list -->
			</div>
			<?php
			the_comments_navigation();

			// If comments are closed and there are comments, let's leave a little note, shall we?
			if ( ! comments_open() ) :
				?>
				<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'bostone' ); ?></p>
				<?php
			endif;

		endif; // Check for have_comments().

		comment_form();
		?>

	</div><!-- #comments -->
</div>