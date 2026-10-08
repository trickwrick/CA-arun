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
class Form extends Widget_Base {
    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'financer_form';
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
        return esc_html__( 'Financer Form', 'financer' );
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
        return 'eicon-form-horizontal';
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
            'form',
            [
                'label' => esc_html__( 'Financer Form', 'financer' ),
            ]
        );				
		$this->add_control(
            'cf7_shortocde',
            [
                'label' => esc_html__('Select Contact Form 7', 'financer'),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' => get_contact_form_7_list(),
            ]
        );		
		$this->end_controls_section();
		
		/************************************************************************
								Tab Style Start
		*************************************************************************/
				
		/**Form Box Style**/
		$this->start_controls_section(
			'general_box_style',
			[
				'label' => esc_html__('Box Setting', 'financer'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs( 'financer_general_box_tab' );
		
			$this->start_controls_tab(
				'financer_general_box_normal',
				[
					'label' => __( 'Normal', 'financer' ),
				]
			);
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'general_box_bgtype',
						'label' => __( 'Background', 'financer' ),
						'types' => [ 'classic', 'gradient' ],
						'selector' => 
							'{{WRAPPER}} .te-contact-form',				
					]
				);
				$this->add_responsive_control(
					'general_box_space',
					[
						'label'              => __( 'Space', 'financer' ),
						'type'               => Controls_Manager::DIMENSIONS,
						'size_units'         => [ 'px', 'em', '%' ],
						'selectors'          => [
							'{{WRAPPER}} .te-contact-form' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							
						],
						
						'frontend_available' => true,
					]
				);
				$this->add_responsive_control(
					'general_box_padding',
					[
						'label'              => __( 'Padding', 'financer' ),
						'type'               => Controls_Manager::DIMENSIONS,
						'size_units'         => [ 'px', 'em', '%' ],
						'selectors'          => [
							'{{WRAPPER}} .te-contact-form' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
						
						'frontend_available' => true,
					]
				);
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'general_box_border_type',
						'selector' => 
							'{{WRAPPER}} .te-contact-form',				
						'separator' => 'before',
					]
				);
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'general_box_shadow',
						'selector' => 
							'{{WRAPPER}} .te-contact-form',				
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
							'{{WRAPPER}} .te-contact-form' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
						],
					]
				);
			$this->end_controls_tab();
			
			$this->start_controls_tab(
				'financer_general_box_hover',
				[
					'label' => __( 'Hover', 'financer' ),
				]
			);
			
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'general_hover_bg_bgtype',
						'label' => __( 'Hover Background', 'financer' ),
						'types' => [ 'classic', 'gradient' ],
						'selector' => 
							'{{WRAPPER}} .te-contact-form:hover'				
					]
				);
				
				$this->add_control(
					'general_background_hover_transition',
					[
						'label' => esc_html__( 'Transition Duration', 'financer' ),
						'type' => Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'max' => 3,
								'step' => 0.1,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .te-contact-form:hover' => 'transition-duration: {{SIZE}}s'
						],
					]
				);
		
				$this->add_control(
					'hover_animation',
					[
						'label' => esc_html__( 'Hover Animation', 'financer' ),
						'type' => Controls_Manager::HOVER_ANIMATION,
					]
				);				
			$this->end_controls_tab();			
		$this->end_controls_tabs();   
		$this->end_controls_section();
		
		/**Form Style**/
		$this->start_controls_section(
			'form_style',
			[
				'label' => esc_html__('Form Style Setting', 'financer'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs( 'financer_tabs_form' );
		
			$this->start_controls_tab(
				'financer_tab_form_normal',
				[
					'label' => __( 'Normal', 'financer' ),
				]
			);
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'form_bgtype',
						'label' => __( 'Background', 'financer' ),
						'types' => [ 'classic', 'gradient' ],
						'selector' => 
							'{{WRAPPER}} .te-contact-form input,
							 {{WRAPPER}} .te-contact-form textarea,
							 {{WRAPPER}} .te-contact-form select',				
					]
				);
				$this->add_responsive_control(
					'form_width_size',
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
							'{{WRAPPER}} .te-contact-form input' => 'width: {{SIZE}}{{UNIT}};',
							'{{WRAPPER}} .te-contact-form select' => 'width: {{SIZE}}{{UNIT}};',
							'{{WRAPPER}} .te-contact-form textarea' => 'width: {{SIZE}}{{UNIT}};',
						],
					]
				);
				$this->add_responsive_control(
					'form_height_size',
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
							'{{WRAPPER}} .te-contact-form input' => 'height: {{SIZE}}{{UNIT}};',
							'{{WRAPPER}} .te-contact-form select' => 'height: {{SIZE}}{{UNIT}};',
							'{{WRAPPER}} .te-contact-form textarea' => 'height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				$this->add_responsive_control(
					'form_spacing',
					[
						'label'              => __( 'Spacing', 'financer' ),
						'type'               => Controls_Manager::DIMENSIONS,
						'size_units'         => [ 'px', 'em', '%' ],
						'selectors'          => [
							'{{WRAPPER}} .te-contact-form input' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							'{{WRAPPER}} .te-contact-form select' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							'{{WRAPPER}} .te-contact-form textarea' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
						
						'frontend_available' => true,
					]
				);
				$this->add_responsive_control(
					'form_padding',
					[
						'label'              => __( 'Padding', 'financer' ),
						'type'               => Controls_Manager::DIMENSIONS,
						'size_units'         => [ 'px', 'em', '%' ],
						'selectors'          => [
							'{{WRAPPER}} .te-contact-form input' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							'{{WRAPPER}} .te-contact-form select' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							'{{WRAPPER}} .te-contact-form textarea' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
						
						'frontend_available' => true,
					]
				);
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'form_border_type',
						'selector' => 
							'{{WRAPPER}} .te-contact-form input,
							 {{WRAPPER}} .te-contact-form select,
							 {{WRAPPER}} .te-contact-form textarea',				
						'separator' => 'before',
					]
				);
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'form_border_box_shadow',
						'selector' => 
							'{{WRAPPER}} .te-contact-form input,
							 {{WRAPPER}} .te-contact-form select,
							 {{WRAPPER}} .te-contact-form textarea',				
						'separator' => 'before',
					]
				);
				$this->add_control(
					'form_border_radius',
					[
						'label' => esc_html__('Border Radius', 'financer'),
						'type' => Controls_Manager::DIMENSIONS,
						'separator' => 'before',
						'size_units' => ['px'],
						'selectors' => [
							'{{WRAPPER}} .te-contact-form input' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							'{{WRAPPER}} .te-contact-form select' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							'{{WRAPPER}} .te-contact-form textarea' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				$this->add_group_control(
					Group_Control_Typography::get_type(),
					[
						'name' => 'form_title_typography',
						'label' => __('Text Typography', 'financer'),
						'selector' => 
							'{{WRAPPER}} .te-contact-form input,
							 {{WRAPPER}} .te-contact-form select,
							 {{WRAPPER}} .te-contact-form textarea',				
						'separator' => 'before',
					]
				);
				$this->add_control(
					'form_title_color',
					[
						'label' => __('Text Color', 'financer'),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .te-contact-form input' => 'color: {{VALUE}}',
							'{{WRAPPER}} .te-contact-form select' => 'color: {{VALUE}}',
							'{{WRAPPER}} .te-contact-form textarea' => 'color: {{VALUE}}',
						],
						'separator' => 'before',
					]
				);
			$this->end_controls_tab();
			
			$this->start_controls_tab(
				'form_tab_btn_hover',
				[
					'label' => __( 'Hover', 'financer' ),
				]
			);
			
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'form_hover_bg_bgtype',
						'label' => __( 'Hover Background', 'financer' ),
						'types' => [ 'classic', 'gradient' ],
						'selector' => 
							'{{WRAPPER}} .te-contact-form input:hover,
							 {{WRAPPER}} .te-contact-form select:hover,
							 {{WRAPPER}} .te-contact-form textarea:hover',				
					]
				);
				$this->add_control(
					'form_border_hover_color',
					[
						'label' => __('Border Hover Color', 'financer'),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .te-contact-form input:hover' => 'border-color: {{VALUE}}',
							'{{WRAPPER}} .te-contact-form select:hover' => 'border-color: {{VALUE}}',
							'{{WRAPPER}} .te-contact-form textarea:hover' => 'border-color: {{VALUE}}',
						],
						'separator' => 'before',
					]
				);
				$this->add_control(
					'form_title_hover_color',
					[
						'label' => __('Text Hover Color', 'financer'),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .te-contact-form input:hover' => 'color: {{VALUE}}',
							'{{WRAPPER}} .te-contact-form select:hover' => 'color: {{VALUE}}',
							'{{WRAPPER}} .te-contact-form textarea:hover' => 'color: {{VALUE}}',
						],
						'separator' => 'before',
					]
				);
			
			$this->end_controls_tab();
			
		$this->end_controls_tabs();   
		$this->end_controls_section();
		
		/**Button Style**/
		$this->start_controls_section(
			'button_style',
			[
				'label' => esc_html__('Button Style Setting', 'financer'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs( 'financer_tabs_btn' );
		
			$this->start_controls_tab(
				'financer_tab_btn_normal',
				[
					'label' => __( 'Normal', 'financer' ),
				]
			);
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'btn_bgtype',
						'label' => __( 'Button Background', 'financer' ),
						'types' => [ 'classic', 'gradient' ],
						'selector' => 
							'{{WRAPPER}} .yt-btn-title-v1',				
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
							'{{WRAPPER}} .yt-btn-title-v1' => 'width: {{SIZE}}{{UNIT}};'
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
							'{{WRAPPER}} .yt-btn-title-v1' => 'height: {{SIZE}}{{UNIT}};'
						],
					]
				);
				$this->add_responsive_control(
					'btn_padding',
					[
						'label'              => __( 'Padding', 'financer' ),
						'type'               => Controls_Manager::DIMENSIONS,
						'size_units'         => [ 'px', 'em', '%' ],
						'selectors'          => [
							'{{WRAPPER}} .yt-btn-title-v1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
						],
						
						'frontend_available' => true,
					]
				);
				$this->add_responsive_control(
					'btn_margin',
					[
						'label'              => __( 'Margin', 'financer' ),
						'type'               => Controls_Manager::DIMENSIONS,
						'size_units'         => [ 'px', 'em', '%' ],
						'selectors'          => [
							'{{WRAPPER}} .yt-btn-title-v1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
						],
						
						'frontend_available' => true,
					]
				);
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'btn_border_type',
						'selector' => 
							'{{WRAPPER}} .yt-btn-title-v1',				
						'separator' => 'before',
					]
				);
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'border_box_shadow',
						'selector' => 
							'{{WRAPPER}} .yt-btn-title-v1',				
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
							'{{WRAPPER}} .yt-btn-title-v1' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
						],
					]
				);
				$this->add_group_control(
					Group_Control_Typography::get_type(),
					[
						'name' => 'btn_title_typography',
						'label' => __('Button Text Typography', 'financer'),
						'selector' => 
							'{{WRAPPER}} .yt-btn-title-v1',				
						'separator' => 'before',
					]
				);
				$this->add_control(
					'btn_title_color',
					[
						'label' => __('Button Text Color', 'financer'),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .yt-btn-title-v1' => 'color: {{VALUE}} !important',
							'{{WRAPPER}} .yt-btn-title-v1 .btn-wrap .text-one' => 'color: {{VALUE}} !important',
						],
						'separator' => 'before',
					]
				);
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'btn_title_bgtype',
						'label' => __( 'BG Color', 'financer' ),
						'types' => [ 'classic', 'gradient' ],
						'selector' => 
							'{{WRAPPER}} .yt-btn-title-v1',				
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
							'{{WRAPPER}} .yt-btn-title-v1:hover:before',				
					]
				);
				$this->add_control(
					'btn_title_hover_color',
					[
						'label' => __('Button Text Hover Color', 'financer'),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .yt-btn-title-v1:hover' => 'color: {{VALUE}} !important',
							'{{WRAPPER}} .yt-btn-title-v1:hover .btn-wrap .text-two' => 'color: {{VALUE}} !important',
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
	?>
    
    <!-- Form Column -->
    <div class="contact_form te-contact-form">
    	<?php echo do_shortcode('[contact-form-7 id="'.esc_attr($settings['cf7_shortocde']).'"]'); ?>
    </div>
    
    <?php 
    }
}