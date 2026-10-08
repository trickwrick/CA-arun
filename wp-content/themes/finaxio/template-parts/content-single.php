<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package finaxio
 */
$post_date = finaxio_option('blog_list_date', true);
$post_author = finaxio_option('blog_list_author', true);
$post_comment = finaxio_option('blog_list_comment', true);
?>

<?php finaxio_post_thumbnail(); ?>
<div class="blog__details-left-meta">
	<ul>
		<?php if ($post_author == 'yes') : ?>
			<li><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
					<i class="fal fa-user"></i> <?php the_author(); ?>
				</a>
			</li>
		<?php endif; ?>
		<li><i class="fal fa-calendar-alt"></i><?php the_time(get_option('date_format')) ?></li>
		<?php if (get_comments_number() != 0 && $post_comment == 'yes') : ?>
			<li><span><?php finaxio_comment_number(); ?></span> </li>
		<?php endif; ?>
	</ul>

</div>


<div class="entry-content">
	<?php
	the_content();
	wp_link_pages(
		array(
			'before' => '<div class="page-links">' . esc_html__('Pages:', 'finaxio'),
			'after'  => '</div>',
		)
	);
	?>
</div>
<?php if (has_tag()) : ?>

	<div class="blog__details-left-related-tag align-items-baseline">
		<?php finaxio_entry_footer(); ?>
	</div>

<?php endif; ?>