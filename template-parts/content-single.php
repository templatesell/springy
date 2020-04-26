<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Polite
 */
global $polite_theme_options;
$social_share = absint($polite_theme_options['polite-single-social-share']);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="single-post-wrap">
        <div class="post-media-part">
            <div class="post-media">
                <?php polite_post_thumbnail(); ?>
            </div>
        </div>
        <div class="post-meta-info">
            <div class="meta-wrapper">
                <div class="meta-categories">
                    <div class="post-cats">
                        <?php polite_entry_meta(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="post-content">
            <?php
            if (is_singular()) :
                the_title('<h1 class="post-title entry-title">', '</h1>');
            else :
                the_title('<h2 class="post-title entry-title text-center"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                ?>
            <?php endif; ?>
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
                        <div class="reading-time">
                            <span class="ti-time"></span> <?php echo reading_time(); ?>
                        </div>
                        <div class="comment-num">
                            <?php echo get_comments_number($post->ID);?> <span class="ti-comment"></span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="content post-excerpt entry-content clearfix <?php echo $drop_cap_class; ?>">
                <?php
                the_content(sprintf(
                    wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'polite'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                
                ));
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'polite'),
                    'after' => '</div>',
                
                ));
                ?>
            </div><!-- .entry-content -->
            <div class="single-post-info">
                <div class="tags">
                    <?php the_tags('', ''); ?>
                </div>
                <?php 
                    if( 1 == $social_share ){
                        do_action( 'polite_social_sharing' ,get_the_ID() );
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="post-navigation-wrapper">
        <?php $prevPost = get_previous_post(true);
        if($prevPost){
            $args = array(
                'posts_per_page' => 1,
                'include' => $prevPost->ID
            );
            $prevPost = get_posts($args);
            foreach ($prevPost as $post) {
                setup_postdata($post);
                ?>
                <div class="post-prev-wrapper">
                    <div class="nav-box previous">
                        <a href="<?php the_permalink(); ?>">
                            <span class="img-prev"><?php the_post_thumbnail('thumbnail'); ?></span>
                            <span class="prev-link">
                                <span class="prev-title"><?php the_title(); ?></span>
                                <span class="date-post"><?php the_date('F j, Y'); ?></span>
                            </span>
                        </a>
                    </div>
                </div>
                    <?php
                 wp_reset_postdata();
            } //end foreach
        } // end if
         
        $nextPost = get_next_post(true);
        if($nextPost) {
            $args = array(
                'posts_per_page' => 1,
                'include' => $nextPost->ID
            );
            $nextPost = get_posts($args);
            foreach ($nextPost as $post) {
                setup_postdata($post);
                ?>
                <div class="post-next-wrapper">
                    <div class="nav-box next">
                        <a href="<?php the_permalink(); ?>">
                            <span class="next-link">
                                <span class="next-title"><?php the_title(); ?></span>
                                <span class="date-post"><?php the_date('F j, Y'); ?></span>
                            </span>
                            <span class="img-next"><?php the_post_thumbnail('thumbnail'); ?></span>
                        </a>
                    </div>
                </div>
                <?php
                wp_reset_postdata();
            } //end foreach
        } // end if
        ?>
    </div>
    <div class="related-posts clearfix">
        <?php do_action( 'polite_related_posts' ,get_the_ID() ); ?>
    </div>
</article>