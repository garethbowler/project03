
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
		<div class="row">
			<div class="container">
			<i class="fa fa-user fa-3x pull-right">
				<span id="login" class="hidden-xs">
				<?php 
					if( !is_user_logged_in() ) {
						echo 	'<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Login | Register	</button>';
					}else{
						global $user_login , $user_email;
				    	get_currentuserinfo();
				    	echo '<a href="'.get_permalink(71).'&logout=true">'.$user_login.'</a>';

					}

				?>
			 	</span>
			</i>
			</div>		
		</div>
		<div class="row">
			<div class="text-center">
			<img src="<?php bloginfo('template_directory'); ?>/images/taco_snob.png" alt="logo">
			</div>
		</div>
		<div class="search-container">
			<form action="<?php echo get_permalink(66); ?>" method="post" class="navbar-form">
				<div class="form-group">						
					<input name="location" class="form-control" id="searchinput" type="text">
					<button type="submit" class="btn btn-loud" value=""><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
					</button>
				</div>
			</form>
		</div>
	</div>


</header>
<div class="about">
	<div class="container">
		<div class="col-xs-12 col-md-8 col-md-offset-2">
			<img src="<?php bloginfo('template_directory'); ?>/images/aztec.png" alt="">
			<h3>About</h3>
			<p>The immediacy of a taco, handed to you hot from grill and comal, can’t be equaled. You can stand there and eat yourself silly with one taco after another, 
				each made fresh for you and consumed within seconds. <br><br>A great taco rocks with distinct tastes that roll on and on, like a little party on your tongue, 
				with layers of flavor and textures: juicy, delicious fillings, perfectly seasoned; the taste of the soft corn tortilla; a morsel of salty cheese and finally, 
				best of all, the bright explosion of a freshly-made salsa that suddenly ignites and unites everything on your palate.
			   <br><br>-Deborah Schneider, Amor y Tacos</p>
			   <br><p><strong>PUT YOUR LOCATION IN THE SEARCHBAR TO FIND TACOS</strong></p>
		</div>
	</div>
</div>
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">You gotta login before you taco to me</h4>
      </div>
      <div class="modal-body">
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
						<input name="username" type="text" class="log-form form-control" placeholder="login">	
					</div>
					<div>
						<input name="password" type="password" class="log-form form-control" placeholder="password">	
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
			
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
<?php get_footer(); ?>