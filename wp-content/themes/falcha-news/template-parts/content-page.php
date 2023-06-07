<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Falcha News
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php falcha_news_do_microdata('article'); ?>>
    <?php
    $falcha_news_thumbnail = (has_post_thumbnail()) ? 'falcha-news-has-thumbnail' : 'falcha-news-no-thumbnail';
    ?>
    <div class="falcha-news-content-container <?php echo $falcha_news_thumbnail; ?>">
        <?php
        if (has_post_thumbnail()) :
            the_post_thumbnail();
        endif;
        ?>
        <div class="falcha-news-content-area">
            <header class="entry-header">
                <?php the_title('<h1 class="entry-title" ' . falcha_news_get_microdata("heading") . '>', '</h1>'); ?>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php
                the_content();

                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'falcha-news'),
                    'after' => '</div>',
                ));
                ?>
            </div><!-- .entry-content -->

            <?php if (get_edit_post_link()) : ?>
                <footer class="entry-footer">
                    <?php
                    edit_post_link(
                        sprintf(
                            wp_kses(
                                /* translators: %s: Name of current post. Only visible to screen readers */
                                __('Edit <span class="screen-reader-text">%s</span>', 'falcha-news'),
                                array(
                                    'span' => array(
                                        'class' => array(),
                                    ),
                                )
                            ),
                            get_the_title()
                        ),
                        '<span class="edit-link">',
                        '</span>'
                    );
                    ?>
                </footer><!-- .entry-footer -->
            <?php endif; ?>
            <?php
            /**
             * falcha_news_social_sharing hook
             * @since 1.0.0
             *
             * @hooked falcha_news_constuct_social_sharing -  10
             */
            do_action('falcha_news_social_sharing', get_the_ID());
            ?>
        </div> <!-- .falcha-news-content-area -->
    </div> <!-- .falcha-news-content-container -->
</article><!-- #post-<?php the_ID(); ?> -->