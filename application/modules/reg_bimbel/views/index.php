<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
  <title>Tridaya Group - Sistem Informasi Administrasi</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?php echo URL_IMG?>logo/favicon.png">

  <!-- plugins css -->
  <link rel="stylesheet" href="<?php echo URL_PLUGIN?>bootstrap/dist/css/bootstrap.css" />
  <link rel="stylesheet" href="<?php echo URL_PLUGIN?>PACE/themes/blue/pace-theme-minimal.css" />
  <link rel="stylesheet" href="<?php echo URL_PLUGIN?>perfect-scrollbar/css/perfect-scrollbar.min.css" />

  <!-- page plugins css -->
  <link rel="stylesheet" href="<?php echo URL_CSS?>sweetalert.css" />
  <link rel="stylesheet" href="<?php echo URL_PLUGIN?>datatables/media/css/jquery.dataTables.css" />
  <link rel="stylesheet" href="<?php echo URL_PLUGIN?>bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" />
  <link rel="stylesheet" href="<?php echo URL_PLUGIN?>selectize/dist/css/selectize.default.css" />

  <!-- core css -->
  <link href="<?php echo URL_CSS?>ei-icon.css" rel="stylesheet">
  <link href="<?php echo URL_CSS?>themify-icons.css" rel="stylesheet">
  <link href="<?php echo URL_CSS?>font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo URL_CSS?>animate.min.css" rel="stylesheet">
  <link href="<?php echo URL_CSS?>app.css" rel="stylesheet">
</head>

<body class="header-info">
  <div class="app">
    <div class="layout">
      <!-- Side Nav START -->
      <?php echo isset($_sidebar_left) ? $_sidebar_left : '';?>
      <!-- Side Nav END -->

      <!-- Page Container START -->
      <div class="page-container">
        <!-- Header START -->
        <?php echo isset($_header) ? $_header : '';?>
        <!-- Header END -->

        <!-- Side Panel START -->
        <?php echo isset($_sidebar_right) ? $_sidebar_right : '';?>
        <!-- Side Panel END -->

        <!-- theme configurator START -->
        <?php echo isset($_theme_config) ? $_theme_config : '';?>
        <!-- theme configurator END -->

        <!-- Content Wrapper START -->
        <div class="main-content">
          <div class="container-fluid">
            <div class="page-title">
              <h4>Registrasi Bimbel
                <!-- <div class="pull-right">
                  <a href="javascript:void(0)" class="btn btn-rounded btn-success edit-notif" onclick="showModalForm(event);" title="Tambah data"><i class="ti-plus pdd-right-5"></i> Tambah</a>
                  <a href="javascript:void(0)" id="btnDelete" class="btn btn-rounded btn-danger delete-notif" onclick="prepMultiDelete(event);" title="Hapus banyak data"><i class="ti-trash pdd-right-5"></i> Hapus</a>
                </div> -->
              </h4>
            </div>
            <div class="row">
              <div class="col-md-12">
                  <div class="card">
                    <div class="card-block">

                      <div class="row relative">
                          <div id="rootwizard" class="form-wizard col-md-10 ml-auto mr-auto">
                            <ul class="nav nav-pills nav-fill">
                              <li class="nav-item">
                                <a href="#step1" data-toggle="tab">
                                  <span class="step">1</span>
                                  <span class="title">Data Anak</span>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="#step2" data-toggle="tab">
                                  <span class="step">2</span>
                                  <span class="title">Data Orang Tua</span>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="#step3" data-toggle="tab">
                                  <span class="step">3</span>
                                  <span class="title">Data Isian</span>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="#step4" data-toggle="tab">
                                  <span class="step">4</span>
                                  <span class="title">Data Konfirmasi</span>
                                </a>
                              </li>
                            </ul>
                            <div id="bar" class="progress progress-info" style="width: 75%">
                              <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                            </div>
                            <div class="tab-content">
                              <div id="step1" class="tab-pane fade in active">
                                <form action ="" id="formReg1" class="width-100" method="post">
                                <div class="row">
                                  <div class="col-md-10 mr-auto ml-auto">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Nomor Induk</label>
                                          <input type="text" name="no_induk" id="no_induk" class="form-control" placeholder="Nomor Induk" required="">
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Unit Daftar</label>
                                          <select name="unit_id" id="unit" class="" placeholder="Unit Daftar" required=""></select>
                                          <label for="unit" generated="true" class="error"></label>
                                        </div>
                                      </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Nama Lengkap</label>
                                          <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Nama Lengkap" required="">
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Nama Panggilan</label>
                                          <input type="text" name="nama_panggilan" id="nama_panggilan" class="form-control" placeholder="Nama Panggilan" required="">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Kelas/Sekolah</label>
                                          <input type="text" name="kelas" id="kelas" class="form-control" placeholder="Kelas/Sekolah" required="">
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Agama</label>
                                          <select name="agama_id" id="agama" class="" placeholder="Kota" required=""></select>
                                          <label for="agama" generated="true" class="error"></label>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label>Alamat</label>
                                          <input type="text" class="form-control" name="alamat" id="alamat" class="form-control" placeholder="Alamat Lengkap" required="">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Provinsi</label>
                                          <select name="provinsi_id" id="provinsi" class="" placeholder="Provinsi" required=""></select>
                                          <label for="provinsi" generated="true" class="error"></label>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Kota</label>
                                          <select name="kabkota_id" id="kota" class="" placeholder="Kota" required=""></select>
                                          <label for="kota" generated="true" class="error"></label>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Kecamatan</label>
                                          <select name="kecamatan_id" id="kecamatan" class="" placeholder="Provinsi" required=""></select>
                                          <label for="kecamatan" generated="true" class="error"></label>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Kelurahan</label>
                                          <select name="kelurahan_id" id="kelurahan" class="" placeholder="Kota" required=""></select>
                                          <label for="kelurahan" generated="true" class="error"></label>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Tempat/Tanggal Lahir</label>
                                            <div class="timepicker-input input-group">
                                              <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required="">
                                              <span class="input-group-addon">
                                                <i class="ti-calendar"></i>
                                              </span>
                                              <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control datepicker-2" placeholder="Tanggal Lahir" required="">
                                            </div>
                                            <label for="tempat_lahir" generated="true" class="error"></label>
                                            <label for="tanggal_lahir" generated="true" class="error"></label>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Anak ke</label>
                                          <div class="input-group">
                                            <input type="number" name="anak_ke" id="anak_ke" class="form-control" min="0" placeholder="Anak ke" required="">
                                            <span class="input-group-addon">dari</span>
                                            <input type="number" name="jml_bersaudara" id="jml_bersaudara" class="form-control" min="0" placeholder="Jumlah bersaudara">
                                            <span class="input-group-addon">bersaudara</span>
                                          </div>
                                          <label for="anak_ke" generated="true" class="error"></label>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>No. Telepon/HP</label>
                                          <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                            <input type="number" name="no_telp" id="no_telp" class="form-control" min="0" placeholder="Nomor Telepon" required="">
                                            <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                                            <input type="number" name="no_hp" id="no_hp" class="form-control" min="0" placeholder="Nomor HP">
                                          </div>
                                          <label for="no_telp" generated="true" class="error"></label>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Email</label>
                                          <input type="email" name="email" id="email" class="form-control" placeholder="Email" required="">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Pin BB</label>
                                          <input type="text" name="pin_bb" id="pin_bb" class="form-control" placeholder="Pin BB">
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Media Sosial</label>
                                          <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                                            <input type="text" name="akun_fb" id="akun_fb" class="form-control" placeholder="Username FB">
                                            <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
                                            <input type="text" name="akun_twitter" id="akun_twitter" class="form-control" placeholder="Username Twitter">
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Awal Masuk Tridaya</label>
                                            <div class="timepicker-input input-group">
                                              <span class="input-group-addon">
                                                <i class="ti-calendar"></i>
                                              </span>
                                              <input type="text" name="awal_masuk" id="awal_masuk" class="form-control datepicker-2" placeholder="Awal Masuk Tridaya">
                                            </div>
                                            <label for="awal_masuk" generated="true" class="error"></label>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Nama Tutor Sebelumnya</label>
                                          <input type="text" name="tutor_sebelumnya" id="tutor_sebelumnya" class="form-control" placeholder="Nama Tutor Sebelumnya">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Unit Belajar Sebelumnya</label>
                                          <input type="text" name="unit_sebelumnya" id="unit_sebelumnya" class="form-control" placeholder="Unit Belajar Sebelumnya">
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Ranking/Raport</label>
                                          <input type="text" name="ranking" id="ranking" class="form-control" placeholder="Ranking/Raport">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  </div>
                                </form>
                              </div>

                              <div id="step2" class="tab-pane fade">
                                <form action ="" id="formReg2" class="width-100" method="post">
                                <div class="row">
                                  <div class="col-md-10 mr-auto ml-auto">
                                    <div id="dataAyah">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <h4>Ayah/Wali</h4>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Nama Lengkap</label>
                                          <input type="text" name="nama_lengkap" id="nama_lengkap_ayah" class="form-control" placeholder="Nama Lengkap" required="">
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Pekerjaan</label>
                                          <input type="text" name="pekerjaan" id="pekerjaan_ayah" class="form-control" placeholder="Pekerjaan" required="">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>No. Telepon/HP</label>
                                          <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                            <input type="number" name="no_telp" id="no_telp_ayah" class="form-control" min="0" placeholder="Nomor Telepon" required="">
                                            <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                                            <input type="number" name="no_hp" id="no_hp_ayah" class="form-control" min="0" placeholder="Nomor HP">
                                          </div>
                                          <label for="no_telp_ayah" generated="true" class="error"></label>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Email</label>
                                          <input type="email" name="email" id="email_ayah" class="form-control" placeholder="Email" required="">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label>Alamat Tinggal</label>
                                          <input type="text" class="form-control" name="alamat" id="alamat_ayah" class="form-control" placeholder="Alamat Tinggal" required="">
                                        </div>
                                      </div>
                                    </div>
                                    </div>
                                    
                                    <div id="dataIbu">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <h4>Ibu</h4>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Nama Lengkap</label>
                                          <input type="text" name="nama_lengkap" id="nama_lengkap_ibu" class="form-control" placeholder="Nama Lengkap">
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Pekerjaan</label>
                                          <input type="text" name="pekerjaan" id="pekerjaan_ibu" class="form-control" placeholder="Pekerjaan">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>No. Telepon/HP</label>
                                          <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                            <input type="number" name="no_telp" id="no_telp_ibu" class="form-control" min="0" placeholder="Nomor Telepon">
                                            <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                                            <input type="number" name="no_hp" id="no_hp_ibu" class="form-control" min="0" placeholder="Nomor HP">
                                          </div>
                                          <label for="no_telp_ibu" generated="true" class="error"></label>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Email</label>
                                          <input type="email" name="email" id="email_ibu" class="form-control" placeholder="Email">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label>Alamat Tinggal</label>
                                          <input type="text" class="form-control" name="alamat" id="alamat_ibu" class="form-control" placeholder="Alamat Tinggal">
                                        </div>
                                      </div>
                                    </div>
                                    </div>
                                  
                                  </div>
                                </div>
                               </form>
                              </div>
                              
                              <div id="step3" class="tab-pane fade">
                                <form action ="" id="formReg3" class="width-100" method="post">
                                <div class="row">
                                  <div class="col-md-10 mr-auto ml-auto">
                                    <div class="row">
                                    <?php 
                                    foreach ($list_isian as $key => $isian) {
                                      if($isian->tipe_input == "input") { ?>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label for="jawaban-<?php echo $isian->id?>">
                                              <?php echo $isian->pertanyaan?>
                                            </label>
                                            <input type="text" name="jawaban-<?php echo $isian->id?>[]" id="jawaban-<?php echo $isian->id?>" class="form-control">
                                          </div>
                                          <?php if(!empty($isian->pertanyaan_lanjutan)) { ?>
                                            <div class="form-group">
                                              <div class="input-group">
                                                <span class="input-group-addon"><?php echo $isian->pertanyaan_lanjutan?></span>
                                                <input type="text" name="jawaban-<?php echo $isian->id?>[]" class="form-control">
                                              </div>
                                            </div>
                                          <?php } ?>
                                        </div>
                                        <?php } 
                                        else if($isian->tipe_input == "radio") { ?>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label><?php echo $isian->pertanyaan?></label>
                                            <div class="row">
                                              <div class="col-md-12">
                                                <div class="form-inline">
                                                  <div class="radio radio-inline">
                                                    <input type="radio" name="jawaban-<?php echo $isian->id?>[]" id="opsi-<?php echo $isian->id?>-1" value="ya" checked="">
                                                    <label for="opsi-<?php echo $isian->id?>-1">Ya</label>
                                                  </div>
                                                  <div class="radio radio-inline">
                                                    <input type="radio" name="jawaban-<?php echo $isian->id?>[]" id="opsi-<?php echo $isian->id?>-2" value="tidak">
                                                    <label for="opsi-<?php echo $isian->id?>-2">Tidak</label>
                                                  </div>
                                                  <?php if(!empty($isian->pertanyaan_lanjutan)) { ?>
                                                    <input type="text" name="jawaban-<?php echo $isian->id?>[]" class="form-control" placeholder="<?php echo $isian->pertanyaan_lanjutan?>">
                                                  <?php } ?>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <?php }
                                        else if($isian->tipe_input == "textarea") { ?>
                                            <div class="col-md-12">
                                              <div class="form-group">
                                                <label for="jawaban-<?php echo $isian->id?>">
                                                  <?php echo $isian->pertanyaan?>
                                                </label>   
                                                <textarea name="jawaban-<?php echo $isian->id?>" id="jawaban-<?php echo $isian->id?>" class="form-control"></textarea>
                                              </div>
                                            </div>
                                          <?php } ?>
                                      <?php
                                    }?>
                                    </div>
                                  </div>
                                </div>
                              </form>
                              </div>

                              <div id="step4" class="tab-pane fade">
                                <div class="row">
                                  <div class="col-md-6 mr-auto ml-auto">
                                    <img class="img-fluid d-block mrg-horizon-auto" src="assets/images/others/cart.png" alt="">
                                    <div class="text-center">
                                      <h2>Konfirmasi</h2>
                                      <p>Mohon periksa kembali data yang akan ditambahkan untuk menghindari adanya kesalahan.
                                        <br> Klik tombol di bawah ini untuk menambahkan data siswa.
                                      </p>
                                      <button id="btnSubmit" class="btn btn-info btn-inverse btn-lg" onclick="doSubmit('#formReg', event)">Tambahkan</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="wizard-pager">
                                <div class="">
                                  <button type="button" class="btn btn-default button-previous btn-rounded">Previous</button>
                                  <button type="button" class="btn btn-primary button-next pull-right btn-rounded">Next</button>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>

                    </div>
                </div>

              </div>  
            </div>
          </div> 
          
        </div>
        <!-- Content Wrapper END -->

        <!-- Footer START -->
        <?php echo isset($_footer) ? $_footer : '';?>
        <!-- Footer END -->

      </div>
      <!-- Page Container END -->

    </div>
  </div>

  <!-- build:js <?php echo URL_JS?>vendor.js -->
  <!-- plugins js -->
  <script src="<?php echo URL_PLUGIN?>jquery/dist/jquery.min.js"></script>
  <script src="<?php echo URL_PLUGIN?>popper.js/dist/umd/popper.min.js"></script>
  <script src="<?php echo URL_PLUGIN?>bootstrap/dist/js/bootstrap.js"></script>
  <script src="<?php echo URL_PLUGIN?>PACE/pace.min.js"></script>
  <script src="<?php echo URL_PLUGIN?>perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
  <!-- endbuild -->

  <!-- page plugins js -->
  <script src="<?php echo URL_PLUGIN?>jquery-loading-overlay/src/loadingoverlay.min.js"></script>
  <script src="<?php echo URL_PLUGIN?>sweetalert/lib/sweet-alert.js"></script>
  <script src="<?php echo URL_PLUGIN?>datatables/media/js/jquery.dataTables.js"></script>
  <script src="<?php echo URL_PLUGIN?>jquery-validation/dist/jquery.validate.min.js"></script>
  <script src="<?php echo URL_PLUGIN?>twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
  <script src="<?php echo URL_PLUGIN?>noty/js/noty/packaged/jquery.noty.packaged.min.js"></script>
  <script src="<?php echo URL_PLUGIN?>bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
  <script src="<?php echo URL_PLUGIN?>selectize/dist/js/standalone/selectize.min.js"></script>

  <!-- build:js <?php echo URL_JS?>app.min.js -->
  <!-- core js -->
  <script src="<?php echo URL_JS?>app.js"></script>
  <script src="<?php echo URL_JS?>ui-elements/notification_custom.js"></script>
  <!-- endbuild -->

  <!-- page js -->
  <script src="<?php echo URL_JS?>table/data-table.js"></script>
  <script src="<?php echo URL_JS?>select-wilayah.js"></script>
  <script>

    var jsonList = <?php echo json_encode($list)?>;
    var jsonUnit = <?php echo json_encode($list_unit)?>;
    var jsonAgama = <?php echo json_encode($list_agama)?>;
    var jsonProvinsi = <?php echo json_encode(get_provinsi()->result())?>;
    var jsonKota = <?php echo json_encode(get_kota()->result())?>;
    var jsonKecamatan = [];
    var jsonKelurahan = [];
    // var jsonAkun = <?php echo json_encode($list_akun)?>;

    // INITIALIZE DATATABLE
    var tableData = $("#tableData").DataTable({
      "columnDefs": [ {
              "searchable": false,
              "orderable": false,
              "targets": "no-sort"
          },{
              "searchable": false,
              "orderable": true,
              "targets": "no-search"
          } ],
          // "order": [[ 1, 'asc' ]]    
    });
    tableData.on( 'order.dt search.dt', function () {
      // tableData.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
      //     cell.innerHTML = '';
      // });
    }).draw();

    //LOADING TABLE BODY WITH JSON DATA
    // loadTabelUnit(jsonList);

    /*function getDetail(id, callback) {
      if(id) {
        $.ajax({
          url: '<?php echo base_url();?>registrasi/bimbel/get_unit_by_id',
          data: { id: id },
          type: 'POST',
          dataType: 'json',
          beforeSend: function() { $.LoadingOverlay("show");  },
          success: function(response, status) {
            if(response.status) {
              var data = response.data;
              // console.log(data);
              //fill id & nama unit  for edit
              $('#id').val(data.id);
              $('#nama').val(data.nama);
              selectizeProvinsi.setValue(data.provinsi_id, false);
              selectizeKota.setValue(data.kabkota_id, false);
              selectizeKecamatan.setValue(data.kecamatan_id, false);
              selectizeKelurahan.setValue(data.kelurahan_id, false);
              selectizeAkun.setValue(data.akun_id, false);
              $("<input type='hidden' id='hddKecId' value='"+data.kecamatan_id+"' readonly=''>").insertAfter("#kecamatan");
              $("<input type='hidden' id='hddKelId' value='"+data.kelurahan_id+"' readonly=''>").insertAfter("#kelurahan");
              $('#alamat').val(data.alamat);
              $('#no_telp').val(data.no_telp);
              $('#modalForm').modal('show');
            }
          },
          error: function(jqXhr, message, errorThrown){
            console.log('Request error!', message);
          } 
        });
        $.LoadingOverlay("hide");
      }
    }*/
    
    //INITIALIZE SELECTIZE
    var selectizeUnit, $selectizeUnit;
    var selectizeProvinsi, $selectizeProvinsi;
    var selectizeKota, $selectizeKota;
    var selectizeKecamatan, $selectizeKecamatan;
    var selectizeKelurahan, $selectizeKelurahan;
    // var selectizeAkun, $selectizeAkun;
    //loading select option unit
    $selectizeUnit = $('#unit').selectize({
      options: $.map(jsonUnit, function(data, i) {
        return [{ value: data.id, text: data.nama }];
      }),
      create: false,
      sortField: { field: 'text', direction: 'asc' },
      placeholder: 'Pilih Unit/Cabang',
      // valueField: 'value', labelField: 'name', dropdownParent: 'body'
    });
    // loading select option agama
    $selectizeAgama = $('[name="agama_id"]').selectize({
      options: $.map(jsonAgama, function(data, i) {
        return [{ value: data.id, text: data.nama }];
      }),
      create: false,
      sortField: { field: 'value', direction: 'asc' },
      placeholder: 'Pilih Agama',
      // valueField: 'value', labelField: 'name', dropdownParent: 'body'
    });
    //loading select option provinsi
    $selectizeProvinsi = $('#provinsi').selectize({
      options: $.map(jsonProvinsi, function(data, i) {
        return [{ value: data.id, text: data.nama_provinsi }];
      }),
      create: false,
      sortField: { field: 'text', direction: 'asc' },
      placeholder: 'Pilih Provinsi',
      onChange: function(val) {
        // console.log('Selectize Prov Onchange!');
        if(!val.length){ selectizeKota.disable(); }
        else {
          selectizeKota.disable();
          selectizeKota.clearOptions();
          let filteredArr = $.map(jsonKota, function(data, i) {
            if((data.provinsi_id == val)){
              return [{ value: data.id, text: data.nama_kabkota, $order: i+1 }];
            }
          });
          selectizeKota.enable();
          selectizeKota.addOption(filteredArr);
        }
      }
      // valueField: 'value', labelField: 'name', dropdownParent: 'body'
    });
    //loading select option kota
    $selectizeKota = $('#kota').selectize({
      options: $.map(jsonKota, function(data, i) {
        return [{ value: data.id, text: data.nama_kabkota }];
      }),
      create: false,
      sortField: { field: 'text', direction: 'asc' },
      placeholder: 'Pilih Kota/Kabupaten',
      onChange: function(val) {
        // console.log('Selectize Kota Onchange!');
        var xhr;
        if(!val.length){ 
          selectizeKecamatan.clear(); selectizeKelurahan.clear();
          selectizeKecamatan.disable(); selectizeKelurahan.disable(); 
        }
        else {
          selectizeKecamatan.disable(); selectizeKelurahan.disable();
          selectizeKecamatan.clearOptions(); selectizeKelurahan.clearOptions();
          selectizeKecamatan.load(function(callback) {
            // console.log('Loading Kecamatan!!');
            xhr && xhr.abort();
            xhr = $.post("<?php echo base_url()?>registrasi/bimbel/get_kecamatan_by_kota", {id: val}, function(response, status) {
                  if(status == 'success') {
                    let filteredArr = $.map(response.data, function(data, i) {
                      if((data.kabkota_id == val)){
                        return [{ value: data.id, text: data.nama_kecamatan, $order: i+1 }];
                      }
                    });
                    callback(filteredArr);
                    selectizeKecamatan.enable();
                    //workaround to select option on edit data
                    let hddKecId = $("#hddKecId").val() || '';
                    selectizeKecamatan.setValue(hddKecId, false);
                  }
                  else {
                    callback();
                  }
                }, "json"
            )
          });
        }
      }
      // valueField: 'value', labelField: 'name', dropdownParent: 'body'
    });
    //loading select option kecamatan
    $selectizeKecamatan = $('#kecamatan').selectize({
      options: $.map(jsonKecamatan, function(data, i) {
        return [{ value: data.id, text: data.nama_kecamatan }];
      }),
      create: false,
      sortField: { field: 'text', direction: 'asc' },
      placeholder: 'Pilih Kecamatan',
      onChange: function(val) {
        // console.log('Selectize Kecamatan Onchange!');
        var xhr;
        if(!val.length){ selectizeKelurahan.disable(); }
        else {
          selectizeKelurahan.disable();
          selectizeKelurahan.clearOptions();
          selectizeKelurahan.load(function(callback) {
            // console.log('Loading Kelurahan!!');
            xhr && xhr.abort();
            xhr = $.post("<?php echo base_url()?>registrasi/bimbel/get_kelurahan_by_kecamatan", {id: val}, function(response, status) {
                  // console.log(response);
                  if(status == 'success') {
                    let filteredArr = $.map(response.data, function(data, i) {
                      if((data.kecamatan_id == val)){
                        return [{ value: data.id, text: data.nama_kelurahan, $order: i+1 }];
                      }
                    });
                    callback(filteredArr);
                    selectizeKelurahan.enable();
                    //workaround to select option on edit data
                    let hddKelId = $("#hddKelId").val() || '';
                    selectizeKelurahan.setValue(hddKelId, false);
                  }
                  else {
                    callback();
                  }
                }, "json"
            )
          });
        }
      }
      // valueField: 'value', labelField: 'name', dropdownParent: 'body'
    });
    //loading select option kelurahan
    $selectizeKelurahan = $('#kelurahan').selectize({
      options: $.map(jsonKelurahan, function(data, i) {
        return [{ value: data.id, text: data.nama_kelurahan }];
      }),
      create: false,
      sortField: { field: 'text', direction: 'asc' },
      placeholder: 'Pilih Kelurahan',
      // valueField: 'value', labelField: 'name', dropdownParent: 'body'
    });
    //loading select option akun admin
    /*$selectizeAkun = $('#akun_id').selectize({
      options: $.map(jsonAkun, function(data, i) {
        return [{ value: data.id, text: data.nama }];
      }),
      create: false,
      sortField: { field: 'text', direction: 'asc' },
      placeholder: 'Pilih Akun Admin',
      // valueField: 'value', labelField: 'name', dropdownParent: 'body'
    });*/
    selectizeUnit = $selectizeUnit[0].selectize;
    selectizeAgama = $selectizeAgama[0].selectize;
    selectizeProvinsi = $selectizeProvinsi[0].selectize;
    selectizeKota = $selectizeKota[0].selectize;
    selectizeKecamatan = $selectizeKecamatan[0].selectize;
    selectizeKelurahan = $selectizeKelurahan[0].selectize;
    // selectizeAkun = $selectizeAkun[0].selectize;

    //INITIALIZE FORM VALIDATION
    formValidation = $("#formAdd").validate({
      ignore: ':hidden:not([class~=selectized]),:hidden > .selectized, .selectize-control .selectize-input input',
            rules: {
                "provinsi_id": "required", "kabkota_id": "required",
                "kecamatan_id": "required", "kelurahan_id": "required",
                "akun_id": "required"
            },
      validClass : '',
      submitHandler: function(form) {
        doSubmit(form);
      }
     });
    //clear/reset validation inside form modal on hide event
    $('#modalForm').on('hidden.bs.modal', function(e) {
      target = $(this).attr('id');
      formValidation.resetForm();
      $('#'+target+' .error').removeClass('error');
    }); 


    //MODAL FORM SUBMIT HANDLER
    function doSubmit(form, event) {
      event.preventDefault();
      let arrData = {
            siswa:$("#formReg1 *[name]").serialize(),
            ayah: $("#formReg2 #dataAyah *[name]").serialize(),
            ibu: $("#formReg2 #dataIbu *[name]").serialize(),
            isian: $("#formReg3 *[name]").serialize()
          };
      // console.log($("#formReg #step1 *[name]").serialize());
      // let id = $('#id').val() || '';
      if(form) {
        $.ajax({
          url: '<?php echo base_url()?>registrasi/bimbel/do_add',
          data: { arr_data: arrData},
          type: 'POST',
          dataType: 'json',
          beforeSend: function() { 
            $('#btnSubmit').prop('disabled', true); 
            $.LoadingOverlay("show"); 
          },
          success: function(response, status) {
            if(response.status) {
              // console.log(response);
              if(response.result) {
                showNoty(response.message, 'success');
                // loadTabelUnit(response.data);
              }
              else {
                showNoty(response.message, 'warning');
              }
            }
            else {
              showNoty('Terjadi kesalahan! Pastikan data yang anda masukkan sudah benar', 'warning');
            }
            $('#modalForm').modal('hide');
          },
          error: function(jqXhr, message, errorThrown){
            console.log('Request error!', message);
            showNoty('Error! Perintah tidak dapat dijalankan', 'error');
          }
        });
      }
      $('#btnSubmit').prop('disabled', false); 
      $.LoadingOverlay("hide");
    }
  </script>

  <script>
    // Form Wizard JavaScripts

(function ($) {
  'use strict';
  
  function validationChecking() {
    var $valid = false;
    var currentIndex = $('#rootwizard').bootstrapWizard('currentIndex')+1;
    // console.log(currentIndex);
    // return true;
    var $validator = $('#formReg'+currentIndex).validate({
      errorElement: 'label', validClass : ''
    });
    $valid = $('#formReg'+currentIndex).valid(); 
    if (!$valid) {
        $validator.focusInvalid();
        return false;
    }
    return true;
  }

    $('#tanggal_lahir').datepicker({
      format: "yyyy/mm/dd"
    });
    $('#awal_masuk').datepicker({
      format: "yyyy/mm/dd"
    });

    $('#rootwizard').bootstrapWizard({
      tabClass: '',
      'nextSelector': '.button-next',
      'previousSelector': '.button-previous',
      onNext: validationChecking,
      onLast: validationChecking,
      onTabClick: () => {return false},
      onTabShow: function(tab, navigation, index) {
      var $total = navigation.find('li').length;
      var $current = index+0;
      var $percent = ($current/$total) * 133;
      $('#rootwizard .progress-bar').css({width:$percent+'%'});
    }});
})(jQuery);

  </script>

</body>

</html>