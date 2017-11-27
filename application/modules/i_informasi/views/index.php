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
  <link rel="stylesheet" href="<?php echo URL_PLUGIN?>summernote/dist/summernote.css" />
  <link rel="stylesheet" href="<?php echo URL_PLUGIN?>bootstrap-toggle/css/bootstrap-toggle.min.css" />

  <!-- core css -->
  <link href="<?php echo URL_CSS?>ei-icon.css" rel="stylesheet">
  <link href="<?php echo URL_CSS?>themify-icons.css" rel="stylesheet">
  <link href="<?php echo URL_CSS?>font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo URL_CSS?>animate.min.css" rel="stylesheet">
  <link href="<?php echo URL_CSS?>app.css" rel="stylesheet">
  <style>
    /*Patch for bootstrap modal scroll problem*/
    .modal { overflow-y:auto; }
  </style>
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
                      <table id="tableData" class="table table-lg table-hover">
                        <thead>
                          <tr>
                            <th class="no-search"></th>
                            <th>Thumbnail</th>
                            <th>Kategori</th>
                            <th>Judul</th>
                            <th>Informasi</th>
                            <th>Timestamp</th>
                            <th class="no-sort">Aksi</th>
                          </tr>
                        </thead>
                        <tbody> </tbody>
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
                    <button type="button" id="btnFullScreen" class="btn btn-default pull-right"><i class="ei-full-screen" title="Full Screen"></i></button>
                  </div>
                  <div class="modal-body">
                   <div class="row">
                     <div class="col-sm-6">
                       <div class="form-group">
                         <label for="unit_id">Unit Cabang</label>
                         <select  onchange="" name="unit_id" id="unit" class="  " required="">
                         </select>
                       </div>
                     </div>
                     <div class="col-sm-6">
                       <div class="form-group">
                         <label for="kategori_id">Kategori</label>
                         <select  onchange="" name="kategori_id" id="kategori" class="" required="">
                         </select>
                       </div>
                     </div>
                     <div class="col-sm-8">
                        <div class="form-group">
                         <label for="judul">Judul</label>
                         <input type="text" name="judul" id="judul" class="form-control" placeholder="Judul Informasi" required="">
                         <input type="hidden" name="id" id="id" class="form-control" placeholder="ID Informasi">
                       </div>
                     </div>
                     <div class="col-sm-4">
                     <div class="form-group">
                       <label for="thumbnail">Thumbnail</label>
                       <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                     </div>
                    </div>
                     <div class="col-sm-12">
                       <div class="form-group">
                         <label for="konten">Konten Informasi</label>
                         <textarea name="konten" id="konten"></textarea>
                       </div>
                    </div>
                    <div class="col-sm-8">
                     <div class="form-group">
                       <label for="tags">Tags</label>
                       <select multiple onchange="" name="tags[]" id="tags" class="item-info" required="">
                       </select>
                     </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="published">Status Publish</label><br>
                        <input type="checkbox" name="" id="published">
                        <input type="hidden" name="published" id="hddPublished" value="0">
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
  <script src="<?php echo URL_PLUGIN?>noty/js/noty/packaged/jquery.noty.packaged.min.js"></script>
  <script src="<?php echo URL_PLUGIN?>datatables/media/js/jquery.dataTables.js"></script>
  <script src="<?php echo URL_PLUGIN?>jquery-validation/dist/jquery.validate.min.js"></script>
  <script src="<?php echo URL_PLUGIN?>selectize/dist/js/standalone/selectize.min.js"></script>
  <script src="<?php echo URL_PLUGIN?>summernote/dist/summernote.min.js"></script>
  <script src="<?php echo URL_PLUGIN?>bootstrap-toggle/js/bootstrap-toggle.min.js"></script>

  <!-- build:js <?php echo URL_JS?>app.min.js -->
  <!-- core js -->
  <script src="<?php echo URL_JS?>app.js"></script>
  <script src="<?php echo URL_JS?>ui-elements/notification_custom.js"></script>
  
  <!-- endbuild -->

  <!-- page js -->
  <script src="<?php echo URL_JS?>table/data-table.js"></script>
  <script>
    var jsonTags = <?php echo json_encode($list_tag)?>;
    var jsonUnit = <?php echo json_encode($list_unit)?>;
    var jsonKategori = <?php echo json_encode($list_kategori)?>;

    $('#btnFullScreen').on('click', function(e) {
      e.preventDefault();
      let modalClass = ['modal-sm', 'modal-md', 'modal-lg'];
      $('#modalForm').toggleClass('modal-fs');
    })

    //INITIALIZE SUMMERNOTE WYSIWYG EDITOR
    var editorInformasi = $("#konten").summernote({
      height: 200
    });

    //INITIALIZE BOOTSTRAP TOGGLE
    var togglePublish = $('#published').bootstrapToggle({
      on: 'Published', off: 'Draft',
      onstyle: 'success', offstyle: 'default', 
      style: 'ios', width: '150', /*height: '42'*/
    });
    $("#published").on('change', function(event) {
      let toggleVal = ($(this).prop('checked')) ? '1' : '0';
      $("#hddPublished").val(toggleVal);
      console.log( $("#hddPublished").val() );
    })

    // INITIALIZE DATATABLE SERVERSIDE
    var initDataTable = $('#tableData').DataTable({
      "bProcessing": true,
      "bServerSide": true,
      "order": [[1, 'ASC']],
      "ajax":{
            url :"<?php echo base_url()?>informasi/informasi/get_datatable",
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

    function getDetail(id, callback) {
      if(id) {
        $.ajax({
          url: '<?php echo base_url();?>informasi/informasi/get_informasi_by_id',
          data: { id: id },
          type: 'POST',
          dataType: 'json',
          beforeSend: function() { },
          success: function(response, status) {
            if(response.status) {
              var data = response.data;
              let toggleVal = parseInt(data.published) ? 'on' : 'off';
              //fill id & nama tingkat_jenjang for edit
              $('#id').val(data.id);
              selectizeUnit.setValue(data.unit_id, false);
              selectizeKategori.setValue(data.kategori_id, false);
              editorInformasi.summernote('code', data.konten);
              if(data.tags) {
                selectizeTags.setValue(Object.values(JSON.parse(data.tags)), false);
              }
              togglePublish.bootstrapToggle(toggleVal);
              $('#judul').val(data.judul);
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
    var selectizeKategori, $selectizeKategori;
    var selectizeUnit, $selectizeUnit;
    var selectizeTags, $selectizeTags;
    //loading select option unit
    $selectizeKategori = $('#kategori').selectize({
      options: $.map(jsonKategori, function(data, i) {
        return [{ value: data.id, text: data.nama }];
      }),
      create: false,
      sortField: { field: 'text', direction: 'asc' },
      placeholder: 'Pilih Kategori Informasi',
      // valueField: 'value', labelField: 'name', dropdownParent: 'body'
    });
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
    //loading select option tags
    $selectizeTags = $('#tags').selectize({
      plugins: ['remove_button'],
      options: $.map(jsonTags, function(data, i) {
        return [{ value: data.id, text: data.nama }];
      }),
      create: function(input, callback) {
        $.ajax({
          url: "<?php echo base_url()?>informasi/informasi/add_tags",
          data: { nama: input },
          type: 'POST',
          dataType: 'json',
          success: function (response, status) {
            if(response.status) {
              jsonTags = response.data;
              callback({ value: response.result, text: input });
            }
            else { callback(); }
          },
          error: function(jqXhr, message, errorThrown) {
            callback();
            console.log('Request error!', message);
            showNoty('Error! Perintah tidak dapat dijalankan', 'error');
          }
        });
      },
      sortField: { field: 'text', direction: 'asc' },
      placeholder: 'Pilih Tag',
      // valueField: 'value', labelField: 'name', dropdownParent: 'body'
    });
    selectizeKategori = $selectizeKategori[0].selectize;
    selectizeUnit = $selectizeUnit[0].selectize;
    selectizeTags = $selectizeTags[0].selectize;

    //INITIALIZE FORM VALIDATION
    formValidation = $("#formAdd").validate({
      ignore: ':hidden:not([class~=selectized],#summernote),:hidden > .selectized, .selectize-control .selectize-input input,.note-editable.panel-body',
            rules: { "unit_id": "required", "kategori_id": "required" },
      validClass : '',
      submitHandler: function(form ,event) {
        event.preventDefault();
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

    //SHOW MODAL FORM
    function showModalForm(e) {
      e.preventDefault();
      var id = $(e.currentTarget).data('id') || null;
      //clear inputs & selects
      $('#formAdd :input').val('');
      selectizeUnit.clear(); selectizeKategori.clear(); selectizeTags.clear();
      editorInformasi.summernote('reset');
      //jika klik tombol tambah data:
      if(!id) {
        $('#formAdd').attr('action', "<?php echo base_url()?>informasi/informasi/do_add");
        $('#modalFormHeader').text('Tambah Informasi');
        $('#modalForm').modal('show');
      }
      //jika klik tombol edit data:
      else {
        $('#formAdd').attr('action', "<?php echo base_url()?>informasi/informasi/do_edit");
        $('#modalFormHeader').text('Ubah Informasi');
        getDetail(id);
      }
    }

    //SHOW THUMBNAIL POPOVER
    function showThumbnail(el){
      var img_src = $(el).find("img").attr("src");
      $(el).attr("data-content","<img src='"+img_src+"' class=\'img-responsive\'  href=\'#\' style=\'width:100%\'>");
      $(el).popover("show");
    }
    //Hack untuk bootstrap popover (popover hilang jika diklik di luar)
    $(document).on('click', function (e) {
      $('[data-toggle="popover"],[data-original-title]').each(function () {
        //the 'is' for buttons that trigger popups
        //the 'has' for icons within a button that triggers a popup
        if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {                
            (($(this).popover('hide').data('bs.popover')||{}).inState||{}).click = false  // fix for BS 3.3.6
          }
        });
    });
    
    //PREPARE DELETE 1 DATA
    function prepDelete(e) {
      e.preventDefault();
      var id = $(e.currentTarget).data('id') || null;
      var arrIds = [id];
      if(id) {
        doMultiDelete(arrIds);
      }
    }
    //PREPARE DELETE MULTI DATA
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
              url: "<?php echo base_url()?>informasi/informasi/do_delete",
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

    //MODAL FORM SUBMIT HANDLER
    function doSubmit(form) {
      let id = $('#id').val() || '';
      let formData = new FormData($("#formAdd")[0]);
      // formData.append('id', id);
      if(form) {
        $.ajax({
          url: $(form).attr('action'),
          data: formData, /*+ "&id=" + id*/
          type: 'POST',
          dataType: 'json',
          cache: false,
          contentType: false,
          processData: false,
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