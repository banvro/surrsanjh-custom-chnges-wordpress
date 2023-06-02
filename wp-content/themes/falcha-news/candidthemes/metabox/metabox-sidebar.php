<?php
/**
 *
 * Falcha News Sidebar Layout Options
 *
 * @since Falcha News  1.0.0
 *
 * @param null
 * @return array
 *
 */
if ( !function_exists('falcha_news_sidebar_layout_options') ) :
    function falcha_news_sidebar_layout_options() {
        $falcha_news_sidebar_layout_options = array(
            'left-sidebar' => array(
                'value'     => 'left-sidebar',
                'thumbnail' => get_template_directory_uri() . '/candidthemes/assets/images/left-sidebar.jpg'
            ),
            'right-sidebar' => array(
                'value' => 'right-sidebar',
                'thumbnail' => get_template_directory_uri() . '/candidthemes/assets/images/right-sidebar.jpg'
            ),
            'middle-column' => array(
                'value'     => 'middle-column',
                'thumbnail' => get_template_directory_uri() . '/candidthemes/assets/images/middle-column.jpg'
            ),
            'no-sidebar' => array(
                'value'     => 'no-sidebar',
                'thumbnail' => get_template_directory_uri() . '/candidthemes/assets/images/no-sidebar.jpg'
            ),
            'default-sidebar' => array(
                'value'     => 'default-sidebar',
                'thumbnail' => get_template_directory_uri() . '/candidthemes/assets/images/default-sidebar.jpg'
            )
        );
        return apply_filters( 'falcha_news_sidebar_layout_options', $falcha_news_sidebar_layout_options );
    }
endif;

/**
 * Custom Metabox
 *
 * @since Falcha News 1.0.0
 *
 * @param null
 * @return void
 *
 */
if( !function_exists( 'falcha_news_add_metabox' )):
    function falcha_news_add_metabox() {
        add_meta_box(
            'falcha_news_sidebar_layout', // $id
            __( 'Sidebar Layout', 'falcha-news' ), // $title
            'falcha_news_sidebar_layout_callback', // $callback
            'post', // $page
            'normal', // $context
            'high'
        ); // $priority
        
        add_meta_box(
            'falcha_news_sidebar_layout', // $id
            __( 'Sidebar Layout', 'falcha-news' ), // $title
            'falcha_news_sidebar_layout_callback', // $callback
            'page', // $page
            'normal', // $context
            'high'
        ); // $priority
    }
endif;
add_action('add_meta_boxes', 'falcha_news_add_metabox');

/**
 * Callback function for metabox
 *
 * @since Falcha News 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('falcha_news_sidebar_layout_callback') ) :
    function falcha_news_sidebar_layout_callback(){
        global $post;
        $falcha_news_sidebar_layout_options = falcha_news_sidebar_layout_options();
        $falcha_news_sidebar_layout = 'default-sidebar';
        $falcha_news_sidebar_meta_layout = get_post_meta( $post->ID, 'falcha_news_sidebar_layout', true );
        if( !falcha_news_is_null_or_empty($falcha_news_sidebar_meta_layout) ){
            $falcha_news_sidebar_layout = $falcha_news_sidebar_meta_layout;
        }
        wp_nonce_field( basename( __FILE__ ), 'falcha_news_sidebar_layout_nonce' );
        ?>
        <style>
            .hide-radio{
                position: relative;
                margin-bottom: 6px;
            }
            
            .hide-radio img, .hide-radio label{
                display: block;
            }
            
            .hide-radio input[type="radio"]{
                position: absolute;
                left: 50%;
                top: 50%;
                opacity: 0;
            }
            
            .hide-radio input[type=radio] + label {
                border: 3px solid #F1F1F1;
            }
            
            .hide-radio input[type=radio]:checked + label {
                border: 3px solid #F88C00;
            }
        </style>
        <table class="form-table page-meta-box">
            <tr>
                <td colspan="4"><h4><?php _e( 'Choose Sidebar Template', 'falcha-news' ); ?></h4></td>
            </tr>
            <tr>
                <td>
                    <?php
                    foreach ($falcha_news_sidebar_layout_options as $field) {
                        ?>
                        <div class="hide-radio radio-image-wrapper" style="float:left; margin-right:30px;">
                            <input id="<?php echo $field['value']; ?>" type="radio" name="falcha_news_sidebar_layout" value="<?php echo $field['value']; ?>" <?php checked( $field['value'], $falcha_news_sidebar_layout ); ?>/>
                            <label class="description" for="<?php echo $field['value']; ?>">
                                <img src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="" />
                            </label>
                        </div>
                    <?php } // end foreach
                    ?>
                    <div class="clear"></div>
                </td>
            </tr>
            <tr>
                <td><em class="f13"><?php _e( 'You can set up the sidebar content', 'falcha-news' ); ?> <a href="<?php echo admin_url('/widgets.php'); ?>"><?php _e( 'here', 'falcha-news' ); ?></a></em></td>
            </tr>
        </table>
        <?php
    }
endif;

/**
 * save the custom metabox data
 * @hooked to save_post hook
 *
 * @since Falcha News 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('falcha_news_save_sidebar_layout') ) :
    function falcha_news_save_sidebar_layout( $post_id ) {
        /*
          * A Guide to Writing Secure Themes – Part 4: Securing Post Meta
          *https://make.wordpress.org/themes/2015/06/09/a-guide-to-writing-secure-themes-part-4-securing-post-meta/
          * */
        if (
            !isset( $_POST[ 'falcha_news_sidebar_layout_nonce' ] ) ||
            !wp_verify_nonce( $_POST[ 'falcha_news_sidebar_layout_nonce' ], basename( __FILE__ ) ) || /*Protecting against unwanted requests*/
            ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || /*Dealing with autosaves*/
            ! current_user_can( 'edit_post', $post_id )/*Verifying access rights*/
        ){
            return;
        }
        
        //Execute this saving function
        if(isset($_POST['falcha_news_sidebar_layout'])){
            $old = get_post_meta( $post_id, 'falcha_news_sidebar_layout', true);
            $new = sanitize_text_field($_POST['falcha_news_sidebar_layout']);
            if ($new && $new != $old) {
                update_post_meta($post_id, 'falcha_news_sidebar_layout', $new);
            } elseif ('' == $new && $old) {
                delete_post_meta($post_id,'falcha_news_sidebar_layout', $old);
            }
        }
    }
endif;
add_action('save_post', 'falcha_news_save_sidebar_layout');