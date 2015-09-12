
<div class="col-md-4 col-sm-4 hidden-xs">
  <div class="sidebar">
    <?php
      wp_nav_menu(
        array(
          'theme_location'  => 'page-menu',
          'container'       => 'div',
          'container_class' => 'col-md-12',
          'menu_class'      => 'list-inline text-center',
          'echo'            => true,
          'fallback_cb'     => 'wp_page_menu',
          'link_before'     => '<h2>',
          'link_after'      => '</h2>',
          'depth'           => 0,
          )
        ); ?>
    <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
    <?php endif; ?>
  </div>
</div>
