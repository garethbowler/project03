

<!-- 
<div class="container">
	<div class="login-btn-container">
		<?php 
		if(is_user_logged_in()){
			echo '<a href="'.get_permalink(71).'&logout=true">Logout</a>';
		}else {
			echo '<a href="'.get_permalink(68).'">Login</a>';
		}
		?>
	</div>

	<div class="col-xs-12 buffer">
	</div>
	<div class="col-xs-12">
		<div class="search-container">
			<h1>Enter your Location:</h1>
			<form action="<?php echo get_permalink(66); ?>" method="post">
				<input name="location" type="text">
				<input type="submit" class="btn-primary" value="Taco Me">
			</form>
		</div>
	</div>
</div> -->

<?php
/*
Template Name: Home Page
*/
?>
<head>
	<title><?php if(is_home()) bloginfo('name'); else wp_title(''); ?></title>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/css/fonts.css">
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
	<?php wp_head();?>
</head>
<header>
	<div class="head">

		<div class="container">


		<div class="row">
			
				<i class="fa fa-user fa-3x pull-right">
					<span id="login" class="hidden-xs">
					<?php 
						if(is_user_logged_in()){
							echo '<a href="'.get_permalink(71).'&logout=true">Logout</a>';
						}else {
							echo '<a href="'.get_permalink(68).'">Login</a>';
						}
						?>
				 	</span>
				</i>
		</div>
		<div class="row text-center">
			<img src="<?php bloginfo('template_directory'); ?>/images/taco_snob.png" alt="">
		</div>
		<div class="row">	
			<div class="search-container">
				<div class="col-xs-8 col-xs-offset-2">
					<form action="<?php echo get_permalink(66); ?>" method="post" class="navbar-form">
						<div class="form-group">						
							<input name="location" class="form-control" type="text" placeholder="search">
							<button type="submit" class="btn btn-loud" value="" ><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
							</button>
						</div>
					</form>
		      	</div>
			</div>
		</div>
	</div>
</header>
<div class="about">
	<div class="container">

		<div class="col-xs-8 col-xs-offset-2">

		<div class="col-xs-8 col-xs-offset-2 about">

			<img src="<?php bloginfo('template_directory'); ?>/images/aztec.png" alt="">
			<h3>About</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia id est debitis repellat omnis possimus expedita eligendi, voluptatum nobis, doloribus quasi consectetur itaque nihil illum quos a necessitatibus cumque cum.</p>
		</div>
	</div>
</div>

<?php get_footer(); ?>