<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package justsaying
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php // the_title( '<h1 class="entry-title">', '</h1>' );  ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php the_content(); ?>
        <?php
        if (get_field('hotel_name')) {
            echo '<div class="info-box">';
            echo('<h1>' . get_field(hotel_name) . '</h1>');
            the_field('star_rating');

            echo ('<br>');
            the_field('country');
            echo ('<br>');


            echo '</div>';
        }
        
        
            $images = array();
                for($x=1; $x<=25; $x++){
            $img = get_field('image' . $x);
            if($img)
            {
                $images[] = $img;
            }
            else
            {
                break;
            }
        }
        
        
        
        ?>



 


<ul class="bxslider">
    <?php foreach($images as $image) { ?>        
        <li><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /></li>
    <?php } ?>
</ul>
        
        
        
        
        


        <p>below here Isn't the gallery</p>
        <br>

<?php
$image = get_field('image1');

if (!empty($image)):
    ?>

            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

        <?php endif; ?>

        <?php
        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'justsaying'),
            'after' => '</div>',
        ));
        ?>
            
            
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php edit_post_link(esc_html__('Edit', 'justsaying'), '<span class="edit-link">', '</span>'); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->

