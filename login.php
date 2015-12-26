<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=no">
<link rel="stylesheet" href="css/kibbyte.css">
<link rel="icon" type="image/ico" href="favicon.ico">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css"> -->
<style type="text/css">
	html, body {
		height: 100%;
		width: 100%;
		margin: 0;
		padding: 0;
		font-family: sans-serif;
		background: white;
	}
    ::selection {
	color: #00796B;
	background: #1de986;
}
	.wrapper {
		height: 240px;
		width: 360px;
		position: absolute;
		top:0;bottom:0;right:0;left:0;margin:auto;
        background: #fafafa;
        padding: 20px;
        padding-top: 30px;
    }
	.content {
		width: 320px;
		/*top:0;bottom:0;*/right:0;left:0;margin:auto;
		position: absolute;
	}
	.inputbar {
		position: relative;
		width: 100%;
		height: 60px;
		margin-bottom: 30px;
/*        background: red*/
	}
	.inputbar-half {
        width: 48%;
    }
    .inputbar-half:nth-child(odd) {
        float: left;
    }
    .inputbar-half:nth-child(even) {
        float: right;
    }
	.userlabel {
		color: rgba(0,0,0,.87);;
	}
	.userinfo {
		color: rgba(0,0,0,.87);;
		font-size: 110%;
		width: 100%;
		background: transparent;
		border: none;
		border-bottom: 2px solid rgba(0,0,0,.1);
		padding: 7px 0;
		text-indent: 10px;
	}
	input:active,
	input:focus {
		outline: 0 none;
	}
	.placeholder-userinfo {
		color: rgba(0,0,0,.87);;
		position: absolute;
		top: 11px;
		left: 10px;
		cursor: text;
		user-select: none;
		-webkit-transition: all .3s ease-in-out;
        transition: all .3s ease;
	}
	.input-underline {
	    margin-top: -2px;
	    position: absolute;
	    height: 2px;
	    width: 0;
	    left: 50%;
	    background: #ff8f00;
	    transition: all .3s ease;
	    border: none;
	}
	.userinfo:focus ~ .input-underline {
		width: 100%;
		left: 0;
	}
	.userinfo:focus ~ .placeholder-userinfo,
    .userinfo[empty="false"] ~ .placeholder-userinfo {
		top: -14px;
		left: 0;
		font-size: 70%;
        color: #ff8f00;
	}
	.nosel {
		-webkit-touch-callout: none;
	    -webkit-user-select: none;
	    -khtml-user-select: none;
	    -moz-user-select: none;
	    -ms-user-select: none;
	    user-select: none;
	}
    .title {
        color:  #ff8f00;
        font-size: 200%;
        position: relative;
        width: 100%;
        height: 50px;
        padding: 10px 0;
        text-indent: 15px;
        margin: 0;
        font-weight: normal;
        display: none;
    }
    .btn {
        background: #ff8f00;
        padding: 12px 0;
        border: none;
        outline: 0 none;
        width: 100%;
        font-size: 104%;
        color: white;
        cursor: pointer;
        -webkit-transition: all .3s ease-in-out;
        transition: all .3s ease;
    }
    .btn:hover,
    .btn:focus {
        background: #ff6f00;   
    }
    .nomargin {
        margin: 0;
    }
    a {
        text-decoration: none;
        color: #ff8f00;
        -webkit-transition: all .3s ease-in-out;
        transition: all .3s ease;
    }
    a:hover,
    a:focus {
        color: #517ee8;
    }
    .inputbar a {
        font-size: 80%;   
    }
    .inputbar a:last-of-type {
        float: right;
    }
    .nointeract {
    	z-index: -1;
    }
    .float {
        box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    }
</style>
    <title>FoxITS</title>
</head>
<body>
<section class="wrapper float">
	<section class="content">
    <form name="login" action="uauth.php" method="post">
		<section class="inputbar">
                <input name="address" class="userinfo" id="username" type="text" required pattern="[0-9a-zA-Z][0-9a-zA-Z'\-\. ]*">
                <label class="placeholder-userinfo nosel" for="username">Username</label>
                <hr class="input-underline" />
            </section>
        <section class="inputbar">
                <input name="address" class="userinfo" id="userpass" type="text" required>
                <label class="placeholder-userinfo nosel" for="userpass">Password</label>
                <hr class="input-underline" />
            </section>
        <section class="inputbar inputbar-half nosel nomargin">
            <button class="btn btn-submit btn-flat waves-effect waves-light" type="submit">Sign In</button>
        </section>
        <section class="inputbar inputbar-half nosel nomargin">
            <button class="btn btn-submit btn-flat waves-effect waves-light" type="submit" onclick="window.location = 'oauth.php'; return false">Sign in with Google</button>
        </section>
    </form>
	</section>
</section>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        var user = $('#username').val();
        $('#username').attr('empty', (user != '') ? 'false' : 'true');
        ((user == '') ? $('#username') : $('#userpass')).focus();
    });
    $('input.userinfo').change(function() {
        $(this).attr('empty', ($(this).val() != '') ? 'false' : 'true');
    });
    </script>
</body>
</html>