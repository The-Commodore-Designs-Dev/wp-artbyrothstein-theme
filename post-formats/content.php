<article id="post-<?php the_ID(); ?>" <?php post_class('ct-post entry'); ?>>
	<header>
		<?php get_template_part( 'template-parts/title', 'loop' ); ?>
		<?php get_template_part( 'template-parts/meta', 'loop' ); ?>
		<?php get_template_part( 'template-parts/featured', 'image' ); ?>
	</header>

	<div class="ct-post__excerpt mb-4">
		<?php echo get_the_excerpt(); ?>
	</div>

	<?php get_template_part( 'template-parts/button', 'read-more'); ?>
	<?php get_template_part( 'template-parts/pagination', 'links'); ?>

</article>
