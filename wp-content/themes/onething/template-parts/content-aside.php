<?php
/**
 * Template part for displaying posts.
 *
 * @package oneThing
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class='index-box'>
        
        <header class="entry-header">
            
            <?php 
            
            if (is_sticky()) {
                echo '<i class = "fa fa-thumb-tack sticky-post"></i>';
                
            } 
                           
            ?>
            
            


        </header><!-- .entry-header -->

        <div class="entry-content">
            <?php the_content(); ?>


        </div><!-- .entry-content -->

        <footer class="entry-footer continue-reading">
                        <?php if ('post' == get_post_type()) : ?>
                <div class="entry-meta">
                    <?php onething_posted_on(); ?>
                    <?php
                    if (!post_password_required() && ( comments_open() || '0' != get_comments_number() )) {
                        echo '<span class="comments-link">';
                        comments_popup_link(__('Leave a comment', 'onething'), __('1 Comment', 'onething'), __('% Comments', 'onething'));
                        echo '</span>';
                    }
                    ?>
                    <?php edit_post_link(__('Edit', 'onething'), '<span class="edit-link">', '</span>'); ?>
                </div><!-- .entry-meta -->
            <?php endif; ?>
        </footer><!-- .entry-footer -->
    </div> <!-- .index box end -->
</article><!-- #post-## -->
