<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TELAFAX-II</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</head>
<body>
    
    <div class="container">
{{--         <h1 align="center">TELAFAX-II</h1> --}}
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4 col-xxl-12">
                <table class="table" align="center">
                    <thead align="center">
                        <button  type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crear">nuevo</button>
                    <tr>  
                        <th scope="col">Id</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acción</th>
                    </tr>
                    </thead>
                    <tbody class="table-group-divider" align="center">

                    @foreach ($dato as $item) 
                    <tr>
                        <th>{{$item['id']}}</th>
                        <td>{{$item['Descripcion']}}</td>
                        <td>{{$item['Categoria']}}</td>
                        <td>{{$item['precio']}}</td>
                        <td>{{$item['estado']}}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Actualizar{{$item['id']}}">Actualizar</button>
                            <button type="submit" class="btn btn-danger"><a href="{{route('eliminar.delete', $item['id'])}}">Eliminar</a></button>
                            
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
<!----------------------------------------MODAL DE INSERTAR --------------------------------------------------------->
<div class="modal fade" id="crear" data-bs-backdrop="static" tabindex="-1" aria-labelledby="crear" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Insertar Un Nuevo Producto</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="row g-3 needs-validation" action="{{route('Crear-registro.store')}}" method="POST">
                @csrf
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Descripcion</label>
                    <input type="text" class="form-control" id="Descripcion" name="Descripcion" required>
                </div>

                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">Categoria</label>
                    <input type="text" class="form-control" id="Categoria" name="Categoria" required>
                    <div class="valid-feedback">
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="validationCustomUsername" class="form-label">Precio</label>
                    <div class="input-group has-validation">
                    <input type="text" class="form-control" id="precio" name="precio" aria-describedby="inputGroupPrepend" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Estado</label>
                    <input type="text" class="form-control" id="estado" name="estado" required>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Insertar</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
<!-------------------------------------------------------------------------------------------------------------------->


<!------------------------------------------------Modal Actualizar---------------------------------------------------->
@foreach ($dato as $item) 
<div class="modal fade" id="Actualizar{{$item['id']}}" data-bs-backdrop="static" tabindex="-1" aria-labelledby="Actualizar" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="" action="{{ route('Actualizar.update', ['id' => $item['id']]) }}" method="POST">
                @csrf

                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Descripcion</label>
                    <input type="text" class="form-control" id="Descripcion" name="Descripcion" value="{{$item['Descripcion']}}">
                </div>

                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">Categoria</label>
                    <input type="text" class="form-control" id="Categoria" name="Categoria" value="{{$item['Categoria']}}" required>
                    <div class="valid-feedback">
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="validationCustomUsername" class="form-label">Precio</label>
                    <div class="input-group has-validation">
                    <input type="text" class="form-control" id="precio" name="precio" value="{{$item['precio']}}" aria-describedby="inputGroupPrepend" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Estado</label>
                    <input type="text" class="form-control" id="estado" name="estado" value="{{$item['estado']}}" required>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  <!-------------------------------------------------------------------------------------------------------------------->
</body>
</html>