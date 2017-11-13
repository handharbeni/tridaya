<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access extends MX_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index($params=null)
  {
    echo modules::run('_template/template/index', $params);
  }
  public function dashboard($params=null)
  {
    echo modules::run('dashboard/', $params);
  }
  public function register($params=null)
	{
    echo modules::run('register/index', $params);
	}
}
