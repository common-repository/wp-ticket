<?php
// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

if ( !class_exists( 'EMD_MB_Date_Field' ) )
{
	class EMD_MB_Date_Field extends EMD_MB_Field
	{
		/**
		 * Enqueue scripts and styles
		 *
		 * @return void
		 */
		static function admin_enqueue_scripts()
		{
			$deps = array( 'jquery-ui-datepicker' );
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
		
			$vars['date'] = $date_vars;
			$vars['locale'] = $locale;	
			wp_enqueue_script( 'emd-mb-date', EMD_MB_JS_URL . 'date.js', $deps, EMD_MB_VER, true );
			wp_localize_script( 'emd-mb-date', 'vars', $vars);
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
				if(DateTime::createFromFormat('Y-m-d',$meta)){
                                	$meta = DateTime::createFromFormat('Y-m-d',$meta)->format(self::translate_format($field));
				}
                        }
			return sprintf(
				'<input type="text" class="emd-mb-date" name="%s" value="%s" id="%s" size="%s" data-options="%s" %s readonly/>',
				$field['field_name'],
				$meta,
				isset( $field['clone'] ) && $field['clone'] ? '' : $field['id'],
				$field['size'],
				esc_attr( json_encode( $field['js_options'] ) ),
				isset($field['data-cell']) ? "data-cell='{$field['data-cell']}'" : ''
			);
		}

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
			) );

			// Deprecate 'format', but keep it for backward compatible
			// Use 'js_options' instead
			$field['js_options'] = wp_parse_args( $field['js_options'], array(
				'dateFormat'      => empty( $field['format'] ) ? 'yy-mm-dd' : $field['format'],
				'showButtonPanel' => true,
				'changeMonth' => true,
				'changeYear' => true,
				'yearRange' => '-100:+10'
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
                        return strtr( $field['js_options']['dateFormat'], self::$date_format_translation );
                }

                static function save( $new, $old, $post_id, $field )
                {
                        $name = $field['id'];
                        if ( '' === $new)
                        {
                                delete_post_meta( $post_id, $name );
                                return;
                        }
			if(DateTime::createFromFormat(self::translate_format($field), $new)){
                        	$new = DateTime::createFromFormat(self::translate_format($field), $new)->format('Y-m-d');
                        	update_post_meta( $post_id, $name, $new );
			}
                }
	}
}
