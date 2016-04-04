<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package hotels
 */

get_header(); ?>

<div class="row">
<!--    empty column to get the page aligned correctly-->
    <div class="col-md-1 col-lg-2">
    </div>

    <div class="col-sm-12 col-md-7 col-lg-6">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>
                        
			<?php the_post_navigation(); ?>
                    
			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div> <!-- #bootstrap col-sm-12 col-md-7 col-lg-6 -->

    
<div class="col-sm-12 col-md-4 col-lg-3">
<?php get_sidebar(); ?>
</div>

<div class="col-sm-1 col-md-0 col-lg-1">
</div>

<?php get_footer(); ?>


 </div><!-- row -->
