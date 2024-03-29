<?php
/**
 * Main Navigation Hook Element.
 *
 * @package Falcha News
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!function_exists('falcha_news_construct_main_navigation')) {
    /**
     * Add main navigation on header
     *
     * @since 1.0.0
     */
    function falcha_news_construct_main_navigation()
    {

        global $falcha_news_theme_options;

        $sticky_header_option = $falcha_news_theme_options['falcha-news-enable-sticky-primary-menu'];
        if ($sticky_header_option == 1) {
            $sticky_header_class = 'sticky-header';

        } else {
            $sticky_header_class = '';
        }
        ?>
        <div class="falcha-news-menu-container <?php echo $sticky_header_class; ?>">
            <div class="container-inner clearfix">
                <nav id="site-navigation"
                     class="main-navigation" <?php falcha_news_do_microdata('navigation'); ?>>
                    <div class="navbar-header clearfix">
                        <button class="menu-toggle" aria-controls="primary-menu"
                                aria-expanded="false">
                            <span> </span>
                        </button>
                    </div>
                    <ul id="primary-menu" class="nav navbar-nav nav-menu">
                        <?php
                        if ($falcha_news_theme_options['falcha-news-enable-menu-home-icon'] == 1):
                            if (is_front_page()) {
                                $home_class = 'current-menu-item';
                            } else {
                                $home_class = '';
                            }

                            ?>
                            <li class="<?php echo $home_class; ?>"><a href="<?php echo esc_url(home_url('/')); ?>">
                                    <i class="fa fa-home"></i> </a></li>
                        <?php
                        endif;
                        ?>
                        <?php
                        if (has_nav_menu('menu-1')) :
                            wp_nav_menu(array(
                                'theme_location' => 'menu-1',
                                'items_wrap' => '%3$s',
                                'container' => false
                            ));
                        else:
                            wp_list_pages(array('depth' => 0, 'title_li' => ''));
                        endif; // has_nav_menu
                        ?>
                    </ul>
                </nav><!-- #site-navigation -->

                <?php
                if ($falcha_news_theme_options['falcha-news-enable-menu-section-search'] == 1):
                    ?>
                    <div class="ct-menu-search"><a class="search-icon-box" href="#"> <i class="fa fa-search"></i>
                        </a></div>
                    <div class="top-bar-search">
                        <?php get_search_form(); ?>
                        <button type="button" class="close"></button>
                    </div>
                <?php
                endif;
                ?>
            </div> <!-- .container-inner -->
        </div> <!-- falcha-news-menu-container -->
        <?php
    }
}
add_action('falcha_news_main_navigation', 'falcha_news_construct_main_navigation', 10);