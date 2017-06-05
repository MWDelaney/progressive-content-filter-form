<div class="<?=$context->classes?>">
	<?php if(get_sub_field('text_before')): ?>
		<span class="pcff-text-before">
			<?php the_sub_field('text_before'); ?>
		</span>
	<?php endif; ?>

	<?php $term = get_sub_field('pcff_question'); ?>
	<select class="pcff-question-item-element" title="..." name="<?=$term->term_id?>">
			<option value=""></option>
			<?php
					$answers = get_terms( 'pcff_questions', array( 'child_of' => $term, 'hide_empty' => 0 ));
					foreach ( $answers as $answer ):
			?>
					<option value="<?=$answer->term_id;?>"><?=$answer->name;?></option>',
			<?php endforeach; ?>
	</select>


	<?php if(get_sub_field('text_after')): ?>
		<span class="pcff-text-after">
			<?php the_sub_field('text_after'); ?>
		</span>
	<?php endif; ?>
</div>
