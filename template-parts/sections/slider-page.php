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
    <section class="modern-slider"  data-slick='<?php echo $springy_slider_args_encoded; ?>'>
        <?php
        foreach ($slider_arr as $s_post_id) {
            $thumbnail_url = get_the_post_thumbnail_url($s_post_id);
            ?>
            <div class="slider-items">
                <div class="slide-wrap">
                    <div class="slider-height img-cover" style="background-image: url(<?php echo $thumbnail_url; ?>);">
                        <div class="container">
                            <div class="caption">
                                <h2>
                                    <a href="<?php echo get_the_permalink($s_post_id); ?>"> 
                                        <?php echo get_the_title($s_post_id); ?>
                                    </a>
                                </h2>
                                <div class="post-excerpt entry-content">
                                    <p><?php echo get_the_excerpt($s_post_id); ?></p>
                                </div>
                                <a href="<?php echo get_the_permalink($s_post_id); ?>" class="more-btn"> 
                                    <?php _e('Read More', 'springy'); ?>
                                </a>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
            <?php
        }
        ?>
    </section>
<?php
endif;
?>