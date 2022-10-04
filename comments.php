<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package PicoStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div class="comments-area" id="comments">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>

		<h2 class="comments-title h6 border-bottom border-gray-400 pb-2 mb-2r">

			<?php
			$comments_number = get_comments_number();
            echo '評論';
			/* if ( 1 === (int) $comments_number ) {
				printf(
					esc_html_x( 'One thought on &ldquo;%s&rdquo;', 'comments title', 'picostrap' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf(
					esc_html(
						_nx(
							'%1$s thought on &ldquo;%2$s&rdquo;',
							'%1$s thoughts on &ldquo;%2$s&rdquo;',
							$comments_number,
							'comments title',
							'picostrap'
						)
					),
					number_format_i18n( $comments_number ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . get_the_title() . '</span>'
				);
			} */
			?>

		</h2><!-- .comments-title -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through. ?>

			<nav class="comment-navigation" id="comment-nav-above">

				<h1 class="visually-hidden"><?php esc_html_e( 'Comment navigation', 'picostrap' ); ?></h1>

				<?php if ( get_previous_comments_link() ) { ?>
					<div class="nav-previous">
						<?php previous_comments_link( __( '&larr; Older Comments', 'picostrap' ) ); ?>
					</div>
				<?php } ?>

				<?php	if ( get_next_comments_link() ) { ?>
					<div class="nav-next">
						<?php next_comments_link( __( 'Newer Comments &rarr;', 'picostrap' ) ); ?>
					</div>
				<?php } ?>

			</nav><!-- #comment-nav-above -->

		<?php endif; // Check for comment navigation. ?>

		<ol class="comment-list ps-1r text-gray-600">

			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
                    'avatar_size' => '0',
				)
			);
			?>

		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through. ?>

			<nav class="comment-navigation" id="comment-nav-below">

				<h1 class="visually-hidden"><?php esc_html_e( 'Comment navigation', 'picostrap' ); ?></h1>

				<?php if ( get_previous_comments_link() ) { ?>
					<div class="nav-previous">
						<?php previous_comments_link( __( '&larr; Older Comments', 'picostrap' ) ); ?>
					</div>
				<?php } ?>

				<?php	if ( get_next_comments_link() ) { ?>
					<div class="nav-next">
						<?php next_comments_link( __( 'Newer Comments &rarr;', 'picostrap' ) ); ?>
					</div>
				<?php } ?>

			</nav><!-- #comment-nav-below -->

		<?php endif; // Check for comment navigation. ?>

	<?php endif; // End of if have_comments(). ?>

	<?php

    $args = array(
        'title_reply' => '<h6 class="text-gray-800 border-bottom border-gray-400 pb-2 mt-5r mb-1r">發布留言</h6>',
        'logged_in_as' => sprintf(
            '<p class="logged-in-as small text-gray-600">%s%s</p>',
            sprintf(
                /* translators: 1: Edit user link, 2: Accessibility text, 3: User name, 4: Logout URL. */
                __( '<a href="%1$s" aria-label="%2$s">Logged in as %3$s</a>. <a href="%4$s">Log out?</a>' ),
                get_edit_user_link(),
                /* translators: %s: User name. */
                esc_attr( sprintf( __( 'Logged in as %s. Edit your profile.' ), $user_identity ) ),
                $user_identity,
                /** This filter is documented in wp-includes/link-template.php */
                wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ), $post_id ) )
            ),
            $required_text
        ),
        'class_submit' => 'btn btn-primary mt-1r px-1hr',
    );


    comment_form($args); // Render comments form. ?>

</div><!-- #comments -->
