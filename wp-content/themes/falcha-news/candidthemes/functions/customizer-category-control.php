<?php

if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;

/**
 * A class to create a dropdown for all categories in your WordPress site
 */
 class Falcha_News_Customize_Category_Dropdown_Control extends WP_Customize_Control {
    
    /**
     * Render the control's content.
     *
     * @return void
     * @since 1.0.0
     */
    public function render_content() {
      $falcha_news_dropdown = wp_dropdown_categories(
          array(
            'name'              => 'customize-dropdown-categories' . $this->id,
            'echo'              => 0,
            'show_option_none'  => esc_html__( '&mdash; Select Category &mdash;','falcha-news'),
            'option_none_value' => '0',
            'selected'          => $this->value(),
          )
      );

      // Hackily add in the data link parameter.
      $falcha_news_dropdown = str_replace( '<select', '<select ' . $this->get_link(), $falcha_news_dropdown );

      printf(
        '<label class="customize-control-select"><span class="customize-control-title">%s</span><span class="description customize-control-description">%s</span> %s </label>',
        $this->label,
        $this->description,
        $falcha_news_dropdown
      );
    }
  }

/* Message Control*/
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Falcha_News_Customize_Message_Control' )):
    /**
     * Custom Control for html display
     * @subpackage Falcha News
     * @since 1.0.0
     *
     */
    class Falcha_News_Customize_Message_Control extends WP_Customize_Control {

        /**
         * Declare the control type.
         * @access public
         * @var string
         */
        public $type = 'message';

        /**
         * Function to  render the content on the theme customizer page
         *
         * @access public
         * @since 1.0.0
         *
         * @param null
         * @return void
         *
         */
        public function render_content() {
            if ( empty( $this->description ) ) {
                return;
            }
          $allowed_html = array(
            'a' => array(
              'href' => array(),
              'title' => array(),
              'data-section' => array(),
              'data-panel' => array(),
              'class' => array(),
              'target' => array(),
            ),
            'hr' => array(),
            'br' => array(),
            'em' => array(),
            'strong' => array(),
          );
            ?>
            <div class="falcha-news-customize-customize-message">
                <?php
                echo wp_kses( $this->description , $allowed_html )
                ?>
            </div> <!-- .falcha-news-customize-customize-message -->
            <?php
        }
    }
endif;