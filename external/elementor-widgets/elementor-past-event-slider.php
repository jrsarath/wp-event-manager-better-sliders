<?php
namespace WPEventManagerSlidder\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Past Event Slider
 *
 * Elementor widget for event slider.
 *
 */
class Elementor_Past_Event_Slider extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'past-event-slider';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Past Event Slider', 'wp-event-manager-sliders' );
	}
	/**	
	 * Get widget icon.
	 *
	 * Retrieve shortcode widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-post-slider';
	}
	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @access public
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'past-event-slider', 'code' ];
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'wp-event-manager-categories' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_shortcode',
			[
				'label' => __( 'Past Event Slider', 'wp-event-manager-sliders' ),
			]
		);
	
		$this->add_control(
			'featured',
			[
				'label' => __( 'Show Featured', 'wp-event-manager-sliders' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __( 'All Events', 'wp-event-manager-sliders' ),
					'false' => __( 'False', 'wp-event-manager-sliders' ),
					'true' => __( 'True', 'wp-event-manager-sliders' ),
				],
			]
		);
		$this->add_control(
			'cancelled',
			[
				'label' => __( 'Show Cancelled', 'wp-event-manager-sliders' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __( 'All Events', 'wp-event-manager-sliders' ),
					'true' => __( 'True', 'wp-event-manager-sliders' ),
					'false' => __( 'False', 'wp-event-manager-sliders' ),
					
				],
			]
		);

		$this->add_control(
			'event_online',
			[
				'label' => __( 'Show Online Event', 'wp-event-manager-sliders' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __( 'All Events', 'wp-event-manager-sliders' ),
					'true' => __( 'True', 'wp-event-manager-sliders' ),
					'false' => __( 'False', 'wp-event-manager-sliders' ),
					
				],
			]
		);

		$this->add_control(
			'limit',
			[
				'label'       => __( 'Limit', 'wp-event-manager-sliders' ),
				'type'        => Controls_Manager::NUMBER,
				'default'     => '5',
			]
		);

		$this->add_control(
			'orderby',
			[
				'label' => __( 'Order By', 'wp-event-manager-sliders' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'modified',
				'options' => [
					'title' => __( 'Title', 'wp-event-manager-sliders' ),
					'event_start_date' => __( 'Event Start Date', 'wp-event-manager-sliders' ),
					'ID' => __( 'ID', 'wp-event-manager-sliders' ),
					'name' => __( 'Name', 'wp-event-manager-sliders' ),
					'modified' => __( 'Modified', 'wp-event-manager-sliders' ),
					'parent' => __( 'Parent', 'wp-event-manager-sliders' ),
					'modified' => __( 'Modified', 'wp-event-manager-sliders' ),
					'rand' => __( 'Rand', 'wp-event-manager-sliders' ),
				],
			]
		);

		$this->add_control(
			'order',
			[
				'label' => __( 'Order', 'wp-event-manager-sliders' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'ASC',
				'options' => [
					'ASC' => __( 'ASC', 'wp-event-manager-sliders' ),
					'DESC' => __( 'DESC', 'wp-event-manager-sliders' ),
				],
			]
		);

		$this->add_control(
			'navigation',
			[
				'label' => __( 'Navigation', 'wp-event-manager-sliders' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'true',
				'options' => [
					'false' => __( 'False', 'wp-event-manager-sliders' ),
					'true' => __( 'True', 'wp-event-manager-sliders' ),
				],
			]
		);

		$this->add_control(
			'dots',
			[
				'label' => __( 'Dots', 'wp-event-manager-sliders' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'true',
				'options' => [
					'false' => __( 'False', 'wp-event-manager-sliders' ),
					'true' => __( 'True', 'wp-event-manager-sliders' ),
				],
			]
		);

		$this->add_control(
			'infinite',
			[
				'label' => __( 'Infinite', 'wp-event-manager-sliders' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'true',
				'options' => [
					'false' => __( 'False', 'wp-event-manager-sliders' ),
					'true' => __( 'True', 'wp-event-manager-sliders' ),
				],
			]
		);

		$this->add_control(
			'adaptiveheight',
			[
				'label' => __( 'AdaptiveHeight', 'wp-event-manager-sliders' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'true',
				'options' => [
					'false' => __( 'False', 'wp-event-manager-sliders' ),
					'true' => __( 'True', 'wp-event-manager-sliders' ),
				],
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label' => __( 'Auto Play', 'wp-event-manager-sliders' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'true',
				'options' => [
					'false' => __( 'False', 'wp-event-manager-sliders' ),
					'true' => __( 'True', 'wp-event-manager-sliders' ),
				],
			]
		);
		$this->add_control(
			'autoplay_speed',
			[
				'label' => __( 'Auto Play Speed', 'wp-event-manager-sliders' ),
				'type'        => Controls_Manager::NUMBER,
				'default' => '3000',
				
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		if($settings['featured'])
			$featured = 'featured="'.$settings['featured'].'"';
		else
			$featured = '';

		if($settings['cancelled'])
			$cancelled = 'cancelled='.$settings['cancelled'].' ';
		else
			$cancelled = '';

		if($settings['event_online'])
			$event_online = 'event_online='.$settings['event_online'].' ';
		else
			$event_online = '';

		if($settings['limit']>0)
			$limit = 'limit="'.$settings['limit'].'"';
		else
			$limit = '';

		if($settings['orderby'] != '')
			$orderby = 'orderby="'.$settings['orderby'].'"';
		else
			$orderby = '';

		if($settings['order'] != '')
			$order = 'order="'.$settings['order'].'"';
		else
			$order = '';

		if($settings['navigation'])
			$navigation = 'navigation="'.$settings['navigation'].'"';
		else
			$navigation = '';

		if($settings['dots'])
			$dots = 'dots="'.$settings['dots'].'"';
		else
			$dots = '';

		if($settings['infinite'])
			$infinite = 'infinite="'.$settings['infinite'].'"';
		else
			$infinite = '';

		if($settings['adaptiveheight'])
			$adaptiveheight = 'adaptiveheight="'.$settings['adaptiveheight'].'"';
		else
			$adaptiveheight = '';

		if($settings['autoplay'])
			$autoplay = 'autoplay="'.$settings['autoplay'].'"';
		else
			$autoplay = '';
		if($settings['autoplay_speed'])
			$autoplay_speed = 'autoplay_speed="'.$settings['autoplay_speed'].'"';
		else
			$autoplay_speed = '';
			
		echo do_shortcode('[past_events_slider '.$featured.' '.$event_online.' '.$cancelled.' '.$limit.' '.$orderby.' '.$order.' '.$navigation.' '.$dots.' '.$infinite.' '.$adaptiveheight.' '.$autoplay.' '.$autoplay_speed.']');
	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @access protected
	 */
	protected function _content_template() {}
}
