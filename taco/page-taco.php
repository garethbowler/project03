<?php get_header();
/*
Template Name: Taco Page
*/


$id = $_GET['id'];
$post = get_post($id);

$comments=types_child_posts('taco-being-served');


?>



<div class="container">
	<div class="col-xs-12">
		<?php the_post_thumbnail(); ?>
	</div>
	<div class="row">
		<h1><?php echo $post->post_title ?></h1>
	</div>
	<div class="col-xs-12">
		<div class="col-xs-6">
			<div class="row">
				<h3><?php  echo types_render_field("price", array("output"=>"raw"));?></h3>
			</div>
			<div class="row">
				<p>
					<?php  echo $taco_meat[types_render_field("taco-meat", array("output"=>"raw"))];?>,
					<?php  echo types_render_field("heat", array("output"=>"raw"));?>
				</p>
			</div>
		</div>


		<div class="col-xs-6 text-right">
			<div class="row">
				<span class="like-percent">
					<?php  stars(types_render_field("taco-rating", array("output"=>"raw")));?>
				</span>
			</div>
			<div class="row">
				<div class="btn btn-primary">
					Like it!
				</div>
			</div>	
			<div class="row">
				<div class="btn btn-primary">
					Hate it!
				</div>
			</div>
		</div>
		

	</div>


	<p>
		<?php echo $post->post_content ?>
	</p>
	
	<div class="row">
		<div class="col-xs-12 col-md-5 text-left btn-group-verticle">
			<button class="btn btn-primary btn-block">
				<i class="fa fa-map-marker"> 6600 Topanga Canyon Blvd., Topanga Mall</i>
			</button>
			<button class="btn btn-primary btn-block">
				<i class="fa fa-location-arrow"> Get Directions</i>
			</button>
		</div>
	</div>
	<div class="col-xs-12">
		<h3><?php echo $post->post_title ?> Reviews:</h3>
			<div class="btn btn-primary">
				write a review
			</div>
	</div>
	<div class="row reviews">
		<i class="fa fa-comments-o"> Comments/Reviews</i>
		<div class="row">
		</div>

	</div>
	<div class="col-xs-12">
		
		<?php foreach($comments as $comment): ?>
			<div class="col-xs-2">
				<img src="https://placehold.it/100x100" class="img-responsive" alt="">
			</div>
			<div class="col-xs-10">
				<h3><?php echo $comment->post_title ?></h3>
				<p><?php echo $comment->post_content ?></p>
			</div>
		<?php endforeach ?>
	</div>
	<div>
		<form action="<?php echo get_permalink(71) ?>&cmnt=create&taco=<?php echo $id ?>" method="POST" >
			<input type="text">
			<input type="submit" value="submit">
		</form>
	</div>
 

	 <?php 



	add_filter('pre_get_posts', 'rating_order');

	 $query = new WP_Query([
	 	'post_type'=>'taco-being-served',
	 	'posts_per_page' => '3'
	 ]);

	remove_filter('pre_get_posts', 'rating_order');

	  ?>
	<!--  <div class="col-xs-3 ">
	 	<div class="col-xs-12 top-rated-container">
	 		<?php while ( $query->have_posts() ) : $query->the_post();  ?>
	 		<?php echo $post->ID ?><br>
	 		<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
	 	</div>
	<?php 
	$query = new WP_Query([
		'post_type'=>'taco-being-served',
		'posts_per_page' => '3'
		]);
	 ?>
		 	<div class="col-xs-12 featured-container">
				<?php while ( $query->have_posts() ) : $query->the_post();  ?>
				<?php echo $post->ID ?><br>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>

		 	</div>
	 	</div> -->
</div>




























<?php get_footer();
?>