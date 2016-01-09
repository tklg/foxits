$(document).ready(function() {
    $("#tags").tagit({
    	fieldName: 'tags',
    	caseSensitive: false
    });
});

function submitNew() {
	var title = $('#name').val();
	var desc = $('#desc').val();
	var tags = $('#tags').val().split(',');

	$('#btn-submit').prop('disabled', true);
	$('.sending').addClass('active');

	$.post('../api/newticket',
		{
			key: '0',
			sender: 'fromsession',
			title: title,
			desc: desc,
			tags: tags
		},
		function(result) {
			console.log(result);
			if (result == '') {
				$('.sending .result').text("done");
				setTimeout(function() {
					window.location = '../tickets/all';
				}, 1000);
			} else {
				$('.sending .result').text(result);
				$('#btn-submit').prop('disabled', false);
				$('.sending').removeClass('active');
			}
		}
	);
}