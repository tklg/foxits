function Ticket(obj) {
	this.id = obj.id;
	this.hash = obj.hash;
	this.owner = obj.owner;
	this.owner_id = obj.owner_id;
	this.title = obj.title;
	this.content = obj.content;
	this.status = obj.status;
	this.tags = obj.tags;
	this.priority = obj.priority;
	this.dateCreated = obj.dateCreated;
	this.dateChecked = obj.dateChecked;

	this.selected = false;
	this.expanded = false;

	function change() {

	}
}
var tickets = {
	currentlyOpen: -1,
	tickets: [],
	add: function(obj) {
		this.tickets.push(obj);
	},
	expand: function(id) {
		this.close(this.currentlyOpen);
		$('.ticket#ticket-'+id).addClass('open');
		for (i = 0; i < this.tickets.length; i++) {
			if (this.tickets[i].id == id) this.tickets[i].expanded = true;
		}
		this.currentlyOpen = id;

		//load contents of 'open' section if have not already done so

	},
	close: function(id) {
		$('.ticket#ticket-'+id).removeClass('open');
		for (i = 0; i < this.tickets.length; i++) {
			if (this.tickets[i].id == id) this.tickets[i].expanded = false;
		}
	},
	closeAll: function() {
		for (t in tickets) {
			this.close(t.id);
		}
	},
	load: function(priority) {
		var status = pageID;
		var priority = priority || '';

		$.post('../api/tickets',
			{
				key: '0',
				sender: 'fromsession',
				status: status,
				priority: priority
			},
			function(result) {
				//console.log(result);
				var ticketTemplate = _.template($('#ticket_template').html());
				var json = JSON.parse(result);
				for (i = 0; i < json.length; i++) {
					var obj = {
						id: json[i].PID,
						hash: json[i].hash,
						owner: json[i].owner,
						owner_id: json[i].owner_id,
						owner_img: '',
						title: json[i].title,
						content: json[i].content,
						status: json[i].status,
						priority: json[i].priority,
						tags: '',
						dateCreated: json[i].date_submitted,
						dateChecked: json[i].date_last_checked != null ? json[i].date_last_checked : 'never'
					}
    				while (obj.id.length < 10) obj.id = "0" + obj.id;

    				var tags = json[i].tags.split(',');
    				for (c = 0; c < tags.length; c++) {
    					obj.tags += '<li>' + tags[c] + '</li>';
    				}
					$('.ticket-container').append(ticketTemplate(obj));
					tickets.add(new Ticket(obj));
				}
				$(".ticket .tags").tagit({
				   	fieldName: 'tags',
				   	readOnly: true
				});
				var j = 0;
				for (i = 0; i < tickets.tickets.length; i++) {
			    	$.get('https://www.googleapis.com/plus/v1/people/' + tickets.tickets[i].owner_id + '?fields=image&key=AIzaSyAP3T_lujb2Yp8wVIMjYuMppl4sBsWkE90',
				   	function (result) {
				   		var img = result.image.url;
				   		$('#ticket-' + tickets.tickets[j++].id + " .poster-img").attr('src', img);
				   	});
			    }
			}
		);
	},
	change: function() {

	}
}
$('main').on('click', function(e) {
	if ($(e.target).parents('.ticket').length == 0)
		tickets.close(tickets.currentlyOpen);
});
$(document).on('click', '.ticket .d-open header', function(e) {
	//check if target is not a button
	tickets.close($(this).parent().parent().attr('id').split('-')[1]);
});
$(document).on('click', '.ticket .d-closed', function(e) {
	tickets.expand($(this).parent().attr('id').split('-')[1]);
});
$(document).ready(function() {
	tickets.load('all');
});