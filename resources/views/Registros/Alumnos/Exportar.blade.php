<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro - Alumnos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Matricula</th>
            <th scope="col">Nombre</th>
            <th scope="col">Fecha</th>
            <th scope="col">Actividad</th>
            <th scope="col">Materia</th>
            <th scope="col">Carrera</th>
            <th scope="col">Laboratorio</th>
            <th scope="col">Observaciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($registro_Alumnos as $item)
             <tr>
                <td>{{ $item->Matricula }}</td>
                <td>{{$item->Nombre}}</td>
                <td>{{$item->Fecha}}</td>
                <td>{{$item->Actividad}}</td>
                <td>{{$item->Materia}}</td>
                <td>{{$item->Carrera}}</td>
                <td>{{ $item->Laboratorio }}</td>
                <td>{{$item->Observaciones}}</td>
             </tr>
            @endforeach
           </tbody>
      </table>
</body>
</html>