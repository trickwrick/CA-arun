<?php

namespace Elementor;

use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if (!defined('ABSPATH'))
    exit;

class Portfolio_Finaxio extends Widget_Base
{
    public function get_name()
    {
        return 'portfolio_finaxio';
    }

    public function get_title()
    {
        return esc_html__('Portfolio - Finaxio', 'finaxio-toolkit');
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
        return ['finaxio', 'Toolkit', 'Project', 'Portfolio', 'Home'];
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


        $this->add_control(
            'columns_desktop',
            [
                'label' => esc_html__('Columns On Desktop', 'finaxio-toolkit'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'col-xl-6' => esc_html__('Column 2', 'finaxio-toolkit'),
                    'col-xl-4' => esc_html__('Column 3', 'finaxio-toolkit'),
                    'col-xl-3' => esc_html__('Column 4', 'finaxio-toolkit'),
                ],
                'default' => 'col-xl-4',
                'label_block' => true,
                'condition' => [
                    'select_design' => ['design-3'],
                ],
            ]
        );

        $this->add_control(
            'columns_tab',
            [
                'label' => esc_html__('Columns On Tablet', 'finaxio-toolkit'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'col-lg-12' => esc_html__('1 Column', 'finaxio-toolkit'),
                    'col-lg-6' => esc_html__('2 Column', 'finaxio-toolkit'),
                ],
                'default' => 'col-lg-6',
                'label_block' => true,
                'condition' => [
                    'select_design' => ['design-3'],
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'filter_content',
            [
                'label' => esc_html__('Filter', 'finaxio-toolkit'),
                'condition' => [
                    'select_design' => ['design-3'],
                ],
            ]
        );

        $this->add_control(
            'show_filter',
            [
                'label' => esc_html__('Show Filter', 'finaxio-toolkit'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'finaxio-toolkit'),
                'label_off' => esc_html__('No', 'finaxio-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'all_text',
            [
                'label' => esc_html__('All Button Text', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__('All', 'finaxio-toolkit'),
                'condition' => [
                    'show_filter' => ['yes'],
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'portfolio_query',
            [
                'label' => esc_html__('Query', 'finaxio-toolkit'),
                'condition' => [
                    'select_design' => ['design-3'],
                ],
            ]
        );


        $this->add_control(
            'portfolio_count',
            [
                'label' => esc_html__('Number of Portfolio', 'finaxio-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['count'],
                'range' => [
                    'count' => [
                        'min' => 2,
                        'max' => 15,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'count',
                    'size' => 4,
                ],
            ]
        );

        $this->add_control(
            'category',
            [
                'label' => esc_html__('Categories', 'finaxio-toolkit'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => true,
                'options' => finaxio_portfolio_categories(),
            ]
        );

        
        $this->add_control(
            'cta_btn_text',
            [
                'label' => esc_html__('Button Text', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Case Details', 'finaxio-toolkit'),
                'label_block' => true,
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Portfolio Content', 'finaxio-toolkit'),
                'condition' => [
                    'select_design' => ['design-1','design-2'],
                ],
            ]
        );


        $content = new Repeater();


        $content->add_control(
            'image',
            [
                'label' => esc_html__('Choose Image', 'finaxio-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );

        $content->add_control(
            'subtitle',
            [
                'label' => esc_html__('Subtitle', 'finaxio-toolkit'),
                'type' => Controls_Manager::TEXT,
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
                        'subtitle' => esc_html__('Business', 'finaxio-toolkit'),
                        'title' => esc_html__('Wellness Program', 'finaxio-toolkit'),
                        'item_url' => esc_attr__('http://google.com', 'finaxio-toolkit'),
                    ],

                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'subtitle' => esc_html__('Business', 'finaxio-toolkit'),
                        'title' => esc_html__('Specialty Care', 'finaxio-toolkit'),
                        'item_url' => esc_attr__('http://google.com', 'finaxio-toolkit'),
                    ],
                ],

                'title_field' => '{{{ title }}}',
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'portfolio_content_style',
            [
                'label' => esc_html__('Content', 'finaxio-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'portfolio_subtitle',
            [
                'label' => esc_html__('Subtitle', 'finaxio-toolkit'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'portfolio_subtitle_typography',
                'selector' => '{{WRAPPER}} .portfolio__four-item-inner-content-top span,
				{{WRAPPER}} .portfolio__two-item-image-content span,
				{{WRAPPER}} .project__one-item-content span,
				{{WRAPPER}} .portfolio__three-item-content span,
				{{WRAPPER}} .portfolio__one-item-content-right span',
            ]
        );
        $this->add_control(
            'portfolio_subtitle_color',
            [
                'label' => esc_html__('Color', 'finaxio-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio__four-item-inner-content-top span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .portfolio__one-item-content-right span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .project__one-item-content span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .portfolio__three-item-content span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .portfolio__two-item-image-content span' => 'color: {{VALUE}}',
                ],
            ]
        );


        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
 
        $grid_column = $settings['columns_desktop'] . ' ' . $settings['columns_tab'];
       
        ?>

        <?php if ('design-1' === $settings['select_design']): ?>
            <!-- Portfolio Two Area Start -->
            <div class="portfolio__two">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="swiper portfolio-slider-two">
                                <div class="swiper-wrapper dark__image">
                                    <?php foreach ($settings['content_items'] as $item): ?>
                                        <div class="portfolio__two-item swiper-slide">
                                            <img src="<?php echo esc_url($item['image']['url']) ?>"
                                                alt="<?php echo esc_html($item['title']); ?>">
                                            <div class="portfolio__two-item-content">
                                                <h4><a href="<?php echo esc_url($item['item_url']); ?>"><?php echo esc_html($item['title']); ?></a></h4>
                                                <p>
                                                    <?php echo esc_html($item['subtitle']); ?>
                                                </p>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Portfolio Two Area End -->
        <?php endif; ?>

        <?php if ('design-2' === $settings['select_design']): ?>
            <!-- Portfolio Area Start -->
            <div class="portfolio__area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="swiper portfolio-slider">
                                <div class="swiper-wrapper dark__image">
                                <?php foreach ($settings['content_items'] as $item): ?>
                                    <div class="portfolio__area-item swiper-slide">
                                        <div class="portfolio__area-item-info">
                                            <a href="<?php echo esc_url($item['item_url']); ?>"><i
                                                    class="fal fa-plus"></i></a>
                                        </div>
                                        <img src="<?php echo esc_url($item['image']['url']) ?>" alt="<?php echo esc_html($item['title']); ?>">
                                        <div class="portfolio__area-item-content">
                                            <p> <?php echo esc_html($item['subtitle']); ?></p>
                                            <h5><a href="<?php echo esc_url($item['item_url']); ?>"><?php echo esc_html($item['title']); ?></a></h5>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Portfolio Area End -->
        <?php endif; ?>

        <?php if ('design-3' === $settings['select_design']): ?>
                    
                    <?php 
                    $postCount = 0;
                    $postsPerPage = $settings['portfolio_count']['size'];
                    if (!empty($settings['category'])) {
                        $portfolio_query = new \WP_Query(
                            array(
                                'post_type' => 'portfolio',
                                'post_status' => 'publish',
                                'posts_per_page' => $postsPerPage,
                                'ignore_sticky_posts' => 1,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'portfolio_category',
                                        'terms' => $settings['category'],
                                        'field' => 'slug',
                                    )
                                )
                            )
                        );
                    } else {
            
                        $portfolio_query = new \WP_Query(
                            array(
                                'post_type' => 'portfolio',
                                'post_status' => 'publish',
                                'posts_per_page' => $postsPerPage,
                                'ignore_sticky_posts' => 1,
                            )
                        );
                    }
                    $categories = $settings['category'];

        if (!empty($categories)) {
            $our_categories = array(
                'taxonomy' => 'portfolio_category',
                'hide_empty' => true,
                'slug' => $categories
            );
        } else {
            $our_categories = array(
                'taxonomy' => 'portfolio_category',
                'hide_empty' => true,
            );
        }

        $categories_terms = get_terms($our_categories);

?>

	<!-- Portfolio Area End -->
    <div class="portfolio__page section-padding">
		<div class="container">
        <?php if ('yes' === $settings['show_filter']): ?>
			<div class="row">
				<div class="col-xl-12 mb-40">
					<div class="portfolio__page-btn">
                        <button class="active" data-filter="*">
                                            <?php echo esc_html($settings['all_text']); ?>
                                        </button>

                                        <?php if (!empty($categories_terms) && !is_wp_error($categories_terms)):
                                            foreach ($categories_terms as $term): ?>
                                                <button data-filter=".<?php echo esc_attr($term->name); ?>"><?php echo esc_html($term->name); ?></button>
                                        <?php endforeach;
                                        endif; ?>
                        </div>					  
				</div>
			</div>
            <?php endif; ?>
			<div class="row portfolio__page-active">
				
            <?php while ($portfolio_query->have_posts()):
                            $portfolio_query->the_post(); ?>
                            <?php
                            $terms = get_the_terms(get_the_ID(), 'portfolio_category');
                            if (!empty($terms)) {
                                $show_cat = $terms[0]->name;
                            }
                            ?>
                            <div class="<?php echo esc_attr($grid_column); ?> mt-30 <?php echo esc_attr($show_cat); ?>">
                                <div class="portfolio__page-item">
                                    <img class="img__full" src="<?php the_post_thumbnail_url('large'); ?>"
                                        alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>">
                                    <div class="portfolio__page-item-content">
                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        <p><a href="<?php the_permalink(); ?>"><?php echo esc_html($settings['cta_btn_text']); ?> <i class="far fa-long-arrow-right"></i></a></p>
                                    </div>
                                </div>
                            </div>

                            <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
				
		
                
			</div>
		</div>
	</div>
	<!-- Portfolio Area End -->

        <?php endif; ?>




        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Portfolio_Finaxio);