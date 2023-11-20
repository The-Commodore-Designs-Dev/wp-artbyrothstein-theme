<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<h2 class="post-title"><?php esc_html_e( 'Nothing Found', 'arte' ); ?></h2>
	</header>

	<p><?php esc_html_e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'arte' ); ?></p>
	<?php get_search_form(); ?>
	
</article>
