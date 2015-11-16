<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hotels
 */

get_header(); ?>

<div class="row">
    <div class="col-md-1 col-lg-1">
        </div>
    <div class="col-sm-12 col-md-7 col-lg-7">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
    </div> <!-- #bootstrap col-md-8 -->

<div class="col-sm-12 col-md-4 col-lg-2">
<?php get_sidebar(); ?>
</div>
    
<div class="col-sm-1 col-md-0 col-lg-1">
</div>
    
<?php get_footer(); ?>
    
</div><!-- row -->
