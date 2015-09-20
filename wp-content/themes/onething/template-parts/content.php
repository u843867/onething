<?php
/**
 * Template part for displaying posts.
 *
 * @package oneThing
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class='index-box'>
        <?php
    if (has_post_thumbnail()) {
        echo '<div class="small-index-thumbnail clear">';
        
        echo '<a href="' . get_permalink() . '" title="' . __('Click to Read: ', 'onething') . get_the_title() . '" rel="bookmark">';
        echo the_post_thumbnail('index-thumb');
        echo '</a>';
        
        echo '</div>';
    }
    ?>
        <header class="entry-header">
            
            
<?php 

//if (is_sticky()) {
//    echo '<i class = "fa fa-thumb-tack sticky-post"></i>';
//}

if( $wp_query->current_post == 0 && !is_paged() && is_front_page() && has_post_thumbnail() ) { 
    
    
    echo '<div class="front-index-thumbnail clear">';
//        echo '<div class="image-shifter">';
    
    
    echo the_title(sprintf('<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h1>'); 
    echo '</div>';
    if (is_sticky()) {
    echo '<i class = "fa fa-thumb-tack sticky-post"></i>';
}
    echo '<div class="entry-content">';
    the_content( __( '', 'onething' ) );
    echo '</div>';
    echo '<footer class="entry-footer continue-reading">';
    echo '<a href="' . get_permalink() . '" title="' . __('Read ', 'onething') . get_the_title() . '" rel="bookmark">Read the article<i class="fa fa-arrow-circle-o-right"></i></a>'; 
    echo '</footer><!-- .entry-footer -->';
    
//     echo '</div>';
        
    
} else { ?>
      <?php      echo the_title(sprintf('<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h1>'); ?> 
    <div class="entry-content">
    <?php the_excerpt(); ?>
    </div><!-- .entry-content -->
    <footer class="entry-footer continue-reading">
    <?php echo '<a href="' . get_permalink() . '" title="' . __('Continue Reading ', 'onething') . get_the_title() . '" rel="bookmark">Continue Reading<i class="fa fa-arrow-circle-o-right"></i></a>'; ?>
    </footer><!-- .entry-footer -->
<?php } ?>
    
    
    
    
    
    
    
    
    
    
    </div> <!-- .index box end -->
</article><!-- #post-## -->
