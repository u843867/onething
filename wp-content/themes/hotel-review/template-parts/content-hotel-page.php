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
    //get the url from the Hotel Review page.  Use the file_get_contents method to store the results in a variable.
    $hotel_array = (json_decode(file_get_contents(get_field('ean_hotel_information')), true));
    //var_dump($hotel_array);


    $hotel_name = $hotel_array[HotelInformationResponse][HotelSummary][name];
    $hotel_address1 = $hotel_array[HotelInformationResponse][HotelSummary][address1];
    $hotel_address_city = $hotel_array[HotelInformationResponse][HotelSummary][city];
    $hotel_postcode = $hotel_array[HotelInformationResponse][HotelSummary][postalCode];
    $hotel_country = get_field('country');
    $hotel_address = $hotel_address1 . ', ' . $hotel_address_city . ', ' . $hotel_postcode . ', ' . $hotel_country;
    $hotel_star = $hotel_array[HotelInformationResponse][HotelSummary][hotelRating];
    $hotel_tripadvisor = $hotel_array[HotelInformationResponse][HotelSummary][tripAdvisorRatingUrl];
    $tripadvisor_review_count = $hotel_array[HotelInformationResponse][HotelSummary][tripAdvisorReviewCount];
    
    $hotel_longitude = $hotel_array[HotelInformationResponse][HotelSummary][longitude];
    $GLOBALS['hotel_longitude'] = $hotel_longitude;
    
    $hotel_latitude = $hotel_array[HotelInformationResponse][HotelSummary][latitude];
    $GLOBALS['hotel_latitude'] = $hotel_latitude;
    
    sort($hotel_array[HotelInformationResponse][PropertyAmenities]);
    $hotel_amenities = $hotel_array[HotelInformationResponse][PropertyAmenities][PropertyAmenity];
    
    $hotel_images = $hotel_array[HotelInformationResponse][HotelImages][HotelImage];
    //var_dump($hotel_amenities);
   // var_dump($hotel_images);
    
    global $googlemap;
    $googlemap = '';
    

    
    ?>



    <?php
    the_content();

    $oneStar = '&nbsp&nbsp&nbsp <i class="fa fa-star"></i>';
    $twoStar = '&nbsp&nbsp&nbsp <i class="fa fa-star"></i><i class="fa fa-star"></i>';
    $threeStar = '&nbsp&nbsp&nbsp <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
    $fourStar = '&nbsp&nbsp&nbsp <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
    $fiveStar = '&nbsp&nbsp&nbsp <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';


    if ($hotel_star == 1) {
        $star = $oneStar;
    } elseif ($hotel_star == 2) {
        $star = $twoStar;
    } elseif ($hotel_star == 3) {
        $star = $threeStar;
    } elseif ($hotel_star == 4) {
        $star = $fourStar;
    } elseif ($hotel_star == 5) {
        $star = $fiveStar;
    }
    ?>
    
<!--    row containing the top elements (Hotel names and quick facts)    -->
    <div class="row row-top">
    
        <div class="col-sm-12 col-md-7 col-lg-7">
            
        <?php
        if ($hotel_name) {

            echo '<div class="info-box">';

                echo('<h2 class="hotel">' . $hotel_name . '<span class = "gold">' . $star . '</span>' . '</h2>');
                echo('<p class = "address">' . $hotel_address . '</p>');
                //echo('<br>');
                        
            echo '</div>';
            
            echo '<div class="tripadvisor">';
            echo ('<p><img src=' . $hotel_tripadvisor . '> (based on <span class = "blue">' . $tripadvisor_review_count . '</span>  reviews)</p>');
            echo '</div>';
            
        }
        ?>  
                
        </div>
        
        <!--        div containing 'quick facts'-->
        <div class="quickFacts col-sm-12 col-md-7 col-lg-7">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">facilities include...</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body">
                    <ul class="facilities">
                        <?php
                        foreach ($hotel_array[HotelInformationResponse][PropertyAmenities][1] as $amenity) {

                            if ($amenity[amenityId] == 2422) {
                                if ($parking == false) {
                                    echo ('<li>' . '<i class="fa fa-check-square-o fa-lg"></i>' . '&nbsp' . 'Parking available' . '&nbsp&nbsp&nbsp&nbsp    ' . '</li>');
                                }
                                $parking = true;
                            }

                            if ($amenity[amenityId] == 3862) {
                                if ($parking == false) {
                                    echo ('<li>' . '<i class="fa fa-check-square-o fa-lg"></i>' . '&nbsp' . 'Parking available' . '&nbsp&nbsp&nbsp&nbsp    ' . '</li>');
                                }
                                $parking = true;
                            }

                            if ($amenity[amenityId] == 2390) {
                                if ($wifi == false) {
                                    echo ('<li>' . '<i class="fa fa-check-square-o fa-lg"></i>' . '&nbsp' . 'Free Wifi' . '&nbsp&nbsp&nbsp&nbsp    ' . '</li>');
                                }
                                $wifi = true;
                            }

                            if ($amenity[amenityId] == 2392) {
                                if ($wifi == false) {
                                    echo ('<li>' . '<i class="fa fa-check-square-o fa-lg"></i>' . '&nbsp' . 'Free Wifi' . '&nbsp&nbsp&nbsp&nbsp    ' . '</li>');
                                }
                                $wifi = true;
                            }

                            if ($amenity[amenityId] == 14) {
                                echo ('<li>' . '<i class="fa fa-check-square-o fa-lg"></i>' . '&nbsp' . $amenity[amenity] . '&nbsp&nbsp&nbsp&nbsp   ' . '</li>');
                            }

//                         if ($amenity[amenityId] == 51)
//                       {
//                           echo ('<li>' . $amenity[amenity] . '</li>');
//                       }

                            if ($amenity[amenityId] == 2135) {
                                echo ('<li>' . '<i class="fa fa-check-square-o fa-lg"></i>' . '&nbsp' . $amenity[amenity] . '&nbsp&nbsp&nbsp&nbsp    ' . '</li>');
                            }

                            
                        }
                        ?>
                    </ul>
                </div>




            </div>   

        </div>
 

     
        
    <?php
    //if images have been added in the wordpress use them.
    if ($images) {
        $img_src = 'wp';
        $images = array();
        for ($x = 1; $x <= 25; $x++) {
            $img = get_field('image' . $x);
            if ($img) {
                $images[] = $img;
            } else {
                break;
            }
        }
    }
    //if images have not been added in wordpress use expedia's
    else {
        //create array to store images in.
        $images = array();  
        //get size of the array
        

        
        
        $count = 0;
        foreach ($hotel_images as $image){ 
                
                $img = $image[url];
                if ($img) {
                  $img = str_replace('_b.jpg','_z.jpg',$img);
                $images[] = $img;
                $count++;
                    if ($count > 18){
                        break;
                    }
                } 
                else {
                    break;   
            }
           
        }    
    }
   
        
        
        
            if ($img_src == 'wp') {
                $img_src = $image['sizes']['medium'];
            } 
            else {
                $img_src = $images;
            }            
    ?>

<!--    <br>-->
    
    <!--    div containing the photo slider-->
        <div class="col-sm-12 col-md-7 col-lg-7">
            <!--<hr>-->
            <!-- Fotorama slider-->
            <div class="fotorama"
                 data-width="100%"
             data-ratio="800/600"
             data-minwidth="300"
             data-maxwidth="900"
             data-minheight="150"
             data-maxheight="100%">
                <?php foreach ($img_src as $url) { ?>        
                    <img src=<?php echo $url; ?> />
                <?php } ?>

            </div>
        </div>
    

        <div class="col-sm-12 col-md-5 col-lg-4">
            <hr>
            <?php get_template_part('template-parts/content', 'hotel-sidebar');?>
            
        </div> 
    
   

<!--    <br>
    <hr>-->


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

