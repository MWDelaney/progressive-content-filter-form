<?php

use PostTypes\PostType;

$filter_type = apply_filters('pcff_types', 'post');
// Initialize the post type we're working with
$type = new PostType($filter_type);

// Taxonomy names
$tax_names = [
    'name' => 'pcff_questions',
    'singular' => 'Filter Question',
    'plural' => 'Filter Questions',
    'slug' => 'pcff_questions'
];

// Taxonomy options
$tax_options = [
	'hierarchical' => true,
	'publicly_queryable' => false,
];

// Apply the taxonomy to the initialized post type
$type->taxonomy($tax_names, $tax_options);
