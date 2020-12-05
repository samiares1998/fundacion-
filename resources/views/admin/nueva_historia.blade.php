<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Huellitas:Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Historial</a>
      </li>
    </ul>

 

   
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('inicio') }}" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Administrador</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
         
        </div>
        <div class="info">
        <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
              
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('mascotas') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mascotas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('adoptantes') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Adoptantes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('padrinos') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Padrinos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('veterinarias') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>veterinarias</p>
                </a>
              </li>
              <li class="nav-item">
                <a  href="{{ route('logout') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Salir</p>
                </a>
              </li>
            </ul>
          </li>
        
        
         
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Historial</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    


<section class="content">

<div class="content" style="margin: 50px;text-align:center;">

<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Agregar Elementos</button>
<br>
<br>

<div class="row">

<div class="col-12 col-md-6" >
<h1>Vacunas</h1>
<div id="ListVacuna">
@forelse($vacuna_historia as $v) 
<div class="card" style="text-align:left;padding: 15px;">
<h2>nombre: {{$v->nombre}}</h2>
<p>fecha: {{$v->fecha}}</p>
</div>
        @empty
  
        <div class="col-md-12">
        <div id="vacunaAlert" class="alert alert-danger" role="alert">
        no se ha registrado ninguna  vacuna<a href="#" class="alert-link"></a>. 
  
        </div>
                
  </div>
  
  @endforelse 
 
  </div>
</div>

<div class="col-12 col-md-6">
<h1>Padecimientos</h1>
<div id="ListPadecimiento">
@forelse($padecimiento_historia as $p) 
<div class="card" style="text-align:left;padding: 15px;">
<h2>nombre: {{$p->nombre}}</h2>
<p>medicina: {{$p->medicina}}</p>
<p>dosis: {{$p->dosis}}</p>
<p>fecha inicio: {{$p->fecha_inicio}}</p>
<p>fecha fin: {{$p->fecha_fin}}</p>
</div>
        @empty
  
        <div class="col-md-12">
        <div id="padecimientoAlert" class="alert alert-danger" role="alert">
        no se ha registrado ningun padecimiento<a href="#" class="alert-link"></a>. 
  
        </div>
                
  </div>
  
  </div>
  @endforelse 
</div>


</div>

</div>


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
     

<h2 id="nombre" style="text-align: center;font-weight: bold;">Nueva Historia Clinica de la Mascota {{$mascota->nombre}}</h2>


<div class="content" style="margin: 50px;">
    <!-- Content Header (Page header) -->
    
 
   <div class="row">
    <div class="col-md-6 card-body" style="text-align:center; ">
    <h2 style="font-weight: bold;"> Padecimiento </h2>
 
    <input type="text" name="historia" class="form-control" id="historia" value="{{$historia->id}}" placeholder="Medicina" hidden>               
   
      
      <select class="form-control" id="padecimiento" >
      <option value="0">Seleccione</option> 
   @forelse($padecimientos as $v) 
         <option value="{{$v->id}}">{{$v->descripcion}}</option> 
      @empty

      <div class="col-md-12">
      <div id="evento" class="alert alert-danger" role="alert">
      no se ha registrado ninguna  vacuna<a href="#" class="alert-link"></a>. 

      </div>
              
</div>

@endforelse 
</select>
<br>
<div class="form-group">
 <input type="text" id="medicina" class="form-control"  placeholder="Medicina" >
</div>
<br>
<div class="form-group">
 <input type="text" id="nombrePadecimiento" class="form-control"  placeholder="Nombre" >
</div>
<br>
<div class="form-group">
 <input type="text" id="docis" class="form-control"  placeholder="dosis" >
</div>
<br>
<div class="form-group">
<label for="exampleInputEmail1">Fecha Inicio</label>
 <input type="date" id="inicio" class="form-control" placeholder="Fecha Inicio" >
</div>
<br>
<div class="form-group">
<label for="exampleInputEmail1">Fecha Fin</label>
 <input type="date" id="fin" class="form-control"  placeholder="Fecha Fin" >
</div>


    </div>
   
    <div class="col-md-6 card-body" style="text-align:center; ">
 

    <h2 style="font-weight: bold;">Vacunas</h2>
    <select class="form-control" id="vacuna" > 
    <option value="0">Seleccione</option> 
                   @forelse($vacunas as $v) 
                        <option value="{{$v->id}}">{{$v->descripcion}}</option> 
                     @empty
               
                     <div class="col-md-12">
                     <div id="evento" class="alert alert-danger" role="alert">
                     no se ha registrado ninguna  vacuna<a href="#" class="alert-link"></a>. 
               
                     </div>
                             
               </div>
               
               @endforelse 
               </select>
               <br>
<div class="form-group">
<label for="exampleInputEmail1">Fecha Aplicacion</label>
 <input type="date" id="fecha" class="form-control"  placeholder="Fecha Aplicacion" >
</div>
<br>
<div class="form-group">
 <input type="text" id="descripcion" class="form-control"  placeholder="Nombre Vacuna" >
</div>
  
<div class="col-md-12" style="height: 50px; text-align:center; ">
   <button class="btn btn-primary"  type="submit" onclick="validarDatos();" style=" width:100% ">Guardar Padecimiento</button>
    </div>
    <div class="col-md-12" style="height: 50px; text-align:center;  width:100%  ">
   <button class="btn btn-primary"  type="submit" onclick="registrarVacunas();" style=" width:100% ">Guardar Vacuna</button>
    </div>

    </div>
    
   </div>
   <br>

   
   </div>

    </div>
  </div>
</div>


  
 
</section>

   

  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2020</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
  <script>
var validarVacunas=0;
var validarPadecimietnos=0;
function validarDatos(){

  var id_historia= document.getElementById('historia').value;
  
  var padecimiento= document.getElementById('padecimiento').value;

  var medicina= document.getElementById('medicina').value;
   var nombrePadecimiento= document.getElementById('nombrePadecimiento').value;
  
  var dosis= document.getElementById('docis').value;
  
  var inicio= document.getElementById('inicio').value;

  var fin= document.getElementById('fin').value;
  
  var vacunas= document.getElementById('vacuna').value;

  var fecha= document.getElementById('fecha').value;
  
  var descripcion= document.getElementById('descripcion').value;
  
  if(padecimiento=="0" || medicina=="" || docis=="" || inicio=="" || fin=="" ){
    Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Faltan datos por llenar',

});
  }else{

    var timeOut     = "180000";  

  $.ajax({
      type:	"POST",
      url:	"http://localhost:8000/registrar/"+id_historia,        
      dataType: "json",         
      data: { 
        medicina: medicina,
        dosis: dosis,
        nombrePadecimiento:nombrePadecimiento,
        inicio:inicio,
        fin:fin,
        padecimiento:padecimiento,
      
      },                
      timeout:  timeOut,
      success: function (result) {   
        console.log(result);             
        Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Your work has been saved',
  showConfirmButton: false,
  timer: 1500
});


document.getElementById('padecimiento').value="";

document.getElementById('medicina').value="";
  document.getElementById('nombre').value="";

 document.getElementById('docis').value="";

 document.getElementById('inicio').value="";

 document.getElementById('fin').value="";

 var html="";
document.getElementById('ListPadecimiento').innerHTML="";
console.log(result);
$('#ListPadecimiento').append(html);
                for (let index = 0; index < result.padecimientos.length; index++) {
                     html +=' <div class="card" style="text-align:left;padding: 15px;">'+
                     '<h2>nombre:'+result.padecimientos[index].nombre+'</h2>'+
                     '<p>medicina:'+result.padecimientos[index].medicina+'</p>'+
                     '<p>dosis:'+result.padecimientos[index].dosis+'</p>'+
                     '<p>fecha inicio:'+result.padecimientos[index].fecha_inicio+'</p>'+
                     '<p>fecha fin:'+result.padecimientos[index].fecha_fin+'</p>'+
                     '</div>';
                    
                }
                $('#ListPadecimiento').append(html);  

       },
      error: function(XMLHttpRequest, textStatus, errorThrown) { 
        console.log("error"+textStatus);
      }
       });
 

  }


}
function registrarVacunas(){

var id_historia= document.getElementById('historia').value;


var vacunas= document.getElementById('vacuna').value;

var fecha= document.getElementById('fecha').value;

var descripcion= document.getElementById('descripcion').value;

if(vacunas=="0" || fecha=="" || descripcion==""){
  Swal.fire({
icon: 'error',
title: 'Oops...',
text: 'Faltan datos por llenar',

});
}else{

  var timeOut     = "180000";  

$.ajax({
    type:	"POST",
    url:	"http://localhost:8000/registrarVacunas/"+id_historia,        
    dataType: "json",         
    data: { 
 
      nombreV:descripcion,
      fecha:fecha,
      vacuna:vacunas,

    },                
    timeout:  timeOut,
    success: function (result) {                
      Swal.fire({
position: 'top-end',
icon: 'success',
title: 'Your work has been saved',
showConfirmButton: false,
timer: 1500
});


document.getElementById('vacuna').value="";

document.getElementById('fecha').value="";

document.getElementById('descripcion').value="";

var html="";
document.getElementById('ListVacuna').innerHTML="";
console.log(result);
$('#ListVacuna').append(html);
                for (let index = 0; index < result.vacunas.length; index++) {
                     html +=' <div class="card" style="text-align:left;padding: 15px;">'+
                     '<h2>nombre:'+result.vacunas[index].nombre+'</h2>'+
                     '<p>fecha:'+result.vacunas[index].fecha+'</p>'+
                     
                     '</div>';
                    
                }
                $('#ListVacuna').append(html);             


     },
    error: function(XMLHttpRequest, textStatus, errorThrown) { 
      console.log("error"+textStatus);
    }
     });


}


}
</script>
</body>
</html>
