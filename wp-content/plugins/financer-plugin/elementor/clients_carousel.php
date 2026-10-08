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
class Clients_Carousel extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'financer_clients_carousel';
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
        return esc_html__( 'Financer Clients Carousel', 'financer' );
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
        return 'eicon-banner';
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
	
	public function get_script_depends() {
		wp_register_script( 'partner-slider', YT_URL . 'assets/js/client-carousel.js', [ 'elementor-frontend' ], '1.0.0', true );
		return [ 'partner-slider' ];
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
            'client_carousel',
            [
                'label' => esc_html__( 'Financer Clients Carousel', 'financer' ),
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
				'condition'   => [ 'layout_control' => '2' ]
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
				'condition'   => [ 
					'layout_control' => '2',
					'show_shape_image' => 'yes' 
				]
			]
		);
		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'financer' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__( 'The choice of 150+ financial companies, banks & fintech unicorns', 'financer' ),
				'condition'   => [ 'layout_control' => '2' ]
			]
		);
		
		//Services Repeater
		$repeater = new Repeater();
		$repeater->add_control(
			'client_image',
			[
				'label' => esc_html__('Choose Client Image Url', 'financer'),							
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$repeater->add_control(
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
		$repeater->add_control(
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
		$repeater->add_control(
			'page_select',
			[
				'label'   => esc_html__( 'Select Page', 'financer' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'extranal',
				'options' => financer_page_list(),
				'condition'   => [
					'link_option' => 'page'
				]
			]
		);		
		$this->add_control(
			'clients',
			[
				'label'                 => __('Add Client Item', 'financer'),
				'type'                  => Controls_Manager::REPEATER,
				'fields'                => $repeater->get_controls(),
			]
		);		
		$this->end_controls_section();
		
		
		/**Carousel Setting Start**/
		$this->start_controls_section(
			'carousel',
			[
				'label' => esc_html__( 'Carousel Setting', 'financer' ),
			]
		);
		$this->add_control(
			'loop',
			[
				'label' => __( 'infinite Loop?', 'financer' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'financer' ),
				'label_off' => __( 'Hide', 'financer' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_responsive_control(
			'items_show',
			[
				'label' => esc_html__( 'No. of Items', 'financer' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'default' => 3,
			]
		);
		$this->add_responsive_control(
			'image_item_gap',
			[
				'label' => __( 'Item Gap', 'financer' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'default' => 30,
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
                    '{{WRAPPER}} .financer-client-section' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
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
                    '{{WRAPPER}} .financer-client-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
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
					'{{WRAPPER}} .financer-client-section',				
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
		$layout = $settings['layout_control'];
		
		$items_show = $settings[ 'items_show' ];
		$image_item_gap = $settings[ 'image_item_gap' ];
		
		if($settings['loop'] == 'yes'){
			$loop = "true";
		}else{
			$loop = "false";
		}	
		
		$changed_atts = array(
			'loop'       		=> $loop,
			'spacebetween'		=> $image_item_gap,
			'slidesperview' 	=> $items_show,
		);
		
		if( $slider_atts = 'data-client-slider');
				
		$this->add_render_attribute( 'slider_settings', $slider_atts , wp_json_encode( $changed_atts ) );
    ?>
	
    <?php if($layout == '2') :?>
    
    <!-- Clients Section -->
    <section class="clients-section style_three financer-client-section aos-init aos-animate" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="500">
        <?php if($settings['show_shape_image'] == 'yes'){ ?>
        <div class="shape_icon float-bob-x"><img src="<?php echo esc_url(wp_get_attachment_url($settings['shape_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'financer'); ?>"></div>
        <?php } ?>
        
		<?php if($settings['title']){ ?><div class="content_title"><?php echo wp_kses($settings['title'], true);  ?></div><?php } ?>
        <div class="container">
            <div class="five-item-carousel owl-carousel owl-theme owl-dots-none owl-nav-none" <?php $this->print_render_attribute_string( 'slider_settings' ); ?>>
                <?php 
					foreach($settings['clients'] as $key => $item):
					
					$page = $item['link_option'];
					$page_select = $item[ 'page_select' ];
					$ext_url = $item[ 'link' ];
					
					if( $page == 'page' ){
						$mount_link = get_page_link( $page_select );
					}else{
						$mount_link = $ext_url['url'];
						$target = $ext_url['is_external'] ? ' target="_blank"' : '';
						$nofollow = $ext_url['nofollow'] ? ' rel="nofollow"' : '';
					}
				?>
                <div class="clients_block_one style_three">
                    <a href="<?php echo esc_url( $mount_link );?>" <?php if( $page == 'extranal' ) echo esc_attr( $target );?> <?php if( $page == 'extranal' ) echo esc_attr( $nofollow );?>><img src="<?php echo esc_url(wp_get_attachment_url($item['client_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'mincore'); ?>" /></a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- Clients Section End -->
    
    <?php else: ?>
    
    <div class="financer-client-section">
        <div class="five-item-carousel owl-carousel owl-theme owl-dots-none owl-nav-none" <?php $this->print_render_attribute_string( 'slider_settings' ); ?>>
            <?php 
                foreach($settings['clients'] as $key => $item):
                
                $page = $item['link_option'];
                $page_select = $item[ 'page_select' ];
                $ext_url = $item[ 'link' ];
                
                if( $page == 'page' ){
                    $mount_link = get_page_link( $page_select );
                }else{
                    $mount_link = $ext_url['url'];
                    $target = $ext_url['is_external'] ? ' target="_blank"' : '';
                    $nofollow = $ext_url['nofollow'] ? ' rel="nofollow"' : '';
                }
            ?>
            <div class="clients_block_one">
                <a href="<?php echo esc_url( $mount_link );?>" <?php if( $page == 'extranal' ) echo esc_attr( $target );?> <?php if( $page == 'extranal' ) echo esc_attr( $nofollow );?>><img src="<?php echo esc_url(wp_get_attachment_url($item['client_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'mincore'); ?>" /></a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
	<?php endif; ?> 
      
    <?php
    }
}
