
//establecer conexion Ajax
  function Ajax_conection(){
    var xmlhttp = false;
    try {
      xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
 
      try {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (E) {
        xmlhttp = false; }
    }
 
    if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
      xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
  }

//leer seleccion de tarjetas en registro alumno
    document.addEventListener('WebComponentsReady', function() {
 	      var drop= document.querySelector('#proceso');
        if (drop) {
        drop.addEventListener('click', function() {
        var busqueda=document.querySelector('#gh').value;  
        mos_ocul_form(drop.selectedItem.getAttribute("registros"),busqueda);
       });
     }   
 });


//metodo para mostrar y ocultar formularios 
function mos_ocul_form(formulario,bus){

switch(formulario){
case"ESTANCIA1":
   var se="estancia1";
   obtenerestancia1(bus,se);
   $('#tarro').css('display','block');
   $('#tarro1').css('display','none');
   $('#tarro2').css('display','none');
   $('#tarro3').css('display','none');
 break;

case"ESTANCIA2":
   $('#tarro').css('display','none');
   var se="estancia2";
   obtenerestancia2(bus,se);
   $('#tarro1').css('display','block');
   $('#tarro2').css('display','none');
   $('#tarro3').css('display','none');
 break;

case"SERVICIO":
   $('#tarro').css('display','none');
   $('#tarro1').css('display','none');
   var se="serviciosocial";
   obtenerserviciosocial(bus,se);
   $('#tarro2').css('display','block');
   $('#tarro3').css('display','none');
 break;

 case"ESTADIA":
   $('#tarro').css('display','none');
   $('#tarro1').css('display','none');
   $('#tarro2').css('display','none');
   var se="estadia";
   obtenerestadia(bus,se);
   $('#tarro3').css('display','block');
 break;

}

}

//metodos para registrar estadias 
 function estancia1(){
  
    var busqueda=document.querySelector('#gh').value;
    var rec=document.querySelector('#check3').checked;
    var ev=document.querySelector('#check4').checked;
    var ct=document.querySelector('#check5').checked;
    var ca=document.querySelector('#check6').checked;
    var or=document.querySelector('#es_or').value;
    var pe=document.querySelector('#es_pe').selectedItem;
    var vaci=document.querySelector('#vacios');
    var solicito="estancia1";

if (or==""||pe=="") {vaci.toggle();}else{
    var fo1=obtenerformato(rec);
    var fo2=obtenerformato(ev);
    var fo3=obtenerformato(ct);
    var fo4=obtenerformato(ca);
    var peri=pe.getAttribute("periodo");
    var rinnegan=obtenerperiodo(peri);
    ajax_estadias(solicito,rinnegan,or,fo1,fo2,fo3,fo4,busqueda);
 }

}


 function estancia2(){
  
    var busqueda=document.querySelector('#gh').value;
    var rec=document.querySelector('#check7').checked;
    var ev=document.querySelector('#check8').checked;
    var ct=document.querySelector('#check9').checked;
    var ca=document.querySelector('#check10').checked;
    var or=document.querySelector('#est_or').value;
    var pe=document.querySelector('#est_pe').selectedItem;
    var vaci=document.querySelector('#vacios');
    var solicito="estancia2";

if (or==""||pe=="") {vaci.toggle();}else{
    var fo1=obtenerformato(rec);
    var fo2=obtenerformato(ev);
    var fo3=obtenerformato(ct);
    var fo4=obtenerformato(ca);
    var peri=pe.getAttribute("period");
    var kyubi=obtenerperiodo(peri);
    ajax_estadias(solicito,kyubi,or,fo1,fo2,fo3,fo4,busqueda);
 }

}

function estadia(){
  
    var busqueda=document.querySelector('#gh').value;
    var rec=document.querySelector('#check11').checked;
    var ev=document.querySelector('#check12').checked;
    var ct=document.querySelector('#check13').checked;
    var ca=document.querySelector('#check14').checked;
    var or=document.querySelector('#esta_or').value;
    var pe=document.querySelector('#esta_per').selectedItem;
    var vaci=document.querySelector('#vacios');
    var solicito="estadia";

if (or==""||pe=="") {vaci.toggle();}else{
    var fo1=obtenerformato(rec);
    var fo2=obtenerformato(ev);
    var fo3=obtenerformato(ct);
    var fo4=obtenerformato(ca);
    var peri=pe.getAttribute("peri");
    var choumei=obtenerperiodo(peri);

    ajax_estadias(solicito,choumei,or,fo1,fo2,fo3,fo4,busqueda);
 }

}




//metodo para registrar servicio social

function serviciosocial(){

 var busqueda=document.querySelector('#gh').value;
 var rec=document.querySelector('#check1').checked;
 var ct=document.querySelector('#check2').checked;
 var or=document.querySelector('#ser_or').value;
 var pe=document.querySelector('#ser_pe').selectedItem;
 var vaci=document.querySelector('#vacios');

 var fo1=obtenerformato(rec);
 var fo2=obtenerformato(ct);
 var peri=pe.getAttribute("perio");
 var hachibi=obtenerperiodo(peri);
 
 if (or==""||pe=="") {vaci.toggle();}else{

  ajax= Ajax_conection();
  ajax.open("POST","registros_alum.php",true);
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  ajax.send("&solicito="+"servicio"+"&periodo="+hachibi+"&orga="+or+"&for1="+fo1+"&for2="+fo2+"&matricula="+busqueda);
      
    ajax.onreadystatechange=function(){
       if (ajax.readyState==4) {
          if (ajax.status==200) {
             alert(ajax.responseText);
          }
        }
       } 

 }


}

//metodo para buscar el alumno y comprobar que  se encuentre registrado 
function buscar_alu(){

 var busqueda=document.querySelector('#gh').value;
 var vaci=document.querySelector('#vacios');

if (busqueda==="") {vaci.toggle();}else{

  ajax=Ajax_conection();
  ajax.open("POST","envia_m.php",true);
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  ajax.send("&bus="+busqueda);

   ajax.onreadystatechange=function(){

       if (ajax.readyState==4) {
         if (ajax.status==200) {
             if (ajax.responseText==="Noesta") {alert("El Alumno no se encuentra registrado");}
             if (ajax.responseText==="Siesta") {
             	alert("El Alumno ha sido Encontrado"); 
             	$('#prcs').prop('disabled',false);
              $('#gh').prop('disabled',true);
              $('#raikage').prop('disabled',false);
              $('#hokage').prop('disabled',true);

              }

            }
        }
     } 	
}

}

//obtener la x que se registra de la base de datos dependiendo si el paper-checkbox esta activo o no 
function obtenerformato(for1){

 var se;

 if (for1==true) {se="x"; }

 if (for1==false) {se=""; }
  
  return se;

}
//metodo para obtener periodo

function obtenerperiodo(per){

switch(per){

  case"per1":
  per="Enero-Abril";
  break; 
  case"per2":
  per="Mayo-Agosto";
  break; 
  case"per3":
  per="Septiembre-Diciembre";
  break; 

}

return per;


}
//metodo para obtener periodo

function obtenerper(periodo){

switch(periodo){

  case"Enero-Abril":
  periodo="per1";
  break; 
  case"Mayo-Agosto":
  periodo="per2";
  break; 
  case"Septiembre-Diciembre":
  periodo="per3";
  break; 

}

return periodo;


}


//metodo para enviar los datos de las estadias por ajax 

function ajax_estadias(servi,pe,or,fo1,fo2,fo3,fo4,busqueda){

  ajax= Ajax_conection();
  ajax.open("POST","registros_alum.php",true);
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  ajax.send("&solicito="+servi+"&periodo="+pe+"&orga="+or+"&for1="+fo1+"&for2="+fo2+"&for3="+fo3+"&for4="+fo4+"&matricula="+busqueda);

 ajax.onreadystatechange=function(){
       if (ajax.readyState==4) {
          if (ajax.status==200) {
             alert(ajax.responseText);
          }
        }
       } 
  
}


//cargar tablas alumnos
 document.addEventListener('WebComponentsReady', function() {
    
       var mokuton= document.querySelector('#kiba');
       if (mokuton) {
        mokuton.addEventListener('click', function() {
        var raiton=mokuton.selectedItem.getAttribute("registros");
        
        switch(raiton){
          case"serviciosocial":
          $('#tabla').load("servicio.php"); 
          break;
          case"estancia1":
          $('#tabla').load("estancia1.php");    
          break;
          case"estancia2":
          $('#tabla').load("estancia2.php");    
          break;
          case"estadia":
          $('#tabla').load("estadia.php");    
          break;
        }



       });
     }   
 });

//metodos para extaer datos de procesos de estadia o estancias o servicio social y mostarlo en su formulario correspondiente
 function obtenerestancia1(matric,table){

    var rec=document.querySelector('#check3');
    var ev=document.querySelector('#check4');
    var ct=document.querySelector('#check5');
    var ca=document.querySelector('#check6');
    var songoku=document.querySelector('#es_pe');

          ajax=Ajax_conection();
          ajax.open("POST","obtenerser.php",true);
          ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
          ajax.send("&alum_num="+matric+"&tab="+table);
        
          ajax.onreadystatechange=function(){

              if (ajax.readyState==4) {
                if (ajax.status==200) { 
                  if(ajax.responseText=="procnoin"){alert("El alumno no ha iniciado este proceso");}else{
                       cli=JSON.parse(ajax.responseText);
                       for(var i in cli){
                          songoku.selected=obtenerper(cli[i].perio);
                           $('#es_or').val(cli[i].orga);
                           rec.checked=obcheck(cli[i].rec03);
                           ev.checked=obcheck(cli[i].ev);
                           ct.checked=obcheck(cli[i].ct);
                           ca.checked=obcheck(cli[i].ca);
                   }
                }
             }
          }
        }
      }

function obtenerestancia2(matric,table){

    var rec=document.querySelector('#check7');
    var ev=document.querySelector('#check8');
    var ct=document.querySelector('#check9');
    var ca=document.querySelector('#check10');
    var ichibi=document.querySelector('#est_pe');
 

          ajax=Ajax_conection();
          ajax.open("POST","obtenerser.php",true);
          ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
          ajax.send("&alum_num="+matric+"&tab="+table);
        
          ajax.onreadystatechange=function(){

              if (ajax.readyState==4) {
                if (ajax.status==200) { 
                  if(ajax.responseText=="procnoin"){alert("El alumno no ha iniciado este proceso");}else{
                       cli=JSON.parse(ajax.responseText);
                       for(var i in cli){
                           ichibi.selected=obtenerper(cli[i].perio);
                           $('#est_or').val(cli[i].orga);
                           rec.checked=obcheck(cli[i].rec03);
                           ev.checked=obcheck(cli[i].ev);
                           ct.checked=obcheck(cli[i].ct);
                           ca.checked=obcheck(cli[i].ca);
                   }
                }
             }
          }
        }
      }

function obtenerestadia(matric,table){

    var rec=document.querySelector('#check11');
    var ev=document.querySelector('#check12');
    var ct=document.querySelector('#check13');
    var ca=document.querySelector('#check14');
    var kakuzo=document.querySelector('#esta_per');

          ajax=Ajax_conection();
          ajax.open("POST","obtenerser.php",true);
          ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
          ajax.send("&alum_num="+matric+"&tab="+table);
        
          ajax.onreadystatechange=function(){

              if (ajax.readyState==4) {
                if (ajax.status==200) { 
                  if(ajax.responseText=="procnoin"){alert("El alumno no ha iniciado este proceso");}else{
                       cli=JSON.parse(ajax.responseText);
                       for(var i in cli){
                           kakuzo.selected=obtenerper(cli[i].perio);
                           $('#esta_or').val(cli[i].orga);
                           rec.checked=obcheck(cli[i].rec03);
                           ev.checked=obcheck(cli[i].ev);
                           ct.checked=obcheck(cli[i].ct);
                           ca.checked=obcheck(cli[i].ca);
                   }
                }
             }
          }
        }
      }

function obtenerserviciosocial(matric,table){

    var rec=document.querySelector('#check1');
    var ct=document.querySelector('#check2');
    var hidan=document.querySelector('#ser_pe');

          ajax=Ajax_conection();
          ajax.open("POST","obtenerser.php",true);
          ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
          ajax.send("&alum_num="+matric+"&tab="+table);
        
          ajax.onreadystatechange=function(){

              if (ajax.readyState==4) {
                if (ajax.status==200) { 
                  if(ajax.responseText=="procnoin"){alert("El alumno no ha iniciado este proceso");}else{
                       cli=JSON.parse(ajax.responseText);
                       for(var i in cli){
                           hidan.selected=obtenerper(cli[i].perio);
                           $('#ser_or').val(cli[i].orga);
                           rec.checked=obcheck(cli[i].rec03);   
                           ct.checked=obcheck(cli[i].ct);
                   }
                }
             }
          }
        }
      }


//funcion para resetear contenido para nuevo registro de alumno

function nuevo(){

   $('#tarro').css('display','none');
   $('#tarro1').css('display','none');
   $('#tarro2').css('display','none');
   $('#tarro3').css('display','none');
   $('#hokage').prop('disabled',false);
   $('#prcs').prop('disabled',true);
   $('#gh').prop('disabled',false);
   $('#gh').val("");
   $('#raikage').prop('disabled',true);
   location.reload();

}

//funcion para obtener la x o vacios 
function obcheck(che){

  if (che=="x") {return true;}
  if (che=="") {return false;}
  if (che==null){return false;}  

}