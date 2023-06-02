<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Falcha News
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php falcha_news_do_microdata('article'); ?>>
    <?php
    global $falcha_news_theme_options;
    $falcha_news_show_image = 1;
    if(is_singular()) {
        $falcha_news_show_image = $falcha_news_theme_options['falcha-news-single-page-featured-image'];
    }
    $falcha_news_show_content = $falcha_news_theme_options['falcha-news-content-show-from'];
    $falcha_news_thumbnail = (has_post_thumbnail() && ($falcha_news_show_image == 1)) ? 'falcha-news-has-thumbnail' : 'falcha-news-no-thumbnail';

    ?>
    <div class="falcha-news-content-container <?php echo $falcha_news_thumbnail; ?>">
        <?php
        if ($falcha_news_thumbnail == 'falcha-news-has-thumbnail'):
            ?>
            <div class="post-thumb">
                <?php
                falcha_news_post_formats(get_the_ID());
                falcha_news_post_thumbnail();
                ?>
            </div>
        <?php
        endif;
        ?>
        <div class="falcha-news-content-area">
            <header class="entry-header">

                <div class="post-meta">
                    <?php
                    falcha_news_list_category(get_the_ID());
                    ?>
                </div>
                <?php

                if (is_singular()) :
                    the_title('<h1 class="entry-title" ' . falcha_news_get_microdata("heading") . '>', '</h1>');
                else :
                    the_title('<h2 class="entry-title" ' . falcha_news_get_microdata("heading") . '><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                endif;

                if ('post' === get_post_type()) :
                    ?>
                    <div class="entry-meta">
                        <?php
                        falcha_news_posted_on();
                        falcha_news_read_time_words_count(get_the_ID());
                        falcha_news_posted_by();
                        ?>
                    </div><!-- .entry-meta -->
                <?php endif; ?>
            </header><!-- .entry-header -->


            <div class="entry-content">
                <?php
                if (is_singular()) :
                    the_content();
                else :
                    if ($falcha_news_show_content == 'excerpt') {
                        the_excerpt();
                    } else {
                        the_content();
                    }
                endif;

                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'falcha-news'),
                    'after' => '</div>',
                ));
                ?>

                <?php
                $falcha_news_read_more_text = $falcha_news_theme_options['falcha-news-read-more-text'];
                if ((!is_single()) && ($falcha_news_show_content == 'excerpt')) {
                    if (!empty($falcha_news_read_more_text)) { ?>
                        <p><a href="<?php the_permalink(); ?>" class="read-more-text">
                                <?php echo esc_html($falcha_news_read_more_text); ?>

                            </a></p>
                        <?php
                    }
                }
                ?>
            </div>
            <!-- .entry-content -->

            <footer class="entry-footer">
                <?php falcha_news_entry_footer(); ?>
            </footer><!-- .entry-footer -->

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
