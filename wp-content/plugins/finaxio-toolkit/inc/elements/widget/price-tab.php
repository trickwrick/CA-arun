<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit;

class Price_Tab_Finaxio extends Widget_Base
{
    public function get_name()
    {
        return 'price_tab_finaxio';
    }

    public function get_title()
    {
        return esc_html__('Price Tab - Finaxio', 'finaxio-toolkit');
    }

    public function get_icon()
    {
        return 'eicon-gallery-grid';
    }

    public function get_categories()
    {
        return ['finaxio-toolkit'];
    }

    public function get_keywords()
    {
        return ['finaxio', 'Toolkit', 'price', 'tab', 'table'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Section Content', 'finaxio-toolkit'),
            ]
        );

        $this->add_control(
            'head_monthly',
            [
                'label' => esc_html__('Monthly Template', 'finaxio-toolkit'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'content_one',
            [
                'label' => esc_html__('Monthly Button', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Monthly', 'finaxio-toolkit'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'select_monthly',
            [
                'label' => __('Select Monthly', 'finaxio-toolkit'),
                'type' => Controls_Manager::SELECT2,
                'options' => finaxio_template_builder(),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'head_yearly',
            [
                'label' => esc_html__('Yearly Template', 'finaxio-toolkit'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'content_two',
            [
                'label' => esc_html__('Yearly Button', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Yearly', 'finaxio-toolkit'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'select_yearly',
            [
                'label' => __('Select Yearly', 'finaxio-toolkit'),
                'type' => Controls_Manager::SELECT2,
                'options' => finaxio_template_builder(),
                'label_block' => true,
            ]
        );



        $this->end_controls_section();

        $this->start_controls_section(
            'blog_style',
            [
                'label' => esc_html__('Style', 'finaxio-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'price_align',
            [
                'label' => esc_html__('Alignment', 'finaxio-toolkit'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'start' => [
                        'title' => esc_html__('Left', 'finaxio-toolkit'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'finaxio-toolkit'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'end' => [
                        'title' => esc_html__('Right', 'finaxio-toolkit'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .pricing__area-button' => 'justify-content: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'price_item_space',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Button Margin', 'finaxio-toolkit'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .pricing__area-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'heade_info',
            [
                'label' => esc_html__('Button Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->start_controls_tabs(
            'style_tabs'
        );

        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => esc_html__('Normal', 'finaxio-toolkit'),
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => esc_html__('Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing__area-button .nav-item button' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_background_color',
            [
                'label' => esc_html__('Background', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing__area-button .nav-item button' => 'background: {{VALUE}}',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'button_border_color',
            [
                'label' => esc_html__('Border Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing__area-button .nav-item button' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__('Active', 'finaxio-toolkit'),
            ]
        );

        $this->add_control(
            'btn_hover_text_color',
            [
                'label' => esc_html__('Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing__area-button .nav-item .active' => 'color: {{VALUE}}',
                ],
            ]
        );



        $this->add_control(
            'btn_hover_background_color',
            [
                'label' => esc_html__('Background', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing__area-button .nav-item .active' => 'background: {{VALUE}}',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'btn_hover_border_color',
            [
                'label' => esc_html__('Border Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing__area-button .nav-item .active' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();


        $this->end_controls_section();

    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();

        ?>

        <div class="pricing__area-button">
            <ul class="nav nav-pills">
                <li class="nav-item"><button class="active" data-bs-toggle="pill" data-bs-target="#monthly">
                        <?php echo esc_html($settings['content_one']); ?>
                    </button>
                </li>
                <li class="nav-item" role="presentation"><button data-bs-toggle="pill" data-bs-target="#yearly">
                        <?php echo esc_html($settings['content_two']); ?>
                    </button>
                </li>
            </ul>
        </div>


        <div class="tab-content">
            <div class="tab-pane fade show active" id="monthly">
                <?php
                if (!empty($settings['select_monthly'])) {
                    // The plugin's function to get the content of the selected custom template
                    echo Plugin::$instance->frontend->get_builder_content($settings['select_monthly'], true);
                } else {
                    // If no custom template is selected
                    echo 'Please select a template.';
                }
                ?>
            </div>
            <div class="tab-pane fade" id="yearly">
                <?php
                if (!empty($settings['select_yearly'])) {
                    // The plugin's function to get the content of the selected custom template
                    echo Plugin::$instance->frontend->get_builder_content($settings['select_yearly'], true);
                } else {
                    // If no custom template is selected
                    echo 'Please select a template.';
                }
                ?>
            </div>
        </div>


        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Price_Tab_Finaxio);