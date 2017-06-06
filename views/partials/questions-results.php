<?php $pcff_query = new WP_Query( $context->args ); if( $pcff_query->have_posts() ) : ?>
<ul>
		<?php while( $pcff_query->have_posts() ) : $pcff_query->the_post(); ?>
		<li class="results-item">
			<?php
				do_action('pcff-before-result');
				$context->template->get_template_part( 'questions-results', 'item' );
				do_action('pcff-after-result');
			?>
		</li>
	<?php endwhile; ?>
</ul>

<?php else: ?>
	<?php $context->template->get_template_part( 'questions-results', 'not-found' ); ?>
<?php endif; wp_reset_postdata(); ?>

<a class="btn btn-start-over" href="<?php get_the_permalink(); ?>"><?php _e('Start Over'); ?></a>
