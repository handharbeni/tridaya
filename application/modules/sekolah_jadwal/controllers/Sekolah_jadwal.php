<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah_jadwal extends MX_Controller {
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
    $data['list_unit'] = $this->model_adm->select(array('deleted' => 0), 'm_unit')->result();
    $data['list_event'] = $this->get_jadwal_by_month(date('Y-m-d'))->result();
    $this->load->view('index', $data);
  }

  private function get_data_list() {
    $sql = "SELECT m_jadwal_sekolah.* FROM m_jadwal_sekolah"
      // ." WHERE m_jadwal_sekolah.deleted = '0'" 
      ." ORDER BY m_jadwal_sekolah.start_date";
      return $this->model_adm->rawQuery($sql);
  }
  private function get_jadwal_by_month($date='')
  {
    if(empty($date)) { $date = date('Y-m-d'); }
    //Firstly, get the first date from $date. Then get rows where date range between firstdate and lastday
    $sql[] = "SET @firstdate = date_add('".$date."',interval -DAY('".$date."')+1 DAY); ";
    $sql[] = " SELECT m_jadwal_sekolah.* FROM m_jadwal_sekolah"
      // ." WHERE m_jadwal_sekolah.deleted = '0'"
      // ." WHERE start_date >= @firstdate AND start_date <= LAST_DAY('".$date."')"
      // ." AND end_date >= @firstdate AND end_date <= LAST_DAY('".$date."')"
      ." WHERE (start_date BETWEEN @firstdate AND LAST_DAY('".$date."') AND end_date >= @firstdate)"
      ." OR (start_date <= LAST_DAY('".$date."') AND end_date BETWEEN @firstdate AND LAST_DAY('".$date."'))"
      ." ORDER BY m_jadwal_sekolah.start_date";
    return $this->model_adm->rawQueries($sql);
  }
  public function get_jadwal_by_id()
  {
    $params = $this->input->post();
    $response = $this->response;
    if(isset($params['id'])) {
      $condition = array('id' => $params['id'], 'deleted' => 0);
      $result = $this->model_adm->select($condition, 'm_jadwal_sekolah')->row();
      $response = array('status' => 1, 'data' => $result);
    }
    echo json_encode($response);
  }
  public function request_jadwal_by_month()
  {
    $params = $this->input->post();
    $response = $this->response;
    if(isset($params['date']) && !empty($params['date'])) {
      $result = $this->get_jadwal_by_month($params['date'])->result();
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
      $waktu = explode('-', $data_db['waktu']);
      $data_db['start_date'] = date("Y-m-d H:i:s", strtotime($waktu[0]));
      $data_db['end_date'] = date("Y-m-d H:i:s", strtotime($waktu[1]));
      unset($data_db['waktu']);
      $result = $this->model_adm->insert($data_db, 'm_jadwal_sekolah');

      $data = [];
      $message = "Data gagal ditambahkan!";
      if($result) {
        $message = "Data berhasil ditambahkan!";
        $data = $this->get_jadwal_by_month()->result();
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
      $result = $this->model_adm->update($condition, $data_db, 'm_jadwal_sekolah');

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
      $data_db = $params['ids'];
      $result = $this->model_adm->delete_batch($data_db, 'm_jadwal_sekolah', 'id');

      $data = [];
      $message = "Data gagal dihapus!";
      if($result) {
        $message = "Data berhasil dihapus!";
        $data = $this->get_jadwal_by_month()->result();
      }
      $response = array(
        'status' => 1, 'result' => $result, 
        'message' => $message, 'data' => $data);
    }
    echo json_encode($response);
  }
  /*public function do_delete() {
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
      $result = $this->model_adm->update_batch($data_db, 'm_jadwal_sekolah', 'id');

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
  }*/

}
