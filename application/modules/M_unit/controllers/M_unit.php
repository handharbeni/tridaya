<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_unit extends MX_Controller {
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
    $data['list_akun'] = $this->model_adm->select(array('level' => 1), 'm_akun')->result();
    $this->load->view('index', $data);
  }

  private function get_data_list() {
    $sql = "SELECT m_unit.*, m_akun.id AS id_akun, m_akun.nama AS nama_akun, m_provinsi.nama_provinsi, m_kabkota.nama_kabkota FROM m_unit"
      ." LEFT JOIN m_akun ON m_unit.akun_id = m_akun.id" 
      ." LEFT JOIN m_provinsi ON m_unit.provinsi_id = m_provinsi.id" 
      ." LEFT JOIN m_kabkota ON m_unit.kabkota_id = m_kabkota.id" 
      // ." LEFT JOIN m_kecamatan ON m_unit.kecamatan_id = m_kecamatan.id" 
      // ." LEFT JOIN m_kelurahan ON m_unit.kelurahan_id = m_kelurahan.id" 
      ." WHERE m_unit.deleted = '0' ORDER BY m_akun.nama";
      $result = $this->model_adm->rawQuery($sql);
      return $result;
  }
  public function get_unit_by_id()
  {
    $params = $this->input->post();
    $response = $this->response;
    if(isset($params['id'])) {
      $condition = array('id' => $params['id'], 'deleted' => 0);
      $result = $this->model_adm->select($condition, 'm_unit')->row();
      $response = array('status' => 1, 'data' => $result);
    }
    echo json_encode($response);
  }
  public function get_provinsi_by_id()
  {
    $params = $this->input->post();
    $response = $this->response;
    if(isset($params['id'])) {
      $result = get_provinsi($params['id'])->row();
      $response = array('status' => 1, 'data' => $result);
    }
    echo json_encode($response);
  }
  public function get_kecamatan_by_kota()
  {
    $params = $this->input->post();
    $response = $this->response;
    if(isset($params['id'])) {
      $result = get_kecamatan_no_join('', $params['id'])->result();
      $response = array('status' => 1, 'data' => $result);
    }
    echo json_encode($response);
  }
  public function get_kelurahan_by_kecamatan()
  {
    $params = $this->input->post();
    $response = $this->response;
    if(isset($params['id'])) {
      $result = get_kelurahan_no_join('', $params['id'])->result();
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
      $result = $this->model_adm->insert($data_db, 'm_unit');

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
      $result = $this->model_adm->update($condition, $data_db, 'm_unit');

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
      $result = $this->model_adm->update_batch($data_db, 'm_unit', 'id');

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
