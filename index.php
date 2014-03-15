<?php get_header(); ?>

<div class="toc">
	<h1><?php echo bloginfo('title'); ?></h1>

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