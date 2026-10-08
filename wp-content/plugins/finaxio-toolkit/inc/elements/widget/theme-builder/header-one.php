<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit;

class Header_One extends Widget_Base
{
    public function get_name()
    {
        return 'header-one';
    }

    public function get_title()
    {
        return esc_html__('Main Header - finaxio', 'finaxio-toolkit');
    }

    public function get_icon()
    {
        return 'eicon-gallery-grid';
    }

    public function get_categories()
    {
        return ['finaxio-builder'];
    }

    public function get_keywords()
    {
        return ['finaxio', 'Toolkit', 'Header', 'header'];
    }

    protected function register_controls()
    {


        $this->start_controls_section(
            'section_general',
            [
                'label' => esc_html__('Style & Options', 'finaxio-toolkit'),
            ]
        );

        $this->add_control(
            'select_design',
            [
                'label' => esc_html__('Select a Style', 'finaxio-toolkit'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'design-1' => esc_html__('Style 01', 'finaxio-toolkit'),
                    'design-2' => esc_html__('Style 02', 'finaxio-toolkit'),
                    'design-3' => esc_html__('Style 03', 'finaxio-toolkit'),
                ],
                'default' => 'design-1',
                'label_block' => true,
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Header Content', 'finaxio-toolkit'),
            ]
        );


        $this->add_control(
            'heading_logo',
            [
                'label' => esc_html__('Logo', 'finaxio-toolkit'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'logo',
            [
                'label' => esc_html__('Upload a Logo', 'finaxio-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->add_control(
            'heading_nav',
            [
                'label' => esc_html__('Nav Menu', 'finaxio-toolkit'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );



        $this->add_control(
            'nav_menu',
            [
                'label' => __('Select a Menu', 'finaxio-toolkit'),
                'type' => Controls_Manager::SELECT2,
                'options' => finaxio_nav_menu(),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'heading_cta',
            [
                'label' => esc_html__('Button', 'finaxio-toolkit'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'select_design' => ['design-1', 'design-3'],
                ],
            ]
        );

        $this->add_control(
            'cta_enbale',
            [
                'label' => esc_html__('Show Button', 'finaxio-toolkit'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'finaxio-toolkit'),
                'label_off' => esc_html__('No', 'finaxio-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'select_design' => ['design-1', 'design-3'],
                ],
            ]
        );

        $this->add_control(
            'search_enbale',
            [
                'label' => esc_html__('Show Search', 'finaxio-toolkit'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'finaxio-toolkit'),
                'label_off' => esc_html__('No', 'finaxio-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'select_design' => ['design-2'],
                ],
            ]
        );

        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__('Button Text', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Free Consultancy', 'finaxio-toolkit'),
                'label_block' => true,
                'condition' => [
                    'cta_enbale' => ['yes'],
                    'select_design' => ['design-1', 'design-3'],
                ]
            ]
        );

        $this->add_control(
            'btn_url',
            [
                'label' => esc_html__('Button URL', 'finaxio-toolkit'),
                'default' => esc_attr__('https://google.com', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'condition' => [
                    'cta_enbale' => ['yes'],
                    'select_design' => ['design-1', 'design-3'],
                ]
            ]
        );

        $this->add_control(
            'more_options',
            [
                'label' => esc_html__('Offcanvas', 'finaxio-toolkit'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'select_design' => ['design-2'],
                ],
            ]
        );

        $this->add_control(
            'offcanvas_enbale',
            [
                'label' => esc_html__('Show Offcanvas', 'finaxio-toolkit'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'finaxio-toolkit'),
                'label_off' => esc_html__('No', 'finaxio-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'select_design' => ['design-2'],
                ],
            ]
        );


        $this->add_control(
            'select_emplate',
            [
                'label' => __('Select a Template', 'finaxio-toolkit'),
                'type' => Controls_Manager::SELECT2,
                'options' => finaxio_template_builder(),
                'label_block' => true,
                'condition' => [
                    'select_design' => ['design-2'],
                    'offcanvas_enbale' => ['yes'],
                ],
            ]
        );

        $this->add_control(
            'contact_info3',
            [
                'label' => esc_html__('Contact Info', 'finaxio-toolkit'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'select_design' => ['design-3'],
                ],
            ]
        );

        $content = new Repeater();

        $content->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'finaxio-toolkit'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa fa-star',
                    'library' => 'brands',
                ],
            ]
        );

        $content->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $content->add_control(
            'description',
            [
                'label' => esc_html__('Content', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );

        $content->add_control(
            'item_url',
            [
                'label' => esc_html__('Item URL', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );



        $this->add_control(
            'content_items',
            [
                'label' => esc_html__('Contact Items', 'finaxio-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $content->get_controls(),
                'default' => [
                    [
                        'title' => esc_html__('Make a call', 'finaxio-toolkit'),
                        'description' => esc_html__('+985 656 896 56', 'finaxio-toolkit'),
                        'item_url' => esc_attr__('tel:+98565689656', 'finaxio-toolkit'),
                    ],

                    [
                        'title' => esc_html__('Opening hours', 'finaxio-toolkit'),
                        'description' => esc_html__('Mon - Fri : 9Am - 5Pm', 'finaxio-toolkit'),
                        'item_url' => esc_attr__('http://google.com', 'finaxio-toolkit'),
                    ],
                ],

                'title_field' => '{{{ title }}}',
                'condition' => [
                    'select_design' => ['design-3'],
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Style', 'finaxio-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'menu_align',
            [
                'label' => esc_html__('Menu Alignment', 'finaxio-toolkit'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'finaxio-toolkit'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'finaxio-toolkit'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'finaxio-toolkit'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .header__two-menu-bar-main-menu .menu-main-menu-container > ul' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $logo = $settings['logo'];

        ?>
        <?php if ('yes' === $settings['cta_enbale']) {
            $btn_remove = 'col-lg-7';
        } else {
            $btn_remove = 'col-lg-10';
        } ?>
        <?php if ('design-1' === $settings['select_design']): ?>
            <!-- Menu Bar Area Start -->
            <div class="header__two-menu-bar">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-2">
                            <div class="header__two-menu-bar-logo">
                                <a href="/">
                                    <?php
                                    if ($logo['url']) {
                                        if (!empty($logo['alt'])) {
                                            echo '<img src="' . esc_url($logo['url']) . '" alt="' . esc_attr($logo['alt']) . '" />';
                                        } else {
                                            echo '<img src="' . esc_url($logo['url']) . '" alt="' . esc_attr(__('No alt text', 'finaxio-toolkit')) . '" />';
                                        }
                                    }
                                    ?>
                                </a>
                                <div class="responsive-menu"></div>
                            </div>
                        </div>
                        <div class="<?php echo esc_attr($btn_remove); ?>">
                            <div class="header__area-menu-bar-main-menu header__two-menu-bar-main-menu header-meanmenu">
                                <?php wp_nav_menu(
                                    array(
                                        'menu' => $settings['nav_menu'],
                                        'menu_id' => 'mobilemenu',
                                    )
                                ); ?>
                            </div>
                        </div>
                        <?php if ('yes' === $settings['cta_enbale']): ?>
                            <div class="col-lg-3">
                                <div class="header__two-menu-bar-right">
                                    <a class="theme-btn3" href="<?php echo esc_url($settings['btn_url']); ?>">
                                        <?php echo esc_html($settings['btn_text']); ?>
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <!-- Menu Bar Area End -->
        <?php endif; ?>
        <?php if ('design-2' === $settings['select_design']): ?>
            <!-- Header Area Start -->

            <div class="header__area-menu-bar">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-3">
                        <div class="header__area-menu-bar-left">
                            <div class="header__area-menu-bar-left-logo">
                                <a href="/">
                                    <?php
                                    if ($logo['url']) {
                                        if (!empty($logo['alt'])) {
                                            echo '<img src="' . esc_url($logo['url']) . '" alt="' . esc_attr($logo['alt']) . '" />';
                                        } else {
                                            echo '<img src="' . esc_url($logo['url']) . '" alt="' . esc_attr(__('No alt text', 'finaxio-toolkit')) . '" />';
                                        }
                                    }
                                    ?>
                                </a>
                            </div>
                            <div class="responsive-menu"></div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8">
                        <div class="header__area-menu-bar-main-menu header-meanmenu">
                            <?php wp_nav_menu(
                                array(
                                    'menu' => $settings['nav_menu'],
                                    'menu_id' => 'mobilemenu',
                                )
                            ); ?>

                        </div>
                    </div>
                    <div class="col-xl-1 col-lg-1">
                        <div class="header__area-menu-bar-right">
                            <?php if ('yes' === $settings['search_enbale']): ?>
                                <div class="header__area-menu-bar-right-item">
                                    <div class="header__area-menu-bar-right-item-search">
                                        <div class="search">
                                            <span class="header__area-menu-bar-right-item-search-icon open"><i
                                                    class="fal fa-search"></i></span>
                                        </div>
                                        <div class="header__area-menu-bar-right-item-search-box">
                                            <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                                                <input type="search" placeholder="Search Here....." value="<?php the_search_query(); ?>"
                                                    name="s">
                                                <button value="Search" type="submit"><i class="fal fa-search"></i></button>
                                            </form> <span class="header__area-menu-bar-right-item-search-box-icon"><i
                                                    class="fal fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if ('yes' === $settings['offcanvas_enbale']): ?>
                                <div class="header__area-menu-bar-right-item">
                                    <div class="header__area-menu-bar-right-sidebar-popup-icon"><i class="fas fa-bars"></i>
                                    </div>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="header__area-menu-bar-right-sidebar-popup">
                <div class="sidebar-close-btn"><i class="fal fa-times"></i></div>

                <?php
                if (!empty($settings['select_emplate'])) {
                    // The plugin's function to get the content of the selected custom template
                    echo Plugin::$instance->frontend->get_builder_content($settings['select_emplate'], true);
                } else {
                    // If no custom template is selected
                    echo 'Please select a template.';
                }
                ?>

            </div>
            <div class="sidebar-overlay"></div>
            <!-- Header Area End -->
        <?php endif; ?>
        <?php if ('design-3' === $settings['select_design']): ?>

            <!-- Menu Bar Area Start -->
            <div class="header__three-menu-bar">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-3">
                        <div class="header__three-menu-bar-logo">
                            <a href="/">
                                <?php
                                if ($logo['url']) {
                                    if (!empty($logo['alt'])) {
                                        echo '<img src="' . esc_url($logo['url']) . '" alt="' . esc_attr($logo['alt']) . '" />';
                                    } else {
                                        echo '<img src="' . esc_url($logo['url']) . '" alt="' . esc_attr(__('No alt text', 'finaxio-toolkit')) . '" />';
                                    }
                                }
                                ?>
                            </a>
                            <div class="responsive-menu"></div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9">
                        <div class="header__three-menu-bar-info">

                            <?php foreach ($settings['content_items'] as $item): ?>
                                <div class="header__three-menu-bar-info-item">
                                    <div class="header__three-menu-bar-info-item-icon">
                                        <i class="<?php echo esc_attr($item['icon']['value']); ?>"></i>
                                    </div>
                                    <div class="header__three-menu-bar-info-item-content">
                                        <span>
                                            <?php echo esc_html($item['title']); ?>
                                        </span>
                                        <h5><a href="<?php echo esc_url($item['item_url']); ?>"><?php echo esc_html($item['description']); ?></a></h5>
                                    </div>
                                </div>
                            <?php endforeach; ?>


                            <?php if ('yes' === $settings['cta_enbale']): ?>

                                <div class="header__three-menu-bar-info-btn">
                                    <a class="theme-btn4" href="<?php echo esc_url($settings['btn_url']); ?>">
                                        <?php echo esc_html($settings['btn_text']); ?>
                                    </a>
                                </div>

                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="header__three-menu-bar-bottom">
                <div class="row">
                    <div class="col-xl-9 col-lg-9">
                        <div class="header__area-menu-bar-main-menu header__three-menu-bar-bottom-menu header-meanmenu">
                            <?php wp_nav_menu(
                                array(
                                    'menu' => $settings['nav_menu'],
                                    'menu_id' => 'mobilemenu',
                                )
                            ); ?>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3">
                        <div class="header__three-menu-bar-bottom-right">
                            <div class="header__three-menu-bar-bottom-right-search">
                                <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                                    <input type="search" placeholder="Search Here....." value="<?php the_search_query(); ?>"
                                        name="s">
                                    <button value="Search" type="submit"><i class="fal fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Menu Bar Area End -->
        <?php endif; ?>
    <?php
    }
}

Plugin::instance()->widgets_manager->register(new Header_One);