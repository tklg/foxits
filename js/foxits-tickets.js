function Ticket(obj) {
	this.id = obj.id;
}
var tickets = {
	currentlyOpen: -1,
	tickets: null,
	expand: function(id) {
		this.close(this.currentlyOpen);
		$('.ticket#ticket-'+id).addClass('open');
		this.currentlyOpen = id;

		//load contents of 'open' section if have not already done so

	},
	close: function(id) {
		$('.ticket#ticket-'+id).removeClass('open');
	},
	closeAll: function() {
		for (t in tickets) {
			this.close(t.id);
		}
	}
}
$('main').on('click', function(e) {
	if ($(e.target).parents('.ticket').length == 0)
		tickets.close(tickets.currentlyOpen);
});
$(document).on('click', '.ticket .d-open header', function(e) {
	console.log('close');
	//check if target is not a button
	tickets.close($(this).parent().parent().attr('id').split('-')[1]);
});
$(document).on('click', '.ticket .d-closed', function(e) {
	console.log('open');
	tickets.expand($(this).parent().attr('id').split('-')[1]);
});