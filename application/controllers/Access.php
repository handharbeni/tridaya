<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access extends MX_Controller {

	public function __construct() {
		parent::__construct();
	}

  public function index($params=null, $params2='index', $params3=null)
  {
    echo "nandi?";
  }

  public function dashboard($params=null, $params2='index', $params3=null)
  {
    echo modules::run('dashboard/index');
  }
  public function master($params=null, $params2='index', $params3=null)
  {
    // $segment = $this->uri->segment_array();
    // print_r($this->uri->ruri_string());
    /*echo $this->router->fetch_class();
    echo $this->router->fetch_method();
    print_r($segment);
    die();*/
    if($params) {
      echo modules::run('m_'.$params.'/'.$params2);
    }
    else {
      redirect('dashboard');
    }
  }
  public function informasi($params=null, $params2='index', $params3=null)
  {
    if($params) {
      echo modules::run('m_'.$params.'/'.$params2);
    }
    else {
      echo modules::run('m_informasi/index');
    }
  }
}
