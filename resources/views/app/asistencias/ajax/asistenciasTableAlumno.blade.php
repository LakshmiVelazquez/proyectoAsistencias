
<script>
    $("#table-1").dataTable({
        "columnDefs": [
            { "sortable": false, "targets": [2, 3] }
        ]
    });
</script>
<div class="col-md-12">
    @if(count($asistencias)>0)
        <div class="table-responsive">
            <table class="table table-striped" id="table-1">
                <thead>
                    <tr>
                        <th width="10%" class="text-center">#</th>
                        <th>Nombre</th>
                        <th width="10%" class="text-center">Fecha</th>
                        <th width="10%" class="text-center">Hora</th>
                        <th width="10%">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($asistencias as $key => $asistencia)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $asistencia->alumno->nombre }}</td>
                            <td class="text-center">{{ date('d-m-Y',strtotime($asistencia->fecha)) }}</td>
                            <td class="text-center">
                                {{ date('h:i',strtotime($asistencia->fecha)) }}
                            </td>
                            <td class="text-center">
                                @if(session()->get('usuario_tipo') == "A")
                                    <a href="{{ route('appAsistenciasEliminar',$asistencia->id) }}" class="text-danger h2">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <h4 class="text-danger">Sin asistencias registradas</h4>
    @endif
</div>