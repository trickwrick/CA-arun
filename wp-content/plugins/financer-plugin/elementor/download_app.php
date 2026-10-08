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
class Download_App extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'financer_download_app';
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
		return esc_html__( 'Financer Download App', 'financer' );
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
			'download_app',
			[
				'label' => esc_html__( 'Financer Download App', 'financer' ),
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
				'condition'   => [ 'show_shape_image' => 'yes' ]
			]
		);
				
		//Title
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'financer' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'default' => esc_html__( 'Download Banking App', 'financer' ),
			]
		);
		//Text
		$this->add_control(
			'text',
			[
				'label'       => __( 'Text', 'financer' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'default' => esc_html__( 'Upgrade to a seamless user experience that delivers a 360-degree view of household accounts for the advisor and client and supports more collaborative engagements.', 'financer' ),
			]
		);
		//App Store Info
		$this->add_control(
			'app_store_image',
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
			'app_store_link',
			[
				'label' => __( 'App Store Link', 'financer' ),
				'type' => Controls_Manager::URL,
				'label_block' => true, 
				'placeholder' => __( 'https://your-link.com', 'financer' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);
		//Google Play Info
		$this->add_control(
			'google_play_image',
			[
				'label' => esc_html__( 'Choose Google Play Image', 'financer' ),
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
			'google_play_link',
			[
				'label' => __( 'Google Play Link', 'financer' ),
				'type' => Controls_Manager::URL,
				'label_block' => true, 
				'placeholder' => __( 'https://your-link.com', 'financer' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);
		//Mobile Image
		$this->add_control(
			'mobile_img',
			[
				'label' => esc_html__( 'Choose Mobile Image', 'financer' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
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
                    '{{WRAPPER}} .app_section' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
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
                    '{{WRAPPER}} .app_section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
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
					'{{WRAPPER}} .app_outer_box',				
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
	
	<!-- App Section -->
    <section class="app_section">
        <?php if($settings['show_shape_image'] == 'yes'){ ?><div class="shape_circle float-bob-y"><img src="<?php echo esc_url(wp_get_attachment_url($settings['shape_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'financer'); ?>"></div><?php } ?>
        <div class="container">
            <div class="app_inner_box">
                <div class="app_outer_box">
                    <div class="shape_one rotate-me"></div>
                    <div class="shape_two float-bob-x"></div>
                    <div class="shape_three"></div>
                    <div class="content_box">
                        <h2><?php echo wp_kses($settings['title'], true); ?></h2>
                        <p><?php echo wp_kses($settings['text'], true); ?></p>
                    </div>            
                    
					<?php if($settings['app_store_image'] || $settings['google_play_image']){ ?>
                    <div class="app_links">
                        <?php if($settings['app_store_image']){ ?><div class="apple_link"><a href="<?php echo esc_url($settings['app_store_link']['url']); ?>"><img src="<?php echo esc_url(wp_get_attachment_url($settings['app_store_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'financer'); ?>"></a></div><?php } ?>
                        <?php if($settings['google_play_image']){ ?><div class="play_link"><a href="<?php echo esc_url($settings['google_play_link']['url']); ?>"><img src="<?php echo esc_url(wp_get_attachment_url($settings['google_play_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'financer'); ?>"></a></div><?php } ?>
                    </div>
                    <?php } ?>
                </div>
                
				<?php if($settings['mobile_img']){ ?>
                <div class="app_image float-bob-x"><img src="<?php echo esc_url(wp_get_attachment_url($settings['mobile_img']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'financer'); ?>"></div>
                <?php } ?>
                
            </div>        
        </div>
    </section>
    <!-- App Section End -->
	
    <?php 
	}
}