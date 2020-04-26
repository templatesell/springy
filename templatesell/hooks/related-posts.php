<?php
/**
 * Display related posts from same category
 *
 * @since Polite 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if (!function_exists('polite_related_post')) :
    
    function polite_related_post($post_id)
    {
        
        global $polite_theme_options;
        $title = esc_html($polite_theme_options['polite-single-page-related-posts-title']);
        if (0 == $polite_theme_options['polite-single-page-related-posts']) {
            return;
        }
        $categories = get_the_category($post_id);
        if ($categories) {
            $category_ids = array();
            $category = get_category($category_ids);
            $categories = get_the_category($post_id);
            foreach ($categories as $category) {
                $category_ids[] = $category->term_id;
            }
            $count = $category->category_count;
            if ($count > 1) {
                ?>
                    <h2 class="widget-title">
                        <?php echo $title; ?>
                    </h2>
                    <div class="related-posts-list">
                        <?php
                        $polite_cat_post_args = array(
                            'category__in' => $category_ids,
                            'post__not_in' => array($post_id),
                            'post_type' => 'post',
                            'posts_per_page' => 2,
                            'post_status' => 'publish',
                            'ignore_sticky_posts' => true
                        );
                        $polite_featured_query = new WP_Query($polite_cat_post_args);
                        
                        while ($polite_featured_query->have_posts()) : $polite_featured_query->the_post();
                            ?>
                            <div class="show-2-related-posts">
                                <div class="post-wrap">
                                    <?php
                                    if (has_post_thumbnail() ):
                                        ?>
                                        <div class="post-media-part">
                                            <div class="post-media">
                                                <a href="<?php the_permalink() ?>">
                                                    <?php the_post_thumbnail('polite-related-post-thumbnails'); ?>
                                                </a>
                                            </div>
                                        </div>
                                        <?php
                                    endif;
                                    ?>
                                    <div class="post-meta-info">
                                        <div class="meta-wrapper">
                                            <div class="meta-categories">
                                                <div class="post-cats">
                                                    <?php polite_entry_meta(); ?>
                                                </div>
                                            </div>
                                            <?php 
                                            do_action( 'polite_social_sharing' ,get_the_ID() );
                                            ?>
                                        </div>
                                    </div>
                                    <div class="post-content">
                                        <h2 class="post-title entry-title">
                                            <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                                        </h2>                                      
                                        <div class="post-meta-desc">  
                                            <div class="post-meta">
                                                <?php
                                                if ('post' === get_post_type()) :
                                                    ?>
                                                    <div class="post-author">
                                                        <?php echo get_avatar( get_the_author_meta( 'ID' ) , 32 ); ?>
                                                        <?php polite_posted_by(); ?>
                                                    </div>
                                                    <div class="post-date">
                                                        <div class="entry-meta">
                                                            <span class="ti-calendar"></span><?php  polite_posted_on();  ?>
                                                        </div><!-- .entry-meta -->
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                <?php
            }
        }
    }
endif;
add_action('polite_related_posts', 'polite_related_post', 10, 1);