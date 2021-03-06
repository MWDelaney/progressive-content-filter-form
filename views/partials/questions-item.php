<li class="<?=$context->classes?>">
	<?php if(get_sub_field('text_before')): ?>
		<span class="pcff-text-before">
			<?php the_sub_field('text_before'); ?>
		</span>
	<?php endif; ?>
	<?php $term = get_term(get_sub_field('pcff_question')); ?>
	<span class="pcff-control">
	<select class="pcff-question-item-element" title="<?=$term->name?>" name="<?=$term->name?>">
		<option data-hidden="true" value="">...</option>
			<?php
					$answers = get_terms( 'pcff_questions', array( 'child_of' => $term->term_id, 'hide_empty' => 0 ));
					foreach ( $answers as $answer ):
			?>
					<option value="<?=$answer->term_id;?>"><?=$answer->name;?></option>
			<?php endforeach; ?>
	</select>
	</span>
	
	<?php if(get_sub_field('text_after')): ?>
		<span class="pcff-text-after">
			<?php the_sub_field('text_after'); ?>
		</span>
	<?php endif; ?>
</li>
