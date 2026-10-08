<?php

namespace Elementor;

use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if (!defined('ABSPATH'))
    exit;

class Services_Finaxio extends Widget_Base
{
    public function get_name()
    {
        return 'services-finaxio';
    }

    public function get_title()
    {
        return esc_html__('Services - Finaxio', 'finaxio-toolkit');
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
        return ['Finaxio', 'Toolkit', 'Services', 'List', 'Item'];
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
                ],
                'default' => 'design-1',
                'label_block' => true,
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Service Content', 'finaxio-toolkit'),
            ]
        );


        $content = new Repeater();

        $content->add_control(
            'icon',
            [
                'label' => esc_html__('Choose Icon', 'finaxio-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
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
            'service_btn',
            [
                'label' => esc_html__('Button', 'finaxio-toolkit'),
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
                'label' => esc_html__('Content Items', 'finaxio-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $content->get_controls(),
                'default' => [
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'title' => esc_html__('Wellness Program', 'finaxio-toolkit'),
                        'description' => esc_html__('Our Specialty Care program..', 'finaxio-toolkit'),
                        'service_btn' => esc_html__('Read More', 'finaxio-toolkit'),
                        'item_url' => esc_attr__('http://google.com', 'finaxio-toolkit'),
                    ],
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'title' => esc_html__('Wellness Program', 'finaxio-toolkit'),
                        'description' => esc_html__('Our Specialty Care program..', 'finaxio-toolkit'),
                        'service_btn' => esc_html__('Read More', 'finaxio-toolkit'),
                        'item_url' => esc_attr__('http://google.com', 'finaxio-toolkit'),
                    ],
                ],

                'title_field' => '{{{ title }}}',
                'condition' => [
                    'select_design' => ['design-1'],
                ],
            ]
        );
        // for style 2 
        $this->start_controls_tabs(
            'item_tabs',
            [
                'condition' => [
                    'select_design' => ['design-2'],
                ],
            ]
        );
        $this->start_controls_tab(
            'item_normal_tab',
            [
                'label' => esc_html__('Normal', 'finaxio-toolkit'),
            ]
        );

        $this->add_control(
            'icon_image',
            [
                'label' => esc_html__('Icon', 'finaxio-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_tab();
        $this->start_controls_tab(
            'item_hover_tab',
            [
                'label' => esc_html__('Hover', 'finaxio-toolkit'),
            ]
        );

        $this->add_control(
            'hover_icon',
            [
                'label' => esc_html__('Hover Icon', 'finaxio-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        //  end tab for style 02
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Services Quality', 'finaxio-toolkit'),
                'label_block' => true,
                'condition' => [
                    'select_design' => ['design-2'],
                ],
            ]
        );

        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__('Button', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Read More', 'finaxio-toolkit'),
                'label_block' => true,
                'condition' => [
                    'select_design' => ['design-2'],
                ],
            ]
        );

        $this->add_control(
            'item_url',
            [
                'label' => esc_html__('Item URL', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_attr__('https://google.com', 'finaxio-toolkit'),
                'label_block' => true,
                'condition' => [
                    'select_design' => ['design-2'],
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'services_item_style',
            [
                'label' => esc_html__('Item', 'finaxio-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'item_background',
            [
                'label' => esc_html__('Background', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__two-item-area' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .services__area-item' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'item_hover_background',
            [
                'label' => esc_html__('Hover Background', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__area-item::after' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'select_design' => ['design-2'],
                ],
            ]
        );

        $this->add_control(
            'item_active_background',
            [
                'label' => esc_html__('Active Background', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__two-item.swiper-slide.swiper-slide-active.services__two-item .services__two-item-area' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'select_design' => ['design-1'],
                ],
            ]
        );

        $this->add_responsive_control(
            'services_item_padding',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Padding', 'finaxio-toolkit'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .services__two-item-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .services__area-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'services_icon_style',
            [
                'label' => esc_html__('Icon', 'finaxio-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'services_icon_color',
            [
                'label' => esc_html__('Border Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__two-item-area-icon' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .services__area-item-content::after' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'services_hover_icon',
            [
                'label' => esc_html__('Hover Border Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__one-item:hover .services__one-item-content-icon i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .services__area-item:hover .services__area-item-content::after' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'select_design' => ['design-2'],
                ],
            ]
        );

        $this->add_control(
            'services_icon_background',
            [
                'label' => esc_html__('Background', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__two-item.swiper-slide.swiper-slide-active.services__two-item .services__two-item-area-icon' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .services__two-item.swiper-slide.swiper-slide-active.services__two-item .services__two-item-area-icon::after' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'select_design' => ['design-1'],
                ],
            ]
        );

        $this->add_responsive_control(
            'services_icon_size',
            [
                'label' => esc_html__('Gap', 'finaxio-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .services__two-item-area-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .services__area-item-content' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'services_content_style',
            [
                'label' => esc_html__('Content', 'finaxio-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'services_title',
            [
                'label' => esc_html__('Title', 'finaxio-toolkit'),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'services_typography',
                'selector' => '{{WRAPPER}} .services__two-item-area-content h4,
				{{WRAPPER}} .services__area-item-content h3',
            ]
        );

        $this->add_control(
            'services_title_color',
            [
                'label' => esc_html__('Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__two-item-area-content h4' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .services__area-item-content h3' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'services_title_hover',
            [
                'label' => esc_html__('Hover Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__area-item:hover .services__area-item-content h3 a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'services_description',
            [
                'label' => esc_html__('Description', 'finaxio-toolkit'),
                'type' => Controls_Manager::HEADING,
                'condition' => [
                    'select_design' => ['design-1'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'services_description_typography',
                'selector' => '{{WRAPPER}} .services__two-item-area-content p',
                'condition' => [
                    'select_design' => ['design-1'],
                ],
            ]
        );

        $this->add_control(
            'services_description_color',
            [
                'label' => esc_html__('Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__two-item-area-content p' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'select_design' => ['design-1'],
                ],
            ]
        );

        $this->add_responsive_control(
            'services_description_gap',
            [
                'label' => esc_html__('Gap', 'finaxio-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .services__two-item-area-content h4' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .services__area-item-content' => 'padding-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'services_btn_style',
            [
                'label' => esc_html__('Button', 'finaxio-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'services_btn_typography',
                'selector' => '{{WRAPPER}} .services__two-item a,
				{{WRAPPER}} .services__area-item .simple-btn',
            ]
        );

        $this->add_control(
            'services_btn_color',
            [
                'label' => esc_html__('Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__two-item a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .services__area-item .simple-btn' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'services_btn_hover_color',
            [
                'label' => esc_html__('Hover Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__area-item:hover .simple-btn' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'select_design' => ['design-2'],
                ],
            ]
        );

        $this->add_control(
            'services_btn_background',
            [
                'label' => esc_html__('Background', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__two-item a' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'select_design' => ['design-1'],
                ],
            ]
        );

        $this->add_responsive_control(
            'services_btn_padding',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Padding', 'finaxio-toolkit'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .services__two-item a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
                'condition' => [
                    'select_design' => ['design-1'],
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'services_arrow_btn',
            [
                'label' => esc_html__('Arrow', 'finaxio-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'select_design' => ['design-1'],
                ],
            ]
        );

        $this->start_controls_tabs(
            'style_tabs'
        );
        $this->start_controls_tab(
            'arrow_normal_tab',
            [
                'label' => esc_html__('Normal', 'finaxio-toolkit'),
            ]
        );

        $this->add_control(
            'arrow_color',
            [
                'label' => esc_html__('Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__two-button-next i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .services__two-button-prev i' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'arrow__border_color',
            [
                'label' => esc_html__('Border Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__two-button-next i' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .services__two-button-prev i' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->start_controls_tab(
            'arrow_hover_tab',
            [
                'label' => esc_html__('Hover', 'finaxio-toolkit'),
            ]
        );

        $this->add_control(
            'arrow_hover',
            [
                'label' => esc_html__('Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__two-button-next:hover i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .services__two-button-prev:hover i' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'arrow_background',
            [
                'label' => esc_html__('Background Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__two-button-next:hover i' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .services__two-button-prev:hover i' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .services__two-button-next:hover i' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .services__two-button-prev:hover i' => 'border-color: {{VALUE}}',
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
        $icon_image = $settings['icon_image'];
        $hover_icon = $settings['hover_icon'];

        ?>

        <?php if ('design-1' === $settings['select_design']): ?>
            <div class="services-two">
                <div class="container">
                    <div class="row mb-45">
                        <div class="col-xl-12">
                            <div class="swiper services-two-slider">
                                <div class="swiper-wrapper">
                                    <?php foreach ($settings['content_items'] as $item): ?>
                                        <div class="services__two-item swiper-slide">
                                            <div class="services__two-item-area">
                                                <div class="services__two-item-area-icon">
                                                    <img src="<?php echo esc_url($item['icon']['url']) ?>"
                                                        alt="<?php echo esc_html($item['title']); ?>">
                                                </div>
                                                <div class="services__two-item-area-content">
                                                    <h4>
                                                        <?php echo esc_html($item['title']); ?>
                                                    </h4>
                                                    <p>
                                                        <?php echo esc_html($item['description']); ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <a href="<?php echo esc_url($item['item_url']); ?>"><?php echo esc_html($item['service_btn']); ?><i class="far fa-chevron-right"></i></a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="services__two-button">
                                <div class="services__two-button-prev"><i class="far fa-long-arrow-left"></i></div>
                                <div class="services__two-button-next"><i class="far fa-long-arrow-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ('design-2' === $settings['select_design']): ?>
            <div class="services__area-item">
                <div class="services__area-item-icon">
                    <?php
                    if ($icon_image['url']) {
                        if (!empty($icon_image['alt'])) {
                            echo '<img src="' . esc_url($icon_image['url']) . '" alt="' . esc_attr($icon_image['alt']) . '" />';
                        } else {
                            echo '<img src="' . esc_url($icon_image['url']) . '" alt="' . esc_attr(__('No alt text', 'finaxio-toolkit')) . '" />';
                        }
                    }
                    ?>
                    <div class="services__area-item-icon-one">
                        <?php
                        if ($hover_icon['url']) {
                            if (!empty($hover_icon['alt'])) {
                                echo '<img src="' . esc_url($hover_icon['url']) . '" alt="' . esc_attr($hover_icon['alt']) . '" />';
                            } else {
                                echo '<img src="' . esc_url($hover_icon['url']) . '" alt="' . esc_attr(__('No alt text', 'finaxio-toolkit')) . '" />';
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="services__area-item-content">
                    <h3><a href="<?php echo esc_url($settings['item_url']); ?>"><?php echo esc_html($settings['title']); ?></a></h3>
                    <a class="simple-btn" href="<?php echo esc_url($settings['item_url']); ?>"><?php echo esc_html($settings['btn_text']); ?><i class="far fa-long-arrow-right"></i></a>
                </div>
            </div>
        <?php endif; ?>

        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Services_Finaxio);