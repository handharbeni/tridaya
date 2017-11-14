<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_provinsi extends MX_Controller {
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
      $this->load->helper('wilayah_helper');
      // $this->data can be accessed from anywhere in the controller.
  }

	public function index($params=null)
	{
    switch ($params) {
      case 'tambah':
        $this->tambah();
        break;

      case 'get_provinsi_by_id':
        get_provinsi_by_id();
        break;
      
      default:
        $this->load->view('index');
        break;
    }
  }

  public function get_provinsi_by_id()
  {
    $params = $this->input->post();
    $response = array('status' => 0);
    if(isset($params['id'])) {
      $result = get_provinsi($params['id'])->row();
      $response = array('status' => 1, 'data' => $result);
    }
    echo json_encode($response);
  }
}
