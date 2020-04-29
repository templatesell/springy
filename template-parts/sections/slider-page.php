<?php
$slider_arr = array();
global $springy_theme_options;
$slider_arr[] = absint($springy_theme_options['springy-select-slider-from-page-one']);
$slider_arr[] = absint($springy_theme_options['springy-select-slider-from-page-two']);
$slider_arr[] = absint($springy_theme_options['springy-select-slider-from-page-three']);
//remove duplicate post
$slider_arr = array_unique($slider_arr);
//remove if an element is empty
$slider_arr = array_filter($slider_arr);
$springy_slider_args = array();
$springy_slider_args_encoded = wp_json_encode( $springy_slider_args );

if (count($slider_arr) >= 1):

    ?>
    <section class="event-slider-wrapper"  data-slick='<?php echo $springy_slider_args_encoded; ?>'>
        <?php

        foreach ($slider_arr as $s_post_id) {
            $thumbnail_url = get_the_post_thumbnail_url($s_post_id);
            ?>
            <div class="event-slider-single text-center" style="background-image: url(<?php echo $thumbnail_url; ?>);">
                <div class="event-slider-content">
                    <h2><a href="<?php echo get_the_permalink($s_post_id); ?>"> <?php echo get_the_title($s_post_id); ?>
                    </h2></a>
                    <p><?php echo get_the_excerpt($s_post_id); ?></p>
                    <div class="read-more-btn"><a href="<?php echo get_the_permalink($s_post_id); ?>"
                                                  class="btn"> <?php _e('Read More', 'springy'); ?></a></div>
                </div>
            </div> <!-- .event-slider-single -->
            <?php
        }
        ?>
    </section> <!-- .event-slider-wrapper -->
<?php
endif;
?>