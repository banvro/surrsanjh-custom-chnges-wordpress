<?php
/**
 * Admin Class
 *
 * @package     Wow_Plugin
 * @subpackage
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

namespace wpcoder;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Wow_Admin_Class {

	private $arg;

	public function __construct( $arg ) {
		$this->plugin_name     = $arg['plugin_name'];
		$this->plugin_menu     = $arg['plugin_menu'];
		$this->plugin_home_url = $arg['plugin_home_url'];
		$this->plugin_version  = $arg['plugin_version'];
		$this->plugin_file     = $arg['plugin_file'];
		$this->plugin_slug     = $arg['plugin_slug'];
		$this->plugin_dir      = $arg['plugin_dir'];
		$this->plugin_url      = $arg['plugin_url'];
		$this->plugin_pref     = $arg['plugin_pref'];
		$this->author_url      = $arg['author_url'];
		$this->pro_url         = $arg['pro_url'];
		$this->shortcode       = $arg['shortcode'];


		add_filter( 'plugin_action_links', array( $this, 'action_links' ), 10, 2 );
		add_action( 'admin_menu', array( $this, 'add_admin_page' ) );
		add_filter( 'admin_footer_text', array( $this, 'rate_us' ) );
		add_action( 'plugins_loaded', array( $this, 'plugin_check' ) );
		add_action( 'wp_ajax_wp_coder_message', array( $this, 'wow_message_callback' ) );


	}

	public function add_admin_page() {
		$icon =
			'data:image/svg+xml;base64, PHN2ZyB3aWR0aD0iNTEycHgiIGhlaWdodD0iNTEycHgiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPgogICAgPHRpdGxlPldPVyBMT0dPPC90aXRsZT4KICAgIDxkZWZzPgogICAgICAgIDxsaW5lYXJHcmFkaWVudCB4MT0iNTAlIiB5MT0iMCUiIHgyPSI1MCUiIHkyPSIxMDAlIiBpZD0ibGluZWFyR3JhZGllbnQtMSI+CiAgICAgICAgICAgIDxzdG9wIHN0b3AtY29sb3I9IiNGN0NDNUYiIG9mZnNldD0iMCUiPjwvc3RvcD4KICAgICAgICAgICAgPHN0b3Agc3RvcC1jb2xvcj0iI0U4NkUyQyIgb2Zmc2V0PSIxMDAlIj48L3N0b3A+CiAgICAgICAgPC9saW5lYXJHcmFkaWVudD4KICAgICAgICA8bGluZWFyR3JhZGllbnQgeDE9IjUwJSIgeTE9IjAlIiB4Mj0iNTAlIiB5Mj0iMTAwJSIgaWQ9ImxpbmVhckdyYWRpZW50LTIiPgogICAgICAgICAgICA8c3RvcCBzdG9wLWNvbG9yPSIjRjdDQzVGIiBvZmZzZXQ9IjAlIj48L3N0b3A+CiAgICAgICAgICAgIDxzdG9wIHN0b3AtY29sb3I9IiNFODZFMkMiIG9mZnNldD0iMTAwJSI+PC9zdG9wPgogICAgICAgIDwvbGluZWFyR3JhZGllbnQ+CiAgICA8L2RlZnM+CiAgICA8ZyBpZD0iV09XLUxPR08iIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIiBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCI+CiAgICAgICAgPGcgaWQ9Ikdyb3VwIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgxMTIuMDAwMDAwLCAxMDcuNTI2NTIxKSIgc3Ryb2tlPSJ1cmwoI2xpbmVhckdyYWRpZW50LTEpIiBzdHJva2Utd2lkdGg9IjM4Ij4KICAgICAgICAgICAgPHBhdGggZD0iTTAuNDMzMDEyNzAyLDg2LjkyNjkxNTggTDEwMC40MzMwMTMsMjYwLjEzMTk5NyBNMTAwLjQzMzAxMyw4Ni45MjY5MTU4IEwyMDAuNDMzMDEzLDI2MC4xMzE5OTcgTTM1MS41ODU3OTEsNS45OTUyMDQzM2UtMTUgTDIwMi4yNTU3MDcsMjYwLjE5MzI0NyIgaWQ9IkNvbWJpbmVkLVNoYXBlIj48L3BhdGg+CiAgICAgICAgPC9nPgogICAgICAgIDxwYXRoIGQ9Ik0yNTYsNDU2IEMzNjYuNDU2OTUsNDU2IDQ1NiwzNjYuNDU2OTUgNDU2LDI1NiBDNDU2LDE0NS41NDMwNSAzNjYuNDU2OTUsNTYgMjU2LDU2IEMxNDUuNTQzMDUsNTYgNTYsMTQ1LjU0MzA1IDU2LDI1NiBDNTYsMzY2LjQ1Njk1IDE0NS41NDMwNSw0NTYgMjU2LDQ1NiBaIiBpZD0iT3ZhbCIgc3Ryb2tlPSJ1cmwoI2xpbmVhckdyYWRpZW50LTIpIiBzdHJva2Utd2lkdGg9IjI4IiBzdHJva2UtZGFzaGFycmF5PSIxMTU1LjUyLDk5OTk5IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgyNTYuMDAwMDAwLCAyNTYuMDAwMDAwKSByb3RhdGUoLTEzMi4wMDAwMDApIHRyYW5zbGF0ZSgtMjU2LjAwMDAwMCwgLTI1Ni4wMDAwMDApICI+PC9wYXRoPgogICAgPC9nPgo8L3N2Zz4=';

		if ( ! class_exists( 'Wow_Company' ) ) {
			add_menu_page( 'Wow Plugins', 'Wow Plugins', 'manage_options', 'wow-company', array(
				$this,
				'admin_main_page'
			), $icon );
			add_submenu_page( 'wow-company', 'About Wow Plugins', 'About', 'manage_options', 'wow-company' );
			add_submenu_page( 'wow-company', $this->plugin_name . ' version ' . $this->plugin_version, $this->plugin_menu, 'manage_options', $this->plugin_slug, array(
				$this,
				'plugin_page'
			) );
		} else {
			add_submenu_page( 'wow-company', $this->plugin_name . ' version ' . $this->plugin_version, $this->plugin_menu, 'manage_options', $this->plugin_slug, array(
				$this,
				'plugin_page'
			) );
		}

	}

	public function admin_main_page() {
		require_once plugin_dir_path( __FILE__ ) . 'general/main.php';
		wp_enqueue_style( 'wow-page', plugin_dir_url(__FILE__) .'general/style.css');
	}

	public function plugin_page() {
		global $typenow;
		$typenow = $this->plugin_slug;
		require_once plugin_dir_path( __FILE__ ) . 'partials/main.php';
		self:: admin_style_script();
	}

	public function admin_style_script() {
		wp_enqueue_style( $this->plugin_slug . '-admin', $this->plugin_url . 'assets/css/admin.css', false, $this->plugin_version );
		wp_enqueue_style( $this->plugin_slug . '-style', $this->plugin_url . 'assets/css/style.css', false, $this->plugin_version );

		wp_enqueue_script( 'jquery-ui-tooltip' );
		wp_enqueue_media();
		wp_enqueue_script( 'code-editor' );
		wp_enqueue_style( 'code-editor' );
		wp_enqueue_script( 'htmlhint' );
		wp_enqueue_script( 'csslint' );
		wp_enqueue_script( 'jshint' );

		wp_enqueue_script( $this->plugin_slug . '-script', $this->plugin_url . 'assets/js/script.js', array( 'jquery' ), $this->plugin_version );
		wp_enqueue_script( $this->plugin_slug . '-codemirror', $this->plugin_url . 'assets/js/script-codemirror.js', array( 'code-editor' ), $this->plugin_version );
		wp_enqueue_script( $this->plugin_slug . '-admin', $this->plugin_url . 'assets/js/admin.js', array( 'jquery' ), $this->plugin_version );

	}

	public function action_links( $actions, $plugin_file ) {
		if ( false === strpos( $plugin_file, $this->plugin_file ) ) {
			return $actions;
		}
		$settings_link = '<a href="admin.php?page=' . $this->plugin_slug . '">' . __( 'Settings', $this->plugin_pref ) . '</a>';
		array_unshift( $actions, $settings_link );

		return $actions;
	}

	public function rate_us( $footer_text ) {
		global $typenow;
		if ( $typenow == $this->plugin_slug ) {
			$rate_text = sprintf( __( 'Thank you for using <a href="%1$s" target="_blank">' . $this->plugin_name . '</a>! Please <a href="%2$s" target="_blank">rate us on WordPress</a>', $this->plugin_pref ),
				$this->plugin_home_url,
				$this->plugin_home_url . 'reviews/?rate=5#new-post'
			);

			return str_replace( '</span>', '', $footer_text ) . ' | ' . $rate_text . '</span>';
		} else {
			return $footer_text;
		}
	}

	static function tooltip( $arg ) {
		$tooltip = '';
		foreach ( $arg as $key => $value ) {
			if ( $key == 'title' ) {
				$tooltip .= $value . '<p/>';
			} elseif ( $key == 'ul' ) {
				$tooltip .= '<ul>';
				$arr     = $value;
				foreach ( $arr as $val ) {
					$tooltip .= '<li>' . $val . '</li>';
				}
				$tooltip .= '</ul>';
			} else {
				$tooltip .= $value;
			}
		}
		$tooltip = "<span class='wow-help dashicons dashicons-editor-help' title='" . $tooltip . "'></span>";

		return $tooltip;
	}

	static function option( $arg ) {
		$id        = isset( $arg['id'] ) ? $arg['id'] : null;
		$name      = isset( $arg['name'] ) ? $arg['name'] : '';
		$type      = isset( $arg['type'] ) ? $arg['type'] : '';
		$func      = ! empty( $arg['func'] ) ? ' onchange="' . $arg['func'] . '();"' : '';
		$options   = isset( $arg['option'] ) ? $arg['option'] : '';
		$val       = $arg['val'];
		$separator = isset( $arg['sep'] ) ? $arg['sep'] : '';
		// create radio fields
		if ( $type == 'radio' ) {
			$option = '';
			foreach ( $options as $key => $value ) {
				$select = ( $key == $val ) ? 'checked="checked"' : '';
				$option .= '<input name="param[' . $name . ']" type="radio" value="' . $key . '" id="wow_' . $id . '_' . $key . '" ' . $select . $func . '><label for="wow_' . $id . '_' . $key . '"> ' . $value . '</label>' . $separator;
			}
			$field = $option;
		} // create checkbox field
		elseif ( $type == 'checkbox' ) {
			$select = ! empty( $val ) ? 'checked="checked"' : '';
			$field  = '<input type="checkbox" ' . $select . $func . ' id="wow_' . $id . '">' . $separator;
			$field  .= '<input type="hidden" name="param[' . $name . ']" value="">';
		} // create text field
		elseif ( $type == 'text' ) {
			$option = '';
			if ( is_array( $options ) ) {
				foreach ( $options as $key => $value ) {
					$option .= ' ' . $key . '="' . $value . '"';
				}
			}
			$field = '<input name="param[' . $name . ']" type="text" value="' . $val . '" id="wow_' . $id . '"' . $func . $option . '>' . $separator;
		} // create number field
		elseif ( $type == 'number' ) {
			$option = '';
			if ( is_array( $options ) ) {
				foreach ( $options as $key => $value ) {
					$option .= ' ' . $key . '="' . $value . '"';
				}
			}
			$field = '<input name="param[' . $name . ']" type="number"  value="' . $val . '" id="wow_' . $id . '"' . $func . $option . '>' . $separator;
		} // create color field
		elseif ( $type == 'color' ) {
			$field = '<input name="param[' . $name . ']" type="text" value="' . $val . '" class="wp-color-picker-field" data-alpha="true" id="wow_' . $id . '">' . $separator;
		} // create select field
		elseif ( $type == 'select' ) {
			$option = '';
			foreach ( $options as $key => $value ) {
				$select = ( $key == $val ) ? 'selected="selected"' : '';
				$option .= '<option value="' . $key . '" ' . $select . '>' . $value . '</option>';
			}
			$field = '<select name="param[' . $name . ']"' . $func . ' id="wow_' . $id . '">';
			$field .= $option;
			$field .= '</select>' . $separator;
		} // create editor field
		elseif ( $type == 'editor' ) {
			$settings = array(
				'wpautop'       => 0,
				'textarea_name' => 'param[' . $name . ']',
				'textarea_rows' => 15,
			);
			$field    = wp_editor( $val, $id, $settings );
		} // create textarea field
		elseif ( $type == 'textarea' ) {
			$field = '<textarea name="param[' . $name . ']" id="wow_' . $id . '">' . esc_html( $val ) . '</textarea>' . $separator;

		}

		return $field;
	}

	public function plugin_check() {
		if ( isset( $_POST[ $this->plugin_slug . '_nonce' ] ) ) {
			if ( ! empty( $_POST ) && wp_verify_nonce( $_POST[ $this->plugin_slug . '_nonce' ], $this->plugin_slug . '_action' ) && current_user_can( 'manage_options' ) ) {
				self:: save_data();
			}
		}
	}

	public function save_data() {
		global $wpdb;
		$save_class    = __NAMESPACE__ . '\\Wow_DB_Update';
		$objItem       = new $save_class( $this->plugin_dir, $this->plugin_slug );
		$add           = ( isset( $_REQUEST['add'] ) ) ? absint( $_REQUEST['add'] ) : '';
		$data          = ( isset( $_REQUEST['data'] ) ) ? sanitize_text_field( $_REQUEST['data'] ) : '';
		$page          = sanitize_text_field( $_REQUEST['page'] );
		$tool_id       = absint( $_POST['tool_id'] );
		$info          = array();
		$info['id']    = $tool_id;
		$info['title'] = sanitize_text_field( $_POST['title'] );
		$info['param'] = $_POST['param'];
		if ( isset( $_POST['submit'] ) ) {
			if ( absint( $_POST['add'] ) == '1' ) {
				$objItem->addNewItem( $data, $info );
				header( 'Location:admin.php?page=' . $page . '&tab=add_new&act=update&id=' . $tool_id . '&info=saved' );
				exit;
			} elseif ( absint( $_POST['add'] ) == '2' ) {
				$objItem->updItem( $data, $info );
				header( 'Location:admin.php?page=' . $page . '&tab=add_new&act=update&id=' . $tool_id . '&info=update' );
				exit;
			}
		}
	}

	public function wow_message_callback() {
		update_option( 'wp_coder_message', 'read' );
		wp_die();
	}
}