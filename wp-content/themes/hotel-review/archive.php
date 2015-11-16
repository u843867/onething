<?php
/**
 * The template for displaying archive pages.
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

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

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