<?php $arte_sidebar = ArteHelpers::get_sidebar( 'sidebar_page' ); if( $arte_sidebar ) : ?>
<div class="ct-sidebar content-padding">
  <?php dynamic_sidebar( $arte_sidebar ); ?>
</div>
<?php endif; ?>
