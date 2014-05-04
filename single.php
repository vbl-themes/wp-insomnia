<?php get_header(); ?>
<?php if(have_posts()): the_post(); ?>
<main>
	<?php if(strpos($_SERVER["HTTP_USER_AGENT"],"Windows Live Writer")===false): ?>
		<figure><?php the_post_thumbnail(array($_SESSION["screen"], $_SESSION["screen"])); ?></figure>
	<?php endif ?>

	<aside>
		<article>
			<h1 onclick="handleRoll()"><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</article>
	
		<footer>
			<p class="date"><?php the_date(); ?></p>
			<?php previous_post_link("%link",'<img src="'.get_template_directory_uri().'/img/left.png" />'); ?>
			<?php next_post_link("%link",'<img src="'.get_template_directory_uri().'/img/right.png" />'); ?>
			<a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/up.png" /></a>
		</footer>
	</aside>
</main>
<?php else: ?>
	<h1>Post not found. Are you sure what you are looking for?</h1>
<?php endif ?>
<?php get_footer(); ?>