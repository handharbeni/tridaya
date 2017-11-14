<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends MX_Controller {

	public function __construct() {
		parent::__construct();
	}

  public function index($params=null)
  {
    echo modules::run('m_informasi/index', $params);
  }

  public function info($params=null, $params2=null)
  {
    echo modules::run($params.'/index', $params2);
  }

}
