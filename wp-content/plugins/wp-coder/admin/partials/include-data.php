<?php

/**
 * Include data param for Wow Plugin
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$act = ( isset( $_REQUEST["act"] ) ) ? sanitize_text_field( $_REQUEST["act"] ) : '';
if ( $act === "update" ) {
	$recid  = absint( $_REQUEST["id"] );
	$sSQL   = $wpdb->prepare( "select * from $data WHERE id = %d", $recid );
	$result = $wpdb->get_row( $sSQL );
	if ( $result ) {
		$id      = $result->id;
		$title   = $result->title;
		$param   = unserialize( $result->param );
		$tool_id = $id;
		$hidval  = 2;
		$btn     = __( 'Update', 'wpcoder' );
	}
} elseif ( $act === "duplicate" ) {
	$recid  = absint( $_REQUEST["id"] );
	$sSQL   = $wpdb->prepare( "select * from $data WHERE id = %d", $recid );
	$result = $wpdb->get_row( $sSQL );
	if ( $result ) {
		$id    = "";
		$title = "";
		$param = unserialize( $result->param );
		$last  = $wpdb->get_col( "SELECT id FROM $data" );
		$tool_id = max( $last ) + 1;
		$hidval  = 1;
		$btn     = __( 'Save', 'wpcoder' );
	}
} else {
	$id      = "";
	$title   = "";
	$last    = $wpdb->get_col(  "SELECT id FROM $data" );
	$tool_id = ! empty( $last ) ? max( $last ) + 1 : 1;
	$param   = '';
	$hidval  = 1;
	$btn     = __( 'Save', 'wpcoder' );
}
