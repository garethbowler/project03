<?php get_header();
/*
Template Name: Taco Page
*/


$id = $_GET['id'];
$post = get_post($id);

$comments=types_child_posts('taco-being-served');


?>


<div class="singles-container">
	<div class="container">
		<div class="col-xs-12">
			<div class="row">
				<h1 class="singles-title"><?php echo $post->post_title ?></h1>
			</div>
			<div class="col-xs-12 col-md-4 singles-thmb">
				<?php the_post_thumbnail(); ?>
			</div>
			<div class="col-xs-12 col-md-6">
				<p>
					<?php echo $post->post_content ?>
				</p>
				<div class="col-xs-12 col-md-6">
					<div class="row">
						<?php  stars(types_render_field("taco-rating", array("output"=>"raw")));?>																		
						<div class="row">
							<h4>Price: <?php  echo types_render_field("price", array("output"=>"raw"));?></h4>
						</div>
						<div class="row">	
							<div class="col-xs-6">
								<p>
									<?php  echo $taco_meat[types_render_field("taco-meat", array("output"=>"raw"))];?>,
									<?php  echo types_render_field("heat", array("output"=>"raw"));?>
								</p>
							</div>
							<div id="like" class="text-left col-xs-6">
							
								<div class="row">
									<div class="btn btn-primary">
										Like it!
									</div>								
									<div class="btn btn-primary">
										Hate it!
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>			
		<div class="row">
			<div class="col-xs-12 col-md-5 text-center btn-group-verticle">
				<button class="btn btn-primary btn-block">
					<i class="fa fa-map-marker"> 6600 Topanga Canyon Blvd., Topanga Mall</i>
				</button>
				<button class="btn btn-primary btn-block">
					<i class="fa fa-location-arrow"> Get Directions</i>
				</button>
			</div>
		</div>
		<div class="col-xs-12">
			<div class="buffer"></div>
			<div class="btn btn-primary review-btn">
				write a review
			</div>
		</div>
<!-- 		<div class="row reviews">
			<i class="fa fa-comments-o"> Comments/Reviews</i>
			<div class="row">
			</div>
		</div>
			 	 -->
		<!-- <?php foreach($comments as $comment): ?>
				<div class="col-xs-10">
					<h3><?php echo $comment->post_title ?></h3>
					<p><?php echo $comment->post_content ?></p>
				</div> 
			<?php endforeach ?> -->
<!-- 		<div class="col-xs-12 row">
			<div class="col-xs-2">
				<img src="https://placehold.it/100x100" class="img-responsive" alt="">
			</div>
			
			<div class="col-xs-10 row">
				<h3>Title</h3>
				<h5>Place From: Woodland Hills, CA</h5>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum consequuntur iusto quidem nobis aliquam velit ratione aperiam at, est enim illo doloremque repellendus quod impedit amet quia facilis delectus. Corporis!</p>
			</div>
				<div class="col-xs-2">
				<img src="https://placehold.it/100x100" class="img-responsive" alt="">
			</div>
			
			<div class="col-xs-10 row">
				<h3>Title</h3>
				<h5>Place From: Woodland Hills, CA</h5>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum consequuntur iusto quidem nobis aliquam velit ratione aperiam at, est enim illo doloremque repellendus quod impedit amet quia facilis delectus. Corporis!</p>
			</div>
				<div class="col-xs-2">
				<img src="https://placehold.it/100x100" class="img-responsive" alt="">
			</div>
			
			<div class="col-xs-10 row">
				<h3>Title</h3>
				<h5>Place From: Woodland Hills, CA</h5>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum consequuntur iusto quidem nobis aliquam velit ratione aperiam at, est enim illo doloremque repellendus quod impedit amet quia facilis delectus. Corporis!</p>
			</div>
				<div class="col-xs-2">
				<img src="https://placehold.it/100x100" class="img-responsive" alt="">
			</div>
			
			<div class="col-xs-10 row">
				<h3>Title</h3>
				<h5>Place From: Woodland Hills, CA</h5>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum consequuntur iusto quidem nobis aliquam velit ratione aperiam at, est enim illo doloremque repellendus quod impedit amet quia facilis delectus. Corporis!</p>
			</div>
		</div> -->
	</div>
</div>


<?php get_footer();
?>