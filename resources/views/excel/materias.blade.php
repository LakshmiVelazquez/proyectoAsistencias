
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($materias as $key => $materia)
           <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $materia->nombre }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
