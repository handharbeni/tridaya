<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jenjang extends MX_Controller {
  //Global variable
  var $data;
  private $response;

	public function __construct() 
  {
      parent::__construct();
      $this->response = Array( 'status' => 0 );
      $this->data = array(
        '_header'        => Modules::run('template/header'),
        '_footer'        => Modules::run('template/footer'),
        '_sidebar_left'  => Modules::run('template/sidebar_left'),
        '_sidebar_right' => Modules::run('template/sidebar_right'),
        '_theme_config'  => Modules::run('template/theme_config')
      );
      $this->load->vars($this->data);
      $this->load->helper('wilayah_helper');
      $this->load->model('model_adm');
      // $this->data can be accessed from anywhere in the controller.
  }

	public function index($params=null)
	{
    $data['list'] = $this->get_data_list();
    $this->load->view('index', $data);
  }

  private function get_data_list($id=null)
  {
    $condition['deleted'] = 0;
    $condition['id !='] = "0";
    if($id) { $condition['id'] = $id; }
    $data_jenjang = $this->model_adm->select($condition, 'm_jenjang');

    if(!empty($data_jenjang->num_rows())) {
      $data_jenjang = $data_jenjang->result();
      $data_tingkat = $this->get_tingkat_jenjang()->result();
      $join_tingkat = [];

      //get data tingkat_jenjang by id_jenjang then push it into array data_jenjang as tingkat_jenjang field
      foreach ($data_jenjang as $key => $jenjang) {
        foreach ($data_tingkat as $key2 => $tingkat) {
          if($jenjang->id == $tingkat->jenjang_id) {
            $join_tingkat[$key][] = $tingkat->nama;
          }
        }
        $data_jenjang[$key]->tingkat_jenjang = join(", ", $join_tingkat[$key]);
      }
    }
    return $data_jenjang;
  }
  public function get_jenjang_by_id()
  {
    $params = $this->input->post();
    $response = $this->response;
    if(isset($params['id'])) {
      $condition = array(
          'deleted' => 0,
          'id' => $params['id']
      );
      $result = $this->model_adm->select($condition, 'm_jenjang')->row();
      $response = array('status' => 1, 'data' => $result);
    }
    echo json_encode($response);
  }
  private function get_tingkat_jenjang($id=null)
  {
    $condition['deleted'] = 0;
    $condition['id !='] = "0";
    if($id) { $condition['id'] = $id; }
    return $this->model_adm->select($condition, 'm_jenjang_tingkat');
  }

  public function do_add() {
    $response = $this->response;
    $params = $this->input->post();
    if(!empty($params)) {
      $data_db = $params;
      $result = $this->model_adm->insert($data_db, 'm_jenjang');

      $data = [];
      $message = "Data gagal ditambahkan!";
      if($result) {
        $message = "Data berhasil ditambahkan!";
        $data = $this->get_data_list();
      }
      $response = array(
        'status' => 1, 'result' => $result, 
        'message' => $message, 'data' => $data);
    }
    echo json_encode($response);
  }

  public function do_edit() {
    $response = $this->response;
    $params = $this->input->post();
    if(!empty($params['id'])) {
      $condition = array( 
                    'id' => $params['id'] 
                  );
      $data_db = $params;
      $data_db['timestamp'] = date("Y-m-d H:i:s");
      unset($data_db['id']);
      $result = $this->model_adm->update($condition, $data_db, 'm_jenjang');

      $data = [];
      $message = "Data gagal diubah!";
      if($result) {
        $message = "Data berhasil diubah!";
        $data = $this->get_data_list();
      }
      $response = array(
        'status' => 1, 'result' => $result, 
        'message' => $message, 'data' => $data);
    }
    echo json_encode($response);
  }

  public function do_delete() {
    $response = $this->response;
    $params = $this->input->post();
    if(!empty($params['ids'])) {
      $data_db = [];
      foreach ($params['ids'] as $id) {
        $data_db[] = array(
                'id' => $id,
                'deleted' => 1,
                'timestamp' => date("Y-m-d H:i:s")
        );
      }
      $result = $this->model_adm->update_batch($data_db, 'm_jenjang', 'id');

      $data = [];
      $message = "Data gagal dihapus!";
      if($result) {
        $message = "Data berhasil dihapus!";
        $data = $this->get_data_list();
      }
      $response = array(
        'status' => 1, 'result' => $result, 
        'message' => $message, 'data' => $data);
    }
    echo json_encode($response);
  }

}
