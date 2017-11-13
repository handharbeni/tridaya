<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MX_Controller {

	public function __construct() 
  {
      parent::__construct();
  }

	public function index()
  {
    $this->load->view('index');
  }
  public function sidebar_left()
  {
    $this->load->view('sidebar_left');
  }
  public function sidebar_right()
  {
    $this->load->view('sidebar_right');
  }
  public function header()
  {
    $this->load->view('header');
  }
  public function theme_config()
	{
		$this->load->view('theme_config');
	}
}
