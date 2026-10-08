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
class Banner extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'financer_banner';
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
        return esc_html__( 'Financer Banner', 'financer' );
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
	
	/**
     * Register button widget controls.
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since  1.0.0
     * @access protected
     */
    protected function register_controls() {
        $this->start_controls_section(
            'banner',
            [
                'label' => esc_html__( 'Financer Banner', 'financer' ),
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
					'5' => esc_html__( 'Style Five ', 'financer'),
				),
			]
		);
		
		//BG Image	
		$this->add_control(
			'bg_image',
			[
				'label' => esc_html__('Choose BG Image', 'financer'),							
				'type' => Controls_Manager::MEDIA,							
				'default' => ['url' => Utils::get_placeholder_image_src(),],
				'condition'   => [ 
					'layout_control' => '5',
				]
			]
		);
		
		//Shape Image Switcher
		$this->add_control(
            'show_card_image',
            [
                'label'        => esc_html__( 'Enable Cards Image', 'financer' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'On', 'financer' ),
                'label_off'    => esc_html__( 'Off', 'financer' ),
                'return_value' => 'yes',
                'default'      => 'no',
				'condition'   => [ 
					'layout_control' => '4' 
				]
            ]
        );
		$this->add_control(
			'card_image_v1',
			[
				'label' => esc_html__( 'Choose Card Image V1', 'financer' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'condition'   => [ 
					'layout_control' => '4',
					'show_card_image' => 'yes' 
				]
			]
		);
		$this->add_control(
			'card_image_v2',
			[
				'label' => esc_html__( 'Choose Card Image V2', 'financer' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'condition'   => [ 
					'layout_control' => '4',
					'show_card_image' => 'yes' 
				]
			]
		);
		
		$this->add_control(
            'show_vector_img',
            [
                'label'        => esc_html__( 'Enable Banner Vector', 'financer' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'On', 'financer' ),
                'label_off'    => esc_html__( 'Off', 'financer' ),
                'return_value' => 'yes',
                'default'      => 'no',
				'condition'   => [ 
					'layout_control' => '1' 
				]
            ]
        );
		//Vector Image		
		$this->add_control(
			'vector_img_v1',
			[
				'label' => esc_html__('Choose Vector Image V1', 'financer'),							
				'type' => Controls_Manager::MEDIA,							
				'default' => ['url' => Utils::get_placeholder_image_src(),],
				'condition'   => [ 
					'layout_control' => '1',
					'show_vector_img' => 'yes' 
				]
			]
		);
		//Vector Image V2	
		$this->add_control(
			'vector_img_v2',
			[
				'label' => esc_html__('Choose Vector Image V2', 'financer'),							
				'type' => Controls_Manager::MEDIA,							
				'default' => ['url' => Utils::get_placeholder_image_src(),],
				'condition'   => [ 
					'layout_control' => '1',
					'show_vector_img' => 'yes' 
				]
			]
		);
		//Vector Image V3		
		$this->add_control(
			'vector_img_v3',
			[
				'label' => esc_html__('Choose Vector Image V3', 'financer'),							
				'type' => Controls_Manager::MEDIA,							
				'default' => ['url' => Utils::get_placeholder_image_src(),],
				'condition'   => [ 
					'layout_control' => '1',
					'show_vector_img' => 'yes' 
				]
			]
		);
		$this->add_control(
			'subtitle',
			[
				'label'       => __( 'Sub Title', 'financer' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'default' => esc_html__( 'Consultant', 'financer' ),
				'condition'   => [ 
					'layout_control' => ['1','2','3','4'] 
				]
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'financer' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'default' => esc_html__( 'Smarter Investing,Brilliantly Spending', 'financer' ),
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
				'placeholder' => __( 'Enter your Desription', 'financer' ),
			]
		);
		$this->add_control(
			'mailchimp_form_url',
			[
				'label'       => __( 'MailChimp Form Url', 'financer' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your MailChimp Form Url', 'financer' ),
				'condition'   => [ 
					'layout_control' => ['1','2','3','4'] 
				]
			]
		);
		//Show Author Info
		$this->add_control(
            'show_author_info',
            [
                'label'        => esc_html__( 'Enable Author Info', 'financer' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'On', 'financer' ),
                'label_off'    => esc_html__( 'Off', 'financer' ),
                'return_value' => 'yes',
                'default'      => 'no',
				'condition'   => [ 
					'layout_control' => ['3','4','5'] 
				]
            ]
        );
		//Author Image V1		
		$this->add_control(
			'author_image_v1',
			[
				'label' => esc_html__('Choose Author Image V1', 'financer'),							
				'type' => Controls_Manager::MEDIA,							
				'default' => ['url' => Utils::get_placeholder_image_src(),],
				'condition'   => [ 
					'layout_control' => ['3','4','5'],
					'show_author_info' => 'yes' 
				]
			]
		);
		//Vector Image V2	
		$this->add_control(
			'author_image_v2',
			[
				'label' => esc_html__('Choose Author Image V2', 'financer'),							
				'type' => Controls_Manager::MEDIA,							
				'default' => ['url' => Utils::get_placeholder_image_src(),],
				'condition'   => [ 
					'layout_control' => ['3','4','5'],
					'show_author_info' => 'yes' 
				]
			]
		);
		//Vector Image V3		
		$this->add_control(
			'author_image_v3',
			[
				'label' => esc_html__('Choose Author Image V3', 'financer'),							
				'type' => Controls_Manager::MEDIA,							
				'default' => ['url' => Utils::get_placeholder_image_src(),],
				'condition'   => [ 
					'layout_control' => ['3','4','5'],
					'show_author_info' => 'yes' 
				]
			]
		);
		$this->add_control(
			'total_user',
			[
				'label'       => __( 'Total User', 'financer' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'default' => esc_html__( '4K+', 'financer' ),
				'condition'   => [ 
					'layout_control' => ['3','4','5'],
					'show_author_info' => 'yes' 
				]
			]
		);
		$this->add_control(
			'user_text',
			[
				'label'       => __( 'User text', 'financer' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'default' => esc_html__( 'users worldwide', 'financer' ),
				'condition'   => [ 
					'layout_control' => ['3','4','5'],
					'show_author_info' => 'yes' 
				]
			]
		);
		
		//Repeater
		$repeater = new Repeater();
		$repeater->add_control(
			'icon_img',
			[
				'label' => esc_html__('Choose Icon Image Url', 'financer'),							
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$repeater->add_control(
			'icon_title',
			[
				'label'       => __( 'Title', 'financer' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'default' => esc_html__( 'Send', 'financer' ),
			]
		);		
		$this->add_control(
			'icon_info',
			[
				'label'                 => __('Add Icon Box Item', 'financer'),
				'type'                  => Controls_Manager::REPEATER,
				'fields'                => $repeater->get_controls(),
				'title_field' => '{{{ icon_title }}}',
				'condition'   => [ 
					'layout_control' => '3', 
				]
			]
		);		
		
		//Currency Info
		$this->add_control(
			'currency_coin_img',
			[
				'label' => esc_html__('Choose Currency Icon Image Url', 'financer'),							
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
				'condition'   => [ 
					'layout_control' => '3', 
				]
			]
		);
		$this->add_control(
			'balance_title',
			[
				'label'       => __( 'Balance Title', 'financer' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'default' => esc_html__( 'Your balance', 'financer' ),
				'condition'   => [ 
					'layout_control' => '3', 
				]
			]
		);
		$this->add_control(
			'total_balance',
			[
				'label'       => __( 'Total Balance', 'financer' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'default' => esc_html__( '$7,065.00', 'financer' ),
				'condition'   => [ 
					'layout_control' => '3', 
				]
			]
		);
		$this->add_control(
			'wallet_title',
			[
				'label'       => __( 'Wallet Title', 'financer' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'default' => esc_html__( 'Wallet', 'financer' ),
				'condition'   => [ 
					'layout_control' => '3', 
				]
			]
		);
		$this->add_control(
			'wallet_link',
			[
				'label' => __( 'Wallet Link', 'financer' ),
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
					'layout_control' => '3', 
				]
			]
		);
		
		//Income Info
		$this->add_control(
			'income_title',
			[
				'label'       => __( 'Income Title', 'financer' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'default' => esc_html__( 'Total Income', 'financer' ),
				'condition'   => [ 
					'layout_control' => ['1','2','3']
				]
			]
		);
		$this->add_control(
			'total_income',
			[
				'label'       => __( 'Total Income', 'financer' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'default' => esc_html__( '$ 18532.52', 'financer' ),
				'condition'   => [ 
					'layout_control' => ['1','2','3']
				]
			]
		);
		$this->add_control(
			'total_percentage',
			[
				'label'       => __( 'Total Percentage', 'financer' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'default' => esc_html__( '+11%', 'financer' ),
				'condition'   => [ 
					'layout_control' => ['1','2','3']
				]
			]
		);
		//Feature Image	
		$this->add_control(
			'feature_img',
			[
				'label' => esc_html__('Choose Feature Image', 'financer'),							
				'type' => Controls_Manager::MEDIA,							
				'default' => ['url' => Utils::get_placeholder_image_src(),],
				'condition'   => [ 
					'layout_control' => ['1','2','3'], 
				]
			]
		);
		//Feature Image	V2
		$this->add_control(
			'feature_img_v2',
			[
				'label' => esc_html__('Choose Feature Image V2', 'financer'),							
				'type' => Controls_Manager::MEDIA,							
				'default' => ['url' => Utils::get_placeholder_image_src(),],
				'condition'   => [ 
					'layout_control' => '2', 
				]
			]
		);
		//Chart Image	
		$this->add_control(
			'chart_img',
			[
				'label' => esc_html__('Choose Chart Image', 'financer'),							
				'type' => Controls_Manager::MEDIA,							
				'default' => ['url' => Utils::get_placeholder_image_src(),],
				'condition'   => [ 
					'layout_control' => ['1','2'] 
				]
			]
		);
		//Shape	V2
		$this->add_control(
			'shape_image',
			[
				'label' => esc_html__('Choose Shape Image', 'financer'),							
				'type' => Controls_Manager::MEDIA,							
				'default' => ['url' => Utils::get_placeholder_image_src(),],
				'condition'   => [ 
					'layout_control' => ['2','3','4'] 
				]
			]
		);
		//Buttion Info
		$this->add_control(
			'btn_title',
			[
				'label'       => __( 'Button Title', 'financer' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Button Title Here', 'financer' ),
				'condition'   => [ 
					'layout_control' => ['5'],
				]
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
					'page' => esc_html__( 'Page ', 'financer'),
				),
				'condition'   => [ 
					'layout_control' => ['5'],
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
					'layout_control' => ['5'],
					'link_option' => 'extranal'
				]
			]
		);		
		$this->add_control(
			'page_select',
			[
				'label'   => esc_html__( 'Select Page', 'financer' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT2,
				'default' => 'extranal',
				'options' => financer_page_list(),
				'condition'   => [
					'layout_control' => ['5'],
					'link_option' => 'page'
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
                    '{{WRAPPER}} .financer-banner-section' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
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
                    '{{WRAPPER}} .financer-banner-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
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
					'{{WRAPPER}} .financer-banner-section',				
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
		//$icon = $settings['icon'];
	?>
    
	<?php if($settings['layout_control'] == '5') : 
		
		$page = $settings['link_option'];
		$page_select = $settings[ 'page_select' ];
		$ext_url = $settings[ 'link' ];
		
		if( $page == 'page' ){
			$mount_link = get_page_link( $page_select );
		}else{
			$mount_link = $ext_url['url'];
			$target = $ext_url['is_external'] ? ' target="_blank"' : '';
			$nofollow = $ext_url['nofollow'] ? ' rel="nofollow"' : '';
		}
	?>
	
	<!-- Banner Style Two -->
    <section class="banner_style_five">
        <?php if($settings['bg_image']){ ?><div class="bg_layer" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>);"></div><?php } ?>
        <div class="container">
            <div class="banner_content aos-init aos-animate" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="500">
                <h1 class="te-title"><?php echo wp_kses($settings['title'], true);?></h1>
                <p class="te-text"><?php echo wp_kses($settings['text'], true);?></p>
                <div class="banner_btn_area">
                    <div class="link_btn"><a href="<?php echo esc_url( $mount_link );?>" <?php if( $page == 'extranal' ) echo esc_attr( $target );?> <?php if( $page == 'extranal' ) echo esc_attr( $nofollow );?>><?php echo wp_kses($settings['btn_title'], true);?></a></div>
                    <?php if($settings['show_author_info'] == 'yes'){ ?>
                    <div class="banner_author_box">
                        <div class="author_image_box">
                            <?php if($settings['author_image_v1']){ ?>
                            <div class="author_image">
                                <img src="<?php echo esc_url(wp_get_attachment_url($settings['author_image_v1']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','financer'); ?>">
                            </div>
                            <?php } ?>
                            <?php if($settings['author_image_v2']){ ?>
                            <div class="author_image">
                                <img src="<?php echo esc_url(wp_get_attachment_url($settings['author_image_v2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','financer'); ?>">
                            </div>
                            <?php } ?>
                            <?php if($settings['author_image_v3']){ ?>
                            <div class="author_image">
                                <img src="<?php echo esc_url(wp_get_attachment_url($settings['author_image_v3']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','financer'); ?>">
                            </div>
                            <?php } ?>
                        </div>
                        <div class="author_content">
                            <h4><?php echo wp_kses($settings['total_user'], true);?></h4>
                            <span><?php echo wp_kses($settings['user_text'], true);?></span>
                        </div>
                    </div>
                    <?php } ?>
                </div>            
            </div>
        </div>
    </section>
    <!-- Banner Style Two End -->
	
	<?php elseif($settings['layout_control'] == '4') : ?>
    
    <!-- Banner Style Two -->
    <section class="banner_style_four">
        <?php if($settings['show_card_image'] == 'yes'){ ?>
        <?php if($settings['card_image_v1']){ ?><div class="master_card float-bob-y"><img src="<?php echo esc_url(wp_get_attachment_url($settings['card_image_v1']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','financer'); ?>"></div><?php } ?>
        <?php if($settings['card_image_v2']){ ?><div class="credit_card float-bob-y"><img src="<?php echo esc_url(wp_get_attachment_url($settings['card_image_v2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','financer'); ?>"></div><?php } ?>
        <?php } ?>
        
        <div class="container">
            <div class="banner_content centred">
                <?php if($settings['shape_image']){ ?>
                <div class="shape_icon_13 float-bob-x"><img src="<?php echo esc_url(wp_get_attachment_url($settings['shape_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','financer'); ?>"></div>
                <?php } ?>
                
                <div class="tag_text"><h6 class="te-subtitle"><?php echo wp_kses($settings['subtitle'], true);?></h6></div>
                <h1 class="te-title"><?php echo wp_kses($settings['title'], true);?></h1>
                <p class="te-text"><?php echo wp_kses($settings['text'], true);?></p>
                
                <div class="subscribe-inner">
                    <div class="subscribe-form">
						<?php echo do_shortcode($settings['mailchimp_form_url']);?>
                    </div>
                </div>
                <?php if($settings['show_author_info'] == 'yes'){ ?>
                <div class="banner_author_box">
                    <div class="author_image_box">
                        <?php if($settings['author_image_v1']){ ?>
                        <div class="author_image">
                            <img src="<?php echo esc_url(wp_get_attachment_url($settings['author_image_v1']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','financer'); ?>">
                        </div>
                        <?php } ?>
                        <?php if($settings['author_image_v2']){ ?>
                        <div class="author_image">
                            <img src="<?php echo esc_url(wp_get_attachment_url($settings['author_image_v2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','financer'); ?>">
                        </div>
                        <?php } ?>
                        <?php if($settings['author_image_v3']){ ?>
                        <div class="author_image">
                            <img src="<?php echo esc_url(wp_get_attachment_url($settings['author_image_v3']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','financer'); ?>">
                        </div>
                        <?php } ?>
                    </div>
                    <div class="author_content">
                        <h4><?php echo wp_kses($settings['total_user'], true);?></h4>
                        <span><?php echo wp_kses($settings['user_text'], true);?></span>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- Banner Style Two End -->
    
	<?php elseif($settings['layout_control'] == '3') : ?>
	
	<!-- Banner Style Two -->
    <section class="banner_style_three">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="banner_content aos-init aos-animate" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="500">
                        <div class="tag_text"><h6 class="te-subtitle"><?php echo wp_kses($settings['subtitle'], true);?></h6></div>
                        <h1 class="te-title"><?php echo wp_kses($settings['title'], true);?></h1>
                        <p class="te-text"><?php echo wp_kses($settings['text'], true);?></p>
                        <div class="subscribe-inner">
                            <div class="subscribe-form">
								<?php echo do_shortcode($settings['mailchimp_form_url']);?>
                            </div>
                        </div>
                        <?php if($settings['show_author_info'] == 'yes'){ ?>
                        <div class="banner_author_box">
                            <div class="author_image_box">
                                <?php if($settings['author_image_v1']){ ?>
                                <div class="author_image">
                                    <img src="<?php echo esc_url(wp_get_attachment_url($settings['author_image_v1']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','financer'); ?>">
                                </div>
                                <?php } ?>
                                <?php if($settings['author_image_v2']){ ?>
                                <div class="author_image">
                                    <img src="<?php echo esc_url(wp_get_attachment_url($settings['author_image_v2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','financer'); ?>">
                                </div>
                                <?php } ?>
                                <?php if($settings['author_image_v3']){ ?>
                                <div class="author_image">
                                    <img src="<?php echo esc_url(wp_get_attachment_url($settings['author_image_v3']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','financer'); ?>">
                                </div>
                                <?php } ?>
                            </div>
                            <div class="author_content">
                                <h4><?php echo wp_kses($settings['total_user'], true);?></h4>
                                <span><?php echo wp_kses($settings['user_text'], true);?></span>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="banner_left_image aos-init aos-animate" data-aos="fade-left" data-aos-easing="linear" data-aos-duration="500">                    
                        <?php if($settings['shape_image']){ ?><div class="shape_image float-bob-x"><img src="<?php echo esc_url(wp_get_attachment_url($settings['shape_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','financer'); ?>"></div><?php } ?>
                        <div class="share_icon_box">
                            <?php 
                				foreach($settings['icon_info'] as $key => $item){
							?>
                            <div class="icon_box float-bob-x <?php if($key == 2) echo 'more_box'; elseif($key == 1) echo 'request_box'; else echo 'send_box'; ?>">
                                <div class="icon"><img src="<?php echo esc_url(wp_get_attachment_url($item['icon_img']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','financer'); ?>"></div>
                                <span><?php echo wp_kses($item['icon_title'], true);?></span>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="banner_image_four">
                            <img src="<?php echo esc_url(wp_get_attachment_url($settings['feature_img']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','financer'); ?>">
                        </div>
                        <div class="currency_box float-bob-y">
                            <div class="currency_coin">
                                <img src="<?php echo esc_url(wp_get_attachment_url($settings['currency_coin_img']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','financer'); ?>">
                            </div>
                            <div class="currency_info">
                                <div class="main_balance">
                                    <span><?php echo wp_kses($settings['balance_title'], true);?></span>
                                    <h6><?php echo wp_kses($settings['total_balance'], true);?> <a href="#"><i class="fa fa-angle-right"></i></a></h6>
                                </div>
                                <div class="wallet_box">
                                    <div class="icon"><i class="icon-26"></i></div>                                
                                    <h6><?php echo wp_kses($settings['wallet_title'], true);?> <a href="<?php echo esc_url($settings['wallet_link']['url']);?>"><i class="fa fa-angle-right"></i></a></h6>
                                </div>
                            </div>
                        </div>
                        <div class="income_chart float-bob-y">
                            <div class="title_box">
                                <h6><?php echo wp_kses($settings['income_title'], true);?></h6>
                                <div class="rate"><?php echo wp_kses($settings['total_income'], true);?></div>
                            </div>
                            <div class="percentage"><i class="fa fa-solid fa-arrow-trend-up"></i> <?php echo wp_kses($settings['total_percentage'], true);?></div>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </section>
    <!-- Banner Style Two End -->

	<?php elseif($settings['layout_control'] == '2') : ?>
    
    <!-- Banner Style Two -->
    <section class="banner_style_two">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="banner_content aos-init aos-animate" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="500">
                        <div class="tag_text"><h6 class="te-subtitle"><?php echo wp_kses($settings['subtitle'], true);?></h6></div>
                        <h1 class="te-title"><?php echo wp_kses($settings['title'], true);?></h1>
                        <p class="te-text"><?php echo wp_kses($settings['text'], true);?></p>
                        <div class="subscribe-inner">
                            <div class="subscribe-form">
								<?php echo do_shortcode($settings['mailchimp_form_url']);?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="banner_left_image aos-init aos-animate" data-aos="fade-left" data-aos-easing="linear" data-aos-duration="500">                    
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 clomun">
                                
                                <div class="chart_box float-bob-y">
                                    <div class="tranding_icon"><i class="icon-29"></i></div>
                                    <div class="shape_four"><img src="<?php echo esc_url(wp_get_attachment_url($settings['shape_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','financer'); ?>"></div>
                                    <div class="chart_image"><img src="<?php echo esc_url(wp_get_attachment_url($settings['chart_img']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','financer'); ?>"></div>
                                </div>
                                
                                <div class="income_chart float-bob-y">
                                    <div class="title_box">
                                        <h6><?php echo wp_kses($settings['income_title'], true);?></h6>
                                        <div class="rate"><?php echo wp_kses($settings['total_income'], true);?></div>
                                    </div>
                                    <div class="percentage"><i class="fa fa-solid fa-arrow-trend-up"></i> <?php echo wp_kses($settings['total_percentage'], true);?></div>
                                </div>
                                
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 clomun">
                                <div class="banner_image_two">
                                    <img src="<?php echo esc_url(wp_get_attachment_url($settings['feature_img']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','financer'); ?>">
                                </div>
                                <div class="banner_image_three">
                                    <img src="<?php echo esc_url(wp_get_attachment_url($settings['feature_img_v2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','financer'); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </section>
    <!-- Banner Style Two End -->
    
    <?php else: ?>
    
    <!-- Banner Style One -->
    <section class="banner_style_one financer-banner-section">
        <?php if($settings['show_vector_img'] = 'yes'){ ?>
        <?php if($settings['vector_img_v1']){ ?><div class="shape_one float-bob-x" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['vector_img_v1']['id'])); ?>);"></div><?php } ?>
        <?php if($settings['vector_img_v2']){ ?><div class="shape_two float-bob-y" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['vector_img_v2']['id'])); ?>);"></div><?php } ?>
        <?php } ?>
        <div class="container">
            <div class="banner_content">
                <div class="tag_text"><h6 class="te-subtitle"><?php echo wp_kses($settings['subtitle'], true);?></h6></div>
                <h1 class="te-title"><?php echo wp_kses($settings['title'], true);?></h1>
                <p class="te-text"><?php echo wp_kses($settings['text'], true);?></p>
                
                <div class="subscribe-inner">
                    <div class="subscribe-form">
                        <?php echo do_shortcode($settings['mailchimp_form_url']);?>
                    </div>
                </div>
                
                <div class="income_chart float-bob-y">
                    <div class="title_box">
                        <h6><?php echo wp_kses($settings['income_title'], true);?></h6>
                        <div class="rate"><?php echo wp_kses($settings['total_income'], true);?></div>
                    </div>
                    <div class="percentage"><i class="fa fa-solid fa-arrow-trend-up"></i> <?php echo wp_kses($settings['total_percentage'], true);?></div>
                </div>
                
                <?php if($settings['feature_img']){ ?>
                <div class="banner_image">
                    <img src="<?php echo esc_url(wp_get_attachment_url($settings['feature_img']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','financer'); ?>">
                </div>
                <?php } ?>
                <div class="shape_three"></div>
                <?php if($settings['chart_img']){ ?><div class="shape_four float-bob-x"><img src="<?php echo esc_url(wp_get_attachment_url($settings['chart_img']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','financer'); ?>"></div><?php } ?>
                <?php if($settings['show_vector_img'] = 'yes'){ ?>
                <?php if($settings['vector_img_v3']){ ?><div class="shape_five rotate-me"><img src="<?php echo esc_url(wp_get_attachment_url($settings['vector_img_v3']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','financer'); ?>"></div><?php } ?>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- Banner Style One End -->
    
    <?php endif; ?> 
      
    <?php
    }
}
