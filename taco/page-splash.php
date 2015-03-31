<?php
/*
Template Name: Splash Page
*/




if(array_key_exists("logout",$_GET)){
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
}else if(array_key_exists("cmnt",$_GET)){
	echo $_GET['taco'];
	return;

}else if(array_key_exists("username",$_POST)){
	// USER LOGGING IN
	if(($_POST['username']!=null)&&($_POST['password']!=null)){
		$cred=[];
		$cred['user_login']=$_POST['username'];
		$cred['user_password']=$_POST['password'];
		$cred['remember']=true;
		if(wp_signon( $cred )){
			header( "Location:/");
		}else{
			echo 'failed';
		}
	}

}















 ?>