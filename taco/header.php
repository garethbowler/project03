<!DOCTYPE html>
<html>
<head>
	<title><?php if(is_home()) bloginfo('name'); else wp_title(''); ?></title>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/css/fonts.css">
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
	<?php wp_head();?>
</head>
<body>

<div id="wrapper">
	<div id="header">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-3 navlogo">
					<a href="#"><img class="hlogo" src="<?php bloginfo('template_directory'); ?>/images/headerlogo.png" alt=""></a>
				</div>
				<div class="col-xs-12 col-md-6 navsearch">
					<div class="search-container">
							<form action="<?php echo get_permalink(66); ?>" method="post">
								<input name="location" type="text" class="searchinput" value>
								<input type="submit" class="btn-primary searchsubmit" value="">
							</form>
					</div>
				</div>
				<div class="col-xs-3 login">
					<ul class="loginlist">
						<li><a class="btn btn-primary navlogicon" href="#"><h4>Log In</h4></a></li>
						<li><a class="btn btn-primary navlogicon" href="#"><h4>Register</h4></a></li>
					</ul>

					<!-- <div class="login-btn-container" loggedIn="<?php echo (is_user_logged_in()?'true':'false') ?>">
						<?php 
							if(is_user_logged_in()){
								echo '<a href="'.get_permalink(71).'&logout=true">Logout</a>';
							}else {
								echo '<a href="'.get_permalink(68).'">Login</a>';
							}
						?>
						</div> -->
				</div>
			</div>
		</div>
	</div>

