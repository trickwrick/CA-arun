<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit;

class Video_Icon_Finaxio extends Widget_Base
{
    public function get_name()
    {
        return 'video-icon-finaxio';
    }

    public function get_title()
    {
        return esc_html__('Video Icon - Finaxio', 'finaxio-toolkit');
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
        return ['finaxio', 'Toolkit', 'Video', 'Icon',];
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
            'icon',
            [
                'label' => esc_html__('Icon', 'finaxio-toolkit'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa fa-play',
                    'library' => 'brands',
                ],
            ]
        );

        $this->add_control(
            'video_url',
            [
                'label' => esc_html__('Video URL', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_attr__('http://google.com', 'finaxio-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label' => esc_html__('Alignment', 'finaxio-toolkit'),
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
                'selectors' => [
                    '{{WRAPPER}} .video-icon-aligment' => 'text-align: {{VALUE}};',
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
            'color',
            [
                'label' => esc_html__('Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .finaxio-video-icon a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label' => esc_html__('Background', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .finaxio-video-icon' => 'background: {{VALUE}}',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'border_color',
            [
                'label' => esc_html__('Border', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .finaxio-video-icon::after' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .finaxio-video-icon::before' => 'border-color: {{VALUE}}',
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
        <div class="video-icon-aligment">
            <div class="team__area-video-icon video-pulse finaxio-video-icon">
                <a class="video-popup" href="<?php echo esc_url($settings['video_url']); ?>"><i
                        class="<?php echo esc_attr($settings['icon']['value']); ?>"></i></a>
            </div>
        </div>



        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Video_Icon_Finaxio);