@extends('layouts.index')

@section('content')



<div class="card-body">
<div class="content">
<a href="#" type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">Agregar Padrino</a>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Padrino</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" enctype="multipart/form-data" action="{{ route('addpadrinos')}}">
      {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombres</label>
                    <input type="text" name="nombres" class="form-control" id="exampleInputEmail1" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">documento</label>
                    <input type="number" name="documento" class="form-control" id="exampleInputPassword1"  required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">estado</label>
                    <input type="text" name="estado" class="form-control" id="exampleInputEmail1" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">ingreso</label>
                    <input type="number" name="ingreso" class="form-control" id="exampleInputPassword1"  required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">genero</label>
                    <select class="form-control"  name="genero">
                  <option value="value1">Masculino</option> 
                    <option value="value2" selected>Femenino</option>
                   
                  </select> </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">direccion</label>
                    <input type="text" name="direccion" class="form-control" id="exampleInputEmail1"  required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">telefono</label>
                    <input type="number" name="telefono" class="form-control" id="exampleInputPassword1"  required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">fecha de nacimiento</label>
                    <input type="date" name="fecha" class="form-control" id="exampleInputPassword1"  required>
                  </div>
                
                <!-- /.card-body -->

             
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<br>
<br>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                
                  <tr>
                  <th>nombres</th>
                  <th>fecha de nacimiento</th>
                    <th>Documento</th>
                    <th>estado</th>
                    <th>ingreso</th>
                    <th>genero</th>
                    <th>direccion</th>
                    <th>telefono</th>
                    <th>eliminar</th>
                  </tr>
                  </thead>
                  <tbody>
                  @forelse($adoptantes as $a) 
                  <tr>

                    <td>{{$a->nombres}}</td>
                    <td>{{$a->fecha_nacimiento}}</td>
                    <td>{{$a->estado}}
                    </td>
                    <td>{{$a->ingreso}}</td>
                    <td> {{$a->genero}}</td>
                    <td>{{$a->direccion}}</td>
                    <td>{{$a->telefono}}</td>
                    <td><button class="btn btn-secondary" data-toggle="modal" data-target="#editar{{$a->id}}">Editar</button></td>
                    <div class="modal fade" id="editar{{$a->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Padrino</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" enctype="multipart/form-data" action="{{ route('editAdoptante',[$a->id])}}">
      {{ csrf_field() }}
      <input type="text" name="idMascota" class="form-control"  value="{{$a->id}}"  disabled>
                  
      <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombres</label>
                    <input type="text" name="nombres" class="form-control" value="{{$a->nombres}}" id="exampleInputEmail1" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">documento</label>
                    <input type="number" name="documento" class="form-control" value="{{$a->documento}}" id="exampleInputPassword1"  required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">estado</label>
                    <input type="text" name="estado" class="form-control" value="{{$a->estado}}" id="exampleInputEmail1"  required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">ingreso</label>
                    <input type="number" name="ingreso" class="form-control" value="{{$a->ingreso}}" id="exampleInputPassword1" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">genero</label>
                    <select class="form-control"  name="genero">
                    <option value="value1">Masculino</option> 
                  <option value="value1" value="{{$a->genero}}"></option> 
                    <option value="value2" selected>Femenino</option>
                   
                  </select> </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">direccion</label>
                    <input type="text" name="direccion" value="{{$a->direccion}}" class="form-control" id="exampleInputEmail1"  required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">telefono</label>
                    <input type="number" name="telefono" value="{{$a->telefono}}" class="form-control" id="exampleInputPassword1"  required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">fecha de nacimiento</label>
                    <input type="date" name="fecha" value="{{$a->fecha_nacimiento}}"  class="form-control" id="exampleInputPassword1"  required>
                  </div>
                <!-- /.card-body -->

             
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        
        </form>
      </div>
    </div>
  </div>
</div>
                    <td><button class="btn btn-danger" onclick="eliminar({{$a->id}})">Eliminar</button></td>
                  </tr>
                  </tbody>
                  @empty

<div id="evento" class="alert alert-danger" role="alert">
  no se ha registrado ningun padrino <a href="#" class="alert-link"></a>. 
</div>
@endforelse   

<hr>
<div class="row">
             
    <div col-12 style="text-align: center; margin-left: auto;
    margin-right: auto;">
            {{ $adoptantes->render()}}
    </div>
                </table>
              </div>

              <script>
function eliminar(id){
  Swal.fire({
  title: 'Estas seguro?',
  text: "Quieres eliminar este Padrino!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'si'
}).then((result) => {
  if (result.value) {
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    ),
	borrar(id);
  }
})
};
function borrar(id) {
            $.ajax({
                type: "GET",
                url: "/deletePersona/"+id,
                data: {id:id},
                success: function (data) {
                  console.log(data);
                  if(data.status=="200"){
                    console.log(data);
					location.reload();
                  }else{
                    Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'No se puede eliminar!',

})
                  }
				
                    }         
            });
          }
</script>



@endsection