<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificados Moodle</title>
</head>
<body>
    <form method="post" action="{{route('obtenercertificado')}}">
        @csrf
        <label for="username">Ingrese Usuario: </label>
        <input type="text" name="username" id="username"/>
        <button type="submit">Consultar</button>
    </form>
    <br>
    <br>
    <table>
        <thead>
            <tr>
                <th>Participante</th>
                <th>Certificación</th>
                <th>Código</th>
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
                        <td>{{ $customcertIssue->code }}</td>
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
</body>
</html>
