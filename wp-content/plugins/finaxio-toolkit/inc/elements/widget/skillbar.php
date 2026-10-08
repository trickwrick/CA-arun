<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit;

class Skills_Bar_Finaxio extends Widget_Base
{
    public function get_name()
    {
        return 'skill_bar_finaxio';
    }

    public function get_title()
    {
        return esc_html__('Skill Bar - Finaxio', 'finaxio-toolkit');
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
        return ['Finaxio', 'Toolkit', 'Skills', 'bar', 'skill bar'];
    }

    protected function register_controls()
    
    {
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Section Content', 'finaxio-toolkit'),
            ]
        );
        $portfolio_meta = new Repeater();

        $portfolio_meta->add_control(
            'skill_title',
            [
                'label' => esc_html__('Skill Title', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $portfolio_meta->add_control(
            'skill_lavel',
            [
                'label' => esc_html__('Skill Lavel', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'skills_list',
            [
                'label' => esc_html__('Skills List', 'finaxio-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $portfolio_meta->get_controls(),
                'default' => [
                    [
                        'skill_title' => esc_html__('Web Development', 'finaxio-toolkit'),
                        'skill_lavel' => esc_html__('70', 'finaxio-toolkit'),
                    ],

                    [
                        'skill_title' => esc_html__('Graphic Design', 'finaxio-toolkit'),
                        'skill_lavel' => esc_html__('90', 'finaxio-toolkit'),
                    ],
                ],

                'title_field' => '{{{ skill_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'skill_section_content_style',
            [
                'label' => esc_html__('Content', 'finaxio-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'skill_title',
			[
				'label' => esc_html__( 'Title', 'finaxio-toolkit' ),
				'type' => Controls_Manager::HEADING,
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'skill_title_typography',
				'selector' => '{{WRAPPER}} .skill__area-item-content h6',
			]
		);

        $this->add_control(
            'skill_title_color',
            [
                'label' => esc_html__('Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .skill__area-item-content h6' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'skill_bar_item_gap',
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
                'default' => [
					'unit' => 'px',
					'size' => 11,
				],
                'selectors' => [
                    '{{WRAPPER}} .skill__area-item-inner' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

		$this->add_control(
			'skill_counter',
			[
				'label' => esc_html__( 'Counter', 'finaxio-toolkit' ),
				'type' => Controls_Manager::HEADING,
                'separator' => 'before',
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'skill_counter_typography',
				'selector' => '{{WRAPPER}} .skill__area-item-count',
			]
		);

        $this->add_control(
            'skill_counter_color',
            [
                'label' => esc_html__('Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .skill__area-item-count' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->end_controls_section();

        $this->start_controls_section(
            'skill_bar_section',
            [
                'label' => esc_html__('Skill Bar', 'finaxio-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );  

		$this->add_control(
			'skill_bar_style',
			[
				'label' => esc_html__( 'Bar', 'finaxio-toolkit' ),
				'type' => Controls_Manager::HEADING,
			]
		);

        $this->add_control(
            'skill_bar_background',
            [
                'label' => esc_html__('Background Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .skill__area-item-bar' => 'background: {{VALUE}}',
                ],
            ]
        );
                
        $this->add_responsive_control(
            'skill_bar_height',
            [
                'label' => esc_html__('Height', 'finaxio-toolkit'),
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
					'size' => 8,
				],
                'selectors' => [
                    '{{WRAPPER}} .skill__area-item-bar' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        ); 

		$this->add_control(
			'skill_inner_style',
			[
				'label' => esc_html__( 'Inner', 'finaxio-toolkit' ),
				'type' => Controls_Manager::HEADING,
                'separator' => 'before',
			]
		);

        $this->add_control(
            'skill_inner_background',
            [
                'label' => esc_html__('Background Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .skill__area-item-inner' => 'background: {{VALUE}}',
                ],
            ]
        );
                
        $this->add_responsive_control(
            'skill_inner_height',
            [
                'label' => esc_html__('Height', 'finaxio-toolkit'),
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
					'size' => 5,
				],
                'selectors' => [
                    '{{WRAPPER}} .skill__area-item-inner' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        ); 
        $this->end_controls_section();

        $this->start_controls_section(
            'skill_bar_item',
            [
                'label' => esc_html__('Item', 'finaxio-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );  
    
        $this->add_responsive_control(
            'skill_item_gap',
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
                'default' => [
					'unit' => 'px',
					'size' => 25,
				],
                'selectors' => [
                    '{{WRAPPER}} .skill__area-item' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        ); 
        $this->end_controls_section();
    }

    protected function render()

    {
        $settings = $this->get_settings_for_display();

        ?>
            <?php foreach ($settings['skills_list'] as $key => $item): ?>
                <div class="skill__area-item">
                    <div class="skill__area-item-content">
                        <h6><?php echo esc_html($item['skill_title']); ?></h6>
                        <span class="skill__area-item-count"><span class="counter"><?php echo esc_attr($item['skill_lavel']); ?></span><?php echo esc_html('%'); ?></span>
                    </div>
                    <div class="skill__area-item-inner">
                        <div class="skill__area-item-bar" data-width="<?php echo esc_html($item['skill_lavel']); ?>"></div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Skills_Bar_Finaxio);