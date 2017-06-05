<?php

namespace MWD\ProgressiveContentFilterForm;

class Shortcodes {

	function __construct() {

		//Initialize shortcodes
		$this->add_shortcodes();

	}

	/**
	* Add 'pccf-questions' shortcode
	*
	* @uses pccf_questions Function to build the shorcode
	*/
	function add_shortcodes() {
		add_shortcode( 'pcff-questions', array($this, 'pcff_questions'));
	}

	/**
	 * Build the shortcode, call templates
	 */
	function pcff_questions() {
		// Initialize the template loader
		$templates = new \MWD\ProgressiveContentFilterForm\Templates;

		ob_start();
		do_action('pcff-before-questions');

		$templates->get_template_part( 'questions' );

		do_action('pcff-after-questions');
		return ob_get_clean();
	}

}
