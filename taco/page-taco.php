<?php get_header();
/*
Template Name: Taco Page
*/


$id = $_GET['id'];
$post = get_post($id);

$comments=types_child_posts('taco-being-served');


?>



<div class="container">
	
 <div class="col-xs-6 col-xs-offset-3">
	<div class="picture-container col-xs-12">
		<?php the_post_thumbnail(); ?>
	</div>
	<h1><?php echo $post->post_title ?></h1>
	<?php  echo types_render_field("price", array("output"=>"raw"));?><br>
	<?php  echo $taco_meat[types_render_field("taco-meat", array("output"=>"raw"))];?><br>
	<?php  echo types_render_field("heat", array("output"=>"raw"));?><br>
	<?php  stars(types_render_field("taco-rating", array("output"=>"raw")));?><br>
	<p>
		<?php echo $post->post_content ?>
	</p>
	<div class="col-xs-6 col-xs-offset-3">
		<?php foreach($comments as $comment): ?>
			<?php echo $comment->post_content ?>
		<?php endforeach ?>
	</div>
	<div>
		<form action="<?php echo get_permalink(71) ?>&cmnt=create&taco=<?php echo $id ?>" method="POST" >
			<input type="text">
			<input type="submit" value="submit">
		</form>
	</div>
 </div>

 <?php 



add_filter('pre_get_posts', 'rating_order');

 $query = new WP_Query([
 	'post_type'=>'taco-being-served',
 	'posts_per_page' => '3'
 ]);

remove_filter('pre_get_posts', 'rating_order');

  ?>
 <div class="col-xs-3 ">
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
 </div>
</div>




























<?php get_footer();
?>