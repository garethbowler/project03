<?php
/*
Template Name: Splash Page
*/


if(array_key_exists("rate",$_GET)){
	if(is_user_logged_in()){
		update_post_meta($_GET['tacoId'], 'wpcf-taco-rating',$_GET['rate']);
	}
}else if(array_key_exists("logout",$_GET)){
	wp_logout();
	header( "Location:/");

}else if(array_key_exists("email",$_POST)){
	// USER REGISTERING

	// Validate user info

	if(($_POST['username']!=null)&&($_POST['password']!=null)&&($_POST['email']!=null)){

		if(is_int(wp_create_user( $_POST['username'], $_POST['password'], $_POST['email']))){
			header( "Location:/");
		}else{
			echo 'failed2';
		}
	}
}else {
	// USER LOGGING IN

	if(($_POST['username']!=null)&&($_POST['password']!=null)){
		$cred=[];
		$cred['user_login']=$_POST['username'];
		$cred['user_password']=$_POST['password'];
		$cred['remember']=true;
		echo $cred['user_login'].'<br>';
		echo $cred['user_password'].'<br>';
		$user = wp_signon( $cred, false );
		if ( is_wp_error($user) ){
			echo $user->get_error_message();
			
		}else {
			header( "Location:/");
		}
	}

}















 ?>