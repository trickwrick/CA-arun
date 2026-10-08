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
class Testimonials_Carousel extends Widget_Base
{

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'financer_testimonials_carousel';
    }

    /**
     * Get widget title.
     * Retrieve button widget title.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Financer Testimonials Carousel', 'financer');
    }

    /**
     * Get widget icon.
     * Retrieve button widget icon.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-testimonial-carousel';
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
    public function get_categories()
    {
        return [ 'financer' ];
    }
	
	public function get_script_depends() {
		wp_register_script( 'testimonial-slider', YT_URL . 'assets/js/testimonials-carousels.js', [ 'elementor-frontend' ], '1.0.0', true );
		return [ 'testimonial-slider' ];
	}
	
    /**
     * Register button widget controls.
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since  1.0.0
     * @access protected
     */
    protected function register_controls()
    {
        $this->start_controls_section(
            'testimonials_carousel',
            [
                'label' => esc_html__('Financer Testimonials Carousel', 'financer'),
            ]
        );
		
		//Layout
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
		//Feature
		$this->add_control(
			'feature_image',
			[
				'label' => esc_html__( 'Choose Feature Image', 'financer' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'condition'   => [ 
					'layout_control' => '2' 
				]
			]
		);
		//Shape Image Switcher
		$this->add_control(
            'show_shape_image',
            [
                'label'        => esc_html__( 'Enable Vector Image', 'financer' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'On', 'financer' ),
                'label_off'    => esc_html__( 'Off', 'financer' ),
                'return_value' => 'yes',
                'default'      => 'no',
				'condition'   => [ 'layout_control' => '2' ]
            ]
        );
		$this->add_control(
			'shape_image',
			[
				'label' => esc_html__( 'Choose Vector Shape Image', 'financer' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'condition'   => [ 
					'layout_control' => '2',
					'show_shape_image' => 'yes' 
				]
			]
		);
		//Title Switcher
		$this->add_control(
            'show_title_area',
            [
                'label'        => esc_html__( 'Enable Title Section', 'financer' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'On', 'financer' ),
                'label_off'    => esc_html__( 'Off', 'financer' ),
                'return_value' => 'yes',
                'default'      => 'no',
				'condition'   => [ 'layout_control' => '2' ]
            ]
        );
		$this->add_control(
			'subtitle',
			[
				'label' => esc_html__( 'Small Title', 'financer' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Our Services', 'financer' ),
				'condition'   => [ 
					'layout_control' => '2',
					'show_title_area' => 'yes' 
				]
			]
		);
		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'financer' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Solutions we Provide', 'financer' ),
				'condition'   => [ 
					'layout_control' => '2',
					'show_title_area' => 'yes' 
				]
			]
		);
				
        $this->add_control(
            'text_limit',
            [
                'label'   => esc_html__('Text Limit', 'financer'),
                'type'    => Controls_Manager::NUMBER,
                'default' => 3,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
            ]
        );
        $this->add_control(
            'query_number',
            [
                'label'   => esc_html__('Number of post', 'financer'),
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
                'label'   => esc_html__('Order By', 'financer'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'date',
                'options' => array(
                    'date'       => esc_html__('Date', 'financer'),
                    'title'      => esc_html__('Title', 'financer'),
                    'menu_order' => esc_html__('Menu Order', 'financer'),
                    'rand'       => esc_html__('Random', 'financer'),
                ),
            ]
        );
        $this->add_control(
            'query_order',
            [
                'label'   => esc_html__('Order', 'financer'),
				'label_block' => true,
                'type'    => Controls_Manager::SELECT,
                'default' => 'DESC',
                'options' => array(
                    'DESC' => esc_html__('DESC', 'financer'),
                    'ASC'  => esc_html__('ASC', 'financer'),
                ),
            ]
        );
        $this->add_control(
            'query_category',
            [
				'type' => Controls_Manager::SELECT2,
				'label' => esc_html__('Category', 'financer'),
				'label_block' => true,
			  	'multiple' => true,
				'options' => get_testimonials_categories()
			]
        );
        $this->end_controls_section();
		
		
		/**Carousel Setting Start**/
		$this->start_controls_section(
			'carousel',
			[
				'label' => esc_html__( 'Carousel Setting', 'financer' ),
			]
		);
		$this->add_control(
			'loop',
			[
				'label' => __( 'infinite Loop?', 'financer' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'financer' ),
				'label_off' => __( 'Hide', 'financer' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_responsive_control(
			'items_show',
			[
				'label' => esc_html__( 'No. of Items', 'financer' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'default' => 3,
			]
		);
		$this->add_responsive_control(
			'image_item_gap',
			[
				'label' => __( 'Item Gap', 'financer' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'default' => 30,
			]
		);
		$this->end_controls_section();
		
		
		//General Style
		$this->start_controls_section(
			'general_style',
			[
				'label' => esc_html__( 'General Setting', 'financer' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
            'general_margin',
            [
                'label'      => esc_html__( 'Margin', 'financer' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .financer-test-section' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator'  => 'before',
            ]
        );		
        $this->add_responsive_control(
            'general_padding',
            [
                'label'      => esc_html__( 'Padding', 'financer' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .financer-test-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator'  => 'before',
            ]
        );		
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'general_bgtype',
				'label' => __( 'Background', 'financer' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .financer-test-section',				
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'general_border_type',
				'selector' => 
					'{{WRAPPER}} .financer-test-section',				
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'border_box_shadow',
				'selector' => 
					'{{WRAPPER}} .financer-test-section',				
				'separator' => 'before',
			]
		);
		$this->add_control(
			'general_border_radius',
			[
				'label' => esc_html__('Border Radius', 'financer'),
				'type' => Controls_Manager::DIMENSIONS,
				'separator' => 'before',
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .financer-test-section' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);
		$this->end_controls_section();
		
		
		//Rating Style		
		$this->start_controls_section(
			'rating_style',
			[
				'label' => esc_html__( 'Rating Style', 'financer' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition'   => [ 
					'layout_control' => '1' 
				]
			]
		);		
		$this->add_responsive_control(
            'rating__margin',
            [
                'label'      => esc_html__( 'Margin', 'financer' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .te-rating i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
					'{{WRAPPER}} .te-rating span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator'  => 'before',
            ]
        );		
        $this->add_responsive_control(
            'rating_padding',
            [
                'label'      => esc_html__( 'Padding', 'financer' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .te-rating i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
					'{{WRAPPER}} .te-rating span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator'  => 'before',
            ]
        );	
		$this->add_responsive_control(
			'rating_size',
			[
				'label' => __( 'Quote Icon Size', 'financer' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .te-rating' => 'font-size: {{SIZE}}{{UNIT}} !important;',
					'{{WRAPPER}} .te-rating i' => 'font-size: {{SIZE}}{{UNIT}} !important;',
					'{{WRAPPER}} .te-rating span' => 'font-size: {{SIZE}}{{UNIT}} !important;',
				],
			]
		);	
		$this->add_control(
			'rating_color',
			[
				'label' => esc_html__( 'Rating Color', 'financer' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .te-rating' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .te-rating i' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .te-rating span' => 'color: {{VALUE}} !important;',
				],
			]
		);		
		$this->end_controls_section();
		
		//Text Style		
		$this->start_controls_section(
			'text_style',
			[
				'label' => esc_html__( 'Text', 'financer' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);		
		$this->add_responsive_control(
            'text__margin',
            [
                'label'      => esc_html__( 'Margin', 'financer' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .te-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator'  => 'before',
            ]
        );		
        $this->add_responsive_control(
            'text_padding',
            [
                'label'      => esc_html__( 'Padding', 'financer' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .te-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator'  => 'before',
            ]
        );		
		$this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Text Color', 'financer' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .te-text' => 'color: {{VALUE}} !important;',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
				'label' => __('Typography', 'financer'),
				'selector' => '{{WRAPPER}} .te-text',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_text_shadow',
				'selector' => '{{WRAPPER}} .te-text',
			]
		);
		$this->end_controls_section();
		
		//Title Style		
		$this->start_controls_section(
			'title_style',
			[
				'label' => esc_html__( 'Title', 'financer' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition'   => [ 
					'layout_control' => '1' 
				]
			]
		);		
		$this->add_responsive_control(
            'title__margin',
            [
                'label'      => esc_html__( 'Margin', 'financer' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .te-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator'  => 'before',
            ]
        );		
        $this->add_responsive_control(
            'title_padding',
            [
                'label'      => esc_html__( 'Padding', 'financer' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .te-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator'  => 'before',
            ]
        );		
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Text Color', 'financer' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .te-title' => 'color: {{VALUE}} !important;',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __('Typography', 'financer'),
				'selector' => '{{WRAPPER}} .te-title',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'title_text_stroke',
				'selector' => '{{WRAPPER}} .te-title',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .te-title',
			]
		);
		$this->end_controls_section();
		
		//Designation Style		
		$this->start_controls_section(
			'designation_style',
			[
				'label' => esc_html__( 'Designation', 'financer' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition'   => [ 
					'layout_control' => '1' 
				]
			]
		);		
		$this->add_responsive_control(
            'designation__margin',
            [
                'label'      => esc_html__( 'Margin', 'financer' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .te-designation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator'  => 'before',
            ]
        );		
        $this->add_responsive_control(
            'designation_padding',
            [
                'label'      => esc_html__( 'Padding', 'financer' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .te-designation' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator'  => 'before',
            ]
        );		
		$this->add_control(
			'designation_color',
			[
				'label' => esc_html__( 'Text Color', 'financer' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .te-designation' => 'color: {{VALUE}} !important;',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'designation_typography',
				'label' => __('Typography', 'financer'),
				'selector' => '{{WRAPPER}} .te-designation',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'designation_text_shadow',
				'selector' => '{{WRAPPER}} .te-designation',
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
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $allowed_tags = wp_kses_allowed_html('post');
		$layout = $settings['layout_control'];
		
		$items_show = $settings[ 'items_show' ];
		$image_item_gap = $settings[ 'image_item_gap' ];
		
		if($settings['loop'] == 'yes'){
			$loop = "true";
		}else{
			$loop = "false";
		}	
		
		$changed_atts = array(
			'loop'       		=> $loop,
			'spacebetween'		=> $image_item_gap,
			'slidesperview' 	=> $items_show,
		);
		
		if( $layout === '3' ){
			$slider_atts = 'data-slider-testi-three';
		}elseif( $layout === '2' ){
			$slider_atts = 'data-slider-testi-two';
		}else{
			$slider_atts = 'data-slider-testi';
		}
		
				
		$this->add_render_attribute( 'slider_settings', $slider_atts , wp_json_encode( $changed_atts ) );

        $paged = get_query_var('paged');
		$paged = financer_set($_REQUEST, 'paged') ? esc_attr($_REQUEST['paged']) : $paged;

        $this->add_render_attribute('wrapper', 'class', 'templatepath-financer');
        $args = array(
            'post_type'      => 'testimonials',
            'posts_per_page' => financer_set($settings, 'query_number'),
            'orderby'        => financer_set($settings, 'query_orderby'),
            'order'          => financer_set($settings, 'query_order'),
            'paged'         => $paged
        );
		
        if (financer_set($settings, 'query_category')) {$args['testimonials_cat'] = financer_set($settings, 'query_category');
        }$query = new \WP_Query($args);

        if ($query->have_posts()) {
        ?>
		
        
        <?php if($layout == '2') :?>
        <!-- Testimonials Section Two -->
        <section class="testimonial_section_two financer-test-section aos-init aos-animate" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500">
            <?php if($settings['show_shape_image'] == 'yes'){ ?>
            <div class="shape_icon_12 float-bob-y"><img src="<?php echo esc_url(wp_get_attachment_url($settings['shape_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'financer'); ?>"></div>
            <?php } ?>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-12 content_column">
                        <div class="testimonial_content aos-init aos-animate" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="550">
                            
							<?php if($settings['show_title_area'] == 'yes'){ ?>
                            <div class="section_title">
                                <?php if($settings[ 'subtitle' ]){ ?><div class="tag_text"><h6><?php echo wp_kses( $settings[ 'subtitle' ], true );?></h6></div><?php } ?>
                                <?php if($settings[ 'title' ]){ ?><h2><?php echo wp_kses( $settings[ 'title' ], true );?></h2><?php } ?>
                            </div>
                            <?php } ?>
                            
                            <div class="single-item-carousel owl-carousel owl-theme owl-dots-none nav-style-one" <?php $this->print_render_attribute_string( 'slider_settings' ); ?>>
                                <?php while ($query->have_posts()) : $query->the_post(); ?>
                                <div class="testimonial_block_three">
                                    <div class="inner_box">
                                        <div class="quort_icon"><i class="icon-19"></i></div>
                                        <p class="te-text"><?php echo wp_kses(wp_trim_words(get_the_content(), $settings['text_limit']), true); ?></p>
                                    </div>
                                </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                    <?php if($settings['feature_image']){ ?>
                    <div class="col-xl-6 col-md-12 image_column">
                        <figure class="testimonial_image float-bob-y">
                            <img src="<?php echo esc_url(wp_get_attachment_url($settings['feature_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'financer'); ?>">
                        </figure>
                    </div>
                    <?php } ?>
                </div>
            </div>    
        </section>
        <!-- Testimonials Section Two End -->
        
        <?php else: ?>
        
        <!-- Testimonial Section -->
        <section class="testimonial_section p-0 m-0 aos-init aos-animate " data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500">
            <div class="shape_bg"></div>
            <div class="three-item-carousel owl-carousel owl-theme owl-dots-one owl-nav-none" <?php $this->print_render_attribute_string( 'slider_settings' ); ?>>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="testimonial_block_one financer-test-section">
                    <div class="inner_box">
                        <ul class="rating te-rating">
                            <?php
                            $ratting = get_post_meta( get_the_id(), 'testimonial_rating', true ); 
                            for ($x = 1; $x <= 5; $x++) {
                                if($x <= $ratting) echo '<li><i class="fa fa-star"></i></li>'; else echo '<li><i class="fa fa-star-half-alt"></i></li>'; 
                                }
                            ?>
                        </ul>
                        <p class="te-text"><?php echo wp_kses(wp_trim_words(get_the_content(), $settings['text_limit']), true); ?></p>
                        <div class="author_box">
                            <figure class="thumb_box"><?php the_post_thumbnail('financer_60x60'); ?></figure>
                            <div class="author_info">
                                <h5 class="te-title"><?php the_title(); ?></h5>
                                <span class="designation te-designation"><?php echo(get_post_meta(get_the_id(), 'author_designation', true)); ?></span>
                            </div>                        
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>            
        </section>
        <!-- Testimonial Section end -->
        
        <?php endif; ?>
        
        <?php }
        wp_reset_postdata();
    }
}
