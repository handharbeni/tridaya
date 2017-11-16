<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if(!function_exists("get_provinsi")) {
  function get_provinsi($id=null, $return_type='obj'){
      $CI =& get_instance();
      $CI->load->model('model_adm', 'model');

      if($id) {
        $condition['id'] = $id;
      }
      //show only active data
      $condition['deleted'] = 0;
      $result = $CI->model->select($condition, 'm_provinsi');
      return $result;
  }
}

if(!function_exists("get_kota")) {
  function get_kota($id_kota=null, $id_provinsi=null, $return_type='obj'){
      $CI =& get_instance();
      $CI->load->model('model_adm', 'model');

      //show only active data
      $condition['deleted'] = 0;
      $sql = "SELECT A.*, B.nama_provinsi FROM m_kabkota A";
      $sql.=" LEFT JOIN m_provinsi B ON A.provinsi_id = B.id";
      $sql.=" WHERE A.deleted = 0";
      if($id_kota) {
        $sql.=" AND A.id = ".$id_kota;
      }
      if($id_provinsi) {
        $sql.=" AND A.provinsi_id = ".$id_provinsi;
      }
      
      $result = $CI->model->rawQuery($sql);
      return $result;
  }
}

if(!function_exists("get_kecamatan")) {
  function get_kecamatan($id_kecamatan=null, $id_kota=null, $return_type='obj'){
      $CI =& get_instance();
			$CI->load->model('model_adm', 'model');

      if($id_kecamatan) {
        $condition['id'] = $id;
      }
      if($id_kota) {
        $condition['kabkota_id'] = $id;
      }
      //show only active data
      $condition['deleted'] = 0;
      $result = $CI->model->select($condition, 'm_kecamatan');
			return $result;
	}
}

/* End of file wilayah_helper.php */
/* Location: ./application/helpers/wilayah_helper.php */

