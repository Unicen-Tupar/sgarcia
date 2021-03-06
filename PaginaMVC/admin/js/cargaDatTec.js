"use strict";
function recargarListaDat(data) {
  $('#listDatTec').html(data);
  borrarDatTec();
  actualizarDato();
}

function recargarListaDatAct(data) {
  $('#contenido').html(data);
  borrarDatTec();
  actualizarDato();
}


function borrarDatTec() {
$(".deleteAction").on("click",function(e){
  e.preventDefault();
  var id_dat = $(this).attr("id-dat");
   //alert("le da bola al boton "+id_maq);
  $.get("index.php?action=delete_dat",
     { dato: id_dat },
     function(data){
       recargarListaDat(data);
     });

  });
}

function cargarDatActualizado(){
  $("#upd_dat").submit(function(e){
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
     method: "POST",
     url: "index.php?action=agregar_dato_modificado",
     data: formData,
     contentType: false,
     cache: false,
     processData:false,
     success: function(receivedData){
         recargarListaDatAct(receivedData);
              }
     });
     });
}

function actualizarDato() {
$(".updateAction").on("click",function(e){
  e.preventDefault();
  var id_dat = $(this).attr("id-dat");
  $.get("index.php?action=editar_dato",
     { dato: id_dat },
       function(data){
         $("#"+id_dat).html(data);
         cargarDatActualizado();
     });

  });
}




$(document).ready(function(){
 $("#add_dat_tec").submit(function(e){
   e.preventDefault();
   var formData = new FormData(this);
   $.ajax({
    method: "POST",
    url: "index.php?action=agregar_Dat_Tec",
    data: formData,
    contentType: false,
    cache: false,
    processData:false,
    success: function(receivedData){
      console.log(receivedData);
        recargarListaDat(receivedData);
        $('#add_dat_tec').trigger("reset");
      }
    });
    });
    borrarDatTec();
    actualizarDato();

 });
