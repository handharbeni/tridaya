<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if(!function_exists("get_provinsi")) {
  function get_provinsi($id=null, $return_type='obj'){
      $CI =& get_instance();
      $CI->load->model('model_adm', 'model');

      if($id) {
        $condition['id'] = $id;
      }
      //show only active data
      $condition['deleted'] = 1;
      $result = $CI->model->select($condition, 'm_provinsi');
      return $result;
  }
}

if(!function_exists("get_kota")) {
  function get_kota($id_kota=null, $id_provinsi=null, $return_type='obj'){
      $CI =& get_instance();
      $CI->load->model('model_adm', 'model');

      if($id_kota) {
        $condition['id'] = $id;
      }
      if($id_provinsi) {
        $condition['provinsi_id'] = $id;
      }
      //show only active data
      $condition['deleted'] = 1;
      $result = $CI->model->select($condition, 'm_kabkota');
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
      $condition['deleted'] = 1;
      $result = $CI->model->select($condition, 'm_kecamatan');
			return $result;
	}
}

/* End of file wilayah_helper.php */
/* Location: ./application/helpers/wilayah_helper.php */

