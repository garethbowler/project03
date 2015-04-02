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
	
<!-- ------------------------------------------------------- -->

<div id="content-background">
	<div class="container content">
		<div class="mb10"><h1 class="results">Search Results:</h1></div>

<!-- ********************* FILTER ACCORDION TEST *********************** -->

		<div class="col-xs-12 col-sm-6 col-md-3 filter-main" >
			<h4 class="sidebar-head">filters:</h4>
			<div class="row">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="panel panel-default">
					    <div class="panel-heading btn btn-primary btn-block" role="tab" id="headingOne">     
					        <h4 class="panel-title"><a class="" data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">MEATS:</a></h4>   
					    </div>		    
					    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
					      <div class="panel-body">
					   			<div class="meat-type"><span class="filter-label"><h6>Beef:</h6></span><input class="meat-selector" type="checkbox" value="1" checked id="selector1"><label class="pull-right" for="selector1"><span></span></label></div>
								<div class="meat-type"><span class="filter-label"><h6>Chicken:</h6></span><input class="meat-selector" type="checkbox" value="2" checked id="selector2"><label class="pull-right" for="selector2"><span></span></label></div> 
								<div class="meat-type"><span class="filter-label"><h6>Pork:</h6></span><input class="meat-selector" type="checkbox" value="3" checked id="selector3"><label class="pull-right" for="selector3"><span></span></label></div>
								<div class="meat-type"><span class="filter-label"><h6>Fish:</h6></span><input class="meat-selector" type="checkbox" value="4" checked id="selector4"><label class="pull-right" for="selector4"><span></span></label></div>
								<div class="meat-type"><span class="filter-label"><h6>Vegan:</h6></span><input class="meat-selector" type="checkbox" value="5" checked id="selector5"><label class="pull-right" for="selector5"><span></span></label></div>
								<div class="meat-type"><span class="filter-label"><h6>Other:</h6></span><input class="meat-selector" type="checkbox" value="6" checked id="selector6"><label class="pull-right" for="selector6"><span></span></label></div> 
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
								<div class="slider-container col-xs-12"><span class="filter-label filter-title">Distance:</span>
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
								<div class="slider-container col-xs-12"><span class="filter-label filter-title">Rating:</span>
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
								<div class="slider-container col-xs-12"><span class="filter-label filter-title">Price:</span>
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

<!--- Top Rated -->






<!-- ================ SEARCH RESULTS ============================ -->

		<div class="tacos-container col-xs-12 col-md-8 col-lg-6">
		
		
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
				<a href="<?php echo get_permalink(74) ?>&id=<?php echo $taco->ID ?>">
				<div class="picture-container col-xs-12">
					<?php echo  get_the_post_thumbnail( $taco->ID, ['300','300']); ?>
				</div>
				</a>
				
				<div class="row">
					<div class="col-xs-12 col-sm-7">	
						<h3 class="restaurant-name"><?php echo $post->post_title ?></h3>
					</div>
					<div class="col-xs-12 col-sm-5">
						<span><div class="star-container"><?php stars($taco->fields['taco-rating']); ?></div></span>	
					</div>
				</div>
				<div class="row">
<!-- 					<div class="col-xs-12"> -->
						<div class="other-info">Meat: <?php echo $taco_meat[$taco->fields['taco-meat']-1]; ?></div>
						<div class="other-info">Price: $<?php echo $taco->fields['price']; ?></div>
						<div class="other-info">Heat: <?php echo $taco->fields['heat']; ?></div>
						<div class="other-info">Miles: <?php echo round($post->dist,2); ?></div>
<!-- 					</div> -->
				</div>
			</div>
		<?php endforeach; ?>
		
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		</div>

<!-- ========================== SIDEBAR ======================================== -->
		<?php 
		add_filter('pre_get_posts', 'rating_order');
		 $query1 = new WP_Query([
		 	'post_type'=>'taco-being-served',
		 	'posts_per_page' => '3'
		 ]);
		remove_filter('pre_get_posts', 'rating_order');
		  ?>

		<!-- <div class="col-xs-3 hidden-md">
			<h4 class="sidebar-head">Featured Tacos:</h4>
			<div class="col-xs-12 sidebar-right ">		
			</div> -->

			
				<div class="col-xs-3 hidden-md hidden-sm hidden-xs">
					<h4 class="sidebar-head">Top Rated:</h4>
					<div class="sidebar-right">
							
				 		<?php while ( $query1->have_posts() ) : $query1->the_post();  ?>
						<div class="col-xs-12 col-sm-12">
							<h5 class="restaurant-name2"><?php echo $post->post_title ?></h5>
						</div>
						<div class="col-xs-12 col-sm-12">
							<span><div class="star-container2"><?php  stars(types_render_field("taco-rating", array("output"=>"raw")));?></div></span>	
						</div>

				 		<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
				 	</div> 
				</div>
			</div>
		</div>
</div>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/filters.js"></script>
<?php 

get_footer(); 

?>

