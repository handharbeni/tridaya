<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access extends MX_Controller {

	public function __construct() {
		parent::__construct();
    $this->config->set_item('modules_location', array( APPPATH.'modules/' => '../modules/', ));
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
      // echo $params.'/'.$params2;
      echo modules::run('m_'.$params.'/'.$params2, $params3);
    }
    else {
      // echo "dashboard";
      redirect('dashboard');
    }
  }
  public function informasi($params=null, $params2='index', $params3=null)
  {
    if($params) {
      echo modules::run('i_'.$params.'/'.$params2);
    }
    else {
      echo modules::run('i_informasi/index');
    }
  }
  public function absensi($params=null, $params2='index', $params3=null)
  {
    if($params) {
      echo modules::run('absensi_'.$params.'/'.$params2);
    }
    else {
      echo modules::run('absensi_guru/index');
    }
  }
  public function sekolah($params=null, $params2='index', $params3=null)
  {
    if($params) {
      echo modules::run('sekolah_'.$params.'/'.$params2, $params3);
    }
    else {
      echo modules::run('sekolah_siswa/index');
    }
  }
  public function privat($params=null, $params2='index', $params3=null)
  {
    if($params) {
      echo modules::run('privat_'.$params.'/'.$params2);
    }
    else {
      echo modules::run('privat_siswa/index');
    }
  }
  public function bimbel($params=null, $params2='index', $params3=null)
  {
    if($params) {
      echo modules::run('bimbel_'.$params.'/'.$params2);
    }
    else {
      echo modules::run('bimbel_siswa/index');
    }
  }
  public function batik($params=null, $params2='index', $params3=null)
  {
    if($params) {
      echo modules::run('batik_'.$params.'/'.$params2);
    }
    else {
      echo modules::run('batik_siswa/index');
    }
  }
  
  public function welkam($params=null, $params2='index', $params3=null)
  {
    if($params) {
      echo modules::run($params.'/'.$params2);
    }
    else {
      echo modules::run('welkam/index');
    }
  }
}
