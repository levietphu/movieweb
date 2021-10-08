$(document).ready(function() {
	$(document).on('keyup', '#search', function(event) {
		const keyword = $(this).val();
		$.ajax({
				url: 'tim-kiem',
				type: 'get',
				data: {keyword:keyword},
				success: function (data) {
					$('.ajax-results').html(data)
				}
			});
	});
});