<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit;

class List_Menu_Finaxio extends Widget_Base
{
    public function get_name()
    {
        return 'finaxio-list-menu';
    }

    public function get_title()
    {
        return esc_html__('List Menu - Finaxio', 'finaxio-toolkit');
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
        return ['finaxio', 'Menu', 'Builder', 'Header', 'Custom'];
    }

    protected function register_controls()
    {


        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Custom Menu', 'finaxio-toolkit'),
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

        $this->end_controls_section();

        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Style', 'finaxio-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'menu_color',
            [
                'label' => esc_html__('Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer__two-widget-menu ul li a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'menu_hover_color',
            [
                'label' => esc_html__('Hover Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer__two-widget-menu ul li a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .footer__two-widget-menu ul li a::before' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'menu_height',
            [
                'label' => esc_html__('Menu Space', 'finaxio-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 20,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .footer__two-widget-menu ul li' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
  

        ?>
       <div class="footer__two-widget-menu">
						
						
                <?php wp_nav_menu(
                    array(
                        'menu' => $settings['nav_menu'],
                        'menu_id' => 'mobilemenu',
                        'menu_class' => 'd-block',
                    )
                ); ?>
</div>

        <?php
    }
}

Plugin::instance()->widgets_manager->register(new List_Menu_Finaxio);