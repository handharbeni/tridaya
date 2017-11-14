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
              <h4>Provinsi
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
                      <table id="tableData" class="table table-hover">
                        <thead>
                          <tr>
                            <th></th>
                            <th>Nama Provinsi</th>
                            <th>Aksi</th>
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
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form action="" method="POST" id="formAdd">      
                  <div class="modal-header">
                    <h4 id="modalFormHeader">Tambah Kelas</h4>
                  </div>
                  <div class="modal-body">
                   <div class="row">
                     <div class="col-sm-12">
                        <div class="form-group">
                         <label for="nama_provinsi">Nama Provinsi</label>
                         <input type="text" name="nama_provinsi" id="nama_provinsi" class="form-control" placeholder="Nama Provinsi" required="">
                         <input type="hidden" name="id" id="id" class="form-control" placeholder="ID Provinsi">
                       </div>
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
  <script src="<?php echo URL_PLUGIN?>jquery-loading-overlay/src/loadingoverlay.min.js"></script>
  <script src="<?php echo URL_PLUGIN?>sweetalert/lib/sweet-alert.js"></script>
  <script src="<?php echo URL_PLUGIN?>datatables/media/js/jquery.dataTables.js"></script>

  <!-- build:js <?php echo URL_JS?>app.min.js -->
  <!-- core js -->
  <script src="<?php echo URL_JS?>app.js"></script>
  <!-- endbuild -->

  <!-- page js -->
  <script src="<?php echo URL_JS?>table/data-table.js"></script>
  <script>
    var jsonList = <?php echo json_encode(get_provinsi()->result())?>;
    var initLoad = true;

    // initialize datatable
    var tableData = $("#tableData").DataTable({
      "columnDefs": [ {
              "searchable": false,
              "orderable": false,
              "targets": "no-sort"
          } ],
          // "order": [[ 1, 'asc' ]]    
    });
    tableData.on( 'order.dt search.dt', function () {
          tableData.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
              cell.innerHTML = '<div class="checkbox mrg-left-20">'
                +'<input id="task-'+i+'" name="task[]" type="checkbox">'
                  +'<label for="task-'+i+'"></label>'
              +'</div>';
          } );
    } ).draw();

    loadTabelProvinsi(jsonList);

    function loadTabelProvinsi(json){
      //clear table
      tableData.clear().draw();
      $.each(json, function(i, data) {
        tableData.row.add( [
              '',
              '<div class="list-info mrg-top-10">'
                  +'<p>'+data.nama_provinsi+'<p>'
              +'</div>',
              '<div class="relative mrg-top-10">'
                +'<div class="btn-group">'
                  +'<a href="javascript:void(0);" class="btn btn-default edit-notif" data-id="'+data.id+'" title="Ubah data"> <i class="ti-pencil-alt"></i> </a>'
                  +'<a href="" class="btn btn-default text-danger delete-notif" data-id="'+data.id+'" title="Hapus data"> <i class="ti-trash"></i> </a>'
                +'</div>'
              +'</div>'
          ] ).draw( false );
      });
      if (!initLoad) {
        /*$('.divpopover').attr("data-content","ok");
        $('.divpopover').popover();*/
      }
      initLoad = false;  
    }
    function getProvinsiById(id, callback) {
      if(id) {
        $.ajax({
          url: '<?php echo base_url();?>master/provinsi/get_provinsi_by_id',
          data: { ids: id },
          type: 'POST',
          dataType: 'json',
          beforeSend: function() { },
          success: function(response, status) {
            if(response.status) {
              var data = response.data;
              $('#id').val(data.id);
              $('#nama_provinsi').val(data.nama_provinsi);
            }
          },
          error: function(jqXhr, message, errorThrown){
            console.log('Request error!', message);
          }
        });
        $('#modalForm').modal('show')
      }
    }

    $('.edit-notif').on('click', function(e) {
      e.preventDefault();
      var id = $(e.currentTarget).data('id') || null;
      if(!id) {
        $('#modalFormHeader').text('Tambah Provinsi');
        $('#formAdd :input').val('');
        $('#modalForm').modal('show');
      }
      else {
        $('#modalFormHeader').text('Ubah Provinsi');
        getProvinsiById(id);
      }
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