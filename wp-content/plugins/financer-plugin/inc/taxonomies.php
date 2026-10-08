<?php

namespace FINANCERPLUGIN\Inc;


use FINANCERPLUGIN\Inc\Abstracts\Taxonomy;


class Taxonomies extends Taxonomy {


	public static function init() {

		$labels = array(
			'name'              => _x( 'Project Category', 'wpfinancer' ),
			'singular_name'     => _x( 'Project Category', 'wpfinancer' ),
			'search_items'      => __( 'Search Category', 'wpfinancer' ),
			'all_items'         => __( 'All Categories', 'wpfinancer' ),
			'parent_item'       => __( 'Parent Category', 'wpfinancer' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpfinancer' ),
			'edit_item'         => __( 'Edit Category', 'wpfinancer' ),
			'update_item'       => __( 'Update Category', 'wpfinancer' ),
			'add_new_item'      => __( 'Add New Category', 'wpfinancer' ),
			'new_item_name'     => __( 'New Category Name', 'wpfinancer' ),
			'menu_name'         => __( 'Project Category', 'wpfinancer' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'project_cat' ),
		);

		register_taxonomy( 'project_cat', 'project', $args );
		
		
		//Testimonials Taxonomy Start
		$labels = array(
			'name'              => _x( 'Testimonials Category', 'wpfinancer' ),
			'singular_name'     => _x( 'Testimonials Category', 'wpfinancer' ),
			'search_items'      => __( 'Search Category', 'wpfinancer' ),
			'all_items'         => __( 'All Categories', 'wpfinancer' ),
			'parent_item'       => __( 'Parent Category', 'wpfinancer' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpfinancer' ),
			'edit_item'         => __( 'Edit Category', 'wpfinancer' ),
			'update_item'       => __( 'Update Category', 'wpfinancer' ),
			'add_new_item'      => __( 'Add New Category', 'wpfinancer' ),
			'new_item_name'     => __( 'New Category Name', 'wpfinancer' ),
			'menu_name'         => __( 'Testimonials Category', 'wpfinancer' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'testimonials_cat' ),
		);


		register_taxonomy( 'testimonials_cat', 'testimonials', $args );
		
		
		//Team Taxonomy Start
		$labels = array(
			'name'              => _x( 'Team Category', 'wpfinancer' ),
			'singular_name'     => _x( 'Team Category', 'wpfinancer' ),
			'search_items'      => __( 'Search Category', 'wpfinancer' ),
			'all_items'         => __( 'All Categories', 'wpfinancer' ),
			'parent_item'       => __( 'Parent Category', 'wpfinancer' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpfinancer' ),
			'edit_item'         => __( 'Edit Category', 'wpfinancer' ),
			'update_item'       => __( 'Update Category', 'wpfinancer' ),
			'add_new_item'      => __( 'Add New Category', 'wpfinancer' ),
			'new_item_name'     => __( 'New Category Name', 'wpfinancer' ),
			'menu_name'         => __( 'Team Category', 'wpfinancer' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'team_cat' ),
		);


		register_taxonomy( 'team_cat', 'team', $args );
		
		
		
	}
	
}
