<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;

if (!defined('ABSPATH'))
    exit;

class Teams_Finaxio extends Widget_Base
{
    public function get_name()
    {
        return 'team-finaxio';
    }

    public function get_title()
    {
        return esc_html__('Team Member - Finaxio', 'finaxio-toolkit');
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
        return ['Finaxio', 'Toolkit', 'Team', 'Member'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'section_general',
            [
                'label' => esc_html__('Team Style', 'finaxio-toolkit'),
            ]
        );

        $this->add_control(
            'select_design',
            [
                'label' => esc_html__('Select Team Style', 'finaxio-toolkit'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'design-1' => esc_html__('Team Style 01', 'finaxio-toolkit'),
                    'design-2' => esc_html__('Team Style 02', 'finaxio-toolkit'),
                ],
                'default' => 'design-1',
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_head',
            [
                'label' => esc_html__('Team Content', 'finaxio-toolkit'),
            ]
        );

        $this->add_control(
            'team_image',
            [
                'label' => esc_html__('Team Image', 'finaxio-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'title_one',
            [
                'label' => esc_html__('Name', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Amelia Clover', 'finaxio-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__('Position', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Senior Advisor', 'finaxio-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'team_url',
            [
                'label' => esc_html__('Single URL', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_attr__('http://google.com', 'finaxio-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'show_social',
            [
                'label' => esc_html__('Show Social', 'finaxio-toolkit'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'finaxio-toolkit'),
                'label_off' => esc_html__('No', 'finaxio-toolkit'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $social_item = new Repeater();

        $social_item->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'finaxio-toolkit'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fab fa-facebook-f',
                    'library' => 'brands',
                ],
            ]
        );

        $social_item->add_control(
            'link',
            [
                'label' => esc_html__('URL', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'social_media',
            [
                'label' => esc_html__('Social Icons', 'finaxio-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $social_item->get_controls(),
                'default' => [
                    [

                        'icon' => esc_html__('fab fa-facebook-f', 'finaxio-toolkit'),
                        'link' => esc_attr__('https://facebook.com', 'finaxio-toolkit'),
                    ],
                ],

                'condition' => [
                    'show_social' => ['yes'],
                ],
                'title_field' => '{{{ icon }}}',
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'team_style_section',
            [
                'label' => esc_html__('Content', 'finaxio-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        
		$this->add_control(
			'team_subtitle',
			[
				'label' => esc_html__( 'Subtitle', 'finaxio-toolkit' ),
				'type' => Controls_Manager::HEADING,
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'team_subtitle_typography',
				'selector' => '{{WRAPPER}} .team__area-item-content p,
                {{WRAPPER}} .team__three-item-content p',
			]
		);

        $this->add_control(
            'team_subtitle_color',
            [
                'label' => esc_html__('Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team__area-item-content p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .team__three-item-content p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'team_subtitle_hover_color',
            [
                'label' => esc_html__('Hover Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team__area-item:hover .team__area-item-content p' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'select_design' => ['design-1',],
                ]
            ]
        );

		$this->add_control(
			'team_heading',
			[
				'label' => esc_html__( 'Heading', 'finaxio-toolkit' ),
				'type' => Controls_Manager::HEADING,
                'separator' => 'before',
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'team_heading_typography',
				'selector' => '{{WRAPPER}} .team__area-item-content h4,
				{{WRAPPER}} .team__three-item-content h4',
                 
			]
		);

        $this->add_control(
            'team_heading_color',
            [
                'label' => esc_html__('Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team__area-item-content h4' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .team__three-item-content h4' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'team_heading_hover_color',
            [
                'label' => esc_html__('Hover Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team__area-item:hover .team__area-item-content h4' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .team__three-item-content h4 a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

		$this->add_control(
			'team_content',
			[
				'label' => esc_html__( 'Content Area', 'finaxio-toolkit' ),
				'type' => Controls_Manager::HEADING,
                'separator' => 'before',
			]
		);

        $this->add_control(
            'team_content_background',
            [
                'label' => esc_html__('Content Background', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team__area-item-content' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .team__three-item-content' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'team_linear_color',
            [
                'label' => esc_html__('Linear Background', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team__three-item-image::after' => 'background: linear-gradient(180deg, rgba(249, 77, 29, 0) 0%,{{VALUE}} 85.11%)',
                ],
                'condition' => [
                    'select_design' => ['design-2'],
                ]
            ]
        );

        $this->add_control(
            'team_content_hover_background',
            [
                'label' => esc_html__('Hover Background', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team__area-item:hover .team__area-item-content' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'select_design' => ['design-1'],
                ]
            ]
        );

        $this->add_responsive_control(
			'team_content_padding',
			[
				'type' => Controls_Manager::DIMENSIONS,
				'label' => esc_html__( 'Padding', 'finaxio-toolkit' ),
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .team__area-item-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .team__three-item-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();


        $this->start_controls_section(
            'team_icon_style',
            [
                'label' => esc_html__('Icon', 'finaxio-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );   

		$this->add_control(
			'team_social',
			[
				'label' => esc_html__( 'Social', 'finaxio-toolkit' ),
				'type' => Controls_Manager::HEADING,
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
            'team_icon_color',
            [
                'label' => esc_html__('Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team__area-item-image-social ul li a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .team__three-item-image-social ul li a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'team_icon_background',
            [
                'label' => esc_html__('Background', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team__area-item-image-social ul li a' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'select_design' => ['design-1',],
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__('Hover', 'finaxio-toolkit'),
            ]
        );

        $this->add_control(
            'team_icon_hover_color',
            [
                'label' => esc_html__('Hover Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team__area-item-image-social ul li a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .team__three-item-image-social ul li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'team_icon_hover_background',
            [
                'label' => esc_html__('Hover Background', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team__area-item-image-social ul li a:hover' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'select_design' => ['design-1',],
                ]
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_responsive_control(
            'social_icon_width',
            [
                'label' => esc_html__('Max Width', 'finaxio-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
					'unit' => 'px',
					'size' => 45,
				],
                'selectors' => [
                    '{{WRAPPER}} .team__area-item-image-social ul li a' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .team__area-item-image-icon a' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'select_design' => ['design-1',],
                ]
            ]
        );        

        $this->add_responsive_control(
            'social_icon_size',
            [
                'label' => esc_html__('Icon Size', 'finaxio-toolkit'),
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
					'size' => 14,
				],
                'selectors' => [
                    '{{WRAPPER}} .team__area-item-image-social ul li a' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .team__area-item-image-icon a' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .team__three-item-image-social ul li a' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
			'icon_border_radius',
			[
				'type' => Controls_Manager::DIMENSIONS,
				'label' => esc_html__( 'Border Radius', 'finaxio-toolkit' ),
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .team__area-item-image-social ul li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .team__area-item-image-icon a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',					
				],
                'separator' => 'before',
                'condition' => [
                    'select_design' => ['design-1','design-4','design-5','design-6'],
                ]
			]
		);

        
		$this->add_control(
			'team_share',
			[
				'label' => esc_html__( 'Share', 'finaxio-toolkit' ),
				'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'select_design' => ['design-1',],
                ]
			]
		);

        $this->add_control(
            'team_share_icon_color',
            [
                'label' => esc_html__('Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team__area-item-image-icon > a' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'select_design' => ['design-1',],
                ]
            ]
        );

        $this->add_control(
            'team_share_icon_background',
            [
                'label' => esc_html__('Background', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team__area-item-image-icon > a' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'select_design' => ['design-1',],
                ]
            ]
        );
   
        $this->add_control(
            'team_share_hover_background',
            [
                'label' => esc_html__('Hover Background', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team__area-item:hover .team__area-item-image-icon > a' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'select_design' => ['design-1'],
                ]
            ]
        );


        $this->end_controls_section();
        

        
    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $team_image = $settings['team_image'];

    ?>

        <?php if ('design-1' === $settings['select_design']): ?>

            <div class="team__area-item">
				<div class="team__area-item-image">
                    <?php
                    if ($team_image['url']) {
                        if (!empty($team_image['alt'])) {
                            echo '<img src="' . esc_url($team_image['url']) . '" alt="' . esc_attr($team_image['alt']) . '" />';
                        } else {
                            echo '<img src="' . esc_url($team_image['url']) . '" alt="' . esc_attr(__('No alt text', 'finaxio-toolkit')) . '" />';
                        }
                    } ?>
					<div class="team__area-item-image-icon">
                        <?php if ('yes' === $settings['show_social'] && !empty($settings['social_media'])): ?>
                            <div class="team__area-item-image-social">
                                <ul>
                                    <?php foreach ($settings['social_media'] as $item): ?>
                                        <li><a href="<?php echo esc_url($item['link']); ?>"><i
                                        class="<?php echo esc_attr($item['icon']['value']); ?>"></i></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
							<a href="#"> <i class="fal fa-plus"></i></a>
                        <?php endif; ?>
					</div>
				</div>
				<div class="team__area-item-content">
					<p><?php echo esc_html($settings['sub_title']); ?></p>
					<?php if (!empty($settings['team_url'])) { ?>
                        <h4><a href="<?php echo esc_url($settings['team_url']); ?>"><?php echo esc_html($settings['title_one']); ?></a></h4>
                    <?php } else { ?>
                        <h4><?php echo esc_html($settings['title_one']); ?></h4>
                    <?php } ?>	
				</div>
			</div>

        <?php endif; ?>

        <?php if ('design-2' === $settings['select_design']): ?>

            <div class="team__three-item">
				<div class="team__three-item-image">
                    <?php
                    if ($team_image['url']) {
                        if (!empty($team_image['alt'])) {
                            echo '<img src="' . esc_url($team_image['url']) . '" alt="' . esc_attr($team_image['alt']) . '" />';
                        } else {
                            echo '<img src="' . esc_url($team_image['url']) . '" alt="' . esc_attr(__('No alt text', 'finaxio-toolkit')) . '" />';
                        }
                    } ?>
                    <?php if ('yes' === $settings['show_social'] && !empty($settings['social_media'])): ?>
                        <div class="team__three-item-image-social">
                            <ul>
                                <?php foreach ($settings['social_media'] as $item): ?>
                                    <li><a href="<?php echo esc_url($item['link']); ?>"><i
                                    class="<?php echo esc_attr($item['icon']['value']); ?>"></i></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
				</div>
				<div class="team__three-item-content">
					<p><?php echo esc_html($settings['sub_title']); ?></p>
					<?php if (!empty($settings['team_url'])) { ?>
                        <h4><a href="<?php echo esc_url($settings['team_url']); ?>"><?php echo esc_html($settings['title_one']); ?></a></h4>
                    <?php } else { ?>
                        <h4><?php echo esc_html($settings['title_one']); ?></h4>
                    <?php } ?>	
				</div>
			</div>

        <?php endif; ?>

    <?php
    }
}

Plugin::instance()->widgets_manager->register(new Teams_Finaxio);