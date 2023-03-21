<?php

/**
 * Plugin Name: Games of Arts Booking
 * Description: Система бронирования, и учета клиентов для Games of Arts.
 * Author URI:  https://t.me/sergiohardov
 * Author:      Sergio Hardov
 * Version:     1.1
 * Text Domain: goa-booking
 * Domain Path: /lang
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if (!defined('ABSPATH')) die;

/**
 * GoaBooking
 * 
 * Main plugin class init.
 */
class GoaBooking
{
    public function __construct()
    {
        $this->defines();
        $this->includes();
        $this->init_hooks();
    }

    public function defines()
    {
        // Plugin PATH
        define('GOA_BOOKING_PLUGIN_PATH', plugin_dir_path(__FILE__));

        // Plugin URL
        define('GOA_BOOKING_PLUGIN_URL', plugin_dir_url(__FILE__));

        // Roles
        define('GOA_BOOKING_WP_AGENT_ROLE', 'goa_booking_role_agent');
        define('GOA_BOOKING_WP_CUSTOMER_ROLE', 'goa_booking_role_customer');

        // Database Tables
        global $wpdb;
        define('GOA_BOOKING_TABLE_AGENTS', $wpdb->prefix . 'goa_booking_agents');
        define('GOA_BOOKING_TABLE_CUSTOMERS', $wpdb->prefix . 'goa_booking_customers');

        // Slugs
        define('GOA_BOOKING_SLUG_WP_ADMIN_PAGE', 'goa_booking');
    }

    public function includes()
    {
        // HELPERS
        include_once(GOA_BOOKING_PLUGIN_PATH . 'inc/helpers/debug_helper.php');
        include_once(GOA_BOOKING_PLUGIN_PATH . 'inc/helpers/database_helper.php');

        // MODELS
        include_once(GOA_BOOKING_PLUGIN_PATH . 'inc/model/agents_model.php');

        // CONTROLLERS
        include_once(GOA_BOOKING_PLUGIN_PATH . 'inc/controller/agents_controller.php');

        // VIEWS

        // FUNCTIONS
        include_once(GOA_BOOKING_PLUGIN_PATH . 'functions.php');
    }

    public function init_hooks()
    {
        register_activation_hook(__FILE__, [$this, 'on_activate']);
        register_deactivation_hook(__FILE__, [$this, 'on_deactivate']);
        add_action('admin_menu', [$this, 'plugin_page_link']);
        add_action('admin_enqueue_scripts', [$this, 'plugin_page_assets']);
    }

    public function on_activate()
    {
        // Debug message
        GoaBookingDebugHelper::log_debug('[SYSTEM] Plugin Activated');

        flush_rewrite_rules();
        GoaBookingDatabaseHelper::run_setup();
    }

    public function on_deactivate()
    {
        // Debug message
        GoaBookingDebugHelper::log_debug('[SYSTEM] Plugin Deactivated');
    }

    public function plugin_page_link()
    {
        add_menu_page(
            esc_html__('GoA Booking Admin', 'goa-booking'),
            esc_html__('GoA Booking', 'goa-booking'),
            'manage_options',
            GOA_BOOKING_SLUG_WP_ADMIN_PAGE,
            [$this, 'plugin_page_template'],
            'dashicons-admin-plugins',
            100
        );
    }

    public function plugin_page_template()
    {
        require_once GOA_BOOKING_PLUGIN_PATH . 'admin/index.php';
    }

    public function plugin_page_assets()
    {
        $screen = get_current_screen();

        if ($screen->id === 'toplevel_page_' . GOA_BOOKING_SLUG_WP_ADMIN_PAGE) {
            // Enqueue styles
            wp_enqueue_style('goa-booking-bootstrap-icons', GOA_BOOKING_PLUGIN_URL . 'libs/bootstrap/icons/bootstrap-icons.css');
            wp_enqueue_style('goa-booking-bootstrap', GOA_BOOKING_PLUGIN_URL . 'libs/bootstrap/bootstrap.min.css');
            wp_enqueue_style('goa-booking-admin', GOA_BOOKING_PLUGIN_URL . 'admin/assets/css/style.css');

            // Enqueue scripts
            wp_enqueue_script('goa-booking-bootstrap', GOA_BOOKING_PLUGIN_URL . 'libs/bootstrap/bootstrap.min.js', '', '', true);
        }
    }
}

$GoaBooking = new GoaBooking();
