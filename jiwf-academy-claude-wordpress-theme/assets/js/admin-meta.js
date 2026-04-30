/**
 * Admin meta — wires the WP media uploader to image picker buttons.
 * Loaded only on the post edit screens for JIWF CPTs.
 */
(function ($) {
	'use strict';

	$(document).on('click', '.jiwf-image-pick', function (e) {
		e.preventDefault();
		const $btn   = $(this);
		const $wrap  = $btn.closest('.jiwf-image-control');
		const $input = $wrap.find('input[type="hidden"]');
		const $prev  = $wrap.find('.jiwf-image-preview');

		const frame = wp.media({
			title: 'Select image',
			multiple: false,
			library: { type: 'image' },
			button: { text: 'Use this image' }
		});

		frame.on('select', function () {
			const att = frame.state().get('selection').first().toJSON();
			$input.val(att.id);
			const url = (att.sizes && att.sizes.thumbnail && att.sizes.thumbnail.url) || att.url;
			$prev.html('<img src="' + url + '" alt="" style="max-width:120px;height:auto;display:block;">');
		});

		frame.open();
	});

	$(document).on('click', '.jiwf-image-clear', function (e) {
		e.preventDefault();
		const $wrap  = $(this).closest('.jiwf-image-control');
		$wrap.find('input[type="hidden"]').val('');
		$wrap.find('.jiwf-image-preview').empty();
	});
})(jQuery);
