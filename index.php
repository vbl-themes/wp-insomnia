<?php 
	//Trick to handle Windows Live Writer theme detection 
	if(($_SERVER["REQUEST_URI"] != get_bloginfo('template_directory')."/wlw.php" )&& (strpos($_SERVER["HTTP_USER_AGENT"],"Windows Live Writer")!==false)) {
		query_posts('showposts=1&cat='.get_option('default_category'));
		include("single.php");
		return;
	}
?>

<?php get_header(); ?>

<div class="toc">
	<h1><?php echo bloginfo('description'); ?></h1>

	<?php if(have_posts()): ?>
		<ul>
	<?php while (have_posts()) : the_post(); ?>
		<li><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(150,150), "class=circle"); ?></a></li>
	<?php endwhile; ?>
		</ul>
	<?php endif; ?>

	<div class="footer">Powered by Insomnia Theme</div>
</div>

<?php get_footer(); ?>