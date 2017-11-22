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
              <h4>Kelurahan
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
                            <th>Provinsi</th>
                            <th>Kota</th>
                            <th>Kecamatan</th>
                            <th>Kelurahan</th>
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
                <form action="<?php echo base_url()?>master/kelurahan/do_add" method="POST" id="formAdd">      
                  <div class="modal-header">
                    <h4 id="modalFormHeader">Tambah Kelurahan</h4>
                  </div>
                  <div class="modal-body">
                   <div class="row">
                     <div class="col-sm-6">
                       <div class="form-group">
                         <label for="provinsi">Provinsi</label>
                         <select name="" id="provinsi" class="" required="">
                         </select>
                       </div>
                     </div>
                     <div class="col-sm-6">
                       <div class="form-group">
                         <label for="kota">Kota</label>
                         <select name="" id="kota" class="" required="" disabled="">
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
                         <label for="nama_kelurahan">Nama Kelurahan</label>
                         <input type="text" name="nama_kelurahan" id="nama_kelurahan" class="form-control" placeholder="Nama Kelurahan" required="">
                         <input type="hidden" id="id" class="form-control" placeholder="ID Kelurahan">
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
  <script src="<?php echo URL_PLUGIN?>selectize/dist/js/standalone/selectize.min.js"></script>

  <!-- build:js <?php echo URL_JS?>app.min.js -->
  <!-- core js -->
  <script src="<?php echo URL_JS?>app.js"></script>
  <script src="<?php echo URL_JS?>ui-elements/notification_custom.js"></script>
  <!-- endbuild -->

  <!-- page js -->
  <script src="<?php echo URL_JS?>table/data-table.js"></script>
  <script>
    var jsonList = <?php echo json_encode(get_kota()->result())?>;
    var jsonProvinsi = <?php echo json_encode(get_provinsi()->result())?>;
    var jsonKota = <?php echo json_encode(get_kota()->result())?>;
    var jsonKecamatan = '';

    // Initialize datatable Serverside
    var initDataTable = $('#tableData').DataTable({
      "bProcessing": true,
      "bServerSide": true,
      "order": [[1, 'ASC']],
      "ajax":{
            url :"<?php echo base_url()?>master/kelurahan/get_datatable",
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
      "drawCallback": function( settings ) {
        // maskInputMoney();
      }
    });

    //loading table body with json data
    // loadTabelProvinsi(jsonList);
    
    function getDetail(id, callback) {
      if(id) {
        $.ajax({
          url: '<?php echo base_url();?>master/kelurahan/get_kelurahan_by_id',
          data: { id: id },
          type: 'POST',
          dataType: 'json',
          beforeSend: function() { },
          success: function(response, status) {
            if(response.status) {
              var data = response.data;
              //fill id & nama kota for edit
              $('#id').val(data.id);
              selectizeProvinsi.setValue(data.provinsi_id, false);
              selectizeKota.setValue(data.kabkota_id, false);
              selectizeKecamatan.setValue(data.kecamatan_id, false);
              $("<input type='hidden' id='hddKecId' value='"+data.kecamatan_id+"' readonly=''>").insertAfter("#kecamatan");
              $('#nama_kelurahan').val(data.nama_kelurahan);
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

    //INITIALIZE SELECTIZE
    var selectizeProvinsi, $selectizeProvinsi;
    var selectizeKota, $selectizeKota;
    var selectizeKecamatan, $selectizeKecamatan;
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
          selectizeKecamatan.clear(); selectizeKecamatan.disable(); 
        }
        else {
          selectizeKecamatan.disable(); selectizeKecamatan.clearOptions(); 
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
      // valueField: 'value', labelField: 'name', dropdownParent: 'body'
    });
    selectizeProvinsi = $selectizeProvinsi[0].selectize;
    selectizeKota = $selectizeKota[0].selectize;
    selectizeKecamatan = $selectizeKecamatan[0].selectize;
    
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
      //clear inputs & selects
      $('#formAdd :input').val('');
      selectizeProvinsi.clear(); selectizeKota.clear(); 
      selectizeKecamatan.clear();
      //jika klik tombol tambah data:
      if(!id) {
        $('#formAdd').attr('action', "<?php echo base_url()?>master/kelurahan/do_add");
        $('#modalFormHeader').text('Tambah Kelurahan');
        $('#modalForm').modal('show');
      }
      //jika klik tombol edit data:
      else {
        $('#formAdd').attr('action', "<?php echo base_url()?>master/kelurahan/do_edit");
        $('#modalFormHeader').text('Ubah Kelurahan');
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
              url: "<?php echo base_url()?>master/kelurahan/do_delete",
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
                    initDataTable.ajax.reload();
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
                jsonList = response.data;
                showNoty(response.message, 'success');
                initDataTable.ajax.reload();
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