
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Correo electronico</th>
            <th>Tipo</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $key => $usuario)
           <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $usuario->name }}</td>
                <td>
                    {{ $usuario->email }}
                </td>
                <td>
                    @if($usuario->tipo == "M")
                        Maestro
                    @else
                        Administrador
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
