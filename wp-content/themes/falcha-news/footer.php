<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Falcha News
 */

?>
</div> <!-- .container-inner -->
</div><!-- #content -->
<?php
if (is_active_sidebar('above-footer')) {
    ?>
    <div class="ct-above-footer">
        <div class="container-inner">
            <?php dynamic_sidebar('above-footer'); ?>
        </div>
    </div>
    <?php
}
?>
<?php

/**
 * falcha_news_before_footer hook.
 *
 * @since 1.0.0
 *
 */
do_action('falcha_news_before_footer');


/**
 * falcha_news_header hook.
 *
 * @since 1.0.0
 *
 * @hooked falcha_news_footer_start - 5
 * @hooked falcha_news_footer_socials - 10
 * @hooked falcha_news_footer_widget - 15
 * @hooked falcha_news_footer_siteinfo - 20
 * @hooked falcha_news_footer_end - 25
 */
do_action('falcha_news_footer');
?>

<?php
/**
 * falcha_news_construct_gototop hook
 *
 * @since 1.0.0
 *
 */
do_action('falcha_news_gototop');

?>

<?php

/**
 * falcha_news_after_footer hook.
 *
 * @since 1.0.0
 *
 */
do_action('falcha_news_after_footer');
?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
