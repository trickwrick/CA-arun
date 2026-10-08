<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit;

class Our_FAQ_Finaxio extends Widget_Base
{
    public function get_name()
    {
        return 'faq_finaxio';
    }

    public function get_title()
    {
        return esc_html__('Our FAQ - Finaxio', 'finaxio-toolkit');
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
        return ['finaxio', 'Toolkit', 'toggle', 'accordion', 'faq'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'section_general',
            [
                'label' => esc_html__('Content', 'finaxio-toolkit'),
            ]
        );

        $this->add_control(
            'number',
            [
                'label' => esc_html__('Unique ID', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('01', 'finaxio-toolkit'),
                'label_block' => true,
            ]
        );

        $faqs_item = new Repeater();

        $faqs_item->add_control(
            'faq_title',
            [
                'label' => esc_html__('FAQ Title', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $faqs_item->add_control(
            'faq_description',
            [
                'label' => esc_html__('FAQ Content', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'faq_items',
            [
                'label' => esc_html__('FAQ Items', 'finaxio-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $faqs_item->get_controls(),
                'default' => [
                    [
                        'faq_title' => esc_html__('What is required of a consultant?', 'finaxio-toolkit'),
                        'faq_description' => esc_html__('Proin pretium sem libero, nec aliquet augue lobortis in. Phasellus nibh quam, molestie id est sit amet.', 'finaxio-toolkit'),
                    ],
                    [
                        'faq_title' => esc_html__('Open a Business Bank Account?', 'finaxio-toolkit'),
                        'faq_description' => esc_html__('Proin pretium sem libero, nec aliquet augue lobortis in. Phasellus nibh quam, molestie id est sit amet.', 'finaxio-toolkit'),
                    ],
                    [
                        'faq_title' => esc_html__('How do you prioritize your work?', 'finaxio-toolkit'),
                        'faq_description' => esc_html__('Proin pretium sem libero, nec aliquet augue lobortis in. Phasellus nibh quam, molestie id est sit amet.', 'finaxio-toolkit'),
                    ],
                ],

                'title_field' => '{{{ faq_title }}}',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'faq_section_item_style',
            [
                'label' => esc_html__('Item', 'finaxio-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'faq_background',
            [
                'label' => esc_html__('Background', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq__area-item' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'faq_item_gap',
            [
                'label' => esc_html__('Gap', 'finaxio-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 20,
                ],
                'selectors' => [
                    '{{WRAPPER}} .faq__area-item' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'faq_item_padding',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Padding', 'finaxio-toolkit'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .faq__area-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'faq_item_radius',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Border Radius', 'finaxio-toolkit'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .faq__area-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();        

        $this->start_controls_section(
            'faq_section_title_style',
            [
                'label' => esc_html__('Title', 'finaxio-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'faq_title_typography',
                'selector' => '{{WRAPPER}} .faq__area-item h6',
            ]
        );

        $this->add_control(
            'faq_title_color',
            [
                'label' => esc_html__('Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq__area-item h6' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'faq_item_icon',
            [
                'label' => esc_html__('Icon', 'finaxio-toolkit'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'faq_item_icon_color',
            [
                'label' => esc_html__('Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq__area-item .icon::after' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'faq_item_icon_size',
            [
                'label' => esc_html__('Size', 'finaxio-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 16,
                ],
                'selectors' => [
                    '{{WRAPPER}} .faq__area-item .icon::after' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'faq_section_content_style',
            [
                'label' => esc_html__('Content', 'finaxio-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'faq_content_typography',
                'selector' => '{{WRAPPER}} .faq__area-item-body p',
            ]
        );

        $this->add_control(
            'faq_content_color',
            [
                'label' => esc_html__('Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq__area-item-body p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'item_content_gap',
            [
                'label' => esc_html__('Gap', 'finaxio-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .faq__area-item-body p' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();

        ?>


        <div id="accordionExamplePage<?php echo esc_attr($settings['number']); ?>">
            <?php foreach ($settings['faq_items'] as $keys => $item): ?>
                <div class="faq__area-item">
                    <h6 class="icon page <?php echo $keys === 0 ? '' : 'collapsed'; ?>" data-bs-toggle="collapse"
                        data-bs-target="#collapse<?php echo $keys; ?><?php echo esc_attr($settings['number']); ?>"><?php echo esc_html($item['faq_title']); ?></h6>
                    <div id="collapse<?php echo $keys; ?><?php echo esc_attr($settings['number']); ?>"
                        class="faq__area-item-body collapse <?php echo $keys === 0 ? 'show' : ''; ?> "
                        data-bs-parent="#accordionExamplePage<?php echo esc_attr($settings['number']); ?>">
                        <p>
                            <?php echo esc_html($item['faq_description']); ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Our_FAQ_Finaxio);