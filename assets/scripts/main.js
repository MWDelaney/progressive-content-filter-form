jQuery(document).ready(function($) {

	// Set the form answers in a predictable format, in a predictable element
	$('.pcff-question-item-element').on('change', function() {
			$('.pcff-form .pcff-answers').val($('.pcff-form .pcff-answers').val() + this.value + ",");
	});

});
