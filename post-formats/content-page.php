<article id="post-<?php the_ID(); ?>" <?php post_class( 'ct-page__entry-content' ) ?>>

	<!-- The Content -->
	<?php while ( have_posts() ) : the_post(); ?>
		<?php the_content() ?>
	<?php endwhile; ?>

    <!-- After Post Content -->
	<?php do_action( 'arte_after_post_content' ); ?>

	<!-- Comments -->
	<?php if( comments_open() ) get_template_part( 'template-parts/comments' ); ?>

</article>
