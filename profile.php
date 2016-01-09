<?php
session_start();
$userphoto = $_SESSION['foxits_user_picture'];
$username = $_SESSION['foxits_user_name'];
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

	FoxITS - profile.php
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
		<li><a href="../dashboard/overview">Dashboard</a></li>
		<li><a href="../oauth.php?logout">Log out</a></li>
	</ul>
</nav>
<nav class="nav-horiz" id="nav-main">
	<!-- <ul>
		<li class="active"><a href="dashboard/overview">Overview</a></li>
		<li><a href="dashboard/settings">Settings</a></li>
		<li><a href="dashboard/automation">Automation</a></li>
		<li><a href="dashboard/me">My account</a></li>
	</ul> -->
</nav>
</header>
<main>
	<article class="user-profile float">
		<img class="user-img" src="../img/default_avatar.png" />
		<span class="user-name">Name</span>
		<span class="user-title">Title</span>
		<p class="user-desc">desc</p>
	</article>
</main>
</body>
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<!-- <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script> -->
	<!-- <link async rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/themes/base/jquery-ui.css"/> -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script> -->
    <script src="../js/underscore.min.js"></script>
    <script src="../js/foxits-profile.js"></script>
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