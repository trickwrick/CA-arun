<?php

/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package finaxio
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
	return;
}
?>

<div id="comments" class="blog__details-left-comment mt-65">

	<?php
	// You can start editing here -- including this comment!
	if (have_comments()) :
	?>
		<?php
		$finaxio_comment_count = get_comments_number();
		$finaxio_comments_text = number_format_i18n($finaxio_comment_count);
		if ('1' === $finaxio_comment_count) {
			$finaxio_comments_text .= esc_html__(' Comment', 'finaxio');
		} else {
			$finaxio_comments_text .= esc_html__(' Comments', 'finaxio');
		}
		?>
		<h4 class="comments-title mb-30"><?php echo esc_html($finaxio_comments_text); ?></h4>
		<!-- .comments-title -->
		<?php the_comments_navigation(); ?>
		<div class="comment-list">
			<?php
			wp_list_comments(
				array(
					'callback' => 'finaxio_custom_comments',
				)
			);
			?>
		</div><!-- .comment-list -->
		
		<?php the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if (!comments_open()) :
		?>
			<p class="no-comments"><?php esc_html_e('Comments are closed.', 'finaxio'); ?></p>
	<?php
		endif;

	endif; ?>

	<div class="blog__details-left-contact-form">
		<?php comment_form(); ?>
	</div>
</div><!-- #comments -->