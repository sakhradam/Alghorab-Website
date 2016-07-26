<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */

	if ( post_password_required() ) {
		return;
	}
	?>

<?php if ( have_comments() ) : ?>
<section class="block">
	<div id="comments" class="comments-area">

		<div class="section_title">
			<h1 class="comments-title">
				<?php
					printf( _n( __('One thought on', TEMPLATE_DMN ) .' &ldquo;%2$s&rdquo;', __('%1$s thoughts on &ldquo;%2$s&rdquo;', TEMPLATE_DMN ), get_comments_number(), TEMPLATE_DMN ),
						number_format_i18n( get_comments_number() ), get_the_title() );
				?>
			</h1>
		</div>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', TEMPLATE_DMN ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', TEMPLATE_DMN ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', TEMPLATE_DMN ) ); ?></div>
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ol class="comment-list">
			<?php
				get_template_part('comment');
				wp_list_comments(array('callback' => 'shahba_comment', 'max-depth' => 4));
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', TEMPLATE_DMN ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', TEMPLATE_DMN ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', TEMPLATE_DMN ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation. ?>

	</div>
</section>
<?php endif; // have_comments() ?>

<section class="block">
		<?php if ( ! comments_open() ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.', TEMPLATE_DMN ); ?></p>
		<?php endif; ?>
		<?php get_template_part('comments_form'); ?>
</section>