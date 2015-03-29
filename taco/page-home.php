<?php get_header();
/*
Template Name: Results Page
*/
?>

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

<?php get_header();
/*
Template Name: Home Page
*/
?>
<header>
	<div class="head">
		<div class="row text-center">
			<img src="images/taco_snob.png" alt="">
		</div>
		<div class="row">	
			<div class="search-container">
				<div class="text-center">
					<form action="<?php echo get_permalink(66); ?>" method="post" class="navbar-form">
						<div class="form-group">						
							<input name="location" class="form-control" type="text">
							<button type="submit" class="btn btn-loud" value=""><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
							</button>
						</div>

					</form>
		      	</div>
			</div>
		</div>
	</div>
</header>
<div class="body">
	<div class="container">
		<div class="col-xs-8 col-xs-offset-2">
			<img src="aztec.png" alt="">
			<h3>About</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia id est debitis repellat omnis possimus expedita eligendi, voluptatum nobis, doloribus quasi consectetur itaque nihil illum quos a necessitatibus cumque cum.</p>
		</div>
	</div>
</div>
	<footer class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-4 col-md-4">
				CONTACT
				<br>
				<br>
				<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
				</p>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4">
				FOLLOW US
				<br>
				<br>
				<img src="instagram.png">
				<img src="Facebook-icon.png">
				<img src="instagram.png">
				<img src="Facebook-icon.png">
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4">
				COPYRIGHT 2015
				<br>
				<br>
				<img src="icon.png">
			</div>
		</div>
	</footer>
<?php get_footer(); ?>
<?php get_footer(); ?>