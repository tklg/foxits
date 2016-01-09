function Comment(obj) {
	this.id = obj.id;
	this.owner = obj.owner;
	this.owner_id = obj.owner_id;
	this.content = obj.content;
	this.dateCreated = obj.dateCreated;

	this.selected = false;
	this.expanded = false;
}
var ticket = {
	load: function() {
		$.post('../api/ticket',
			{
				key: '0',
				sender: 'fromsession',
				id: pageID
			},
			function(result) {
				//console.log(result);
				var ticketTemplate = _.template($('#ticket_template').html());
				var json = JSON.parse(result);
				var obj = {
					id: json.PID,
					hash: json.hash,
					owner: json.owner,
					owner_id: json.owner_id,
					owner_img: '',
					title: json.title,
					content: json.content,
					status: json.status,
					priority: json.priority,
					tags: '',
					dateCreated: json.date_submitted,
					dateChecked: json.date_last_checked != null ? json.date_last_checked : 'never'
				}
    			while (obj.id.length < 10) obj.id = "0" + obj.id;
   				var tags = json.tags.split(',');
   				for (c = 0; c < tags.length; c++) {
   					obj.tags += '<li>' + tags[c] + '</li>';
   				}
   				$.get('https://www.googleapis.com/plus/v1/people/' + obj.owner_id + '?fields=image&key=AIzaSyAP3T_lujb2Yp8wVIMjYuMppl4sBsWkE90',
   				function (result) {
   					obj.owner_img = result.image.url;
					$('.ticket-container').append(ticketTemplate(obj));
					$(".ticket .tags").tagit({
					   	fieldName: 'tags',
					   	readOnly: true
					});
					document.title = obj.title;
   					comments.load();
   				});
			}
		);
	}
}
var comments = {
	num: 0,
	comments: [],
	load: function() {
		$.post('../api/comments',
			{
				key: '0',
				sender: 'fromsession',
				ticket_id: pageID
			},
			function(result) {
				var json = JSON.parse(result);
				reply.clear();
				var commentTemplate = _.template($('#comment_template').html());
				for (i = 0; i < json.length; i++) {
					var obj = {
						id: comments.num++,
						owner: json[i].owner,
						owner_id: json[i].owner_id,
						owner_img: '',
						content: json[i].content,
						dateCreated: json[i].date_submitted
					}
					$('.ticket-container').append(commentTemplate(obj));
					comments.add(new Comment(obj));
				}
		   		var j = 0;
				for (i = 0; i < comments.comments.length; i++) {
				   	$.get('https://www.googleapis.com/plus/v1/people/' + comments.comments[i].owner_id + '?fields=image&key=AIzaSyAP3T_lujb2Yp8wVIMjYuMppl4sBsWkE90',
				   	function (result) {
				   		var img = result.image.url;
				   		$('#comment-' + comments.comments[j++].id + " .poster-img").attr('src', img);
				   	});
				}
			}
			);
	},
	add: function(obj) {
		this.comments.push(obj);
	}
}
var reply = {
	open: function() {
		$('#contentbox.inactive').addClass('active').removeClass('inactive');
		$('.textarea').focus();
	},
	submit: function() {
		if ($('.btn-send').hasClass('active')) {
			$('#sendstatus').text('sending...');
			var content = $('.textarea').text();
			$.post('../api/newcomment',
			{
				key: '0',
				sender: 'fromsession',
				ticket_id: pageID,
				desc: content
			},
			function(result) {
				//console.log(result);
				$('#sendstatus').text('');
				reply.clear();
				var json = JSON.parse(result);
				var commentTemplate = _.template($('#comment_template').html());
				var obj = {
					id: comments.num++,
					owner: json.owner,
					owner_id: json.owner_id,
					owner_img: '',
					title: json.title,
					content: json.content,
					dateCreated: json.date_submitted,
				}
				$('.ticket-container').append(commentTemplate(obj));
	   			$.get('https://www.googleapis.com/plus/v1/people/' + obj.owner_id + '?fields=image&key=AIzaSyAP3T_lujb2Yp8wVIMjYuMppl4sBsWkE90',
	   			function (result) {
	   				var img = result.image.url;
	   				$('#comment-' + obj.id + " .poster-img").attr('src', img);
	   			});
			}
			);
		}
	},
	clear: function() {
		$('#contentbox.active').addClass('inactive').removeClass('active');
		$('.textarea').html('');
	},
	allowSubmit: function(bool) {
		if (bool) {
			$('.btn-send').addClass('active');
		} else {
			$('.btn-send').removeClass('active');
		}
	}
}
$('#contentbox.inactive').on('click', function() {
	reply.open();
});
$(document).on('click', '.btn-cancel', function() {
	reply.clear();
});
$(document).on('click', '.btn-send', function() {
	reply.submit();
});
$(document).on('keyup', '.textarea', function() {
	var val = $('.textarea').text();
	reply.allowSubmit(val != null && val != '');
});
$('main').on('click', function(e) {
	if (!$(e.target).hasClass('ticket-footer') && $(e.target).parents('.ticket-footer').length == 0) {
		if ($('.textarea').text().length == 0) {
			reply.clear();
		}
	}
});