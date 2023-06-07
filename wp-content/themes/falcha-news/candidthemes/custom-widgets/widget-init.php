<?php

if ( ! function_exists( 'falcha_news_load_widgets' ) ) :

    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function falcha_news_load_widgets() {

        // Highlight Post.
        register_widget( 'Falcha_News_Featured_Post' );

        // Author Widget.
        register_widget( 'Falcha_News_Author_Widget' );
		
		// Social Widget.
        register_widget( 'Falcha_News_Social_Widget' );

        // Post Slider Widget.
        register_widget( 'Falcha_News_Post_Slider' );

        // Tabbed Widget.
        register_widget( 'Falcha_News_Tabbed_Post' );

        // Two Category Column Widget.
        register_widget( 'Falcha_News_Category_Column' );

        // Grid Layout Widget.
        register_widget( 'Falcha_News_Grid_Post' );

        // Advertisement Widget.
        register_widget( 'Falcha_News_Advertisement_Widget' );

        // Thumbnail Widget.
        register_widget( 'Falcha_News_Thumb_Posts' );

    }

endif;
add_action( 'widgets_init', 'falcha_news_load_widgets' );