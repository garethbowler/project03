<?php


function stars($rating){
	for($i=0;$i<$rating;$i++){
		echo '<span class="star glyphicon glyphicon-star" style="width:20px;color:red"></span>';
	}
	for(;$i<5;$i++){
		echo '<span class="star grey glyphicon glyphicon-star" style="width:20px"></span>';	
	}
}

function getLocation($location){
	$location = str_replace(' ','%20',$location);

	// create curl resource
	$ch = curl_init();
	// set url
	curl_setopt($ch, CURLOPT_URL, "https://maps.googleapis.com/maps/api/geocode/json?address=".$location."&key=AIzaSyDgUdjIO6ax_g7yolqYZ1H6js7yV81A_GM");
	//return the transfer as a string
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	// $output contains the output string
	$output = curl_exec($ch);
	// close curl resource to free up system resources
	curl_close($ch);
	$output = json_decode($output, true);

	// Extracts the coordinates from Google API json structure
	return $output['results'][0]['geometry']['location'];

}

function search_where( $where ){
	global $location;
    $where.=' AND distance('.$location['lat'].','.$location['lng'].',wp_posts.id)<'.(isset($_POST["range"])?$_POST["range"]:'100');
    //$where.=' AND d<'.(isset($_POST["range"])?$_POST["range"]:'100');
  	return $where;
}

function search_fields($fields){
	global $location;
	return $fields.',(@aa:=distance('.$location['lat'].','.$location['lng'].',ID)) AS dist';
}