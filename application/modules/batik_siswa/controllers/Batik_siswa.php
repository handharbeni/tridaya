<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Batik_siswa extends MX_Controller {
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
    $sql = "SELECT m_siswa_batik.* FROM m_siswa_batik"
      ." WHERE m_siswa_batik.deleted = '0'";
      if($id) { $sql .= " AND m_siswa_batik.id = ".$id; }
    $sql .= " ORDER BY m_siswa_batik.timestamp DESC";
    return $this->model_adm->rawQuery($sql);
  }
  public function get_data_list_ortu($id=null, $siswa_id=null)
  {
    $sql = "SELECT m_orangtua_batik.* FROM m_orangtua_batik"
      ." WHERE m_orangtua_batik.deleted = '0'";
      if($id) { $sql .= " AND m_orangtua_batik.id = ".$id; }
      if($siswa_id) { $sql .= " AND m_orangtua_batik.siswa_id = ".$siswa_id; }
    $sql .= " ORDER BY m_orangtua_batik.timestamp DESC";
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
  public function get_siswa_by_id()
  {
    $params = $this->input->post();
    $response = $this->response;
    if(isset($params['id'])) {
      $condition = array(
        'deleted' => 0, 
        'id' => $params['id']
      );
      $result = $this->model_adm->select($condition, 'm_siswa_batik')->row();
      $response = array('status' => 1, 'data' => $result);
    }
    echo json_encode($response);
  }
  public function get_ortu_by_id()
  {
    $params = $this->input->post();
    $response = $this->response;
    $condition = []; $join = [];
    if(isset($params['id'])) {
      $condition['m_orangtua_batik.id'] = $params['id'];
    }
    if(isset($params['siswa_id'])) {
      $condition['m_orangtua_batik.siswa_id'] = $params['siswa_id'];
    }
    if(!empty($condition)) {
      $select = 'm_orangtua_batik.*';
      // $join[] = ['m_agama', 'm_agama.id = m_orangtua_batik.agama_id', 'left'];
      $condition['m_orangtua_batik.deleted'] = 0;

      $result = $this->model_adm->select_join($condition, 'm_orangtua_batik', $select, $join)->result();
      $response = array('status' => 1, 'data' => $result);
    }
    // print('<pre>'.print_r($response, true).'</pre>');
    echo json_encode($response);
  }
  public function get_jadwal_by_id()
  {
    $params = $this->input->post();
    $response = $this->response;
    $condition = [];
    if(isset($params['id'])) {
      $condition['id'] = $params['id'];
    }
    if(isset($params['siswa_id'])) {
      $condition['siswa_id'] = $params['siswa_id'];
    }
    if(!empty($condition)) {
      //First, get nilai
      $data_nilai = $this->model_adm->select($condition, 'reg_jadwal_batik')->row();
      $response = array('status' => 1, 'data' => $data_nilai);
    }
    // print('<pre>'.print_r($response, true).'</pre>');
    echo json_encode($response);
  }
  public function get_isian_by_id()
  {
    $params = $this->input->post();
    $response = $this->response;
    $condition = [];
    if(isset($params['id'])) {
      $condition['id'] = $params['id'];
    }
    if(isset($params['siswa_id'])) {
      $condition['siswa_id'] = $params['siswa_id'];
    }
    if(!empty($condition)) {
      //First, get pertanyaan keehatan
      $pertanyaan = $this->model_adm->select(array('deleted'=>0, 'kategori_unit'=>4), 'm_isian_pertanyaan')->result();//kategori_unit (1=Sekolah, 2=Privat, 3=Bimbel, 4=batik)
      $jawaban = $this->model_adm->select($condition, 'm_isian_batik')->row();

      $data_isian = [];
      if(!empty($jawaban)) {
        $arr_jawaban = json_decode($jawaban->jawaban);
        foreach ($arr_jawaban as $key_jawab => $jawab) {
          foreach ($pertanyaan as $key_tanya => $tanya) {
            if($key_jawab == $tanya->id) {
              $data_isian['isi_'.$tanya->id] = array(
                      'id_pertanyaan' => $tanya->id,
                      'pertanyaan' => (!empty($tanya->pertanyaan_lanjutan) ? $tanya->pertanyaan.' ('.$tanya->pertanyaan_lanjutan.')' : $tanya->pertanyaan),
                      'jawaban' => (!empty($jawab) ? $jawab : '-')
                    );
            }
          }
        }
      }
      $response = array('status' => 1, 'data' => $data_isian);
    }
    // print('<pre>'.print_r($response, true).'</pre>');
    echo json_encode($response);
  }
  
  function get_datatable(){
    $requestData= $_REQUEST;
    $columns = array( 
      0   =>  'id', 
      1   =>  'nama_lengkap',
      2   =>  'kelas',
      3   =>  'tanggal_lahir',
      4   =>  'no_telp',
      5   =>  'aksi'
    );
    $query = $this->get_data_list();
    $totalData = $query->num_rows();
    
    $sql = "SELECT m_siswa_batik.* FROM m_siswa_batik "
      ." WHERE m_siswa_batik.deleted = 0"; 
    if(!empty($requestData['search']['value'])) {
      $sql.=" AND (m_siswa_batik.nama_lengkap LIKE '%".$requestData['search']['value']."%'"; 
      $sql.=" OR m_siswa_batik.tempat_lahir LIKE '%".$requestData['search']['value']."%'";
      $sql.=" OR m_siswa_batik.tanggal_lahir LIKE '%".$requestData['search']['value']."%'";
      $sql.=" OR m_siswa_batik.no_telp LIKE '%".$requestData['search']['value']."%'";
      $sql.=" OR m_siswa_batik.no_hp LIKE '%".$requestData['search']['value']."%')";
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
                        .'<p>'.$row["nama_lengkap"].'</p>'
                        .'</div>';
      $tableData[] = '<div class="list-info mrg-top-10">'
                        .'<p>'.$row["kelas"].'</p>'
                      .'</div>';
      $tableData[] = '<div class="list-info mrg-top-10">'
                        .'<p>'.$row["tempat_lahir"].', '
                        .date("d-m-Y", strtotime($row["tanggal_lahir"])).'</p>'
                      .'</div>';
      $tableData[] = '<div class="list-info mrg-top-10">'
                        .'<p>'.$row["no_telp"].'<br>'.$row["no_hp"].'</p>'
                      .'</div>';
      $tableData[] = '<div class="relative mrg-top-10">'
                      .'<div class="btn-group">'
                        .'<a href="javascript:void(0);" class="btn btn-default text-info edit-notif" data-id="'.$row["id"].'" onclick="showDetailOrtu(event);" title="Detail Orang Tua"> <i class="fa fa-group"></i> </a>'
                        .'<a href="javascript:void(0);" class="btn btn-default text-info edit-notif" data-id="'.$row["id"].'" onclick="showDetailJadwal(event);" title="Detail Jadwal Pilihan"> <i class="fa fa-clock-o"></i> </a>'
                        .'<a href="javascript:void(0);" class="btn btn-default text-info edit-notif" data-id="'.$row["id"].'" onclick="showDetailIsian(event);" title="Detail Isian"> <i class="fa fa-list"></i> </a>'
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
      $result = $this->model_adm->insert($data_db, 'm_siswa_batik');

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
      $result = $this->model_adm->update($condition, $data_db, 'm_siswa_batik');

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
      $result = $this->model_adm->update($condition, $data_db, 'm_orangtua_batik');

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
      $result = $this->model_adm->update_batch($data_db, 'm_siswa_batik', 'id');

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
      $result = $this->model_adm->update_batch($data_db, 'm_orangtua_batik', 'id');

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