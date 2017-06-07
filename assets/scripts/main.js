jQuery(document).ready(function($) {

	// Set the form answers in a predictable format, in a predictable element
	$('select.pcff-question-item-element').on('change', function() {
		var map = [];
		$("select.pcff-question-item-element").each(function() {
		    map.push($(this).val());
		});
		$('.pcff-form .pcff-answers').val(map.join(','));
	});

	// Set form answer classes when chosen
	$('.pcff-question-item-element').on('change', function (e) {
		$(this).closest('.pcff-questions-item').removeClass('active').addClass('chosen').next().addClass('active');
	});

	// Set first question with "shown" class
	$('.pcff-questions-item').first().addClass('active');


});
