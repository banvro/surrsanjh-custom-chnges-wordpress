<?php
/**
 * Template part for displaying results in search pages
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
        if (has_post_thumbnail()):
            falcha_news_post_thumbnail();
        endif;
        ?>
        <div class="falcha-news-content-area">
            <header class="entry-header">
                <?php
                if ('post' === get_post_type()) :
                    ?>
                    <div class="entry-meta">
                        <?php
                        falcha_news_list_category(get_the_ID());
                        ?>
                    </div><!-- .entry-meta -->
                <?php endif;
                ?>
                <?php the_title(sprintf('<h2 class="entry-title" '.falcha_news_get_microdata("heading").'><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>

                <?php if ('post' === get_post_type()) : ?>
                    <div class="entry-meta">
                        <?php
                        falcha_news_posted_on();
                        falcha_news_posted_by();
                        ?>
                    </div><!-- .entry-meta -->
                <?php endif; ?>
            </header><!-- .entry-header -->

            <div class="entry-summary">
                <?php
                $falcha_news_show_content = 'excerpt';
                if ( $falcha_news_show_content == 'excerpt' ) {
                    the_excerpt();
                } else {
                    the_content();
                }
                ?>
            </div><!-- .entry-summary -->

            <footer class="entry-footer">
                <?php falcha_news_entry_footer(); ?>
            </footer><!-- .entry-footer -->
        </div> <!-- .falcha-news-content-area -->
        <?php
        /**
         * falcha_news_social_sharing hook
         * @since 1.0.0
         *
         * @hooked falcha_news_constuct_social_sharing -  10
         */
        do_action( 'falcha_news_social_sharing' ,get_the_ID() );
        ?>
    </div> <!-- .falcha-news-content-container -->
</article><!-- #post-<?php the_ID(); ?> -->
