<?php

namespace Elementor;

use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if (!defined('ABSPATH'))
    exit;

class Banner_Finaxio extends Widget_Base
{
    public function get_name()
    {
        return 'banner_finaxio';
    }

    public function get_title()
    {
        return esc_html__('Banner - Finaxio', 'finaxio-toolkit');
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
        return ['Finaxio', 'Toolkit', 'Banner', 'Slider', 'Home'];
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
                'label' => esc_html__('Select Banner Style', 'finaxio-toolkit'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'design-1' => esc_html__('Style 01', 'finaxio-toolkit'),
                    'design-2' => esc_html__('Style 02', 'finaxio-toolkit'),
                ],
                'default' => 'design-1',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'banner_arrow',
            [
                'label' => esc_html__('Show Dots', 'finaxio-toolkit'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'finaxio-toolkit'),
                'label_off' => esc_html__('No', 'finaxio-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'select_design' => ['design-2'],
                ],
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Slider Content', 'finaxio-toolkit'),
            ]
        );


        $banner_slider = new Repeater();


        $banner_slider->add_control(
            'slider_image',
            [
                'label' => esc_html__('Background', 'finaxio-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );

        $banner_slider->add_control(
            'right_image',
            [
                'label' => esc_html__('Image', 'finaxio-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );

        $banner_slider->add_control(
            'slider_subtitle',
            [
                'label' => esc_html__('Sub Title', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $banner_slider->add_control(
            'slider_title',
            [
                'label' => esc_html__('Title', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $banner_slider->add_control(
            'slider_description',
            [
                'label' => esc_html__('Content', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );

        $banner_slider->add_control(
            'slider_btn_text',
            [
                'label' => esc_html__('Button Text', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $banner_slider->add_control(
            'slider_btn_url',
            [
                'label' => esc_html__('Button URL', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $banner_slider->add_control(
            'slider_video_url',
            [
                'label' => esc_html__('Video URL', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $banner_slider->add_control(
            'slider_thumb',
            [
                'label' => esc_html__('Navigation for Banner 01', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );



        $this->add_control(
            'banner_slides',
            [
                'label' => esc_html__('Banner Slides', 'finaxio-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $banner_slider->get_controls(),
                'default' => [
                    [
                        'slider_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'right_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'slider_subtitle' => esc_html__('Welcome to Finaxio', 'finaxio-toolkit'),
                        'slider_title' => esc_html__('Business consulting advice', 'finaxio-toolkit'),
                        'slider_description' => esc_html__('We help small startups grow from idea to millions of users', 'finaxio-toolkit'),
                        'slider_thumb' => esc_html__('Business One', 'finaxio-toolkit'),
                        'slider_btn_text' => esc_html__('Read More', 'finaxio-toolkit'),
                        'slider_btn_url' => esc_attr__('http://google.com', 'finaxio-toolkit'),
                        'slider_video_url' => esc_attr__('https://www.youtube.com/watch?v=SZEflIVnhH8', 'finaxio-toolkit'),
                    ],

                    [
                        'slider_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'right_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'slider_subtitle' => esc_html__('Welcome to Finaxio', 'finaxio-toolkit'),
                        'slider_title' => esc_html__('Business consulting advice', 'finaxio-toolkit'),
                        'slider_description' => esc_html__('We help small startups grow from idea to millions of users', 'finaxio-toolkit'),
                        'slider_thumb' => esc_html__('Business Two', 'finaxio-toolkit'),
                        'slider_btn_text' => esc_html__('Read More', 'finaxio-toolkit'),
                        'slider_btn_url' => esc_attr__('http://google.com', 'finaxio-toolkit'),
                        'slider_video_url' => esc_attr__('https://www.youtube.com/watch?v=SZEflIVnhH8', 'finaxio-toolkit'),
                    ],
                ],

                'title_field' => '{{{ slider_subtitle }}}',
            ]
        );


        $this->end_controls_section();
    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $finaxio_htmls = array(
            'a' => array(
                'href' => array(),
                'target' => array(),
            ),
            'strong' => array(),
            'small' => array(),
            'span' => array(),
            'p' => array(),
        );


        ?>
        <?php if ('design-1' === $settings['select_design'] && !empty($settings['banner_slides'])): ?>

            <!-- Banner Two Area Start -->
            <div class="home-two-main-banner">
                <div class="banner__two swiper banner-slide">
                    <div class="swiper-wrapper dark__image">
                        <?php foreach ($settings['banner_slides'] as $slide): ?>


                            <div class="banner__two-area swiper-slide" data-swiper-autoplay="5000">
                                <div class="banner__two-area-image"
                                    data-background="<?php echo esc_url($slide['slider_image']['url']) ?>">
                                </div>
                                <div class="container">
                                    <div class="row align-items-center">
                                        <div class="col-xl-7 col-lg-7 order-last order-lg-first">
                                            <div class="banner__two-content">
                                                <span data-animation="fadeInLeft" data-delay=".4s">
                                                    <?php echo esc_html($slide['slider_subtitle']); ?>
                                                </span>
                                                <h1 data-animation="fadeInLeft" data-delay=".6s">
                                                    <?php echo esc_html($slide['slider_title']); ?>
                                                </h1>
                                                <p data-animation="fadeInLeft" data-delay=".8s">
                                                    <?php echo esc_html($slide['slider_description']); ?>
                                                </p>
                                                <div class="banner__two-content-button" data-animation="fadeInLeft" data-delay="1s">
                                                    <?php if (!empty($slide['slider_btn_url'])): ?>
                                                        <div class="banner__two-content-button-item">
                                                            <a href="<?php echo esc_url($slide['slider_btn_url']); ?>"
                                                                class="theme-btn3"><?php echo esc_html($slide['slider_btn_text']); ?></a>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if (!empty($slide['slider_video_url'])): ?>
                                                        <div class="banner__two-content-button-item">
                                                            <div class="banner__two-content-button-item-video video-pulse"><a
                                                                    class="video-popup"
                                                                    href="<?php echo esc_url($slide['slider_video_url']); ?>"><i
                                                                        class="fas fa-play"></i></a></div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-5 col-lg-5">
                                            <?php if (!empty($slide['right_image']['url'])): ?>
                                                <div class="banner__two-right" data-animation="fadeInRight" data-delay="1.3s">
                                                    <img src="<?php echo esc_url($slide['right_image']['url']) ?>" alt="">
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="banner__two-thumb">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-7 col-lg-7">
                                <div class="swiper banner-slide2">
                                    <div class="swiper-wrapper">

                                        <?php foreach ($settings['banner_slides'] as $slide): ?>

                                            <div class="banner__two-thumb-item swiper-slide">
                                                <h6>
                                                    <?php echo wp_kses($slide['slider_thumb'], $finaxio_htmls); ?>
                                                </h6>
                                            </div>

                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Banner Two Area End -->


        <?php endif; ?>

        <?php if ('design-2' === $settings['select_design'] && !empty($settings['banner_slides'])): ?>
            <!-- Banner Area Start -->
            <div class="banner__area swiper banner-slider">
                <div class="swiper-wrapper">
                    <?php foreach ($settings['banner_slides'] as $slide): ?>


                        <div class="banner__area-image swiper-slide"
                            data-background="<?php echo esc_url($slide['slider_image']['url']) ?>">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="banner__area-content">
                                            <?php if (!empty($slide['right_image']['url'])): ?>
                                                <div class="banner__area-content-icon">
                                                    <img src="<?php echo esc_url($slide['right_image']['url']) ?>" alt="imeg-one">
                                                </div>
                                            <?php endif; ?>
                                            <span data-animation="fadeInUp" data-delay=".4s">
                                                <?php echo esc_html($slide['slider_subtitle']); ?>
                                            </span>
                                            <h1 data-animation="fadeInUp" data-delay=".6s">
                                                <?php echo esc_html($slide['slider_title']); ?>
                                            </h1>
                                            <p data-animation="fadeInUp" data-delay=".8s">
                                                <?php echo esc_html($slide['slider_description']); ?>
                                            </p>
                                            <div class="banner__area-content-button" data-animation="fadeInUp" data-delay="1s">
                                                <?php if (!empty($slide['slider_btn_url'])): ?>
                                                    <div class="banner__area-content-button-item">
                                                        <a href="<?php echo esc_url($slide['slider_btn_url']); ?>"
                                                            class="theme-banner-btn1"><?php echo esc_html($slide['slider_btn_text']); ?> <i
                                                                class="fal fa-long-arrow-right"></i></a>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (!empty($slide['slider_video_url'])): ?>
                                                    <div class="banner__area-content-button-item">
                                                        <div class="banner__area-content-button-item-video video-pulse">
                                                            <a class="video-popup"
                                                                href="<?php echo esc_url($slide['slider_video_url']); ?>"><i
                                                                    class="fas fa-play"></i></a>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>
                <?php if ('yes' === $settings['banner_arrow']): ?>
                    <div class="banner__area-dots">
                        <div class="banner-pagination"></div>
                    </div>
                <?php endif; ?>
            </div>
            <!-- Banner Area End -->
        <?php endif; ?>


        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Banner_Finaxio);