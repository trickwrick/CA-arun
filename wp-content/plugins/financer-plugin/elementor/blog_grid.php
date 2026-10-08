<?php

namespace FINANCERPLUGIN\Element;

use Elementor\Controls_Manager;
use Elementor\Controls_Stack;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Utils;
use Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Text_Stroke;
use Elementor\Plugin;

/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class Blog_Grid extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'financer_blog_grid';
	}

	/**
	 * Get widget title.
	 * Retrieve button widget title.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Financer Blog Grid', 'financer' );
	}

	/**
	 * Get widget icon.
	 * Retrieve button widget icon.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-posts-grid';
	}

	/**
	 * Get widget categories.
	 * Retrieve the list of categories the button widget belongs to.
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since  2.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'financer' ];
	}	
	
	/**
	 * Register button widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'blog_grid',
			[
				'label' => esc_html__( 'Financer Blog Grid', 'financer' ),
			]
		);
		$this->add_control(
			'layout_control',
			[
				'label'   => esc_html__( 'Layout Style', 'financer' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => '1',
				'options' => array(
					'1' => esc_html__( 'Style One ', 'financer'),
					'2' => esc_html__( 'Style Two ', 'financer'),
				),
			]
		);
		//Date
		$this->add_control(
            'date',
            [
                'label'        => esc_html__( 'Show Date', 'financer' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'On', 'financer' ),
                'label_off'    => esc_html__( 'Off', 'financer' ),
                'return_value' => 'yes',
                'default'      => 'yes',
			]
        );
		//Author
		$this->add_control(
            'author',
            [
                'label'        => esc_html__( 'Show Author', 'financer' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'On', 'financer' ),
                'label_off'    => esc_html__( 'Off', 'financer' ),
                'return_value' => 'yes',
                'default'      => 'yes',
			]
        );
		$this->add_control(
			'query_number',
			[
				'label'   => esc_html__( 'Number of post', 'financer' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'query_orderby',
			[
				'label'   => esc_html__( 'Order By', 'financer' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => array(
					'date'       => esc_html__( 'Date', 'financer' ),
					'title'      => esc_html__( 'Title', 'financer' ),
					'menu_order' => esc_html__( 'Menu Order', 'financer' ),
					'rand'       => esc_html__( 'Random', 'financer' ),
				),
			]
		);
		$this->add_control(
			'query_order',
			[
				'label'   => esc_html__( 'Order', 'financer' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => array(
					'DESC' => esc_html__( 'DESC', 'financer' ),
					'ASC'  => esc_html__( 'ASC', 'financer' ),
				),
			]
		);
		$this->add_control(
            'query_category', 
			[
			  'type' => Controls_Manager::SELECT,
			  'label' => esc_html__('Category', 'financer'),
			  'label_block' => true,
			  'multiple' => true,
			  'options' => get_blog_categories()
			]
		);
		$this->add_control(
            'show_pagination_style',
            [
                'label'        => esc_html__( 'Enable Pagination', 'financer' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'On', 'financer' ),
                'label_off'    => esc_html__( 'Off', 'financer' ),
                'return_value' => 'yes',
                'default'      => 'no',
				'condition'   => [ 
					'layout_control' => '2',
				]
            ]
        );
		$this->end_controls_section();
		
		/**Grid Setting Start**/
		$this->start_controls_section(
			'grid',
			[
				'label' => esc_html__( 'Grid Setting', 'financer' ),					
			]
		);
		$this->add_control(
			'col_grid',
			[
				'label'   => esc_html__( 'Choose Column', 'financer' ),
				'label_block' => true,				
				'type'    => Controls_Manager::SELECT,
				'default' => 'three',
				'options' => array(
					'one' => esc_html__( 'One Column Grid ', 'financer'),
					'two'  => esc_html__( 'Two Column Grid', 'financer' ),
					'three'  => esc_html__( 'Three Column Grid', 'financer' ),
					'four'  => esc_html__( 'Four Column Grid', 'financer' ),
					'five'  => esc_html__( 'Six Column Grid', 'financer' ),
				),
			]
		);
		$this->end_controls_section();
		
	}

	/**
	 * Render button widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
        $allowed_tags = wp_kses_allowed_html('post');
		$layout = $settings[ 'layout_control' ];
		
		$grid_col = $settings['col_grid'];
		if( $grid_col == 'one' ){
			$classes = 'col-lg-12 col-md-12 col-sm-12';
		}elseif( $grid_col == 'two' ){
			$classes = 'col-lg-6 col-md-6 col-sm-12';
		}elseif( $grid_col == 'four' ){
			$classes = 'col-lg-3 col-md-6 col-sm-12';
		}elseif( $grid_col == 'five' ){
			$classes = 'col-lg-2 col-md-6 col-sm-12';
		}else{
			$classes = 'col-xl-4 col-md-6 col-sm-12';
		};
		
		$date = $settings[ 'date' ];
		$author = $settings[ 'author' ]; 
		
        $paged = get_query_var('paged');
		$paged = financer_set($_REQUEST, 'paged') ? esc_attr($_REQUEST['paged']) : $paged;

		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-financer' );
		$argst = array(
			'post_type'      =>  'post',
			'posts_per_page' => financer_set( $settings, 'query_number' ),
			'orderby'        => financer_set( $settings, 'query_orderby' ),
			'order'          => financer_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if( financer_set( $settings, 'query_category' ) ) $args['category_name'] = financer_set( $settings, 'query_category' );
		$query = new \WP_Query( $argst );
		if ( $query->have_posts() ) 
		
		{ ?>
		
        <?php if( $layout == 2 ):?>
        
        <!-- Blog Section -->
        <section class="blog_section p-0 m-0">            
            <div class="row">
                <?php 
					while ( $query->have_posts() ) : $query->the_post();
				?>
                <div class="<?php echo esc_attr( $classes );?>">
                    <div class="news_block_one mb_40" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500">
                        <div class="inner_box">
                            <?php if(has_post_thumbnail()){ ?>
                            <figure class="image_box"><a href="<?php echo esc_url( get_the_permalink( get_the_id() ) );?>"><?php the_post_thumbnail('financer_410x250'); ?></a></figure>
                            <?php } ?>
                            <div class="lower_content">
                                <?php if(has_category()){ ?><div class="category"><span><?php the_category(' '); ?></span></div><?php } ?>
                                <h3><a href="<?php echo esc_url( get_the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h3>
                                <?php if( $date == 'yes' ||  $author == 'yes' ){?>
                                <ul class="post-info">
                                    <?php if( $date == 'yes' ){?><li><i class="icon-21"></i><?php echo get_the_date(''); ?></li><?php } ?>
                                    <?php if( $author == 'yes' ){?><li><i class="icon-20"></i><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>"><?php the_author(); ?></a></li><?php } ?>
                                </ul>
                                <?php } ?>                                
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            
            <?php if($settings['show_pagination_style'] == 'yes') { ?>
            <div class="pagination-wrapper text-center  aos-init aos-animate" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1100">
                <?php financer_the_pagination2(array('total'=>$query->max_num_pages, 'next_text' => '<i class="fa fa-arrow-right"></i> ', 'prev_text' => '<i class="fa fa-arrow-left"></i>')); ?>
            </div>
            <?php } ?>                
            
        </section>
        <!-- Blog Section end -->
                    
        <?php else: ?>
        
        <!-- Blog Section -->
        <section class="blog_section p-0 m-0">            
            <div class="row">
                <?php 
					while ( $query->have_posts() ) : $query->the_post();
				?>
                <div class="<?php echo esc_attr( $classes );?>">
                    <div class="news_block_one" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500">
                        <div class="inner_box">
                            <?php if(has_post_thumbnail()){ ?>
                            <figure class="image_box"><a href="<?php echo esc_url( get_the_permalink( get_the_id() ) );?>"><?php the_post_thumbnail('financer_410x250'); ?></a></figure>
                            <?php } ?>
                            <div class="lower_content">
                                <?php if(has_category()){ ?><div class="category"><span><?php the_category(' '); ?></span></div><?php } ?>
                                <h3><a href="<?php echo esc_url( get_the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h3>
                                <?php if( $date == 'yes' ||  $author == 'yes' ){?>
                                <ul class="post-info">
                                    <?php if( $date == 'yes' ){?><li><i class="icon-21"></i><?php echo get_the_date(''); ?></li><?php } ?>
                                    <?php if( $author == 'yes' ){?><li><i class="icon-20"></i><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>"><?php the_author(); ?></a></li><?php } ?>
                                </ul>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </section>
        <!-- Blog Section end -->
                
        <?php endif; ?>                        
        <?php }
		wp_reset_postdata();
	}
}