<?php

/**
 * [financer_WSH description]
 *
 * @return [type] [description]
 */
function financer_WSH() {
	return \FINANCER\Includes\Classes\Base::instance();
}

/**
 * [financer_dot description]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
function financer_dot( $data = array() ) {
	$dn = new \FINANCER\Includes\Classes\DotNotation( $data );

	return $dn;
}

/**
 * [financer_meta description].
 *
 * @param array $data [description]
 *
 * @return [type] [description]
 */
function financer_meta( $key, $id = '' ) {
	if ( empty( $id ) ) {
		$id = get_the_ID();
	}

	return ( get_post_meta( $id, $key, true ) ) ? get_post_meta( $id, $key, true ) : '';
}

function financerc_app( $class = 'base', $instance = true ) {
	$all   = array(
		'base' => '\FINANCER\Includes\Classes\Base',
		'vc'   => '\FINANCER\Includes\Classes\Visual_Composer',
		'ajax' => '\FINANCER\Includes\Classes\Ajax',
	);
	$dn    = financer_dot( $all );
	$class = ( $dn->get( $class ) ) ? $dn->get( $class ) : 'base';
	if ( $dn->get( $class ) ) {
		if ( $instance ) {
			return new $dn->get( $class );
		} else {
			return $dn->get( $classs );
		}
	} else {
		exit( esc_html__( 'No class found', 'financer' ) );
	}
}

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since FINANCER 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function financer_front_page_template( $template ) {
	return is_home() ? '' : $template;
}

add_filter( 'frontpage_template', 'financer_front_page_template' );
if ( ! function_exists( 'printr' ) ) {
	function printr( $arr ) {
		echo '<pre>';
		print_r( $arr );
		echo '</pre>';
		exit;
	}
}

/**
 * [financer_template_load description]
 *
 * @param  string $template [description]
 * @param  array  $args     [description]
 *
 * @return [type]           [description]
 */
function financer_template_load( $templ = '', $args = array() ) {
	$template = get_theme_file_path( $templ );
	if ( file_exists( $template ) ) {
		extract( $args );
		unset( $args );
		include $template;
	}
}

/**
 * [financer_get_sidebars description]
 *
 * @param  boolean $multi [description].
 *
 * @return [type]         [description]
 */
function financer_get_sidebars( $multi = false ) {
	global $wp_registered_sidebars;
	$sidebars = ! ( $wp_registered_sidebars ) ? get_option( 'wp_registered_sidebars' ) : $wp_registered_sidebars;
	if ( $multi ) {
		$data[] = array( 'value' => '', 'label' => '' );
	}
	foreach ( (array) $sidebars as $sidebar ) {
		if ( $multi ) {
			$data[] = array( 'value' => financer_set( $sidebar, 'id' ), 'label' => financer_set( $sidebar, 'name' ) );
		} else {
			$data[ financer_set( $sidebar, 'id' ) ] = financer_set( $sidebar, 'name' );
		}
	}

	return $data;
}

add_action( 'tgmpa_register', 'financer_register_required_plugins' );
/**
 * [my_theme_register_required_plugins description]
 *
 * @return void [description]
 */
function financer_register_required_plugins() {
	$plugins = array(
		array(
			'name'               => esc_html__( 'Financer Plugin', 'financer' ),
			'slug'               => 'financer-plugin',
			'source'             => get_template_directory() . '/includes/thirdparty/plugins/financer-plugin.zip',
			'required'           => true,
			'force_deactivation' => false,
			'file_path'          => ABSPATH . 'wp-content/plugins/financer-plugin/financer-plugin.php',
		),
		array(
			'name'			=> esc_html__('Contact Form 7', 'financer'),
			'slug'			=> 'contact-form-7',
			'required'		=> true,
		),
		array(
			'name'     => esc_html__( 'Elementor', 'financer' ),
			'slug'     => 'elementor',
			'required' => true,
		),
		array(
            'name'      => esc_html__('Mailchimp for WordPress', 'financer'),
            'slug'      => 'mailchimp-for-wp',
            'required'  => true,
		),
		array(
			'name'     		=> esc_html__('Woocommerce', 'financer'),
			'slug'     		=> 'woocommerce',
			'required' 		=> true,
		),
	);
	/*Change this to your theme text domain, used for internationalising strings.*/
	$theme_text_domain = 'financer';
	$config            = array(
		'id'           => 'tgmpa',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'parent_slug'  => 'themes.php',
		'capability'   => 'edit_theme_options',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);
	FINANCER\Includes\Library\tgmpa( $plugins, $config );
}

/**
 * [financer_logo description]
 *
 * @return [type] [description]
 */
function financer_logo( $logo_type, $image_logo, $logo_dimension, $logo_text, $logo_typography ) {
	if ( $logo_type === 'text' ) {
		$logo       = $logo_text ? $logo_text : '<span>' . esc_html__( 'FINANCER', 'financer' ) . '</span>';
		$logo_style = $logo_typography;
		$logo_the_style  = ( financer_set( $logo_style, 'font-size' ) ) ? 'font-size:' . financer_set( $logo_style, 'font-size' ) . ';' : '';
		$logo_the_style  .= ( financer_set( $logo_style, 'font-family' ) ) ? "font-family:'" . financer_set( $logo_style, 'font-family' ) . "';" : '';
		$logo_the_style  .= ( financer_set( $logo_style, 'font-weight' ) ) ? 'font-weight:' . financer_set( $logo_style, 'font-weight' ) . ';' : '';
		$logo_the_style  .= ( financer_set( $logo_style, 'line-height' ) ) ? 'line-height:' . financer_set( $logo_style, 'line-height' ) . ';' : '';
		$logo_the_style  .= ( financer_set( $logo_style, 'color' ) ) ? 'color:' . financer_set( $logo_style, 'color' ) . ';' : '';
		$logo_the_style  .= ( financer_set( $logo_style, 'letter-spacing' ) ) ? 'letter-spacing:' . financer_set( $logo_style, 'letter-spacing' ) . ';' : '';
		$logo_output       = '<a style="' . $logo_the_style . '" href="' . home_url( '/' ) . '" title="' . get_bloginfo( 'name' ) . '">' . wp_kses( $logo, true ) . '</a>';
	} else {
		$logo_the_style      = '';
		$logo_image_style = '';
		$logo_image_style .= financer_set( $logo_dimension, 'width' ) ? ' width:' . financer_set( $logo_dimension, 'width' ) . ';' : '';
		$logo_image_style .= financer_set( $logo_dimension, 'height' ) ? ' height:' . ( financer_set( $logo_dimension, 'height' ) ) . ';' : '';
		if ( financer_set( $image_logo, 'url' ) ) {
			$logo_output = '<a href="' . home_url( '/' ) . '" title="' . get_bloginfo( 'name' ) . '"><img src="' . esc_url( financer_set( $image_logo, 'url' ) ) . '" alt="'.esc_attr__('logo', 'financer').'" style="' . $logo_image_style . '" /></a>';
		} else {
			$logo_output = '<a href="' . esc_url(home_url('/')) . '" title="' . get_bloginfo( 'name' ) . '"><img src="' . get_template_directory_uri() . '/assets/images/logo.png' . '" alt="'.esc_attr__('logo', 'financer').'" style="' . $logo_image_style . '" /></a>';
		}
	}

	return $logo_output;
}

/**
 * [financer_twitter description]
 *
 * @param  string  $post_type [description].
 * @param  boolean $flip      [description].
 *
 * @return [type]             [description]
 */
function financer_twitter( $args = array() ) {
	$selector = financer_set( $args, 'selector' );
	$data     = financer_set( $args, 'data' );
	$count    = financer_set( $args, 'count', 3 );
	$screen   = financer_set( $args, 'screen_name', 'WordPress' );
	$settings = array( 'count' => $count, 'screen_name' => $screen );
	ob_start(); ?>
	jQuery(document).ready(function ($) {
	$('<?php echo esc_js( $selector ); ?>').tweets(<?php echo json_encode( $settings ); ?>);
	});
	<?php $jsOutput = ob_get_contents();
	ob_end_clean();
	wp_add_inline_script( 'twitter-tweets', $jsOutput );
}

/**
 * [financer_the_pagination description]
 *
 * @param  array   $args [description].
 * @param  integer $echo [description].
 *
 * @return [type]        [description]
 */


function financer_the_pagination() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<ul class="pagination clearfix">' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link(__( '<i class="fa fa-arrow-left left"></i>', 'financer' )) );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
 
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
 
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link(__( '<i class="fa fa-arrow-right right"></i>', 'financer' )) );
 
    echo '</ul>' . "\n";
 
}

function financer_the_breadcrumb() {
	global $wp_query;
	$queried_object = get_queried_object();
	$breadcrumb     = '';
	$delimiter      = ' / ';
	$before         = '<li class="breadcrumb-item">';
	$after          = '</li>';
	if ( ! is_front_page() ) {
		$breadcrumb .= $before . '<a href="' . home_url( '/' ) . '">' . esc_html__( 'Home', 'financer' ) . '</a>' . $after;
		/** If category or single post */
		if ( is_category() ) {
			$cat_obj       = $wp_query->get_queried_object();
			$this_category = get_category( $cat_obj->term_id );
			if ( $this_category->parent != 0 ) {
				$parent_category = get_category( $this_category->parent );
				$breadcrumb      .= get_category_parents( $parent_category, true, $delimiter );
			}
			$breadcrumb .= $before . '<a href="' . get_category_link( get_query_var( 'cat' ) ) . '">' . single_cat_title( '', false ) . '</a>' . $after;
		} elseif ( $wp_query->is_posts_page ) {
			$breadcrumb .= $before . $queried_object->post_title . $after;
		} elseif ( is_tax() ) {
			$breadcrumb .= $before . '<a href="' . get_term_link( $queried_object ) . '">' . $queried_object->name . '</a>' . $after;
		} elseif ( is_page() ) /** If WP pages */ {
			global $post;
			if ( $post->post_parent ) {
				$anc = get_post_ancestors( $post->ID );
				foreach ( $anc as $ancestor ) {
					$breadcrumb .= $before . '<a href="' . get_permalink( $ancestor ) . '">' . get_the_title( $ancestor ) . ' &nbsp;</a>' . $after;
				}
				$breadcrumb .= $before . '' . get_the_title( $post->ID ) . '' . $after;
			} else {
				$breadcrumb .= $before . '' . get_the_title() . '' . $after;
			}
		} elseif ( is_singular() ) {
			if ( $category = wp_get_object_terms( get_the_ID(), array( 'category', 'location', 'tax_feature' ) ) ) {
				if ( ! is_wp_error( $category ) ) {
					$breadcrumb .= $before . '<a href="' . get_term_link( financer_set( $category, '0' ) ) . '">' . financer_set( financer_set( $category, '0' ), 'name' ) . '&nbsp;</a>' . $after;
					$breadcrumb .= $before . '' . get_the_title() . '' . $after;
				} else {
					$breadcrumb .= $before . '' . get_the_title() . '' . $after;
				}
			} else {
				$breadcrumb .= $before . '' . get_the_title() . '' . $after;
			}
		} elseif ( is_tag() ) {
			$breadcrumb .= $before . '<a href="' . get_term_link( $queried_object ) . '">' . single_tag_title( '', false ) . '</a>' . $after;
		} /**If tag template*/
		elseif ( is_day() ) {
			$breadcrumb .= $before . '<a href="#">' . esc_html__( 'Archive for ', 'financer' ) . get_the_time( 'F jS, Y' ) . '</a>' . $after;
		} /** If daily Archives */
		elseif ( is_month() ) {
			$breadcrumb .= $before . '<a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '">'. get_the_time( 'F' ) . '</a>&nbsp;&nbsp;' . $after;
			$breadcrumb .= $before . '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '">'. get_the_time( 'Y' ) . '</a>' . $after;
		} /* If montly Archives /
		elseif ( is_year() ) {
			$breadcrumb .= $before . '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . esc_html__( 'Archive for ', 'financer' ) . get_the_time( 'Y' ) . '</a>' . $after;
		} /** If year Archives */
		elseif ( is_author() ) {
			$breadcrumb .= $before . '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '">' . esc_html__( 'Archive for ', 'financer' ) . get_the_author() . '</a>' . $after;
		} /** If author Archives */
		elseif ( is_search() ) {
			$breadcrumb .= $before . '' . esc_html__( 'Search Results for ', 'financer' ) . get_search_query() . '' . $after;
		} /** if search template */
		elseif ( is_404() ) {
			$breadcrumb .= $before . '' . esc_html__( '404 - Not Found', 'financer' ) . '' . $after;
			/** if search template */
		} elseif ( is_post_type_archive( 'product' ) ) {
			$shop_page_id = wc_get_page_id( 'shop' );
			if ( get_option( 'page_on_front' ) !== $shop_page_id ) {
				$shop_page = get_post( $shop_page_id );
				$_name     = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
				if ( ! $_name ) {
					$product_post_type = get_post_type_object( 'product' );
					$_name             = $product_post_type->labels->singular_name;
				}
				if ( is_search() ) {
					$breadcrumb .= $before . '<a href="' . get_post_type_archive_link( 'product' ) . '">' . $_name . '</a>' . $delimiter . esc_html__( 'Search results for &ldquo;', 'financer' ) . get_search_query() . '&rdquo;' . $after;
				} elseif ( is_paged() ) {
					$breadcrumb .= $before . '<a href="' . get_post_type_archive_link( 'product' ) . '">' . $_name . '</a>' . $after;
				} else {
					$breadcrumb .= $before . $_name . $after;
				}
			}
		} else {
			$breadcrumb .= $before . '<a href="' . get_permalink() . '">' . get_the_title() . '</a>' . $after;
		}
		/** Default value */
	}

	return $breadcrumb;
}

function financer_the_title( $template ) {
	global $wp_query;
	$queried_object = get_queried_object();
	$title          = '';
	/** If category or single post */
	if ( $template == 'category' || $template == 'tag' || $template == 'galleryCat' ) {
		$current_obj   = $wp_query->get_queried_object();
		$this_category = get_category( $current_obj->term_id );
		$title         .= $current_obj->name;
	} elseif ( is_home() ) {
		$title .= esc_html__( 'Home Page ', 'financer' );
	} elseif ( $template == 'page' || $template == 'post' || $template == 'VC' || $template == 'blog' || $template == 'courseDetail' || $template == 'team' || $template == 'services' || $template == 'events' || $template == 'gallery' || $template == 'shop' || $template == 'product' ) {
		$title .= get_the_title();
	} elseif ( $template == 'archive' and is_day() ) {
		$title .= esc_html__( 'Archive for ', 'financer' ) . get_the_time( 'F jS, Y' );
	} elseif ( $template == 'archive' and is_month() ) {
		$title .= esc_html__( 'Archive for ', 'financer' ) . get_the_time( 'F, Y' );
	} elseif ( $template == 'archive' and is_year() ) {
		$title .= esc_html__( 'Archive for ', 'financer' ) . get_the_time( 'Y' );
	} elseif ( $template == 'author' ) {
		$title .= esc_html__( 'Archive for ', 'financer' ) . get_the_author();
	} elseif ( $template == 'search' ) {
		$title .= esc_html__( 'Search Results for ', 'financer' ) . '"' . get_search_query() . '"';
	} elseif ( $template == '404' ) {
		$title .= esc_html__( '404 Page Not Found', 'financer' );
	}

	return $title;
}

/**
 * [financer_list_comments description]
 *
 * @param  [type] $comment [description].
 * @param  [type] $args    [description].
 * @param  [type] $depth   [description].
 *
 * @return void          [description]
 */
function financer_list_comments( $comment, $args, $depth ) {
	$allowed_html = wp_kses_allowed_html( 'post' );

	wp_enqueue_script( 'comment-reply' );
	$GLOBALS['comment'] = $comment;
	$like               = (int) get_comment_meta( $comment->comment_ID, 'like_it', true ); ?>
	
    <div class="financer-comment-item">        
        <div class="single-comment">
            <div <?php comment_class('comment');?> id="comment-<?php comment_ID(); ?>">
                <figure class="comment-thumb">
                    <?php echo wp_kses( get_avatar( $comment, 70 ), true ); ?>
                </figure>
                
                <h5><?php echo wp_kses( get_comment_author(), true ); ?><span><?php echo get_comment_date( '', get_comment_ID() ); ?></span></h5>
                
				<div class="text"><?php comment_text(); ?></div>
                <?php 
                    comment_reply_link( array_merge($args, array(
                    'reply_text' => '' . esc_html( 'Reply', 'financer' ).'',
                    'depth'      => $depth,
                    'max_depth'  => $args['max_depth'],
                    )
                )); ?>         
            </div>
        </div>
	<?php
}

function financer_comment_reply_link_class( $class ) {
	$class = str_replace( "class='comment-reply-link", "class='comment-reply-link reply-btn", $class );
	return $class;
}

add_filter( 'comment_reply_link', 'financer_comment_reply_link_class' );

/**
 * [comment_form description]
 *
 * @param  array $args [description].
 * @param  [type] $post_id [description].
 *
 * @return void          [description]
 */
function financer_comment_form( $args = array(), $post_id = null ) {
	if ( null === $post_id ) {
		$post_id = get_the_ID();
	}
	$allowed_html = wp_kses_allowed_html( 'post' );
	$commenter     = wp_get_current_commenter();
	$user          = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';
	$args          = wp_parse_args( $args );
	if ( ! isset( $args['format'] ) ) {
		$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';
	}
	$req                 = get_option( 'require_name_email' );
	$aria_req            = ( $req ? " aria-required='true'" : '' );
	$html_req            = ( $req ? " required='required'" : '' );
	$html5               = 'html5' === $args['format'];
	$comment_field_class = is_user_logged_in() ? 'col-sm-12' : 'col-sm-6';
	$fields              = array(
		'author' => '<div class="col-lg-6 col-md-6 col-sm-12 form-group"><input id="author" name="author"  placeholder="' . esc_attr__( 'Name', 'financer' ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245"' . $aria_req . $html_req . ' /></div>',
		'email'  => '<div class="col-lg-6 col-md-6 col-sm-12 form-group"><input id="email" placeholder="' . esc_attr__( 'Email', 'financer' ) . '" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" maxlength="100"/></div>',
		
	);
	$required_text       = sprintf( ' ' . esc_html__( '%s', 'financer' ), '' );
	/**
	 * Filters the default comment form fields.
	 *
	 * @since 3.0.0
	 *
	 * @param array $fields The default comment fields.
	 */
	$fields   = apply_filters( 'comment_form_default_fields', $fields );
	$defaults = array(
		'fields'               => $fields,
		'comment_field'        => '<div class="col-lg-12 col-md-12 col-sm-12 form-group"><textarea  placeholder="' . esc_attr__( 'Type Comment here', 'financer' ) . '"  id="comment" name="comment" rows="7"  required="required"></textarea></div>',
		/** This filter is documented in wp-includes/link-template.php */
		'must_log_in'          => '<div class="log-in-text"><p class="must-log-in">' . sprintf(
			/* translators: %s: login URL */
				esc_html__( 'You must be <a href="%s">logged in</a> to post a comment.', 'financer' ),
				wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) )
			) . '</p></div>',
		/** This filter is documented in wp-includes/link-template.php */
		'logged_in_as'         => '<div class="col-lg-12 col-md-12 col-sm-12"><p class="logged-in-as">' . sprintf(
			/* translators: 1: edit user link, 2: accessibility text, 3: user name, 4: logout URL */
				'<a href="%1$s" aria-label="%2$s">' . esc_html__( 'Logged in as', 'financer' ) . ' %3$s</a>. <a href="%4$s">' . esc_html__( 'Log out?', 'financer' ) . '</a>',
				get_edit_user_link(),
				/* translators: %s: user name */
				esc_attr( sprintf( esc_html__( 'Logged in as %s. Edit your profile.', 'financer' ), $user_identity ) ),
				$user_identity,
				wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) )
			) . '</p></div>',
		'comment_notes_before' => '',
		'comment_notes_after'  => '',
		'action'               => site_url( '/wp-comments-post.php' ),
		'id_form'              => 'review-form',
		'id_submit'            => 'submit',
		'class_form'           => '',
		'class_submit'         => 'submit',
		'name_submit'          => 'submit',
		'title_reply'          => esc_html__( 'Leave A Comment', 'financer' ),
		'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'financer' ),
		'title_reply_before'   => '<h3 class="widget_title">',
		'title_reply_after'    => '</h3>',
		'cancel_reply_before'  => ' <small>',
		'cancel_reply_after'   => '</small>',
		'cancel_reply_link'    => esc_html__( 'Cancel reply', 'financer' ),
		'label_submit'         => esc_html__( 'Post a Comment', 'financer' ),
		'submit_button'        => '<button name="%1$s" type="submit" id="%2$s" class="%3$s btn_style_one" value="%4$s"><span>Post Comment</span></button>',
		'submit_field'         => '<div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn m-0">%1$s %2$s</div>',
		'format'               => 'xhtml',
	);
	/**
	 * Filters the comment form default arguments.
	 * Use {@see 'comment_form_default_fields'} to filter the comment fields.
	 *
	 * @since 3.0.0
	 *
	 * @param array $defaults The default comment form arguments.
	 */
	$args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );
	$args = array_merge( $defaults, $args );
	if ( comments_open( $post_id ) ) : ?>
		<?php
		/**
		 * Fires before the comment form.
		 *
		 * @since 3.0.0
		 */
		do_action( 'comment_form_before' );
		?>
        <div id="respond" class="comment_form_area">
        
            <?php
            echo wp_kses( $args['title_reply_before'], $allowed_html );
            comment_form_title( $args['title_reply'], $args['title_reply_to'] );
            echo wp_kses( $args['cancel_reply_before'], $allowed_html );
            cancel_comment_reply_link( $args['cancel_reply_link'] );
            echo wp_kses( $args['cancel_reply_after'], $allowed_html );
            echo wp_kses( $args['title_reply_after'], $allowed_html );
            if ( get_option( 'comment_registration' ) && ! is_user_logged_in() ) :
                echo wp_kses( $args['must_log_in'], $allowed_html );
                /**
                 * Fires after the HTML-formatted 'must log in after' message in the comment form.
                 *
                 * @since 3.0.0
                 */
                do_action( 'comment_form_must_log_in_after' );
            else : ?>
           	
            <div class="form_inner">
                <form action="<?php echo esc_url( $args['action'] ); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>"<?php echo wp_kses( $html5, $allowed_html ) ? ' novalidate' : ''; ?>>
                    <div class="row clearfix">
                        <?php
                        /**
                         * Fires at the top of the comment form, inside the form tag.
                         *
                         * @since 3.0.0
                         */
                        do_action( 'comment_form_top' );
                        if ( is_user_logged_in() ) :
                            /**
                             * Filters the 'logged in' message for the comment form for display.
                             *
                             * @since 3.0.0
                             *
                             * @param string $args_logged_in The logged-in-as HTML-formatted message.
                             * @param array  $commenter      An array containing the comment author's
                             *                               username, email, and URL.
                             * @param string $user_identity  If the commenter is a registered user,
                             *                               the display name, blank otherwise.
                             */
                            echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity );
                            /**
                             * Fires after the is_user_logged_in() check in the comment form.
                             *
                             * @since 3.0.0
                             *
                             * @param array  $commenter     An array containing the comment author's
                             *                              username, email, and URL.
                             * @param string $user_identity If the commenter is a registered user,
                             *                              the display name, blank otherwise.
                             */
                            do_action( 'comment_form_logged_in_after', $commenter, $user_identity );
                        else :
                            echo wp_kses( $args['comment_notes_before'], $allowed_html );
                        endif;
                        $comment_fields = (array) $args['fields'] + array( 'comment' => $args['comment_field'] );
                        /**
                         * Filters the comment form fields, including the textarea.
                         *
                         * @since 4.4.0
                         *
                         * @param array $comment_fields The comment fields.
                         */
                        $comment_fields     = apply_filters( 'comment_form_fields', $comment_fields );
                        $comment_field_keys = array_diff( array_keys( $comment_fields ), array( 'comment' ) );
                        $first_field        = reset( $comment_field_keys );
                        $last_field         = end( $comment_field_keys ); ?>
                        <?php foreach ( $comment_fields as $name => $field ) {
                            if ( 'comment' === $name ) {
                                /**
                                 * Filters the content of the comment textarea field for display.
                                 *
                                 * @since 3.0.0
                                 *
                                 * @param string $args_comment_field The content of the comment textarea field.
                                 */
                                echo apply_filters( 'comment_form_field_comment', $field );
                                echo wp_kses( $args['comment_notes_after'], $allowed_html );
                            } elseif ( ! is_user_logged_in() ) {
                                if ( $first_field === $name ) {
                                    /**
                                     * Fires before the comment fields in the comment form, excluding the textarea.
                                     *
                                     * @since 3.0.0
                                     */
                                    do_action( 'comment_form_before_fields' );
                                }
                                /**
                                 * Filters a comment form field for display.
                                 * The dynamic portion of the filter hook, `$name`, refers to the name
                                 * of the comment form field. Such as 'author', 'email', or 'url'.
                                 *
                                 * @since 3.0.0
                                 *
                                 * @param string $field The HTML-formatted output of the comment form field.
                                 */
                                echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";
                                if ( $last_field === $name ) {
                                    /**
                                     * Fires after the comment fields in the comment form, excluding the textarea.
                                     *
                                     * @since 3.0.0
                                     */
                                    do_action( 'comment_form_after_fields' );
                                }
                            }
                        } ?>
                        <?php $submit_button = sprintf(
                            $args['submit_button'],
                            esc_attr( $args['name_submit'] ),
                            esc_attr( $args['id_submit'] ),
                            esc_attr( $args['class_submit'] ),
                            esc_attr( $args['label_submit'] )
                        );
                        /**
                         * Filters the submit button for the comment form to display.
                         *
                         * @since 4.2.0
                         *
                         * @param string $submit_button HTML markup for the submit button.
                         * @param array  $args          Arguments passed to `comment_form()`.
                         */
                        $submit_button = apply_filters( 'comment_form_submit_button', $submit_button, $args );
                        $submit_field  = sprintf(
                            $args['submit_field'],
                            $submit_button,
                            get_comment_id_fields( $post_id )
                        );
                        /**
                         * Filters the submit field for the comment form to display.
                         * The submit field includes the submit button, hidden fields for the
                         * comment form, and any wrapper markup.
                         *
                         * @since 4.2.0
                         *
                         * @param string $submit_field HTML markup for the submit field.
                         * @param array  $args         Arguments passed to comment_form().
                         */
                        echo apply_filters( 'comment_form_submit_field', $submit_field, $args );
                        /**
                         * Fires at the bottom of the comment form, inside the closing </form> tag.
                         *
                         * @since 1.5.0
                         *
                         * @param int $post_id The post ID.
                         */
                        do_action( 'comment_form', $post_id );
                        ?>
                    </div>
                </form>
            </div>
            <?php endif; ?>
        
        </div>
		<?php
		/**
		 * Fires after the comment form.
		 *
		 * @since 3.0.0
		 */
		do_action( 'comment_form_after' );
	else :
		/**
		 * Fires after the comment form if comments are closed.
		 *
		 * @since 3.0.0
		 */
		do_action( 'comment_form_comments_closed' );
	endif;
}

if( ! function_exists('financer_filesystem') ) {
	/**
	 * [fixkar_filesystem description]
	 * @return [type] [description]
	 */
	function financer_filesystem() {
		if( ! function_exists('require_filesystem_credentials')) {
			require_once ABSPATH . 'wp-admin/includes/file.php';
		}

		/* you can safely run request_filesystem_credentials() without any issues and don't need to worry about passing in a URL */
		$creds = request_filesystem_credentials(esc_url(home_url('/')), '', false, false, array());

		/* initialize the API */
		if ( ! WP_Filesystem($creds) ) {
			/* any problems and we exit */
			return false;
		}	

		global $wp_filesystem;
		/* do our file manipulations below */

		return $wp_filesystem;
	}
}


if( ! function_exists('financer_get_server') ) {

	function financer_get_server($key = '', $value = '') {
		if( function_exists('financer_server') ) {
			return financer_server($key, $value);
		}

		return [];
	}
}

function financer_body_classes( $classes ) {
    $classes[] = 'menu-layer';
      
    return $classes;
}
add_filter( 'body_class','financer_body_classes' );

function financer_custom_fonts_load( $custom_font ) {

    $custom_style = '';
    
    $pathinfo = pathinfo($custom_font);
    
    if ( $filename = financer_set( $pathinfo, 'filename' ) ) {
        $custom_style .= '@font-face{
            font-family:"'.$filename.'";';
            $extensions = array( 'eot', 'woff', 'woff2', 'ttf', 'svg' );
            $count = 0;
            foreach( $extensions as $extension ) {
                $file_path = get_template_directory() . '/assets/css/custom-fonts/' . $filename . '.' . $extension;
                $file_url = get_template_directory_uri() . '/assets/css/custom-fonts/' . $filename . '.' . $extension;
    
                if ( file_exists( $file_path ) ) {
                    $format = $extension;
                    if ( $extension === 'eot' ) {
                        $format = 'embedded-opentype';
                    }
                    if ( $extension === 'ttf' ) {
                        $format = 'truetype';
                    }
                    $terminated = ( $count > 0 ) ? ',' : '';
                    $custom_style .= $terminated . 'src:url("'.$file_url.'") format("'.$format.'")';
    
                    $count++;
                }
            }
    
            $custom_style .= ';}';
        }
    
        return $custom_style;
}


/**
 * Add icomoon existing font library
 *
 * @since 0.0.1
 */
if( ! function_exists('financer_el_flat_icon') ) {
	function financer_el_flat_icon($args) {

		
		$args['icomoon'] =  [
			'name' 			=> 'icon',
			'label' 		=> esc_html__( 'Icomoon', 'financer' ),
			'url' 			=> get_template_directory_uri() . '/assets/css/icomoon.css',
			'enqueue' 		=> [ get_template_directory_uri() . '/assets/css/icomoon.css' ],
			'prefix' 		=> '',
			'labelIcon' 	=> '',
			'ver' 			=> '1.0',
			'fetchJson' 	=> get_template_directory_uri() . '/assets/js/icomoon.js',
			'native' 		=> true,
		];
				
		return $args;
	}
}
add_filter( 'elementor/icons_manager/native', 'financer_el_flat_icon' );

function financer_trim( $text, $len, $more = null )
	{
		$text = strip_shortcodes( $text );
		$text = apply_filters( 'the_content', $text );
		$text = str_replace(']]>', ']]&gt;', $text);
		$excerpt_length = apply_filters( 'excerpt_length', $len );
		$excerpt_more = apply_filters( 'excerpt_more', ' ' . '[&hellip;]' );
		$excerpt_more = ( $more ) ? $more : ' ...';
		$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
		return $text;
	}