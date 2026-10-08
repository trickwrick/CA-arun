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
class Subscribe_Form extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'financer_subscribe_form';
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
        return esc_html__( 'Financer Subscribe Form', 'financer' );
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
        return 'eicon-site-search';
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
            'subscribe_form',
            [
                'label' => esc_html__( 'Financer Subscribe Form', 'financer' ),
            ]
        );
		//Banner Image
		$this->add_control(
			'cta_image_url',
			[
				'label' => esc_html__('Choose Feature Image Url ', 'financer'),							
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		//Shape Vector Image
		$this->add_control(
			'shape_vector_image',
			[
				'label' => esc_html__('Choose Vector Image Url ', 'financer'),							
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		//Title
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'financer' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title Here', 'financer' ),
			]
		);
		//mailchimp_form_url	
		$this->add_control(
			'mailchimp_form_url',
			[
				'label'       => __( 'Mailchimp Form Url', 'financer' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Mailchimp Form Url', 'financer' ),
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
    
    <!-- Cta Section -->
    <section class="cta_section aos-init aos-animate" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500">
        <div class="container">
            <div class="cta_inner">
                <?php if($settings['title']){ ?><h3><?php echo wp_kses($settings['title'], true); ?></h3><?php } ?>
                
				<?php if($settings['mailchimp_form_url']){ ?>
                <div class="subscribe-inner">
                    <div class="subscribe-form">
						<?php echo do_shortcode($settings['mailchimp_form_url']);?>
                    </div>
                </div>
                <?php } ?>
                
				<?php if($settings['shape_vector_image']){ ?>
                <div class="cta_shape float-bob-y"><img src="<?php echo esc_url(wp_get_attachment_url($settings['shape_vector_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'financer'); ?>"></div>
                <?php } ?>
                
                <?php if($settings['cta_image_url']){ ?>
                <div class="cta_image">
                    <figure>
                        <img src="<?php echo esc_url(wp_get_attachment_url($settings['cta_image_url']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'financer'); ?>">
                    </figure>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- Cta Section End -->
      
    <?php
    }
}
