<?php
/**
 * Comments Main File.
 *
 * @package FINANCER
 * @author  Template Path
 * @version 1.0
 */
?>
<?php
if ( post_password_required() ) {
	return;
}
?>
<?php $count = wp_count_comments(get_the_ID()); ?>

<?php if ( have_comments() ) : ?>
	
<div class="comments-box post-comments" id="comments">
    
    <div class="group-title">
        <h2><?php $comments_number = get_comments_number();
            if ( '1' === $comments_number ) {
                /* translators: %s: post title */
                printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'financer' ), get_the_title() );
            } else {
                printf(
                    /* translators: 1: number of comments, 2: post title */
                    _nx(
                        '%1$s Reply to &ldquo;%2$s&rdquo;',
                        '%1$s Replies to &ldquo;%2$s&rdquo;',
                        $comments_number,
                        'comments title',
                        'financer'
                    ),
                    number_format_i18n( $comments_number ),
                    get_the_title()
                );
            } ?>
        </h2>    
    </div>
    
    <div class="comment-inner">
		<?php
            wp_list_comments( array(
                'style'       => 'div',
                'short_ping'  => true,
                'avatar_size' => 70,
                'callback'    => 'financer_list_comments',
            ) );
        ?>
	</div>
    
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    <nav class="navigation comment-navigation" role="navigation">
        <h1 class="screen-reader-text section-heading">
            <?php esc_html_e( 'Comment navigation', 'financer' ); ?>
        </h1>
        <div class="nav-previous">
            <?php previous_comments_link( esc_html__( '&larr; Older Comments', 'financer' ) ); ?>
        </div>
        <div class="nav-next">
            <?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'financer' ) ); ?>
        </div>
    </nav><!-- .comment-navigation -->
    <?php endif; ?>
    
	<?php if ( ! comments_open() && get_comments_number() ) : ?>
    <p class="no-comments">
        <?php esc_html_e( 'Comments are closed.', 'financer' ); ?>
    </p>
	<?php endif; ?>

</div>
<?php endif; ?>

<?php if(financer_comment_form()): ?>
	<?php financer_comment_form(); ?>
<?php endif; ?>