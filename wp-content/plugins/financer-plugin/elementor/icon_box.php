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
class Icon_Box extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'financer_icon_box';
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
        return esc_html__( 'Financer Icon Box', 'financer' );
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
        return 'eicon-icon-box';
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
            'icon_box',
            [
                'label' => esc_html__( 'Financer Icon Box', 'financer' ),
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
					'3' => esc_html__( 'Style Three ', 'financer'),
				),
			]
		);
		$this->add_control(
            'show_shape_style',
            [
                'label'        => esc_html__( 'Enable Shape Border', 'financer' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'On', 'financer' ),
                'label_off'    => esc_html__( 'Off', 'financer' ),
                'return_value' => 'yes',
                'default'      => 'no',
				'condition'   => [ 
					'layout_control' => '2' 
				]
            ]
        );
		$this->add_control(
			'delay_time',
			[
				'label'       => __( 'Post Delay TIme', 'financer' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'default' => esc_html__( '600', 'financer' ),
			]
		);
		$this->add_control(
			'icon',
			[
				'label' => esc_html__('Enter The icons', 'financer'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'icon-47',
					'library' => 'solid',
				],
			]			
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'financer' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'default' => esc_html__( 'Investor Relations', 'financer' ),
			]
		);
		$this->add_control(
			'text',
			[
				'label'       => __( 'Description', 'financer' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'default' => esc_html__( 'Duis aute irure dolor in velit one reprehenderit in voluptate more esse cillum dolore neris.', 'financer' ),
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
					'page' => esc_html__( 'post ', 'financer'),
				),
				'condition'   => [ 
					'layout_control' => ['2']
				]
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
					'layout_control' => ['2'],
					'link_option' => 'extranal',
				]
			]
		);		
		$this->add_control(
			'page_select',
			[
				'label'   => esc_html__( 'Select Post', 'financer' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT2,
				'default' => 'extranal',
				'options' => financer_post_list(),
				'condition'   => [
					'layout_control' => ['2'],
					'link_option' => 'page',
				]
			]
		);
		$this->end_controls_section();
		
		/************************************************************************
									Tab Style Start
		*************************************************************************/
	
		/**Layout Control Style**/		
		$this->start_controls_section(
			'financer_layout_style',
			[
				'label' => esc_html__('Financer Layout Setting', 'financer'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
            'financer_layout_margin',
            [
                'label'              => __( 'Spacing', 'financer' ),
                'type'               => Controls_Manager::DIMENSIONS,
                'size_units'         => [ 'px', 'em', '%' ],
                'selectors'          => [
                    '{{WRAPPER}} .financer-icon-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
                ],
				'frontend_available' => true,
				
            ]
        );
		$this->add_responsive_control(
            'financer_layout_padding',
            [
                'label'              => __( 'Gapping', 'financer' ),
                'type'               => Controls_Manager::DIMENSIONS,
                'size_units'         => [ 'px', 'em', '%' ],
                'selectors'          => [
                    '{{WRAPPER}} .financer-icon-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
                ],
				'frontend_available' => true,				
            ]
        );
		$this->add_control(
			'financer_layout_background',
			[
				'label'                 => __( 'Background', 'financer' ),
				'type'                  => Controls_Manager::HEADING,
				'separator'             => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'financer_layout_bgtype',
				'label' => __( 'Button Background', 'financer' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => 
					'{{WRAPPER}} .financer-icon-box',				
			]
		);
		$this->end_controls_section();	
		
		/**Icon Style**/
		$this->start_controls_section(
			'icon_style',
			[
				'label' => esc_html__('Icon Style Setting', 'financer'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs( 'financer_tabs_btn' );
		
			$this->start_controls_tab(
				'financer_tab_icon_normal',
				[
					'label' => __( 'Normal', 'financer' ),
				]
			);
				$this->add_responsive_control(
					'icon_width_size',
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
							'{{WRAPPER}} .te-icon' => 'width: {{SIZE}}{{UNIT}};',
						],
					]
				);
				$this->add_responsive_control(
					'icon_height_size',
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
							'{{WRAPPER}} .te-icon' => 'height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				$this->add_responsive_control(
					'icon_margin',
					[
						'label'              => __( 'Margin', 'financer' ),
						'type'               => Controls_Manager::DIMENSIONS,
						'size_units'         => [ 'px', 'em', '%' ],
						'selectors'          => [
							'{{WRAPPER}} .te-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
						],
						
						'frontend_available' => true,
					]
				);
				$this->add_responsive_control(
					'icon_padding',
					[
						'label'              => __( 'Padding', 'financer' ),
						'type'               => Controls_Manager::DIMENSIONS,
						'size_units'         => [ 'px', 'em', '%' ],
						'selectors'          => [
							'{{WRAPPER}} .te-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
						],
						
						'frontend_available' => true,
					]
				);
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'icon_border_type',
						'selector' => 
							'{{WRAPPER}} .te-icon',				
						'separator' => 'before',
					]
				);
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'icon_border_box_shadow',
						'selector' => 
							'{{WRAPPER}} .te-icon',				
						'separator' => 'before',
					]
				);
				$this->add_control(
					'icon_border_radius',
					[
						'label' => esc_html__('Icon Border Radius', 'financer'),
						'type' => Controls_Manager::DIMENSIONS,
						'separator' => 'before',
						'size_units' => ['px'],
						'selectors' => [
							'{{WRAPPER}} .te-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
						],
					]
				);
				$this->add_responsive_control(
					'icon_size',
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
							'{{WRAPPER}} .te-icon' => 'font-size: {{SIZE}}{{UNIT}} !important;',
						],
					]
				);
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'icon_bg_color',
						'label' => __( 'Icon BG Background', 'financer' ),
						'types' => [ 'classic', 'gradient' ],
						'selector' => 
							'{{WRAPPER}} .te-icon',				
					]
				);
				$this->add_control(
					'icon_color',
					[
						'label' => __('Icon Color', 'financer'),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .te-icon i' => 'color: {{VALUE}}!important',
							'{{WRAPPER}} .te-icon span' => 'color: {{VALUE}}!important',
						],
						'separator' => 'before',
					]
				);
			$this->end_controls_tab();
			
			$this->start_controls_tab(
				'financer_tab_icon_hover',
				[
					'label' => __( 'Hover', 'financer' ),
				]
			);
			
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'icon_hover_bg_bgtype',
						'label' => __( 'Icon Hover Background', 'financer' ),
						'types' => [ 'classic', 'gradient' ],
						'selector' => 
							'{{WRAPPER}} .te-icon:hover',				
					]
				);
				$this->add_control(
					'icon_hover_color',
					[
						'label' => __('icon Hover Color', 'financer'),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .te-icon:hover i' => 'color: {{VALUE}} !important',
							'{{WRAPPER}} .te-icon:hover span' => 'color: {{VALUE}} !important',
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
			Group_Control_Background::get_type(),
			[
				'name' => 'title_bgtype',
				'label' => __( 'Background', 'financer' ),
				'types' => [ 'classic', 'gradient' ],
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
		//Hover
		$this->add_control(
			'title_hover_color',
			[
				'label' => esc_html__( 'Text Hover Color', 'financer' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .te-title:hover' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .te-title:hover a' => 'color: {{VALUE}} !important;',
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
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'text_bgtype',
				'label' => __( 'Background', 'financer' ),
				'types' => [ 'classic', 'gradient' ],
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
					'{{WRAPPER}} .te-text a' => 'color: {{VALUE}} !important;',
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
		$icon = $settings['icon'];
	?>
    
    <?php if($settings['layout_control'] == '3') : ?>
    
    <div class="contact_block_one mb_30" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="<?php echo esc_attr($settings['delay_time']);?>">
        <?php if($icon){ ?>
        <div class="contact_block_icon te-icon">
        	<?php
				$icon = str_replace( "flat ",  "",  $settings['icon']);
				if( !empty( $icon ) ):?>
				<?php \Elementor\Icons_Manager::render_icon( $icon ); ?>
			<?php else:?>
				<i class="icon-3"></i>
			<?php endif;?>
        </div>
        <?php } ?>
        <div class="contact_block_title"><h4 class="te-title"><?php echo wp_kses($settings['title'], true);?></h4></div>
        <div class="contact_block_text"><p class="te-text"><?php echo wp_kses($settings['text'], true);?></p></div>
    </div>
    
	<?php elseif($settings['layout_control'] == '2') : ?>
    
    <div class="process_block_one centred <?php if($settings['show_shape_style'] == 'yes') echo 'shape_image'; ?> aos-init aos-animate" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="<?php echo esc_attr($settings['delay_time']);?>">
        <?php if($icon){ ?>
        <div class="process_icon te-icon">
            <?php
				$icon = str_replace( "flat ",  "",  $settings['icon']);
				if( !empty( $icon ) ):?>
				<?php \Elementor\Icons_Manager::render_icon( $icon ); ?>
			<?php else:?>
				<i class="icon-36"></i>
			<?php endif;?>
        </div>
        <?php } ?>
        <h4 class="te-title"><?php echo wp_kses($settings['title'], true);?></h4>
        <p class="te-text"><?php echo wp_kses($settings['text'], true);?></p>
    </div>
    
    <?php else: ?>
    
    <div class="why_choose_block_one financer-icon-box aos-init aos-animate" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="<?php echo esc_attr($settings['delay_time']);?>">
        <?php if($icon){ ?>
        <div class="choose_icon te-icon">
            <?php
				$icon = str_replace( "flat ",  "",  $settings['icon']);
				if( !empty( $icon ) ):?>
				<?php \Elementor\Icons_Manager::render_icon( $icon ); ?>
			<?php else:?>
				<i class="icon-47"></i>
			<?php endif;?>            
        </div>
        <?php } ?>
        <h4 class="te-title"><?php echo wp_kses($settings['title'], true);?></h4>
        <p class="te-text"><?php echo wp_kses($settings['text'], true);?></p>
    </div>
    <?php endif; ?> 
      
    <?php
    }
}
