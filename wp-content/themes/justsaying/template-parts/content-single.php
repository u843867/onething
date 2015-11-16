<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package justsaying
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php justsaying_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
            
                <?php 
                if (get_field('info_box_content')){
                    echo '<div class="info-box">';
                        echo('<h1>'.get_field(info_box_title).'</h1>');
                the_field('info_box_content');
                    echo '</div>';
                    
              
                    
                    
                }
                
                ?>
            
             <?php 
                if (get_field('hotel_name')){
                    echo '<div class="info-box">';
                        echo('<h1>'.get_field(hotel_name).'</h1>');
                the_field('star_rating');
                    echo '</div>';
                    
              
                    
                    
                }
                
                ?>
            
            
            
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'justsaying' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php justsaying_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

