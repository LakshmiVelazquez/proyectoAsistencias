
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Matricula</th>
            <th>Teléfono</th>
            <th>Cant. Grupo(s)</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($alumnos as $key => $alumno)
           <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $alumno->nombre }}</td>
                <td>{{ $alumno->matricula }}</td>
                <td>{{ $alumno->telefono }}</td>
                <td>{{ count($alumno->grupos) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
