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

$location = getLocation($_POST['location']);


?>	
	
<div class="login-btn-container" loggedIn="<?php echo (is_user_logged_in()?'true':'false') ?>">
<?php 
	if(is_user_logged_in()){
		echo '<a href="'.get_permalink(71).'&logout=true">Logout</a>';
	}else {
		echo '<a href="'.get_permalink(68).'">Login</a>';
	}
?>
</div>

<div class="container">
	

<!-- ============== FILTER ======================== -->	 
	<div class="col-xs-3" >
		<div class="filter-container pull-left" >
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
		
	</div>


<!-- ================ SEARCH RESULTS ============================ -->
	<div class="tacos-container col-xs-6">
	<?php add_filter('posts_where', 'search_where' ); ?>
	
	<?php
		// Add filters for searching based on distance and retuning said distance with records
		add_filter('posts_where', 'search_where' );
		add_filter('posts_fields', 'search_fields');

		// Creating and executing query with filters
		$query = new WP_QUERY();
		$q_param='post_type=restaurants';
		$query->query($q_param); 

		//Removing filter as to not affect the child (taco) requests
		remove_filter('posts_where', 'search_where' ); 

		while ( $query->have_posts() ) : $query->the_post(); 
		$tacos = types_child_posts('taco-being-served');
	?>

	
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
			<div class="picture-container">
				<?php echo  get_the_post_thumbnail( $taco->ID, ['300','300']); ?>
			</div>
			<p>Restaurant: <?php echo $post->post_title ?></p>
			<span>Meat: <?php echo $taco_meat[$taco->fields['taco-meat']-1]; ?></span>
			<div>
				<span>Rating: <div class="star-container"><?php stars($taco->fields['taco-rating']); ?></div></span>	
			</div>
			
			<span>Price: $<?php echo $taco->fields['price']; ?></span>
			<span>Heat: <?php echo $taco->fields['heat']; ?></span>
			<span>Distance: <?php echo round($post->dist,2); ?></span>
		</div>
	<?php endforeach; ?>
	
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
	</div>


<!-- ========================== SIDEBAR ======================================== -->

	
</div>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/filters.js"></script>
<?php 

get_footer(); 

?>

