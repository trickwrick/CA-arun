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
class Project_Grid extends Widget_Base {
    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'financer_project_grid';
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
        return esc_html__( 'Financer Project Grid', 'financer' );
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
            'project_grid',
            [
                'label' => esc_html__( 'Financer Project Grid', 'financer' ),
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
			  'label_block' => true,
			  'multiple' => true,
			  'options' => get_pro_categories(),
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
                    '{{WRAPPER}} .project-section' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .project-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .project-section',				
			]
		);
		$this->end_controls_section();
		
		/**Category Style**/
		$this->start_controls_section(
			'category_style',
			[
				'label' => esc_html__('Category Style Setting', 'financer'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs( 'financer_tabs_category' );		
			$this->start_controls_tab(
				'financer_tab_category_normal',
				[
					'label' => __( 'Normal', 'financer' ),
				]
			);
				$this->add_responsive_control(
					'category_width_size',
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
							'{{WRAPPER}} .te-category li a' => 'width: {{SIZE}}{{UNIT}};',
						],
					]
				);
				$this->add_responsive_control(
					'category_height_size',
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
							'{{WRAPPER}} .te-category li a' => 'height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				$this->add_responsive_control(
					'category_margin',
					[
						'label'              => __( 'Margin', 'financer' ),
						'type'               => Controls_Manager::DIMENSIONS,
						'size_units'         => [ 'px', 'em', '%' ],
						'selectors'          => [
							'{{WRAPPER}} .te-category li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
						],
						
						'frontend_available' => true,
					]
				);
				$this->add_responsive_control(
					'category_padding',
					[
						'label'              => __( 'Padding', 'financer' ),
						'type'               => Controls_Manager::DIMENSIONS,
						'size_units'         => [ 'px', 'em', '%' ],
						'selectors'          => [
							'{{WRAPPER}} .te-category li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
						],
						
						'frontend_available' => true,
					]
				);
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'category_border_type',
						'selector' => 
							'{{WRAPPER}} .te-category li a',				
						'separator' => 'before',
					]
				);
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'category_border_box_shadow',
						'selector' => 
							'{{WRAPPER}} .te-category li a',				
						'separator' => 'before',
					]
				);
				$this->add_control(
					'category_border_radius',
					[
						'label' => esc_html__('Border Radius', 'financer'),
						'type' => Controls_Manager::DIMENSIONS,
						'separator' => 'before',
						'size_units' => ['px'],
						'selectors' => [
							'{{WRAPPER}} .te-category li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
						],
					]
				);
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'category_bg_color',
						'label' => __( 'Category BG Color', 'financer' ),
						'types' => [ 'classic', 'gradient' ],
						'selector' => 
							'{{WRAPPER}} .te-category li a',				
					]
				);
				$this->add_group_control(
					Group_Control_Typography::get_type(),
					[
						'name' => 'category_text_typography',
						'label' => __('Category Text Typography', 'financer'),
						'selector' => '{{WRAPPER}} .te-category li a',
					]
				);
				$this->add_control(
					'category_color',
					[
						'label' => __('Text Color', 'financer'),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .te-category li a' => 'color: {{VALUE}}!important',
						],
						'separator' => 'before',
					]
				);
			$this->end_controls_tab();
			
			$this->start_controls_tab(
				'financer_tab_category_hover',
				[
					'label' => __( 'Hover', 'financer' ),
				]
			);
				$this->add_control(
					'category_border_hover_color',
					[
						'label' => __('Border Hover Color', 'financer'),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .te-category li a:hover' => 'color: {{VALUE}} !important',
						],
						'separator' => 'before',
					]
				);
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'category_hover_bg_bgtype',
						'label' => __( 'Hover BG Color', 'financer' ),
						'types' => [ 'classic', 'gradient' ],
						'selector' => 
							'{{WRAPPER}} .te-category li a:hover',				
					]
				);
				$this->add_control(
					'category_hover_color',
					[
						'label' => __('Hover Color', 'financer'),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .te-category li a:hover' => 'color: {{VALUE}} !important',
						],
						'separator' => 'before',
					]
				);
			$this->end_controls_tab();			
		$this->end_controls_tabs();   
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
			$classes = 'col-xl-12 col-md-12 col-sm-12';
		}elseif( $grid_col == 'two' ){
			$classes = 'col-xl-6 col-md-6 col-sm-12';
		}elseif( $grid_col == 'three' ){
			$classes = 'col-xl-4 col-md-6 col-sm-12';
		}elseif( $grid_col == 'four' ){
			$classes = 'col-xl-3 col-md-6 col-sm-12';
		}elseif( $grid_col == 'five' ){
			$classes = 'col-xl-2 col-md-4 col-sm-12';
		}else{
			$classes = 'col-xl-6 col-md-6 col-sm-12';
		}
		
		$paged = get_query_var('paged');
		$paged = financer_set($_REQUEST, 'paged') ? esc_attr($_REQUEST['paged']) : $paged;
		
        $args = array(
			'post_type'      => 'project',
			'posts_per_page' => financer_set( $settings, 'query_number' ),
			'orderby'        => financer_set( $settings, 'query_orderby' ),
			'order'          => financer_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if( financer_set( $settings, 'query_category' ) ) $args['project_cat'] = financer_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
	{ ?>
    
    <!-- Project Section -->
    <section class="project_section project-section">
        <div class="row project_row">
			<?php 
                while ( $query->have_posts() ) : $query->the_post();
                $term_list = wp_get_post_terms(get_the_id(), 'project_cat', array("fields" => "names"));
            ?>
            <div class="<?php echo esc_attr( $classes );?> project_clomun">
                <div class="project_single_block mb_50 aos-init aos-animate" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500">
                    <?php if(has_post_thumbnail()){ ?>
                    <div class="project_single_image">
                        <a href="<?php echo esc_url( get_the_permalink( get_the_id() ) );?>"><?php the_post_thumbnail('financer_610x500'); ?></a>
                    </div>
                    <?php } ?>
                    <div class="project_content">
                        <ul class="project_single_tag te-category">
                            <li><?php echo implode( ', ', (array)$term_list );?></li>
                        </ul>
                        <h5 class="project_single_title te-title"><a href="<?php echo esc_url( get_the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h5>
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
    <!-- Project Section End -->
            
   	<?php }
	wp_reset_postdata();
	}
}