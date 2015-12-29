<?php
session_start();
if (!isset ($_SESSION['foxits_access_token'])) header ("Location: login");
$userphoto = $_SESSION['foxits_user_picture'];
$username = $_SESSION['foxits_user_name'];

$uri = $_SERVER['REQUEST_URI'];
if (strpos($uri, '/') !== false) {
    $uri = explode('/', $uri);
    $id = $uri[sizeof($uri) - 1];
} else {
    $id = substr($uri, 1);
}
if ($id == 'tickets' || $id == '') {
	header("Location: http://" . $_SERVER['HTTP_HOST'] . "/foxits/tickets/all");
}

?>
<!DOCTYPE html>
<html lang="en">
<!--
                                                                 
	88888888888                       88  888888888888  ad88888ba   
	88                                88       88      d8"     "8b  
	88                                88       88      Y8,          
	88aaaaa   ,adPPYba,  8b,     ,d8  88       88      `Y8aaaaa,    
	88"""""  a8"     "8a  `Y8, ,8P'   88       88        `"""""8b,  
	88       8b       d8    )888(     88       88              `8b  
	88       "8a,   ,a8"  ,d8" "8b,   88       88      Y8a     a8P  
	88        `"YbbdP"'  8P'     `Y8  88       88       "Y88888P"   

	FoxITS - tickets.php
	Copyright (C) 2015 Theodore Kluge - All Rights Reserved
	http://tkluge.net

-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1">
    <title>FoxITS</title>
	<link async href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link async href='https://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>
<!-- 	<link async rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css"> -->
	<link async rel="stylesheet" href="../css/foxits.css">
	<link rel="icon" type="image/ico" href="../img/foxits.png">
		
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body>

<header id="header-main" class="float-2">
<span class="burger"><i class="material-icons">menu</i></span>
<a href="index"><span class="title">Fox<span id="redfox">ITS</span></span></a>
<nav class="nav-horiz" id="nav-top">
	<ul>
		<li><a href="../profile/me"><?php echo $username; ?></a></li>
		<li><a href="../tickets/create">New ticket</a></li>
		<li><a href="../dashboard/overview">Dashboard</a></li>
		<li><a href="../tickets">Tickets</a></li>
		<li><a href="../oauth.php?logout">Log out</a></li>
	</ul>
</nav>
<nav class="nav-horiz" id="nav-main">
	<ul>
		<li class="<?php if($id == 'me') echo 'active';?>"><a href="../tickets/me">Assigned to me</a></li>
		<li class="<?php if($id == 'all') echo 'active';?>"><a href="../tickets/all">All</a></li>
		<li class="<?php if($id == 'new') echo 'active';?>"><a href="../tickets/new">New</a></li>
		<li class="<?php if($id == 'open') echo 'active';?>"><a href="../tickets/open">Open</a></li>
		<li class="<?php if($id == 'solved') echo 'active';?>"><a href="../tickets/solved">Solved</a></li>
		<li class="<?php if($id == 'hold') echo 'active';?>"><a href="../tickets/hold">On hold</a></li>
	</ul>
	<form class="user-input-box ticket-search">
		<input class="user-input input-text input-search" type="text" id="search" />
		<label class="input-text-icon" for="search"><i class="material-icons">search</i></label>
		<label class="input-text-placeholder" for="search">Search</label>
		<!-- <button class="btn btn-search"><i class="material-icons">search</i></button> -->
	</form>
</nav>
</header>
<main>

<section class="ticket-container">
	<section class="ticket-navs">
		<nav class="nav-small">
		<span class="text-hint ticket-amount" id="num-tickets">Showing 1 - 4 of 4</span>
		<!-- <form class="user-input-box ticket-search">
			<input class="user-input input-text input-search" type="text" id="search-inner" placeholder="Search" />
			<button class="btn btn-search"><i class="material-icons">search</i></button>
		</form> -->
		</nav>
		<nav class="nav-small tickets-header">
		<span class="id">Ticket ID</span>
		<span class="name">Title</span>
		<span class="priority">Priority</span>
		<span class="status">Status</span>
		</nav>
	</section>
	<section class="tickets-list">
		<article class="ticket" id="ticket-0">	
			<div class="d-closed">
				<span id="id" class="id">#0000000000</span>
				<div class="vertbox" id="namedesc">
					<span id="title" class="name">Name</span>
					<span id="desc" class="desc">Opened by Firstname Lastname</span>
				</div>
				<a href="../ticket/qieyrgfasub"><span id="openinnew" class="openinnew material-icons">open_in_new</span></a>
				<div class="vertbox" id="datetime">
					<span id="date-created" class="date-created">Opened <span class="datetime">2015-12-24 19:50:18</span></span>
					<span id="date-checked" class="date-checked">Checked <span class="datetime">00-00-0000 00:00:00</span></span>
				</div>
				<span id="priority" class="priority priority-low">low</span>
				<span id="status" class="status status-open">open</span>
			</div>
			<div class="d-open">
			<!-- also this -->
				<header>
					<span class="id">#000000000</span>
					<span class="name">Name</span>

					<!-- <a href="ticket/qieyrgfasub"><span class="openinnew material-icons">open_in_new</span></a> -->
					<span class="delete material-icons">delete</span>
					<span class="priority priority-low">low</span>
					<span class="status status-open">open</span>
				</header>
				<article>
					<img class="user-img poster-img" alt="profile picture of someone" src="../img/default_avatar.png" />
					<span class="user-name poster-name">Poster Name</span>
					<span class="datetime" id="post-date">2015-12-24 19:50:18</span>
					<p class="content">
						iasundiuashdadasndoasdopasjmdopa<br>aoidnfiousdbfsndiu
					</p>
					<div class="tags">
						<span class="tag">tag a</span>
						<span class="tag">tag b</span>
						<span class="tag">tag c</span>
					</div>
				</article>
				<footer>
					<span class="leavecomment">Leave a comment</span>
					<a href="../ticket/qieyrgfasub"><span class="btn viewcomments">View all comments</span></a>
				</footer>
			</div>
		</article>
		<!-- make this minus the inner templates a template -->
		<article class="ticket" id="ticket-1">
			<div class="d-closed">
			<!-- make this a template -->
				<span id="id" class="id">#0000000001</span>
				<div class="vertbox" id="namedesc">
					<span id="title" class="name">Name</span>
					<span id="desc" class="desc">Opened by Firstname Lastname</span>
				</div>
				<a href="../ticket/qieyrgfasub"><span id="openinnew" class="openinnew material-icons">open_in_new</span></a>
				<div class="vertbox" id="datetime">
					<span id="date-created" class="date-created">Opened <span class="datetime">2015-12-24 19:50:18</span></span>
					<span id="date-checked" class="date-checked">Checked <span class="datetime">00-00-0000 00:00:00</span></span>
				</div>
				<span id="priority" class="priority priority-normal">normal</span>
				<span id="status" class="status status-new">new</span>
			</div>
			<div class="d-open">
			<!-- also this -->
				<header>
					<span class="id">#0000000001</span>
					<span class="name">Name</span>

					<!-- <a href="ticket/qieyrgfasub"><span class="openinnew material-icons">open_in_new</span></a> -->
					<span class="delete material-icons">delete</span>
					<span class="priority priority-normal">normal</span>
					<span class="status status-new">new</span>
				</header>
				<article>
					<img class="user-img poster-img" alt="profile picture of someone" src="../img/default_avatar.png" />
					<span class="user-name poster-name">Poster Name</span>
					<span class="datetime" id="post-date">2015-12-24 19:50:18</span>
					<p class="content">
						iasundiuashdadasndoasdopasjmdopa<br>aoidnfiousdbfsndiu
					</p>
					<div class="tags">
						<span class="tag">tag a</span>
						<span class="tag">tag b</span>
						<span class="tag">tag c</span>
					</div>
				</article>
				<footer>
					<span class="leavecomment">Leave a comment</span>
					<a href="../ticket/qieyrgfasub"><span class="btn viewcomments">View all comments</span></a>
				</footer>
			</div>
		</article>
		<article class="ticket" id="ticket-2">
			<div class="d-closed">
				<span id="id" class="id">#0000000002</span>
				<div class="vertbox" id="namedesc">
					<span id="title" class="name">Name</span>
					<span id="desc" class="desc">Opened by Firstname Lastname</span>
				</div>
				<a href="../ticket/qieyrgfasub"><span id="openinnew" class="openinnew material-icons">open_in_new</span></a>
				<div class="vertbox" id="datetime">
					<span id="date-created" class="date-created">Opened <span class="datetime">2015-12-24 19:50:18</span></span>
					<span id="date-checked" class="date-checked">Checked <span class="datetime">00-00-0000 00:00:00</span></span>
				</div>
				<span id="priority" class="priority priority-high">high</span>
				<span id="status" class="status status-solved">solved</span>
			</div>
			<div class="d-open">
			<!-- also this -->
				<header>
					<span class="id">#0000000002</span>
					<span class="name">Name</span>

					<!-- <a href="ticket/qieyrgfasub"><span class="openinnew material-icons">open_in_new</span></a> -->
					<span class="delete material-icons">delete</span>
					<span class="priority priority-high">high</span>
					<span class="status status-solved">solved</span>
				</header>
				<article>
					<img class="user-img poster-img" alt="profile picture of someone" src="../img/default_avatar.png" />
					<span class="user-name poster-name">Poster Name</span>
					<span class="datetime" id="post-date">2015-12-24 19:50:18</span>
					<p class="content">
						iasundiuashdadasndoasdopasjmdopa<br>aoidnfiousdbfsndiu
					</p>
					<div class="tags">
						<span class="tag">tag a</span>
						<span class="tag">tag b</span>
						<span class="tag">tag c</span>
					</div>
				</article>
				<footer>
					<span class="leavecomment">Leave a comment</span>
					<a href="../ticket/qieyrgfasub"><span class="btn viewcomments">View all comments</span></a>
				</footer>
			</div>
		</article>
		<article class="ticket" id="ticket-3">
			<div class="d-closed">
				<span id="id" class="id">#0000000003</span>
				<div class="vertbox" id="namedesc">
					<span id="title" class="name">Name</span>
					<span id="desc" class="desc">Opened by Firstname Lastname</span>
				</div>
				<a href="../ticket/qieyrgfasub"><span id="openinnew" class="openinnew material-icons">open_in_new</span></a>
				<div class="vertbox" id="datetime">
					<span id="date-created" class="date-created">Opened <span class="datetime">2015-12-24 19:50:18</span></span>
					<span id="date-checked" class="date-checked">Checked <span class="datetime">00-00-0000 00:00:00</span></span>
				</div>
				<span id="priority" class="priority priority-urgent">urgent</span>
				<span id="status" class="status status-hold">hold</span>
			</div>
			<div class="d-open">
			<!-- also this -->
				<header>
					<span class="id">#0000000003</span>
					<span class="name">Name</span>

					<!-- <a href="ticket/qieyrgfasub"><span class="openinnew material-icons">open_in_new</span></a> -->
					<span class="delete material-icons">delete</span>
					<span class="priority priority-urgent">urgent</span>
					<span class="status status-hold">hold</span>
				</header>
				<article>
					<img class="user-img poster-img" alt="profile picture of someone" src="../img/default_avatar.png" />
					<span class="user-name poster-name">Poster Name</span>
					<span class="datetime" id="post-date">2015-12-24 19:50:18</span>
					<p class="content">
						iasundiuashdadasndoasdopasjmdopa<br>aoidnfiousdbfsndiu
					</p>
					<div class="tags">
						<span class="tag">tag a</span>
						<span class="tag">tag b</span>
						<span class="tag">tag c</span>
					</div>
				</article>
				<footer>
					<span class="leavecomment">Leave a comment</span>
					<a href="../ticket/qieyrgfasub"><span class="btn viewcomments">View all comments</span></a>
				</footer>
			</div>
		</article>
	</section>
</section>

</main>
</body>
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<!-- <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script> -->
	<!-- <link async rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/themes/base/jquery-ui.css"/> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
    <script src="../js/underscore.min.js"></script>
    <script src="../js/foxits-tickets.js"></script>
    <script>
    var res;
    $(document).ready(function() {

    });
    </script>
	
	<script>
	  /*(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-48081162-1', 'villa7.github.io');
	  ga('send', 'pageview');*/

	</script>

</html>