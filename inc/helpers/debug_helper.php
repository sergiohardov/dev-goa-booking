<?php

class GoaBookingDebugHelper
{
    static function pre_dump($data)
    {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
    }

    /**
     * Write your result or your message in debug_helper.log
     *
     * @param string|array $data
     * @return void
     */
    static function log_debug($data)
    {
        $timestamp = date("Y-m-d H:i:s");
        $log = $timestamp . " - ";

        switch (gettype($data)) {
            case 'string':
                $log .= $data;
                break;
            case 'array':
                $log .= print_r($data, true);
                break;
            default:
                $log .= $data;
                break;
        }

        $log .= "\n";

        error_log($log, 3, GOA_BOOKING_PLUGIN_PATH . "inc/helpers/debug_helper.log");
    }
}
