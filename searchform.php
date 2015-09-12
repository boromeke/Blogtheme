
<div class="col-md-6 header-search">
  <div id="search-bar" class="container col-xs-12 col-md-6 search search-bar">
    <form method="get" id="blogform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
      <input for="search" class="input" placeholder="<?php esc_attr_e( 'Search', 'boromeke' ); ?>" type="text" name="s" id="search">
      <input class="search-btn" type="submit" name="submit" id="searchsubmit" value="" />
      <span class="search-ico"><?php _e( '<i class="fa fa-search"></i>', 'boromeke' ); ?></span>
    </form>
  </div>
</div>
