<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hotels
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php // the_title( '<h1 class="entry-title">', '</h1>' );  ?>
    </header><!-- .entry-header -->

    <div class="entry-content">

    
<?php
wp_enqueue_script('hotel-review-gmaps-settings', get_template_directory_uri() . '/js/gmaps.js', array(), '20151206', true);

        $coordinates = array(
        'latitude' => $GLOBALS[hotel_latitude],
        'longitude' => $GLOBALS[hotel_longitude]
        );
        
        wp_localize_script( 'hotel-review-gmaps-settings', 'php_vars', $coordinates );    
?>
        
        
        
<div id="map"></div>
    


    </div><!-- .entry-content -->

    <footer class="entry-footer">
<?php edit_post_link(esc_html__('Edit', 'justsaying'), '<span class="edit-link">', '</span>'); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->

