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
class Hero_Title extends Widget_Base {
    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'financer_hero_title';
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
        return esc_html__( 'Financer Hero Title', 'financer' );
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
        return 'eicon-site-identity';
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
            'hero_title',
            [
                'label' => esc_html__( 'Financer Hero Title', 'financer' ),
            ]
        );
		//General Align
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
					'{{WRAPPER}} .financer-title-section' => 'text-align: {{VALUE}};'
				],
			]
		);
		$this->add_control(
            'subtitle_show',
            [
                'label'        => esc_html__( 'Enable Small Title', 'financer' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'On', 'financer' ),
                'label_off'    => esc_html__( 'Off', 'financer' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
		$this->add_control(
			'subtitle',
			[
				'label' => esc_html__( 'Small Title', 'financer' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter your small title', 'financer' ),
				'default' => esc_html__( 'Add Your Sub Heading Text Here', 'financer' ),
				'condition'   => [ 'subtitle_show' => 'yes' ]
			]
		);
		$this->add_control(
			'small_title_tag',
			[
				'label' => esc_html__( 'Small Title HTML Tag', 'financer' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'div',
					'span' => 'span',
					'p' => 'p',
				],
				'default' => 'h6',
				'condition'   => [ 'subtitle_show' => 'yes' ]
			]
		);		
		$this->add_control(
            'title_show',
            [
                'label'        => esc_html__( 'Enable Title', 'financer' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'On', 'financer' ),
                'label_off'    => esc_html__( 'Off', 'financer' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'financer' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter your title', 'financer' ),
				'default' => esc_html__( 'Add Your Heading Text Here', 'financer' ),
				'condition'   => [ 'title_show' => 'yes' ]
			]
		);
		$this->add_control(
			'title_size',
			[
				'label' => esc_html__( 'Size', 'financer' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default' => esc_html__( 'Default', 'financer' ),
					'small' => esc_html__( 'Small', 'financer' ),
					'medium' => esc_html__( 'Medium', 'financer' ),
					'large' => esc_html__( 'Large', 'financer' ),
					'xl' => esc_html__( 'XL', 'financer' ),
					'xxl' => esc_html__( 'XXL', 'financer' ),
				],
				'condition'   => [ 'title_show' => 'yes' ]
			]
		);
		$this->add_control(
			'title_tag',
			[
				'label' => esc_html__( 'Title HTML Tag', 'financer' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'div',
					'span' => 'span',
					'p' => 'p',
				],
				'default' => 'h2',
				'condition'   => [ 'title_show' => 'yes' ]
			]
		);		
		$this->add_control(
            'text_show',
            [
                'label'        => esc_html__( 'Enable Text', 'financer' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'On', 'financer' ),
                'label_off'    => esc_html__( 'Off', 'financer' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );		
		$this->add_control(
			'text',
			[
				'label' => esc_html__( 'Text', 'financer' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter your Text', 'financer' ),
				'default' => esc_html__( 'There are many variations of passages of lorem ipsum available the majority have suffered alteration in some form by injected humour. Duis aute irure dolor lipsum is simply free text available in the local markets in reprehenderit.', 'financer' ),
				'condition'   => [ 'text_show' => 'yes' ]
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
                    '{{WRAPPER}} .financer-title-section' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                    '{{WRAPPER}} .financer-title-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
				'selector' => '{{WRAPPER}} .financer-title-section',				
			]
		);
		$this->end_controls_section();
		
		//Small Title Style
		$this->start_controls_section(
			'small_title_style',
			[
				'label' => esc_html__( 'Small Title', 'financer' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);		
		$this->add_responsive_control(
            'small_title__margin',
            [
                'label'      => esc_html__( 'Margin', 'financer' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .te-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator'  => 'before',
            ]
        );		
        $this->add_responsive_control(
            'small_title_padding',
            [
                'label'      => esc_html__( 'Padding', 'financer' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .te-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator'  => 'before',
            ]
        );		
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'small_title_bgtype',
				'label' => __( 'Background', 'financer' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .te-subtitle',				
			]
		);		
		$this->add_control(
			'small_title_color',
			[
				'label' => esc_html__( 'Text Color', 'financer' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .te-subtitle' => 'color: {{VALUE}} !important;',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'small_title_typography',
				'label' => __('Typography', 'financer'),
				'selector' => '{{WRAPPER}} .te-subtitle',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'small_title_text_stroke',
				'selector' => '{{WRAPPER}} .te-subtitle',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'small_title_text_shadow',
				'selector' => '{{WRAPPER}} .te-subtitle',
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
			Group_Control_Background::get_type(),
			[
				'name' => 'title_bgtype',
				'label' => __( 'Background', 'financer' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .te-title',				
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'title_border_type',
				'selector' => 
					'{{WRAPPER}} .te-title',				
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'title_border_box_shadow',
				'selector' => 
					'{{WRAPPER}} .te-title',				
				'separator' => 'before',
			]
		);
		$this->add_control(
			'title_border_radius',
			[
				'label' => esc_html__('Border Radius', 'financer'),
				'type' => Controls_Manager::DIMENSIONS,
				'separator' => 'before',
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .te-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
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
			Group_Control_Border::get_type(),
			[
				'name' => 'text_border_type',
				'selector' => 
					'{{WRAPPER}} .te-text',				
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'text_border_box_shadow',
				'selector' => 
					'{{WRAPPER}} .te-text',				
				'separator' => 'before',
			]
		);
		$this->add_control(
			'text_border_radius',
			[
				'label' => esc_html__('Border Radius', 'financer'),
				'type' => Controls_Manager::DIMENSIONS,
				'separator' => 'before',
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .te-text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
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
	
		$this->add_render_attribute( 'subtitle', 'class', 'te-subtitle' );
		$subtitle = $settings['subtitle'];
		
		if( $settings[ 'subtitle_show' ] == 'yes' ){
			$subtitle_html = sprintf( '<%1$s %2$s>%3$s</%1$s>', Utils::validate_html_tag( $settings['small_title_tag'] ), $this->get_render_attribute_string( 'subtitle' ), $subtitle );
		}
		
		$this->add_render_attribute( 'title', 'class', 'te-title' );
		if ( ! empty( $settings['title_size'] ) ) {
			$this->add_render_attribute( 'title', 'class', 'financer-size-' . $settings['title_size'] );
		}
		$title = $settings['title'];
		
		if( $settings[ 'title_show' ] == 'yes' ){
			$title_html = sprintf( '<%1$s %2$s>%3$s</%1$s>', Utils::validate_html_tag( $settings['title_tag'] ), $this->get_render_attribute_string( 'title' ), $title );
		}
		
		$text = $settings[ 'text' ];
	?>
    	
    <!-- Sec Title -->
    <div class="section_title p-0 m-0 aos-init aos-animate financer-title-section" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="500">
        <?php if( $settings[ 'subtitle_show' ] === 'yes' ){?>
        <div class="tag_text"><?php echo wp_kses( $subtitle_html, true );?></div>
        <?php } ?>
        
        <?php if( $settings[ 'title_show' ] === 'yes' ){?>
		<?php echo wp_kses( $title_html, true );?>
        <?php } ?>
        
        <?php if($text){ ?>
        <p class="te-text"><?php echo wp_kses( $text, true );?></p>
        <?php } ?>
    </div>
        
    <?php 
    }
}