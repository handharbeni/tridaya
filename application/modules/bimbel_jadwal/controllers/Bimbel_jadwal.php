<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bimbel_jadwal extends MX_Controller {
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
    $data['list'] = $this->get_data_list()->result();
    $data['list_unit'] = $this->model_adm->select(array('deleted' => 0), 'm_unit')->result();
    $data['list_jenjang'] = $this->model_adm->select(array('deleted' => 0), 'm_jenjang')->result();
    $data['list_tingkat'] = $this->model_adm->select(array('deleted' => 0), 'm_jenjang_tingkat')->result();
    $data['list_mapel'] = $this->model_adm->select(array('deleted' => 0), 'm_mapel')->result();
    $data['list_hari'] = $this->model_adm->select(array('deleted' => 0), 'm_hari')->result();
    $this->load->view('index', $data);
  }

  private function get_data_list() {
    $sql = "SELECT m_jadwal_bimbel.*, m_unit.id AS id_unit, m_unit.nama AS nama_unit, m_hari.nama AS nama_hari, m_mapel.nama AS nama_mapel, m_jenjang.alias AS alias_jenjang, m_jenjang.nama AS nama_jenjang, m_jenjang_tingkat.nama AS nama_tingkat FROM m_jadwal_bimbel"
      ." LEFT JOIN m_unit ON m_jadwal_bimbel.unit_id = m_unit.id" 
      ." LEFT JOIN m_hari ON m_jadwal_bimbel.hari_id = m_hari.id" 
      ." LEFT JOIN m_mapel ON m_jadwal_bimbel.mapel_id = m_mapel.id" 
      ." LEFT JOIN m_jenjang ON m_jadwal_bimbel.jenjang_id = m_jenjang.id" 
      ." LEFT JOIN m_jenjang_tingkat ON m_jadwal_bimbel.tingkat_id = m_jenjang_tingkat.id" 
      ." WHERE m_jadwal_bimbel.deleted = '0' ORDER BY m_hari.urutan";
      return $this->model_adm->rawQuery($sql);
  }
  public function get_jadwal_by_id()
  {
    $params = $this->input->post();
    $response = $this->response;
    if(isset($params['id'])) {
      $condition = array('id' => $params['id'], 'deleted' => 0);
      $result = $this->model_adm->select($condition, 'm_jadwal_bimbel')->row();
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
      $result = $this->model_adm->insert($data_db, 'm_jadwal_bimbel');

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
      $result = $this->model_adm->update($condition, $data_db, 'm_jadwal_bimbel');

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
      $result = $this->model_adm->update_batch($data_db, 'm_jadwal_bimbel', 'id');

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
