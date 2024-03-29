<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Springy
 */
global $springy_theme_options;
$show_content_from = esc_attr($springy_theme_options['springy-content-show-from']);
$read_more = esc_html($springy_theme_options['springy-read-more-text']);
$masonry = esc_attr($springy_theme_options['springy-column-blog-page']);
$image_location = esc_attr($springy_theme_options['springy-blog-image-layout']);
$social_share = absint($springy_theme_options['springy-show-hide-share']);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($masonry); ?>>
    <div class="post-wrap <?php echo esc_attr($image_location); ?>">
        <?php if(has_post_thumbnail()) { ?>
        <div class="post-media-part">
            <div class="post-media">
                <?php springy_post_thumbnail(); ?>
            </div>
        </div>
        <?php } ?>
        <div class="post-meta-info">
            <div class="meta-wrapper">
                <div class="meta-categories">
                    <div class="post-cats">
                        <?php springy_entry_meta(); ?>
                    </div>
                </div>
                <?php
                    if( 1 == $social_share ){
                        do_action( 'springy_social_sharing' ,get_the_ID() );
                    }
                ?>
            </div>
        </div>

        <div class="post-content">
            <div class="post_title">
                <?php
                if (is_singular()) :
                    the_title('<h1 class="post-title entry-title">', '</h1>');
                else :
                    the_title('<h2 class="post-title entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                    ?>
                <?php endif; ?>
            </div>
            <div class="post-excerpt entry-content">
            <div class="post-excerpt entry-content">
                <?php
                if (is_singular()) {
                    the_content();
                } else {
                    if ($show_content_from == 'excerpt') {
                        the_excerpt();
                    } else {
                        the_content();
                    }
                }
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'springy'),
                    'after' => '</div>',
                ));
                ?>
                <!-- read more -->
                <?php if (!empty($read_more) && $show_content_from == 'excerpt'): ?>
                    <a class="more-link" href="<?php the_permalink(); ?>"><?php echo esc_html($read_more); ?> <i
                                class="fa fa-long-arrow-right"></i>
                    </a>
                <?php endif; ?>
            </div>
            <!-- .entry-content end -->
            <div class="post-meta-desc">
                <div class="post-meta">
                    <?php
                    if ('post' === get_post_type()) :
                        ?>
                        <div class="post-author">
                            <?php echo get_avatar( get_the_author_meta( 'ID' ) , 32 ); ?>
                            <?php springy_posted_by(); ?>
                        </div>
                        <div class="post-date">
                            <div class="entry-meta">
                                <span class="ti-calendar"></span><?php  springy_posted_on();  ?>
                            </div><!-- .entry-meta -->
                        </div>
                        <div class="reading-time">
                            <span class="ti-time"></span> <?php echo springy_reading_time(); ?>
                        </div>
                        <div class="comment-num">
                            <?php echo get_comments_number($post->ID);?> <span class="ti-comment"></span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</article><!-- #post- -->