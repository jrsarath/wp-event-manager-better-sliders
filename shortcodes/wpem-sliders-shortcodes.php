<?php

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * WPEM_Sliders_Shortcodes class.
 */
class WPEM_Sliders_Shortcodes {

    /**
     * Constructor
     */
    public function __construct() {
        add_shortcode('events_slider', array($this, 'output_events_slider'));
        add_shortcode('past_events_slider', array($this, 'output_past_events_slider'));
    }

    /**
     * output_events_slider
     * @since 3.1.6
     */
    public function output_events_slider($atts) {
        error_log(print_r($atts,true));
        extract(shortcode_atts(array(
            'featured'   => null,
            'cancelled'  => null,
            'event_online' => null,
            'limit'      => 5,
            'orderby'    => 'rand',
            'order'      => 'ASC',
            'navigation' => true,
            'dots'       => true,
            'infinite'   => true,
            'adaptiveheight' => true,
            'autoplay'   => true,
            'autoplay_speed'     => 3000,
            'slidesToShow' => 1,
            'slidesToScroll' => 1,
            'variablewidth' => false,
            'centermode' => false,
            'showtickets' => false,
        ), $atts));


       if ( ! is_null( $featured ) ) {
            $featured = ( is_bool( $featured ) && $featured ) || in_array( $featured, array( '1', 'true', 'yes' ) ) ? true : false;
        }

        if ( ! is_null( $cancelled ) ) {
            $cancelled = ( is_bool( $cancelled ) && $cancelled ) || in_array( $cancelled, array( '1', 'true', 'yes' ) ) ? true : false;
        }

        if ( ! is_null( $event_online ) ) {
            $event_online = ( is_bool( $event_online ) && $event_online ) || in_array( $event_online, array( '1', 'true', 'yes' ) ) ? true : false;
        }

        if ( ! is_null( $autoplay ) ) {
            $autoplay = ( is_bool( $autoplay ) && $autoplay ) || in_array( $autoplay, array( '1', 'true', 'yes' ) ) ? true : false;
        }
        if ( ! is_null( $navigation ) ) {
            $navigation = ( is_bool( $navigation ) && $navigation ) || in_array( $navigation, array( '1', 'true', 'yes' ) ) ? true : false;
        }
        if ( ! is_null( $dots ) ) {
            $dots = ( is_bool( $dots ) && $dots ) || in_array( $dots, array( '1', 'true', 'yes' ) ) ? true : false;
        }
        if ( ! is_null( $infinite ) ) {
            $infinite = ( is_bool( $infinite ) && $infinite ) || in_array( $infinite, array( '1', 'true', 'yes' ) ) ? true : false;
        }
        if ( ! is_null( $adaptiveheight ) ) {
            $adaptiveheight = ( is_bool( $adaptiveheight ) && $adaptiveheight ) || in_array( $adaptiveheight, array( '1', 'true', 'yes' ) ) ? true : false;
        }
        if ( ! is_null( $variablewidth ) ) {
            $variablewidth = ( is_bool( $variablewidth ) && $variablewidth ) || in_array( $variablewidth, array( '1', 'true', 'yes' ) ) ? true : false;
        }
        if ( ! is_null( $centermode ) ) {
            $centermode = ( is_bool( $centermode ) && $centermode ) || in_array( $centermode, array( '1', 'true', 'yes' ) ) ? true : false;
        }
        if ( ! is_null( $showtickets ) ) {
            $showtickets = ( is_bool( $showtickets ) && $showtickets ) || in_array( $showtickets, array( '1', 'true', 'yes' ) ) ? true : false;
        }


        wp_enqueue_style('wp-event-manager-slick-style');
        wp_enqueue_style('wp-event-manager-sliders-frontend');
        wp_enqueue_script('wp-event-manager-slick-script');

        ob_start();

        $args = array(
                    'posts_per_page' => $limit,
                    'orderby'        => $orderby,
                    'order'          => $order,
                );

       if ( ! is_null( $featured ) )
            $args['featured'] = $featured;

       if ( ! is_null( $cancelled ) )
            $args['cancelled'] = $cancelled;

        if ( ! is_null( $event_online ) )
            $args['event_online'] = $event_online;

        $args = apply_filters('wp_event_manager_get_slider_listing_args', $args);
        $events = get_event_listings($args);

        get_event_manager_template('wp-event-slider.php',
            array(
                'events' => $events,
                'navigation' => $navigation,
                'dots'       => $dots,
                'infinite'   => $infinite,
                'adaptiveheight' => $adaptiveheight,
                'autoplay'   => $autoplay,
                'autoplay_speed' => $autoplay_speed,
                'variablewidth' => $variablewidth,
                'centermode' => $centermode,
                'showtickets' => $showtickets,
            ),
        'wp-event-manager-sliders',
        WPEM_SLIDER_PLUGIN_DIR . '/templates/');

        wp_reset_postdata();

        return ob_get_clean();
    }

        /**
     * output_events_slider
     * @since 3.1.6
     */
    public function output_past_events_slider($atts)
    {
        extract(shortcode_atts(array(
            'featured'   => null,
            'cancelled'  => null,
            'event_online' => null,
            'limit'      => 5,
            'orderby'    => 'rand',
            'order'      => 'ASC',
            'navigation' => true,
            'dots'       => true,
            'infinite'   => true,
            'adaptiveheight' => true,
            'autoplay'   => true,
            'autoplay_speed'     => 3000,
        ), $atts));

        if ( ! is_null( $featured ) ) {
            $featured = ( is_bool( $featured ) && $featured ) || in_array( $featured, array( '1', 'true', 'yes' ) ) ? true : false;
        }
        if ( ! is_null( $cancelled ) ) {
            $cancelled = ( is_bool( $cancelled ) && $cancelled ) || in_array( $cancelled, array( '1', 'true', 'yes' ) ) ? true : false;
        }
        if ( ! is_null( $event_online ) ) {
            $event_online = ( is_bool( $event_online ) && $event_online ) || in_array( $event_online, array( '1', 'true', 'yes' ) ) ? true : false;
        }


        if ( ! is_null( $autoplay ) ) {
            $autoplay = ( is_bool( $autoplay ) && $autoplay ) || in_array( $autoplay, array( '1', 'true', 'yes' ) ) ? true : false;
        }
        if ( ! is_null( $navigation ) ) {
            $navigation = ( is_bool( $navigation ) && $navigation ) || in_array( $navigation, array( '1', 'true', 'yes' ) ) ? true : false;
        }
        if ( ! is_null( $dots ) ) {
            $dots = ( is_bool( $dots ) && $dots ) || in_array( $dots, array( '1', 'true', 'yes' ) ) ? true : false;
        }
        if ( ! is_null( $infinite ) ) {
            $infinite = ( is_bool( $infinite ) && $infinite ) || in_array( $infinite, array( '1', 'true', 'yes' ) ) ? true : false;
        }
        if ( ! is_null( $adaptiveheight ) ) {
            $adaptiveheight = ( is_bool( $adaptiveheight ) && $adaptiveheight ) || in_array( $adaptiveheight, array( '1', 'true', 'yes' ) ) ? true : false;
        }

        wp_enqueue_style('wp-event-manager-slick-style');
        wp_enqueue_style('wp-event-manager-sliders-frontend');
        wp_enqueue_script('wp-event-manager-slick-script');


        ob_start();

        $args_past = array(
            'post_type'     => 'event_listing',
            'post_status'   => array('expired'),
            'posts_per_page' => $limit,
            'orderby'       => $orderby,
            'order'         => $order,
            'meta_query'    => array()
        );

        if ( ! is_null( $featured ) )
            $args_past['meta_query'][] = array(

                                            'key'     => '_featured',

                                            'value'   => '1',

                                            'compare' => $featured ? '=' : '!='
                                        );
        if ( ! is_null( $cancelled ) )
            $args_past['meta_query'][] = array(

                                            'key'     => '_cancelled',

                                            'value'   => '1',

                                            'compare' => $cancelled ? '=' : '!='
                                        );
        if ( ! is_null( $event_online ) )
            $args_past['meta_query'][] = array(

                                            'key'     => '_event_online',

                                            'value'   => 'yes',

                                            'compare' => $event_online ? '=' : '!='
                                        );

        $args_past = apply_filters( 'wp_event_manager_get_slider_past_listing_args', $args_past );

        $past_events = new WP_Query( $args_past );

        get_event_manager_template('wp-event-slider.php',
            array(
                'events' => $past_events,
                'navigation' => $navigation,
                'dots'       => $dots,
                'infinite'   => $infinite,
                'adaptiveheight' => $adaptiveheight,
                'autoplay'   => $autoplay,
                'autoplay_speed' => $autoplay_speed,
            ),
        'wp-event-manager-sliders',
        WPEM_SLIDER_PLUGIN_DIR . '/templates/');

        wp_reset_postdata();

        return ob_get_clean();
    }

}

new WPEM_Sliders_Shortcodes();
