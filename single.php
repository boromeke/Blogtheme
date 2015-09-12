<?php get_header(); ?>

<div class="main">

  <?php while ( have_posts() ) : the_post(); ?>

    <article class="post" id="post-<?php the_ID(); ?>">
      <header class="post-title">
        <h2><?php the_title(); ?></h2>
        <?php if ( 'post' == get_post_type() ) : ?>
        <?php endif; ?>
         <small>
        <?php boromeke_posted_on(); ?>
        </small>
      </header>
      
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
    <footer class="post-footer">
      <p class="pull-left">
        <i class="fa fa-newspaper-o"></i>
        <?php the_category(', '); ?>
        <i class="fa fa-tags"></i>
        <?php the_tags( '', ', ', '' ); ?>
        <?php edit_post_link( __( '编辑', 'boromeke' ), '<i class="fa fa-pencil-square-o">', '</i>' ); ?>
      </p>
    </footer>
  </article>

  <?php comments_template( '', true ); ?>
  <?php endwhile; // end of the loop. ?>

</div>

<?php get_footer(); ?>
