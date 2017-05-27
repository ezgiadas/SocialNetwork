<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>{{ config('app.name') }}</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>

	<style type="text/css">
		.paddings {
			margin: 5% 8% 4% 8%;
		}

		.clickable-row {
			cursor: pointer;
		}

		.center {
			text-align: center;
		}

		body {
			background-color: #e4e4e4;
		}

		textarea {
			resize: none;
		}

		.margin-up-btn {
			margin-top: 5px;
		}

		.picture-size {
			width: 250px;
			height: 250px;
		}
	</style>

</head>
<body>
	<nav class="navbar navbar-inverse navbar-static-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ route('admin.user.index') }}">ADMIN</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav text-uppercase">
					<li class="active"><a href="{{ route('admin.user.show') }}">USERS</a></li>
					<li><a href="">MEMES</a></li>
					<li><a href="">COMMENTS</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container-fluid">
		@yield('content')
	</div>
	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function($) {
			$(".clickable-row").click(function() {
				window.location = $(this).data("href");
			});
		});
	</script>

</body>	      	


</html>