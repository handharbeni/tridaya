<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MX_Controller {

	public function __construct() 
  {
      parent::__construct();
  }

	public function index($params=null)
	{
    $data['params'] = $params;
		$this->load->view('index', $data);
	}
}
