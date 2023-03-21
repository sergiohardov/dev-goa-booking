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
    }

    public function includes()
    {
        // HELPERS
        include_once(GOA_BOOKING_PLUGIN_PATH . 'inc/helpers/debug_helper.php');
        include_once(GOA_BOOKING_PLUGIN_PATH . 'inc/helpers/database_helper.php');

        // MODELS

        // CONTROLLERS
    }

    public function init_hooks()
    {
        register_activation_hook(__FILE__, [$this, 'on_activate']);
        register_deactivation_hook(__FILE__, [$this, 'on_deactivate']);
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
}

$GoaBooking = new GoaBooking();
