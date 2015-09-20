<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package oneThing
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <?php
    if (has_post_thumbnail()) {
        echo '<div class="single-post-thumbnail clear">';
        echo '<div class="image-shifter">';
        echo the_post_thumbnail('large-thumb');
        echo '</div>';
        echo '</div>';
    }
    ?>
    
    
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'onething' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( esc_html__( 'Edit', 'onething' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

