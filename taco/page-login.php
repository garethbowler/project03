<?php get_header();
/*
Template Name: Login Page
*/
?>
<div class="container">
	<div class="col-xs-6 col-xs-offset-3 login-container">
		<form action="<?php echo get_permalink(71); ?>" method="post">
			<div>
				<span>Username:</span>
				<input name="username" type="text">	
			</div>
			<div>
				<span>Password</span>
				<input name="password" type="password">	
			</div>
			<div>
				<input type="submit" class="btn btn-primary pull-right" value="login">	
			</div>
		</form>
		<div>
			<p>Not a member? Register bitch!</p>
			<form action="<?php echo get_permalink(71); ?>" method="post">
				<div>
					<span>Username:</span>
					<input name="username" type="text">	
				</div>
				<div>
					<span>Password</span>
					<input name="password" type="password">	
				</div>
				<div>
					<span>Email</span>
					<input name="email" type="email">	
				</div>
				<div>
					<input type="submit" class="btn btn-primary pull-right" value="register">	
				</div>
			</form>
		</div>
	</div>
</div>












<?php get_footer();
?>