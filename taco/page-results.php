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
	
<!-- <div class="login-btn-container col-xs-12" loggedIn="<?php echo (is_user_logged_in()?'true':'false') ?>">
<?php 
	if(is_user_logged_in()){
		echo '<a href="'.get_permalink(71).'&logout=true">Logout</a>';
	}else {
		echo '<a href="'.get_permalink(68).'">Login</a>';
	}
?>
</div>  -->

<!-- ------------------------------------------------------- -->

<div id="main-pic">
	<img src="http://placehold.it/1440X450" class="img-responsive" alt="TACOS!">
</div>

<div id="content-background">
	<div class="">
		<img class="border-top" src="<?php bloginfo('template_directory'); ?>/images/searchborder.png" alt="">
	</div>

<div class="container content">

<!-- ********************* FILTER ACCORDION TEST *********************** -->

	<div class="col-xs-3 filter-main" >
		<h4 class="sidebar-head">filters:</h4>
		<div class="row">
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<div class="panel panel-default">
				    <div class="panel-heading btn btn-primary btn-block" role="tab" id="headingOne">     
				        <h4 class="panel-title"><a class="" data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">MEATS:</a></h4>   
				    </div>		    
				    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
				      <div class="panel-body">
				   			<div class="meat-type"><span class="filter-label"><h6>Beef:</h6></span><input class="meat-selector" type="checkbox" value="1" checked id="selector"><label class="pull-right" for="selector"><span></span></label></div>
							<div class="meat-type"><span class="filter-label"><h6>Chicken:</h6></span><input class="meat-selector" type="checkbox" value="1" checked id="selector"><label class="pull-right" for="selector"><span></span></label></div> 
							<div class="meat-type"><span class="filter-label"><h6>Pork:</h6></span><input class="meat-selector" type="checkbox" value="1" checked id="selector"><label class="pull-right" for="selector"><span></span></label></div>
							<div class="meat-type"><span class="filter-label"><h6>Fish:</h6></span><input class="meat-selector" type="checkbox" value="1" checked id="selector"><label class="pull-right" for="selector"><span></span></label></div>
							<div class="meat-type"><span class="filter-label"><h6>Vegan:</h6></span><input class="meat-selector" type="checkbox" value="1" checked id="selector"><label class="pull-right" for="selector"><span></span></label></div>
							<div class="meat-type"><span class="filter-label"><h6>Other:</h6></span><input class="meat-selector" type="checkbox" value="1" checked id="selector"><label class="pull-right" for="selector"><span></span></label></div> 
				      </div>
				    </div>
				 </div>

				 <div class="panel panel-default">
				    <div class="panel-heading btn btn-primary btn-block" role="tab" id="headingTwo">
				      <h4 class="panel-title">
				        <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
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
				    <div class="panel-heading btn btn-primary btn-block" role="tab" id="headingThree">
				      <h4 class="panel-title">
				        <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
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
					<a class="collapsed" data-toggle="collapse"  href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
				    <div class="panel-heading btn btn-primary btn-block" role="tab" id="headingFour">
				      <h4 class="panel-title">
				        <a class="collapsed" data-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour" value="price">
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
				</div>				
			</div>
			<div class="row">
				    <div class="col-xs-12">
				    	<input data="heat" class="heat col-xs-12" type="button" value="SORT BY HEAT">
				    </div>
			    </div>
		</div>
	</div>




<!-- ================ SEARCH RESULTS PAUL ============================ -->

		<div class="tacos-container col-xs-12 col-md-6">
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
			 style="background: url('<?php echo   wp_get_attachment_url(get_post_thumbnail_id( $taco->ID)); ?>') no-repeat center;"
			 meat="<?php echo $taco->fields['taco-meat']; ?>"
			 price="<?php echo $taco->fields['price']; ?>"
			 distance="<?php echo $post->dist; ?>"
			 rating="<?php echo $taco->fields['taco-rating']; ?>"
			 heat="<?php echo $taco->fields['heat']; ?>"
			>
				<h1 class="taconame"><?php echo $taco->post_title ?></h1>
				
				<div>	
					<h3 class="restaurant-name"><?php echo $post->post_title ?></h3>
				</div>
				<div class="star-container-results"><?php starsSize($taco->fields['taco-rating'],40,40); ?></div>
				
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
 

<!-- ================ SEARCH RESULTS ============================ -->


<


<!-- ========================== SIDEBAR ======================================== -->
		<div class="col-xs-3">
			<h4 class="sidebar-head">popular:</h4>
			<div class="col-xs-12 sidebar-right ">		
			</div>
			<h4 class="sidebar-head">sponsored:</h4>
			<div class="col-xs-12 sidebar-right ">		
			</div>
		</div>
		


</div>
</div>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/filters.js"></script>
<?php 

get_footer(); 

?>

