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
              <h4>Jenjang Pendidikan
                <div class="pull-right">
                  <a href="javascript:void(0)" class="btn btn-rounded btn-success edit-notif" onclick="showModalForm(event);" title="Tambah data"><i class="ti-plus pdd-right-5"></i> Tambah</a>
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
                            <th>Nama Jenjang</th>
                            <th>Alias</th>
                            <!-- <th>Keterangan</th> -->
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
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form action="<?php echo base_url()?>master/jenjang/do_add" method="POST" id="formAdd">      
                  <div class="modal-header">
                    <h4 id="modalFormHeader">Tambah Jenjang Pendidikan</h4>
                  </div>
                  <div class="modal-body">
                   <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                         <label for="nama">Nama Jenjang</label>
                         <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Jenjang Pendidikan" required="">
                         <input type="hidden" id="id" class="form-control" placeholder="ID Jenjang">
                       </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                         <label for="alias">Alias</label>
                         <input type="text" name="alias" id="alias" class="form-control" placeholder="Alias Jenjang Pendidikan" required="">
                       </div>
                     </div>
                     <!-- <div class="col-sm-12">
                        <div class="form-group">
                         <label for="keterangan">Keterangan</label>
                         <textarea type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan" required=""></textarea>
                       </div>
                     </div> -->
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
          </div>
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
  <script src="<?php echo URL_PLUGIN?>noty/js/noty/packaged/jquery.noty.packaged.min.js"></script>

  <!-- build:js <?php echo URL_JS?>app.min.js -->
  <!-- core js -->
  <script src="<?php echo URL_JS?>app.js"></script>
  <script src="<?php echo URL_JS?>ui-elements/notification_custom.js"></script>
  <!-- endbuild -->

  <!-- page js -->
  <script src="<?php echo URL_JS?>table/data-table.js"></script>
  <script>
    var jsonList = <?php echo json_encode($list)?>;

    // initialize datatable
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
          "order": [[ 1, 'asc' ]]    
    });
    tableData.on( 'order.dt search.dt', function () {
      // tableData.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
      //     cell.innerHTML = '';
      // });
    }).draw();

    //loading table body with json data
    loadTabelJenjang(jsonList);
    
    function loadTabelJenjang(json){
      //clear table
      tableData.clear().draw();
      for(var i=0, data; data = json[i]; i++) {
        tableData.row.add( [
              '<div class="checkbox mrg-left-20">'
                +'<i style="display:none">'+data.id+'</i>'
                +'<input id="task-'+data.id+'" value="'+data.id+'" name="task[]" type="checkbox">'
                  +'<label for="task-'+data.id+'"></label>'
              +'</div>',
              '<div class="list-info mrg-top-10">'
                  +'<p>'+data.nama+'<p>'
              +'</div>',
              '<div class="list-info mrg-top-10">'
                  +'<p>'+data.alias+'<p>'
              +'</div>',
              // '<div class="list-info mrg-top-10">'
              //     +'<p>'+data.keterangan+'<p>'
              // +'</div>',
              '<div class="relative mrg-top-10">'
                +'<div class="btn-group">'
                  +'<a href="javascript:void(0);" class="btn btn-default edit-notif" data-id="'+data.id+'" onclick="showModalForm(event);" title="Ubah data"> <i class="ti-pencil-alt"></i> </a>'
                  +'<a href="" class="btn btn-default text-danger delete-notif" data-id="'+data.id+'" onclick="prepDelete(event);" title="Hapus data"> <i class="ti-trash"></i> </a>'
                +'</div>'
              +'</div>'
          ] ).draw( false );
      }
    }
    function getDetail(id, callback) {
      if(id) {
        $.ajax({
          url: '<?php echo base_url();?>master/jenjang/get_jenjang_by_id',
          data: { id: id },
          type: 'POST',
          dataType: 'json',
          beforeSend: function() { },
          success: function(response, status) {
            if(response.status) {
              var data = response.data;
              //fill id & nama provinsi for edit
              $('#id').val(data.id);
              $('#nama').val(data.nama);
              $('#alias').val(data.alias);
              // $('#keterangan').val(data.keterangan);
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
    
    //initialize form validation
    formValidation = $("#formAdd").validate({
      validClass : '',
      submitHandler: function(form) {
        // form.submit();
        doSubmit(form);
      }
     });
    //clear/reset validation inside form modal on hide event
    $('#modalForm').on('hidden.bs.modal', function(e) {
      target = $(this).attr('id');
      formValidation.resetForm();
      $('#'+target+' .error').removeClass('error');
    }); 

    //show modal form
    function showModalForm(e) {
      e.preventDefault();
      var id = $(e.currentTarget).data('id') || null;
      //jika klik tombol tambah data:
      if(!id) {
        $('#formAdd').attr('action', "<?php echo base_url()?>master/jenjang/do_add");
        $('#formAdd :input').val('');
        $('#modalFormHeader').text('Tambah Jenjang Pendidikan');
        $('#modalForm').modal('show');
      }
      //jika klik tombol edit data:
      else {
        $('#formAdd').attr('action', "<?php echo base_url()?>master/jenjang/do_edit");
        $('#modalFormHeader').text('Ubah Jenjang Pendidikan');
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

    //multi delete handler
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
              url: "<?php echo base_url()?>master/jenjang/do_delete",
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
                    loadTabelJenjang(response.data);
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
    function doSubmit(form) {
      let id = $('#id').val() || '';
      if(form) {
        $.ajax({
          url: $(form).attr('action'),
          data: $(form).serialize() + "&id=" + id,
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
                loadTabelJenjang(response.data);
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

</body>

</html>