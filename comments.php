<div class="row comment">
  <div class="col-md-12">

    <?php if ( post_password_required() ) : ?>
  		<p><?php _e( '这篇文章受密码保护，输入密码才能查看任何评论。', 'boromeke' ); ?></p>

      <?php
  			return;
  		endif;
    	?>

    <?php if ( have_comments() ) : ?>
      <h4>
        <?php
          printf( _n( '条评论在 &ldquo;%2$s&rdquo;', '%1$s 条评论在 &ldquo;%2$s&rdquo;', get_comments_number(), 'boromeke' ),
            number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
        ?>
      </h4>

     <ul class="media-list">
       <?php
 				wp_list_comments( array( 'callback' => 'boromeke_comment' ) );
 			?>
     </ul>

     <?php
  		/*
  		 * If there are no comments and comments are closed, let's leave a little note, shall we?
  		 * But we only want the note on posts and pages that had comments in the first place.
  		 */
  		if ( ! comments_open() && get_comments_number() ) : ?>
  		<p><?php _e( '评论被关闭' , 'boromeke' ); ?></p>
  		<?php endif; ?>

  	<?php endif; // have_comments() ?>

    <?php $comments_args = array(

    	'class_submit' => 'btn btn-default',
    	// change the title of send button
    	'label_submit' => __( 'Submit' ),
    	// change the title of the reply section
    	'title_reply'=>'发表评论或回复',
    	// 目的就是给这一行自定义CSS；此数组的每一项如果想不显示某项直接 =>‘’ 就OK了
    	'comment_notes_before' => '<p>' .
    	__( '<i class="fa fa-exclamation-triangle"></i> *选项为必填项，您的电子邮件地址不会被公开。' ) . ( $req ? $required_text : '' ) .
    	'</p>',
    	// remove "Text or HTML to be displayed after the set of comment fields"
    	'comment_notes_after' => '',
    	// redefine your own textarea (the comment body)
    	'comment_field' => '<div class="form-group"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" class="form-control" cols="45" rows="8" name="comment" aria-required="true"></textarea></div>',

    	'fields' => apply_filters( 'comment_form_default_fields',
    	  array(

    		  'author' =>
    			'<div class="form-group"><label class="control-label" for="author">' . __( 'Name', 'domainreference' ) . '</label> ' .
    			( $req ? '<span class="required">*</span>' : '' ) .
    			'<input class="form-control" id="author" placeholder="请输入名字" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ).
    			'" size="30"'. $aria_req . ' /></div>',

    		  'email' =>
    			'<div class="form-group"><label class="control-label" for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
    			( $req ? : '' ) .
    			'<input class="form-control" id="email" placeholder="请输入邮箱地址" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ).
    			'" size="30"'. $aria_req . ' /></div>',

    			'url' => '',

    			)
    	)

    );

    comment_form($comments_args); ?>

    </div>
</div>
