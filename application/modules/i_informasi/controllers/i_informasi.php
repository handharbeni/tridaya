<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class I_informasi extends MX_Controller {
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
      $this->load->helper('string_helper');
      $this->load->model('model_adm');
      // $this->data can be accessed from anywhere in the controller.
  }

  public function index($params=null)
  {
    $data['list'] = $this->get_data_list()->result();
    $data['list_tag'] = $this->get_tags()->result();
    $data['list_unit'] = $this->model_adm->select(array('deleted' => 0), 
      'm_unit')->result();
    $data['list_kategori'] = $this->model_adm->select(array('deleted' => 0), 
      'i_kategori')->result();
    $data['list_jenjang'] = $this->model_adm->select(array('deleted' => 0), 
      'm_jenjang')->result();
    $this->load->view('index', $data);
  }

  private function get_data_list($id=null)
  {
    $sql = "SELECT i_informasi.*, i_kategori.nama AS nama_kategori FROM i_informasi"
      ." LEFT JOIN i_kategori ON i_informasi.kategori_id = i_kategori.id" 
      ." WHERE i_informasi.deleted = '0'";
      if($id) { $sql .= " AND i_informasi.id = ".$id; }
    $sql .= " ORDER BY i_informasi.timestamp DESC";
    return $this->model_adm->rawQuery($sql);
  }
  public function get_informasi_by_id()
  {
    $params = $this->input->post();
    $response = $this->response;
    if(isset($params['id'])) {
      $condition = array(
        'deleted' => 0, 
        'id' => $params['id']
      );
      $result = $this->model_adm->select($condition, 'i_informasi')->row();
      $response = array('status' => 1, 'data' => $result);
    }
    echo json_encode($response);
  }
  public function get_tags($id=null)
  {
    $condition['deleted'] = 0;
    if(isset($params['id'])) { $condition['id'] = $params['id']; }
    return $this->model_adm->select($condition, 'i_tag');
  }

  function get_datatable(){
    $requestData= $_REQUEST;
    $columns = array( 
      0   =>  'id', 
      1   =>  'kategori_id',
      2   =>  'judul',
      3   =>  'konten',
      4   =>  'timestamp',
      5   =>  'aksi'
    );
    $query = $this->get_data_list();
    $totalData = $query->num_rows();
    
    $sql = "SELECT i_informasi.*, i_kategori.nama AS nama_kategori, m_unit.nama AS nama_unit FROM i_informasi "
      ." LEFT JOIN i_kategori ON i_informasi.kategori_id = i_kategori.id" 
      ." LEFT JOIN m_unit ON i_informasi.unit_id = m_unit.id" 
      ." WHERE i_informasi.deleted = '0'";
    if(!empty($requestData['search']['value'])) {
      $sql.=" AND (i_informasi.judul LIKE '%".$requestData['search']['value']."%'"; 
      $sql.=" OR i_informasi.konten LIKE '%".$requestData['search']['value']."%'";
      $sql.=" OR i_informasi.timestamp LIKE '%".$requestData['search']['value']."%')";
    }
    $query = $this->model_adm->rawQuery($sql);
    $totalFiltered = $query->num_rows();

    $sql .= " ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']." "; 
    $query = $this->model_adm->rawQuery($sql);

    $data = array(); $i=0;
    foreach ($query->result_array() as $row) {
      $tableData   = array(); 
      //preparing thumbnail image 
      $thumb_url = URL_IMG."placeholder.png";
      if(!empty($row["thumbnail"])) {
        if(file_exists(FCPATH."upload/informasi/".$row["thumbnail"])) {
          $thumb_url = URL_UPLOAD."informasi/".$row["thumbnail"];
        }
      }

      $tableData[] = '<div class="checkbox mrg-left-20">'
                      .'<i style="display:none">'.$row["id"].'</i>'
                      .'<input id="task-'.$row["id"].'" value="'.$row["id"].'" name="task[]" type="checkbox">'
                        .'<label for="task-'.$row["id"].'"></label>'
                    .'</div>';
      $tableData[] = "<a href='javascript:void(0)' data-toggle='popover' data-html='true' data-placement='right' onclick='showThumbnail(this)'>"
                        . "<img src='".$thumb_url."' class='img-responsive img-rounded' width='70' alt='No Image' style='margin:0 auto;'> </a>";
      $tableData[] = '<div class="list-info mrg-top-10">'
                        .'<p>'.$row["nama_kategori"].'<p>'
                      .'</div>';
      $tableData[] = '<div class="list-info mrg-top-10">'
                          .'<div class="info no-pdd">'
                            .'<span class="title">'.$row["judul"].'</span>'
                            .'<span class="sub-title">'.$row["nama_unit"].'</span>'
                            .'</div>'
                          .'</div>'
                        .'</div>';
      $tableData[] = '<div class="list-info mrg-top-10">'
                        .truncate_string($row["konten"], 20)
                        .'<div class="center-block text-right">'
                          .$this->process_tags($row["tags"])
                      .'</div></div>';
      $tableData[] = '<div class="list-info mrg-top-10">'
                        .'<p>'.date('d-m-y H:i',strtotime($row["timestamp"])).'<p>'
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

  private function process_tags($json_tags='') {
    $tags = '';
    if(!empty($json_tags)) {
      $arr_tags = json_decode($json_tags);
      $arr_data = $this->model_adm->have_in('', $arr_tags, 'i_tag', 'id')->result_array();
      foreach ($arr_data as $key => $tag) {
        $tags .= ' <span class="label label-sm label-info">'.$tag["nama"].'</span>';
      }
    }
    return $tags;
  }
  private function process_image($input_name='thumbnail') {
    $img_name = '';
    if(!empty($input_name)) {
      $tipe = $this->cek_tipe($_FILES[$input_name]['type']);
      $img_path = FCPATH."upload/informasi/";
      $img_name = "thumb".time().$tipe;

      $config['overwrite'] = true;
      $config['upload_path'] = $img_path;
      $config['allowed_types'] = "png|jpg|jpeg";
      $config['file_name'] = $img_name;

      //create folder if not exist
      if (!file_exists($img_path)) {
        mkdir($img_path, 0777, true);
      }
      
      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      if (!$this->upload->do_upload($input_name))
      {
        $error = array('error' => $this->upload->display_errors());
        $this->upload->display_errors();
        print_r($error);
      }
      else {
        $file_data = $this->upload->data();
        $upload_data['file_name'] = $file_data['file_name'];
        $upload_data['created'] = date("Y-m-d H:i:s");
        $upload_data['modified'] = date("Y-m-d H:i:s");
        //echo $upload data if you want to see the file information
      }
    }
    return $img_name;
  }
  private function cek_tipe($tipe) {
    if ($tipe == 'image/jpeg') 
      { return ".jpg"; }
    else if($tipe == 'image/png') 
      { return ".png"; }
    else 
      { return false; }
  }

  public function add_tags() {
    $response = $this->response;
    $params = $this->input->post();
    // print_r($params); die();
    if(!empty($params['nama'])) {
      $data_db = $params;
      $result = $this->model_adm->insert_id($data_db, 'i_tag');

      $data = [];
      $message = "Data gagal ditambahkan!";
      if($result) {
        $message = "Data berhasil ditambahkan!";
        $data = $this->get_tags()->result();
      }
      $response = array(
        'status' => 1, 'result' => $result, 
        'message' => $message, 'data' => $data);
    }
    echo json_encode($response);
  }

  public function do_add() {
    $response = $this->response;
    $params = $this->input->post();

    // print_r($_FILES);
    // print_r($params); die();
    if(!empty($params)) {
      $data_db = $params;
      if(isset($data_db['id'])) { unset($data_db['id']); }

      $data_db['tags'] = json_encode($data_db['tags']); 
      $data_db['thumbnail'] = $this->process_image('thumbnail');
      $result = $this->model_adm->insert($data_db, 'i_informasi');

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
      unset($data_db['id']);

      $data_db['timestamp'] = date("Y-m-d H:i:s");
      $data_db['tags'] = json_encode($data_db['tags']);
      if(empty($_FILES['thumbnail']['name'])) {
        unset($data_db['thumbnail']);
      } else {
        $data_db['thumbnail'] = $this->process_image('thumbnail');
      }
      
      $result = $this->model_adm->update($condition, $data_db, 'i_informasi');

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
      $result = $this->model_adm->update_batch($data_db, 'i_informasi', 'id');

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
