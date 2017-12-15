<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Privat_guru extends MX_Controller {
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
      $this->load->helper('wilayah_helper');
      $this->load->model('model_adm');
      // $this->data can be accessed from anywhere in the controller.
  }

	public function index($params=null)
	{
    $data['list_agama'] = $this->model_adm->select(array('deleted' => 0), 'm_agama')->result();
    $data['list_unit'] = $this->model_adm->select(array('deleted' => 0), 
      'm_unit')->result();
    $this->load->view('index', $data);
  }

  private function get_data_list($id=null)
  {
    $sql = "SELECT m_guru_private.*, m_agama.nama AS nama_agama, m_unit.nama AS nama_unit FROM m_guru_private"
      ." LEFT JOIN m_unit ON m_guru_private.unit_id = m_unit.id" 
      ." LEFT JOIN m_agama ON m_guru_private.agama_id = m_agama.id" 
      ." WHERE m_guru_private.deleted = '0'";
      if($id) { $sql .= " AND m_guru_private.id = ".$id; }
    $sql .= " ORDER BY m_guru_private.timestamp DESC";
    return $this->model_adm->rawQuery($sql);
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
  public function get_guru_by_id()
  {
    $params = $this->input->post();
    $response = $this->response;
    if(isset($params['id'])) {
      $condition = array(
        'deleted' => 0, 
        'id' => $params['id']
      );
      $result = $this->model_adm->select($condition, 'm_guru_private')->row();
      $response = array('status' => 1, 'data' => $result);
    }
    echo json_encode($response);
  }
  
  function get_datatable(){
    $requestData= $_REQUEST;
    $columns = array( 
      0   =>  'id', 
      1   =>  'unit_id',
      2   =>  'nama_lengkap',
      3   =>  'tanggal_lahir',
      4   =>  'alamat',
      5   =>  'email',
      6   =>  'no_telp',
      7   =>  'aksi'
    );
    $query = $this->get_data_list();
    $totalData = $query->num_rows();
    
    $sql = "SELECT m_guru_private.*, m_unit.nama AS nama_unit, m_agama.nama AS nama_agama FROM m_guru_private "
      ." LEFT JOIN m_unit ON m_guru_private.unit_id = m_unit.id "
      ." LEFT JOIN m_agama ON m_guru_private.agama_id = m_agama.id "
      ." WHERE m_guru_private.deleted = 0";
    if(!empty($requestData['search']['value'])) {
      $sql.=" AND (m_guru_private.nama_lengkap LIKE '%".$requestData['search']['value']."%'"; 
      $sql.=" OR m_unit.nama LIKE '%".$requestData['search']['value']."%'";
      $sql.=" OR m_guru_private.tempat_lahir LIKE '%".$requestData['search']['value']."%'";
      $sql.=" OR m_guru_private.tanggal_lahir LIKE '%".$requestData['search']['value']."%'";
      $sql.=" OR m_guru_private.alamat LIKE '%".$requestData['search']['value']."%'";
      $sql.=" OR m_guru_private.no_telp LIKE '%".$requestData['search']['value']."%'";
      $sql.=" OR m_guru_private.no_hp LIKE '%".$requestData['search']['value']."%')";
    }
    $query = $this->model_adm->rawQuery($sql);
    $totalFiltered = $query->num_rows();

    $sql .= " ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']." "; 
    $query = $this->model_adm->rawQuery($sql);

    $data = array(); $i=0;
    foreach ($query->result_array() as $row) {
      $tableData   = array(); 
      $tableData[] = '<div class="checkbox mrg-left-20">'
                      .'<i style="display:none">'.$row["id"].'</i>'
                      .'<input id="task-'.$row["id"].'" value="'.$row["id"].'" name="task[]" type="checkbox">'
                        .'<label for="task-'.$row["id"].'"></label>'
                    .'</div>';
      $tableData[] = '<div class="list-info mrg-top-10">'
                        .'<p>'.$row["nama_unit"].'</p>'
                        .'</div>';
      $tableData[] = '<div class="list-info mrg-top-10">'
                        .'<p>'.$row["nama_lengkap"].'</p>'
                        .'</div>';
      $tableData[] = '<div class="list-info mrg-top-10">'
                        .'<p>'.$row["tempat_lahir"].', '
                        .date("d-m-Y", strtotime($row["tanggal_lahir"])).'</p>'
                      .'</div>';
      $tableData[] = '<div class="list-info mrg-top-10">'
                        .'<p>'.$row["alamat"].'</p>'
                      .'</div>';
      $tableData[] = '<div class="list-info mrg-top-10">'
                        .'<p>'.$row["email"].'</p>'
                      .'</div>';
      $tableData[] = '<div class="list-info mrg-top-10">'
                        .'<p>'.$row["no_telp"].'<br>'.$row["no_hp"].'</p>'
                      .'</div>';
      $tableData[] = '<div class="relative mrg-top-10">'
                      .'<div class="btn-group">'
                        .'<a href="javascript:void(0);" class="btn btn-default edit-notif" data-id="'.$row["id"].'" onclick="showModalForm(event);" title="Ubah data"> <i class="ti-pencil-alt"></i> </a>'
                        .'<a href="" class="btn btn-default text-danger delete-notif" data-id="'.$row["id"].'" onclick="prepDelete(event);" title="Hapus data"> <i class="ti-trash"></i> </a>'
                      .'</div>'
                    .'</div>';
      $data[] = $tableData; $i++;
    }
    $totalData = count($data);
    $json_data = array(
      "draw"            => intval( $requestData['draw'] ),
      "recordsTotal"    => intval( $totalData ),
      "recordsFiltered" => intval( $totalFiltered ),
      "data"            => $data
    );
    echo json_encode($json_data);
  }

  public function do_add() {
    $response = $this->response;
    $params = $this->input->post();
    // print_r($params); die();
    if(!empty($params)) {
      $data_db = $params;
      if(isset($data_db['id'])) { unset($data_db['id']); }
      $result = $this->model_adm->insert($data_db, 'm_guru_private');

      $data = [];
      $message = "Data gagal ditambahkan!";
      if($result) {
        $message = "Data berhasil ditambahkan!";
        // $data = get_kelurahan()->result();
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
      unset($data_db['idSiswa']);
      $result = $this->model_adm->update($condition, $data_db, 'm_guru_private');

      $data = [];
      $message = "Data gagal diubah!";
      if($result) {
        $message = "Data berhasil diubah!";
        // $data = get_kelurahan()->result();
      }
      $response = array(
        'status' => 1, 'result' => $result, 
        'message' => $message, 'data' => $data);
    }
    echo json_encode($response);
  }
  public function do_edit_ortu() {
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
      unset($data_db['idSiswa']);
      $result = $this->model_adm->update($condition, $data_db, 'm_orangtua_bimbel');

      $data = [];
      $message = "Data gagal diubah!";
      if($result) {
        $message = "Data berhasil diubah!";
        $data = $this->get_data_list_ortu('', $params['idSiswa'])->result();
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
      $result = $this->model_adm->update_batch($data_db, 'm_guru_private', 'id');

      $data = [];
      $message = "Data gagal dihapus!";
      if($result) {
        $message = "Data berhasil dihapus!";
        // $data = get_kelurahan()->result();
      }
      $response = array(
        'status' => 1, 'result' => $result, 
        'message' => $message, 'data' => $data);
    }
    echo json_encode($response);
  }
  public function do_delete_ortu() {
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
      $result = $this->model_adm->update_batch($data_db, 'm_orangtua_bimbel', 'id');

      $data = [];
      $message = "Data gagal dihapus!";
      if($result) {
        $message = "Data berhasil dihapus!";
        $data = $this->get_data_list_ortu('', $params['idSiswa'])->result();
      }
      $response = array(
        'status' => 1, 'result' => $result, 
        'message' => $message, 'data' => $data);
    }
    echo json_encode($response);
  }

}
