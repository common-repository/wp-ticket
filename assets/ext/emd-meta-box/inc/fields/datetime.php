<?php
// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

if ( !class_exists( 'EMD_MB_Datetime_Field' ) )
{
	class EMD_MB_Datetime_Field extends EMD_MB_Field
	{
		/**
		 * Enqueue scripts and styles
		 *
		 * @return void
		 */
		static function admin_enqueue_scripts()
		{
			$url_css = EMD_MB_CSS_URL . 'jqueryui';
			wp_register_script( 'jquery-ui-timepicker', EMD_MB_JS_URL . 'jqueryui/jquery-ui-timepicker-addon.js', array( 'jquery-ui-datepicker', 'jquery-ui-slider' ), '0.9.7', true );
			wp_enqueue_style( 'jquery-ui-timepicker-css', "{$url_css}/jquery-ui-timepicker-addon.css");
			$deps = array( 'jquery-ui-datepicker', 'jquery-ui-timepicker' );

                        $locale = get_locale();
                        $date_vars['closeText'] = __('Done','wp-ticket-com');
                        $date_vars['prevText'] = __('Prev','wp-ticket-com');
                        $date_vars['nextText'] = __('Next','wp-ticket-com');
                        $date_vars['currentText'] = __('Today','wp-ticket-com');
                        $date_vars['monthNames'] = Array(__('January','wp-ticket-com'),__('February','wp-ticket-com'),__('March','wp-ticket-com'),__('April','wp-ticket-com'),__('May','wp-ticket-com'),__('June','wp-ticket-com'),__('July','wp-ticket-com'),__('August','wp-ticket-com'),__('September','wp-ticket-com'),__('October','wp-ticket-com'),__('November','wp-ticket-com'),__('December','wp-ticket-com'));
                        $date_vars['monthNamesShort'] = Array(__('Jan','wp-ticket-com'),__('Feb','wp-ticket-com'),__('Mar','wp-ticket-com'),__('Apr','wp-ticket-com'),__('May','wp-ticket-com'),__('Jun','wp-ticket-com'),__('Jul','wp-ticket-com'),__('Aug','wp-ticket-com'),__('Sep','wp-ticket-com'),__('Oct','wp-ticket-com'),__('Nov','wp-ticket-com'),__('Dec','wp-ticket-com'));
                        $date_vars['dayNames'] = Array(__('Sunday','wp-ticket-com'),__('Monday','wp-ticket-com'),__('Tuesday','wp-ticket-com'),__('Wednesday','wp-ticket-com'),__('Thursday','wp-ticket-com'),__('Friday','wp-ticket-com'),__('Saturday','wp-ticket-com'));
                        $date_vars['dayNamesShort'] = Array(__('Sun','wp-ticket-com'),__('Mon','wp-ticket-com'),__('Tue','wp-ticket-com'),__('Wed','wp-ticket-com'),__('Thu','wp-ticket-com'),__('Fri','wp-ticket-com'),__('Sat','wp-ticket-com'));
                        $date_vars['dayNamesMin'] = Array(__('Su','wp-ticket-com'),__('Mo','wp-ticket-com'),__('Tu','wp-ticket-com'),__('We','wp-ticket-com'),__('Th','wp-ticket-com'),__('Fr','wp-ticket-com'),__('Sa','wp-ticket-com'));
                        $date_vars['weekHeader'] = __('Wk','wp-ticket-com');

			$time_vars['timeOnlyTitle'] = __('Choose Time','wp-ticket-com');
			$time_vars['timeText'] = __('Time','wp-ticket-com');
			$time_vars['hourText'] = __('Hour','wp-ticket-com');
			$time_vars['minuteText'] = __('Minute','wp-ticket-com');
			$time_vars['secondText'] = __('Second','wp-ticket-com');
			$time_vars['millisecText'] = __('Millisecond','wp-ticket-com');
			$time_vars['timezoneText'] = __('Time Zone','wp-ticket-com');
			$time_vars['currentText'] = __('Now','wp-ticket-com');
			$time_vars['closeText'] = __('Done','wp-ticket-com');

                        $vars['date'] = $date_vars;
                        $vars['time'] = $time_vars;
                        $vars['locale'] = $locale;

			wp_enqueue_script( 'emd-mb-datetime', EMD_MB_JS_URL . 'datetime.js', $deps, EMD_MB_VER, true );
                        wp_localize_script( 'emd-mb-datetime', 'dtvars', $vars);
		}

		/**
		 * Get field HTML
		 *
		 * @param mixed  $meta
		 * @param array  $field
		 *
		 * @return string
		 */
		static function html( $meta, $field )
		{
			if($meta != '')
                        {
                                if($field['js_options']['timeFormat'] == 'hh:mm')
                                {
                                        $getformat = 'Y-m-d H:i';
                                }
                                else
                                {
                                        $getformat = 'Y-m-d H:i:s';
                                }
				if(DateTime::createFromFormat($getformat,$meta)){
                                	$meta = DateTime::createFromFormat($getformat,$meta)->format(self::translate_format($field));
				}
                        }
                        return sprintf(
                                '<input type="text" class="emd-mb-datetime" name="%s" value="%s" id="%s" size="%s" data-options="%s" readonly/>',
                                $field['field_name'],
                                $meta,
                                isset( $field['clone'] ) && $field['clone'] ? '' : $field['id'],
                                $field['size'],
                                esc_attr( json_encode( $field['js_options'] ) )
                        );
		}

		/**
		 * Calculates the timestamp from the datetime string and returns it
		 * if $field['timestamp'] is set or the datetime string if not
		 *
		 * @param mixed $new
		 * @param mixed $old
		 * @param int   $post_id
		 * @param array $field
		 *
		 * @return string|int
		 */
		/*static function value( $new, $old, $post_id, $field )
		{
			if ( !$field['timestamp'] )
				return $new;

			$d = DateTime::createFromFormat( self::translate_format( $field ), $new );
			return $d ? $d->getTimestamp() : 0;
		}*/

		/**
		 * Normalize parameters for field
		 *
		 * @param array $field
		 *
		 * @return array
		 */
		static function normalize_field( $field )
		{
			$field = wp_parse_args( $field, array(
				'size'       => 30,
				'js_options' => array(),
				'timestamp'  => false,
			) );

			// Deprecate 'format', but keep it for backward compatible
			// Use 'js_options' instead
			$field['js_options'] = wp_parse_args( $field['js_options'], array(
				'dateFormat'      => empty( $field['format'] ) ? 'yy-mm-dd' : $field['format'],
				'timeFormat'      => 'hh:mm:ss',
				'showButtonPanel' => true,
				'separator'       => ' ',
				'changeMonth' => true,
				'changeYear' => true,
				'yearRange' => '-100:+10',
			) );

			return $field;
		}

		/**
		 * Returns a date() compatible format string from the JavaScript format
		 *
		 * @see http://www.php.net/manual/en/function.date.php
		 *
		 * @param array $field
		 *
		 * @return string
		 */
		static function translate_format( $field )
		{
			return strtr( $field['js_options']['dateFormat'], self::$date_format_translation )
				. $field['js_options']['separator']
				. strtr( $field['js_options']['timeFormat'], self::$time_format_translation );
		}
		static function save( $new, $old, $post_id, $field )
                {
                        $name = $field['id'];
                        if ( '' === $new)
                        {
                                delete_post_meta( $post_id, $name );
                                return;
                        }
                        if($field['js_options']['timeFormat'] == 'hh:mm')
                        {
                                $getformat = 'Y-m-d H:i';
                        }
                        else
                        {
                                $getformat = 'Y-m-d H:i:s';
                        }
			if(DateTime::createFromFormat(self::translate_format($field), $new)){
                        	$new = DateTime::createFromFormat(self::translate_format($field), $new)->format($getformat);
                        	update_post_meta( $post_id, $name, $new );
			}
                }
	}
}
