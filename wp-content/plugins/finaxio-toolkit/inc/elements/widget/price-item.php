<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if (!defined('ABSPATH'))
    exit;

class Price_finaxio extends Widget_Base
{
    public function get_name()
    {
        return 'price-finaxio';
    }

    public function get_title()
    {
        return esc_html__('Price - Finaxio', 'finaxio-toolkit');
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
        return ['finaxio', 'Toolkit', 'price', 'table'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'section_general',
            [
                'label' => esc_html__('Style & Design', 'finaxio-toolkit'),
            ]
        );

        $this->add_control(
            'select_design',
            [
                'label' => esc_html__('Select a Style', 'finaxio-toolkit'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'design-1' => esc_html__('Design 01', 'finaxio-toolkit'),
                    'design-2' => esc_html__('Design 02', 'finaxio-toolkit'),
                ],
                'default' => 'design-1',
                'label_block' => true,
            ]
        );


        $this->end_controls_section();

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
                    'value' => 'fa fa-sun',
                    'library' => 'brands',
                ],
                'condition' => [
                    'select_design' => ['design-1'],
                ]
            ]
        );


        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Basic Plan', 'finaxio-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'period',
            [
                'label' => esc_html__('Period', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Monthly', 'finaxio-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'price',
            [
                'label' => esc_html__('Price', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('$29', 'finaxio-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__('Button Text', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Read More', 'finaxio-toolkit'),
                'label_block' => true,
                'condition' => [
                    'select_design!' => ['design-3'],
                ],
            ]
        );

        $this->add_control(
            'btn_url',
            [
                'label' => esc_html__('Button URL', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_attr__('http://google.com', 'finaxio-toolkit'),
                'condition' => [
                    'select_design!' => ['design-3'],
                ],
            ]
        );


        $priceitem = new Repeater();

        $priceitem->add_control(
            'item_icon',
            [
                'label' => esc_html__('Icon for Style 02', 'finaxio-toolkit'),
                'type' => Controls_Manager::ICONS,
                'label_block' => true,
                'default' => [
                    'value' => 'fa fa-check',
                    'library' => 'regular',
                ],
            ]
        );

        $priceitem->add_control(
            'item_title',
            [
                'label' => esc_html__('Item Name', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $priceitem->add_control(
            'item_subtitle',
            [
                'label' => esc_html__('Sub Title for Style 01', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'Item_list',
            [
                'label' => esc_html__('Price Item List', 'finaxio-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $priceitem->get_controls(),
                'default' => [
                    [
                        'item_subtitle' => esc_html__('Coverage', 'finaxio-toolkit'),
                        'item_title' => esc_html__('Employee Coverage', 'finaxio-toolkit'),

                    ],
                    [
                        'item_subtitle' => esc_html__('Benefits', 'finaxio-toolkit'),
                        'item_title' => esc_html__('24/7 Customer Support', 'finaxio-toolkit'),

                    ],
                ],
                'title_field' => '{{{ item_title }}}',
            ]
        );


        $this->end_controls_section();
    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $conbix_htmls = array(
            'span' => array(),
        );
        ?>
        <?php if ('design-1' === $settings['select_design']): ?>

            <div class="pricing__area-item">
                <div class="pricing__area-item-top">
                    <div class="pricing__area-item-top-price">
                        <p>
                            <?php echo esc_html($settings['title']); ?>
                        </p>
                        <h2>
                            <?php echo wp_kses($settings['price'], $conbix_htmls); ?><span>
                                <?php echo esc_html($settings['period']); ?>
                            </span>
                        </h2>
                    </div>
                    <div class="pricing__area-item-top-icon">
                        <i class="<?php echo esc_attr($settings['icon']['value']); ?>"></i>
                    </div>
                </div>
                <div class="pricing__area-item-content">
                    <?php foreach ($settings['Item_list'] as $item): ?>
                        <div class="pricing__area-item-content-item">
                            <span>
                                <?php echo esc_html($item['item_subtitle']); ?>
                            </span>
                            <h6>
                                <?php echo esc_html($item['item_title']); ?>
                            </h6>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php if (!empty($settings['btn_url'])): ?>
                    <div class="pricing__area-item-btn">
                        <a href="<?php echo esc_url($settings['btn_url']); ?>"><?php echo esc_html($settings['btn_text']); ?></a>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if ('design-2' === $settings['select_design']): ?>


            <div class="pricing__two-item">
                <div class="pricing__two-item-price">
                    <span>
                        <?php echo esc_html($settings['title']); ?>
                    </span>
                    <h2>
                        <?php echo wp_kses($settings['price'], $conbix_htmls); ?><span>
                            <?php echo esc_html($settings['period']); ?>
                        </span>
                    </h2>
                </div>
                <div class="pricing__two-item-list">
                    <ul>
                        <?php foreach ($settings['Item_list'] as $item): ?>
                            <li><i class="<?php echo esc_attr($item['item_icon']['value']); ?>"></i>
                                <?php echo esc_html($item['item_title']); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php if (!empty($settings['btn_url'])): ?>
                    <div class="pricing__two-item-btn">
                        <a class="btn-one" href="<?php echo esc_url($settings['btn_url']); ?>"><?php echo esc_html($settings['btn_text']); ?></a>
                    </div>
                <?php endif; ?>
            </div>

        <?php endif; ?>

        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Price_finaxio);