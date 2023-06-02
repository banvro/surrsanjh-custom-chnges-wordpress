<?php if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Add new Element
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */
include_once( 'include-data.php' );

$show_option = apply_filters( 'wpcoder_pro_show', array(
	'shortecode' => __( 'Where shortcode is inserted', 'wpcoder' ),
) );

$show = array(
	'id'     => 'show',
	'name'   => 'show',
	'type'   => 'select',
	'val'    => isset( $param['show'] ) ? $param['show'] : 'shortecode',
	'option' => $show_option,
	'func'   => 'showchange',
	'sep'    => '<p/>',
);

?>

<form action="admin.php?page=<?php echo esc_attr( $this->plugin_slug ); ?>" method="post" name="post"
      class="wow-plugin">
    <div id="poststuff">
        <div id="post-body" class="metabox-holder columns-2">
            <div id="post-body-content" style="position: relative;">
                <div id="titlediv">
                    <div id="titlewrap">
                        <label class="screen-reader-text" id="title-prompt-text" for="title">Enter title here</label>
                        <input type="text" name="title" size="30" value="<?php echo esc_attr( $title ); ?>" id="title"
                               placeholder="<?php esc_attr_e( 'Register an item name', 'wpcoder' ); ?>">

                    </div>
                </div>
            </div>
            <div id="postbox-container-1" class="postbox-container">
				<?php do_action( 'wp_coder_pro_targeting', $param ); ?>
                <div id="submitdiv" class="postbox ">
                    <h2 class="hndle ui-sortable-handle"><span>Publish</span></h2>

                    <div class="inside">
                        <div class="wow-container">
                            <div class="wow-element">
								<?php echo self::option( $show ); ?>
                                <span id="wow-shortcode"><code>[<?php echo esc_attr( $this->shortcode ); ?> id="<?php echo absint( $tool_id ); ?>"]</code></span>
                                <p/>
								<?php if ( ! class_exists( 'wpcoder\Wow_Admin_Class' ) ) {
									echo '<span class="dashicons dashicons-migrate" style="color:#37c781;"></span> ';
									printf( __( '<a href="%s" target="_blank">More advanced targeting</a>', 'leadgeneration' ), esc_url( $this->pro_url ) );
								} else {
									do_action( 'wpcoder_pro_show_fields', $param );
								}
								?>
                            </div>
                        </div>
                        <div class="submitbox" id="submitpost">
                            <div id="major-publishing-actions">
                                <div id="delete-action">
									<?php if ( ! empty( $id ) ) {
										echo '<a class="submitdelete deletion" href="admin.php?page=' . esc_attr( $this->plugin_slug ) . '&info=delete&did=' . $id . '">' . esc_html__( 'Delete', 'wpcoder' ) . '</a>';
									}; ?>
                                </div>

                                <div id="publishing-action">
                                    <span class="spinner"></span>
                                    <input name="submit" id="submit" class="button button-primary button-large"
                                           value="<?php echo esc_attr( $btn ); ?>" type="submit">
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div id="postbox-container-2" class="postbox-container">
                <div id="postoptions" class="postbox ">
                    <div class="inside">
                        <div class="tab-box">
                            <ul class="tab-nav">
								<?php
								$tab_menu = array(
									'html_code' => __( 'HTML Code', 'wpcoder' ),
									'css_code'  => __( 'CSS Code', 'wpcoder' ),
									'js_code'   => __( 'JS Code', 'wpcoder' ),
									'include'   => __( 'Include files', 'wpcoder' ),
								);
								$i        = 1;
								foreach ( $tab_menu as $menu => $val ) {
									echo '<li><a href="#t' . absint( $i ) . '">' . esc_html( $val ) . '</a></li>';
									$i ++;
								}
								?>
                            </ul>
                            <div class="tab-panels">
								<?php
								$t = 1;
								foreach ( $tab_menu as $menu => $val ) {
									echo '<div id="t' . absint( $t ) . '">';
									include_once( 'add-new/' . $menu . '.php' );
									echo '</div>';
									$t ++;
								}
								?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="tool_id" value="<?php echo absint( $tool_id ); ?>" id="tool_id"/>
    <input type="hidden" name="param[time]" value="<?php echo esc_attr( time() ); ?>"/>
    <input type="hidden" name="add" value="<?php echo absint( $hidval ); ?>"/>
    <input type="hidden" name="id" value="<?php echo absint( $id ); ?>"/>
    <input type="hidden" name="data" value="<?php echo esc_attr( $data ); ?>"/>
    <input type="hidden" name="page" value="<?php echo esc_attr( $this->plugin_slug ); ?>"/>
    <input type="hidden" name="plugdir" value="<?php echo esc_attr( $this->plugin_slug ); ?>"/>
	<?php wp_nonce_field( $this->plugin_slug . '_action', $this->plugin_slug . '_nonce' ); ?>
</form>
