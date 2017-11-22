<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kelurahan extends MX_Controller {
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
    $this->load->view('index');
  }

  public function get_kelurahan_by_id()
  {
    $params = $this->input->post();
    $response = $this->response;
    if(isset($params['id'])) {
      $result = get_kelurahan($params['id'])->row();
      $response = array('status' => 1, 'data' => $result);
    }
    echo json_encode($response);
  }

  function get_datatable(){
    $requestData= $_REQUEST;
    $columns = array( 
      0   =>  'id', 
      1   =>  'nama_provinsi',
      2   =>  'nama_kabkota',
      3   =>  'nama_kecamatan',
      3   =>  'nama_kelurahan',
      4   =>  'aksi'
    );
    $query = get_kelurahan();
    $totalData = $query->num_rows();
    
    $sql = "SELECT m_provinsi.nama_provinsi, m_kabkota.nama_kabkota, m_kecamatan.nama_kecamatan, m_kelurahan.* FROM m_kelurahan "
      ." LEFT JOIN m_kecamatan ON m_kelurahan.kecamatan_id = m_kecamatan.id"
      ." LEFT JOIN m_kabkota ON m_kecamatan.kabkota_id = m_kabkota.id"
      ." LEFT JOIN m_provinsi ON m_kabkota.provinsi_id = m_provinsi.id"
      ." WHERE m_kelurahan.deleted = 0"; 
    if(!empty($requestData['search']['value'])) {
      $sql.=" AND (m_provinsi.nama_provinsi LIKE '%".$requestData['search']['value']."%'"; 
      $sql.=" OR m_kabkota.nama_kabkota LIKE '%".$requestData['search']['value']."%'";
      $sql.=" OR m_kecamatan.nama_kecamatan LIKE '%".$requestData['search']['value']."%'";
      $sql.=" OR m_kelurahan.nama_kelurahan LIKE '%".$requestData['search']['value']."%')";
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
                            .'<p>'.$row["nama_provinsi"].'<p>'
                        .'</div>';
      $tableData[] = '<div class="list-info mrg-top-10">'
                        .'<p>'.$row["nama_kabkota"].'<p>'
                      .'</div>';
      $tableData[] = '<div class="list-info mrg-top-10">'
                        .'<p>'.$row["nama_kecamatan"].'<p>'
                      .'</div>';
      $tableData[] = '<div class="list-info mrg-top-10">'
                        .'<p>'.$row["nama_kelurahan"].'<p>'
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
      $result = $this->model_adm->insert($data_db, 'm_kelurahan');

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
      $result = $this->model_adm->update($condition, $data_db, 'm_kelurahan');

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
      $result = $this->model_adm->update_batch($data_db, 'm_kelurahan', 'id');

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

}
