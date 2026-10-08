<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
	exit;

class Blog_Grid_Finaxio extends Widget_Base
{


	public function get_name()
	{
		return 'blog_grid_finaxio';
	}


	public function get_title()
	{
		return esc_html__('Blog Grid - Finaxio', 'finaxio-toolkit');
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
		return ['finaxio', 'Toolkit', 'Blog', 'Grid'];
	}

	protected function register_controls()
	{

		$this->start_controls_section(
			'section_general',
			[
				'label' => esc_html__('Style & Column', 'finaxio-toolkit'),
			]
		);

		$this->add_control(
			'select_design',
			[
				'label' => esc_html__('Select a Style', 'finaxio-toolkit'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'design-1' => esc_html__('Blog Style 01', 'finaxio-toolkit'),
					'design-2' => esc_html__('Blog Style 02', 'finaxio-toolkit'),
					'design-3' => esc_html__('Blog Style 03', 'finaxio-toolkit'),
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
			]
		);


		$this->end_controls_section();

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
			'word_limit',
			[
				'label' => esc_html__('Content Word Limit', 'finaxio-toolkit'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['count'],
				'range' => [
					'count' => [
						'min' => 5,
						'max' => 50,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'count',
					'size' => 10,
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

		$this->add_control(
			'blog_btn_text',
			[
				'label' => esc_html__('Blog Button', 'finaxio-toolkit'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Read More', 'finaxio-toolkit'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'author_text',
			[
				'label' => esc_html__('Author Text', 'finaxio-toolkit'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Post By', 'finaxio-toolkit'),
				'label_block' => true,
				'condition' => [
					'select_design' => ['design-4'],
				],
			]
		);

		$this->end_controls_section();



		$this->start_controls_section(
			'blog_item_style',
			[
				'label' => esc_html__('Item', 'finaxio-toolkit'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'blog_item_background',
			[
				'label' => esc_html__('Background', 'finaxio-toolkit'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog__three-item::before' => 'background: {{VALUE}}',
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
		$blog_column = $settings['columns_desktop'] . ' ' . $settings['columns_tab'];

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

		<?php if ('design-1' === $settings['select_design']): ?>
			<!-- BLog Two Start -->
			<div class="blog__two">
				<div class="container">
					<div class="row dark__image">
						<?php while ($post_query->have_posts()):
							$post_query->the_post(); ?>
							<div class="<?php echo esc_attr($blog_column); ?> mb-30">
								<div class="blog__two-item">
									<div class="blog__two-item-image">
										<img src="<?php the_post_thumbnail_url('large'); ?>"
											alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>">
									</div>
									<div class="blog__two-item-content">
										<span>
											<?php echo get_the_date(); ?>
										</span>
										<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
										<a class="simple-btn" href="<?php the_permalink(); ?>"><?php echo esc_html($settings['blog_btn_text']); ?></a>

									</div>
								</div>
							</div>
							<?php
						endwhile;
						wp_reset_query();
						?>
					</div>
				</div>
			</div>
			<!-- BLog Two End -->

		<?php endif; ?>


		<?php if ('design-2' === $settings['select_design']): ?>
			<!-- BLog Area Start -->
			<div class="blog__area">
				<div class="container">
					<div class="row dark__image">
						<?php while ($post_query->have_posts()):
							$post_query->the_post(); ?>
							<div class="<?php echo esc_attr($blog_column); ?> mb-30">
								<div class="blog__area-item">
									<div class="blog__area-item-area">
										<div class="blog__area-item-area-content">
											<div class="blog__area-item-area-meta">
												<ul>
													<li><a href="<?php the_permalink(); ?>"><?php finaxio_comments_count(); ?></a></li>
													<li><i class="fas fa-calendar-alt"></i>
														<?php echo get_the_date(); ?>
													</li>
												</ul>
											</div>
											<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
										</div>
										<div class="blog__area-item-area-post">
											<div class="blog__area-item-area-post-image">
												<?php echo get_avatar(get_the_author_meta('ID'), 80); ?>
											</div>
											<div class="blog__area-item-area-post-title">
												<span><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo esc_html('Posted By'); ?> <h5>
															<?php the_author(); ?>
														</h5></a></span>

											</div>
										</div>
									</div>
									<div class="blog__area-item-btn">
										<a href="<?php the_permalink(); ?>"><?php echo esc_html($settings['blog_btn_text']); ?><i
												class="far fa-long-arrow-right"></i></a>
									</div>
								</div>
							</div>
							<?php
						endwhile;
						wp_reset_query();
						?>
					</div>
				</div>
			</div>
			<!-- BLog Area End -->
		<?php endif; ?>



		<?php if ('design-3' === $settings['select_design']): ?>
			<!-- Blog Three Start -->
			<div class="blog__three">
				<div class="container">

					<div class="row dark__image">
						<?php while ($post_query->have_posts()):
							$post_query->the_post(); ?>
							<div class="<?php echo esc_attr($blog_column); ?> mb-30">
								<div class="blog__three-item">
									<div class="blog__three-item-image">
										<a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('large'); ?>"
												alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>"></a>
									</div>
									<div class="blog__three-item-content">
										<div class="blog__three-item-content-date">
											<h3>
												<?php echo get_the_date('d') ?>
											</h3>
											<p>
												<?php echo get_the_date('M') ?>
											</p>
										</div>
										<span><i class="fas fa-comment"></i>
											<?php finaxio_comments_count(); ?>
										</span>
										<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
										<div class="blog__three-item-content-author">
											<div class="blog__three-item-content-author-post">
												<div class="blog__three-item-content-author-post-image">
													<?php echo get_avatar(get_the_author_meta('ID'), 80); ?>
												</div>
												<div class="blog__three-item-content-author-post-title">
													<span><a
															href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo esc_html('Posted By'); ?> <h5>
																<?php the_author(); ?>
															</h5></a></span>

												</div>
											</div>

										</div>
									</div>
									<div class="blog__three-item-btn">
										<a href="<?php the_permalink(); ?>"><?php echo esc_html($settings['blog_btn_text']); ?><i
												class="far fa-long-arrow-right"></i></a>
									</div>
								</div>
							</div>

							<?php
						endwhile;
						wp_reset_query();
						?>
					</div>
				</div>
			</div>
			<!-- Blog Three End -->

		<?php endif; ?>


		<?php
	}
}

Plugin::instance()->widgets_manager->register(new Blog_Grid_Finaxio);