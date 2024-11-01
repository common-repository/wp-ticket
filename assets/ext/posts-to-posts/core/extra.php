<?php
// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

class P2P_Widget extends scbWidget {

	protected $defaults = array(
		'ctype' => false,
		'listing' => 'connected',
		'title' => ''
	);

	static function init( $class = '', $file = false, $base = 'p2p' ) {
		if ( empty( $class ) )
			$class = __CLASS__;

		parent::init( $class, $file, $base );
	}

	function __construct() {
		parent::__construct( 'p2p', __( 'Posts 2 Posts', 'wp-ticket-com' ), array(
			'description' => __( 'A list of posts connected to the current post', 'wp-ticket-com' )
		) );
	}

	function form( $instance ) {
		if ( empty( $instance ) )
			$instance = $this->defaults;

		$ctypes = array();

		foreach ( P2P_Connection_Type_Factory::get_all_instances() as $p2p_type => $ctype ) {
			$ctypes[ $p2p_type ] = $ctype->get_desc();
		}

		echo html( 'p', $this->input( array(
			'type' => 'text',
			'name' => 'title',
			'desc' => __( 'Title:', 'wp-ticket-com' )
		), $instance ) );

		echo html( 'p', $this->input( array(
			'type' => 'select',
			'name' => 'ctype',
			'values' => $ctypes,
			'desc' => __( 'Connection type:', 'wp-ticket-com' ),
			'extra' => "style='width: 100%'"
		), $instance ) );

		echo html( 'p',
			__( 'Connection listing:', 'wp-ticket-com' ),
			'<br>',
			$this->input( array(
				'type' => 'radio',
				'name' => 'listing',
				'values' => array(
					'connected' => __( 'connected', 'wp-ticket-com' ),
					'related' => __( 'related', 'wp-ticket-com' )
				),
			), $instance )
		);
	}

	function widget( $args, $instance ) {
		$instance = array_merge( $this->defaults, $instance );

		$output = _p2p_get_list( array(
			'ctype' => $instance['ctype'],
			'method' => ( 'related' == $instance['listing'] ? 'get_related' : 'get_connected' ),
			'item' => get_queried_object(),
			'mode' => 'ul',
			'context' => 'widget'
		) );

		if ( !$output )
			return;

		$title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );

		extract( $args );

		echo wp_kses_post($before_widget);

		if ( ! empty( $title ) )
			echo wp_kses_post($before_title . $title . $after_title);

		echo wp_kses_post($output);

		echo wp_kses_post($after_widget);
	}
}


class P2P_Shortcodes {

	static function init() {
		add_shortcode( 'p2p_connected', array( __CLASS__, 'connected' ) );
		add_shortcode( 'p2p_related', array( __CLASS__, 'related' ) );
	}

	static function connected( $attr ) {
		return self::get_list( $attr, 'get_connected' );
	}

	static function related( $attr ) {
		return self::get_list( $attr, 'get_related' );
	}

	private static function get_list( $attr, $method ) {
		global $post;

		$attr = shortcode_atts( array(
			'type' => '',
			'mode' => 'ul',
		), $attr );

		return _p2p_get_list( array(
			'ctype' => $attr['type'],
			'method' => $method,
			'item' => $post,
			'mode' => $attr['mode'],
			'context' => 'shortcode'
		) );
	}
}


/** @internal */
function _p2p_get_list( $args ) {
	extract( $args );

	$ctype = p2p_type( $ctype );
	if ( !$ctype ) {
		trigger_error( sprintf( "Unregistered connection type '%s'.", $ctype ), E_USER_WARNING );
		return '';
	}

	$directed = $ctype->find_direction( $item );
	if ( !$directed )
		return '';

	$extra_qv = array(
		'p2p:per_page' => -1,
		'p2p:context' => $context
	);

	$connected = $directed->$method( $item, $extra_qv, 'abstract' );

	switch ( $mode ) {
	case 'inline':
		$args = array(
			'separator' => ', '
		);
		break;

	case 'ol':
		$args = array(
			'before_list' => '<ol id="' . $ctype->name . '_list">',
			'after_list' => '</ol>',
		);
		break;

	case 'ul':
	default:
		$args = array(
			'before_list' => '<ul id="' . $ctype->name . '_list">',
			'after_list' => '</ul>',
		);
		break;
	}

	$args['echo'] = false;

	return apply_filters( "p2p_{$context}_html", $connected->render( $args ), $connected, $directed, $mode );
}

