<?php get_header(); ?>

<div class="main">

  <?php if ( have_posts() ) : ?>

    <div class="tags text-muted">
      <h2>
        <?php printf( __( '搜索结果: %s', 'boromeke' ), '<b>' . get_search_query() . '</b>' ); ?>
      </h2>
    </div>

	<?php while ( have_posts() ) : the_post(); ?>

          <article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
            <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
              <?php endif; ?>
            <header class="post-title">
              <?php if ( ! post_password_required() && ! is_attachment() ) :
                        the_post_thumbnail();
                    endif; ?>
            
              <?php if ( is_single() ) : ?>
                    <h2"><?php the_title(); ?></h2>
                    <?php else : ?>
            
                <h2>
                  <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                </h2>
                <?php endif; // is_single() ?>
            
                <?php if ( 'post' == get_post_type() ) : ?>
                 <small>
                <?php boromeke_posted_on(); ?>
                </small>
                <?php endif; ?>
            
            </header>

            <?php if ( is_search() ) : // Only display Excerpts for Search ?>
        		<div class="entry-content">
        			<?php the_excerpt(); ?>
        		</div>
        		<?php else : ?>

            <div class="entry-content">
              <?php the_content( __( '<p class="link"><i class="fa fa-spinner"></i> 阅读全文</p> ', 'boromeke' ) ); ?>
          			<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'boromeke' ) . '</span>', 'after' => '</div>' ) ); ?>
            </div>
            <?php endif; ?>

            <footer class="post-footer">
              <p class="pull-left">
                <i class="fa fa-newspaper-o"></i>
                <?php the_category(', '); ?>
                <i class="fa fa-tags"></i>
                <?php the_tags( '', ', ', '' ); ?>
                <i class="fa fa-comment-o"></i>
                <?php comments_popup_link('添加评论', '1 评论', '% 评论'); ?>
              </p>
            </footer>
          </article>
         <?php endwhile; ?>
         <?php else : ?>
           <article class="post">
             <header class="post-title">
               <h2><?php _e( '似乎找不到搜索的内容', 'boromeke' ); ?></h2>
             </header>

             <div class="entry-content">
               <p><?php _e( '抱歉，没有符合您搜索条件的结果。请换其它关键词再试。', 'boromeke' ); ?></p>
             </div>
           </article>
         <?php endif; ?>

        <div class="col-md-12">
          <div class="row paging">
            <ul class="pager">
              <li><?php next_posts_link( __( '&larr; Prev', 'boromeke' ) );?></li>
              <li><?php previous_posts_link( __( 'Next &rarr;', 'boromeke' ) ); ?></li>
            </ul>
          </div>
        </div>

</div>

<?php get_footer(); ?>
