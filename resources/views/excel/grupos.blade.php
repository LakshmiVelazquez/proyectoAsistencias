
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Grado</th>
            <th>Grupo</th>
            <th>Cant. Materias</th>
            <th>Cant. Alumnos</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($grupos as $key => $grupo)
           <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $grupo->nombre }}</td>
                <td>{{ $grupo->grado }}</td>
                <td>{{ $grupo->grupo }}</td>
                <td>{{ count($grupo->materias) }}</td>
                <td>{{ count($grupo->alumnos) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
