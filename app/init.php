<?php

namespace MWD\ProgressiveContentFilterForm;

class Init {

	function __construct() {

		/**
		* Includes
		*
		* The $includes array determines the code library included in your theme.
		* Add or remove files to the array as needed. Supports child theme overrides.
		*
		* Please note that missing files will produce a fatal error.
		*
		*/

		$includes = [
			'actions_filters.php',			// Actions and filters
			'types/taxonomy-questions.php',		// Questions Taxonomy
		];
		foreach ($includes as $file) {
			require_once PCFF_PLUGIN_DIR . 'app/' . $file;
		}
		unset($file);

		// Actions and Filters

		// Append questions to content
		add_filter( 'the_content', array( $this, 'process_the_content' ) );

		// Set up contextual data for templates
		add_action('pcff-before-questions', array($this, 'questions_context') );
		add_action('pcff-before-questions-item', array($this, 'questions_item_context') );

		// Enqueue script on necessary pages
		add_action('wp_enqueue_scripts', array( $this, 'front_end_scripts' ) );

		// Register ACF fields
		add_action( 'acf/init', array( $this, 'fields' ), 0 );

	}

	// Register ACF fields
	function fields() {
		foreach(glob(PCFF_PLUGIN_DIR . 'app/fields/*.php') as $field) {
		    include($field);
		}
	}

	// Enqueue front-end scripts
	function front_end_scripts() {
		if(have_rows('pcff_questions')) {
			wp_enqueue_script( 'pcff-script', PCFF_PLUGIN_URL . 'assets/scripts/main.js' );
		}

	}

	/**
	* Append questions to the WordPress the_content()
	*
	* @param string $content The original WordPress content
	* @return string
	*/
	function process_the_content( $content ) {
		if(in_the_loop ()) {
			// Only edit the_content() if blocks have been added to this $post
			if(have_rows('pcff_questions')) {
				$content_before     = '';
				$content_after      = '';
				$content_before     = (!empty($content)) ? apply_filters('pcff_content_before', $content_before) : '';
				$content_after      = (!empty($content)) ? apply_filters('pcff_content_after', $content_after) : '';
				$content = $content_before . $content . $content_after;
				return $content;
			} else {
				// If no questions are present, return the content unmolested
				return $content;
			}
		}
	}


		/**
		* Set template context for questions group
		*
		* @return string string of classes
		*/
		function questions_context() {
			// Initialize the templates class
			$templates = new \MWD\ProgressiveContentFilterForm\Templates;
			// Set the default classes for elements
			$class_basename = 'pcff-questions';
			$classes    = array();
			$classes[]  = $class_basename;
			$classes = apply_filters( 'pcff_set_questions_classes', $classes );
			// Set up template context array
			$context  = array();
			$context['template'] = $templates;
			$context['classes'] = esc_attr(trim(implode(' ', $classes)));
			$context['answers'] = (isset($_POST['pcff-answers'])) ? $_POST['pcff-answers'] : null;
			// Set template data
			$templates->set_template_data( $context, 'context' );
		}

		/**
		* Set template context for question single
		*
		* @return string string of classes
		*/
		function questions_item_context() {
			// Initialize the templates class
			$templates = new \MWD\ProgressiveContentFilterForm\Templates;
			// Set the default classes for elements
			$class_basename = 'pcff-questions-item';
			$classes    = array();
			$classes[]  = $class_basename;
			$classes = apply_filters( 'pcff_set_questions_item_classes', $classes );
			// Set up template context array
			$context  = array();
			$context['template'] = $templates;
			$context['classes'] = esc_attr(trim(implode(' ', $classes)));
			// Set template data
			$templates->set_template_data( $context, 'context' );
		}


}
