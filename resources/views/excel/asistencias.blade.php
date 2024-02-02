
<table>
    <thead>
        <tr>
            <th width="10%" class="text-center">#</th>
            <th>Nombre</th>
            <th width="10%" class="text-center">Fecha</th>
            <th width="10%" class="text-center">Hora</th>
        </tr>
    </thead>
    <tbody>
        @foreach($asistencias as $key => $asistencia)
            @if($grupo != "-1")
                @if($asistencia->alumno->grupos->where('id_grupo',$grupo))
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $asistencia->alumno->nombre }}</td>
                        <td class="text-center">{{ date('d-m-Y',strtotime($asistencia->fecha)) }}</td>
                        <td class="text-center">
                            {{ date('h:i',strtotime($asistencia->fecha)) }}
                        </td>
                    </tr>
                @endif
            @else
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $asistencia->alumno->nombre }}</td>
                    <td class="text-center">{{ date('d-m-Y',strtotime($asistencia->fecha)) }}</td>
                    <td class="text-center">
                        {{ date('h:i',strtotime($asistencia->fecha)) }}
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>
