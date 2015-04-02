<!DOCTYPE html>
<html>
<head>
	<title><?php if(is_home()) bloginfo('name'); else wp_title(''); ?></title>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/css/fonts.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
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
				<div class="col-xs-10 col-md-10 col-lg-3 navlogo">
					<a href="index.php"><img class="hlogo" src="<?php bloginfo('template_directory'); ?>/images/headerlogo.png" alt=""></a>
				</div>
				<div class="col-xs-12 col-md-6 navsearch hidden-xs hidden-sm hidden-md">
					<div class="search-container">
						<form action="<?php echo get_permalink(66); ?>" method="post" class="navbar-form">
							<div class="form-group">						
								<input href="index.php" name="location" class="form-control" type="text">
								<button type="submit" class="btn btn-loud" value=""><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
								</button>
							</div>
						</form>
					</div>
				</div>
				<div class=" col-xs-2 col-lg-3 pt45">
						<i class="fa fa-user fa-3x pull-right visible-xs visible-sm visible-md	"></i>
					<span id="login2" class="hidden-xs hidden-md hidden-sm">
					<?php 
						if(is_user_logged_in()){
							echo '<a href="'.get_permalink(71).'&logout=true">Logout</a>';
						}else {
							echo '<a href="'.get_permalink(68).'">Login | Sign In</a>';
						}
						?>
				 	</span>
						</i>
				</div>
				<div class="col-xs-12 col-md-6 col-md-offset-3 navsearch hidden-lg">
					<div class="search-container">
						<form action="<?php echo get_permalink(66); ?>" method="post" class="navbar-form">
							<div class="form-group">						
								<input href="index.php" name="location" class="form-control" type="text">
								<button type="submit" class="btn btn-loud" value=""><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>