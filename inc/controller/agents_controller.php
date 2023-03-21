<?php

class GoaBookingAgentsController
{
  private $model;

  public function __construct()
  {
    $this->model = new GoaBookingAgentsModel();
  }

  /**
   * Get agents object
   *
   * If there were no agents in the table, or it was not possible to find them, 
   * the function will return false, if the agents were found, the function will return an object
   * 
   * @return null|object
   */
  public function get_agents()
  {
    $agents = $this->model->get_agents();

    if (empty($agents)) {
      return null;
    } else {
      return $agents;
    }
  }

  public function add_agent($data)
  {
    GoaBookingDebugHelper::log_debug($data);
    wp_die();
  }
}
