<?php

namespace Elementor;

use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if (!defined('ABSPATH'))
    exit;

class Iconbox_Finaxio extends Widget_Base
{
    public function get_name()
    {
        return 'iconbox-finaxio';
    }

    public function get_title()
    {
        return esc_html__('Icon Box - Finaxio', 'finaxio-toolkit');
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
        return ['Finaxio', 'Toolkit', 'Icon Box', 'List', 'Item'];
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
                'label' => esc_html__('Service Content', 'finaxio-toolkit'),
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

        $this->add_control(
            'number',
            [
                'label' => esc_html__('Number', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('01', 'finaxio-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__('Subtitle', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Service 01', 'finaxio-toolkit'),
                'label_block' => true,
                'condition' => [
                    'select_design' => ['design-1', 'design-2'],
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Private Security', 'finaxio-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Give the best quality of security systems & facility of latest technology for the people get security.', 'finaxio-toolkit'),
                'label_block' => true,
                'condition' => [
                    'select_design' => ['design-1', 'design-2'],
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
                    'select_design' => ['design-1'],
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'icon_box_style',
            [
                'label' => esc_html__('Item', 'finaxio-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'select_design' => ['design-1', 'design-2'],
                ],
            ]
        );

        $this->add_control(
            'icon_box_background',
            [
                'label' => esc_html__('Background', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__three-item' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .work__area-right-item' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'icon_box_border',
            [
                'label' => esc_html__('Border Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .work__area-right-item' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .services__three-item' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .services__three-item-top' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
			'icon_box_padding',
			[
				'type' => Controls_Manager::DIMENSIONS,
				'label' => esc_html__( 'Padding', 'finaxio-toolkit' ),
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .services__three-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .work__area-right-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
                'separator' => 'before',
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
            'icon_box_content',
            [
                'label' => esc_html__('Content', 'finaxio-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'icon_box_number',
			[
				'label' => esc_html__( 'Number', 'finaxio-toolkit' ),
				'type' => Controls_Manager::HEADING,
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'number_typography',
				'selector' => '{{WRAPPER}} .services__three-item span,
				{{WRAPPER}} .sponsors__area-item-icon span,
				{{WRAPPER}} .work__area-right-item-content b',
			]
		);

        $this->add_control(
            'number_color',
            [
                'label' => esc_html__('Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__three-item span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .work__area-right-item-content b' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .sponsors__area-item-icon span' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'number_background',
            [
                'label' => esc_html__('Background Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sponsors__area-item-icon span' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'select_design' => ['design-3'],
                ],
            ]
        );

        $this->add_control(
            'number_opacity',
            [
                'label' => esc_html__('Opacity', 'finaxio-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1,
                        'step' => 0.01,
                    ],
                ],
                'default' => [
					'unit' => 'px',
					'size' => 0.03,
				],
                'selectors' => [
                    '{{WRAPPER}} .services__three-item > span' => 'opacity: {{SIZE}};',
                    '{{WRAPPER}} .work__area-right-item-content b' => 'opacity: {{SIZE}};',
                ],
                'condition' => [
                    'select_design' => ['design-1', 'design-2'],
                ],
            ]
        );

		$this->add_control(
			'icon_box_subtitle',
			[
				'label' => esc_html__( 'Subtitle', 'finaxio-toolkit' ),
				'type' => Controls_Manager::HEADING,
                'condition' => [
                    'select_design' => ['design-1', 'design-2'],
                ],
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typography',
				'selector' => '{{WRAPPER}} .services__three-item-top-content span,
				{{WRAPPER}} .work__area-right-item-content span',
                'condition' => [
                    'select_design' => ['design-1', 'design-2'],
                ],
			]
		);

        $this->add_control(
            'subtitle_color',
            [
                'label' => esc_html__('Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__three-item-top-content span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .work__area-right-item-content span' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'select_design' => ['design-1', 'design-2'],
                ],
            ]
        );

		$this->add_control(
			'icon_box_title',
			[
				'label' => esc_html__( 'Title', 'finaxio-toolkit' ),
				'type' => Controls_Manager::HEADING,
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .services__three-item-top-content h4,
				{{WRAPPER}} .work__area-right-item-content h5,
				{{WRAPPER}} .sponsors__area-item h5',
			]
		);

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__three-item-top-content h4' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .work__area-right-item-content h5' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .sponsors__area-item h5' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'title_hover',
            [
                'label' => esc_html__('Hover Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__three-item-top-content h4 a:hover' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'select_design' => ['design-1'],
                ],
            ]
        );

        $this->add_responsive_control(
            'title_gap',
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
                    '{{WRAPPER}} .services__three-item-top' => 'padding-bottom: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'select_design' => ['design-1'],
                ],
            ]
        );

		$this->add_control(
			'description_title',
			[
				'label' => esc_html__( 'Description', 'finaxio-toolkit' ),
				'type' => Controls_Manager::HEADING,
                'condition' => [
                    'select_design' => ['design-1', 'design-2'],
                ],
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} .services__three-item p,
				{{WRAPPER}} .work__area-right-item-content p',
                'condition' => [
                    'select_design' => ['design-1', 'design-2'],
                ],
			]
		);

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services__three-item p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .work__area-right-item-content p' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'select_design' => ['design-1', 'design-2'],
                ],
            ]
        );

		$this->add_control(
			'icon_title',
			[
				'label' => esc_html__( 'Icon', 'finaxio-toolkit' ),
				'type' => Controls_Manager::HEADING,
                'condition' => [
                    'select_design' => ['design-3'],
                ],
			]
		);

        $this->add_control(
            'icon_border',
            [
                'label' => esc_html__('Border Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sponsors__area-item-icon' => 'border-color: {{VALUE}}',
                ],
                'condition' => [
                    'select_design' => ['design-3'],
                ],
            ]
        );

        $this->add_control(
            'icon_background',
            [
                'label' => esc_html__('Background', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sponsors__area-item-icon' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'select_design' => ['design-3'],
                ],
            ]
        );

        $this->add_control(
            'icon_hover_background',
            [
                'label' => esc_html__('Hover Background', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sponsors__area-item-icon::after' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .sponsors__area-item:hover .sponsors__area-item-icon' => 'border-color: {{VALUE}}',
                ],
                'condition' => [
                    'select_design' => ['design-3'],
                ],
            ]
        );

        $this->add_responsive_control(
            'description_size',
            [
                'label' => esc_html__('Icon Size', 'finaxio-toolkit'),
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
                    '{{WRAPPER}} .sponsors__area-item-icon img' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'description_width',
            [
                'label' => esc_html__('Max Width', 'finaxio-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sponsors__area-item-icon' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'description_gap',
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
                    '{{WRAPPER}} .services__three-item-top' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .work__area-right-item-content h5' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .sponsors__area-item-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $icon_image = $settings['icon_image'];

        ?>

        <?php if ('design-1' === $settings['select_design']): ?>

            <div class="services__three-item">
				<div class="services__three-item-top">
					<div class="services__three-item-top-content">
						<span><?php echo esc_html($settings['sub_title']); ?></span>
						<h4><a href="<?php echo esc_url($settings['item_url']); ?>"><?php echo esc_html($settings['title']); ?></a></h4>
					</div>
					<div class="services__three-item-top-icon">
                        <?php
                        if ($icon_image['url']) {
                            if (!empty($icon_image['alt'])) {
                                echo '<img src="' . esc_url($icon_image['url']) . '" alt="' . esc_attr($icon_image['alt']) . '" />';
                            } else {
                                echo '<img src="' . esc_url($icon_image['url']) . '" alt="' . esc_attr(__('No alt text', 'finaxio-toolkit')) . '" />';
                            }
                        }
                        ?>
					</div>
				</div>
                <p><?php echo esc_html($settings['description']); ?></p>
				<span><?php echo esc_html($settings['number']); ?></span>
			</div>
               
        <?php endif; ?>

        <?php if ('design-2' === $settings['select_design']): ?>

            <div class="work__area-right-item">
				<div class="work__area-right-item-icon">
                    <?php
                    if ($icon_image['url']) {
                        if (!empty($icon_image['alt'])) {
                            echo '<img src="' . esc_url($icon_image['url']) . '" alt="' . esc_attr($icon_image['alt']) . '" />';
                        } else {
                            echo '<img src="' . esc_url($icon_image['url']) . '" alt="' . esc_attr(__('No alt text', 'finaxio-toolkit')) . '" />';
                        }
                    }
                    ?>
				</div>
				<div class="work__area-right-item-content">
					<span><?php echo esc_html($settings['sub_title']); ?></span>
					<h5><?php echo esc_html($settings['title']); ?></h5>
                    <p><?php echo esc_html($settings['description']); ?></p>
                    <b><?php echo esc_html($settings['number']); ?></b>
				</div>
			</div>

        <?php endif; ?>

        <?php if ('design-3' === $settings['select_design']): ?>

            <div class="sponsors__area-item">
				<div class="sponsors__area-item-icon">
					<span><?php echo esc_html($settings['number']); ?></span>
                    <?php
                    if ($icon_image['url']) {
                        if (!empty($icon_image['alt'])) {
                            echo '<img src="' . esc_url($icon_image['url']) . '" alt="' . esc_attr($icon_image['alt']) . '" />';
                        } else {
                            echo '<img src="' . esc_url($icon_image['url']) . '" alt="' . esc_attr(__('No alt text', 'finaxio-toolkit')) . '" />';
                        }
                    }
                    ?>
				</div>
				<h5><?php echo esc_html($settings['title']); ?></h5>
			</div>

        <?php endif; ?>

        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Iconbox_Finaxio);