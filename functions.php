<?php

function goa_booking_get_agents()
{
    $agents = new GoaBookingAgentsController();
    return $agents->get_agents();
}

function goa_booking_template_part($template_name, $data = array())
{
    $template_path = GOA_BOOKING_PLUGIN_PATH . 'templates/' . $template_name . '.php';

    if (file_exists($template_path)) {
        ob_start();
        include($template_path);
        $html = ob_get_clean();
        return $html;
    } else {
        return 'File not found';
    }
}
