<?php

namespace MWD\ProgressiveContentFilterForm;

// Return the post type questions will be used to filter
function pcff_types_filter( $return ) {

    return $return;
}
add_filter( 'pcff_types', 'MWD\\ProgressiveContentFilterForm\\pcff_types_filter' );

// Only show "parent" taxonomy terms when selection questions with ACF
function show_only_parents( $args, $field ) {
	$args['parent'] = 0;
	return $args;
}
add_filter('acf/fields/taxonomy/query/name=pcff_question', 'MWD\\ProgressiveContentFilterForm\\show_only_parents', 10, 2);

// Add the questions shortcode to the content with a filter
function add_questions( $content ) {
	return $content . '[pcff-questions]';
}
add_filter( 'pcff_content_after', 'MWD\\ProgressiveContentFilterForm\\add_questions' );
