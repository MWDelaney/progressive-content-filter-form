<form class="pcff-form" action="<?php the_permalink(); ?>" method="post">
<?php do_action('pcff-before-questions-item'); ?>
	<?php while ( have_rows('pcff_questions') ) : the_row(); ?>
		<?php
			$context->template->get_template_part( 'questions', 'item' );
		?>
	<?php endwhile; ?>
<?php do_action('pcff-after-questions-item'); ?>


	<div class="pcff-questions-item">
			<input class="pcff-answers" type="hidden" name="pcff-answers" value="">
			<button title="Submit" id="pcff-submit" class="btn btn-secondary btn-lg" type="submit"><?php _e('Submit'); ?></button>
	</div>

</form>
