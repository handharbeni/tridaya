<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {
  //Global variable
  var $data;

	public function __construct() 
  {
      parent::__construct();
      $this->data = array(
        '_header'        => Modules::run('template/header'),
        '_sidebar_left'  => Modules::run('template/sidebar_left'),
        '_sidebar_right' => Modules::run('template/sidebar_right'),
        '_theme_config'  => Modules::run('template/theme_config')
      );
      $this->load->vars($this->data);
      // $this->data can be accessed from anywhere in the controller.
  }

  public function index()
  {
		$this->load->view('index');
	}
}
