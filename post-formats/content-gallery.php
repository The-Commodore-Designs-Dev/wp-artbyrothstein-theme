<aside id="post-<?php the_ID(); ?>" <?php post_class('ct-post entry animated'); ?>>
	<?php $arte_post_gallery = get_post_gallery( get_the_id(), false ); if ( isset( $arte_post_gallery['ids'] ) && ! empty( $arte_post_gallery['ids'] ) ) : $arte_gallery_ids = explode( ',', $arte_post_gallery['ids'] ); ?>

		<div class="ct-gallery--carousel owl-carousel">

			<?php $i = 8; foreach ( $arte_gallery_ids as $id ) : if( $i > 0 ) : $i--; ?>

				<div class="item"><a href="<?php the_permalink(); ?>"><?php echo wp_get_attachment_image( $id, 'large' ) ?></a></div>

			<?php endif; endforeach; ?>

		</div>

	<?php elseif( isset( $arte_post_gallery['src'] ) && ! empty( $arte_post_gallery['src'] ) ) : ?>



		<div class="ct-gallery--grid">

			<?php $i = 12; foreach ( $arte_post_gallery['src'] as $image ) : if( $i > 0 ) : $i--; ?>

				<div class="item"><a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url( $image ); ?>"></a></div>

			<?php endif; endforeach; ?>

		</div>

	<?php endif; ?>

	<header class="mt-3">
		<?php get_template_part( 'template-parts/title', 'loop' ); ?>
		<?php get_template_part( 'template-parts/meta', 'loop' ); ?>
	</header>



</aside>
