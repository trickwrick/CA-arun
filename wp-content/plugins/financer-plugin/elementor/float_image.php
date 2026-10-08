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
use \Elementor\Group_Control_Text_Stroke;
use Elementor\Plugin;

/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class Float_Image extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'financer_float_image';
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
		return esc_html__( 'Financer Float Image', 'financer' );
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
		return 'eicon-image-hotspot';
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
			'float_image',
			[
				'label' => esc_html__( 'Financer Float Image', 'financer' ),
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
		//Icon Switcher
		$this->add_control(
            'show_icon',
            [
                'label'        => esc_html__( 'Enable Icon Box', 'financer' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'On', 'financer' ),
                'label_off'    => esc_html__( 'Off', 'financer' ),
                'return_value' => 'yes',
                'default'      => 'no',
				'condition'   => [
					'layout_control' => '1',
				]
            ]
        );		
		//Feature Image		
		$this->add_control(
			'feature_img',
			[
				'label' => esc_html__('Choose Image URL', 'financer'),							
				'type' => Controls_Manager::MEDIA,							
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		//Author Image		
		$this->add_control(
			'author_img',
			[
				'label' => esc_html__('Choose Author Image URL', 'financer'),							
				'type' => Controls_Manager::MEDIA,							
				'default' => ['url' => Utils::get_placeholder_image_src(),],
				'condition'   => [ 'layout_control' => '2' ]
			]
		);
		$this->add_control(
			'author_title',
			[
				'label'       => __( 'Author Title', 'financer' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'default' => esc_html__( 'Received!', 'financer' ),
				'condition'   => [ 'layout_control' => '2' ]
			]
		);
		//Shape Image		
		$this->add_control(
			'shape_img',
			[
				'label' => esc_html__('Choose Shape Image URL', 'financer'),							
				'type' => Controls_Manager::MEDIA,							
				'default' => ['url' => Utils::get_placeholder_image_src(),],
				'condition'   => [ 'layout_control' => ['2','3'] ]
			]
		);
		$this->add_control(
			'goal_value',
			[
				'label'       => __( 'Goal Value', 'financer' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'default' => esc_html__( '$10,500.00', 'financer' ),
				'condition'   => [ 'layout_control' => '3' ]
			]
		);
		$this->add_control(
			'monthly_title',
			[
				'label'       => __( 'Monthly Title', 'financer' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'default' => esc_html__( 'Monthly Goal', 'financer' ),
				'condition'   => [ 'layout_control' => '3' ]
			]
		);
		//Payment Description
		$this->add_control(
			'payment_information',
			[
				'label'       => __( 'Payment Description', 'financer' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'default' => esc_html__( 'You just sent $50.00 to Jenifer Lopez', 'financer' ),
				'condition'   => [ 'layout_control' => '2' ]
			]
		);
		//Chart Image		
		$this->add_control(
			'chart_img',
			[
				'label' => esc_html__('Choose Chart Image URL', 'financer'),							
				'type' => Controls_Manager::MEDIA,							
				'default' => ['url' => Utils::get_placeholder_image_src(),],
				'condition'   => [ 'layout_control' => '1' ]
			]
		);
		//Goal Title
		$this->add_control(
			'goal_title',
			[
				'label'       => __( 'Goal Title', 'financer' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'default' => esc_html__( 'Quarter goal', 'financer' ),
				'condition'   => [ 'layout_control' => '3' ]
			]
		);
		//Bar Value
		$this->add_control(
			'fill_bar_value',
			[
				'label'       => __( 'Fil Bar Value', 'financer' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'default' => esc_html__( '84', 'financer' ),
				'condition'   => [ 'layout_control' => '3' ]
			]
		);
		//Goal BTN Title
		$this->add_control(
			'goal_btn_title',
			[
				'label'       => __( 'Goal Button Title', 'financer' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'default' => esc_html__( 'All goals', 'financer' ),
				'condition'   => [ 'layout_control' => '3' ]
			]
		);
		$this->add_control(
			'goal_btn_link',
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
				'condition'   => [ 'layout_control' => '3' ]
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
		$layout = $settings[ 'layout_control' ];
	?>
	<?php if( $layout === '3' ): ?>
    
    <div class="about_left_image_four aos-init aos-animate" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="500">
        <div class="goal_box">
            <h6><?php echo wp_kses($settings['goal_title'], true)?></h6>
            <div class="progress">
                <div class="barOverflow">
                  <div class="bar"></div>
                </div>
                <div class="persent"><span><?php echo wp_kses($settings['fill_bar_value'], true)?></span><?php esc_html_e('%','financer'); ?></div>
            </div>
            <div class="goal_links"><a href="<?php echo esc_url($settings['goal_btn_link']['url'])?>"><?php echo wp_kses($settings['goal_btn_title'], true)?> <i class="icon-34"></i></a></div>
        </div>
        <?php if($settings['feature_img']){ ?>
        <figure>
            <img src="<?php echo esc_url(wp_get_attachment_url($settings['feature_img']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','financer');?>">
        </figure>
        <?php } ?>
        <div class="meter_box">
            <?php if($settings['shape_img']){ ?><img src="<?php echo esc_url(wp_get_attachment_url($settings['shape_img']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','financer');?>"><?php } ?>
            <h6><?php echo wp_kses($settings['goal_value'], true)?></h6>
            <span><?php echo wp_kses($settings['monthly_title'], true)?></span>
        </div>
    </div>
    
	<?php elseif( $layout === '2' ): ?>
	
    <div class="about_left_image aos-init aos-animate" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="500">
        <div class="author_box float-bob-y">
            <?php if($settings['author_img']){ ?>
            <div class="author_image">
                <img src="<?php echo esc_url(wp_get_attachment_url($settings['author_img']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','financer');?>">
            </div>
            <?php } ?>
            
			<?php if($settings['author_title']){ ?>
            <div class="author_content">
                <h6><?php echo wp_kses($settings['author_title'], true)?></h6>
            </div>
            <?php } ?>
            
			<?php if($settings['shape_img']){ ?>
            <div class="circle_green"></div>
            <div class="shape_eight"><img src="<?php echo esc_url(wp_get_attachment_url($settings['shape_img']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','financer');?>"></div>
            <?php } ?>
        </div>
        <div class="tranding_icon rotate-me"><i class="icon-29"></i></div>
        
		<?php if($settings['feature_img']){ ?>
        <figure>
            <img src="<?php echo esc_url(wp_get_attachment_url($settings['feature_img']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','financer');?>">
        </figure>
        <?php } ?>
        
        <?php if($settings['payment_information']){ ?>
        <div class="received_payment float-bob-y">
            <div class="circle_red"></div>
            <div class="icon_box">
                <i class="fa fa-solid fa-check"></i>
            </div>
            <h6><?php echo wp_kses($settings['payment_information'], true)?></h6>
        </div>
        <?php } ?>
    </div>
    
    <?php else: ?>
    
    <div class="feature_image_block aos-init aos-animate" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500">
        <?php if( $settings['show_icon'] == 'yes' ){ ?>
        <div class="icon_box_one float-bob-y"><i class="icon-44"></i></div>
        <div class="icon_box_two float-bob-y"><i class="icon-29"></i></div>
        <?php } ?>
        
		<?php if($settings['feature_img']){ ?>
        <div class="feture_image">
            <img src="<?php echo esc_url(wp_get_attachment_url($settings['feature_img']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','financer');?>">
        </div>
        <?php } ?> 
        
        <?php if($settings['chart_img']){ ?>            
        <div class="chart_image_five float-bob-x">
            <img src="<?php echo esc_url(wp_get_attachment_url($settings['chart_img']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','financer');?>">
        </div>
        <?php } ?>
    </div>
    
    <?php endif;
	}
}