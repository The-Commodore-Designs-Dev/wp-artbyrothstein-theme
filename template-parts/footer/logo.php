<?php

$arte_logo_url 			 = esc_url_raw( get_theme_mod( 'footer_logo' ) );
$arte_logo_retina_url = esc_url_raw( get_theme_mod( 'footer_logo_retina' ) );
$arte_logo_retina_url = ! empty( $arte_logo_retina_url ) ? "srcset='$arte_logo_retina_url 2x'" : '';


if( ! empty( $arte_logo_url ) ) : ?>

  <div class="ct-footer__logo">
    <a href="<?php echo is_front_page() ? '#top' : site_url('/'); ?>" rel="home" id="ct-footer-logo">
      <img src='<?php echo esc_url( $arte_logo_url ); ?>' <?php echo ! empty( $arte_logo_retina_url ) ? $arte_logo_retina_url : '' ?> alt='<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>'>
    </a>
  </div>

<?php endif; ?>
