<div class="ct-header__logo-nav">
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="ct-logo">
    <?php get_template_part( 'template-parts/header/logo', 'sticky' ); ?>
    <?php get_template_part( 'template-parts/header/logo', 'inverted' ); ?>
    <?php get_template_part( 'template-parts/header/logo' ); ?>
  </a>
  <?php get_template_part( 'template-parts/header/navigation' ); ?>
</div>
