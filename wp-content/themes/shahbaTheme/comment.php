<?php

if (!function_exists('shahba_comment')):

	/**
	 * Callback for displaying a comment
	 *
	 * @todo eventually move to templates with auto-generated functions as template containers
	 *
	 * @param mixed   $comment
	 * @param array   $args
	 * @param integer $depth
	 */
	function shahba_comment($comment, $args, $depth)
	{
		$GLOBALS['comment'] = $comment;

		switch ($comment->comment_type):
			case 'pingback':
			case 'trackback':
			?>

			<li class="post pingback">
				<p><?php _e('Pingback:', TEMPLATE_DMN); ?> <?php comment_author_link(); ?><?php edit_comment_link(__('Edit', TEMPLATE_DMN), '<span class="edit-link">', '</span>'); ?></p>
			<?php
				break;


			default:
			?>

			<li <?php comment_class('separative'); ?> id="li-comment-<?php comment_ID(); ?>">
				<article id="comment-<?php comment_ID(); ?>" class="comment row">

					<div class="comment-avatar col-sm-2">
					<?php
						echo get_avatar($comment, 87);
					?>
					</div>
					<div class="col-sm-10">
						<div class="comment-meta row row_3">
							<span class="comment-author"><h3><?php comment_author_link(); ?></h3></span>
							<div class="comment_meta meta">
								<span>
									<a href="<?php comment_link(); ?>" class="comment-time" title="<?php comment_date(); _e(' at ', TEMPLATE_DMN); comment_time(); ?>">
										<time pubdate datetime="<?php comment_time('c'); ?>"><?php comment_date(); ?> <?php comment_time(); ?></time>
									</a>
									<?php edit_comment_link(__( 'Edit', TEMPLATE_DMN ), '<span class="edit-link"> &middot; ', '</span>' ); ?>
								</span>
							</div>
						</div> <!-- .comment-meta -->

						<div class="comment-content">
							<?php comment_text(); ?>

							<?php if ($comment->comment_approved == '0'): ?>
								<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', TEMPLATE_DMN); ?></em>
							<?php endif; ?>


							<div class="reply">
								<?php
								comment_reply_link(array_merge($args, array(
									'reply_text' => __( 'Reply', TEMPLATE_DMN) . '<i class="fa fa-share"></i>',
									'depth'      => $depth,
									'max_depth'  => $args['max_depth']
								)));
								?>

							</div><!-- .reply -->

						</div>
					</div>
				</article><!-- #comment-N -->
		<?php
				break;
		endswitch;
	}
endif;