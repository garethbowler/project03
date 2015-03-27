<?php get_header();
/*
Template Name: Results Page
*/
?>
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





</div>
<?php get_footer(); ?>