<?php

class GoaBookingAgentsModel
{
    private $db;

    public function __construct()
    {
        global $wpdb;
        $this->db = $wpdb;
    }

    /**
     * Get agents from the database
     *
     * If there is something in the database, it will return an object, 
     * if nothing is found in the database, it will return an empty array
     * 
     * @return object|array
     */
    public function get_agents()
    {
        $result = $this->db->get_results("SELECT * FROM " . GOA_BOOKING_TABLE_AGENTS);
        return $result;
    }

    /**
     * Add an agent to the database
     *
     * If the agent was added it will return the number of rows that were added to the database, 
     * if an error occurred it will return false
     * 
     * @param array $data
     * @return int|false
     */
    public function add_agent($data)
    {
        $result = $this->db->insert(GOA_BOOKING_TABLE_AGENTS, $data, '%s');
        return $result;
    }
}
