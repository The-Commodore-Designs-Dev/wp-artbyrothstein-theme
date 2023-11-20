  <?php if( ArteHelpers::get_sidebar( 'sidebar_blog' ) ) : ?>
    </div>

    <?php if( is_single() ) : ?>
      <div class="col-md-4 ml-md-auto col-lg-3">
    <?php else : ?>
      <div class="col-md-3 ml-auto">
    <?php endif; ?>
        <?php get_template_part( 'template-parts/global/sidebar' ); ?>
  <?php endif; ?>

  </div>
</div>
