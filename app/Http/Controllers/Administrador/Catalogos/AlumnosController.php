<?php

namespace App\Http\Controllers\Administrador\Catalogos;

use App\Models\User;
use App\Models\Grupo;
use App\Models\Padre;
use App\Models\Alumno;
use App\Models\AlumnoGrupo;
use App\Models\PadreAlumno;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\AlumnosExport;
use Maatwebsite\Excel\Facades\Excel;
use Phpml\Regression\SVR;
use Phpml\SupportVectorMachine\Kernel;

class AlumnosController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::where('estatus', 'A')->get();

        // Datos de entrenamiento
        $trainingData = [
            [5, 90, 8, 95],  // [Tiempo de estudio, Asistencia, Calificación previa, Calificación actual]
            [10, 100, 95, 100],
            [10, 100, 95, 100],
            [10, 100, 95, 100],
            [10, 100, 95, 100],
            [10, 100, 95, 100],
            [10, 100, 95, 100],
            [10, 100, 95, 100],
            [10, 100, 95, 100],
            [10, 100, 95, 100],
            [10, 100, 95, 100],
            [10, 100, 95, 100],
            [10, 100, 95, 100],
            [10, 100, 95, 100],
            [10, 100, 95, 100],
            [10, 100, 95, 100],
            [10, 100, 95, 100],
            [10, 100, 95, 100],
        ];
        $targets = [58.35, 81.5, 81.5, 81.5, 81.5, 81.5, 81.5, 81.5, 81.5, 81.5, 81.5, 81.5, 81.5, 81.5, 81.5, 81.5, 81.5, 81.5];

        // Entrenamiento del modelo
        $regression = new SVR(Kernel::LINEAR);
        $regression->train($trainingData, $targets);

        foreach ($alumnos as $alumno) {
            // Ejemplo de predicción para un nuevo estudiante
            $newStudent = [rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100)];  // [Tiempo de estudio, Asistencia, Calificación previa]
            $predictedGrade = $regression->predict($newStudent);
            $alumno->predicted = $predictedGrade;
        }

        return view("app.catalogos.alumnos.index", ["alumnos" => $alumnos]);
    }

    public function registrar()
    {
        $padres = Padre::where('estatus', 'A')->orderby('nombre', 'asc')->get();
        return view("app.catalogos.alumnos.registrar", ["padres" => $padres]);
    }

    public function agregar(Request $request)
    {
        $data = $request->all();

        $alumno = new Alumno();
        $alumno->nombre = $data["nombre"];
        $alumno->matricula = $data["matricula"];
        $alumno->telefono = $data["telefono"];
        $alumno->save();

        $grupos = json_decode($data["grupos"]);

        foreach ($grupos as $grupo) {
            $temp = new AlumnoGrupo();
            $temp->grupo_id = $grupo;
            $temp->alumno_id = $alumno->id;
            $temp->save();
        }

        $user = User::where('email', $data["email"])->get()->first();
        if ($user == null) {
            $user = new User();
            $user->email = $data["email"];
            $user->name = $data["nombre"];
            $user->tipo = "P";
            $user->password = bcrypt($data["password"]);
            $user->save();

            $padre = new Padre();
            $padre->user_id = $user->id;
            $padre->nombre = $data["nombre_padre"];
            $padre->telefono = $data["telefono_padre"];
            $padre->direccion = $data["direccion"];
            $padre->save();
        } else {
            $padre = $user->padre;
        }

        $temp = new PadreAlumno();
        $temp->alumno_id = $alumno->id;
        $temp->padre_id = $padre->id;
        $temp->save();


        alert()->success("Alumno registrado correctamente.")->autoclose(5000);
        return redirect()->route('alumnosIndex');
    }

    public function editar($id)
    {
        $alumno = Alumno::find($id);
        $padres = Padre::where('estatus', 'A')->orderby('nombre', 'asc')->get();
        return view("app.catalogos.alumnos.editar", ["alumno" => $alumno, "padres" => $padres]);
    }

    public function actualizar(Request $request)
    {
        $data = $request->all();

        $alumno = Alumno::find($data["id"]);
        $alumno->nombre = $data["nombre"];
        $alumno->matricula = $data["matricula"];
        $alumno->telefono = $data["telefono"];
        $alumno->save();

        foreach ($alumno->grupos as $grupo) {
            $grupo->delete();
        }

        $grupos = json_decode($data["grupos"]);

        foreach ($grupos as $grupo) {
            $temp = new AlumnoGrupo();
            $temp->grupo_id = $grupo;
            $temp->alumno_id = $alumno->id;
            $temp->save();
        }
        if ($alumno->padre != null)
            $alumno->padre->delete();

        $user = User::where('email', $data["email"])->get()->first();
        if ($user == null) {
            $user = new User();
            $user->email = $data["email"];
            $user->name = $data["nombre"];
            $user->tipo = "P";
            $user->password = bcrypt($data["password"]);
            $user->save();

            $padre = new Padre();
            $padre->user_id = $user->id;
            $padre->nombre = $data["nombre_padre"];
            $padre->telefono = $data["telefono_padre"];
            $padre->direccion = $data["direccion"];
            $padre->save();
        } else {
            $padre = $user->padre;
        }

        $temp = new PadreAlumno();
        $temp->alumno_id = $alumno->id;
        $temp->padre_id = $padre->id;
        $temp->save();

        alert()->success("Alumno actualizado correctamente.")->autoclose(5000);
        return redirect()->route('alumnosIndex');
    }

    public function eliminar($id)
    {
        $alumno = Alumno::find($id);
        $alumno->estatus = "I";
        $alumno->save();

        if ($alumno->padre != null)
            $alumno->padre->delete();

        foreach ($alumno->grupos as $grupo) {
            $grupo->delete();
        }

        alert()->warning("Alumno eliminado correctamente.")->autoclose(5000);
        return redirect()->route('alumnosIndex');
    }

    public function informacion($id)
    {
        $alumno = Alumno::find($id);
        return view("app.catalogos.alumnos.informacion", ["alumno" => $alumno]);
    }

    public function grupos()
    {
        $grupos = Grupo::where([['grado', $_GET["grado"]], ['estatus', 'A']])->get();

        $data = [
            'datos' => $grupos
        ];

        return response()->json($data);
    }

    public function generateExcelAlumnos()
    {
        return Excel::download(
            new AlumnosExport(),
            "alumnos_" . date('Y_m_d') . ".xlsx",
            'Xlsx',
            ['X-Vapor-Base64-Encode' => 'True']
        );
    }

    public function datosPadre()
    {
        $padre = Padre::where('id', $_GET["padre"])->with('user')->get();

        return $padre[0];
    }
}
