var statSetting = 0;
var statMenuMobile = 0;
var statNav = 0;

/*----MAIN BLADE----*/
$(document).ready(function(){
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $(window).on('resize',function(){
    var lebar = $(window).width();
    if (lebar <= 999) {
      $('.content-container').css('width','100%');
    } else {
      if (statNav == 1) {
       
      } else {
       
      }
    }
  });

  $('.tombol-nav-mobile').click(function(event){
      event.stopPropagation();
      if (statMenuMobile == 0) {
      $('#dropdown-menu-icon').removeClass('fa-caret-down');
      $('#dropdown-menu-icon').addClass('fa-caret-up');
      $('.navigasi-mobile').css({'marginTop':'40px','opacity':'1'});
      statMenuMobile = 1;
    } else {
      $('#dropdown-menu-icon').removeClass('fa-caret-up');
      $('#dropdown-menu-icon').addClass('fa-caret-down');
      $('.navigasi-mobile').css({'marginTop':'-1000px','opacity':'0'});
      statMenuMobile = 0;
    }
  });

  $('.list-mobile-menu').click(function(event){
    $('#dropdown-menu-icon').removeClass('fa-caret-up');
    $('#dropdown-menu-icon').addClass('fa-caret-down');
    $('.navigasi-mobile').css({'marginTop':'-1000px','opacity':'0'});
    statMenuMobile = 0;
  });

  

  $(document).on('click','#dropdown-setting-icon', function(){
    if (statSetting == 0) {
      $(this).removeClass('fa-caret-down');
      $(this).addClass('fa-caret-up');
      $('.user-setting').css({'marginTop':'40px','opacity':'1'});
      statSetting = 1;
    } else {
      $(this).removeClass('fa-caret-up');
      $(this).addClass('fa-caret-down');
      $('.user-setting').css({'marginTop':'-100px','opacity':'0'});
      statSetting = 0;
    }
  });

  $("#left").click(function(){
      $('#left').css('display','none');
      $('#right').css('display','block');
      $('.navigasi').css('width','5%');
      $('.nav-title').css('display','none');
      $('.content-container').css('width','95%');
      $('.parent, .parent-sub, .sub').css({'height':'40px','padding':'0'});
      $('.menu-icon').css({'position':'absolute','top':'50%','left':'60%','transform':'translate(-50%,-50%)'})
      $('.parent-dropdown-icon').css({'position':'absolute','top':'50%','left':'75%','transform':'translate(-50%,-50%)'})
      $('.notif').css({'position':'absolute','left':'3px','font-size':'9px'});
      statNav = 1;
  });

  $("#right").click(function(){
      $('#left').css('display','block');
      $('#right').css('display','none');
      $('.navigasi').css('width','19%');
      $('.nav-title').css('display','block');
      $('.content-container').css('width','81%');
      $('.parent, .parent-sub').css({'height':'unset','padding':'10px 15px 10px 25px'});
      $('.sub').css({'height':'unset','padding':'10px 15px 10px 35px'});
      $('.menu-icon').css({'position':'unset','top':'unset','left':'unset','transform':'unset'})
      $('.parent-dropdown-icon').css({'position':'unset','top':'unset','left':'unset','transform':'unset'})
      $('.notif').css({'position':'unset','left':'unset','font-size':'unset'});
      statNav = 0;
  });

  $('#form-tambah-map').submit(function(e){
    e.preventDefault();

    var options = {
      enableHighAccuracy: true,
      timeout: 5000,
      maximumAge: 0
    };
    
    function success(pos) {
      var crd = pos.coords;

      console.log('Your current position is:');
      console.log(`Latitude : ${crd.latitude}`);
      console.log(`Longitude: ${crd.longitude}`);
      console.log(`More or less ${crd.accuracy} meters.`);
    }

    function error(err) {
      console.warn(`ERROR(${err.code}): ${err.message}`);
    }

    navigator.geolocation.getCurrentPosition(success, error, options);

    //$.ajax({
      //  type : 'get',
      //  url : '/hris/validasi_map/',
      //  success:function(data)
      //  {
      //    alert(data);
      //  }
    //});

  });


  //$('#form-tambah').submit(function(e){
  //  e.preventDefault();
  //  $.ajax({
  //        type : 'post',
  //        url : '/hris/tambah_data',
  //        data:$('#form-tambah').serialize(),
  //        success:function(data)
  //        {
  //          alert('Data Berhasil Ditambah !');
  //          location.reload();
  //        }
  //    })
  //
  //});


  
    

  $('#cetak_pdf').click(function(e){
    e.preventDefault();
    document.getElementById('action').value = 'cetak_pdf';

    $('#form-report').submit();
  });

  $('#export_excel').click(function(e){
    e.preventDefault();
    document.getElementById('action').value = 'export_excel';

    $('#form-report').submit();
  });

  $('.id_supplier').select2();
  $('.id_barang').select2();

});

$(document).on('click','.parent', function(){
  $('.parent').removeClass('active');
  $('.sub').removeClass('active');
  $('.parent').removeClass('menuhover');
  $(this).addClass("active");
  $(this).children("i").css("color",'#b3b3b3');
});

$(document).on('click','.parent-sub', function(){
  if (!$(this).children('.parent-dropdown-icon').hasClass('fa-caret-down')) {
    $(this).children('.parent-dropdown-icon').removeClass("fa-caret-right");
    $(this).children('.parent-dropdown-icon').addClass("fa-caret-down");
  } else {
    $(this).children('.parent-dropdown-icon').removeClass("fa-caret-down");
    $(this).children('.parent-dropdown-icon').addClass("fa-caret-right");
    $(this).removeClass("active-sub");
  }
});

$(document).on('click','.sub', function(){
  $('.parent').removeClass('active');
  $('.sub').removeClass('active');
  $('.sub').removeClass('menuhover');
  $(this).addClass("active");
  $(this).children("i").css("color",'#b3b3b3');
});

function slide(menu){
  if($("#"+menu).hasClass("active-sub")) {
    $("#"+menu).removeClass("active-sub");
    $("#"+menu).slideUp();
  } else {
    $('.parent-sub').children('.parent-dropdown-icon').removeClass("fa-caret-down");
    $('.parent-sub').children('.parent-dropdown-icon').addClass("fa-caret-right");
    $('.child').removeClass('active-sub');
    $('.child').slideUp();
    $("#"+menu).addClass("active-sub");
    $("#"+menu).slideDown();
  }
  
}

function dropdownSetting() {
  if (statSetting == 0) {
    $('#dropdown-setting-icon').removeClass('fa-caret-down');
    $('#dropdown-setting-icon').addClass('fa-caret-up');
    $('.user-setting').css({'marginTop':'40px','opacity':'1'});
    statSetting = 1;
  } else {
    $('#dropdown-setting-icon').removeClass('fa-caret-up');
    $('#dropdown-setting-icon').addClass('fa-caret-down');
    $('.user-setting').css({'marginTop':'-100px','opacity':'0'});
    statSetting = 0;
  }
};

function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('livetime').innerHTML =
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
}

function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}




/*----LOAD FRAME----*/

function loadFrame(id) {
  $('#loader-wrap').fadeIn('fast');
  document.getElementById('content-frame').src = '/hris/'+id;
}

function loadFrameInside(id) {
  $('#loader-wrap').fadeIn('fast');
  window.parent.document.getElementById('content-frame').src = '/hris/'+id;
}





/*----BOOTSTRAP MODAL----*/


function popupView(route){
  $('#loader-wrap-modal').fadeIn('fast');

  $.ajax({
      type : 'get',
      url : '/hris/'+route,
      success:function(data)
      {
          document.getElementById('modal-content-view').innerHTML = data;
          $('#loader-wrap-modal').fadeOut('slow');
      }
  })
}

function popupViewDetail(route){
  $('.modal-detail').modal('hide');
  $('#loader-wrap-modal').fadeIn('fast');

  $.ajax({
      type : 'get',
      url : '/hris/'+route,
      success:function(data)
      {
          document.getElementById('modal-content-view').innerHTML = data;
          $('#loader-wrap-modal').fadeOut('slow');
      }
  })
}

function popupTambah(route){
  $('#loader-wrap-modal').fadeIn('fast');

  $.ajax({
      type : 'get',
      url : '/hris/'+route,
      success:function(data)
      {
          document.getElementById('modal-body').innerHTML = data;
          $('#loader-wrap-modal').fadeOut('slow');
      }
  })
}

function popupTambahDetail(route,idmenu,key){
  $('#modal-detail-'+idmenu).modal('hide');
  $('#loader-wrap-modal').fadeIn('fast');

  $.ajax({
      type : 'get',
      url : '/hris/'+route+'/'+key,
      success:function(data)
      {
          document.getElementById('modal-body-tambah-'+idmenu).innerHTML = data;
          $('#loader-wrap-modal').fadeOut('slow');
      }
  })
}

function uploadFile (route){
  $('#loader-wrap-modal').fadeIn('fast');

  $.ajax({
      type : 'get',
      url : '/hris/'+route,
      success:function(data)
      {
          document.getElementById('modal-body-upload').innerHTML = data;
          $('#loader-wrap-modal').fadeOut('slow');
      }
  })
}

function closeTambah(idmenu) {
  $('.modal-tambah').modal('hide');
  $('#modal-detail-'+idmenu).modal('show');
}

function closeEdit(idmenu) {
  $('.modal-edit').modal('hide');
  $('#modal-detail-'+idmenu).modal('show');
}

function kodeOrder(){
  $.ajax({
      type : 'get',
      url : '/hris/kode_order',
      success:function(data)
      {
      }
  })
}

function popupEdit(route){
  $('#loader-wrap-modal').fadeIn('fast');

  $.ajax({
      type : 'get',
      url : '/hris/'+route,
      success:function(data)
      {
          document.getElementById('modal-body-edit').innerHTML = data;
          $('#loader-wrap-modal').fadeOut('slow');
      }
  })
}

function popupDetail(idmenu){
  $('#loader-wrap-modal').fadeIn('fast');

  $.ajax({
      type : 'get',
      url : '/hris/'+idmenu,
      success:function(data)
      {
          document.getElementById('modal-body-detail').innerHTML = data;
          var table = $('#table-detail').removeAttr('width').DataTable({
              "scrollX": true,
              "scrollY": "80vh",
              "scrollCollapse": true,
               "columnDefs": [
                { "width": "3%", "targets": 0 }
              ],
              "fixedColumns": true
          });
          $(document).on('shown.bs.modal', '.modal-detail', function () {
              table.columns.adjust().draw();
          });
          $('#loader-wrap-modal').fadeOut('slow');
      }
  })
}

function popupApprove(route){
  $('#loader-wrap-modal').fadeIn('fast');

  $.ajax({
      type : 'get',
      url : '/hris/'+route,
      success:function(data)
      {
          document.getElementById('modal-body-approve').innerHTML = data;
          $('#loader-wrap-modal').fadeOut('slow');
      }
  })
}

function popupReject(route){
  $('#loader-wrap-modal').fadeIn('fast');

  $.ajax({
      type : 'get',
      url : '/hris/'+route,
      success:function(data)
      {
          document.getElementById('modal-body-reject').innerHTML = data;
          $('#loader-wrap-modal').fadeOut('slow');
      }
  })
}


function popupKeluar(route){
  $('#loader-wrap-modal').fadeIn('fast');

  $.ajax({
      type : 'get',
      url : '/hris/'+route,
      success:function(data)
      {
          document.getElementById('modal-body-keluar').innerHTML = data;
          $('#loader-wrap-modal').fadeOut('slow');
      }
  })
}

function popupEditDetail(route,idmenu){
  $('#modal-detail-'+idmenu).modal('hide');
  $('#loader-wrap-modal').fadeIn('fast');

  $.ajax({
      type : 'get',
      url : '/hris/'+route,
      success:function(data)
      {
          document.getElementById('modal-body-edit').innerHTML = data;
          $('#loader-wrap-modal').fadeOut('slow');
      }
  })
}

function closeEdit(idmenu) {
  $('.modal-edit').modal('hide');
  $('#modal-detail-'+idmenu).modal('show');
}

function popupHapus(route){
  var con = confirm("Apakah Yakin Akan Dihapus !");
  if (con == true) {
    window.location.href = '/hris/'+route;
  }
}

function popupAjukan(route){
  var con = confirm("Apakah Yakin Akan Diajukan !");
  if (con == true) {
    window.location.href = '/hris/'+route;
  }
}

function popupHapusDetail(route){
  var con = confirm("Apakah Yakin Akan Dihapus !");
  if (con == true) {
    $.ajax({
        type : 'get',
        url : '/hris/'+route,
        success:function(data)
        {
          alert('Data Berhasil Dihapus !');
        }
    })
  }
}

function popupBrowse(browse,modal) {

    $.ajax({
        type : 'get',
        url : '/hris/browse/'+browse+'/'+modal,
        success:function(data)
        {
          document.getElementById('modal-body-browse-tambah').innerHTML = data;
          var table = $('#table-browse').DataTable({
              "scrollX": true,
              "scrollY": "80vh",
              "scrollCollapse": true,
               "columnDefs": [
                { "width": "3%", "targets": 0 }
              ]
          });
          $(document).on('shown.bs.modal', '.modal-browse', function () {
              table.columns.adjust().draw();
          });
        }
    })
}

function popupBrowseDetail(browse,modal) {

    $('#modal-tambah-detail').modal('hide');

    $.ajax({
        type : 'get',
        url : '/hris/browse/'+browse+'/'+modal,
        success:function(data)
        {
          document.getElementById('modal-body-browse-tambah').innerHTML = data;
          var table = $('#table-browse').DataTable({
              "scrollX": true,
              "scrollY": "80vh",
              "scrollCollapse": true,
               "columnDefs": [
                { "width": "3%", "targets": 0 }
              ]
          });
          $(document).on('shown.bs.modal', '.modal-browse', function () {
              table.columns.adjust().draw();
          });
        }
    })
}

function defaultBrowse(field,id,tipe){
  arrField = field.split(",");
  arrId = id.split(",");
  arrTipe = tipe.split(",");

  for (var i = 0; i < arrField.length; i++) {
    if (arrTipe[i] == 'input') {
      $('#'+arrField[i]).val(arrId[i]);
    } else {
      $('#'+arrField[i]).text(arrId[i]);
    }
  }
  
}

/*
function buatSK(){
  $.ajax({
        type : 'get',
        url : '/hris/buat_sk',
        success:function(data)
        {
          document.getElementById('no_sk').innerHTML = data;
        }
      });
}
*/

function hideModalTambah(){
  $('#modal-tambah').modal('hide');
}

function hideModalEdit(){
  $('#modal-edit').modal('hide');
}

function hideModalDetail(){
  $('#modal-detail').modal('hide');
}

function showDetail(){
  $('.modal-detail').modal('show');
}

function closeBrowse(modal) {
  $('#modal-browse-'+modal).modal('hide');
  $('.modal-backdrop').remove();
  $('#modal-'+modal).modal('show'); 
  $('#modal-body-browse-'+modal+'>.home').remove();
}

function pilihBrowse(modal,idfield,kode,keterangan) {
  $('#'+idfield).val(kode);
  $('#label-'+idfield).html(keterangan);
  $('.modal-browse').modal('hide');
  $('.modal-backdrop').remove();
  if (modal == 'tambah') {
    $('.modal-tambah').modal('show');
  } else if(modal == 'edit') {
    $('.modal-edit').modal('show');
  } else {
    $('.modal-autoedit').modal('show');
  }
}

function pilihBrowseVarsession(modal,idfield,kode,keterangan,varsession1,varsession2) {
  $('#'+idfield).val(kode);
  $('#label-'+idfield).html(keterangan);
  $('#'+varsession1).val('');
  $('#label-'+varsession1).html('');
  $('#'+varsession2).val('');
  $('#label-'+varsession2).html('');
  $('.modal-browse').modal('hide');
  $('.modal-backdrop').remove();
  if (modal == 'tambah') {
    $('.modal-tambah').modal('show');
  } else if(modal == 'edit') {
    $('.modal-edit').modal('show');
  } else {
    $('.modal-autoedit').modal('show');
  }
}

function pilihBrowseProfile(modal,idfield,kode,keterangan) {
  $('#'+idfield).val(kode);
  $('#label-'+idfield).html(keterangan);
  $('.modal-browse').modal('hide');
  $('.modal-backdrop').remove();
  if (modal == 'tambah') {
    $('.modal-tambah').modal('show');
  } else if(modal == 'edit') {
    $('.modal-edit').modal('show');
  } else {
    $('.modal-autoedit').modal('show');
  }

  $('.table-tambah tbody tr').remove();

  $.ajax({
        type : 'get',
        url : '/hris/edit_profile/event_tambah/'+kode,
        success:function(data)
        {
          $('.table-tambah tbody').append(data);
        }
  });
}

function popupAutorunsql(idmenu,fieldkey,key){
  $.ajax({
      type : 'get',
      url : '/hris/popup_autorun_sql/'+idmenu+'/'+fieldkey+'/'+key,
      success:function(data)
      {
        var con = confirm(data);
        if (con == true) {
          $.ajax({
              type : 'get',
              url : '/hris/autorun_sql/'+idmenu+'/'+fieldkey+'/'+key,
              success:function(data)
              {
                alert(data);
                location.reload();
              }
          })
        }
      }
  })
}

function popupAutorunsqlDetail(idmenu,fieldkey,fieldkey_detail,menu,key,key_detail){
  $.ajax({
      type : 'get',
      url : '/hris/popup_autorun_sql/'+idmenu+'/'+fieldkey+'/'+key,
      success:function(data)
      {
        var con = confirm(data);
        if (con == true) {
          $.ajax({
              type : 'get',
              url : '/hris/autorun_sql/'+idmenu+'/'+fieldkey+'/'+key,
              success:function(data)
              {
                alert(data);
                reloadmaster(menu,fieldkey_detail,key_detail);
              }
          })
        }
      }
  })
}

function popupAutoEdit(idmenu,fieldkey,key){
  $('#loader-wrap-modal').fadeIn('fast');

  $.ajax({
      type : 'get',
      url : '/hris/popup_autoedit/'+idmenu+'/'+fieldkey+'/'+key,
      success:function(data)
      {
        $('#modal-autoedit>#modal-dialog-autoedit').html(data);
        $('#modal-autoedit').modal('show');
        $('#loader-wrap-modal').fadeOut('slow');

        $('#form-autoedit').submit(function(e){
            e.preventDefault();
            var data = new FormData(document.getElementById('form-autoedit'));

            $.ajax({
              type : 'post',
              url : '/hris/validasi_edit',
              processData: false,
              contentType: false,
              data : data,
              success:function(data)
              {
                if (data != 'Y') {
                  alert(data);
                } else {
                  var data2 = new FormData(document.getElementById('form-autoedit'));

                  $.ajax({
                    type : 'post',
                    url : '/hris/edit_data',
                    processData: false,
                    contentType: false,
                    data: data2,
                    success:function(data)
                    {
                      $('#modal-autoedit').modal('hide');
                      alert(data);
                      location.reload();
                    }
                  })
                }
              }
            })

        });
      }
  })
}

function openAutoPdf(key){
  window.open('/hris/public/attachment/'+key);
}

function popupAutoEditDetail(idmenu,fieldkey,fieldkey_detail,menu,key,key_detail){
  var idmenu_js = menu.replace(/\./g, "");
  $('#loader-wrap-modal').fadeIn('fast');

  $('#modal-detail-'+idmenu_js).modal('hide');

  $.ajax({
      type : 'get',
      url : '/hris/popup_autoedit_detail/'+idmenu+'/'+fieldkey+'/'+menu+'/'+key,
      success:function(data)
      {
        $('#modal-autoedit-detail>.modal-dialog>.modal-content').html(data);
        $('#modal-autoedit-detail').modal('show');
        $('#loader-wrap-modal').fadeOut('slow');

        $('#form-autoedit-detail').submit(function(e){
            e.preventDefault();
            var data = new FormData(document.getElementById('form-autoedit-detail'));

            $.ajax({
              type : 'post',
              url : '/hris/validasi_edit',
              processData: false,
              contentType: false,
              data : data,
              success:function(data)
              {
                if (data != 'Y') {
                  alert('data');
                } else {
                  var data2 = new FormData(document.getElementById('form-autoedit-detail'));

                  $.ajax({
                    type : 'post',
                    url : '/hris/edit_data',
                    processData: false,
                    contentType: false,
                    data: data2,
                    success:function(data)
                    {
                      $('#modal-autoedit-detail').modal('hide');
                      alert(data);
                      $('#modal-detail-'+idmenu_js).modal('hide');
                      reloadmaster(menu,fieldkey_detail,key_detail);
                    }
                  })
                }
              }
            })

        });
      }
  })
}

function closeAutoEditDetail(idmenu) {
  $('.modal-autoedit-detail').modal('hide');
  $('#modal-detail-'+idmenu).modal('show');
}

function viewdesc(idmenu,fieldkey,key){
  $('#loader-wrap-modal').fadeIn('fast');
  $('.modal-detail').modal('hide');

  $.ajax({
      type : 'get',
      url : '/hris/popup_view/'+idmenu+'/'+fieldkey+'/'+key,
      success:function(data)
      {
          $(".home").prepend(data);
          $('#modal-view').modal('show');
          $('#loader-wrap-modal').fadeOut('slow');
      }
  })
}

function reloadmaster(idmenu,fieldkey,key) {
  clearModalDetail();

  $.ajax({
      type : 'get',
      url : '/hris/reload_master',
      success:function(data)
      {
        document.getElementById('view-master').innerHTML = data;
        var table = $('#table-data').DataTable({
            "scrollX": true,
            "scrollY": "72vh",
            "scrollCollapse": true,
             "columnDefs": [
              { "width": "3%", "targets": 0 }
            ]
        });
        viewdetail(idmenu,fieldkey,key);
      }
  })
}

function closeView() {
  $('.modal-view').modal('hide');
  $('.modal-detail').modal('show');
}

function clearModalDetail() {
  $('.modal-detail').remove();
  $('.modal-backdrop').remove();
}

function viewdetail(idmenu,fieldkey,key) {
  var idmenu_js = idmenu.replace(/\./g, "");
  $('#loader-wrap-modal').fadeIn('fast');

  $.ajax({
      type : 'get',
      url : '/hris/popup_detail/'+idmenu+'/'+fieldkey+'/'+key,
      success:function(data)
      {
          
          $(".home").prepend(data);
          $('#modal-detail-'+idmenu_js).modal('show');
          var table = $('#table-detail').DataTable({
              "scrollX": true,
              "scrollY": "50vh",
              "scrollCollapse": true,
               "columnDefs": [
                { "width": "3%", "targets": 0 }
              ]
          });
          $(document).on('shown.bs.modal', '#modal-detail-'+idmenu_js, function () {
              table.columns.adjust().draw();
          });
          $('#loader-wrap-modal').fadeOut('slow');

          $('#form-tambah-detail').submit(function(e){
            e.preventDefault();
            $.ajax({
                  type : 'post',
                  url : '/hris/tambah_data',
                  data:$('#form-tambah-detail').serialize(),
                  success:function(data)
                  {
                    alert('Data Berhasil Ditambah !');
                    $('#modal-detail-'+idmenu_js).modal('hide');
                    reloadmaster(idmenu,fieldkey,key);
                  }
              })

          });

          $('#form-edit-detail').submit(function(e){
            e.preventDefault();
            $.ajax({
                  type : 'post',
                  url : '/hris/edit_data',
                  data:$('#form-edit-detail').serialize(),
                  success:function(data)
                  {
                    alert('Data Berhasil Di Edit !');
                    $('#modal-detail-'+idmenu_js).modal('hide');
                    reloadmaster(idmenu,fieldkey,key);
                  }
              })

          });
      }
  })
}

function gambar(index,image) {
  var w = image.width;
  var h = image.height;
  if (w > h) {
    $('#file-gambar-'+index).css('width', '100%');
    $('#file-gambar-'+index).css('height', 'auto');
  } else {
    $('#file-gambar-'+index).css('width', 'auto');
    $('#file-gambar-'+index).css('height', '100%');
  } 
}





/*----FUNCTION INPUT----*/

function comboVarsession(idmenu,field,urutan,field_parent,empty_combo,id) {
  $.ajax({
      type : 'get',
      url : '/hris/combo_varsession/'+idmenu+'/'+urutan+'/'+field_parent+'/'+id.value,
      success:function(data)
      {
          alert(data);
          var combo = document.getElementById(field);
          if (data == "") {
            alert("Data "+field+" tidak tersedia untuk "+field_parent+" tersebut !");
            combo.innerHTML = '';
            combo.innerHTML = '<option value="--">--</option>';
            if (empty_combo != "") {
              var empty = document.getElementById(empty_combo);
              empty.innerHTML = "";
              empty.innerHTML = '<option value="--">--</option>';
            }
          } else {
            var obj = String(Object.keys(data[0]));
            var kolom = obj.split(",");
            var kode = kolom[0];
            var keterangan = kolom[1];
            combo.innerHTML = '';
            combo.innerHTML = '<option value="--">--</option>';
            for (var i = 0; i < data.length; i++) {
              $('#'+field).append('<option value="'+data[i][kode]+'">'+data[i][keterangan]+'</option>');
            }
            if (empty_combo != "") {
              var empty = document.getElementById(empty_combo);
              empty.innerHTML = "";
              empty.innerHTML = '<option value="--">--</option>';
            }
          }
      }
  })
}

function comboVarsessionEdit(idmenu,field,urutan,field_parent,empty_combo,id) {
  $.ajax({
      type : 'get',
      url : '/hris/combo_varsession_edit/'+idmenu+'/'+urutan+'/'+field_parent+'/'+id.value,
      success:function(data)
      {
          var combo = document.getElementById(field);
          if (data == "") {
            alert("Data "+field+" tidak tersedia untuk "+field_parent+" tersebut !");
            combo.innerHTML = '';
            combo.innerHTML = '<option value="--">--</option>';
            if (empty_combo != "") {
              var empty = document.getElementById(empty_combo);
              empty.innerHTML = "";
              empty.innerHTML = '<option value="--">--</option>';
            }
          } else {
            var obj = String(Object.keys(data[0]));
            var kolom = obj.split(",");
            var kode = kolom[0];
            var keterangan = kolom[1];
            combo.innerHTML = '';
            combo.innerHTML = '<option value="--">--</option>';
            for (var i = 0; i < data.length; i++) {
              $('#'+field).append('<option value="'+data[i][kode]+'">'+data[i][keterangan]+'</option>');
            }
            if (empty_combo != "") {
              var empty = document.getElementById(empty_combo);
              empty.innerHTML = "";
              empty.innerHTML = '<option value="--">--</option>';
            }
          }
      }
  })
}









function imageSliderSize(input) {
    
    var w = input.naturalWidth;
    var h = input.naturalHeight;
    if (w > h) {
      $(input).css('width', '100%');
      $(input).css('height', 'auto');
    } else {
      $(input).css('width', 'auto');
      $(input).css('height', '100%');
    }

}


function validasiFile(id){
  file = document.getElementById(id);
  countFormat = 0;
  countSize = 0;
  fileSize = 0;

  for (var i=0; i<file.files.length; i++) {
  ext = file.files[i].name.split('.').pop();
    if(ext !== "pdf") {
      countFormat += 1;
    }
  }

  for (var x=0; x<file.files.length; x++) {
  size = file.files[x].size;
  fileSize += Math.round((size / 1024));
    if(fileSize > 15360) {
      countSize += 1;
    }
  }

  if (countFormat > 0) {
    alert('File Harus Dalam Format PDF !');
    event.preventDefault();
  }
  if (countSize > 0) {
    alert('Ukuran File Harus Dibawah 15 Mb !');
    event.preventDefault(); 
  }
  if (countFormat == 0 && countSize == 0) {
    $('#loader-wrap-modal').fadeIn('fast');
  }
}






/*----BERANDA-----*/

function imagehris(input) {
    
    var w = input.naturalWidth;
    var h = input.naturalHeight;
    if ((w*1.1) < h) {
      $(input).css('width', 'auto');
      $(input).css('height', '100%');
    } else if((h*1.1) < w) {
      $(input).css('width', '100%');
      $(input).css('height', 'auto');
    }

}




/*----CONVERT UPPERCASE----*/
function convertUppercase(el) {
  var string = el.value;
  el.value = string.toUpperCase();
}




/*----CONVERT CURRENCY-----*/
function isNumberKey(evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57))
  return false;

  return true;
}

function convertToRupiah(angka){
    var rupiah = '';
    var hasil = '';
    var angkabaru = angka.split(".").join("");
    var angkarev = angkabaru.toString().split('').reverse().join('');
    for(var i = 0; i < angkarev.length; i++) {
      if(i%3 == 0) {
        rupiah += angkarev.substr(i,3)+'.';
      }
    }
    hasil = rupiah.split('',rupiah.length-1).reverse().join('');
    
    if(hasil.length>2){
      if(hasil.substr(0,1) == 0 && hasil.substr(1,1) == '.'){
        hasil = hasil.substr(2,hasil.length);
      }
    }

    return hasil;

}

function rupiah(id){
    var nominal = document.getElementById(id).value;
  var rupiah = convertToRupiah(nominal);
    document.getElementById(id).value = rupiah;
}

function hapusnol(id){
  var nominal = document.getElementById(id).value;
  if (nominal.length > 0) {
    if (nominal.substr(0, 1) == 0) {
      if (nominal.substr(1, 1) == 0) {
        document.getElementById(id).value = 0;
      } else {
        document.getElementById(id).value = nominal.substr(1, nominal.length);
      }
    }
  } else {
    document.getElementById(id).value = 0;
  }
}
