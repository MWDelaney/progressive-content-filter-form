jQuery(document).ready(function($) {

	// Set the form answers in a predictable format, in a predictable element
	$('select.pcff-question-item-element').on('change', function() {
			$('.pcff-form .pcff-answers').val($('.pcff-form .pcff-answers').val() + this.value + ",");
	});

	// Set form answer classes when chosen
	$('.pcff-question-item-element').on('change', function (e) {
		$(this).closest('.pcff-questions-item').addClass('chosen').next().addClass('shown');
	});

	// Set first question with "shown" class
	$('.pcff-questions-item').first().addClass('shown');

	// Set descending z-index for each question so that elements are interactive and not overlaid
	$('.pcff-questions-item').each(function( index, value ) {
		$(this).css('z-index', (1000 - index));
	});

});
