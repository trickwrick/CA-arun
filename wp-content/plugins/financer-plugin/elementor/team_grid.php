<?php namespace FINANCERPLUGIN\Element;

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
use \Elementor\Group_Control_Text_Stroke;
use Elementor\Plugin;
/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class Team_Grid extends Widget_Base {
    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'financer_team_grid';
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
        return esc_html__( 'Financer Team Grid', 'financer' );
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
        return 'eicon-post-list';
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
            'team_grid',
            [
                'label' => esc_html__( 'Financer Team Grid', 'financer' ),
            ]
        );
		$this->add_control(
			'col_grid',
			[
				'label'   => esc_html__( 'Choose Column', 'financer' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => array(
					'default'  => esc_html__( 'Default', 'financer' ),
					'one' => esc_html__( 'One Column Grid ', 'financer'),
					'two'  => esc_html__( 'Two Column Grid', 'financer' ),
					'three'  => esc_html__( 'Three Column Grid', 'financer' ),
					'four'  => esc_html__( 'Four Column Grid', 'financer' ),
					'five'  => esc_html__( 'Six Column Grid', 'financer' ),
				),
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
				'condition'   => [
					'layout_control' => '2'
				]
            ]
        );
		$this->add_control(
            'query_number',
            [
                'label'   => esc_html__( 'Number of post', 'financer' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 5,
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
                'default' => 'ASC',
                'options' => array(
                    'DESC' => esc_html__( 'DESC', 'financer' ),
                    'ASC'  => esc_html__( 'ASC', 'financer' ),
                ),
            ]
        );
        $this->add_control(
            'query_category',
            [
                'type' => Controls_Manager::SELECT2,
				'label' => esc_html__('Category', 'financer'),
				'multiple' => true,
				'label_block' => true,
				'options' => get_team_categories()
            ]
        );
		//Button Title
		$this->add_control(
			'btn_title',
			[
				'label' => esc_html__( 'Button Title', 'financer' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter button title', 'financer' ),
				'default' => esc_html__( 'Hire Me', 'financer' ),
				'condition' => ['layout_control'      => '4' ],
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
                    '{{WRAPPER}} .team-section' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .team-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .team-section',				
			]
		);
		$this->end_controls_section();
		
		
		//Title Style		
		$this->start_controls_section(
			'title_style',
			[
				'label' => esc_html__( 'Title', 'financer' ),
				'tab' => Controls_Manager::TAB_STYLE,
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
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __('Title Typography', 'financer'),
				'selector' => '{{WRAPPER}} .te-title',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Text Color', 'financer' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .te-title' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .te-title a' => 'color: {{VALUE}} !important;',
				],
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
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'designation_typography',
				'label' => __('Title Typography', 'financer'),
				'selector' => '{{WRAPPER}} .te-designation',
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
			Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'designation_text_stroke',
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
		
		//Text Style		
		$this->start_controls_section(
			'text_style',
			[
				'label' => esc_html__( 'Designation', 'financer' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition'   => [
					'layout_control' => '2'
				]
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
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
				'label' => __('Title Typography', 'financer'),
				'selector' => '{{WRAPPER}} .te-text',
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
			Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'text_text_stroke',
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
		
		
		/**Social Icon Style**/
		$this->start_controls_section(
			'social_icon_style',
			[
				'label' => esc_html__('Social Icon Style Setting', 'financer'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs( 'financer_tabs_social' );
		
			$this->start_controls_tab(
				'financer_tab_social_normal',
				[
					'label' => __( 'Normal', 'financer' ),
				]
			);
				$this->add_responsive_control(
					'social_icon_width_size',
					[
						'label' => __( 'Width', 'financer' ),
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
							'{{WRAPPER}} .te-social li a' => 'width: {{SIZE}}{{UNIT}};',
						],
					]
				);
				$this->add_responsive_control(
					'social_icon_height_size',
					[
						'label' => __( 'Height', 'financer' ),
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
							'{{WRAPPER}} .te-social li a' => 'height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				$this->add_responsive_control(
					'social_icon_margin',
					[
						'label'              => __( 'Margin', 'financer' ),
						'type'               => Controls_Manager::DIMENSIONS,
						'size_units'         => [ 'px', 'em', '%' ],
						'selectors'          => [
							'{{WRAPPER}} .te-social li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
						],
						
						'frontend_available' => true,
					]
				);
				$this->add_responsive_control(
					'social_icon_padding',
					[
						'label'              => __( 'Padding', 'financer' ),
						'type'               => Controls_Manager::DIMENSIONS,
						'size_units'         => [ 'px', 'em', '%' ],
						'selectors'          => [
							'{{WRAPPER}} .te-social li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
						],
						
						'frontend_available' => true,
					]
				);
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'social_icon_border_type',
						'selector' => 
							'{{WRAPPER}} .te-social li a',				
						'separator' => 'before',
					]
				);
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'social_icon_border_box_shadow',
						'selector' => 
							'{{WRAPPER}} .te-social li a',				
						'separator' => 'before',
					]
				);
				$this->add_control(
					'social_icon_border_radius',
					[
						'label' => esc_html__('Border Radius', 'financer'),
						'type' => Controls_Manager::DIMENSIONS,
						'separator' => 'before',
						'size_units' => ['px'],
						'selectors' => [
							'{{WRAPPER}} .te-social li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
						],
					]
				);
				$this->add_responsive_control(
					'social_icon_size',
					[
						'label' => __( 'Icon Size', 'financer' ),
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
							'{{WRAPPER}} .te-social li a' => 'font-size: {{SIZE}}{{UNIT}} !important;',
						],
					]
				);
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'social_icon_bg_color',
						'label' => __( 'Icon Background Color', 'financer' ),
						'types' => [ 'classic', 'gradient' ],
						'selector' => 
							'{{WRAPPER}} .te-social li a',				
					]
				);
				$this->add_control(
					'social_icon_color',
					[
						'label' => __('Icon Color', 'financer'),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .te-social li a' => 'color: {{VALUE}}!important',
						],
						'separator' => 'before',
					]
				);
			$this->end_controls_tab();
			
			$this->start_controls_tab(
				'financer_tab_social_icon_hover',
				[
					'label' => __( 'Hover', 'financer' ),
				]
			);
				$this->add_control(
					'social_icon_border_hover_color',
					[
						'label' => __('Border Hover Color', 'financer'),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .te-social li a:hover' => 'color: {{VALUE}} !important',
						],
						'separator' => 'before',
					]
				);
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'social_icon_hover_bg_bgtype',
						'label' => __( 'Icon Hover BG Color', 'financer' ),
						'types' => [ 'classic', 'gradient' ],
						'selector' => 
							'{{WRAPPER}} .te-social li a:hover',				
					]
				);
				$this->add_control(
					'social_icon_hover_color',
					[
						'label' => __('Icon Hover Color', 'financer'),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .te-social li a:hover' => 'color: {{VALUE}} !important',
						],
						'separator' => 'before',
					]
				);
			$this->end_controls_tab();			
		$this->end_controls_tabs();   
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
		
		$grid_col = $settings[ 'col_grid' ];
		if( $grid_col == 'one' ){
			$classes = 'col-lg-12 col-md-12 col-sm-12';
		}elseif( $grid_col == 'two' ){
			$classes = 'col-lg-6 col-md-6 col-sm-12';
		}elseif( $grid_col == 'three' ){
			$classes = 'col-lg-4 col-md-6 col-sm-12';
		}elseif( $grid_col == 'four' ){
			$classes = 'col-lg-3 col-md-6 col-sm-12';
		}elseif( $grid_col == 'five' ){
			$classes = 'col-lg-2 col-md-4 col-sm-12';
		}else{
			$classes = 'col-lg-3 col-md-6 col-sm-12';
		}
		
		$paged = get_query_var('paged');
		$paged = financer_set($_REQUEST, 'paged') ? esc_attr($_REQUEST['paged']) : $paged;
		
        $this->add_render_attribute( 'wrapper', 'class', 'templatepath-greenture' );
        
		$args = array(
			'post_type'      => 'team',
			'posts_per_page' => financer_set( $settings, 'query_number' ),
			'orderby'        => financer_set( $settings, 'query_orderby' ),
			'order'          => financer_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if( financer_set( $settings, 'query_category' ) ) $args['team_cat'] = financer_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
	{ ?>
        
    <!-- Team Section -->
    <section class="team_section p-0 m-0">
        <div class="row">
        	<?php 
				while ( $query->have_posts() ) : $query->the_post();
			?>
            <div class="<?php echo esc_attr( $classes );?> team_block">
                <div class="team_block_one aos-init aos-animate" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="300">
                    <div class="inner_box">
                        <div class="image_box">
                            <?php if(has_post_thumbnail()){ ?><figure class="image"><?php the_post_thumbnail('financer_300x340'); ?></figure><?php } ?>
                            <?php
								$icons = get_post_meta(get_the_id(), 'social_media_tabs', true); if ($icons) : 
							?>
                            <ul class="team_social_links te-icon">
                                <?php
									for ( $i=0; $i < count( $icons['select_social_media'] ); $i++ ) {
									$social_icon = ( isset( $icons['select_social_media'][$i] ) && !empty( $icons['select_social_media'][$i] ) ) ? $icons['select_social_media'][$i] : '';
									$social_link = ( isset( $icons['link_social_media'][$i] ) && !empty( $icons['link_social_media'][$i] ) ) ? $icons['link_social_media'][$i] : '';
								?>
                                <li><a href="<?php echo esc_url($social_link); ?>"><i class="fab <?php echo esc_attr(str_replace("fa ", " ", $social_icon)); ?>"></i></a></li>
                            	<?php } ?>
                            </ul>
                            <?php endif; ?>
                        </div>                        
                        <div class="lower_content">
                            <h4 class="te-title"><a href="<?php echo esc_url( get_the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h4>
                            <span class="designation te-designation"><?php echo (get_post_meta( get_the_id(), 'designation', true ));?></span>
                        </div>                        
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </section>
    <!-- Team Section End -->
    
   	<?php }
	wp_reset_postdata();
	}
}