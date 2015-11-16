<?php
/*
Template Name: Hotel Review
*/
get_header();
?>

<div class="row">
    <div class="col-md-8">

        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

                <?php while (have_posts()) : the_post(); ?>

                    <?php get_template_part('template-parts/content', 'hotel-page'); ?>

                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>

                <?php endwhile; // End of the loop. ?>

            </main><!-- #main -->
        </div><!-- #primary -->

    </div> <!-- #bootstrap col-md-8 -->

    <div class="col-md-4">
        <?php get_sidebar(); ?>
    </div>

    <?php get_footer(); ?>