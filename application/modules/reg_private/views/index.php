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
              <h4>Registrasi Private
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
                                  <span class="title">Data Nilai</span>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="#step3" data-toggle="tab">
                                  <span class="step">3</span>
                                  <span class="title">Data Orang Tua</span>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="#step4" data-toggle="tab">
                                  <span class="step">4</span>
                                  <span class="title">Data Isian</span>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="#step5" data-toggle="tab">
                                  <span class="step">5</span>
                                  <span class="title">Konfirmasi</span>
                                </a>
                              </li>
                            </ul>
                            <div id="bar" class="progress progress-info" style="width: 75%">
                              <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                            </div>
                            <div class="tab-content">
                              <div id="step1" class="tab-pane fade in active">
                                <form action ="<?php echo base_url()?>registrasi/sekolah/do_add" id="formReg1" class="width-100" method="post">
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
                                          <input type="text" name="unit" id="unit" class="form-control" placeholder="Unit Daftar" required="">
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
                                      <div class="col-md-7">
                                        <div class="form-group">
                                          <label>Patokan Rumah Siswa</label>
                                          <input type="text" class="form-control" name="patokan" id="patokan" class="form-control" placeholder="Patokan Rumah Siswa">
                                        </div>
                                      </div>
                                      <div class="col-md-5">
                                        <div class="form-group">
                                          <label>Tersedia Area Parkir Kendaraan</label>
                                          <div class="-col-sm-12">
                                            <div class="radio radio-inline">
                                              <input type="radio" name="tersedia_parkir" id="tersedia_parkir-1" value="ya" checked="">
                                              <label for="tersedia_parkir-1">Ya</label>
                                            </div>
                                            <div class="radio radio-inline">
                                              <input type="radio" name="tersedia_parkir" id="tersedia_parkir-2" value="tidak">
                                              <label for="tersedia_parkir-2">Tidak</label>
                                            </div>
                                          </div>
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
                                    </div>
                                  </div>
                                </div>
                                </form>
                              </div>

                              <div id="step2" class="tab-pane fade">
                                <form action ="<?php echo base_url()?>registrasi/sekolah/do_add" id="formReg2" class="width-100" method="post">
                                <div class="row">
                                  <div class="col-md-10 mr-auto ml-auto">
                                    <h4 class="card-title">Nilai Raport/rata-rata nilai ulangan sebelumnya (Mapel yang diprivatkan)</h4>
                                    <div class="table-overflow">
                                      <table id="tabelInputNilai" class="table">
                                        <thead>
                                          <tr>
                                            <th class="text-center">#</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Nilai Raport/Rata-rata Nilai Ulangan</th>
                                            <th class="text-center"><a href="javascript:void(0);" class="btn btn-default no-mrg" data-id="" onclick="addRowNilai(event);" title="Tambahkan Input Nilai"> <i class="fa fa-plus"></i> </a></th>
                                          </tr>
                                        </thead>
                                        <tbody><!-- 
                                          <tr>
                                            <td class="text-center">
                                              <div class="list-info mrg-top-10">1</div>
                                            </td>
                                            <td><input type="text" name="nama_mapel[]" id="nama_mapel-1" class="form-control" placeholder="Nama mapel"></td>
                                            <td><input type="number" name="nilai_mapel[]" id="nilai_mapel-1" class="form-control" min="0" placeholder="Nilai"></td>
                                            <td class="text-center">
                                              <a href="javascript:void(0);" class="btn btn-default" data-id="" onclick="delRowNilai(event);" title="Hapus Input Nilai"> <i class="fa fa-minus"></i> </a>
                                            </td>
                                          </tr>
                                         --></tbody>
                                      </table>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label>Mata Pelajaran yang Disukai</label>
                                        <input type="text" name="mapel_suka" id="mapel_suka" class="form-control" placeholder="Mapel yang disukai">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label>Mata Pelajaran yang Tidak Disukai</label>
                                        <input type="text" name="mapel_benci" id="mapel_benci" class="form-control" placeholder="Mapel yang tidak disukai">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                </div>
                               </form>
                              </div>

                              <div id="step3" class="tab-pane fade">
                                <form action ="<?php echo base_url()?>registrasi/sekolah/do_add" id="formReg3" class="width-100" method="post">
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
                              
                              <div id="step4" class="tab-pane fade">
                                <form action ="<?php echo base_url()?>registrasi/sekolah/do_add" id="formReg4" class="width-100" method="post">
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

                              <div id="step5" class="tab-pane fade">
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
          
          <!-- Modal START-->
          <!-- <div class="modal fade" id="modalForm">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form action="<?php echo base_url()?>master/unit/do_add" method="POST" id="formAdd">      
                  <div class="modal-header">
                    <h4 id="modalFormHeader">Tambah Unit/Cabang</h4>
                  </div>
                  <div class="modal-body">
                   <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                         <label for="nama">Nama Unit</label>
                         <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Unit" required="">
                         <input type="hidden" name="id" id="id" class="form-control" placeholder="ID Unit">
                       </div>
                     </div>
                     <div class="col-sm-6">
                       <div class="form-group">
                         <label for="level">Admin Unit</label>
                         <select name="akun_id" id="akun_id" class="" required="">
                         </select>
                       </div>
                     </div>
                     <div class="col-sm-6">
                       <div class="form-group">
                         <label for="provinsi">Provinsi</label>
                         <select name="provinsi_id" id="provinsi" class="" required="">
                         </select>
                       </div>
                     </div>
                     <div class="col-sm-6">
                       <div class="form-group">
                         <label for="kota">Kota</label>
                         <select name="kabkota_id" id="kota" class="" required="" disabled="">
                         </select>
                       </div>
                     </div>
                     <div class="col-sm-6">
                       <div class="form-group">
                         <label for="kecamatan">Kecamatan</label>
                         <select name="kecamatan_id" id="kecamatan" class="" required="" disabled="">
                         </select>
                       </div>
                     </div>
                     <div class="col-sm-6">
                       <div class="form-group">
                         <label for="kelurahan">Kelurahan</label>
                         <select name="kelurahan_id" id="kelurahan" class="" required="" disabled="">
                         </select>
                       </div>
                     </div>
                     <div class="col-sm-12">
                       <div class="form-group">
                         <label for="kota">Alamat</label>
                         <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat" required="">
                       </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                         <label for="no_telp">No. Telepon</label>
                         <input type="text" name="no_telp" id="no_telp" class="form-control" placeholder="No. Telepon" required="">
                       </div>
                     </div>
                   </div>
                  </div>
                  <div class="modal-footer">
                    <div class="text-right">
                      <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="ti-close pdd-right-5"></i>Batal</button>
                      <button type="submit" id="btnSubmit" class="btn btn-primary btn-sm"><i class="ti-save pdd-right-5"></i>Simpan</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div> -->
          <!-- Modal END-->             
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
    var jsonAgama = <?php echo json_encode($list_agama)?>;
    var jsonProvinsi = <?php echo json_encode(get_provinsi()->result())?>;
    var jsonKota = <?php echo json_encode(get_kota()->result())?>;
    var jsonKecamatan = [];
    var jsonKelurahan = [];
    var jsonAkun = <?php echo json_encode($list_akun)?>;

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
    addRowNilai();

    function loadTabelUnit(json){
      //clear table
      tableData.clear().draw();
      for(var i=0, data; data = json[i]; i++) {
        tableData.row.add([
          '<div class="checkbox mrg-left-20">'
            +'<i style="display:none">'+data.id+'</i>'
            +'<input id="task-'+data.id+'" value="'+data.id+'" name="task[]" type="checkbox">'
              +'<label for="task-'+data.id+'"></label>'
          +'</div>',
          '<div class="list-info mrg-top-10">'
              +'<p>'+data.nama+'<p>'
          +'</div>',
          '<div class="list-info mrg-top-10">'
              +'<p>'+data.alamat+'<p>'
          +'</div>',
          '<div class="list-info mrg-top-10">'
              +'<p>'+data.nama_kabkota+'<p>'
          +'</div>',
          '<div class="list-info mrg-top-10">'
              +'<p>'+data.nama_provinsi+'<p>'
          +'</div>',
          '<div class="list-info mrg-top-10">'
              +'<p>'+data.no_telp+'<p>'
          +'</div>',
          '<div class="list-info mrg-top-10">'
            +'<div class="info no-pdd">'
              +'<span class="title">'+data.nama_akun+'</span>'
              +'<span class="sub-title">ID '+data.id_akun+'</span>'
            +'</div>'
          +'</div>',
          '<div class="relative mrg-top-10">'
            +'<div class="btn-group">'
              +'<a href="javascript:void(0);" class="btn btn-default edit-notif" data-id="'+data.id+'" onclick="showModalForm(event);" title="Ubah data"> <i class="ti-pencil-alt"></i> </a>'
              +'<a href="" class="btn btn-default text-danger delete-notif" data-id="'+data.id+'" onclick="prepDelete(event);" title="Hapus data"> <i class="ti-trash"></i> </a>'
            +'</div>'
          +'</div>'
        ]).draw( false );
      }
    }
    /*function getDetail(id, callback) {
      if(id) {
        $.ajax({
          url: '<?php echo base_url();?>master/unit/get_unit_by_id',
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
    var selectizeAgama, $selectizeAgama;
    var selectizeProvinsi, $selectizeProvinsi;
    var selectizeKota, $selectizeKota;
    var selectizeKecamatan, $selectizeKecamatan;
    var selectizeKelurahan, $selectizeKelurahan;
    var selectizeAkun, $selectizeAkun;
    //loading select option agama
    // $selectizeAgama = $('[name="agama_id"]').selectize({
    //   options: $.map(jsonAgama, function(data, i) {
    //     return [{ value: data.id, text: data.nama }];
    //   }),
    //   create: false,
    //   sortField: { field: 'value', direction: 'asc' },
    //   placeholder: 'Pilih Agama',
    //   // valueField: 'value', labelField: 'name', dropdownParent: 'body'
    // });
    //loading select option provinsi
    /*$selectizeProvinsi = $('#provinsi').selectize({
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
            xhr = $.post("<?php echo base_url()?>master/unit/get_kecamatan_by_kota", {id: val}, function(response, status) {
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
            xhr = $.post("<?php echo base_url()?>master/unit/get_kelurahan_by_kecamatan", {id: val}, function(response, status) {
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
    $selectizeAkun = $('#akun_id').selectize({
      options: $.map(jsonAkun, function(data, i) {
        return [{ value: data.id, text: data.nama }];
      }),
      create: false,
      sortField: { field: 'text', direction: 'asc' },
      placeholder: 'Pilih Akun Admin',
      // valueField: 'value', labelField: 'name', dropdownParent: 'body'
    });*/
    // selectizeAgama = $selectizeAgama[0].selectize;
    /*selectizeProvinsi = $selectizeProvinsi[0].selectize;
    selectizeKota = $selectizeKota[0].selectize;
    selectizeKecamatan = $selectizeKecamatan[0].selectize;
    selectizeKelurahan = $selectizeKelurahan[0].selectize;
    selectizeAkun = $selectizeAkun[0].selectize;*/

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

    //ADD NEW ROW TO INPUT NILAI TABLE
    function addRowNilai(e) {
      // e.preventDefault();
      let countRow = $('#tabelInputNilai tbody tr').length;
      if(countRow < 15) {
        let num = (countRow+1);
        let html = '<tr>'
                  +'<td class="text-center">'
                    +'<div class="list-info mrg-top-10">'+num+'</div>'
                  +'</td>'
                  +'<td><input type="text" name="nama_mapel[]" class="form-control" placeholder="Nama mapel"></td>'
                  +'<td><input type="number" name="nilai_mapel[]"  class="form-control" min="0" placeholder="Nilai"></td>'
                  +'<td class="text-center">'
                    +'<a href="javascript:void(0);" class="btn btn-default"  onclick="delRowNilai(event);" title="Hapus Input Nilai"> <i class="fa fa-minus"></i> </a>'
                  +'</td>'
                +'</tr>';
        $(html).appendTo('#tabelInputNilai tbody').hide().fadeIn();
      }
    }
    //REMOVE ROW FROM INPUT NILAI TABLE
    function delRowNilai(e) {
      e.preventDefault();
      let target = $(e.currentTarget).closest('tr');
      let countRow = $('#tabelInputNilai tbody tr').length;
      let num = $(e.currentTarget).data('id') || null;
      if(target && (countRow > 1)) {
        $(target).remove();
        //resetting table index number (#)
        $('#tabelInputNilai tbody tr').each(function(idx) {
          $(this).find('td:first-child').text(idx+1);
        });
      }
    }

    //SHOW MODAL FORM
    function showModalForm(e) {
      e.preventDefault();
      var id = $(e.currentTarget).data('id') || null;
      //clear inputs & selects
      $('#formAdd :input').val('');
      selectizeProvinsi.clear(); selectizeKota.clear();
      selectizeKecamatan.clear(); selectizeKelurahan.clear(); 
      selectizeAkun.clear();
      //jika klik tombol tambah data:
      if(!id) {
        $('#formAdd').attr('action', "<?php echo base_url()?>master/unit/do_add");
        $('#modalFormHeader').text('Tambah Unit/Cabang');
        $('#modalForm').modal('show');
      }
      //jika klik tombol edit data:
      else {
        $('#formAdd').attr('action', "<?php echo base_url()?>master/unit/do_edit");
        $('#modalFormHeader').text('Ubah Unit/Cabang');
        getDetail(id);
      }
    }
    
    //prepare delete 1 data
    function prepDelete(e) {
      e.preventDefault();
      var id = $(e.currentTarget).data('id') || null;
      var arrIds = [id];
      if(id) {
        doMultiDelete(arrIds);
      }
    }
    //prepare delete multi data
    function prepMultiDelete(e) {
      e.preventDefault();
      //collecting checked checkbox values from table into array
      var checkedArray = $('#tableData input:checkbox:checked').map(function() {
          return $(this).val();
      }).get();
      // console.log(checkedArray);
      if(id) {
        doMultiDelete(checkedArray);
      }
    }

    //MULTI DELETE HANDLER
    function doMultiDelete(arrData) {
      let ids = arrData || [];
      if(ids[0] != null) {
        //konfirmasi hapus banyak data
        swal({
          title: "Hapus data?",
          text: "Data yang telah dihapus tidak akan bisa dikembalikan lagi",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Ya, hapus data!",
          },
        function(isConfirm){
          if(isConfirm) {
            //Hapus banyak data
            $.ajax({
              url: "<?php echo base_url()?>master/unit/do_delete",
              data: { ids: ids },
              type: 'POST',
              dataType: 'json',
              beforeSend: function() { 
                $('.delete-notif').prop('disabled', true); 
                $.LoadingOverlay("show"); 
              },
              success: function(response, status) {
                if(response.status) {
                  // console.log(response);
                  if(response.result) {
                    showNoty(response.message, 'success');
                    loadTabelUnit(response.data);
                  }
                  else {
                    showNoty(response.message, 'warning');
                  }
                }
                else {
                  showNoty('Anda belum memilih data untuk dihapus! <br> <small>Centang checkbox pada tabel untuk memilih baris yang ingin dihapus</small>',
                   'warning');
                }
                $('#modalForm').modal('hide');
              },
              error: function(jqXhr, message, errorThrown){
                console.log('Request error!', message);
                showNoty('Error! Perintah tidak dapat dijalankan', 'error');
              }
            });
            $('.delete-notif').prop('disabled', false); 
            $.LoadingOverlay("hide");
          }
          else {
            return;
          }
        });
      }
      else {
        showNoty('Anda belum memilih data untuk dihapus! <br> <small>Centang checkbox pada tabel untuk memilih baris yang ingin dihapus</small>',
               'warning');
      }
    }

    //MODAL FORM SUBMIT HANDLER
    function doSubmit(form, event) {
      event.preventDefault();
      let arrData = {
            siswa:$("#formReg1 *[name]").serialize(),
            ayah: $("#formReg2 #dataAyah *[name]").serialize(),
            ibu: $("#formReg2 #dataIbu *[name]").serialize(),
            kesehatan: $("#formReg3 *[name]").serialize(),
            isian: $("#formReg4 *[name]").serialize()
          };
      // console.log($("#formReg #step1 *[name]").serialize());
      // let id = $('#id').val() || '';
      if(form) {
        $.ajax({
          url: '<?php echo base_url()?>registrasi/sekolah/do_add',
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
                loadTabelUnit(response.data);
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
    return true;
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