<?php include('server.php') ?>
<html>
<head>
<title>PROJECT MANAGEMENT</title>
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no"/>
<link href="css/bootstrap.css" rel="stylesheet"/>

<script src="js/bootstrap.js"></script>
<style type="text/css">
body{background:url('image/b.jpg') no-repeat;
	overflow-y:scroll;
	}

img{ width:150px;
	margin:auto;
}
h1{
color:white;
text-align:center;
font-weight:bolder;
margin-top:20px;
}
label{font-size:20px; color:white;}

</style>

</head>
<body>
<div class="container col-md-4 offset-md-4">
	<div class="row">	
		
			<form action="#" method="POST">
            <?php include('errors.php'); ?>
					<h1> Login Form</h1>
					<img class="img img-responsive img-circle" src="image/login.gif">
					<div class="form-group">
						<input type="username" class="form-control" placeholder="Username" name="username">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Password" name="password">
					</div>					
					<button type="submit" class="btn btn-success btn-block " name="login_user">Login</button>
			</form>
	
	
	</div>
</div>
</body>
</html>