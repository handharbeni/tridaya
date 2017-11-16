// Load Select Wilayah JavaScripts

//load select provinsi
function loadSelectProvinsi(targetId='#provinsi_id', json){
  var html = "<option value='' selected disabled>Pilih Provinsi</option>";
  for (var i=0, item; item = json[i]; i++){
   html = html+ "<option value='"+item.id+"'>"+item.nama_provinsi+"</option>";
 }
 $(targetId).html(html);
}

//load select kota
function loadSelectKota(targetId='#kota_id', json){
  var html = "<option value='' selected disabled>Pilih Kota/Kabupaten</option>";
  for (var i=0, item; item = json[i]; i++){
   html = html+ "<option value='"+item.id+"'>"+item.nama_kabkota+"</option>";
 }
 $(targetId).html(html);
}

//load select kecamatan
function loadSelectKecamatan(targetId='#kecamatan_id', json){
  var html = "<option value='' selected disabled>Pilih Kecamatan</option>";
  for (var i=0, item; item = json[i]; i++){
   html = html+ "<option value='"+item.id+"'>"+item.nama_kecamatan+"</option>";
 }
 $(targetId).html(html);
}

//load select kelurahan
function loadSelectKelurahan(targetId='#kelurahan_id', json){
  var html = "<option value='' selected disabled>Pilih Kelurahan</option>";
  for (var i=0, item; item = json[i]; i++){
   html = html+ "<option value='"+item.id+"'>"+item.nama_kelurahan+"</option>";
 }
 $(targetId).html(html);
}

//load select kelurahan
function loadSelectKodePos(targetId='#kodepos_id', json){
  var html = "<option value='' selected disabled>Pilih Kode Pos</option>";
  for (var i=0, item; item = json[i]; i++){
   html = html+ "<option value='"+item.id+"'>"+item.no_kodepos+"</option>";
 }
 $(targetId).html(html);
}
