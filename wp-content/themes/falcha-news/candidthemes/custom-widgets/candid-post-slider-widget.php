<?php
/**
 * Falcha News Post Slider Widget
 *
 * @since 1.0.0
 */
if (!class_exists('Falcha_News_Post_Slider')) :

    /**
     * Highlight Post widget class.
     *
     * @since 1.0.0
     */
    class Falcha_News_Post_Slider extends WP_Widget
    {
       private function defaults()
       {
        $defaults = array(
            'title'    => esc_html__( 'Posts Slider', 'falcha-news' ),
            'cat'     => 0,
            'post-number' => 5,
        );
        return $defaults;
    }

    public function __construct()
    {
        $opts = array(
            'classname' => 'falcha-news-post-slider',
            'description' => esc_html__('Display post in Slider Form. Suitable on Sidebars.', 'falcha-news'),
        );

        parent::__construct('falcha-news-post-slider', esc_html__('Falcha News Post Slider', 'falcha-news'), $opts);
    }


    public function widget($args, $instance)
    {
        $instance = wp_parse_args( (array) $instance, $this->defaults() );
        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
        echo $args['before_widget'];

        $cat_id = !empty($instance['cat']) ? $instance['cat'] : '';
        $post_number = !empty($instance['post-number']) ? $instance['post-number'] : '';
        global $falcha_news_theme_options;
        $hide_read_time = 0;
        if(!empty($falcha_news_theme_options['falcha-news-extra-hide-read-time'])) {
            $hide_read_time = $falcha_news_theme_options['falcha-news-extra-hide-read-time'];
        }

        if (!empty($title)) {
            $cat_class = 'cat-'.$cat_id;
            ?>
            <div class="title-wrapper <?php echo $cat_class; ?>">
                <?php
                echo $args['before_title'];
                if(!empty($cat_id)){
                    ?>
                    <a href="<?php echo esc_url(get_category_link($cat_id)); ?>"> <?php echo esc_html($title); ?> </a>
                    <?php
                }else{
                    echo esc_html($title);
                }
                echo $args['after_title'];
                ?>
            </div>
            <?php
        }

        $falcha_news_slider_args = array();
        if(is_rtl()){
            $falcha_news_slider_args['rtl']      = true;
        }
        $falcha_news_slider_args_encoded = wp_json_encode( $falcha_news_slider_args );

        $query_args = array(
            'post_type' => 'post',
            'cat' => absint($cat_id),
            'posts_per_page' => absint($post_number),
            'ignore_sticky_posts' => true
        );

        $query = new WP_Query($query_args); ?>
        
        <div class="falcha-news-slider-container">
            <section class="section-slider">
                <div class="header-carousel">
                    <ul class="ct-post-carousel slider"  data-slick='<?php echo $falcha_news_slider_args_encoded; ?>'>
                        <?php
                        while ($query->have_posts()) : $query->the_post();
                            ?>
                            <li>
                                <div class="ct-carousel-inner carousel-thumbnail-block">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php
                                        if (has_post_thumbnail()) {
                                            the_post_thumbnail('falcha-news-carousel-large-img');
                                        }else{
                                            ?>
                                            <img src="<?php echo esc_url(get_template_directory_uri()) . '/candidthemes/assets/images/falcha-mag-carousel-large.jpg' ?>"
                                                 alt="<?php the_title(); ?>">
                                            <?php
                                        }
                                        ?>
                                    </a>

                                    <div class="slide-details">
                                        <div class="slider-content-inner">
                                            <div class="slider-content">
                                                    <div class="post-meta">
                                                        <?php
                                                        falcha_news_list_category(get_the_ID());
                                                        ?>
                                                    </div>
                                                <h2>
                                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                </h2>
                                                    <div class="post-meta">
                                                        <?php
                                                            falcha_news_posted_on();
                                                        
                                                        if ($hide_read_time != 1){
                                                            falcha_news_read_time_words_count(get_the_ID());
                                                        }

                                                        ?>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- .ct-carousel-inner -->
                                <div class="overly"></div>
                            </li>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    </ul>
                </div> <!-- .header-carousel  -->
            </section> <!-- .section-slider -->
        </div><!-- .falcha-news-slider-container -->
        <?php
        echo $args['after_widget']; ?>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['cat'] = absint($new_instance['cat']);
        $instance['post-number'] = absint($new_instance['post-number']);
        return $instance;

    }

    public function form($instance)
    {
        $instance  = wp_parse_args( (array )$instance, $this->defaults() );

        $title    = esc_attr($instance['title']);
        $post_number    = absint( $instance['post-number'] );
        
        ?>
        <p>
            <label
            for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'falcha-news'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
            name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
            value="<?php echo esc_attr($instance['title']); ?>"/>
        </p>
        <p class="custom-dropdown-posts">
            <label for="<?php echo esc_attr($this->get_field_name('cat')); ?>">
                <strong><?php esc_html_e('Select Category: ', 'falcha-news'); ?></strong>
            </label>
            <?php
            $cat_args = array(
                'orderby' => 'name',
                'hide_empty' => 0,
                'id' => $this->get_field_id('cat'),
                'name' => $this->get_field_name('cat'),
                'class' => 'widefat',
                'taxonomy' => 'category',
                'selected' => absint($instance['cat']),
                'show_option_all' => esc_html__('Show Recent Posts', 'falcha-news')
            );
            wp_dropdown_categories($cat_args);
            ?>
        </p>

        <p>
            <label
            for="<?php echo esc_attr($this->get_field_id('post-number')); ?>"><?php esc_html_e('Number of Posts to Display:', 'falcha-news'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('post-number')); ?>"
            name="<?php echo esc_attr($this->get_field_name('post-number')); ?>" type="number"
            value="<?php echo esc_attr($instance['post-number']); ?>"/>
        </p>
        <?php
    }
}
endif;