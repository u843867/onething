<?php
/*
Template Name: Hotel Review
*/
get_header();
?>

<div class="row">
<!--    empty column to get the page aligned correctly-->
    <div class="col-sm-12 col-md-1 col-lg-2">
    </div>

  <div class="col-sm-12 col-md-7 col-lg-8">

     
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

   <div class="col-sm-12 col-md-4 col-lg-2">
       
       <?php get_sidebar(); ?>
       
       <?php // get_template_part('template-parts/content', 'hotel-sidebar'); ?>
       
        
       
       

       
      
    </div>

    <div class="col-sm-0 col-md-0 col-lg-0">
</div>
    
    <?php get_footer(); ?>

    </div>