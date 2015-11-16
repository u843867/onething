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
    var_dump($hotel_array);


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
    $hotel_latitude = $hotel_array[HotelInformationResponse][HotelSummary][latitude];
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


    if ($hotel_name) {
        echo '<div class="info-box">';
        echo('<h1>' . $hotel_name . '<span class = "gold">' . $star . '</span>' . '</h1>');
        echo('<span class = "blue"><i class="fa fa-location-arrow"></i></span>&nbsp' . " " . $hotel_address);
        echo('<br>');
        echo ('<p><img src=' . $hotel_tripadvisor . '> (based on <span class = "blue">' . $tripadvisor_review_count . '</span>  reviews)</p>');


        echo '</div>';
    }

    //if images have been added in the wordpress use them.
    if ($images) {
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
    ?>

    <br>
    <hr>
    <!-- Fotorama -->
    <p>fotorama gallery</p>
    <div class="fotorama">
        <?php foreach ($images as $image) { ?>        
            <img src="<?php echo $image['sizes']['medium']; ?>">
        <?php } ?>

    </div>


    <br>
    <hr>






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

