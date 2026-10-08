<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit;

class Blog_Widget_Finaxio extends Widget_Base
{


    public function get_name()
    {
        return 'blog_widget_finaxio';
    }


    public function get_title()
    {
        return esc_html__('Blog Widget - Finaxio', 'finaxio-toolkit');
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
        return ['finaxio', 'Toolkit', 'Blog', 'Widget'];
    }

    protected function register_controls()
    {



        $this->start_controls_section(
            'blog_query',
            [
                'label' => esc_html__('Blog Query', 'finaxio-toolkit'),
            ]
        );


        $this->add_control(
            'post_count',
            [
                'label' => esc_html__('Number Of Posts', 'finaxio-toolkit'),
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
                    'size' => 3,
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
                'options' => finaxio_post_categories(),
            ]
        );


        $this->end_controls_section();


		$this->start_controls_section(
			'blog_style',
			[
				'label' => esc_html__('Style', 'finaxio-toolkit'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'blog_meta_color',
			[
				'label' => esc_html__('Meta Color', 'finaxio-toolkit'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer__two-widget-post-item-content span' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'blog_title_color',
			[
				'label' => esc_html__('Title Color', 'finaxio-toolkit'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer__two-widget-post-item-content h6 a' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'blog_title_hover',
			[
				'label' => esc_html__('Title Hover Color', 'finaxio-toolkit'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer__two-widget-post-item-content h6 a:hover' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'blog_border_color',
			[
				'label' => esc_html__('Border Color', 'finaxio-toolkit'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer__two-widget-post-item' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();

        if (!empty($settings['category'])) {
            $post_query = new \WP_Query(
                array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => $settings['post_count']['size'],
                    'ignore_sticky_posts' => 1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
                            'terms' => $settings['category'],
                            'field' => 'slug',
                        )
                    )
                )
            );
        } else {

            $post_query = new \WP_Query(
                array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => $settings['post_count']['size'],
                    'ignore_sticky_posts' => 1,
                )
            );
        }

        ?>

        <div class="footer__two-widget-post dark__image">
            <?php while ($post_query->have_posts()):
                $post_query->the_post(); ?>
                <div class="footer__two-widget-post-item">
                    <div class="footer__two-widget-post-item-image">
                        <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('large'); ?>"
                                alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>"></a>
                    </div>
                    <div class="footer__two-widget-post-item-content">
                        <span>
                            <?php echo get_the_date(); ?>
                        </span>
                        <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                    </div>
                </div>
                <?php
            endwhile;
            wp_reset_query();
            ?>
        </div>

        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Blog_Widget_Finaxio);