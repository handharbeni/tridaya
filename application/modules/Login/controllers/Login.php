<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {

	public function __construct() 
  {
      parent::__construct();
  }

	public function index($params=null)
	{
    switch ($params) {
      default:
        $this->load->view('index');
        break;
    }
  }

}
