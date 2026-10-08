<?php

namespace FINANCER\Includes\Classes;


/**
 * Header and Footer Hooks class
 */
class Hooks {


	function __construct() {

		add_action( 'financer_main_header', array( $this, 'header' ) );
		add_action( 'financer_main_footer', array( $this, 'footer' ) );
	}

	/**
	 * Hook up main headers with different header styles
	 *
	 * @return void This function returns nothing.
	 */
	function header() {


	}

	/**
	 * Hook up main footer with different footer styles
	 *
	 * @return void This function returns nothing.
	 */
	function footer() {


	}


}