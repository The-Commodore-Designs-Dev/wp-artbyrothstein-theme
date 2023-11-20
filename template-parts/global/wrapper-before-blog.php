<div class="row">
  <?php if( ArteHelpers::get_sidebar( 'sidebar_blog' ) ) : ?>
      <?php if( is_single() ) : ?><div class="col-md-7 col-lg-8"><?php else : ?><div class="col-md-8"><?php endif ?>
  <?php else : ?>
      <div class="col-sm-12">
  <?php endif; ?>
