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
use \Elementor\Group_Control_Css_Filter;
use Elementor\Plugin;

/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class Animation_Image extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'financer_animation_image';
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
		return esc_html__( 'Financer Animation Image', 'financer' );
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
		return 'eicon-image-rollover';
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
			'animation_image',
			[
				'label' => esc_html__( 'Financer Animation Image', 'financer' ),
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
					'4' => esc_html__( 'Style Four ', 'financer'),
				),
			]
		);
		$this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'financer' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'image_v2',
			[
				'label' => esc_html__( 'Choose Image', 'financer' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition'   => [
					'layout_control' => '4',
				]
			]
		);
		$this->add_control(
			'image_three',
			[
				'label' => esc_html__( 'Choose Image', 'financer' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition'   => [
					'layout_control' => '5',
				]
			]
		);
		$this->end_controls_section();
		
		/************************************************************************
								Tab Style Start
		*************************************************************************/
				
		/**Image Position Style**/
		$this->start_controls_section(
			'image_position_style',
			[
				'label' => esc_html__('Image Position Setting', 'financer'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);		
		$this->add_control(
			'image_position',
			[
				'label' => esc_html__( 'Position', 'financer' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => esc_html__( 'Default', 'financer' ),
					'absolute' => esc_html__( 'Absolute', 'financer' ),
					'fixed' => esc_html__( 'Fixed', 'financer' ),
				],
				'selectors' => [
					'{{WRAPPER}} .te-img-position' => 'position: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);		
		$this->add_responsive_control(
			'image_offset_width_size',
			[
				'label' => __( 'Width', 'cleanex' ),
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
					'{{WRAPPER}} .te-img-position' => 'width: {{SIZE}}{{UNIT}};'
				],
				'condition' => [
					'image_position!' => '',
				],
			]
		);
		$this->add_responsive_control(
			'image_offset_height_size',
			[
				'label' => __( 'Height', 'cleanex' ),
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
					'{{WRAPPER}} .te-img-position' => 'height: {{SIZE}}{{UNIT}};'
				],
				'condition' => [
					'image_position!' => '',
				],
			]
		);		
		$this->add_control(
			'image_offset_orientation_h',
			[
				'label' => esc_html__( 'Horizontal Orientation', 'financer' ),
				'type' => Controls_Manager::CHOOSE,
				'toggle' => false,
				'default' => 'end',
				'options' => [
					'start' => [
						'title' => 'left',
						'icon' => 'eicon-h-align-left',
					],
					'end' => [
						'title' => 'right',
						'icon' => 'eicon-h-align-right',
					],
				],
				'classes' => 'financer-control-start-end',
				'render_type' => 'ui',
				'condition' => [
					'image_position!' => '',
				],
			]
		);		
		$this->add_responsive_control(
			'image_offset_x',
			[
				'label' => esc_html__( 'Offset', 'financer' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => -200,
						'max' => 200,
					],
					'vw' => [
						'min' => -200,
						'max' => 200,
					],
					'vh' => [
						'min' => -200,
						'max' => 200,
					],
				],
				'default' => [
					'size' => '0',
				],
				'size_units' => [ 'px', '%', 'vw', 'vh', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .te-img-position' => 'left: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'image_offset_orientation_h!' => 'end',
					'image_position!' => '',
				],
			]
		);		
		$this->add_responsive_control(
			'image_offset_x_end',
			[
				'label' => esc_html__( 'Offset', 'financer' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
						'step' => 0.1,
					],
					'%' => [
						'min' => -200,
						'max' => 200,
					],
					'vw' => [
						'min' => -200,
						'max' => 200,
					],
					'vh' => [
						'min' => -200,
						'max' => 200,
					],
				],
				'default' => [
					'size' => '0',
				],
				'size_units' => [ 'px', '%', 'vw', 'vh', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .te-img-position' => 'right: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'image_offset_orientation_h' => 'end',
					'image_position!' => '',
				],
			]
		);		
		$this->add_control(
			'image_offset_orientation_v',
			[
				'label' => esc_html__( 'Vertical Orientation', 'financer' ),
				'type' => Controls_Manager::CHOOSE,
				'toggle' => false,
				'default' => 'start',
				'options' => [
					'start' => [
						'title' => esc_html__( 'Top', 'financer' ),
						'icon' => 'eicon-v-align-top',
					],
					'end' => [
						'title' => esc_html__( 'Bottom', 'financer' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'render_type' => 'ui',
				'condition' => [
					'image_position!' => '',
				],
			]
		);
		$this->add_responsive_control(
			'image_offset_y',
			[
				'label' => esc_html__( 'Offset', 'financer' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => -200,
						'max' => 200,
					],
					'vh' => [
						'min' => -200,
						'max' => 200,
					],
					'vw' => [
						'min' => -200,
						'max' => 200,
					],
				],
				'size_units' => [ 'px', '%', 'vh', 'vw', 'custom' ],
				'default' => [
					'size' => '0',
				],
				'selectors' => [
					'{{WRAPPER}} .te-img-position' => 'top: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'image_offset_orientation_v!' => 'end',
					'image_position!' => '',
				],
			]
		);
		$this->add_responsive_control(
			'image_offset_y_end',
			[
				'label' => esc_html__( 'Offset', 'financer' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => -200,
						'max' => 200,
					],
					'vh' => [
						'min' => -200,
						'max' => 200,
					],
					'vw' => [
						'min' => -200,
						'max' => 200,
					],
				],
				'size_units' => [ 'px', '%', 'vh', 'vw', 'custom' ],
				'default' => [
					'size' => '0',
				],
				'selectors' => [
					'{{WRAPPER}} .te-img-position' => 'bottom: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'image_offset_orientation_v' => 'end',
					'image_position!' => '',
				],
			]
		);
		$this->add_responsive_control(
			'image_z_index',
			[
				'label' => esc_html__( 'Z-Index', 'financer' ),
				'type' => Controls_Manager::NUMBER,
				'selectors' => [
					'{{WRAPPER}} .te-img-position' => 'z-index: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'image_offset_opacity',
			[
				'label' => __( 'Opacity', 'cleanex' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'min' => 0,
					'max' => 1,
				],
				'selectors' => [
					'{{WRAPPER}} .te-img-position' => 'opacity: {{SIZE}}{{UNIT}};'
				],
				'condition' => [
					'image_position!' => '',
				],
			]
		);		
		$this->end_controls_section();
		
		/**Image V2 Icon Style**/
		$this->start_controls_section(
			'image_v2_position_style',
			[
				'label' => esc_html__('Image 2 Position Setting', 'financer'),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition'   => [
					'layout_control' => ['4']
				]
			]
		);		
		$this->add_control(
			'image_v2_position',
			[
				'label' => esc_html__( 'Position', 'financer' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => esc_html__( 'Default', 'financer' ),
					'absolute' => esc_html__( 'Absolute', 'financer' ),
					'fixed' => esc_html__( 'Fixed', 'financer' ),
				],
				'selectors' => [
					'{{WRAPPER}} .te-img-position-v2' => 'position: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);		
		$this->add_responsive_control(
			'image_v2_offset_width_size',
			[
				'label' => __( 'Width', 'cleanex' ),
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
					'{{WRAPPER}} .te-img-position-v2' => 'width: {{SIZE}}{{UNIT}};'
				],
				'condition' => [
					'image_v2_position!' => '',
				],
			]
		);
		$this->add_responsive_control(
			'image_v2_offset_height_size',
			[
				'label' => __( 'Height', 'cleanex' ),
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
					'{{WRAPPER}} .te-img-position-v2' => 'height: {{SIZE}}{{UNIT}};'
				],
				'condition' => [
					'image_v2_position!' => '',
				],
			]
		);		
		$this->add_control(
			'image_v2_offset_orientation_h',
			[
				'label' => esc_html__( 'Horizontal Orientation', 'financer' ),
				'type' => Controls_Manager::CHOOSE,
				'toggle' => false,
				'default' => 'end',
				'options' => [
					'start' => [
						'title' => 'left',
						'icon' => 'eicon-h-align-left',
					],
					'end' => [
						'title' => 'right',
						'icon' => 'eicon-h-align-right',
					],
				],
				'classes' => 'financer-control-start-end',
				'render_type' => 'ui',
				'condition' => [
					'image_v2_position!' => '',
				],
			]
		);		
		$this->add_responsive_control(
			'image_v2_offset_x',
			[
				'label' => esc_html__( 'Offset', 'financer' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => -200,
						'max' => 200,
					],
					'vw' => [
						'min' => -200,
						'max' => 200,
					],
					'vh' => [
						'min' => -200,
						'max' => 200,
					],
				],
				'default' => [
					'size' => '0',
				],
				'size_units' => [ 'px', '%', 'vw', 'vh', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .te-img-position-v2' => 'left: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'image_v2_offset_orientation_h!' => 'end',
					'image_v2_position!' => '',
				],
			]
		);		
		$this->add_responsive_control(
			'image_v2_offset_x_end',
			[
				'label' => esc_html__( 'Offset', 'financer' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
						'step' => 0.1,
					],
					'%' => [
						'min' => -200,
						'max' => 200,
					],
					'vw' => [
						'min' => -200,
						'max' => 200,
					],
					'vh' => [
						'min' => -200,
						'max' => 200,
					],
				],
				'default' => [
					'size' => '0',
				],
				'size_units' => [ 'px', '%', 'vw', 'vh', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .te-img-position-v2' => 'right: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'image_v2_offset_orientation_h' => 'end',
					'image_v2_position!' => '',
				],
			]
		);		
		$this->add_control(
			'image_v2_offset_orientation_v',
			[
				'label' => esc_html__( 'Vertical Orientation', 'financer' ),
				'type' => Controls_Manager::CHOOSE,
				'toggle' => false,
				'default' => 'start',
				'options' => [
					'start' => [
						'title' => esc_html__( 'Top', 'financer' ),
						'icon' => 'eicon-v-align-top',
					],
					'end' => [
						'title' => esc_html__( 'Bottom', 'financer' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'render_type' => 'ui',
				'condition' => [
					'image_v2_position!' => '',
				],
			]
		);
		$this->add_responsive_control(
			'image_v2_offset_y',
			[
				'label' => esc_html__( 'Offset', 'financer' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => -200,
						'max' => 200,
					],
					'vh' => [
						'min' => -200,
						'max' => 200,
					],
					'vw' => [
						'min' => -200,
						'max' => 200,
					],
				],
				'size_units' => [ 'px', '%', 'vh', 'vw', 'custom' ],
				'default' => [
					'size' => '0',
				],
				'selectors' => [
					'{{WRAPPER}} .te-img-position-v2' => 'top: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'image_v2_offset_orientation_v!' => 'end',
					'image_v2_position!' => '',
				],
			]
		);
		$this->add_responsive_control(
			'image_v2_offset_y_end',
			[
				'label' => esc_html__( 'Offset', 'financer' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => -200,
						'max' => 200,
					],
					'vh' => [
						'min' => -200,
						'max' => 200,
					],
					'vw' => [
						'min' => -200,
						'max' => 200,
					],
				],
				'size_units' => [ 'px', '%', 'vh', 'vw', 'custom' ],
				'default' => [
					'size' => '0',
				],
				'selectors' => [
					'{{WRAPPER}} .te-img-position-v2' => 'bottom: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'image_v2_offset_orientation_v' => 'end',
					'image_v2_position!' => '',
				],
			]
		);
		$this->add_responsive_control(
			'image_v2_z_index',
			[
				'label' => esc_html__( 'Z-Index', 'financer' ),
				'type' => Controls_Manager::NUMBER,
				'selectors' => [
					'{{WRAPPER}} .te-img-position-v2' => 'z-index: {{VALUE}};',
				],
				'condition' => [
					'image_v2_position!' => '',
				],
			]
		);	
		$this->add_responsive_control(
			'image_v2_offset_opacity',
			[
				'label' => __( 'Opacity', 'cleanex' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .te-img-position_v2' => 'opacity: {{SIZE}}{{UNIT}};'
				],
				'condition' => [
					'image_v2_position!' => '',
				],
			]
		);	
		$this->end_controls_section();
		
		
		/**Image V3 Icon Style**/
		$this->start_controls_section(
			'image_v3_position_style',
			[
				'label' => esc_html__('Image 3 Position Setting', 'financer'),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition'   => [
					'layout_control' => '5'
				]
			]
		);		
		$this->add_control(
			'image_v3_position',
			[
				'label' => esc_html__( 'Position', 'financer' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => esc_html__( 'Default', 'financer' ),
					'absolute' => esc_html__( 'Absolute', 'financer' ),
					'fixed' => esc_html__( 'Fixed', 'financer' ),
				],
				'selectors' => [
					'{{WRAPPER}} .te-img-position-v3' => 'position: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);		
		$this->add_responsive_control(
			'image_v3_offset_width_size',
			[
				'label' => __( 'Width', 'cleanex' ),
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
					'{{WRAPPER}} .te-img-position-v3' => 'width: {{SIZE}}{{UNIT}};'
				],
				'condition' => [
					'image_v2_position!' => '',
				],
			]
		);
		$this->add_responsive_control(
			'image_v3_offset_height_size',
			[
				'label' => __( 'Height', 'cleanex' ),
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
					'{{WRAPPER}} .te-img-position-v3' => 'height: {{SIZE}}{{UNIT}};'
				],
				'condition' => [
					'image_v2_position!' => '',
				],
			]
		);		
		$this->add_control(
			'image_v3_offset_orientation_h',
			[
				'label' => esc_html__( 'Horizontal Orientation', 'financer' ),
				'type' => Controls_Manager::CHOOSE,
				'toggle' => false,
				'default' => 'end',
				'options' => [
					'start' => [
						'title' => 'left',
						'icon' => 'eicon-h-align-left',
					],
					'end' => [
						'title' => 'right',
						'icon' => 'eicon-h-align-right',
					],
				],
				'classes' => 'financer-control-start-end',
				'render_type' => 'ui',
				'condition' => [
					'image_v3_position!' => '',
				],
			]
		);		
		$this->add_responsive_control(
			'image_v3_offset_x',
			[
				'label' => esc_html__( 'Offset', 'financer' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => -200,
						'max' => 200,
					],
					'vw' => [
						'min' => -200,
						'max' => 200,
					],
					'vh' => [
						'min' => -200,
						'max' => 200,
					],
				],
				'default' => [
					'size' => '0',
				],
				'size_units' => [ 'px', '%', 'vw', 'vh', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .te-img-position-v3' => 'left: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'image_v3_offset_orientation_h!' => 'end',
					'image_v3_position!' => '',
				],
			]
		);		
		$this->add_responsive_control(
			'image_v3_offset_x_end',
			[
				'label' => esc_html__( 'Offset', 'financer' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
						'step' => 0.1,
					],
					'%' => [
						'min' => -200,
						'max' => 200,
					],
					'vw' => [
						'min' => -200,
						'max' => 200,
					],
					'vh' => [
						'min' => -200,
						'max' => 200,
					],
				],
				'default' => [
					'size' => '0',
				],
				'size_units' => [ 'px', '%', 'vw', 'vh', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .te-img-position-v3' => 'right: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'image_v3_offset_orientation_h' => 'end',
					'image_v3_position!' => '',
				],
			]
		);		
		$this->add_control(
			'image_v3_offset_orientation_v',
			[
				'label' => esc_html__( 'Vertical Orientation', 'financer' ),
				'type' => Controls_Manager::CHOOSE,
				'toggle' => false,
				'default' => 'start',
				'options' => [
					'start' => [
						'title' => esc_html__( 'Top', 'financer' ),
						'icon' => 'eicon-v-align-top',
					],
					'end' => [
						'title' => esc_html__( 'Bottom', 'financer' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'render_type' => 'ui',
				'condition' => [
					'image_v3_position!' => '',
				],
			]
		);
		$this->add_responsive_control(
			'image_v3_offset_y',
			[
				'label' => esc_html__( 'Offset', 'financer' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => -200,
						'max' => 200,
					],
					'vh' => [
						'min' => -200,
						'max' => 200,
					],
					'vw' => [
						'min' => -200,
						'max' => 200,
					],
				],
				'size_units' => [ 'px', '%', 'vh', 'vw', 'custom' ],
				'default' => [
					'size' => '0',
				],
				'selectors' => [
					'{{WRAPPER}} .te-img-position-v3' => 'top: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'image_v3_offset_orientation_v!' => 'end',
					'image_v3_position!' => '',
				],
			]
		);
		$this->add_responsive_control(
			'image_v3_offset_y_end',
			[
				'label' => esc_html__( 'Offset', 'financer' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => -200,
						'max' => 200,
					],
					'vh' => [
						'min' => -200,
						'max' => 200,
					],
					'vw' => [
						'min' => -200,
						'max' => 200,
					],
				],
				'size_units' => [ 'px', '%', 'vh', 'vw', 'custom' ],
				'default' => [
					'size' => '0',
				],
				'selectors' => [
					'{{WRAPPER}} .te-img-position-v3' => 'bottom: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'image_v3_offset_orientation_v' => 'end',
					'image_v3_position!' => '',
				],
			]
		);
		$this->add_responsive_control(
			'image_v3_z_index',
			[
				'label' => esc_html__( 'Z-Index', 'financer' ),
				'type' => Controls_Manager::NUMBER,
				'selectors' => [
					'{{WRAPPER}} .te-img-position-v3' => 'z-index: {{VALUE}};',
				],
				'condition' => [
					'image_v3_position!' => '',
				],
			]
		);
		$this->add_responsive_control(
			'image_v3_offset_opacity',
			[
				'label' => __( 'Opacity', 'cleanex' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .te-img-position_v3' => 'opacity: {{SIZE}}{{UNIT}};'
				],
				'condition' => [
					'image_v3_position!' => '',
				],
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
	?>
	
	<?php if($settings['layout_control'] == '4') :?>
	
    <!-- Work Process Section -->
    <section class="work_process_section p-0 m-0">
        <div class="credit_card float-bob-y te-img-position"><img src="<?php echo esc_url(wp_get_attachment_url($settings['image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'financer'); ?>"></div>
        <div class="master_card float-bob-y te-img-position-v2"><img src="<?php echo esc_url(wp_get_attachment_url($settings['image_v2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'financer'); ?>"></div>
    </section>
    
	<?php elseif($settings['layout_control'] == '3') :?>
	<!-- Feature Section Two -->
	<section class="feature_section_two p-0 m-0">
	    <div class="star_shape rotate-me te-img-position"><img src="<?php echo esc_url(wp_get_attachment_url($settings['image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'financer'); ?>"></div>
    </section>
	
	<?php elseif($settings['layout_control'] == '2') :?>
	
    <!-- Why Choose Us Section Style Two -->
    <section class="why_choose_us p-0 m-0">
        <div class="mouse_pointer float-bob-y te-img-position"><img src="<?php echo esc_url(wp_get_attachment_url($settings['image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'financer'); ?>"></div>
    </section>
    
	<?php else: ?>   
    
    <!-- Team Section -->
    <section class="team_section p-0 m-0 animation-style">
        <div class="shape_one float-bob-x te-img-position" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['image']['id'])); ?>);"></div>
    </section>
        
    <?php endif;
	}
}