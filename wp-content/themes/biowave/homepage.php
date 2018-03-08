<?php

/**
 * Template Name: Home page
 *
 * @package WordPress
 * @subpackage Biowave
 */

get_header(); ?>
<?php $args = array(
		 
		 'orderby'          => 'date',
		 'order'            => 'DESC',
		 'post_type'        => 'post',
		 'post_status'      => 'publish',
		);
		$posts_array = get_posts( $args ); 
	//	print_r ($posts_array );
		//$i=0;		
		?>
<div class="container">
<?php the_title( '<h1>', '</h1>' ); ?>
	<section>
	
<ul class="blog-list-ul">
	<?php //if (have_posts()) : while (have_posts()) : the_post(); 
 
			foreach($posts_array as $p)
			{
			?>
		<li <?php post_class() ?> id="post-<?php the_ID(); ?>">			
			<div class="blog-list-img">
				 <?php  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $p->ID ), 'full' );
				// print_r ($image);
			  ?>
				<img class="card-img-top" src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title(get_post_thumbnail_id( $post->ID ));?>">
			</div>
			<div class="entry blog-list-content">
				<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
				<h2><a href="<?php echo get_permalink($p->ID); ?>"><?php echo $p->post_title; ?></a></h2>
				<?php the_excerpt($p->post_excerpt); ?>
				<p><?php echo $p->post_excerpt; ?></p>
				<a class="readmore" href="<?php the_permalink() ?>">Read More</a>
			</div>	

		</li>

			<?php  }
			
			?>
	<?php //endwhile; ?>

	<?php //include (TEMPLATEPATH . '/inc/nav.php' ); ?>

	
</ul>
</section>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>