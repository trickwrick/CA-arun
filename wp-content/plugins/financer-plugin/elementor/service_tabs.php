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
class Service_Tabs extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'financer_service_tabs';
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
		return esc_html__( 'Financer Service Tabs', 'financer' );
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
			'service_tabs',
			[
				'label' => esc_html__( 'Financer Service Tabs', 'financer' ),
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
            ]
        );
		$this->add_control(
			'subtitle',
			[
				'label' => esc_html__( 'Small Title', 'financer' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Our Services', 'financer' ),
				'condition'   => [ 'show_title_area' => 'yes' ]
			]
		);
		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'financer' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Solutions we Provide', 'financer' ),
				'condition'   => [ 'show_title_area' => 'yes' ]
			]
		);
		
		
		//Service Tabs Repeater
		$repeater = new Repeater();
		$repeater->add_control(
			'tab_title',
			[
				'label'       => __( 'Title', 'financer' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'financer' ),
			]
		);
		$repeater->add_control(
			'tab_text',
			[
				'label'       => __( 'Description', 'financer' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Description', 'financer' ),
			]
		);
		$repeater->add_control(
			'icon',
			[
				'label' => esc_html__('Enter The icons', 'financer'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'icon-17',
					'library' => 'solid',
				],
			]			
		);
		$repeater->add_control(
			'tab_title_v1',
			[
				'label'       => __( 'Sub Heading', 'financer' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'default' => esc_html__( 'Acquire, Manage And Grow', 'financer' ),
			]
		);
		$repeater->add_control(
			'tab_text_v1',
			[
				'label'       => __( 'Description', 'financer' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Description', 'financer' ),
			]
		);
		
		$repeater->add_control(
			'icon_v2',
			[
				'label' => esc_html__('Enter The icons', 'financer'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'icon-18',
					'library' => 'solid',
				],
			]			
		);
		$repeater->add_control(
			'tab_title_v2',
			[
				'label'       => __( 'Sub Heading', 'financer' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'default' => esc_html__( 'Acquire, Manage And Grow', 'financer' ),
			]
		);
		$repeater->add_control(
			'tab_text_v2',
			[
				'label'       => __( 'Description', 'financer' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Description', 'financer' ),
			]
		);
		$repeater->add_control(
			'feature_image',
			[
				'label' => esc_html__( 'Choose Feature Image', 'financer' ),
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
			'tabs',
			[
				'label'                 => __('Add Tabs Item', 'financer'),
				'type'                  => Controls_Manager::REPEATER,
				'fields'                => $repeater->get_controls(),
				'title_field' => '{{{ tab_title }}}',
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
                    '{{WRAPPER}} .service_style_one' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
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
                    '{{WRAPPER}} .service_style_one' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
                ],
				'frontend_available' => true,				
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
	
	<?php if($settings['layout_control'] == '2') :?>
	
    
	<?php else: ?>   
    
    <!-- Service Style One -->
    <section class="service_style_one aos-init aos-animate" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="500">
        <?php if($settings['show_shape_image'] == 'yes'){ ?>
        <div class="shape_icon_nine rotate-me"><img src="<?php echo esc_url(wp_get_attachment_url($settings['shape_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'financer'); ?>"></div>
        <?php } ?>
         <div class="container">
            
			<?php if($settings['show_title_area'] == 'yes'){ ?>
            <div class="section_title centred">
                <?php if($settings[ 'subtitle' ]){ ?><div class="tag_text"><h6><?php echo wp_kses( $settings[ 'subtitle' ], true );?></h6></div><?php } ?>
                <?php if($settings[ 'title' ]){ ?><h2><?php echo wp_kses( $settings[ 'title' ], true );?></h2><?php } ?>
            </div>
            <?php } ?>
            
            <div class="nav nav-tabs">
                <?php foreach( $settings[ 'tabs' ] as $key => $item ){ ?>
                <a class="nav-link <?php if($key  ==  0) echo 'active'; ?>" data-bs-toggle="tab" href="#tab<?php echo esc_attr($key); ?>"><?php echo wp_kses( $item[ 'tab_title' ], true );?></a>
                <?php } ?>
            </div> 
                   
            <div class="tab-content">
                <?php 
                    foreach( $settings[ 'tabs' ] as $key => $item ){ 
                    $icon = $item['icon'];
                    $icon_v2 = $item['icon_v2'];
                ?>
                <div class="tab-pane fade <?php if($key  == 0) echo 'show active'; ?>" id="tab<?php echo esc_attr($key); ?>">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12 col-sm-12 content_column">
                            <div class="content_box mr_70">
                                <h3><?php echo wp_kses( $item[ 'tab_title' ], true );?></h3>
                                <p><?php echo wp_kses( $item[ 'tab_text' ], true );?></p>
                                
                                <div class="content_item_one">
                                    <?php if($icon){ ?>
                                    <div class="icon_box">
                                    <?php
                                        $icon = str_replace( "flat ",  "",  $item['icon']);
                                        if( !empty( $icon ) ):?>
                                        <?php \Elementor\Icons_Manager::render_icon( $icon ); ?>
                                    <?php else:?>
                                        <i class="icon-17"></i>
                                    <?php endif;?>
                                    </div>
                                    <?php } ?>
                                    <div class="icon_content">
                                        <h4><?php echo wp_kses( $item[ 'tab_title_v1' ], true );?></h4>
                                        <p><?php echo wp_kses( $item[ 'tab_text_v1' ], true );?></p>
                                    </div>
                                </div>
                                
                                <div class="content_item_one">
                                    <?php if($icon_v2){ ?>
                                    <div class="icon_box">
                                    <?php
                                        $icon_v2 = str_replace( "flat ",  "",  $item['icon_v2']);
                                        if( !empty( $icon_v2 ) ):?>
                                        <?php \Elementor\Icons_Manager::render_icon( $icon_v2 ); ?>
                                    <?php else:?>
                                        <i class="icon-18"></i>
                                    <?php endif;?>
                                    </div>
                                    <?php } ?>
                                    <div class="icon_content">
                                        <h4><?php echo wp_kses( $item[ 'tab_title_v2' ], true );?></h4>
                                        <p><?php echo wp_kses( $item[ 'tab_text_v2' ], true );?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 image_column">
                            <figure class="image_box"><img src="<?php echo esc_url(wp_get_attachment_url($item['feature_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'financer'); ?>"></figure>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
    	</div>
    </section>
    <!-- Service Style One End -->
            
    <?php endif;
	}
}