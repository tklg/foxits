<!DOCTYPE html>
<html lang="en">   
  <head>
  <meta charset="utf-8" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css"> -->
    <style type="text/css">
    html, body {
    	height: 100%;
    	width: 100%;
    	padding: 0;
    	margin: 0;
    	color: #ccc;
		font-family: sans-serif;
		-webkit-font-smoothing: antialiased;
		background: #f2f2f2;
		overflow: hidden;
        -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    }
    a {
		text-decoration: none;
		color: #f44336
		-webkit-transition: all .1s ease-in-out;
	            transition: all .1s ease-in-out;
	}
	a:hover {
		color: #ccc;
	}
    .wrapper {
    	height: 380px;
    	width: 400px;
    	position: absolute;
    	top: 0; bottom: 0; left: 0; right: 0;
    	margin: auto;
        text-align: center;
        background: white;
        padding-top: 40px;
    }
    .errornumber {
        width: 200px;
        height: 200px;
        line-height: 200px;
        vertical-align: middle;
        border: 1px solid #ffc107;
        border-radius: 50%;
        text-align: center;
    	font-size: 60pt;
    	padding: auto;
        position: absolute;
        left: 100px;
    	margin: 0;
        background: #ffc107;
        color: #f2f2f2;
    }
    .errordesc {
        position: absolute;
        top: 270px;
    	margin: 0;
        width: 100%;
        text-align: center;
        color: rgba(0,0,0,.87);
    }
    .errorsol {
        position: absolute;
        top: 305px;
        width: 100%;
        color: rgba(0,0,0,.87);
    }
    .float {
        box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    }
input:active,
input:focus,
button:active,
button:focus {
    outline: 0 none;
    border-bottom: 1px solid #f44336;
}
.btn:hover {
    background: #ffc107;
    color: #f2f2f2;
}
.btn {
    cursor: pointer;
    border-radius: 6px;
    -webkit-transition: all .2s ease-in-out;
          transition: all .2s ease-in-out;
    padding: 11px 20px;  
    margin: 0 4px;
    background: transparent;
    border: 1px solid #ffc107;
}
    </style>
  </head>
<body>

	<?php
	$er = 'Error';
	$de = 'Something is wrong and we don\'t know what.';
	if(isset($_GET['404'])) {$er = '404'; $de = 'The requested page does not exist.';}
    if(isset($_GET['400'])) {$er = '400'; $de = 'Bad Request';}
	if(isset($_GET['500'])) {$er = '500'; $de = 'Something is broken!';}
	if(isset($_GET['403'])) {$er = '403'; $de = 'Access is forbidden.';}
	if(isset($_GET['418'])) {$er = '418'; $de = 'I\'m a teapot.';}
	if(isset($_GET['502'])) {$er = '502'; $de = 'Bad gateway.';}
	?>
	<div class="wrapper float">
	<p class="errornumber float">
	<?php
	echo $er;
	?>
	</p>
	<p class="errordesc">
	<?php
	echo $de;
	?>
	</p>
	<p class="errorsol">
        <a onclick="window.history.back()"><button class="btn btn-flat z-depth-2">Go Back</button></a>
	</p>
	</div>
    <!-- <script type="text/javascript" src="js/foxfile.js"></script> -->
    <script type="text/javascript">
    document.title = 'FoxITS - Error <?php echo $er ?>';
    </script>
</body>
</html>
