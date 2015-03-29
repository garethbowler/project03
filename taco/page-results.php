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
	
<!-- <div class="login-btn-container" loggedIn="<?php echo (is_user_logged_in()?'true':'false') ?>">
<?php 
	if(is_user_logged_in()){
		echo '<a href="'.get_permalink(71).'&logout=true">Logout</a>';
	}else {
		echo '<a href="'.get_permalink(68).'">Login</a>';
	}
?>
</div> -->

<!-- <div id="main-pic">
	<img src="http://placehold.it/1440X450" class="img-responsive" alt="TACOS!">
</div> -->

<div id="content-background">
	<div class="">
		<img class="border-top" src="<?php bloginfo('template_directory'); ?>/images/searchborder.png" alt="">
	</div>

	<div class="container content">

<!-- ********************* FILTER ACCORDION TEST *********************** -->

		<div class="col-xs-12 col-md-4 col-lg-3 filter-main" >
			<h4>Filter</h4>
			<div class="row">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="panel panel-default">
					    <div class="panel-heading" role="tab" id="headingOne">
					      <h4 class="panel-title">
					        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
					        <span class="filter-head">MEATS:</span>  
					        </a>
					      </h4>
					    </div>		    
					    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
					      <div class="panel-body">
					   			<div><span class="filter-label filter-title">Beef:</span><input class="meat-selector" type="checkbox" value="1" checked></div>
								<div><span class="filter-label filter-title">Chicken:</span><input class="meat-selector" type="checkbox" value="2" checked></div> 
								<div><span class="filter-label filter-title">Pork:</span><input class="meat-selector" type="checkbox" value="3" checked></div>
								<div><span class="filter-label filter-title">Fish:</span><input class="meat-selector" type="checkbox" value="4" checked></div>
								<div><span class="filter-label filter-title">Vegan:</span><input class="meat-selector" type="checkbox"value="5" checked></div>
								<div><span class="filter-label filter-title">Other:</span><input class="meat-selector" type="checkbox" value="6" checked></div> 
					      </div>
					    </div>
					</div>

					 <div class="panel panel-default">
					    <div class="panel-heading" role="tab" id="headingTwo">
					      <h4 class="panel-title">
					        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					          DISTANCE:
					        </a>
					      </h4>
					    </div>
					    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
					      <div class="panel-body">
								<input data="distance" rev="true" class="sort-tacos col-xs-12" type="button" value="Sort by Distance"> 
								<div class="slider-container col-xs-12"><!-- <span class="filter-label filter-title">Distance:</span> -->
									<div><input data="distance" class="taco-range" type="range"  min="0" max="5" value="5" step="1" steps="5,10,20,50,100"/></div>
								</div> 
					      </div>
					    </div>
					 </div>

					 <div class="panel panel-default">
					    <div class="panel-heading" role="tab" id="headingThree">
					      <h4 class="panel-title">
					        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					          RATING:
					        </a>
					      </h4>
					    </div>
					    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
						    <div class="panel-body">
								<input data="rating" class="sort-tacos col-xs-12 filter-title" type="button"value="Sort by Rating">
								<div class="slider-container col-xs-12"><!-- <span class="filter-label filter-title">Rating:</span> -->
									<div><input type="range" class="taco-range" data="rating" rev="true" min="0" max="5" value="0" step="1" /></div>
								</div>
						    </div>
					    </div>
					 </div>

					 <div class="panel panel-default">
					    <div class="panel-heading" role="tab" id="headingFour">
					      <h4 class="panel-title">
					        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
					          PRICE:
					        </a>
					      </h4>
					    </div>
					    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
					      	<div class="panel-body">
								<input data="price" class="sort-tacos col-xs-12" type="button"value="SORT BY PRICE">
								<div class="slider-container col-xs-12"><!-- <span class="filter-label filter-title">Price:</span> -->
									<div><input type="range"class="taco-range" data="price" rev="true" min="0" max="5"  value="5" step="1" /></div>
								</div>
					      	</div>
					    </div>
					    <div class="row">
						    <div class="col-xs-12 heat">
						    	<input data="heat" class="sort-tacos col-xs-12" type="button" value="SORT BY HEAT">
						    </div>
					    </div>
					</div>				
				</div>
			</div>
		</div>




<!-- ============== SHANT FILTER ======================== -->	

<!-- 	<div class="col-xs-3 filter-main" >
	<h3 class="sidebar-head">FILTERS:</h3>
		<div class="filter-container pull-left" >
			<div>
				<span>Meat:</span>
				<div><span class="filter-label filter-title">Beef:</span><input clas="meat-selector" type="checkbox" value="1" checked></div>
				<div><span class="filter-label filter-title">Chicken:</span><input clas="meat-selector" type="checkbox" value="2" checked></div> 
				<div><span class="filter-label filter-title">Pork:</span><input clas="meat-selector" type="checkbox" value="3" checked></div>
				<div><span class="filter-label filter-title">Fish:</span><input clas="meat-selector" type="checkbox" value="4" checked></div>
				<div><span class="filter-label filter-title">Vegan:</span><input clas="meat-selector" type="checkbox"value="5" checked></div>
				<div><span class="filter-label filter-title">Other:</span><input class="meat-selector" type="checkbox" value="6" checked></div> 
			</div>
			<div> 
				<input data="rating" class="sort-tacos col-xs-12 filter-title" type="button"value="Sort by Rating">
				<div class="slider-container col-xs-12"><span class="filter-label filter-title">Rating:</span>
					<div><input type="range" class="taco-range" data="rating" rev="true" min="0" max="5" value="0" step="1" /></div>
				</div>
				<input data="price" class="sort-tacos col-xs-12 filter-title" type="button"value="Sort by Price">
				<div class="slider-container col-xs-12"><span class="filter-label filter-title">Price:</span>
					<div><input type="range"class="taco-range" data="price" rev="true" min="0" max="5"  value="5" step="1" /></div>
				</div>
				<input data="distance" rev="true" class="sort-tacos col-xs-12 filter-title" type="button" value="Sort by Distance"> 
				<div class="slider-container col-xs-12"><span class="filter-label filter-title">Distance:</span>
					<div><input data="distance" class="taco-range" type="range"  min="0" max="5" value="5" step="1" steps="5,10,20,50,100"/></div>
				</div> 
				<input data="heat" class="sort-tacos col-xs-12" type="button" value="Sort by Heat">           
				<div class="slider-container col-xs-12"><span class="filter-label filter-title">Distance:</span><div><input data="distance" class="taco-range" type="range"  min="0" max="5" value="5" step="1" steps="5,10,20,50,100"/></div></div>
				<div class="slider-container col-xs-12"><span class="filter-label filter-title">Rating:</span><div><input type="range" class="taco-range" data="rating" rev="true" min="0" max="5" value="0" step="1" /></div></div>             
				<div class="slider-container col-xs-12"><span class="filter-label filter-title">Price:</span><div><input type="range"class="taco-range" data="price" rev="true" min="0" max="5"  value="5" step="1" /></div></div>
			</div>
		</div>	
	</div> -->


<!-- ================ SEARCH RESULTS PAUL ============================ -->

<!-- 		<div class="tacos-container col-xs-12 col-md-6">
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
				<h1 class="taconame"><?php echo $taco->post_title ?></h1>
				<div class="picture-container">
					<?php echo  get_the_post_thumbnail( $taco->ID, ['300','300']); ?>
				</div>
				<div class="row">
				<div class="col-xs-6">
					<h3 class="restaurant-name"><?php echo $post->post_title ?></h3>
				</div>
				<div class="col-xs-6">
					<span><div class="star-container"><?php stars($taco->fields['taco-rating']); ?></div></span>	
				</div>
				</div>
				<div class="col-xs-12">
					<span>Meat: <?php echo $taco_meat[$taco->fields['taco-meat']-1]; ?></span>
					<span>Price: $<?php echo $taco->fields['price']; ?></span>
					<span>Heat: <?php echo $taco->fields['heat']; ?></span>
					<span>Distance: <?php echo round($post->dist,2); ?></span>
					</div>
			</div>
		<?php endforeach; ?>
		
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		</div>
 -->

<!-- ================ SEARCH RESULTS SHANT ============================ -->

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

		<div class="taco-container"
		 meat="<?php echo $taco->fields['taco-meat']; ?>"
		 price="<?php echo $taco->fields['price']; ?>"
		 distance="<?php echo $post->dist; ?>"
		 rating="<?php echo $taco->fields['taco-rating']; ?>"
		 heat="<?php echo $taco->fields['heat']; ?>"
		>
			<div class="picture-container no-pad-marg">
				<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($taco->ID) ) ?>">
				<span><?php echo round($post->dist,2); ?>m</span>
			</div>
			<div class="info-container pull-right">
				<div class="star-container"><?php stars($taco->fields['taco-rating']); ?></div>
			</div>
		</div>
	<?php endforeach; ?>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
	</div>


<!-- ========================== SIDEBAR ======================================== -->

	</div>

</div>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/filters.js"></script>
<?php 

get_footer(); 

?>

