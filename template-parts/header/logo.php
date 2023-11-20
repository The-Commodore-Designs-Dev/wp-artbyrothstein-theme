<?php

$arte_title 			     = esc_attr( get_bloginfo( 'name' ) );
$arte_desc 			     = esc_attr( get_bloginfo( 'description' ) );
$arte_logo_url 			 = esc_url_raw( get_theme_mod( 'logo' ) );
$arte_logo_retina_url = esc_url_raw( get_theme_mod( 'logo_retina' ) );

?>
<?php if( ! empty( $arte_logo_url ) ) : ?>
  <img class="ct-logo__image" src='<?php echo esc_url( $arte_logo_url ) ?>' <?php if( ! empty( $arte_logo_retina_url ) ) echo "srcset='" . esc_url( $arte_logo_retina_url ). " 2x'" ?> alt='<?php echo esc_attr( $arte_title ) ?>'>
<?php else : ?>
  <span><?php echo esc_attr( $arte_title ) ?></span>
  <small><?php echo esc_attr( $arte_desc ) ?></small>
<?php endif; ?>
