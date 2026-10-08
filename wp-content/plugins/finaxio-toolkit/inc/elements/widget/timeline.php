<?php

namespace Elementor;

use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if (!defined('ABSPATH'))
    exit;

class Timeline_Finaxio extends Widget_Base
{
    public function get_name()
    {
        return 'timeline-finaxio';
    }

    public function get_title()
    {
        return esc_html__('Timeline - Finaxio', 'finaxio-toolkit');
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
        return ['Conbix', 'Toolkit', 'History', 'Timeline', 'Home'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'section_general',
            [
                'label' => esc_html__('Content', 'finaxio-toolkit'),
            ]
        );

        $timeline_item = new Repeater();

        $timeline_item->add_control(
            'timeline_image',
            [
                'label' => esc_html__('Choose Image', 'finaxio-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );

        $timeline_item->add_control(
            'timeline_icon',
            [
                'label' => esc_html__('Choose Arrow Icon', 'finaxio-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );

        $timeline_item->add_control(
            'timeline_year',
            [
                'label' => esc_html__('Timeline Year', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $timeline_item->add_control(
            'timeline_title',
            [
                'label' => esc_html__('Timeline Title', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $timeline_item->add_control(
            'timeline_description',
            [
                'label' => esc_html__('Timeline Content', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'timeline_items',
            [
                'label' => esc_html__('Timeline Items', 'finaxio-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $timeline_item->get_controls(),
                'default' => [
                    [
                        'timeline_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'timeline_icon' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'timeline_year' => esc_html__('2015', 'finaxio-toolkit'),
                        'timeline_title' => esc_html__('Start Company', 'finaxio-toolkit'),
                        'timeline_description' => esc_html__('Empowering lives through transformative solutions, one innovation at a time.', 'finaxio-toolkit'),
                    ],

                    [
                        'timeline_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'timeline_icon' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'timeline_year' => esc_html__('2017', 'finaxio-toolkit'),
                        'timeline_title' => esc_html__('Opening Office', 'finaxio-toolkit'),
                        'timeline_description' => esc_html__('New office, endless opportunities, bridging distances for better collaboration.', 'finaxio-toolkit'),
                    ],
                ],

                'title_field' => '{{{ timeline_title }}}',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'timeline_section_item_style',
            [
                'label' => esc_html__('Item', 'finaxio-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'timeline_background',
            [
                'label' => esc_html__('Background', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .fa__area-item' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'timeline_padding',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Padding', 'finaxio-toolkit'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .faq__area-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'timeline_title',
            [
                'label' => esc_html__('Title', 'finaxio-toolkit'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'timeline_title_typography',
                'selector' => '{{WRAPPER}} .company__history-area-item-inner-content h5',
            ]
        );

        $this->add_control(
            'timeline_title_color',
            [
                'label' => esc_html__('Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .company__history-area-item-inner-content h5' => 'color: {{VALUE}}'
                ],
            ]
        );

        $this->add_control(
            'timeline_content',
            [
                'label' => esc_html__('Content', 'finaxio-toolkit'),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'timeline_content_typography',
                'selector' => '{{WRAPPER}} .company__history-area-item-inner-content p',
            ]
        );

        $this->add_control(
            'timeline_content_color',
            [
                'label' => esc_html__('Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .company__history-area-item-inner-content p' => 'color: {{VALUE}}'
                ],
            ]
        );

        $this->add_control(
            'timeline_meta',
            [
                'label' => esc_html__('Meta', 'finaxio-toolkit'),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'timeline_meta_typography',
                'selector' => '{{WRAPPER}} .company__history-area-item-date span',
            ]
        );

        $this->add_control(
            'timeline_meta_color',
            [
                'label' => esc_html__('Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .company__history-area-item-date span' => 'color: {{VALUE}}'
                ],
            ]
        );

        $this->add_control(
            'timeline_meta_background',
            [
                'label' => esc_html__('Background', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .company__history-area-item-date span' => 'background: {{VALUE}}'
                ],
            ]
        );

        $this->end_controls_section();        

    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();

    ?>

        <div class="company__history-area">
            <?php foreach ($settings['timeline_items'] as $item): ?>
                <div class="company__history-area-item">
					<div class="company__history-area-item-date">
						<span><?php echo esc_html($item['timeline_year']); ?>
                            <img class="company__history-area-item-date-icon" src="<?php echo esc_url($item['timeline_icon']['url']) ?>" alt="<?php echo esc_html($item['timeline_title']); ?>">                    
                        </span>
					</div>
					<div class="company__history-area-item-inner">
                        <div class="company__history-area-item-inner-image">
                            <img src="<?php echo esc_url($item['timeline_image']['url']) ?>" alt="<?php echo esc_html($item['timeline_title']); ?>">
                        </div>
                        <div class="company__history-area-item-inner-content">
                            <h5><?php echo esc_html($item['timeline_title']); ?></h5>
                            <p><?php echo esc_html($item['timeline_description']); ?></p>
                        </div>
					</div>
				</div>
            <?php endforeach; ?>
        </div>

    <?php
    }
}

Plugin::instance()->widgets_manager->register(new Timeline_Finaxio);