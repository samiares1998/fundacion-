@extends('layouts.index')

@section('content')



<div class="card-body">
<div class="content">
<a href="#" type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">Agregar Mascota</a>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Mascota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" enctype="multipart/form-data" action="{{ route('addMascota')}}">
      {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" placeholder="nombre">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">edad</label>
                    <input type="number" name="edad" class="form-control" id="exampleInputPassword1" placeholder="edad" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">especie</label>
                    <input type="text" name="especie" class="form-control" id="exampleInputEmail1" placeholder="especie" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">raza</label>
                    <input type="text" name="raza" class="form-control" id="exampleInputEmail1" placeholder="raza" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Adoptante(Opcional)</label>
                    <select class="form-control" name="adoptante">
                    <option value="0">seleccione</option> 
                 
                    @forelse($adoptantes as $m) 
                    <option value="{{$m->id}}">{{$m->nombres}}</option> 
                  
                   @empty
                   
                    <div id="evento" class="alert alert-danger" role="alert">
                      no se ha registrado ninguna persona <a href="#" class="alert-link"></a>. 
                    </div>
                    @endforelse   
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Veterinaria(Opcional)</label>
                    <select class="form-control" name="veterinaria">
                    <option value="0">seleccione</option> 
                  
                    @forelse($veterinarias as $m) 
                    <option value="{{$m->id}}">{{$m->nombre}}</option> 
                  
                   @empty
                   
                    <div id="evento" class="alert alert-danger" role="alert">
                      no se ha registrado ninguna veterinaria <a href="#" class="alert-link"></a>. 
                    </div>
                    @endforelse   
                    </select>
                  </div>
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
                    <th>Nombre</th>
                    <th>edad</th>
                    <th>especie</th>
                    <th>raza</th>
                    <th>adoptante</th>
                    <th>veterinaria</th>
                    <th>Historia Clinica</th>
                    <th>eliminar</th>
                    <th>editar</th>
                   
                   
                  </tr>
                  </thead>
                  <tbody>
                  @forelse($mascotas as $m) 
                  <tr>

                    <td>{{$m->nombre}}</td>
                    <td>{{$m->edad}}
                    </td>
                    <td>{{$m->especie}}</td>
                    <td> {{$m->raza}}</td>
                    @if($m->adoptante_idadoptante!="")
                    @foreach($adoptantes as $a) 
                 
                    @if($m->adoptante_idadoptante==$a->id)
                    <td>{{$a->nombres}}</td>
                    @endif
                    @endforeach
                    @else
                    <td></td> 
                    @endif
                    <td>{{$m->id_veterinaria}}</td>
                    <td><a href="{{ url('/historial/') }}/{{encrypt($m->id)}}" class="btn btn-warning">Historial</a></td>
                    <td><button class="btn btn-danger" onclick="eliminar({{$m->id}})">Eliminar</button></td>
                   
                    <td><button class="btn btn-secondary" data-toggle="modal" data-target="#editar{{$m->id}}">Editar</button></td>
                    <div class="modal fade" id="editar{{$m->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Mascota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" enctype="multipart/form-data" action="{{ route('editMascota',[$m->id])}}">
      {{ csrf_field() }}
      <input type="text" name="idMascota" class="form-control"  value="{{$m->id}}"  disabled>
                  
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" value="{{$m->nombre}}" placeholder="nombre">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">edad</label>
                    <input type="number" name="edad" class="form-control" id="exampleInputPassword1" value="{{$m->edad}}" placeholder="edad" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">especie</label>
                    <input type="text" name="especie" class="form-control" id="exampleInputEmail1" value="{{$m->especie}}" placeholder="especie" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">raza</label>
                    <input type="text" name="raza" class="form-control" id="exampleInputEmail1" value="{{$m->raza}}" placeholder="raza" required>
                  </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1">Adoptante</label>
                  <select class="form-control"  name="adoptante">
                  <option value="0">seleccione</option> 
                   @forelse($adoptantes as $m) 
                   <option value="{{$m->id}}" select>{{$m->nombres}}</option> 
                 
                  @empty
                  
                   <div id="evento" class="alert alert-danger" role="alert">
                     no se ha registrado ninguna persona <a href="#" class="alert-link"></a>. 
                   </div>
                   @endforelse   
                   </select>
                 </div>
                 <div class="form-group">
                    <label for="exampleInputEmail1">Veterinaria(Opcional)</label>
                    <select class="form-control" name="veterinaria">
                    <option value="0">seleccione</option> 
                  
                    @forelse($veterinarias as $m) 
                    <option value="{{$m->id}}">{{$m->nombre}}</option> 
                  
                   @empty
                   
                    <div id="evento" class="alert alert-danger" role="alert">
                      no se ha registrado ninguna veterinaria <a href="#" class="alert-link"></a>. 
                    </div>
                    @endforelse   
                    </select>
                  </div>
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

                  
                  </tr>
                  </tbody>
                  @empty

<div id="evento" class="alert alert-danger" role="alert">
  no se ha registrado ninguna mascota <a href="#" class="alert-link"></a>. 
</div>
@endforelse   

<hr>
<div class="row">
             
    <div col-12 style="text-align: center; margin-left: auto;
    margin-right: auto;">
            {{ $mascotas->render()}}
    </div>
                </table>
              </div>
<script>
function eliminar(id){
  Swal.fire({
  title: 'Estas seguro?',
  text: "Quieres eliminar la mascota!",
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
                url: "/deleteMascotas/"+id,
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
  text: 'No se puede eliminar esta mascota!',

})
                  }
				
                    }         
            });
          }
</script>





@endsection