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
class Video_Section extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'financer_video_section';
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
        return esc_html__( 'Financer Video Section', 'financer' );
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
        return 'eicon-video-playlist';
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
            'video_icon',
            [
                'label' => esc_html__( 'Financer Video Icon', 'financer' ),
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
		
		//Video Image
		$this->add_control(
			'video_img',
			[
				'label' => esc_html__('Choose Video Image Url ', 'financer'),							
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		//Video Link Option			
		$this->add_control(
			'video_option',
			[
				'label' => __( 'Select Video Type', 'financer' ),
				'label_block' => true, 
				'type' => Controls_Manager::SELECT,
				'default' => 'src_url',
				'options' => array(
					'src_url'       => esc_html__( 'Source URL', 'financer' ),
					'src_media'      => esc_html__( 'Source Media', 'financer' ),
				),
			]
		);
		$this->add_control(
            'video_link',
			[
				'label' => __( 'Video Source Url', 'financer' ),
				'type' => Controls_Manager::URL,
				'label_block' => true, 
				'placeholder' => __( 'https://your-link.com', 'financer' ),
				'show_external' => true,
				'default' => [
					'url' => '',
				],
				'condition' => [
					'video_option'      => 'src_url'
				],
			]
		);
		$this->add_control(
			'video_source_image',
			[
				'label' => __( 'Video Source Media', 'financer' ),
				'type' => Controls_Manager::MEDIA,
				'media_types' => ['video'],
				'condition' => [
					'video_option'      => 'src_media'
				],
			]
		);
		//Title
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'financer' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'default' => esc_html__( 'Services', 'financer' ),
				'condition'   => [ 
					'layout_control' => '2',
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
                    '{{WRAPPER}} .financer-play-section' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
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
                    '{{WRAPPER}} .financer-play-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
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
					'{{WRAPPER}} .financer-play-section',				
			]
		);
		$this->end_controls_section();	
		
		/**Video Button Style**/
		$this->start_controls_section(
			'video_button_style',
			[
				'label' => esc_html__('Video Button Style Setting', 'financer'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs( 'financer_tabs_video_btn' );
		
			$this->start_controls_tab(
				'financer_tab_video_btn_normal',
				[
					'label' => __( 'Normal', 'financer' ),
				]
			);
				$this->add_responsive_control(
					'video_btn_width_size',
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
							'{{WRAPPER}} .te-video-icon' => 'width: {{SIZE}}{{UNIT}};',
						],
					]
				);
				$this->add_responsive_control(
					'video_btn_height_size',
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
							'{{WRAPPER}} .te-video-icon' => 'height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				$this->add_responsive_control(
					'video_btn_margin',
					[
						'label'              => __( 'Margin', 'financer' ),
						'type'               => Controls_Manager::DIMENSIONS,
						'size_units'         => [ 'px', 'em', '%' ],
						'selectors'          => [
							'{{WRAPPER}} .te-video-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
						],
						
						'frontend_available' => true,
					]
				);
				$this->add_responsive_control(
					'video_btn_padding',
					[
						'label'              => __( 'Padding', 'financer' ),
						'type'               => Controls_Manager::DIMENSIONS,
						'size_units'         => [ 'px', 'em', '%' ],
						'selectors'          => [
							'{{WRAPPER}} .te-video-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
						],
						
						'frontend_available' => true,
					]
				);
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'video_btn_border_type',
						'selector' => 
							'{{WRAPPER}} .te-video-icon',				
						'separator' => 'before',
					]
				);
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'video_btn_border_box_shadow',
						'selector' => 
							'{{WRAPPER}} .te-video-icon',				
						'separator' => 'before',
					]
				);
				$this->add_control(
					'video_btn_border_radius',
					[
						'label' => esc_html__('Border Radius', 'financer'),
						'type' => Controls_Manager::DIMENSIONS,
						'separator' => 'before',
						'size_units' => ['px'],
						'selectors' => [
							'{{WRAPPER}} .te-video-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
						],
					]
				);
				$this->add_responsive_control(
					'video_btn_icon_size',
					[
						'label' => __( 'Icon Font Size', 'financer' ),
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
							'{{WRAPPER}} .te-video-icon .icon_box' => 'font-size: {{SIZE}}{{UNIT}};',
						],
					]
				);
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'video_btn_bg_color',
						'label' => __( 'Button Background Color', 'financer' ),
						'types' => [ 'classic', 'gradient' ],
						'selector' => 
							'{{WRAPPER}} .te-video-icon',				
					]
				);
				$this->add_control(
					'video_btn_icon_color',
					[
						'label' => __('Video Button Icon Color', 'financer'),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .te-video-icon .icon_box' => 'color: {{VALUE}}!important',
						],
						'separator' => 'before',
					]
				);
			$this->end_controls_tab();
			
			$this->start_controls_tab(
				'financer_tab_video_btn_hover',
				[
					'label' => __( 'Hover', 'financer' ),
				]
			);
			
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'video_btn_hover_bg_bgtype',
						'label' => __( 'Button Hover Background', 'financer' ),
						'types' => [ 'classic', 'gradient' ],
						'selector' => 
							'{{WRAPPER}} .te-video-icon:hover,
							 {{WRAPPER}} .te-video-icon:hover .icon_box:before',				
					]
				);
				$this->add_control(
					'video_btn_icon_hover_color',
					[
						'label' => __('Video Icon Hover Color', 'financer'),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .te-video-icon:hover .icon_box' => 'color: {{VALUE}} !important',
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
		
		$video_option = $settings[ 'video_option' ];
		if( $video_option == 'src_url' ){
			$video = $settings[ 'video_link' ][ 'url' ];
		}elseif( $video_option == 'src_media' ){
			$video = $settings[ 'video_source_image' ]['url'];
		}else{
			$video = esc_html__( 'There is no Video', 'financer' );
		}
	?>
    
	<?php if($settings['layout_control'] == '2') :?>
    
    <!-- Video Section -->
    <section class="video_section financer-play-section" <?php if($settings['video_img']){ ?>style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['video_img']['id'])); ?>);"<?php } ?>>
        <div class="container-fulid">
            <div class="video_inner">
                <a href="<?php echo esc_url( $video );?>" class="lightbox-image te-video-icon" data-caption=""><div class="icon_box"><i class="icon-38"></i></div></a>
                <h1 class="section_tag"><?php echo wp_kses($settings['title'], 'true'); ?></h1>
            </div>
        </div>
    </section>
    <!-- Video Section End -->
    
	<?php else: ?>
    
    <div class="video_box aos-init aos-animate financer-play-section" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="600" <?php if($settings['video_img']){ ?>style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['video_img']['id'])); ?>);"<?php } ?>>
        <?php if($video){ ?><a href="<?php echo esc_url( $video );?>" class="lightbox-image te-video-icon" data-caption=""><div class="icon_box"><i class="icon-38"></i></div></a><?php } ?>
    </div>
       
    <?php endif;
    }
}