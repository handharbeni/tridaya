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
  <link rel="stylesheet" href="<?php echo URL_PLUGIN?>fullcalendar/dist/fullcalendar.min.css" />
  <link rel="stylesheet" href="<?php echo URL_PLUGIN?>bootstrap-daterangepicker/daterangepicker.css" />
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
              <h4>Jadwal Sekolah (PG/TK/SD) - Kalender Akademik
              </h4>
            </div>
            
            <div class="row">
              <div class="col-md-4">
                <div class="card calendar-event">
                  <div class="card-block overlay-dark bg" style="background-image: url('<?php echo URL_IMG?>others/img-8.jpg')">
                    <div class="text-center">
                      <h1 class="font-size-65 text-light mrg-btm-5 lh-1"><?php echo date('j')?><span class="font-size-18"><?php echo date('S')?></span></h1>
                      <h2 class="no-mrg-top"><?php echo date('l')?></h2>
                    </div>
                  </div>
                  <div class="card-block">
                    <button type="button" class="add-event btn-warning" onclick="showModalForm(event);" title="Tambah Event">
                      <i class="ti-plus"></i>
                    </button>
                    <ul id="eventList" class="event-list">
                      
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div id='full-calendar'></div>
              </div>
            </div>        
          </div> 
          
          <!-- Modal START-->
          <div class="modal fade" id="modalForm">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form action="<?php echo base_url()?>sekolah/jadwal/do_add" method="POST" id="formAdd">      
                  <div class="modal-header">
                    <h4 id="modalFormHeader">Tambah Event</h4>
                  </div>
                  <div class="modal-body">
                   <div class="row">
                     <div class="col-sm-6">
                       <div class="form-group">
                         <label for="unit_id">Unit/Cabang</label>
                         <select name="unit_id" id="unit_id" class="" required="">
                         </select>
                       </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                         <label for="judul">Judul Event</label>
                         <input type="text" name="judul" id="judul" class="form-control" placeholder="Judul Event" required="">
                         <input type="hidden" name="id" id="id" class="form-control" placeholder="ID Jadwal">
                       </div>
                     </div>
                     <div class="col-sm-12">
                       <div class="form-group">
                         <label for="keterangan">Keterangan</label>
                         <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan Event"></textarea>
                       </div>
                     </div>
                     <div class="col-sm-12">
                        <div class="form-group">
                         <label for="waktu">Waktu Event</label>
                          <input type="text" name="waktu" id="waktu" class="form-control" value="" placeholder="Waktu Event (YYYY/MM/DD)" required="" />
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
  <script src="<?php echo URL_PLUGIN?>moment/min/moment.min.js"></script>
  <script src="<?php echo URL_PLUGIN?>fullcalendar/dist/fullcalendar.min.js"></script>
  <script src="<?php echo URL_PLUGIN?>fullcalendar/dist/gcal.js"></script>
  <script src="<?php echo URL_PLUGIN?>bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="<?php echo URL_PLUGIN?>bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
  <script src="<?php echo URL_PLUGIN?>bootstrap-timepicker/js/bootstrap-timepicker.js"></script>

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
    /*var jsonProvinsi = <?php echo json_encode(get_provinsi()->result())?>;
    var jsonKota = <?php echo json_encode(get_kota()->result())?>;
    var jsonKecamatan = [];
    var jsonKelurahan = [];*/
    var jsonEvent = <?php echo json_encode($list_event)?>;
    var jsonAkun = <?php echo json_encode($list_akun)?>;
    var jsonUnit = <?php echo json_encode($list_unit)?>;    

    //INITIALIZE CALENDAR
    $('#full-calendar').fullCalendar({
        height: 800,
        editable: false,
        header:{
            left: 'month,agendaWeek,agendaDay',
            center: 'title',
            right: 'today prev,next'
        },
        eventRender: function(event, element, view){
          // console.log(view.intervalStart);
          element.popover({
              animation:true,
              html: true,
              placement: 'top',
              delay: 300,
              content: '<label><b>'+event.title+'</b></label>'
                        +'<br><i>'+moment(event.start).format("DD/MM/YYYY H:mm A")+' - '+moment(event.end).format("DD/MM/YYYY H:mm A")+'</i>'
                        +'<br>'+event.desc,
              trigger: 'hover'
          });
        },
        eventClick: (event, jsEvent, view) => {
          /*swal({
            title: 'Keterangan',
            text: event.desc,
            type: 'info'
          });*/
        }
      });
      $(".fc-prev-button, .fc-next-button").on('click', function(e) {
        e.preventDefault();
        let date = $('#full-calendar').fullCalendar('getView').intervalStart.format() || '';
        getMonthEvents(date);
      });

    //LOADING TABLE BODY WITH JSON DATA
    loadEventList(jsonEvent);
    loadCalendarEvents(jsonEvent);

    function getDetail(id, callback) {
      if(id) {
        $.ajax({
          url: '<?php echo base_url();?>sekolah/jadwal/get_unit_by_id',
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
    }
    function getMonthEvents(date) {
      if(date) {
        $.ajax({
          url: '<?php echo base_url();?>sekolah/jadwal/request_jadwal_by_month',
          data: { date: date },
          type: 'POST',
          dataType: 'json',
          beforeSend: function() { $('#full-calendar').LoadingOverlay("show");  },
          success: function(response, status) {
            if(response.status) {
              var data = response.data;
              loadCalendarEvents(response.data);
            }
          },
          error: function(jqXhr, message, errorThrown){
            console.log('Request error!', message);
          } 
        });
        $('#full-calendar').LoadingOverlay("hide");
      }
    }

    function loadEventList(json) {
      let data = json || [];
      let html = ''; let bulletClass = '';
      let today = "<?php echo date('Y-m-d H:i:s')?>";
      $('#eventList').empty();
      $.map(data, function(row, i) {
        if(moment(row.end_date).isBefore(today)) { bulletClass = 'danger'; }
        else if (moment(row.start_date).isAfter(today)) { bulletClass = 'warning'; }
        else  { bulletClass = 'success'; }
        // bulletClass = moment(row.end_date).isBefore(today) ? 'danger' : (moment(row.start_date).isAfter(today) ? 'success' : 'warning');
        html += '<li class="event-items">'
            +'<a href="javascript:void(0);" data-id="'+row.id+'" data-toggle="modal" data-target="#calendar-edit">'
                +'<span class="bullet '+bulletClass+'"></span>'
                +'<span class="event-name">'+row.judul+'</span>'
                +'<div class="event-detail">'
                  +'<span>'+moment(row.start_date).format("DD/MM/YYYY") +' - ' +moment(row.end_date).format("DD/MM/YYYY")+'</span>'
                  // +'<i>Meetings</i>'
                +'</div>'
              +'</a>'
              +'<a href="javascript:void(0);" class="remove" data-id="'+row.id+'" onclick="prepDelete(event);" title="Hapus Event"> <i class="ti-trash"></i> </a>'
            +'</li>';
      });
      if(data.length <= 0) {
        html = '<h5 class="text-center">Tidak ada data</h5>';
      }
      $('#eventList').html(html);
    }

    function loadCalendarEvents(json) {
      let data = json || [];
      let events = [];
      $('#full-calendar').fullCalendar('removeEvents');
      if(data.length > 0) {
        let bulletClass = ''; 
        let today = "<?php echo date('Y-m-d H:i:s')?>";
        let colors = { danger: '#f9c5d7', success: '#b0ffb0', warning: '#f7e087'}
        events = $.map(data, function(row, i) {
          if(moment(row.end_date).isBefore(today)) { bulletClass = colors.danger; }
          else if (moment(row.start_date).isAfter(today)) { bulletClass = colors.warning; }
          else  { bulletClass = colors.success; }
          return {
              title: row.judul,
              start: new Date(row.start_date),
              end: new Date(row.end_date),
              desc: row.keterangan,
              color: bulletClass,
              // textColor: '#383838'
            };
        });
      }
      $('#full-calendar').fullCalendar('addEventSource', events);
    }
    
    //INITIALIZE SELECTIZE
    // var selectizeAkun, $selectizeAkun;
    var selectizeUnit, $selectizeUnit;
    $selectizeUnit = $('#unit_id').selectize({
      options: $.map(jsonUnit, function(data, i) {
        return [{ value: data.id, text: data.nama }];
      }),
      create: false,
      sortField: { field: 'text', direction: 'asc' },
      placeholder: 'Pilih Unit/Cabang',
      // valueField: 'value', labelField: 'name', dropdownParent: 'body'
    });
    selectizeUnit = $selectizeUnit[0].selectize;

    //INITIALIZE FORM VALIDATION
    formValidation = $("#formAdd").validate({
      ignore: ':hidden:not([class~=selectized]),:hidden > .selectized, .selectize-control .selectize-input input',
            rules: {
                "unit_id": "required"
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

    //INITIALIZE DATE RANGE PICKER
    $('#waktu').daterangepicker({ 
      drops: 'up', 
      timePicker: true,
      timePickerIncrement: 5,
      locale: {
        format: "YYYY/MM/DD H:mm:ss",
      }
    });

    //SHOW MODAL FORM
    function showModalForm(e) {
      e.preventDefault();
      var id = $(e.currentTarget).data('id') || null;
      //clear inputs & selects
      $('#formAdd :input').val('');
      /*selectizeProvinsi.clear(); selectizeKota.clear();
      selectizeKecamatan.clear(); selectizeKelurahan.clear(); 
      selectizeAkun.clear();*/
      selectizeUnit.clear();
      //jika klik tombol tambah data:
      if(!id) {
        $('#formAdd').attr('action', "<?php echo base_url()?>sekolah/jadwal/do_add");
        $('#modalFormHeader').text('Tambah Event');
        $('#modalForm').modal('show');
      }
      //jika klik tombol edit data:
      else {
        $('#formAdd').attr('action', "<?php echo base_url()?>sekolah/jadwal/do_edit");
        $('#modalFormHeader').text('Ubah Event');
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
              url: "<?php echo base_url()?>sekolah/jadwal/do_delete",
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
                    loadEventList(response.data);
                    loadCalendarEvents(response.data);
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
                loadEventList(response.data);
                loadCalendarEvents(response.data);
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