<?php
/**
 * Blog Post Main File.
 *
 * @package FINANCER
 * @author  Template Path
 * @version 1.0
 */

get_header();
$options = financer_WSH()->option();
$data    = \FINANCER\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
$layout = ( $layout ) ? $layout : 'full';
$sidebar = ( $sidebar ) ? $sidebar : '';
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xl-8 col-lg-8 col-md-12 offset-xl-2 offset-lg-2' : 'col-xl-8 col-lg-8 col-md-12';

if ( class_exists( '\Elementor\Plugin' ) && $data->get( 'tpl-type' ) == 'e') {
	
	while(have_posts()) {
	   the_post();
	   the_content();
    }

} else {
?>

<?php if ( $data->get( 'enable_banner' ) ) : ?>
	<?php do_action( 'financer_banner', $data );?>
<?php else:?>
<!-- Page Breadcrumb -->
<section class="page_breadcrumb">
    <?php if($data->get( 'banner_shape_image_v1' )) { ?>
    <div class="page_breadcrumb_shape_one float-bob-x">
        <img src="<?php echo esc_url( $data->get( 'banner_shape_image_v1' ) ); ?>" alt="<?php esc_attr_e('Awesome Image', 'financer'); ?>">
    </div>
    <?php } ?>
    <?php if($data->get( 'banner_shape_image_v2' )) { ?>
    <div class="page_breadcrumb_shape_two float-bob-y">
        <img src="<?php echo esc_url( $data->get( 'banner_shape_image_v2' ) ); ?>" alt="<?php esc_attr_e('Awesome Image', 'financer'); ?>">
    </div>
    <?php } ?>  
    <div class="container">
        <div class="breadcrumb_content centred">
            <?php if($data->get( 'subheading' )){ ?><div class="breadcrumb_sutitle"><h6><?php echo wp_kses( $data->get( 'subheading' ), true ); ?></h6></div><?php } ?>
            <h1 class="breadcrumb_title"><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( the_title( ) ); ?></h1>
            <?php if(financer_the_breadcrumb()){ ?>
            <ul class="breadcrumb_menu">
                <?php echo financer_the_breadcrumb(); ?>
            </ul>
            <?php } ?>
        </div>
    </div>
</section>
<!-- Page Breadcrumb End -->
<?php endif;?>

<!-- Blog Section -->
<section class="blog_section">
    <div class="container">
        <div class="row">
        	<?php
				if ( $data->get( 'layout' ) == 'left' ) {
					do_action( 'financer_sidebar', $data );
				}
			?>
            <div class="content-side <?php echo esc_attr( $class ); ?>">
            	<?php while ( have_posts() ) : the_post(); ?>				
                <div class="news_block_details">  	
                    <div class="thm-unit-test"> 
                    	<div class="inner_box">
							<?php if( has_post_thumbnail() ){?>
                            <figure class="image_box">
								<?php the_post_thumbnail('full'); ?>
							</figure>
                            <?php } ?>
                            
							<?php if( has_category() || ! $options->get('single_post_comments') || ! $options->get('single_post_author')){ ?>
                            <div class="lower_content">                            
                                <ul class="post-info mb_25 <?php if(! has_post_thumbnail() ) echo 'mt-0';?>">
                                    <?php if(has_category()){ ?><li><div class="category"><span><?php the_category(', '); ?></span></div></li><?php } ?>
                                    <?php if(! $options->get('single_post_date')){ ?><li><i class="icon-21"></i><?php echo get_the_date(); ?></li><?php } ?>
                                    <?php if(! $options->get('single_post_author')){ ?><li><i class="icon-20"></i><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>"><?php the_author(); ?></a></li><?php } ?>
                                </ul>
                            </div>
                            <?php } ?>
                            
                            <div class="text"><?php the_content(); ?></div>
                            <div class="clearfix"></div>
                            <?php wp_link_pages(array('before'=>'<div class="paginate-links mt_30">'.esc_html__('Pages: ', 'financer'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>
                            
                            <?php if(has_tag() || function_exists('bunch_share_us_two')){ ?>
                            <div class="post_share_option mt_40">
                                
								<?php if(has_tag()){ ?>
                                <ul class="post-category">
                                    <li><span><?php esc_html_e('Tags:','financer'); ?></span></li>
                                    <?php the_tags( '<li>', '</li><li>', '</li>' ); ?>
                                </ul>
                                <?php } ?>
                                
								<?php if(function_exists('bunch_share_us_two')){ ?>
                                	<?php echo bunch_share_us_two(get_the_id(),$post->post_name );?>
                                <?php } ?>
                            </div>
                            <?php } ?>
                            
                            <?php if( $options->get( 'single_post_author_box' ) ):?>
                            <div class="author_box" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500">
                                <?php if($avatar = get_avatar(get_the_author_meta('ID')) !== FALSE): ?>
                                <figure class="author_thumb">
                                	<?php echo get_avatar(get_the_author_meta('ID'), 100); ?>
                                </figure>
                                <?php endif; ?>
                                <div class="author_info">
                                    <h5><?php the_author(); ?></h5>
                                    <div class="text"><?php the_author_meta( 'description', get_the_author_meta('ID') ); ?></div>
                                </div>
                            </div>
                            <?php endif; ?>
                            
                               
                            <!--End post-details-->
                            <?php comments_template(); ?>
                        
                		</div>
                    </div>
                </div>
                <!--End blog-content-->
				<?php endwhile; ?>
                
            </div>
        	<?php
				if ( $data->get( 'layout' ) == 'right' ) {
					do_action( 'financer_sidebar', $data );
				}
			?>
        </div>  
    </div>
</section>
<!--End blog area--> 

<?php
}
get_footer();
