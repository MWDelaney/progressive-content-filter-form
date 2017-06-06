<?php if(!isset($context->answers)): ?>
	<?php if( have_rows('pcff_questions') ): ?>

		<div class="<?=$context->classes;?>">

			<?php $context->template->get_template_part( 'questions', 'form' ); ?>

		</div>

	<?php endif; ?>

<?php else: ?>

	<?php do_action('pcff-before-results'); ?>
	<?php $context->template->get_template_part( 'questions', 'results' ); ?>
	<?php do_action('pcff-after-results'); ?>


<?php endif; ?>
