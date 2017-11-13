<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_siswa extends MX_Controller {
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

	public function index($params=null)
	{
    switch ($params) {
      case 'tambah':
        $this->tambah();
        break;
      
      default:
        $this->load->view('index');
        break;
    }
  }

  public function tambah($params=null)
  {
    $this->load->view('tambah');
  }
}
