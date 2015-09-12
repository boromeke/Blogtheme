<?php get_header(); ?>

<div class="main">

  <?php while ( have_posts() ) : the_post(); ?>

    <article class="post" id="post-<?php the_ID(); ?>">
        <header class="post-title">
        <h2><?php the_title(); ?></h2>
        </header>
        <div class="entry-content">
        <?php the_content(); ?>
        </div>
    </article>

	<?php comments_template( '', true ); ?>
    <?php endwhile; // end of the loop. ?>

</div>

<?php get_footer(); ?>
