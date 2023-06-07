<?php

/**
 * Main Navigation Hook Element.
 *
 * @package Falcha News
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!function_exists('falcha_news_constuct_carousel')) {
    /**
     * Add carousel on header
     *
     * @since 1.0.0
     */
    function falcha_news_constuct_carousel()
    {

        if (is_front_page()) {
            global $falcha_news_theme_options;
            $falcha_news_site_layout = $falcha_news_theme_options['falcha-news-site-layout-options'];
            $slider_cat = $falcha_news_theme_options['falcha-news-select-category'];
            $featured_cat = $falcha_news_theme_options['falcha-news-select-category-featured-right'];
            $falcha_news_enable_date = $falcha_news_theme_options['falcha-news-slider-post-date'];
            $falcha_news_enable_author = $falcha_news_theme_options['falcha-news-slider-post-author'];
            $falcha_news_enable_read_time = $falcha_news_theme_options['falcha-news-slider-post-read-time'];
            $falcha_news_pagination_class = "";
?>
            <div class="falcha-news-featured-block falcha-news-ct-row clearfix">
                <?php

                falcha_news_main_carousel($slider_cat);


                $query_args = array(
                    'post_type' => 'post',
                    'ignore_sticky_posts' => true,
                    'posts_per_page' => 3,
                    'cat' => $featured_cat
                );

                $query = new WP_Query($query_args);
                if ($query->have_posts()) :
                ?>
                    <div class="falcha-news-col falcha-news-col-2">
                        <div class="falcha-news-inner-row clearfix">
                            <?php
                            $i = 1;
                            while ($query->have_posts()) :
                                $query->the_post();



                                $col_class = '';
                                if ($i == 1) {
                                    $col_class = 'falcha-news-col-full';
                                }
                            ?>
                                <div class="list-post <?php echo $col_class; ?>">
                                    <div class="featured-section-inner post-block-style">
                                        <?php
                                        if (has_post_thumbnail()) {
                                            if ($i == 1) {
                                        ?>
                                                <div class="post-thumb">
                                                    <?php
                                                    falcha_news_post_formats(get_the_ID());
                                                    ?>
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php
                                                        if ($falcha_news_site_layout == 'boxed') {
                                                            the_post_thumbnail('falcha-news-carousel-img-landscape');
                                                        } else {
                                                            the_post_thumbnail('falcha-news-carousel-large-img-landscape');
                                                        }
                                                        ?>
                                                    </a>
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="post-thumb">
                                                    <?php
                                                    falcha_news_post_formats(get_the_ID());
                                                    ?>
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php
                                                        if ($falcha_news_site_layout == 'boxed') {
                                                            the_post_thumbnail('falcha-news-carousel-img');
                                                        } else {
                                                            the_post_thumbnail('falcha-news-carousel-large-img');
                                                        }
                                                        ?>
                                                    </a>
                                                </div>
                                            <?php
                                            }
                                        } else {
                                            if ($i == 1) {
                                            ?>
                                                <div class="post-thumb">
                                                    <?php
                                                    falcha_news_post_formats(get_the_ID());
                                                    ?>
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php
                                                        if ($falcha_news_site_layout == 'boxed') {
                                                        ?>
                                                            <img src="<?php echo esc_url(get_template_directory_uri()) . '/candidthemes/assets/images/falcha-mag-carousel-landscape.jpg' ?>" alt="<?php the_title(); ?>">
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <img src="<?php echo esc_url(get_template_directory_uri()) . '/candidthemes/assets/images/falcha-mag-carousel-large-landscape.jpg' ?>" alt="<?php the_title(); ?>">
                                                        <?php
                                                        }
                                                        ?>
                                                    </a>
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="post-thumb">
                                                    <?php
                                                    falcha_news_post_formats(get_the_ID());
                                                    ?>
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php
                                                        if ($falcha_news_site_layout == 'boxed') {
                                                        ?>
                                                            <img src="<?php echo esc_url(get_template_directory_uri()) . '/candidthemes/assets/images/falcha-mag-carousel.jpg' ?>" alt="<?php the_title(); ?>">
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <img src="<?php echo esc_url(get_template_directory_uri()) . '/candidthemes/assets/images/falcha-mag-carousel-large.jpg' ?>" alt="<?php the_title(); ?>">
                                                        <?php
                                                        }
                                                        ?>
                                                    </a>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>

                                        <div class="featured-section-details post-content">
                                            <div class="post-meta">
                                                <?php
                                                falcha_news_featured_list_category(get_the_ID());
                                                ?>
                                            </div>
                                            <h3 class="post-title">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h3>
                                            <div class="post-meta">
                                                <?php
                                                if ($falcha_news_enable_date) {
                                                    falcha_news_widget_posted_on();
                                                }
                                                falcha_news_read_time_slider(get_the_ID());
                                                if ($falcha_news_enable_author) {
                                                    falcha_news_widget_posted_by();
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div> <!-- .featured-section-inner -->
                                </div>
                                <!--.falcha-news-col-->
                            <?php
                                $i++;

                            endwhile;
                            wp_reset_postdata()
                            ?>

                        </div>
                    </div>
                    <!--.falcha-news-col-->
                <?php
                endif;
                ?>

            </div><!-- .falcha-news-ct-row-->
<?php


        } //is_front_page
    }
}
add_action('falcha_news_carousel', 'falcha_news_constuct_carousel', 10);
