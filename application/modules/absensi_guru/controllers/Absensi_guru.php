<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi_guru extends MX_Controller {
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
    $data['list_unit'] = $this->model_adm->select(array('deleted' => 0), 
      'm_unit')->result();
    $this->load->view('index', $data);
  }

  private function get_data_list($id=null)
  {
    //kategori_id = [1: Sekolah, 2: Private, 3: Bimbel, 4:Batik]
    $sql = "SELECT absensi_guru.*, m_unit_kategori.nama AS nama_kategori_unit,m_unit.nama AS nama_unit,
      CASE 
       WHEN absensi_guru.kategori_id = 1 THEN m_guru_sekolah.nama_lengkap
       WHEN absensi_guru.kategori_id = 2 THEN m_guru_private.nama_lengkap
       WHEN absensi_guru.kategori_id = 3 THEN m_guru_bimbel.nama_lengkap 
       WHEN absensi_guru.kategori_id = 4 THEN m_guru_batik.nama_lengkap 
      END AS nama_guru
      FROM absensi_guru
       LEFT JOIN m_unit ON absensi_guru.unit_id = m_unit.id
       LEFT JOIN m_unit_kategori ON absensi_guru.kategori_id = m_unit_kategori.id
       LEFT OUTER JOIN m_guru_sekolah ON absensi_guru.guru_id = m_guru_sekolah.id
       LEFT OUTER JOIN m_guru_private ON absensi_guru.guru_id = m_guru_private.id
       LEFT OUTER JOIN m_guru_bimbel ON absensi_guru.guru_id = m_guru_bimbel.id
       LEFT OUTER JOIN m_guru_batik ON absensi_guru.guru_id = m_guru_batik.id
      WHERE
       absensi_guru.deleted = '0' AND 
       (absensi_guru.kategori_id = 1 and m_guru_sekolah.id IS NOT null) OR
       (absensi_guru.kategori_id = 2 and m_guru_private.id IS NOT null) OR
       (absensi_guru.kategori_id = 3 and m_guru_bimbel.id IS NOT null) OR
       (absensi_guru.kategori_id = 4 and m_guru_batik.id IS NOT null)";
    if($id) { $sql .= " AND absensi_guru.id = ".$id; }
    $sql .= " ORDER BY absensi_guru.start DESC";
    return $this->model_adm->rawQuery($sql);
  }

  function test() {
    print("<pre>".print_r($this->get_data_list()->result(), true)."</pre>");
  }

  function get_datatable(){
    $requestData= $_REQUEST;
    $columns = array( 
      0   =>  'id', 
      1   =>  'nama_unit',
      2   =>  'nama_kategori_unit',
      3   =>  'nama_guru',
      4   =>  'start',
      5   =>  'end',
      6   =>  'tempat',
    );
    $query = $this->get_data_list();
    $totalData = $query->num_rows();
    
    $sql = "SELECT absensi_guru.*, m_unit_kategori.nama AS nama_kategori_unit,m_unit.nama AS nama_unit, 
      CASE 
       WHEN absensi_guru.kategori_id = 1 THEN m_guru_sekolah.nama_lengkap
       WHEN absensi_guru.kategori_id = 2 THEN m_guru_private.nama_lengkap
       WHEN absensi_guru.kategori_id = 3 THEN m_guru_bimbel.nama_lengkap 
       WHEN absensi_guru.kategori_id = 4 THEN m_guru_batik.nama_lengkap 
      END AS nama_guru
      FROM absensi_guru
       LEFT JOIN m_unit ON absensi_guru.unit_id = m_unit.id
       LEFT JOIN m_unit_kategori ON absensi_guru.kategori_id = m_unit_kategori.id
       LEFT OUTER JOIN m_guru_sekolah ON absensi_guru.guru_id = m_guru_sekolah.id
       LEFT OUTER JOIN m_guru_private ON absensi_guru.guru_id = m_guru_private.id
       LEFT OUTER JOIN m_guru_bimbel ON absensi_guru.guru_id = m_guru_bimbel.id
       LEFT OUTER JOIN m_guru_batik ON absensi_guru.guru_id = m_guru_batik.id
      WHERE
       absensi_guru.deleted = '0' AND 
       (absensi_guru.kategori_id = 1 and m_guru_sekolah.id IS NOT null) OR
       (absensi_guru.kategori_id = 2 and m_guru_private.id IS NOT null) OR
       (absensi_guru.kategori_id = 3 and m_guru_bimbel.id IS NOT null) OR
       (absensi_guru.kategori_id = 4 and m_guru_batik.id IS NOT null)";
    if(!empty($requestData['search']['value'])) {
      $sql.=" AND (absensi_guru.tempat LIKE '%".$requestData['search']['value']."%'"; 
      $sql.=" OR absensi_guru.waktu LIKE '%".$requestData['search']['value']."%'";
      $sql.=" OR m_unit.nama LIKE '%".$requestData['search']['value']."%'";
      $sql.=" OR m_unit_kategori.nama LIKE '%".$requestData['search']['value']."%'";
      $sql.=" OR m_guru.nama_lengkap LIKE '%".$requestData['search']['value']."%')";
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
                        .'<p>'.ucfirst($row["nama_kategori_unit"]).'</p>'
                        .'</div>';
      $tableData[] = '<div class="list-info mrg-top-10">'
                        .'<p>'.$row["nama_guru"].'</p>'
                        .'</div>';
      $tableData[] = '<div class="list-info mrg-top-10">'
                        .'<p>'.date("d/m/Y H:i", strtotime($row["start"])).'</p>'
                      .'</div>';
      $tableData[] = '<div class="list-info mrg-top-10">'
                        .'<p>'.date("d/m/Y H:i", strtotime($row["end"])).'</p>'
                      .'</div>';
      $tableData[] = '<div class="list-info mrg-top-10">'
                        .'<p>'.$row["tempat"].'</p>'
                      .'</div>';
/*      $tableData[] = '<div class="relative mrg-top-10">'
                      .'<div class="btn-group">'
                        .'<a href="javascript:void(0);" class="btn btn-default edit-notif" data-id="'.$row["id"].'" onclick="showModalForm(event);" title="Ubah data"> <i class="ti-pencil-alt"></i> </a>'
                        .'<a href="" class="btn btn-default text-danger delete-notif" data-id="'.$row["id"].'" onclick="prepDelete(event);" title="Hapus data"> <i class="ti-trash"></i> </a>'
                      .'</div>'
                    .'</div>';*/
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
      $result = $this->model_adm->insert($data_db, 'absensi_guru');

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
      $result = $this->model_adm->update($condition, $data_db, 'absensi_guru');

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
      $result = $this->model_adm->update_batch($data_db, 'absensi_guru', 'id');

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
