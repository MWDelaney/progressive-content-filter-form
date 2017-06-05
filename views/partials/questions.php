<?php if(!isset($context->answers)): ?>
	<?php if( have_rows('pcff_questions') ): ?>

		<div class="<?=$context->classes;?>">
			<form class="pcff-form" action="<?php the_permalink(); ?>" method="post">

				<?php while ( have_rows('pcff_questions') ) : the_row(); ?>
					<?php
						do_action('pcff-before-questions-item');
						$context->template->get_template_part( 'questions', 'item' );
						do_action('pcff-after-questions-item');
					?>
				<?php endwhile; ?>

				<div class="pcff-questions-item">
						<input class="pcff-answers" type="hidden" name="pcff-answers" value="">
						<button class="btn btn-secondary btn-lg" type="submit"><?php _e('Submit'); ?></button>
				</div>

			</form>

		</div>

	<?php endif; ?>

<?php else: ?>

	<?=$context->answers;?>

	<?php
	$args = array(
		'post_type' => apply_filters('pcff_types', 'post'),
		'posts_per_page' => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'pcff_questions',
				'field' => 'id',
				'terms' => array( $context->answers ),
				'operator' => 'AND'
			)
		)
	);

	$pcff_query = new WP_Query( $args );

	if( $pcff_query->have_posts() ) : while( $pcff_query->have_posts() ) : $pcff_query->the_post(); ?>

	<li>
	    <a href="<?php the_permalink(); ?>"></a>
	</li>


	<?php endwhile; endif; wp_reset_postdata(); ?>

	<a class="btn btn-start-over" href="<?php get_the_permalink(); ?>"><?php _e('Start Over'); ?></a>

<?php endif; ?>
