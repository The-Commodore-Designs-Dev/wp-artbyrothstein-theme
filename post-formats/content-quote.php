<aside id="post-<?php the_ID(); ?>" <?php post_class('ct-post entry'); ?>>

	<div class="ct-post__content xtd-shadow--normal-light">
		<?php the_content(); ?>
	</div>

	<header class="mt-4">
		<?php get_template_part( 'template-parts/meta', 'loop' ); ?>
	</header>

</aside>
