<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reg_private extends MX_Controller {
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
    $data['list_agama'] = $this->model_adm->select(array('deleted' => 0), 'm_agama')->result();
    $data['list_unit'] = $this->model_adm->select(array('deleted' => 0), 
      'm_unit')->result();
    $data['list_isian'] = $this->model_adm->select(array('deleted' => 0, 'kategori_unit' => 2), 'm_isian_pertanyaan')->result();//kategori_unit (1=Sekolah, 2=Privat, 3=Bimbel, 4=batik)
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
      return $this->model_adm->rawQuery($sql);
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
    $arr_data = [];

    //parsing serialized query string into arrays and save them into $arr_data
    foreach ($params['arr_data'] as $key => $param) {
      parse_str($param, $arr_data[$key]);
    }
    /*print("<pre>".urldecode(print_r($arr_data, true))."</pre>"); 
    die();*/
    
    if(!empty($arr_data['siswa'])) {
      $result = []; //for debugging purpose
      //INSERTING DATA SISWA
      $data_db = $arr_data['siswa'];
      $id_siswa = $this->model_adm->insert_id($data_db, 'm_siswa_private');
      $results['siswa'] = $id_siswa;

      $data = [];
      $message = "Data gagal ditambahkan!";
      if($id_siswa) {
        
        $data_db = [];
        //PREPARING DATA AYAH/WALI
        if(!empty($arr_data['ayah']['nama_lengkap'])){
          $data_ayah = $arr_data['ayah'];
          $data_ayah['peran'] = 1; //1=ayah, 2=ibu, 3=wali
          $data_ayah['siswa_id'] = $id_siswa;
          $data_db[] = $data_ayah;
        }
        //PREPARING DATA IBU
        if(!empty($arr_data['ibu']['nama_lengkap'])){
          $data_ibu = $arr_data['ibu'];
          $data_ibu['peran'] = 2; //1=ayah, 2=ibu, 3=wali
          $data_ibu['siswa_id'] = $id_siswa;
          $data_db[] = $data_ibu;
        }
        //INSERTING DATA ORANG TUA
        $result = $this->model_adm->insert_batch($data_db, 'm_orangtua_private');
        $results['ortu'] = $result;

        //PREPARING DATA NILAI
        if(!empty($arr_data['nilai'])){
          $data_db = $arr_data['nilai'];
          //PREPARING NAMA_MAPEL & NILAI MAPEL
          $data_nilai = [];
          foreach ($data_db['nama_mapel'] as $key => $mapel) {
            $data_nilai[$mapel] = $data_db['nilai_mapel'][$key];
          }
          unset($data_db['nama_mapel']);
          //INSERTING DATA NILAI
          $data_db['siswa_id'] = $id_siswa;
          $data_db['nilai_mapel'] = json_encode($data_nilai);
          $result = $this->model_adm->insert($data_db, 'reg_nilai_private');
          $results['nilai'] = $result;
        }

        //PREPARING DATA ISIAN
        if(!empty($arr_data['isian'])){
          $data_db = $arr_data['isian'];
          //preparing array pertanyaan & jawaban
          $pertanyaan = []; $jawaban = [];
          foreach ($data_db as $key => $isian) {
            $id_pertanyaan = str_replace('jawaban-', '', $key);
            $pertanyaan[] = $id_pertanyaan;
            $jawaban[$id_pertanyaan] = $isian;
          }
          //preparing JSON pertanyaan & jawaban
          $data_db = array(
            'siswa_id' => $id_siswa,
            'pertanyaan' => json_encode($pertanyaan),
            'jawaban' => json_encode($jawaban)
          );
          //INSERTING DATA ISIAN
          $result = $this->model_adm->insert($data_db, 'm_isian_private');
          $results['isian'] = $result;
        }

        $message = "Data berhasil ditambahkan!";
        $data = $results;
        // $data = $this->get_data_list()->result();
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
