<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Springy
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-wrap">
        <?php if(has_post_thumbnail()) { ?>
            <div class="post-media">
                <?php springy_post_thumbnail(); ?>
            </div>
        <?php } ?>
        <div class="post-content">
            <div class="date_title">
                <div class="post-date">
                    <?php if ('post' === get_post_type()) : ?>
                        <div class="entry-meta">
                            <?php
                            springy_posted_on();
                            springy_posted_by();
                            ?>
                        </div><!-- .entry-meta -->
                    <?php endif; ?>
                </div>
                <?php the_title(sprintf('<h2 class="post-title entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
            </div>
            <div class="post-excerpt entry-summary">
                <?php the_excerpt(); ?>
            </div><!-- .entry-summary -->

            <footer class="post-footer entry-footer">
                <?php do_action( 'springy_social_sharing' ,get_the_ID() );?>
            </footer><!-- .entry-footer -->
        </div>
    </div>
</article><!-- #post-->

