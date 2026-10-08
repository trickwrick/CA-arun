<?php

/**
 * Blog Content Template
 *
 * @package    WordPress
 * @subpackage FINANCER
 * @author     Template Path
 * @version    1.0
 */

$options = financer_WSH()->option();
$allowed_tags = wp_kses_allowed_html('post');

?>

<div <?php post_class(); ?>>
	
    <div class="news_block_one mb_70">
        <div class="inner_box">
            <?php if( has_post_thumbnail() ){?>
            <figure class="image_box"><a href="<?php echo esc_url( get_the_permalink( get_the_id() ) );?>"><?php the_post_thumbnail('full'); ?></a></figure>
            <?php } ?>
            
            <div class="lower_content">                            
                <?php if( has_category() || ! $options->get('blog_post_date') || ! $options->get('blog_post_author')){ ?>
                <ul class="post-info mb_10">
                    <?php if(has_category()){ ?><li><div class="category"><span><?php the_category(', '); ?></span></div></li><?php } ?>
                    <?php if(! $options->get('blog_post_date')){ ?><li><i class="icon-21"></i><?php echo get_the_date(); ?></li><?php } ?>
                    <?php if(! $options->get('blog_post_author')){ ?><li><i class="icon-20"></i><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>"><?php the_author(); ?></a></li><?php } ?>
                </ul>
                <?php } ?>
                
                <h3><a href="<?php echo esc_url( get_the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h3>                
                <div class="text">
					<?php the_excerpt(); ?>
                </div>                
                <div class="link_btn"><a href="<?php echo esc_url( get_the_permalink( get_the_id() ) );?>"><?php esc_html_e('Discover More', 'financer'); ?> <i class="fa fa-solid fa-angle-right"></i></a></div>
            </div>
        </div>
    </div>
           
</div>