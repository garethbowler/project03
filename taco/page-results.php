<?php get_header();
/*
Template Name: Results Page
*/
?>


<?php
// Data arrays
$taco_meat =['Beef','Chicken','Pork','Fish','Vegan','Other'];

//Globals
$taco_count=0;

// Replaces spaces in location with %20
$location = str_replace(' ','%20',$_POST['location']);



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
$location = $output['results'][0]['geometry']['location'];


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



add_filter('posts_where', 'search_where' );
add_filter('posts_fields', 'search_fields');

$query = new WP_QUERY();
$q_param='post_type=restaurants';

?>	
	

<div class="container">     
	<div class="filter-container">
		<div>
			<span>Meat:</span>
			<div><span class="filter-label">Beef:</span><input clas="meat-selector" type="checkbox" value="1" checked></div>
			<div><span class="filter-label">Chicken:</span><input clas="meat-selector" type="checkbox" value="2" checked></div> 
			<div><span class="filter-label">Pork:</span><input clas="meat-selector" type="checkbox" value="3" checked></div>
			<div><span class="filter-label">Fish:</span><input clas="meat-selector" type="checkbox" value="4" checked></div>
			<div><span class="filter-label">Vegan:</span><input clas="meat-selector" type="checkbox"value="5" checked></div>
			<div><span class="filter-label">Other:</span><input class="meat-selector" type="checkbox" value="6" checked></div> 
		</div>
		<div> 
			<input data="rating" class="sort-tacos" type="button"value="Sort by Rating"> 
			<input data="price" class="sort-tacos" type="button"value="Sort by Price">
			<input data="heat" class="sort-tacos" type="button" value="Sort by Heat">
			<input data="distance" rev="true" class="sort-tacos" type="button" value="Sort by Distance">             
			<div class="slider-container"><span class="filter-label">Distance:</span><div><input data="distance" class="taco-range" type="range"  min="0" max="5" value="5" step="1" steps="5,10,20,50,100"/></div></div>
			<div class="slider-container"><span class="filter-label">Rating:</span><div><input type="range" class="taco-range" data="rating" rev="true" min="0" max="5" value="0" step="1" /></div></div>             
			<div class="slider-container"><span class="filter-label">Price:</span><div><input type="range"class="taco-range" data="price" rev="true" min="0" max="5"  value="5" step="1" /></div></div>
		</div>
	</div>
	<div class="login-btn-container">
		<a href="<?php echo get_permalink(68); ?>">Login</a>
	</div>

		
	
	<?php $query->query($q_param); ?>
	<?php while ( $query->have_posts() ) : $query->the_post(); ?>
	<?php
	remove_filter('posts_where', 'search_where' );
	$tacos = types_child_posts('taco-being-served');
	?>
	<div class="tacos-container col-xs-6 col-xs-offset-3">
	<?php foreach($tacos as $taco) :?>
	<?php  $taco_count++; ?>
		<div class="col-xs-12 taco-container"
		 meat="<?php echo $taco->fields['taco-meat']; ?>"
		 price="<?php echo $taco->fields['price']; ?>"
		 distance="<?php echo $post->dist; ?>"
		 rating="<?php echo $taco->fields['taco-rating']; ?>"
		 heat="<?php echo $taco->fields['heat']; ?>"
		>
			<h1><?php echo $taco->post_title ?></h1>
			<p>Restaurant: <?php echo $post->post_title ?></p>
			<span>Meat: <?php echo $taco_meat[$taco->fields['taco-meat']-1]; ?></span>
			<span>Rating: <?php echo $taco->fields['taco-rating']; ?></span>
			<span>Price: $<?php echo $taco->fields['price']; ?></span>
			<span>Heat: <?php echo $taco->fields['heat']; ?></span>
			<span>Distance: <?php echo round($post->dist,2); ?></span>
		</div>
	<?php endforeach; ?>
	<?php add_filter('posts_where', 'search_where' ); ?>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
	</div>
</div>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/filters.js"></script>
<?php 

get_footer(); 

?>

