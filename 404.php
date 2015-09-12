<?php get_header(); ?>

<div class="main">

    <article class="post">
      <header class="post-title">
        <h2><?php _e( '有点尴尬', 'boromeke' ); ?></h2>
      </header>
      <div class="entry-content">
        <p><?php _e( '可能无法找到您需要的内容。或许可以尝试下搜索你需要的内容！', 'boromeke' ); ?></p>
      </div>
  </article>

  <?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

</div>

<?php get_footer(); ?>
