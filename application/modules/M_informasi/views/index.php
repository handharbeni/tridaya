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
  <link rel="stylesheet" href="<?php echo URL_PLUGIN?>summernote/dist/summernote.css" />

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
              <h4>Informasi
                <div class="pull-right">
                  <a href="javascript:void(0)" class="btn btn-rounded btn-success edit-notif"><i class="ti-plus pdd-right-5"></i> Tambah</a>
                </div>
              </h4>
            </div>
            <div class="row">
              <div class="col-md-12">
                  <div class="card">
                  <div class="card-block">
                    <div class="table-overflow">
                      <table id="dt-opt" class="table table-lg table-hover">
                        <thead>
                          <tr>
                            <th></th>
                            <th>Judul</th>
                            <th>Informasi</th>
                            <th>Timestamp</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <div class="checkbox mrg-left-20">
                                <input id="task21" name="task21" type="checkbox">
                                <label for="task21"></label>
                              </div>
                            </td>
                            <td>
                              <div class="list-info mrg-top-10">
                                <div class="info no-pdd">
                                  <span class="title">Siswa berprestasi 2017</span>
                                  <span class="sub-title">Unit Semarang</span>
                                </div>
                              </div>
                            </td>
                            <td>
                              <div class="relative mrg-top-15">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic accusamus voluptatum consequatur delectus iusto quas, asperiores quasi excepturi cumque numquam, iste eveniet, qui blanditiis quidem ex quisquam animi praesentium eum?</p>
                              </div>
                            </td>
                            <td>
                              <?php echo date('d-m-Y H:i');?>
                            </td>
                            <td>
                              <div class="relative mrg-top-10">
                                <div class="btn-group">
                                  <a href="javascript:void(0);" class="btn btn-default edit-notif" data-id="21" title="Ubah data"> <i class="ti-pencil-alt"></i> </a>
                                  <a href="" class="btn btn-default text-danger delete-notif" data-id="21" title="Hapus data"> <i class="ti-trash"></i> </a>
                                </div>
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td>
                              <div class="checkbox mrg-left-20">
                                <input id="task22" name="task22" type="checkbox">
                                <label for="task22"></label>
                              </div>
                            </td>
                            <td>
                              <div class="list-info mrg-top-10">
                                <div class="info no-pdd">
                                  <span class="title">Gaji guru dinaikkan</span>
                                  <span class="sub-title">Unit Surabaya</span>
                                </div>
                              </div>
                            </td>
                            <td>
                              <div class="relative mrg-top-15">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit necessitatibus quos totam ducimus molestias aut deleniti nihil nobis, dolores maiores error quaerat sit placeat possimus iste ipsam veniam quia, aperiam!</p>
                              </div>
                            </td>
                            <td>
                              <?php echo date('d-m-Y H:i');?>
                            </td>
                            <td>
                              <div class="relative mrg-top-10">
                                <div class="btn-group">
                                  <a href="javascript:void(0);" class="btn btn-default edit-notif" data-id="22" title="Ubah data"> <i class="ti-pencil-alt"></i> </a>
                                  <a href="" class="btn btn-default text-danger delete-notif" data-id="22" title="Hapus data"> <i class="ti-trash"></i> </a>
                                </div>
                              </div>
                            </td>
                          </tr>
                          
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
                <form action="" method="POST" id="formAdd">      
                  <div class="modal-header">
                    <h4 id="modalFormHeader">Tambah Informasi</h4>
                  </div>
                  <div class="modal-body">
                   <div class="row">
                     <div class="col-sm-6">
                       <div class="form-group">
                         <label for="id_unit">Unit Cabang</label>
                         <select  onchange="" name="id_unit" id="id_unit" class="form-control" required="">
                           <option value="0">Seluruh Unit</option>
                           <option value="1">Unit Surabaya</option>
                           <option value="2">Unit Semarang</option>
                         </select>
                       </div>
                     </div>
                     <div class="col-sm-12">
                        <div class="form-group">
                         <label for="nama">Judul</label>
                         <input type="text" name="nama" id="nama" class="form-control" placeholder="Judul Informasi" required="">
                         <input type="hidden" name="id" id="id" class="form-control" placeholder="ID Akun">
                       </div>
                     </div>
                     <div class="col-md-12">
                       <label for="informasi">Informasi</label>
                       <div name="informasi" id="informasi"></div>
                    </div>
                   </div>
                  </div>
                  <div class="modal-footer">
                    <div class="text-right">
                      <button class="btn btn-default btn-sm" data-dismiss="modal"><i class="ti-close pdd-right-5"></i>Batal</button>
                      <button class="btn btn-primary btn-sm" data-dismiss="modal"><i class="ti-save pdd-right-5"></i>Simpan</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- Modal END-->             
        </div>
        <!-- Content Wrapper END -->

        <!-- Footer START -->
        <footer class="content-footer">
          <div class="footer">
            <div class="copyright">
              <span>Copyright © 2017 <b class="text-dark">Illiyin Studio</b>. All rights reserved.</span>
              <span class="go-right">
    					  <a href="" class="text-gray mrg-right-15">Term &amp; Conditions</a>
    				    <a href="" class="text-gray">Privacy &amp; Policy</a>
    				  </span>
            </div>
          </div>
        </footer>
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
  <script src="<?php echo URL_PLUGIN?>sweetalert/lib/sweet-alert.js"></script>
  <script src="<?php echo URL_PLUGIN?>datatables/media/js/jquery.dataTables.js"></script>
  <script src="<?php echo URL_PLUGIN?>summernote/dist/summernote.min.js"></script>

  <!-- build:js <?php echo URL_JS?>app.min.js -->
  <!-- core js -->
  <script src="<?php echo URL_JS?>app.js"></script>
  
  <!-- endbuild -->

  <!-- page js -->
  <script src="<?php echo URL_JS?>table/data-table.js"></script>
  <script>
    $("#informasi").summernote({
      height: 200,
  });

    $('.edit-notif').on('click', function(e) {
      e.preventDefault();
      var id = $(e.currentTarget).data('id') || null;
      if(!id) {
        $('#modalFormHeader').text('Tambah Informasi');
      }
      else {
        $('#modalFormHeader').text('Ubah Informasi');
      }
      $('#modalForm').modal('show');
    })
    $('.delete-notif').on('click', function(e) {
      e.preventDefault();
      var id = $(e.currentTarget).data('id') || null;
      if(id) {
        swal({
          title: "Hapus data?",
        text: "Data yang telah dihapus tidak akan bisa dikembalikan lagi",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya, hapus data!",
        closeOnConfirm: false
      },
      function(){
        swal("Terhapus!", "Data berhasil dihapus.", "success");
      });
    }
  });
  </script>

</body>

</html>