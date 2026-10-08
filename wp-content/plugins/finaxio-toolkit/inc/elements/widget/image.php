<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit;

class Image_Finaxio extends Widget_Base
{
    public function get_name()
    {
        return 'image-finaxio';
    }

    public function get_title()
    {
        return esc_html__('Images - Finaxio', 'finaxio-toolkit');
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
        return ['Finaxio', 'Toolkit', 'Images', 'left', 'right'];
    }

    protected function register_controls()
    {



        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__('Image Style', 'finaxio-toolkit'),
            ]
        );

        $this->add_control(
            'select_design',
            [
                'label' => esc_html__('Select Image Style', 'finaxio-toolkit'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'design-1' => esc_html__('Style 01', 'finaxio-toolkit'),
                    'design-2' => esc_html__('Style 02', 'finaxio-toolkit'),
                    'design-3' => esc_html__('Style 03', 'finaxio-toolkit'),
                    'design-4' => esc_html__('Style 04', 'finaxio-toolkit'),
                    'design-5' => esc_html__('Style 05', 'finaxio-toolkit'),
                ],
                'default' => 'design-1',
                'label_block' => true,
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'image_section_image',
            [
                'label' => esc_html__('Images', 'finaxio-toolkit'),
            ]
        );

        $this->add_control(
            'image_one',
            [
                'label' => esc_html__('Image One', 'finaxio-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'image_two',
            [
                'label' => esc_html__('Image Two', 'finaxio-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'select_design' => ['design-1', 'design-2', 'design-4', 'design-5'],
                ]
            ]
        );

        $this->add_control(
            'image_three',
            [
                'label' => esc_html__('Image Three', 'finaxio-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'select_design' => ['design-4', 'design-5'],
                ]
            ]
        );



        $this->end_controls_section();

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Content', 'finaxio-toolkit'),
                'condition' => [
                    'select_design' => ['design-3'],
                ]
            ]
        );

        $this->add_control(
            'image_icon',
            [
                'label' => esc_html__('Icon', 'finaxio-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'content_one',
            [
                'label' => esc_html__('Content One', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Years Experience', 'finaxio-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'content_number',
            [
                'label' => esc_html__('Content Number', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('31', 'finaxio-toolkit'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'about_image_style',
            [
                'label' => esc_html__('Style', 'finaxio-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'number_title',
			[
				'label' => esc_html__( 'Number', 'finaxio-toolkit' ),
				'type' => Controls_Manager::HEADING,
                'condition' => [
                    'select_design' => ['design-3'],
                ]
			]
		);

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'number_typography',
                'selector' => '{{WRAPPER}} .about__area-left-image-content h2',
            ]
        );

        $this->add_control(
            'number_color',
            [
                'label' => esc_html__('Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about__area-left-image-content h2' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'select_design' => ['design-3'],
                ]
            ]
        );

		$this->add_control(
			'image_content',
			[
				'label' => esc_html__( 'Content', 'finaxio-toolkit' ),
				'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'select_design' => ['design-3'],
                ]
			]
		);

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'heading_typography',
                'selector' => '{{WRAPPER}} .about__area-left-image-content span',
            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label' => esc_html__('Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about__area-left-image-content span' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'select_design' => ['design-3'],
                ]
            ]
        );

        $this->add_control(
            'image_content_background',
            [
                'label' => esc_html__('Background Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about__area-left-image-content' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'select_design' => ['design-3'],
                ]
            ]
        );

        $this->add_responsive_control(
			'image_content_padding',
			[
				'type' => Controls_Manager::DIMENSIONS,
				'label' => esc_html__( 'Padding', 'finaxio-toolkit' ),
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .about__area-left-image-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
                'condition' => [
                    'select_design' => ['design-3'],
                ]
			]
		);

        $this->add_responsive_control(
			'image_content_radius',
			[
				'type' => Controls_Manager::DIMENSIONS,
				'label' => esc_html__( 'Border Radius', 'finaxio-toolkit' ),
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .about__area-left-image-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
                'condition' => [
                    'select_design' => ['design-3'],
                ]
			]
		);


        $this->end_controls_section();
    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $image_one = $settings['image_one'];
        $image_two = $settings['image_two'];
        $image_three = $settings['image_three'];
        $image_icon = $settings['image_icon'];
        ?>


        <?php if ('design-1' === $settings['select_design']): ?>

            <div class="about__two-left dark__image">
				<div class="about__two-left-image">
					<?php
                    if ($image_one['url']) {
                        if (!empty($image_one['alt'])) {
                            echo '<img src="' . esc_url($image_one['url']) . '" alt="' . esc_attr($image_one['alt']) . '" />';
                        } else {
                            echo '<img src="' . esc_url($image_one['url']) . '" alt="' . esc_attr(__('No alt text', 'finaxio-toolkit')) . '" />';
                        }
                    }
                    ?>
					<div class="about__two-left-image-one">
						<?php
                        if ($image_two['url']) {
                            if (!empty($image_two['alt'])) {
                                echo '<img src="' . esc_url($image_two['url']) . '" alt="' . esc_attr($image_two['alt']) . '" />';
                            } else {
                                echo '<img src="' . esc_url($image_two['url']) . '" alt="' . esc_attr(__('No alt text', 'finaxio-toolkit')) . '" />';
                            }
                        }
                        ?>
					</div>
				</div>
			</div>

        <?php endif; ?>


        <?php if ('design-2' === $settings['select_design']): ?>

            <div class="faq__two-left">
                <div class="faq__two-left-image dark__image">
                    <?php
                    if ($image_one['url']) {
                        if (!empty($image_one['alt'])) {
                            echo '<img src="' . esc_url($image_one['url']) . '" alt="' . esc_attr($image_one['alt']) . '" />';
                        } else {
                            echo '<img src="' . esc_url($image_one['url']) . '" alt="' . esc_attr(__('No alt text', 'finaxio-toolkit')) . '" />';
                        }
                    }
                    ?>
                    <div class="faq__two-left-image-one">
                        <?php
                        if ($image_two['url']) {
                            if (!empty($image_two['alt'])) {
                                echo '<img src="' . esc_url($image_two['url']) . '" alt="' . esc_attr($image_two['alt']) . '" />';
                            } else {
                                echo '<img src="' . esc_url($image_two['url']) . '" alt="' . esc_attr(__('No alt text', 'finaxio-toolkit')) . '" />';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

        <?php endif; ?>


        <?php if ('design-3' === $settings['select_design']): ?>

            <div class="about__area-left">
				<div class="about__area-left-image">
                    <?php
                    if ($image_one['url']) {
                        if (!empty($image_one['alt'])) {
                            echo '<img src="' . esc_url($image_one['url']) . '" alt="' . esc_attr($image_one['alt']) . '" />';
                        } else {
                            echo '<img src="' . esc_url($image_one['url']) . '" alt="' . esc_attr(__('No alt text', 'finaxio-toolkit')) . '" />';
                        }
                    }
                    ?>
					<div class="about__area-left-image-content">
						<div class="about__area-left-image-content-icon">
                            <?php
                            if ($image_icon['url']) {
                                if (!empty($image_icon['alt'])) {
                                    echo '<img src="' . esc_url($image_icon['url']) . '" alt="' . esc_attr($image_icon['alt']) . '" />';
                                } else {
                                    echo '<img src="' . esc_url($image_icon['url']) . '" alt="' . esc_attr(__('No alt text', 'finaxio-toolkit')) . '" />';
                                }
                            }
                            ?>
						</div>
						<h2 class="counter"><?php echo esc_html($settings['content_number']); ?></h2>
						<span><?php echo esc_html($settings['content_one']); ?></span>
					</div>
				</div>
			</div>

        <?php endif; ?>


        <?php if ('design-4' === $settings['select_design']): ?>

            <div class="faq__area-left">
				<div class="faq__area-left-image">
					<div class="faq__area-left-image-one">
                        <?php
                        if ($image_one['url']) {
                            if (!empty($image_one['alt'])) {
                                echo '<img src="' . esc_url($image_one['url']) . '" alt="' . esc_attr($image_one['alt']) . '" />';
                            } else {
                                echo '<img src="' . esc_url($image_one['url']) . '" alt="' . esc_attr(__('No alt text', 'finaxio-toolkit')) . '" />';
                            }
                        }
                        ?>
					</div>
					<div class="faq__area-left-image-two">
                        <?php
                        if ($image_two['url']) {
                            if (!empty($image_two['alt'])) {
                                echo '<img src="' . esc_url($image_two['url']) . '" alt="' . esc_attr($image_two['alt']) . '" />';
                            } else {
                                echo '<img src="' . esc_url($image_two['url']) . '" alt="' . esc_attr(__('No alt text', 'finaxio-toolkit')) . '" />';
                            }
                        }
                        ?>
					</div>
					<div class="faq__area-left-image-three">
                        <?php
                        if ($image_three['url']) {
                            if (!empty($image_three['alt'])) {
                                echo '<img src="' . esc_url($image_three['url']) . '" alt="' . esc_attr($image_three['alt']) . '" />';
                            } else {
                                echo '<img src="' . esc_url($image_three['url']) . '" alt="' . esc_attr(__('No alt text', 'finaxio-toolkit')) . '" />';
                            }
                        }
                        ?>
					</div>
				</div>
			</div>

        <?php endif; ?>


        <?php if ('design-5' === $settings['select_design']): ?>

            <div class="about__three-left dark__image">
				<div class="row align-items-center">
					<div class="col-6">
						<div class="about__three-left-image-one sm-mb-20">
                            <?php
                            if ($image_one['url']) {
                                if (!empty($image_one['alt'])) {
                                    echo '<img src="' . esc_url($image_one['url']) . '" alt="' . esc_attr($image_one['alt']) . '" />';
                                } else {
                                    echo '<img src="' . esc_url($image_one['url']) . '" alt="' . esc_attr(__('No alt text', 'finaxio-toolkit')) . '" />';
                                }
                            }
                            ?>
						</div>
					</div>
					<div class="col-6">
						<div class="about__three-left-image-one mb-20">
                            <?php
                            if ($image_two['url']) {
                                if (!empty($image_two['alt'])) {
                                    echo '<img src="' . esc_url($image_two['url']) . '" alt="' . esc_attr($image_two['alt']) . '" />';
                                } else {
                                    echo '<img src="' . esc_url($image_two['url']) . '" alt="' . esc_attr(__('No alt text', 'finaxio-toolkit')) . '" />';
                                }
                            }
                            ?>
						</div>
						<div class="about__three-left-image-two">
                            <?php
                            if ($image_three['url']) {
                                if (!empty($image_three['alt'])) {
                                    echo '<img src="' . esc_url($image_three['url']) . '" alt="' . esc_attr($image_three['alt']) . '" />';
                                } else {
                                    echo '<img src="' . esc_url($image_three['url']) . '" alt="' . esc_attr(__('No alt text', 'finaxio-toolkit')) . '" />';
                                }
                            }
                            ?>
						</div>
					</div>
				</div>
			</div>

        <?php endif; ?>


        


        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Image_Finaxio);