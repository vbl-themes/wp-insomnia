<?php get_header(); ?>
<?php if(have_posts()): the_post(); ?>
	<?php if(strpos($_SERVER["HTTP_USER_AGENT"],"Windows Live Writer")===false) (the_post_thumbnail()); ?>
	
	<div class="caption">
	
		<div class="sidebar">
			<a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/up.png" /></a>
		</div>
		
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
	
		<div class="meta">
			<p class="date"><?php the_date(); ?></p>
			<?php previous_post_link("%link",'<img src="'.get_template_directory_uri().'/img/left.png" />'); ?>
			<?php next_post_link("%link",'<img src="'.get_template_directory_uri().'/img/right.png" />'); ?>
		</div>
	</div>
<?php else: ?>
	<h1>Post not found. Are you sure what you are looking for?</h1>
<?php endif ?>
<?php get_footer(); ?>