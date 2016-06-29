<?php
/**
* 对于<li> 该文件不用写</li> 它会自动补上
*/
add_action( 'after_setup_theme', 'boromeke_setup' );

if ( ! function_exists( 'boromeke_setup' ) ):

function boromeke_setup() {

// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
    array(
      'page-menu' => __( 'Page Menu' ),
      'all-menu' => __( 'All Menu' )
    )
  );

  // Add support for a variety of post formats
	add_theme_support( 'post-formats', array( 'aside', 'link', 'gallery', 'status', 'quote', 'image' ) );

  // This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	add_theme_support( 'post-thumbnails' );

  /*
	 * We'll be using post thumbnails for custom header images on posts and pages.
	 * We want them to be the size of the header image that we just defined.
	 * Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	 */
	// set_post_thumbnail_size( $custom_header_support['width'], $custom_header_support['height'], true );
}
endif; // boromeke_setup

  /**
   * Enqueue scripts and styles for front-end.
   *
   * @since BoroMeke 1.0
   */
	function boromeke_scripts() {
	//
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css',false,'3.3.5','all');
	
	// 引入 style.css.
	wp_enqueue_style( 'boromeke-style', get_stylesheet_uri() );
	
	// 引入 font-awesome
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/font-awesome-4.4.0/css/font-awesome.min.css' );

  // 引入 JavaScript
	if (!is_admin()) {
	wp_deregister_script('jquery');
	wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.min.js', false, '2.1.4');
	wp_enqueue_script('jquery');
	}
  wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.5', true );

  /*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

  }
  add_action( 'wp_enqueue_scripts', 'boromeke_scripts' );

/**
 * 自定义Post摘要的More样式.
 */
	function boromeke_excerpt_more( $more ) {
	return ' <p class="link"><a href="' . get_permalink( get_the_ID() ) . '">' . __( '<i class="fa fa-spinner"></i> 阅读全文', 'boromeke' ) . '</a></p>';
	}
	add_filter( 'excerpt_more', 'boromeke_excerpt_more' );

/**
* 注册侧边栏小工具 register_sidebar()
*
*@desc Registers the markup to display in and around a widget
*/
	function boromeke_widgets_init() {
	
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'boromeke' ),
		'id' => 'sidebar-1',
		'before_widget' => '<div id="%1$s" class="col-md-12 widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="text-center">',
		'after_title' => '</h2>',
	) );
	}
	add_action( 'widgets_init', 'boromeke_widgets_init' );

// 自定义留言模版
	if ( ! function_exists( 'boromeke_comment' ) ) :
	
	function boromeke_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
		?>
	<li>
		<p><?php _e( 'Pingback:', 'boromeke' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'boromeke' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li class="media" id="<?php comment_ID(); ?>">
				<div class="media-body">
						<?php
							$avatar_size = 42;
							if ( '0' != $comment->comment_parent )
								$avatar_size = 39;

							echo get_avatar( $comment, $avatar_size );

							/* translators: 1: comment author, 2: date and time */
							printf( __( '%1$s on %2$s ', 'boromeke' ),
								sprintf( '<b class="media-heading">%s</b>', get_comment_author_link() ),
								sprintf( '<time datetime="%2$s">%3$s</time>',
									esc_url( get_comment_link( $comment->comment_ID ) ),
									get_comment_time( 'c' ),
									/* translators: 1: date, 2: time */
									sprintf( __( '%1$s at %2$s', 'boromeke' ), get_comment_date(), get_comment_time() )
								)
							);
						?>

				</div>

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em><?php _e( '您的评论正在等待审核。', 'boromeke' ); ?></em>
				<?php endif; ?>

			<p><?php comment_text(); ?></p>

			<p class="btn btn-primary reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( '回复', 'boromeke' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</p>
		<!-- #comment-## -->
	<?php
			break;
	endswitch;
	}
	endif;

// 定义文章发布时间格式
	if ( ! function_exists( 'boromeke_posted_on' ) ) :
	
	function boromeke_posted_on() {
		printf( __( '<time datetime="%3$s">%4$s</time>', 'boromeke' ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			get_the_date()
		);
	}
	endif;
