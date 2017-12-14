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
  <link rel="stylesheet" href="<?php echo URL_PLUGIN?>selectize/dist/css/selectize.default.css" />
  <link rel="stylesheet" href="<?php echo URL_PLUGIN?>bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" />

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
              <h4>Siswa Bimbel
                <div class="pull-right">
                  <a href="<?php echo base_url()?>registrasi/bimbel/" class="btn btn-rounded btn-success edit-notif" title="Tambah data"><i class="ti-plus pdd-right-5"></i> Tambah</a>
                  <a href="javascript:void(0)" id="btnDelete" class="btn btn-rounded btn-danger delete-notif" onclick="prepMultiDelete(event);" title="Hapus banyak data"><i class="ti-trash pdd-right-5"></i> Hapus</a>
                </div>
              </h4>
            </div>
            <div class="row">
              <div class="col-md-12">
                  <div class="card">
                  <div class="card-block">
                    <div class="table-overflow">
                      <table id="tableData" class="table table-hover">
                        <thead>
                          <tr>
                            <th class="no-search"></th>
                            <th>Nama Lengkap</th>
                            <th>Kelas/Sekolah</th>
                            <th>Tempat, Tanggal Lahir</th>
                            <th>No. Telp/HP</th>
                            <th class="no-sort">Aksi</th>
                          </tr>
                        </thead>
                        <tbody> 

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

              </div>  
            </div>
          </div> 
          
          <!-- Modal START-->
          <div class="modal fade" id="modalForm">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <form action="<?php echo base_url()?>bimbel/siswa/do_add" method="POST" id="formAdd">      
                  <div class="modal-header">
                    <h4 id="modalFormHeader">Ubah Siswa</h4>
                  </div>
                  <div class="modal-body">
                                  
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
                          <input type="hidden" id="id" class="form-control" placeholder="ID Siswa">
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
                  <div class="modal-footer">
                    <div class="text-right">
                      <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="ti-close pdd-right-5"></i>Batal</button>
                      <button type="submit" id="btnSubmit" class="btn btn-primary btn-sm btn-submit"><i class="ti-save pdd-right-5"></i>Simpan</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- Modal END-->    

          <!-- Modal FORM ORANG TUA  START-->
          <div class="modal fade" id="modalFormOrtu">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <form action="<?php echo base_url()?>bimbel/siswa/do_edit_ortu" method="POST" id="formAddOrtu">      
                  <div class="modal-header">
                    <h4 id="modalFormOrtuHeader">Ubah Orang TUa</h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-12">
                        <h4 id="peran">Ayah/Wali</h4>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Nama Lengkap</label>
                          <input type="text" name="nama_lengkap" id="nama_lengkap_ortu" class="form-control" placeholder="Nama Lengkap" required="">
                          <input type="hidden" id="idOrtu" placeholder="ID Ortu">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Pekerjaan</label>
                          <input type="text" name="pekerjaan" id="pekerjaan_ortu" class="form-control" placeholder="Pekerjaan" required="">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>No. Telepon/HP</label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="number" name="no_telp" id="no_telp_ortu" class="form-control" min="0" placeholder="Nomor Telepon" required="">
                            <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                            <input type="number" name="no_hp" id="no_hp_ortu" class="form-control" min="0" placeholder="Nomor HP">
                          </div>
                          <label for="no_telp_ortu" generated="true" class="error"></label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" name="email" id="email_ortu" class="form-control" placeholder="Email" required="">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Alamat Tinggal</label>
                          <input type="text" class="form-control" name="alamat" id="alamat_ortu" class="form-control" placeholder="Alamat Tinggal" required="">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <div class="text-right">
                      <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="ti-close pdd-right-5"></i>Batal</button>
                      <button type="submit" id="btnSubmitOrtu" class="btn btn-primary btn-sm btn-submit"><i class="ti-save pdd-right-5"></i>Simpan</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- Modal END-->    

          <!-- Modal Detail Orang Tua START-->
          <div class="modal fade" id="modalOrtu">
            <div class="modal-dialog modal-lg" role="document" style="max-width:1300px">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 id="modalOrtuHeader">Detail Orang Tua</h4>
                </div>
                <div class="modal-body">
                 <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-block">
                        <input type="hidden" id="idSiswa" class="form-control" placeholder="ID Siswa">
                        <table id="tableDataOrtu" class="table table-hover">
                          <thead>
                            <tr>
                              <th class="no-search">#</th>
                              <th>Nama Lengkap</th>
                              <th>Peran</th>
                              <th>Pekerjaan</th>
                              <th>Alamat</th>
                              <th>Email</th>
                              <th>No. Telp/HP</th>
                              <th class="no-sort">Aksi</th>
                            </tr>
                          </thead>
                          <tbody> 

                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                 </div>
                </div>
                <div class="modal-footer">
                  <div class="text-right">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="ti-close pdd-right-5"></i>Tutup</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal Detail Orang Tua END-->             

          <!-- Modal Detail isian START-->
          <div class="modal fade" id="modalIsian">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 id="modalIsianHeader">Detail Isian</h4>
                </div>
                <div class="modal-body">
                 <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-block">
                        <div id="modalIsianBody"></div>
                      </div>
                    </div>
                  </div>
                 </div>
                </div>
                <div class="modal-footer">
                  <div class="text-right">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="ti-close pdd-right-5"></i>Tutup</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal Detail Orang Tua END-->             
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
  <script src="<?php echo URL_PLUGIN?>noty/js/noty/packaged/jquery.noty.packaged.min.js"></script>
  <script src="<?php echo URL_PLUGIN?>selectize/dist/js/standalone/selectize.min.js"></script>
  <script src="<?php echo URL_PLUGIN?>bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
  <script src="<?php echo URL_PLUGIN?>moment/min/moment.min.js"></script>

  <!-- build:js <?php echo URL_JS?>app.min.js -->
  <!-- core js -->
  <script src="<?php echo URL_JS?>app.js"></script>
  <script src="<?php echo URL_JS?>ui-elements/notification_custom.js"></script>
  <!-- endbuild -->

  <!-- page js -->
  <script src="<?php echo URL_JS?>table/data-table.js"></script>
  <script>
    //patch for multiple modal (http://jsfiddle.net/CxdUQ/)
    $(document).on('show.bs.modal', '.modal', function (event) {
        var zIndex = 1040 + (10 * $('.modal:visible').length);
        $(this).css('z-index', zIndex);
        setTimeout(function() {
            $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
        }, 0);
    });

    var jsonList = '';
    var jsonAgama = <?php echo json_encode($list_agama)?>;
    var jsonUnit = <?php echo json_encode($list_unit)?>;
    var jsonProvinsi = <?php echo json_encode(get_provinsi()->result())?>;
    var jsonKota = <?php echo json_encode(get_kota()->result())?>;
    var jsonKecamatan = '';
    var jsonKelurahan = '';
    var jsonOrtu = '';

    // INITIALIZE DATATABLE SERVERSIDE
    var initDataTable = $('#tableData').DataTable({
      "bProcessing": true,
      "bServerSide": true,
      "order": [[1, 'ASC']],
      "ajax":{
            url :"<?php echo base_url()?>bimbel/siswa/get_datatable",
            type: "post",  // type of method  , by default would be get
            error: function(){  // error handling code
              // $("#employee_grid_processing").css("display","none");
            }
          },
      "columnDefs": [ {
        "targets"  : 'no-sort',
        "orderable": false,
      },{
        "targets"  : 'no-search',
        "searchable": false,
      }],
      "drawCallback": function( settings ) { }
    });
    // INITIALIZE DATATABLE ORTU
    var tableDataOrtu = $("#tableDataOrtu").DataTable({
      "columnDefs": [ 
            { "targets": "no-sort", "searchable": false, "orderable": false },
            { "targets": "no-search", "searchable": false, "orderable": true } 
          ],
          "order": [[ 1, 'asc' ]]    
    });
    tableDataOrtu.on( 'order.dt search.dt', function () {
      // tableData.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
      //     cell.innerHTML = '';
      // });
    }).draw();

    //loading table body with json data
    // loadTabelOrtu(jsonOrtu);

    function loadTabelOrtu(json){
      //clear table
      tableDataOrtu.clear().draw();
      if(json) {
        for(var i=0, data; data = json[i]; i++) {
          let peran = (data.peran == 1) ? 'Ayah' : ((data.peran == 2) ? 'Ibu' : 'Wali');
          tableDataOrtu.row.add( [
            '<div class="list-info mrg-top-10 text-center">'+ (i+1) +'</div>',
            '<div class="list-info mrg-top-10">'+ data.nama_lengkap +'</div>',
            '<div class="list-info mrg-top-10">'+ peran +'</div>',
            '<div class="list-info mrg-top-10">'+ data.pekerjaan +'</div>',
            '<div class="list-info mrg-top-10">'+ data.alamat +'</div>',
            '<div class="list-info mrg-top-10">'+ data.email +'</div>',
            '<div class="list-info mrg-top-10">'
              +'<div class="info no-pdd">'
                +'<p class="title">'+ data.no_telp +'<br>'+data.no_hp +'</p>'
              +'</div>'
            +'</div>',

            '<div class="relative mrg-top-10">'
              +'<div class="btn-group btn-sm">'
                +'<a href="javascript:void(0);" class="btn btn-default edit-notif" data-id="'+data.id+'" onclick="showModalFormOrtu(event);" title="Ubah data"> <i class="ti-pencil-alt"></i> </a>'
                +'<a href="" class="btn btn-default text-danger delete-notif" data-id="'+data.id+'" onclick="prepDelete(event,\'ortu\');" title="Hapus data"> <i class="ti-trash"></i> </a>'
              +'</div>'
            +'</div>'
          ] ).draw( false );
        }
      }
    }
    
    function getDetail(id, callback) {
      if(id) {
        $.ajax({
          url: '<?php echo base_url();?>bimbel/siswa/get_siswa_by_id',
          data: { id: id },
          type: 'POST',
          dataType: 'json',
          beforeSend: function() { },
          success: function(response, status) {
            if(response.status) {
              var data = response.data;
              console.log(data);
              //fill id & nama kota for edit
              $('#id').val(data.id);
              $('#no_induk').val(data.no_induk);
              $('#nama_lengkap').val(data.nama_lengkap);
              $('#nama_panggilan').val(data.nama_panggilan);
              $('#kelas').val(data.kelas);
              $('#alamat').val(data.alamat);
              $('#tempat_lahir').val(data.tempat_lahir);
              $('#tanggal_lahir').datepicker('setDate', data.tanggal_lahir);
              $('#anak_ke').val(data.anak_ke);
              $('#jml_bersaudara').val(data.jml_bersaudara);
              $('#no_telp').val(data.no_telp);
              $('#no_hp').val(data.no_hp);
              $('#email').val(data.email);
              $('#pin_bb').val(data.pin_bb);
              $('#akun_fb').val(data.akun_fb);
              $('#akun_twitter').val(data.akun_twitter);
              $('#awal_masuk').datepicker('setDate', data.awal_masuk);
              $('#tutor_sebelumnya').val(data.tutor_sebelumnya);
              $('#unit_sebelumnya').val(data.unit_sebelumnya);
              $('#ranking').val(data.ranking);
              selectizeUnit.setValue(data.unit_id, false);
              selectizeAgama.setValue(data.agama_id, false);
              selectizeProvinsi.setValue(data.provinsi_id, false);
              selectizeKota.setValue(data.kabkota_id, false);
              selectizeKecamatan.setValue(data.kecamatan_id, false);
              selectizeKelurahan.setValue(data.kelurahan_id, false);
              $("<input type='hidden' id='hddKecId' value='"+data.kecamatan_id+"' readonly=''>").insertAfter("#kecamatan");
              $("<input type='hidden' id='hddKelId' value='"+data.kelurahan_id+"' readonly=''>").insertAfter("#kelurahan");
              // $('input:radio[name=tersedia_parkir]').val([data.tersedia_parkir]);

              $('#modalForm').modal('show');
            }
          },
          error: function(jqXhr, message, errorThrown){
            console.log('Request error!', message);
            showNoty('Error! Perintah tidak dapat dijalankan', 'error');
          }
        });
      }
    }
    function getDetailOrtu(id, callback) {
      if(id) {
          let data = $.grep(jsonOrtu, function(row, i) {
            return(row.id == id);
          });
          let peran = (data[0].peran == 1) ? 'Ayah' : ((data[0].peran == 2) ? 'Ibu' : 'Wali');
          //fill id & nama kota for edit
          $('#idOrtu').val(data[0].id);
          $('#peran').text(peran);
          $('#nama_lengkap_ortu').val(data[0].nama_lengkap);
          $('#pekerjaan_ortu').val(data[0].pekerjaan);
          $('#alamat_ortu').val(data[0].alamat);
          $('#no_telp_ortu').val(data[0].no_telp);
          $('#no_hp_ortu').val(data[0].no_hp);
          $('#email_ortu').val(data[0].email);
          // selectizeAgamaOrtu.setValue(data[0].agama_id, false);

          $('#modalFormOrtu').modal('show');
      }
    }
    
    //INITIALIZE DATEPICKER
    $('#tanggal_lahir, #tanggal_lahir_ortu, #awal_masuk').datepicker({
      format: "yyyy-mm-dd"
    });

    //INITIALIZE SELECTIZE
    var selectizeUnit, $selectizeUnit
    var selectizeAgama, $selectizeAgama
    // var selectizeAgamaOrtu, $selectizeAgamaOrtu;
    var selectizeProvinsi, $selectizeProvinsi;
    var selectizeKota, $selectizeKota;
    var selectizeKecamatan, $selectizeKecamatan;
    var selectizeKelurahan, $selectizeKelurahan;
    var unitOptions = {
      options: $.map(jsonUnit, function(data, i) {
        return [{ value: data.id, text: data.nama }];
      }),
      create: false,
      sortField: { field: 'value', direction: 'asc' },
      placeholder: 'Pilih Unit/Cabang',
      // valueField: 'value', labelField: 'name', dropdownParent: 'body'
    }
    $selectizeUnit = $('#unit').selectize(unitOptions);
    //loading select option agama
    var agamaOptions = {
      options: $.map(jsonAgama, function(data, i) {
        return [{ value: data.id, text: data.nama }];
      }),
      create: false,
      sortField: { field: 'value', direction: 'asc' },
      placeholder: 'Pilih Agama',
      // valueField: 'value', labelField: 'name', dropdownParent: 'body'
    }
    $selectizeAgama = $('#agama').selectize(agamaOptions);
    // $selectizeAgamaOrtu = $('#agama_ortu').selectize(agamaOptions);
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
            xhr = $.post("<?php echo base_url()?>bimbel/siswa/get_kecamatan_by_kota", {id: val}, function(response, status) {
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
            xhr = $.post("<?php echo base_url()?>bimbel/siswa/get_kelurahan_by_kecamatan", {id: val}, function(response, status) {
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
    selectizeUnit = $selectizeUnit[0].selectize;
    selectizeAgama = $selectizeAgama[0].selectize;
    // selectizeAgamaOrtu = $selectizeAgamaOrtu[0].selectize;
    selectizeProvinsi = $selectizeProvinsi[0].selectize;
    selectizeKota = $selectizeKota[0].selectize;
    selectizeKecamatan = $selectizeKecamatan[0].selectize;
    selectizeKelurahan = $selectizeKelurahan[0].selectize;
    
    //initialize form validation
    formValidation = $("#formAdd").validate({
      ignore: ':hidden:not([class~=selectized]),:hidden > .selectized, .selectize-control .selectize-input input',
            rules: {
                "provinsi_id": "required", "kabkota_id": "required", "kecamatan_id": "required"
            },
      validClass : '',
      submitHandler: function(form) {
        // form.submit();
        doSubmit(form);
      }
     });
     //initialize form validation ortu
    formValidationOrtu = $("#formAddOrtu").validate({
      ignore: ':hidden:not([class~=selectized]),:hidden > .selectized, .selectize-control .selectize-input input',
            rules: {
                // "provinsi_id": "required", "kabkota_id": "required", "kecamatan_id": "required"
            },
      validClass : '',
      submitHandler: function(form) {
        // form.submit();
        doSubmit(form, 'ortu');
      }
     });
    //clear/reset validation inside form modal on hide event
    $('#modalForm').on('hidden.bs.modal', function(e) {
      target = $(this).attr('id');
      formValidation.resetForm();
      $('#'+target+' .error').removeClass('error');
    }); 

    //SHOW MODAL FORM
    function showModalForm(e) {
      e.preventDefault();
      var id = $(e.currentTarget).data('id') || null;
      //clear inputs & selects
      $('#formAdd input:not([type=radio])').val('');
      /*selectizeProvinsi.clear(); selectizeKota.clear(); 
      selectizeKecamatan.clear();*/

      //jika klik tombol tambah data:
      if(!id) {
        $('#formAdd').attr('action', "<?php echo base_url()?>bimbel/siswa/do_add");
        $('#modalFormHeader').text('Tambah Siswa Bimbel');
        $('#modalForm').modal('show');
      }
      //jika klik tombol edit data:
      else {
        $('#formAdd').attr('action', "<?php echo base_url()?>bimbel/siswa/do_edit");
        $('#modalFormHeader').text('Ubah Siswa Bimbel');
        getDetail(id);
      }
    }
    //SHOW MODAL FORM
    function showModalFormOrtu(e) {
      e.preventDefault();
      var id = $(e.currentTarget).data('id') || null;
      //clear inputs & selects
      $('#formAddOrtu input:not([type=radio])').val('');
      /*selectizeProvinsi.clear(); selectizeKota.clear(); 
      selectizeKecamatan.clear();*/

      //jika klik tombol tambah data:
      if(!id) {
        $('#formAddOrtu').attr('action', "<?php echo base_url()?>bimbel/siswa/do_add_ortu");
        $('#modalFormOrtuHeader').text('Tambah Orang Tua Siswa Bimbel');
        $('#modalFormOrtu').modal('show');
      }
      //jika klik tombol edit data:
      else {
        $('#formAddOrtu').attr('action', "<?php echo base_url()?>bimbel/siswa/do_edit_ortu");
        $('#modalFormOrtuHeader').text('Ubah Orang Tua Siswa Bimbel');
        getDetailOrtu(id);
      }
    }

    // SHOW MODAL DETAIL ORTU
    function showDetailOrtu(e) {
      e.preventDefault();
      var id = $(e.currentTarget).data('id') || null;
      if(id) {
        $.ajax({
          url: '<?php echo base_url();?>bimbel/siswa/get_ortu_by_id',
          data: { siswa_id : id },
          type: 'POST',
          dataType: 'json',
          beforeSend: () => { $.LoadingOverlay("show"); },
          success: function(response, status) {
            if(response.status) {
              var data = response.data;
              jsonOrtu = data;
              loadTabelOrtu(data);
              $('#idSiswa').val(id);
              $('#modalOrtu').modal('show');
            }
          },
          error: function(jqXhr, message, errorThrown){
            console.log('Request error!', message);
            showNoty('Error! Perintah tidak dapat dijalankan', 'error');
          },
          complete: () => { $.LoadingOverlay("hide"); }
        });
      }
    }
    // SHOW MODAL DETAIL ISIAN
    function showDetailIsian(e) {
      e.preventDefault();
      var id = $(e.currentTarget).data('id') || null;
      if(id) {
        $.ajax({
          url: '<?php echo base_url();?>bimbel/siswa/get_isian_by_id',
          data: { siswa_id : id },
          type: 'POST',
          dataType: 'json',
          beforeSend: () => { $.LoadingOverlay("show"); },
          success: function(response, status) {
            if(response.status) {
              let data = response.data || '';
              var html = '<h5>Detail Isian Siswa</h5>'
                      +'<ol>';
              $.map(data, function(row, i) {
                html += '<li>'+row.pertanyaan
                      + '<br><p>'+(row.jawaban || "-")+'</p></li>';
              });
              html += '</ol>';

              if(data.length <= 0) {
                html = '<h5 class="text-center">Tidak ada data</h5>';
              }
              $('#modalIsianBody').html(html);
              $('#modalIsian').modal('show');
            }
          },
          error: function(jqXhr, message, errorThrown){
            console.log('Request error!', message);
            showNoty('Error! Perintah tidak dapat dijalankan', 'error');
          },
          complete: () => { $.LoadingOverlay("hide"); }
        });
      }
    }

    
    //prepare delete 1 data
    function prepDelete(e, targetTable='') {
      e.preventDefault();
      var id = $(e.currentTarget).data('id') || null;
      var arrIds = [id];
      if(id) {
        doMultiDelete(arrIds, targetTable);
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

    //multi delete handler
    function doMultiDelete(arrData, targetTable='') {
      let ids = arrData || [];
      let idSiswa = $('#idSiswa').val() || '';
      let url = "<?php echo base_url()?>bimbel/siswa/do_delete";
      if(targetTable == 'ortu') {
        url = "<?php echo base_url()?>bimbel/siswa/do_delete_ortu";
      }
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
              url: url,
              data: { ids: ids, idSiswa: idSiswa, table: targetTable },
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
                    if(targetTable == 'ortu') {
                      //reloading tableData ortu
                      jsonOrtu = response.data;
                      console.log(jsonOrtu);
                      loadTabelOrtu(response.data);
                    } else {
                      //reloading tableData siswa
                      initDataTable.ajax.reload();
                    }
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

    //modal form submit handler
    function doSubmit(form, targetTable='') {
      let id = $('#id').val() || '';
      let idSiswa = $('#idSiswa').val() || '';
      if(targetTable=='ortu') {
        id = $('#idOrtu').val() || '';
      }
      if(form) {
        $.ajax({
          url: $(form).attr('action'),
          data: $(form).serialize() + "&id="+id + "&idSiswa="+idSiswa,
          type: 'POST',
          dataType: 'json',
          beforeSend: function() { 
            $('.btn-submit').prop('disabled', true); 
            $.LoadingOverlay("show"); 
          },
          success: function(response, status) {
            if(response.status) {
              // console.log(response);
              if(response.result) {
                jsonList = response.data;
                showNoty(response.message, 'success');
                if(targetTable == 'ortu') {
                  //reloading tableData ortu
                  jsonOrtu = response.data;
                  loadTabelOrtu(response.data);
                } else {
                  //reloading tableData siswa
                  initDataTable.ajax.reload();
                }
              }
              else {
                showNoty(response.message, 'warning');
              }
            }
            else {
              showNoty('Terjadi kesalahan! Pastikan data yang anda masukkan sudah benar', 'warning');
            }
            $('#modalForm').modal('hide');
            $('#modalFormOrtu').modal('hide');
          },
          error: function(jqXhr, message, errorThrown){
            console.log('Request error!', message);
            showNoty('Error! Perintah tidak dapat dijalankan', 'error');
          }
        });
      }
      $('.btn-submit').prop('disabled', false); 
      $.LoadingOverlay("hide");
    }
  </script>

</body>

</html>