<?php

$arte_hero           = ArteHelpers::header_slider();
$arte_hero_image     = ArteHelpers::header_image();
$arte_hero_navigator = wp_kses_post( get_post_meta( get_the_id(), '_xtender_header_scroller', true ) );
$arte_hero_sec_title = esc_attr( get_post_meta( get_the_id(), '_xtender_sec_nav_title', true ) );
$arte_hero_sec_color = esc_attr( get_post_meta( get_the_id(), '_xtender_color_sec_nav', true ) );
$arte_hero_sec_nav   = ! empty( $arte_hero_sec_title ) ? true : false;
$arte_hero_data      = array();

if( $arte_hero_sec_nav ){
  $arte_hero_data[] = "data-section-title='$arte_hero_sec_title'";

  if( ! empty( $arte_hero_sec_color ) ){
    $arte_hero_data[] = "data-section-color='$arte_hero_sec_color'";
  }

}

if( ArteHeading::check() || $arte_hero_image || $arte_hero ) : ?>

  <?php if( $arte_hero_sec_nav ) : ?>
    <div class="scrollable-section" <?php echo implode( ' ', $arte_hero_data ); ?>>
  <?php endif; ?>

    <div id="ct-header__hero" class="ct-header__hero" data-slider="<?php esc_attr( $arte_hero  ? 'true' : 'false' ) ?>">
      <?php
        if( ! empty( $arte_hero_navigator ) ) : ?><div id="ct-header__hero-navigator" class="ct-header__hero-navigator"><a href="#"><?php echo wp_kses_post( $arte_hero_navigator ) ?></a></div><?php endif;
        if( $arte_hero && $arte_hero !== 'disable-header-slider' ) echo do_shortcode( "[rev_slider alias='$arte_hero']" );
        if( ArteHeading::check() ) get_template_part( 'template-parts/header/heading' ); ?>
    </div>

<?php if( $arte_hero_sec_nav ) : ?>
  </div>
<?php endif; endif; ?>
