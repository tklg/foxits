var keys = {
	currentlyOpen: -1,
	/*tickets: [],
	add: function(obj) {
		this.tickets.push(obj);
	},*/
	expand: function(id) {
		this.close(this.currentlyOpen);
		$('.key#key-'+id).addClass('open');
		/*for (i = 0; i < this.tickets.length; i++) {
			if (this.tickets[i].id == id) this.tickets[i].expanded = true;
		}*/
		this.currentlyOpen = id;
	},
	close: function(id) {
		$('.key#key-'+id).removeClass('open');
		/*for (i = 0; i < this.tickets.length; i++) {
			if (this.tickets[i].id == id) this.tickets[i].expanded = false;
		}*/
	},
	closeAll: function() {
		for (t in tickets) {
			this.close(t.id);
		}
	},
	load: function() {
		$.post('../api/keys',
			{
				key: '0',
				sender: 'fromsession'
			},
			function(result) {
				//console.log(result);
				var ticketTemplate = _.template($('#key_template').html());
				var json = JSON.parse(result);
				for (i = 0; i < json.length; i++) {
					var obj = {
						id: json[i].PID,
						owner: json[i].owner,
						origin: json[i].http_origin,
						key: json[i].api_key,
						create_tickets: (json[i].create_ticket ? 'checked' : ''),
						list_tickets: (json[i].list_tickets ? 'checked' : ''),
						modify_tickets: (json[i].modify_tickets ? 'checked' : ''),
						create_comments: (json[i].create_comments ? 'checked' : ''),
						list_comments: (json[i].list_comments ? 'checked' : ''),
						modify_comments: (json[i].modify_comments ? 'checked' : ''),
						create_keys: (json[i].create_key ? 'checked' : ''),
						view_logs: (json[i].list_logs ? 'checked' : ''),
						dateCreated: json[i].date_created
					}

					$('.keys-list').append(ticketTemplate(obj));
				}
			}
		);
	},
	change: function() {

	}
}
$('main').on('click', function(e) {
	if ($(e.target).parents('.key').length == 0) {
		keys.close(keys.currentlyOpen);
		if ($(e.target).parents('.fab').length = 0)
			$('.api-keys').removeClass('creating');
	}
});
$(document).on('click', '.key.open .header', function(e) {
	//check if target is not a button
	keys.close($(this).parent().attr('id').split('-')[1]);
});
$(document).on('click', '.key:not(.open)', function(e) {
	keys.expand($(this).attr('id').split('-')[1]);
});
$(document).ready(function() {
	if (pageID == 'settings')
		keys.load();
});
$('.api-keys .fab').on('click', function() {
	$('.api-keys').addClass('creating');
});
$('.api-keys .btn-cancel').on('click', function() {
	$('.api-keys').removeClass('creating');
});