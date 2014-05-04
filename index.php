<?php 
	//Trick to handle Windows Live Writer theme detection 
	if(($_SERVER["REQUEST_URI"] != get_bloginfo('template_directory')."/wlw.php" )&& (strpos($_SERVER["HTTP_USER_AGENT"],"Windows Live Writer")!==false)) {
		query_posts('showposts=1&cat='.get_option('default_category'));
		include("single.php");
		return;
	}
?>

<?php get_header(); ?>

<h1 class="main"><?php echo bloginfo('description'); ?></h1>

<?php if(have_posts()): ?>
	<nav class="main">
<?php while (have_posts()) : the_post(); ?>
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(120,120), "class=circle"); ?></a>
<?php endwhile; ?>
	</nav>
<?php endif; ?>

<footer class="main">Powered by Insomnia Theme</footer>

<?php get_footer(); ?>