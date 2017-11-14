<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends MX_Controller {

	public function __construct() {
		parent::__construct();
	}

  public function index($params=null, $params2=null)
  {
    if($params) {
      echo modules::run('m_'.$params.'/index', $params2);
    }
    else {
      redirect('dashboard');
    }
  }
 /* public function akun($params=null)
  {
    echo modules::run('m_akun/index', $params);
  }
  public function unit($params=null)
  {
    echo modules::run('m_unit/index', $params);
  }
  public function guru($params=null)
  {
    echo modules::run('m_guru/index', $params);
  }
  public function siswa($params=null)
  {
    echo modules::run('m_siswa/index', $params);
  }
  public function kelas($params=null)
  {
    echo modules::run('m_kelas/index', $params);
  }
  public function mapel($params=null)
  {
    echo modules::run('m_mapel/index', $params);
  }

  public function provinsi($params=null)
  {
    echo modules::run('m_provinsi/index', $params);
  }
*/
}
