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
class Pricing_Plan extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'financer_pricing_plan';
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
		return esc_html__( 'Financer Pricing Plan', 'financer' );
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
		return 'eicon-price-table';
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
			'pricing_plan',
			[
				'label' => esc_html__( 'Financer Pricing Plan', 'financer' ),
			]
		);
		
		//BG Image
		$this->add_control(
			'bg_image',
			[
				'label' => esc_html__( 'Choose BG Pattern Image', 'financer' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
			]
		);
		//Title Area
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
				'default' => esc_html__( 'Our Pricing', 'financer' ),
				'condition'   => [ 'show_title_area' => 'yes' ]
			]
		);
		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'financer' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Affordable Pricing Plans', 'financer' ),
				'condition'   => [ 'show_title_area' => 'yes' ]
			]
		);
		
		//Pricing Tabs Repeater
		$repeater = new Repeater();
		$repeater->add_control(
			'plan_title',
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
		//Text	
		$repeater->add_control(
			'plan_text',
			[
				'label'       => __( 'Text', 'financer' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'financer' ),
			]
		);
		$repeater->add_control(
			'price',
			[
				'label'       => __( 'Price', 'financer' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Price', 'financer' ),
			]
		);
		$repeater->add_control(
			'duration',
			[
				'label'       => __( 'Duration', 'financer' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Duration', 'financer' ),
			]
		);
		//Feature List	
		$repeater->add_control(
			'features_list',
			[
				'label'       => __( 'Feature List', 'financer' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Feature List', 'financer' ),
			]
		);
		//ButTon
		$repeater->add_control(
			'btn_title',
			[
				'label'       => __( 'Button Title', 'financer' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'default' => esc_html__( 'Select This Package', 'financer' ),
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
				'type'    => Controls_Manager::SELECT2,
				'default' => 'extranal',
				'options' => financer_page_list(),
				'condition'   => [
					'link_option' => 'page'
				]
			]
		);
		$this->add_control(
			'price_table',
			[
				'label'                 => __('Add Pricing Item', 'financer'),
				'type'                  => Controls_Manager::REPEATER,
				'fields'                => $repeater->get_controls(),
				'title_field' => '{{{ plan_title }}}',
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
	
	<!-- Pricing Section -->
    <section class="pricing_section">
        <?php if($settings['bg_image']){ ?>
        <div class="shape_bg rotate-me"></div>
        <div class="shape_six float-bob-y"><img src="<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'financer'); ?>"></div>
        <?php } ?>
        <div class="container">
            <?php if($settings['show_title_area'] == 'yes'){ ?>
            <div class="section_title centred">
                <?php if($settings['subtitle']){ ?><div class="tag_text"><h6><?php echo wp_kses($settings['subtitle'], true); ?></h6></div><?php } ?>
                <?php if($settings['title']){ ?><h2><?php echo wp_kses($settings['title'], true); ?></h2><?php } ?>
            </div>
            <?php } ?>
            <div class="row">
            	<?php 
					foreach($settings['price_table'] as $key => $items){
						
					$page = $items['link_option'];
					$page_select = $items[ 'page_select' ];
					$ext_url = $items[ 'link' ];
					
					if( $page == 'page' ){
						$mount_link = get_page_link( $page_select );
					}else{
						$mount_link = $ext_url['url'];
						$target = $ext_url['is_external'] ? ' target="_blank"' : '';
						$nofollow = $ext_url['nofollow'] ? ' rel="nofollow"' : '';
					}	
				?>
                <div class="col-lg-4 col-md-6 col-sm-12 pricing_block">
                    <div class="pricing_block_one aos-init aos-animate" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500">
                        <div class="pricing_table">
                            <div class="table_header">
                                <h5><?php echo wp_kses($items['plan_title'], true); ?></h5>
                                <p><?php echo wp_kses($items['plan_text'], true); ?></p>
                                <div class="rate"><?php echo wp_kses($items['price'], true); ?> <span><?php echo wp_kses($items['duration'], true); ?></span></div>
                            </div>
                            <div class="table_content">
                                <?php 
									$features_list = $items['features_list'];
								    if(!empty($features_list)){
									$features_list = explode("\n", ($features_list)); 
								?>
                                <ul class="feature_list">
                                    <?php foreach($features_list as $features): ?>
                                    <li>
                                        <?php echo wp_kses($features, true); ?>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                                <?php } ?>
                                <?php if($items['btn_title']){ ?>
                                <div class="link_btn">
                                    <a href="<?php echo esc_url( $mount_link );?>" <?php if( $page == 'extranal' ) echo esc_attr( $target );?> <?php if( $page == 'extranal' ) echo esc_attr( $nofollow );?> class="btn_style_two"><span><?php echo wp_kses($items['btn_title'], true);?></span></a>
                                </div>
                                <?php } ?>                  
                            </div>
                        </div>
                    </div>
                </div>
           		<?php } ?>     
            </div>
        </div>
    </section>
    <!-- Pricing Section End -->
 
    <?php
	}
}