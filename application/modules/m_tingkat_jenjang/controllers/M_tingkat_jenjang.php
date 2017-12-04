<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tingkat_jenjang extends MX_Controller {
  //Global variable
  var $data;
  private $response;

	public function __construct() 
  {
      parent::__construct();
      $this->response = array( 'status' => 0 );
      $this->data = array(
        '_header'        => Modules::run('template/header'),
        '_footer'        => Modules::run('template/footer'),
        '_sidebar_left'  => Modules::run('template/sidebar_left'),
        '_sidebar_right' => Modules::run('template/sidebar_right'),
        '_theme_config'  => Modules::run('template/theme_config')
      );
      $this->load->vars($this->data);
      $this->load->model('model_adm');
      // $this->data can be accessed from anywhere in the controller.
  }

	public function index($params=null)
	{
    $data['list'] = $this->get_data_list()->result();
    $data['list_jenjang'] = $this->model_adm->select(array('deleted' => 0), 'm_jenjang')->result();
    $this->load->view('index', $data);
  }

  private function get_data_list($id=null)
  {
    $sql = "SELECT m_jenjang_tingkat.*, m_jenjang.nama AS nama_jenjang, m_jenjang.alias AS alias_jenjang FROM m_jenjang_tingkat"
      ." LEFT JOIN m_jenjang ON m_jenjang_tingkat.jenjang_id = m_jenjang.id" 
      ." WHERE m_jenjang_tingkat.deleted = '0'"
      ." AND m_jenjang_tingkat.id != '0'";
      if($id) { $sql .= " AND m_jenjang_tingkat.id = ".$id; }
    $sql .= " ORDER BY m_jenjang_tingkat.nama";
    return $this->model_adm->rawQuery($sql);
  }
  public function get_tingkat_jenjang_by_id()
  {
    $params = $this->input->post();
    $response = $this->response;
    if(isset($params['id'])) {
      $condition = array(
        'deleted' => 0, 
        'id' => $params['id']
      );
      $result = $this->model_adm->select($condition, 'm_jenjang_tingkat')->row();
      $response = array('status' => 1, 'data' => $result);
    }
    echo json_encode($response);
  }

  public function do_add() {
    $response = $this->response;
    $params = $this->input->post();
    // print_r($params); die();
    if(!empty($params)) {
      $data_db = $params;
      if(isset($data_db['id'])) { unset($data_db['id']); }
      $result = $this->model_adm->insert($data_db, 'm_jenjang_tingkat');

      $data = [];
      $message = "Data gagal ditambahkan!";
      if($result) {
        $message = "Data berhasil ditambahkan!";
        $data = $this->get_data_list()->result();
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
    // print_r($params); die();
    if(!empty($params['id'])) {
      $condition = array( 
                    'id' => $params['id'] 
                  );
      $data_db = $params;
      $data_db['timestamp'] = date("Y-m-d H:i:s");
      unset($data_db['id']);
      $result = $this->model_adm->update($condition, $data_db, 'm_jenjang_tingkat');

      $data = [];
      $message = "Data gagal diubah!";
      if($result) {
        $message = "Data berhasil diubah!";
        $data = $this->get_data_list()->result();
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
    // print_r($params); die();
    if(!empty($params['ids'])) {
      $data_db = [];
      foreach ($params['ids'] as $id) {
        $data_db[] = array(
                'id' => $id,
                'deleted' => 1,
                'timestamp' => date("Y-m-d H:i:s")
        );
      }
      $result = $this->model_adm->update_batch($data_db, 'm_jenjang_tingkat', 'id');

      $data = [];
      $message = "Data gagal dihapus!";
      if($result) {
        $message = "Data berhasil dihapus!";
        $data = $this->get_data_list()->result();
      }
      $response = array(
        'status' => 1, 'result' => $result, 
        'message' => $message, 'data' => $data);
    }
    echo json_encode($response);
  }

}