
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Cant. Grupo(s)</th>
            <th>Cant. Materias(s)</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($maestros as $key => $maestro)
           <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $maestro->nombre }}</td>
                <td>{{ $maestro->telefono }}</td>
                <td>{{ count($maestro->grupos) }}</td>
                <td>{{ count($maestro->materias) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
