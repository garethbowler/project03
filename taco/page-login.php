<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="css/fonts.css">

</head>
<body>
	
</body>
</html>

<div class="login-modal">
			<div class="row">
			<div class="col-xs-12 text-center">
				<img src="images/modal-logo.png" alt="">
			</div>
		</div>
	<div class="member-title">
		<div class="row">
			<div class="col-xs-12 text-center">
				<h5>LOG IN TO RATE AND COMMENT!</h5>
			</div>
		</div>
	</div>

	<div class="login-container">
		<div class="row">
			<div class="col-xs-9 col-xs-offset-1 col-md-6 col-md-offset-0">
				<p><strong>NOT A MEMBER?? REGISTER BITCH!!</strong></p>
				<form action="<?php echo get_permalink(71); ?>" method="post" class="">
					<div>
						<input name="username" type="text" value="Username:" class="log-form form-control">	
					</div>
					<div>
						<input name="password" type="password" id="login-password" value="password" class="log-form form-control">
					</div>
					<div>
						<input name="email" type="email" value="email:" class="log-form form-control">	
					</div>
					<div>
						<input type="submit" class="btn btn-primary pull-right modal-btn" value="REGISTER ME!">	
					</div>
				</form>
			</div>
			<div class="col-xs-9 col-xs-offset-1 col-md-6 col-md-offset-0">
				<p><strong>LOG IN</strong><p>
				<form action="<?php echo get_permalink(71); ?>" method="post">
					<div>
						<input name="username" type="text" class="log-form form-control" value="login">	
					</div>
					<div>
						<input name="password" type="password" class="log-form form-control" value="password">	
					</div>
					<div>
						<input type="submit" class="btn btn-primary pull-right modal-btn" value="LOG IN">	
					</div>
				</form>
			</div>
		</div>
		<div class="row" id="privacy">
			<div class="col-xs-9 col-xs-offset-1 col-md-12 col-md-offset-0">
				<p>We care about you privacy, and we never spam. By created an account you agree to our Terms and Privacy policy. We're proud of the so you should read them.</p>
			</div>
		</div>
	</div>
</div>