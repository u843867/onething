<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package onething
 */
if (!function_exists('onething_paging_nav')) :

    /**
     * Display navigation to next/previous set of posts when applicable.
     *
     * @return void
     */
    function onething_paging_nav() {
        // Don't print empty markup if there's only one page.
        if ($GLOBALS['wp_query']->max_num_pages < 2) {
            return;
        }
        ?>
        <nav class="navigation paging-navigation" role="navigation">
            <h1 class="screen-reader-text"><?php _e('Posts navigation', 'onething'); ?></h1>
            <div class="nav-links">

                <?php if (get_next_posts_link()) : ?>
                    <div class="nav-previous"><?php next_posts_link(__('<span class="meta-nav">&larr;</span> Older posts', 'onething')); ?></div>
                <?php endif; ?>

                <?php if (get_previous_posts_link()) : ?>
                    <div class="nav-next"><?php previous_posts_link(__('Newer posts <span class="meta-nav">&rarr;</span>', 'onething')); ?></div>
                <?php endif; ?>

            </div><!-- .nav-links -->
        </nav><!-- .navigation -->
        <?php
    }

endif;

if (!function_exists('onething_post_nav')) :

    /**
     * Display navigation to next/previous post when applicable.
     *
     * @return void
     */
    function onething_post_nav() {
        // Don't print empty markup if there's nowhere to navigate.
        $previous = ( is_attachment() ) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '', true);
        $next = get_adjacent_post(false, '', false);

        if (!$next && !$previous) {
            return;
        }
        ?>
        <nav class="navigation post-navigation" role="navigation">
            <div class="post-nav-box clear">
                <h1 class="screen-reader-text"><?php _e('Post navigation', 'onething'); ?></h1>
                <div class="nav-links">
                    <?php
                    previous_post_link('<div class="nav-previous"><div class="nav-indicator">' . _x('Previous Post:', 'Previous post', 'onething') . '</div><h1>%link</h1></div>', '%title');
                    next_post_link('<div class="nav-next"><div class="nav-indicator">' . _x('Next Post:', 'Next post', 'onething') . '</div><h1>%link</h1></div>', '%title');
                    ?>
                </div><!-- .nav-links -->
            </div><!-- .post-nav-box -->
        </nav><!-- .navigation -->
        <?php
    }

endif;

if (!function_exists('onething_posted_on')) :

    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function onething_posted_on() {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf($time_string, esc_attr(get_the_date('c')), esc_html(get_the_date()), esc_attr(get_the_modified_date('c')), esc_html(get_the_modified_date())
        );

        printf(__('<span class="byline">Written by %2$s</span><span class="posted-on">%1$s</span>', 'onething'), sprintf('<a href="%1$s" rel="bookmark">%2$s</a>', esc_url(get_permalink()), $time_string
                ), sprintf('<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>', esc_url(get_author_posts_url(get_the_author_meta('ID'))), esc_html(get_the_author())
                )
        );
    }

endif;

/**
 * Returns true if a blog has more than 1 category.
 */
function onething_categorized_blog() {
    if (false === ( $all_the_cool_cats = get_transient('all_the_cool_cats') )) {
        // Create an array of all the categories that are attached to posts.
        $all_the_cool_cats = get_categories(array(
            'fields' => 'ids',
            'hide_empty' => 1,
            // We only need to know if there is more than one category.
            'number' => 2,
                ));

        // Count the number of categories that are attached to the posts.
        $all_the_cool_cats = count($all_the_cool_cats);

        set_transient('all_the_cool_cats', $all_the_cool_cats);
    }

    if ($all_the_cool_cats > 1) {
        // This blog has more than 1 category so onething_categorized_blog should return true.
        return true;
    } else {
        // This blog has only 1 category so onething_categorized_blog should return false.
        return false;
    }
}

/**
 * Flush out the transients used in onething_categorized_blog.
 */
function onething_category_transient_flusher() {
    // Like, beat it. Dig?
    delete_transient('all_the_cool_cats');
}

add_action('edit_category', 'onething_category_transient_flusher');
add_action('save_post', 'onething_category_transient_flusher');

/*
 * Social media icon menu as per http://justintadlock.com/archives/2013/08/14/social-nav-menus-part-2
 */

function onething_social_menu() {
    if (has_nav_menu('social')) {
        wp_nav_menu(
                array(
                    'theme_location' => 'social',
                    'container' => 'div',
                    'container_id' => 'menu-social',
                    'container_class' => 'menu-social',
                    'menu_id' => 'menu-social-items',
                    'menu_class' => 'menu-items',
                    'depth' => 1,
                    'link_before' => '<span class="screen-reader-text">',
                    'link_after' => '</span>',
                    'fallback_cb' => '',
                )
        );
    }
}
