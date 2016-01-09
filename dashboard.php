<?php
session_start();
if (!isset ($_SESSION['foxits_access_token'])) header ("Location: ../login");
$userphoto = $_SESSION['foxits_user_picture'];
$username = $_SESSION['foxits_user_name'];

$uri = $_SERVER['REQUEST_URI'];
if (strpos($uri, '/') !== false) {
    $uri = explode('/', $uri);
    $id = $uri[sizeof($uri) - 1];
} else {
    $id = substr($uri, 1);
}
if ($id == 'dashboard' || $id == '') {
	header("Location: http://" . $_SERVER['HTTP_HOST'] . "/foxits/dashboard/overview");
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

	FoxITS - dashboard.php
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
<a href="../dashboard"><span class="title">Fox<span id="redfox">ITS</span></span></a>
<nav class="nav-horiz" id="nav-top">
	<ul>
		<li><a href="../profile/me"><?php echo $username; ?></a></li>
		<li><a href="../tickets/create">New ticket</a></li>
		<li><a href="../tickets">Tickets</a></li>
		<li><a href="../dashboard">Dashboard</a></li>
		<li><a href="../oauth.php?logout">Log out</a></li>
	</ul>
</nav>
<nav class="nav-horiz" id="nav-main">
	<ul>
		<li class="<?php if($id == 'overview') echo 'active';?>"><a href="../dashboard/overview">Overview</a></li>
		<li class="<?php if($id == 'settings') echo 'active';?>"><a href="../dashboard/settings">Settings</a></li>
		<li class="<?php if($id == 'automation') echo 'active';?>"><a href="../dashboard/automation">Automation</a></li>
		<li class="<?php if($id == 'accounts') echo 'active';?>"><a href="../dashboard/accounts">Accounts</a></li>
	</ul>
</nav>
</header>
<main>
<?php if ($id == 'overview') { ?>
	<article class="overview-item ticket-preview float">
		<header>Tickets at a glance</header>
		<section class="content"><!-- Loading... -->
		<table>
			<thead>
				<th><a href="../tickets/me">For me</a></th>
				<th><a href="../tickets/new">New</a></th>
				<th><a href="../tickets/open">Open</a></th>
				<th><a href="../tickets/solved">Solved</a></th>
				<th><a href="../tickets/hold">On hold</a></th>
			</thead>
			<tr>
				<td>0</td>
				<td>1</td>
				<td>3</td>
				<td>0</td>
				<td>0</td>
			</tr>
		</table>
		</section>
	</article>
	<article class="overview-item recent-activity float">
		<header>Recent activity</header>
		<section class="content">Loading...</section>
	</article>
	<article class="overview-item ticket-logs float">
		<header>Logs</header>
		<section class="content">Loading...</section>
	</article>
<?php } else if ($id == 'settings') { ?>
	<article class="overview-item email-notify float">
		<header>Email notifications<span class="desc">Emails sent by the server</span></header>
		<section class="content">Loading...</section>
	</article>
	<article class="overview-item log-loc float">
		<header>Log file<span class="desc">Where activity logs live</span></header>
		<section class="content">
			<input type="text" class="text-input" placeholder="logs/logs.txt" value="<?php echo $_SESSION['foxits_logfile'] ?>" />
		</section>
	</article>
	<article class="overview-item self-key float">
		<header>FoxITS API key<span class="desc">So this can access its own api</span></header>
		<section class="content">
			<input type="text" class="text-input" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" placeholder="foxits_00000000000000000000000000000000" value="<?php echo $_SESSION['foxits_api_key'] ?>" pattern="*{39}" />
		</section>
	</article>
	<article class="overview-item api-keys float">
		<header>API keys<span class="desc">For apps that might want a key</span><span class="keycode">Key</span><span class="datemade">Created</span><button class="btn fab"><i class="material-icons">add</i></button></header>
		<section class="content">
		<section class="keys-list">
			
		</section>
		<form class="create key open" id="key-0" action="" type="post">
			Adding a new key:<br>
			<label for="appname" class="label">Key name</label>
			<input class="text-input origin" type="text" class="text-input" id="appname" placeholder="Name of the application this key is for" value="" />
			<label for="origin" class="label">Http origin</label>
			<input class="text-input origin" type="text" class="text-input" id="origin" placeholder="Connections are allowed from here" value="" />
			<label class="label">Key permissions</label><br>
			<input type="checkbox" id="c1" /><label for="c1" class="nosel"></label><label for="c1" class="nosel">Create tickets</label><br>
			<input type="checkbox" id="c2" /><label for="c2" class="nosel"></label><label for="c2" class="nosel">List tickets</label><br>
			<input type="checkbox" id="c3" /><label for="c3" class="nosel"></label><label for="c3" class="nosel">Modify tickets</label><br>
			<input type="checkbox" id="c4" /><label for="c4" class="nosel"></label><label for="c4" class="nosel">Create comments</label><br>
			<input type="checkbox" id="c5" /><label for="c5" class="nosel"></label><label for="c5" class="nosel">List comments</label><br>
			<input type="checkbox" id="c6" /><label for="c6" class="nosel"></label><label for="c6" class="nosel">Modify comments</label><br>
			<input type="checkbox" id="c7" /><label for="c7" class="nosel"></label><label for="c7" class="nosel">Create keys</label><br>
			<input type="checkbox" id="c8" /><label for="c8" class="nosel"></label><label for="c8" class="nosel">View logs</label><br>
			<button class="btn btn-send">Add key</button>
			<span class="desc" id="sendstatus"></span>
			<button class="btn btn-cancel" type="reset">Cancel</button>
		</form>
		</section>
	</article>
	<script type="text/template" id="key_template">
	<article class="key" id="key-<%= id %>">
		<section class="header">
			<span class="name"><%= owner %></span>
			<span class="delete material-icons">delete</span>
			<span class="regen material-icons">refresh</span>
			<span class="keycode"><%= key %></span>
			<span class="datemade"><%= dateCreated %></span>
		</section>
		<form class="d-open">
			<label for="origin" class="label">Http origin</label>
			<input class="text-input origin" type="text" class="text-input" id="origin" placeholder="Connections are allowed from here" value="<%= origin %>" />
			<label class="label">This key can:</label><br>
			<input type="checkbox" id="c1-<%= id %>" <%= create_tickets %>/><label for="c1-<%= id %>" class="nosel"></label><label for="c1-<%= id %>" class="nosel">Create tickets</label><br>
			<input type="checkbox" id="c2-<%= id %>" <%= list_tickets %>/><label for="c2-<%= id %>" class="nosel"></label><label for="c2-<%= id %>" class="nosel">List tickets</label><br>
			<input type="checkbox" id="c3-<%= id %>" <%= modify_tickets %>/><label for="c3-<%= id %>" class="nosel"></label><label for="c3-<%= id %>" class="nosel">Modify tickets</label><br>
			<input type="checkbox" id="c4-<%= id %>" <%= create_comments %>/><label for="c4-<%= id %>" class="nosel"></label><label for="c4-<%= id %>" class="nosel">Create comments</label><br>
			<input type="checkbox" id="c5-<%= id %>" <%= list_comments %>/><label for="c5-<%= id %>" class="nosel"></label><label for="c5-<%= id %>" class="nosel">List comments</label><br>
			<input type="checkbox" id="c6-<%= id %>" <%= modify_comments %>/><label for="c6-<%= id %>" class="nosel"></label><label for="c6-<%= id %>" class="nosel">Modify comments</label><br>
			<input type="checkbox" id="c7-<%= id %>" <%= create_keys %>/><label for="c7-<%= id %>" class="nosel"></label><label for="c7-<%= id %>" class="nosel">Create keys</label><br>
			<input type="checkbox" id="c8-<%= id %>" <%= view_logs %>/><label for="c8-<%= id %>" class="nosel"></label><label for="c8-<%= id %>" class="nosel">View logs</label>
		</form>
	</article>
	</script>
<?php } else if ($id == 'automation') { ?> <!-- possibly combine with the settings page -->

<?php } else if ($id == 'accounts') { ?>
	<article class="overview-item profile-cfg float">
		<header>My profile</header>
		<section class="content">Loading...</section>
	</article>
<?php } ?>
</main>
</body>
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<!-- <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script> -->
	<!-- <link async rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/themes/base/jquery-ui.css"/> -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script> -->
    <script src="../js/underscore.min.js"></script>
    <script src="../js/foxits-dashboard.js"></script>
    <script>
    var pageID = '<?php echo $id ?>';
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