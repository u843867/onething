<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package oneThing
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php // You can start editing here -- including this comment!  ?>

    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            printf(// WPCS: XSS OK.
                    esc_html(_nx('One comment', '%1$s comments:', get_comments_number(), 'comments title', 'onething')), number_format_i18n(get_comments_number()), '<span>' . get_the_title() . '</span>'
            );
            ?>
        </h2>



        <ol class="comment-list">
        <?php
        wp_list_comments(array(
            'style' => 'ol',
            'short_ping' => true,
            'avatar_size' => 50, 
        ));
        ?>
        </ol><!-- .comment-list -->

            <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // Are there comments to navigate through? ?>
            <nav id="comment-nav-below" class="navigation comment-navigation clear" role="navigation">
                <h2 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'onething'); ?></h2>
                <div class="nav-links">

                    <div class="nav-previous"><?php previous_comments_link(__('<i class="fa fa-arrow-circle-o-left"></i> Older Comments', 'onething')); ?></div>
                    <div class="nav-next"><?php next_comments_link(__('Newer Comments <i class="fa fa-arrow-circle-o-right"></i>', 'onething')); ?></div>

                </div><!-- .nav-links -->
            </nav><!-- #comment-nav-below -->
    <?php endif; // Check for comment navigation.  ?>

    <?php endif; // Check for have_comments().  ?>

    <?php
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if (!comments_open() && '0' != get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
        ?>
        <p class="no-comments"><?php esc_html_e('Comments are closed.', 'onething'); ?></p>
    <?php endif; ?>

    <?php comment_form(); ?>

</div><!-- #comments -->
