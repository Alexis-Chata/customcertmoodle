<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificados Moodle</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
              <b>Consultar certificado</b>
            </div>
            <div class="card-body">
              <h5 class="card-title">Ingresar Usuario :</h5>
              <form method="post" action="{{route('obtenercertificado')}}">
                @csrf
                <input type="text" class="form-control" name="username" id="username"/>
                <button type="submit" class="btn btn-primary mt-2">Consultar</button>
            </form>
            </div>
          </div>
    </div>
    <br>
    <br>
    <div class="container">
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>Participante</th>
                <th>Certificación</th>
                <th>Nota</th>
                <th>Código</th>
                <th>fecha de Expiración</th>
                <th>Descarga</th>
            </tr>
        </thead>
        <tbody>
            @if ($customcertIssues->count())
                @foreach ( $customcertIssues as $customcertIssue )
                    @foreach ( $customcertIssue->coursemodule as $coursemodule )
                    <tr>
                        <td>{{ $customcertIssue->datausermoodle->firstname.' '.$customcertIssue->datausermoodle->lastname }}</td>
                        <td>{{ $customcertIssue->customcerts->name }}</td>
                        <td>-</td>
                        <td>{{ $customcertIssue->code }}</td>
                        <td>{{  date('d M Y',$customcertIssue->timecreated) }}</td>
                        <td><a href="{{ $coursemodule->url }}">Descargar</a></td>
                    </tr>
                    @endforeach
                @endforeach
            @else
                    <tr>
                        <td colspan="4">nada que mostrar</td>
                    </tr>
            @endif
        </tbody>
    </table>
    </div>
</body>
</html>
