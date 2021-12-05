<?php
/**
 * @package 	WordPress
 * @subpackage 	EcoNature
 * @version 	1.5.2
 * 
 * Website Events Functions
 * Created by CMSMasters
 * 
 */


/* Updating default options in The Events Calendar plugin. */
function cmsms_tribe_update_default_options() {
	if ( 'update' === get_option( 'cmsms_event_update_option' ) ) {
		return;
	}

	$option_name = 'tribe_customizer';
	$tribe_options = get_option( $option_name );

	$new_global_elements = array(
		'event_title_color' => cmsms_theme_color( 'heading' ),
		'event_date_time_color' => cmsms_theme_color( 'color' ),
		'link_color' => cmsms_theme_color( 'link' ),
		'background_color_choice' => 'transparent',
		'background_color' => 'transparent',
		'accent_color' => cmsms_theme_color( 'heading' ),
		'map_pin' => '',
	);
	$global_elements = ( ! empty( $tribe_options['global_elements'] ) ? $tribe_options['global_elements'] : $new_global_elements );

	foreach ( $global_elements as $element => $value ) {
		if ( isset( $new_global_elements[ $element ] ) && $new_global_elements[ $element ] !== $global_elements ) {
			$tribe_options['global_elements'][ $element ] = $new_global_elements[ $element ];
		} else {
			add_option( $tribe_options['global_elements'], $tribe_options['global_elements'][ $element ] );
		}
	}

	$new_single_event = array(
		'post_title_color_choice' => 'general',
		'post_title_color' => cmsms_theme_color( 'heading' ),

	);
	$single_event = ( ! empty( $tribe_options['single_event'] ) ? $tribe_options['single_event'] : $new_single_event );

	foreach ( $single_event as $element => $value ) {
		if ( isset( $new_single_event[ $element ] ) && $new_single_event[ $element ] !== $single_event ) {
			$tribe_options['single_event'][ $element ] = $new_single_event[ $element ];
		} else {
			add_option( $tribe_options['single_event'], $tribe_options['single_event'][ $element ] );
		}
	}

	$new_tec_events_bar = array(
		'events_bar_text_color' => cmsms_theme_color( 'heading' ),
		'find_events_button_text_color' => cmsms_theme_color( 'bg' ),
		'events_bar_icon_color_choice' => 'default',
		'events_bar_icon_color' => cmsms_theme_color( 'heading' ),
		'find_events_button_color_choice' => 'custom',
		'find_events_button_color' => cmsms_theme_color( 'link' ),
		'events_bar_background_color_choice' => 'default',
		'events_bar_background_color' => cmsms_theme_color( 'bg' ),
		'view_selector_background_color_choice' => 'default',
		'view_selector_background_color' => cmsms_theme_color( 'bg' ),
		'events_bar_border_color_choice' => 'default',
		'events_bar_border_color' => cmsms_theme_color( 'border' ),
	);
	$tec_events_bar = ( ! empty( $tribe_options['tec_events_bar'] ) ? $tribe_options['tec_events_bar'] : $new_tec_events_bar );

	foreach ( $tec_events_bar as $element => $value ) {
		if ( isset( $new_tec_events_bar[ $element ] ) && $new_tec_events_bar[ $element ] !== $tec_events_bar ) {
			$tribe_options['tec_events_bar'][ $element ] = $new_tec_events_bar[ $element ];
		} else {
			add_option( $tribe_options['tec_events_bar'], $tribe_options['tec_events_bar'][ $element ] );
		}
	}

	$new_month_view = array(
		'days_of_week_color' => cmsms_theme_color( 'heading' ),
		'date_marker_color' => cmsms_theme_color( 'heading' ),
		'multiday_event_bar_color_choice' => 'default',
		'multiday_event_bar_color' => '#334aff',
		'grid_lines_color' => cmsms_theme_color( 'border' ),
		'grid_hover_color' => cmsms_theme_color( 'border' ),
		'grid_background_color_choice' => 'transparent',
		'grid_background_color' => cmsms_theme_color( 'color' ),
		'tooltip_background_color' => 'default',
	);
	$month_view = ( ! empty( $tribe_options['month_view'] ) ? $tribe_options['month_view'] : $new_month_view );

	foreach ( $month_view as $element => $value ) {
		if ( isset( $new_month_view[ $element ] ) && $new_month_view[ $element ] !== $month_view ) {
			$tribe_options['month_view'][ $element ] = $new_month_view[ $element ];
		} else {
			add_option( $tribe_options['month_view'], $tribe_options['month_view'][ $element ] );
		}
	}

	update_option( $option_name, $tribe_options );

	add_option( 'cmsms_event_update_option', 'update', '', 'yes' );
}

add_action( 'init', 'cmsms_tribe_update_default_options' );


/* Theme colors for updating default options in The Events Calendar plugin. */
function cmsms_theme_color( $color ) {
	$cmsms_option = cmsms_get_global_options();

	$colors = array(
		'color' => $cmsms_option[CMSMS_SHORTNAME . '_default_color'],
		'link' => $cmsms_option[CMSMS_SHORTNAME . '_default_link'],
		'hover' => $cmsms_option[CMSMS_SHORTNAME . '_default_hover'],
		'heading' => $cmsms_option[CMSMS_SHORTNAME . '_default_heading'],
		'bg' => $cmsms_option[CMSMS_SHORTNAME . '_default_bg'],
		'alternate' => $cmsms_option[CMSMS_SHORTNAME . '_default_alternate'],
		'border' => $cmsms_option[CMSMS_SHORTNAME . '_default_border'],
	);

	$color = explode('|', $colors[ $color ]);

	return $color[0];
}


/* The Events Calendar and related plugins: Add your own location for template file loading. */
function cmsms_tribe_additional_template_locations( string $file, string $template ) {
	$new_locations = array();

	if ( ! tribe_events_views_v2_is_enabled() ) {
		$new_locations['themes_root'] = trailingslashit( get_theme_root() ) . CMSMS_SHORTNAME .  '/tribe-events';
	}

	$new_locations['my_plugin'] = trailingslashit( plugin_dir_path( WP_PLUGIN_DIR ) ) . 'plugins/the-events-calendar/src/views';

	foreach ( $new_locations as $location ) {
		$new_file = trailingslashit( $location ) . $template;

		if ( file_exists( $new_file ) ) {
			return $new_file;
		}
	}

	return $file;
}

add_filter( 'tribe_events_template', 'cmsms_tribe_additional_template_locations', 10, 2 );


/* Replace Styles */
function cmsms_tribe_events_stylesheet_url() {
	if ( ! tribe_events_views_v2_is_enabled() ) {
		wp_deregister_style( 'tribe-events-calendar-style' );
		wp_deregister_style( 'tribe-events-full-calendar-style' );
		wp_deregister_style( 'tribe-events-admin-menu' );
		
		wp_enqueue_style( 'tribe-events-bootstrap-datepicker-css' );

		wp_deregister_style( 'tribe-events-views-v2-full' );
		wp_deregister_style( 'tribe-common-full-style' );
	}
}

add_action('wp_enqueue_scripts', 'cmsms_tribe_events_stylesheet_url', 100);


/* Replace Pro Styles */
function cmsms_tribe_events_pro_stylesheet_url() {
	if ( ! tribe_events_views_v2_is_enabled() ) {
		wp_deregister_style( 'tribe-events-calendar-pro-style' );
		wp_deregister_style( 'tribe-events-full-pro-calendar-style' );
		wp_deregister_style( 'widget-calendar-pro-style' );

		wp_deregister_style( 'tribe-events-pro-views-v2-full' );
	}
}

add_action('wp_enqueue_scripts', 'cmsms_tribe_events_pro_stylesheet_url', 100);


/* Replace Widget Styles */
function cmsms_tribe_events_pro_widget_calendar_stylesheet_url() {
	if ( ! tribe_events_views_v2_is_enabled() ) {
		return '';
	}
}

add_filter('tribe_events_pro_widget_calendar_stylesheet_url', 'cmsms_tribe_events_pro_widget_calendar_stylesheet_url');


/* Replace Responsive Styles */
function cmsms_tribe_events_mobile_breakpoint() {
	if ( ! tribe_events_views_v2_is_enabled() ) {
		return 749;
	}
}

add_filter('tribe_events_mobile_breakpoint', 'cmsms_tribe_events_mobile_breakpoint');


/* Events Archive, Venue and Organizer Layout */
function cmsms_tribe_events_layout($cmsms_layout) {
	if (
		tribe_events_views_v2_is_enabled() &&
		tribe_is_event_query() &&
		(
			is_archive() ||
			tribe_is_venue() ||
			tribe_is_organizer()
		)
	) {
		$cmsms_layout = 'fullwidth';
	}
	
	
	return $cmsms_layout;
}

add_filter('cmsms_theme_page_layout_filter', 'cmsms_tribe_events_layout');
