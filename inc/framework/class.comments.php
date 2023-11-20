<?php

class ArteComments extends Walker_Comment {
	var $tree_type = 'comment';
	var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );
	function __construct() { ?>
		<section id="comments" class="comments-list comments media-list">
	<?php }
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$GLOBALS['comment_depth'] = $depth + 2; ?>
		<section class="child-comments comments-list media-list">
	<?php }
	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$GLOBALS['comment_depth'] = $depth + 2; ?>
		</section>
	<?php }
	function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
		$depth++;
		$GLOBALS['comment_depth'] = $depth;
		$GLOBALS['comment'] = $comment;
		$parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' );
		$tag = 'article';
		$add_below = 'comment';
		?>
		<article <?php comment_class( isset( $args['has_children'] ) && empty( $args['has_children'] ) ? 'media comment' : 'media parent comment' ) ?> id="comment-<?php comment_ID() ?>" itemprop="comment" itemscope itemtype="http://schema.org/Comment" class="comment">
			<figure class="gravatar media-left"><?php echo get_avatar( $comment, 128, '', false, array( 'class' => 'media-object' ) ); ?></figure>
			<div class="media-body">
				<div class="comment-meta post-meta" role="complementary">
					<div class="comment-author-meta">
						<h4 class="comment-author media-heading" itemprop="author">
							<?php comment_author(); ?>
						</h4>
						<time class="comment-meta-item" datetime="<?php comment_date('Y-m-d') ?>T<?php comment_time('H:iP') ?>" itemprop="datePublished"><?php comment_date() ?> @ <?php comment_time() ?></time>
						<?php if ( intval( $comment->comment_approved ) === 0 ) : ?>
						<p class="comment-meta-item"><?php esc_html_e( 'Your comment is awaiting moderation.', 'arte' ) ?></p>
						<?php endif; ?>
					</div>
					<div class="comment-action">
						<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
					</div>
				</div>
				<div class="comment-content post-content" itemprop="text">
					<?php comment_text() ?>
					<?php edit_comment_link( esc_html__( 'Edit Comment', 'arte' ),'',''); ?>
				</div>
	<?php }
	function end_el(&$output, $comment, $depth = 0, $args = array() ) { ?>
			</div>
		</article>

	<?php }
	function __destruct() { ?>
		</section>
	<?php }

}

/*	Threaded Comments
	================================================= */
	function arte_xtreme_enqueue_comments_reply() {
	    if( get_option( 'thread_comments' ) )  {
	        wp_enqueue_script( 'comment-reply' );
	    }
	}
	add_action( 'comment_form_before', 'arte_xtreme_enqueue_comments_reply' );

/*	Hide Comments
	================================================= */
	if ( get_theme_mod( 'comments', false ) === true ) {
		add_filter( 'comments_open', 'arte_comments_open', 10, 2 );
		function arte_comments_open( $open, $post_id ) {
			$post = get_post( $post_id );
            if ( 'page' == $post->post_type ){
                $open = false;
            }
			return $open;
		}
	}

?>
