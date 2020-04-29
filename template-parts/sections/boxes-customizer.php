<?php
/**
 * Springy Promo from customizer
 * @since Springy 1.0.0
 *
 * @param null
 * @return void
 *
 */          
global $springy_theme_options;
$icon_one = esc_attr($springy_theme_options['springy-promo-icon-class-one']);
$icon_two = esc_attr($springy_theme_options['springy-promo-icon-class-two']);
$icon_three = esc_attr($springy_theme_options['springy-promo-icon-class-three']);

$title_one = esc_html($springy_theme_options['springy-promo-icon-title-one']);
$title_two = esc_html($springy_theme_options['springy-promo-icon-title-two']);
$title_three = esc_html($springy_theme_options['springy-promo-icon-title-three']);

$desc_one = wp_kses_post($springy_theme_options['springy-promo-icon-text-one']);
$desc_two = wp_kses_post($springy_theme_options['springy-promo-icon-text-two']);
$desc_three = wp_kses_post($springy_theme_options['springy-promo-icon-text-three']);
?>
<section class="springy-promo-section">
    <div class="container">
        <div class="promo-section promo-three">                          
                    <div class="item">
                        <div class="item-one">
                            <span class="first-icon"><i class"<?php esc_attr($icon_one); ?>"></i></span>
                            <h3 class="first-icon-title"><?php esc_html_e($title_one); ?></h3>
                            <hp class="first-icon-desc"><?php esc_html_e($desc_one); ?></hp>
                        </div>
                        <div class="item-two">
                            <span class="second-icon"><i class"<?php esc_attr($icon_two); ?>"></i></span>
                            <h3 class="second-icon-title"><?php esc_html_e($title_two); ?></h3>
                            <hp class="second-icon-desc"><?php esc_html_e($desc_two); ?></hp>
                        </div>
                        <div class="item-three">
                            <span class="third-icon"><i class"<?php esc_attr($icon_three); ?>"></i></span>
                            <h3 class="third-icon-title"><?php esc_html_e($title_three); ?></h3>
                            <hp class="third-icon-desc"><?php esc_html_e($desc_three); ?></hp>
                        </div>
                </div>
            </div>
    </div>
</section>
