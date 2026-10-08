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
class Button extends Widget_Base {
    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'financer_button';
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
        return esc_html__( 'Financer Button', 'financer' );
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
        return 'eicon-button';
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
            'button',
            [
                'label' => esc_html__( 'Financer Button', 'financer' ),
            ]
        );
			
		$this->add_control(
			'btn_title',
			[
				'label'       => __( 'Button Title', 'financer' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Button Title Here', 'financer' ),
			]
		);
				
		$this->add_control(
			'link_option',
			[
				'label'   => esc_html__( 'Select link Option', 'financer' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'extranal',
				'options' => array(
					'extranal' => esc_html__( 'Extranal ', 'financer'),
					'page' => esc_html__( 'Page ', 'financer'),
				),
			]
		);		
		$this->add_control(
			'link',
			[
				'label' => __( 'External Link', 'financer' ),
				'type' => Controls_Manager::URL,
				'label_block' => true, 
				'placeholder' => __( 'https://your-link.com', 'financer' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
				'condition'   => [
					'link_option' => 'extranal'
				]
			]
		);		
		$this->add_control(
			'page_select',
			[
				'label'   => esc_html__( 'Select Page', 'financer' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT2,
				'default' => 'extranal',
				'options' => financer_page_list(),
				'condition'   => [
					'link_option' => 'page'
				]
			]
		);
		
		$this->end_controls_section();
		
		/**Button Style**/
		$this->start_controls_section(
			'button_style',
			[
				'label' => esc_html__('Button Style Setting', 'financer'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'general_align',
			[
				'label' => esc_html__( 'Alignment', 'financer' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'financer' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'financer' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'financer' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .yt-btn' => 'text-align: {{VALUE}}',
				],
			]
		);
		$this->start_controls_tabs( 'financer_tabs_btn' );
		
			$this->start_controls_tab(
				'financer_tab_btn_normal',
				[
					'label' => __( 'Normal', 'financer' ),
				]
			);
				$this->add_responsive_control(
					'btn_width_size',
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
							'{{WRAPPER}} .financer-btn' => 'width: {{SIZE}}{{UNIT}};',
						],
					]
				);
				$this->add_responsive_control(
					'btn_height_size',
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
							'{{WRAPPER}} .financer-btn' => 'height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				$this->add_responsive_control(
					'btn_margin',
					[
						'label'              => __( 'Margin', 'financer' ),
						'type'               => Controls_Manager::DIMENSIONS,
						'size_units'         => [ 'px', 'em', '%' ],
						'selectors'          => [
							'{{WRAPPER}} .financer-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
						],
						
						'frontend_available' => true,
					]
				);
				$this->add_responsive_control(
					'btn_padding',
					[
						'label'              => __( 'Padding', 'financer' ),
						'type'               => Controls_Manager::DIMENSIONS,
						'size_units'         => [ 'px', 'em', '%' ],
						'selectors'          => [
							'{{WRAPPER}} .financer-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
						],
						
						'frontend_available' => true,
					]
				);
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'btn_border_type',
						'selector' => 
							'{{WRAPPER}} .financer-btn',				
						'separator' => 'before',
					]
				);
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'border_box_shadow',
						'selector' => 
							'{{WRAPPER}} .financer-btn',				
						'separator' => 'before',
					]
				);
				$this->add_control(
					'btn_border_radius',
					[
						'label' => esc_html__('Border Radius', 'financer'),
						'type' => Controls_Manager::DIMENSIONS,
						'separator' => 'before',
						'size_units' => ['px'],
						'selectors' => [
							'{{WRAPPER}} .financer-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
						],
					]
				);
				$this->add_group_control(
					Group_Control_Typography::get_type(),
					[
						'name' => 'btn_title_typography',
						'label' => __('Button Text Typography', 'financer'),
						'selector' => 
							'{{WRAPPER}} .financer-btn',				
						'separator' => 'before',
					]
				);
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'btn_title_bg_color',
						'label' => __( 'Button Background Color', 'financer' ),
						'types' => [ 'classic', 'gradient' ],
						'selector' => 
							'{{WRAPPER}} .financer-btn:before,
										 .financer-btn',				
					]
				);
				$this->add_control(
					'btn_title_color',
					[
						'label' => __('Button Text Color', 'financer'),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .financer-btn' => 'color: {{VALUE}}!important',
						],
						'separator' => 'before',
					]
				);
			$this->end_controls_tab();
			
			$this->start_controls_tab(
				'financer_tab_btn_hover',
				[
					'label' => __( 'Hover', 'financer' ),
				]
			);
			
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'btn_hover_bg_bgtype',
						'label' => __( 'Button Hover Background', 'financer' ),
						'types' => [ 'classic', 'gradient' ],
						'selector' => 
							'{{WRAPPER}} .financer-btn:hover:before,
										 .financer-btn:hover',				
					]
				);
				$this->add_control(
					'btn_title_hover_color',
					[
						'label' => __('Button Text Hover Color', 'financer'),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .financer-btn:hover' => 'color: {{VALUE}} !important',
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
				
		$page = $settings['link_option'];
		$page_select = $settings[ 'page_select' ];
		$ext_url = $settings[ 'link' ];
		
		if( $page == 'page' ){
			$mount_link = get_page_link( $page_select );
		}else{
			$mount_link = $ext_url['url'];
			$target = $ext_url['is_external'] ? ' target="_blank"' : '';
			$nofollow = $ext_url['nofollow'] ? ' rel="nofollow"' : '';
		}	
	?>
    
    <div class="yt-btn">
    	<a href="<?php echo esc_url( $mount_link );?>" <?php if( $page == 'extranal' ) echo esc_attr( $target );?> <?php if( $page == 'extranal' ) echo esc_attr( $nofollow );?> class="btn_style_one financer-btn"><?php echo wp_kses($settings['btn_title'], true);?></a>
    </div>     
    
    <?php 
    }
}