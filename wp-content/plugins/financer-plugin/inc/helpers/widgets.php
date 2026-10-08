<?php

///----footer widgets---
//About Us
class Financer_About_Us extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Financer_About_Us', /* Name */esc_html__('Financer About Us','financer'), array( 'description' => esc_html__('Show the About Us', 'financer' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		echo wp_kses_post($before_widget);?>
    
        <div class="about_widget aos-init aos-animate" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="500">
            <?php if($instance[ 'widget_logo_image' ]){ ?>
            <figure class="footer_logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $instance[ 'widget_logo_image' ] );?>" alt="<?php esc_attr_e('Awesome Image' ,'financer');?>"></a>
            </figure>
            <?php } ?>
            <p><?php echo wp_kses( $instance[ 'content' ], true );?></p>
            
			<?php if( $instance['show'] ): ?>
            <ul class="social-links">
                <?php echo (financer_get_social_icon()); ?>
            </ul>
            <?php endif; ?>
        </div>
                                     
        <?php		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['widget_logo_image'] = strip_tags($new_instance['widget_logo_image']);
		$instance['content'] = $new_instance['content'];
		$instance['show'] = $new_instance['show'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$widget_logo_image = ($instance) ? esc_attr($instance['widget_logo_image']) : '';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$show = ($instance) ? esc_attr($instance['show']) : '';
	?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('widget_logo_image')); ?>"><?php esc_html_e('Logo Image Url: ', 'financer'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('widget_logo_image')); ?>" name="<?php echo esc_attr($this->get_field_name('widget_logo_image')); ?>" type="text" value="<?php echo esc_attr( $widget_logo_image ); ?>" />
        </p> 
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'financer'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('show')); ?>"><?php esc_html_e('Show Social Icons:', 'financer'); ?></label>
            <?php $selected = ( $show ) ? ' checked="checked"' : ''; ?>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('show')); ?>"<?php echo esc_attr($selected); ?> name="<?php echo esc_attr($this->get_field_name('show')); ?>" type="checkbox" value="true" />
        </p>
        
    <?php 
	}
	
}

//Newsletter
class Financer_Newsletter extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Financer_Newsletter', /* Name */esc_html__('Financer Newsletter','financer'), array( 'description' => esc_html__('Show the Newsletter', 'financer' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);
		?>
        
        <div class="newsletter_widget aos-init aos-animate" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="650">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <p><?php echo wp_kses( $instance[ 'widget_form_text' ], true );?></p>
            <div class="subscribe-inner">
                <div class="subscribe-form">
                    <?php echo do_shortcode( $instance[ 'mailchimp_form_url' ] );?>
                </div>
            </div>
        </div>
                                          
        <?php		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['widget_form_text'] = $new_instance['widget_form_text'];
		$instance['mailchimp_form_url'] = $new_instance['mailchimp_form_url'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : '';
		$widget_form_text = ($instance) ? esc_attr($instance['widget_form_text']) : '';
		$mailchimp_form_url = ($instance) ? esc_attr($instance['mailchimp_form_url']) : '';
	?>
     
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'financer'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('widget_form_text')); ?>"><?php esc_html_e('Form Description:', 'financer'); ?></label>
        <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('widget_form_text')); ?>" name="<?php echo esc_attr($this->get_field_name('widget_form_text')); ?>" ><?php echo wp_kses_post($widget_form_text); ?></textarea>
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('mailchimp_form_url')); ?>"><?php esc_html_e('Mailchimp Form Url:', 'financer'); ?></label>
        <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('mailchimp_form_url')); ?>" name="<?php echo esc_attr($this->get_field_name('mailchimp_form_url')); ?>" ><?php echo wp_kses_post($mailchimp_form_url); ?></textarea>
    </p>
    
    <?php 
	}
	
}



//Blog Widgets
//Recent Posts
class Financer_Recent_Posts extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Financer_Recent_Posts', /* Name */esc_html__('Financer Recent Posts','financer'), array( 'description' => esc_html__('Show the Recent Posts', 'financer' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo wp_kses_post($before_widget); ?>
		
		<!-- Product Widget -->
        <div class="sidebar_blog_post" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <div class="blog-post">
                <?php $query_string = array('showposts'=>$instance['number']);
				if ($instance['cat']) {
					$query_string['tax_query'] = array(array('taxonomy' => 'category','field' => 'id','terms' => (array)$instance['cat']));
				}
				$this->posts($query_string); ?>
            </div>
        </div>
                
		<?php echo wp_kses_post($after_widget);
	}
 
 
	/* @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/* @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Recent Post', 'financer');
		$number = ( $instance ) ? esc_attr($instance['number']) : 3;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'financer'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'financer'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php esc_html_e('Category', 'financer'); ?></label>
            <?php wp_dropdown_categories(array('show_option_all'=>esc_html__('All Categories', 'financer'), 'taxonomy' => 'category', 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('cat'))); ?>
        </p>
            
		<?php 
	}
	
	function posts($query_string)
	{
		
		$query = new WP_Query($query_string);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
			<?php 
				while ( $query->have_posts() ) : $query->the_post(); 
			?>
            <div class="single_post">
                <div class="inner">
                    <div class="img-box">
                        <?php if(has_post_thumbnail()){ ?>
                        	<?php the_post_thumbnail('full'); ?>
                        <?php } ?>
                        <div class="overlay-content">
                            <a href="<?php echo esc_url(get_the_permalink(get_the_id()));?>"><i class="fa fa-link" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="title-box">
                        <h4><a href="<?php echo esc_url(get_the_permalink(get_the_id()));?>"><?php the_title()?></a></h4>
                        <p><span class="icon-21"></span> <?php echo get_the_date('');?></p>
                    </div>
                </div>
            </div>                                                
            <?php endwhile; ?>
            
        <?php endif;
		wp_reset_postdata();
    }
}

//Our Gallery
class Financer_Our_Gallery extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Financer_Our_Gallery', /* Name */esc_html__('Financer Our Gallery','financer'), array( 'description' => esc_html__('Show the Our Gallery', 'financer' )) );
	}
 
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
        <!-- Sidebar Widget / Gallery Posts -->
        <div class="photo_gallery_box" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <ul class="gallery">
                <?php 
					$args = array('post_type' => 'project', 'showposts'=>$instance['number']);
					if( $instance['cat'] ) $args['tax_query'] = array(array('taxonomy' => 'project_cat','field' => 'id','terms' => (array)$instance['cat']));
					$this->posts($args);
				?>
            </ul>
        </div>
                        
        <?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}
	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : 'Our Gallery';
		$number = ( $instance ) ? esc_attr($instance['number']) : 6;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';
		?>
		
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'financer'); ?></label>
            <input placeholder="<?php esc_attr_e('Recent Gallery', 'financer');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('Number of posts: ', 'financer'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'financer'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'financer'), 'selected'=>$cat, 'taxonomy' => 'project_cat', 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
        
		<?php 
	}
	
	function posts($args)
	{
		
		$query = new WP_Query($args);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
            <?php 
				global $post;
				while( $query->have_posts() ): $query->the_post(); 
				$post_thumbnail_id = get_post_thumbnail_id($post->ID);
				$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id); 
			?>
            <li class="gallery_post">
                <div class="inner">
                    <div class="img-box">
                        <?php the_post_thumbnail('full'); ?>
                        <div class="overlay-content">
                            <a class="img-popup" data-fancybox="gallery" href="<?php echo esc_url($post_thumbnail_url);?>">
                                <span class="fa fa-search-plus"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </li>
            <?php endwhile; ?>
                
        <?php endif;
		wp_reset_postdata();
    }
}


//Any Question
class Financer_Any_Question extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Financer_Any_Question', /* Name */esc_html__('Financer Any Question','financer'), array( 'description' => esc_html__('Show the Any Question', 'financer' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );		
		echo wp_kses_post($before_widget);
		?>
        
        <!-- Help Widget -->
        <div class="sidebar-widget help-widget" style="background-image:url('<?php echo esc_url( $instance['widget_bg_img'] );?>')">
            <h3><?php echo wp_kses( $instance[ 'any_question_title' ], true );?></h3>
            <div class="help-widget_icon">
                <i class="fa-solid fa-phone fa-fw"></i>
            </div>
            <div class="help-widget_text"><?php echo wp_kses( $instance[ 'widget_phone_title' ], true );?></div>
            <a class="help-widget_phone" href="tel:<?php echo esc_attr( $instance[ 'widget_phone_no' ] );?>"><?php echo wp_kses( $instance[ 'widget_phone_no' ], true );?></a>
        </div>
                           
        <?php		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['widget_bg_img'] = $new_instance['widget_bg_img'];
		$instance['any_question_title'] = $new_instance['any_question_title'];
		$instance['widget_phone_title'] = $new_instance['widget_phone_title'];
		$instance['widget_phone_no'] = $new_instance['widget_phone_no'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$widget_bg_img = ($instance) ? esc_attr($instance['widget_bg_img']) : '';
		$any_question_title = ($instance) ? esc_attr($instance['any_question_title']) : '';
		$widget_phone_title = ($instance) ? esc_attr($instance['widget_phone_title']) : '';
		$widget_phone_no = ($instance) ? esc_attr($instance['widget_phone_no']) : '';
	?>
     
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('widget_bg_img')); ?>"><?php esc_html_e('BG Image url: ', 'financer'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('widget_bg_img')); ?>" name="<?php echo esc_attr($this->get_field_name('widget_bg_img')); ?>" type="text" value="<?php echo esc_attr( $widget_bg_img ); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('any_question_title')); ?>"><?php esc_html_e('Title: ', 'financer'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('any_question_title')); ?>" name="<?php echo esc_attr($this->get_field_name('any_question_title')); ?>" type="text" value="<?php echo esc_attr( $any_question_title ); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('widget_phone_title')); ?>"><?php esc_html_e('Phone Title: ', 'financer'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('widget_phone_title')); ?>" name="<?php echo esc_attr($this->get_field_name('widget_phone_title')); ?>" type="text" value="<?php echo esc_attr( $widget_phone_title ); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('widget_phone_no')); ?>"><?php esc_html_e('Phone No.: ', 'financer'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('widget_phone_no')); ?>" name="<?php echo esc_attr($this->get_field_name('widget_phone_no')); ?>" type="text" value="<?php echo esc_attr( $widget_phone_no ); ?>" />
    </p>
    
    <?php 
	}
	
}