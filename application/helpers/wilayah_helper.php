<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if(!function_exists("get_provinsi")) {
  function get_provinsi($id=null){
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
  function get_kota($id_kota=null, $id_provinsi=null){
      $CI =& get_instance();
      $CI->load->model('model_adm', 'model');

      //show only active data
      $condition['deleted'] = 0;
      $sql = "SELECT m_provinsi.nama_provinsi, m_kabkota.* FROM m_kabkota";
      $sql.=" LEFT JOIN m_provinsi ON m_kabkota.provinsi_id = m_provinsi.id";
      $sql.=" WHERE m_kabkota.deleted = 0";
      if($id_kota) {
        $sql.=" AND m_kabkota.id = ".$id_kota;
      }
      if($id_provinsi) {
        $sql.=" AND m_provinsi.provinsi_id = ".$id_provinsi;
      }
      
      $result = $CI->model->rawQuery($sql);
      return $result;
  }
}
if(!function_exists("get_kecamatan")) {
  function get_kecamatan($id_kecamatan=null, $id_kota=null, $id_provinsi=null){
      $CI =& get_instance();
      $CI->load->model('model_adm', 'model');

     //show only active data
      $condition['deleted'] = 0;
      $sql = "SELECT m_provinsi.nama_provinsi, m_kabkota.provinsi_id, m_kabkota.nama_kabkota, m_kecamatan.* FROM m_kecamatan";
      $sql.=" LEFT JOIN m_kabkota ON m_kecamatan.kabkota_id = m_kabkota.id";
      $sql.=" LEFT JOIN m_provinsi ON m_kabkota.provinsi_id = m_provinsi.id";
      $sql.=" WHERE m_kecamatan.deleted = 0";
      if($id_kecamatan) {
        $sql.=" AND m_kecamatan.id = ".$id_kecamatan;
      }
      if($id_kota) {
        $sql.=" AND m_kabkota.id = ".$id_kota;
      }
      if($id_provinsi) {
        $sql.=" AND m_provinsi.id = ".$id_provinsi;
      }
      
      $result = $CI->model->rawQuery($sql);
      return $result;
  }
}
if(!function_exists("get_kelurahan")) {
  function get_kelurahan($id_kelurahan=null, $id_kecamatan=null, $id_kota=null, $id_provinsi=null){
      $CI =& get_instance();
      $CI->load->model('model_adm', 'model');

     //show only active data
      $condition['deleted'] = 0;
      $sql = "SELECT m_provinsi.nama_provinsi, m_kabkota.provinsi_id, m_kabkota.nama_kabkota, m_kecamatan.kabkota_id, m_kecamatan.nama_kecamatan, m_kelurahan.* FROM m_kelurahan";
      $sql.=" LEFT JOIN m_kecamatan ON m_kelurahan.kecamatan_id = m_kecamatan.id";
      $sql.=" LEFT JOIN m_kabkota ON m_kecamatan.kabkota_id = m_kabkota.id";
      $sql.=" LEFT JOIN m_provinsi ON m_kabkota.provinsi_id = m_provinsi.id";
      $sql.=" WHERE m_kelurahan.deleted = 0";
      if($id_kelurahan) {
        $sql.=" AND m_kelurahan.id = ".$id_kelurahan;
      }
      if($id_kecamatan) {
        $sql.=" AND m_kecamatan.id = ".$id_kecamatan;
      }
      if($id_kota) {
        $sql.=" AND m_kabkota.id = ".$id_kota;
      }
      if($id_provinsi) {
        $sql.=" AND m_provinsi.id = ".$id_provinsi;
      }
      
      $result = $CI->model->rawQuery($sql);
			return $result;
	}
}

if(!function_exists("get_kota_no_join")) {
  function get_kota_no_join($id_kota=null, $id_provinsi=null){
      $CI =& get_instance();
      $CI->load->model('model_adm', 'model');

      if($id_kota) {
        $condition['id'] = $id_kota;
      }
      if($id_provinsi) {
        $condition['provinsi_id'] = $id_provinsi;
      }
      //show only active data
      $condition['deleted'] = 0;
      $result = $CI->model->select($condition, 'm_kabkota');
      return $result;
  }
}
if(!function_exists("get_kecamatan_no_join")) {
  function get_kecamatan_no_join($id_kecamatan=null, $id_kota=null){
      $CI =& get_instance();
      $CI->load->model('model_adm', 'model');

      if($id_kecamatan) {
        $condition['id'] = $id_kecamatan;
      }
      if($id_kota) {
        $condition['kabkota_id'] = $id_kota;
      }
      //show only active data
      $condition['deleted'] = 0;
      $result = $CI->model->select($condition, 'm_kecamatan');
      return $result;
  }
}
if(!function_exists("get_kelurahan_no_join")) {
  function get_kelurahan_no_join( $id_kelurahan=null, $id_kecamatan=null){
      $CI =& get_instance();
      $CI->load->model('model_adm', 'model');

      if($id_kelurahan) {
        $condition['id'] = $id_kelurahan;
      }
      if($id_kecamatan) {
        $condition['kecamatan_id'] = $id_kecamatan;
      }
      //show only active data
      $condition['deleted'] = 0;
      $result = $CI->model->select($condition, 'm_kelurahan');
      return $result;
  }
}

/* End of file wilayah_helper.php */
/* Location: ./application/helpers/wilayah_helper.php */

