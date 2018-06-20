/*
 * Upload brand logo
 */
jQuery(document).ready(function($){

	let mediaUploader;

	/*
	 * Upload and replace brand logo
	 */
	$('#mavid-btn-upload-brand-logo').on('click', function(e) {
		e.preventDefault();
		if (mediaUploader) {
				mediaUploader.open();
				return;
		}

		mediaUploader = wp.media.frames.file_frame = wp.media (
			{
				title: 'Choose a Brand logo',
				button: {
					text: 'Choose image'
				},
				multiple: false
			}
		);

		mediaUploader.on('select' , function(){
			attachment = mediaUploader.state().get('selection').first().toJSON();
			$('#mavid-brand-logo').val(attachment.url);
			$('#mavid-form-site-setting').submit();
		});

		mediaUploader.open();
	});

	/*
	* Remove brand logo
	*/
	$('#mavid-btn-remove-brand-logo').on('click' , function(e) {
		e.preventDefault();
		let mavAnswer = confirm("Are you sure to remove Brand Logo?");
		if (mavAnswer == true) {
			$('#mavid-brand-logo').val('');
			$('#mavid-form-site-setting').submit();
		}
		return;
	});

});