<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EmpleadosController extends Controller
{
    public function index()
    {
        return view('LogoutEmpleado');
    }

    public function empleado_dato(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'fecha_contratacion' => 'required',
            'puesto' => 'required',
            'salario' => 'required',
            'departamento' => 'required',
        ]);
        $empleado = new Empleados();
        $empleado->nombre = $request->nombre;
        $empleado->apellido = $request->apellido;
        $empleado->email = $request->email;
        $empleado->telefono = $request->telefono;
        $empleado->fecha_contratacion = $request->fecha_contratacion;
        $empleado->puesto = $request->puesto;
        $empleado->salario = $request->salario;
        $empleado->departamento = $request->departamento;
        $empleado->save();
        return "Empleado: \n" .$request->nombre. "\nGracias por contestar el formulario";
    }

    public function empleado_mostrar(){
        $request = request();
        echo "Busqueda de empleado: \n";
        echo "<form action='/empleado_buscar' method='POST'>";
        echo "<input type='hidden' name='_token' value='".csrf_token()."'>";
        echo "Nombre: <input type='text' name='nombre'>";
        echo "Apellido: <input type='text' name='apellido'>";
        echo "<input type='submit' value='Buscar'>";
        echo "</form>";
        $empleado= DB::table('empleados')
        ->select('nombre', 'apellido', 'email', 'telefono', 'fecha_contratacion', 'puesto', 'salario', 'departamento')
        ->where ('nombre', $request->nombre)
        ->where ('apellido', $request->apellido)
        ->get();
        foreach ($empleado as $empleado) {
            echo "Nombre: ".$empleado->nombre. "<br>";
            echo "Apellido: ".$empleado->apellido. "<br>";
            echo "Email: ".$empleado->email. "<br>";
            echo "Telefono: ".$empleado->telefono. "<br>";
            echo "Fecha de contratacion: ".$empleado->fecha_contratacion. "<br>";
            echo "Puesto: ".$empleado->puesto. "<br>";
            echo "Salario: ".$empleado->salario. "<br>";
            echo "Departamento: ".$empleado->departamento. "<br>";
            echo "<a href='/empleado'>Cerrar Sesion</a>";
        }
    }

    public function empleado_ordenamiento(){
        $empleado= DB::table('empleados')
        ->select('nombre', 'apellido', 'email', 'telefono', 'fecha_contratacion', 'puesto', 'salario', 'departamento')
        ->orderBy('nombre', 'asc')
        ->get();
        foreach ($empleado as $empleado) {
            echo "Nombre: ".$empleado->nombre. "<br>";
            echo "Apellido: ".$empleado->apellido. "<br>";
            echo "Email: ".$empleado->email. "<br>";
            echo "Telefono: ".$empleado->telefono. "<br>";
            echo "Fecha de contratacion: ".$empleado->fecha_contratacion. "<br>";
            echo "Puesto: ".$empleado->puesto. "<br>";
            echo "Salario: ".$empleado->salario. "<br>";
            echo "Departamento: ".$empleado->departamento. "<br>";
            echo "<a href='/empleado'>Cerrar Sesion</a>";
            echo "<br>";
        }
    }

    public function empleado_ordenamiento_descendiente(){
        $empleado= DB::table('empleados')
        ->select('nombre', 'apellido', 'email', 'telefono', 'fecha_contratacion', 'puesto', 'salario', 'departamento')
        ->orderBy('nombre', 'desc')
        ->get();
        foreach ($empleado as $empleado) {
            echo "Nombre: ".$empleado->nombre. "<br>";
            echo "Apellido: ".$empleado->apellido. "<br>";
            echo "Email: ".$empleado->email. "<br>";
            echo "Telefono: ".$empleado->telefono. "<br>";
            echo "Fecha de contratacion: ".$empleado->fecha_contratacion. "<br>";
            echo "Puesto: ".$empleado->puesto. "<br>";
            echo "Salario: ".$empleado->salario. "<br>";
            echo "Departamento: ".$empleado->departamento. "<br>";
            echo "<a href='/empleado'>Cerrar Sesion</a>";
        }
    }

    public function empleado_buscar(){
        $request = request();
        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $empleado= DB::table('empleados')
        ->select('nombre', 'apellido', 'email', 'telefono', 'fecha_contratacion', 'puesto', 'salario', 'departamento')
        ->where ('nombre', $request->nombre)
        ->get();
        $aux=0;
        foreach ($empleado as $empleado) {
            $aux++;
            echo "Nombre: ".$empleado->nombre. "<br>";
            echo "Apellido: ".$empleado->apellido. "<br>";
            echo "Email: ".$empleado->email. "<br>";
            echo "Telefono: ".$empleado->telefono. "<br>";
            echo "Fecha de contratacion: ".$empleado->fecha_contratacion. "<br>";
            echo "Puesto: ".$empleado->puesto. "<br>";
            echo "Salario: ".$empleado->salario. "<br>";
            echo "Departamento: ".$empleado->departamento. "<br>";
            echo "<a href='/empleado'>Cerrar Sesion</a>";
        }
        if($aux==0){
            echo "Empleado no encontrado";
        }
    }
    
    public function generar_json(){
        $empleado= DB::table('empleados')
        ->select('nombre', 'apellido', 'email', 'telefono', 'fecha_contratacion', 'puesto', 'salario', 'departamento')
        ->get();
        $json = json_encode($empleado);
        $file = fopen("empleados.json", "w");
        fwrite($file, $json);
        fclose($file);
        echo "<center>";
        echo "Archivo generado";
        echo "<br>";
        echo "<a href='/empleado'>Cerrar Sesion</a>";
        echo "</center>";
        $json = file_get_contents("empleados.json");
        $json = json_decode($json, true);
        foreach ($json as $json) {
            echo "<br>";
            echo "<br>";
            echo "Nombre: ".$json['nombre']. "<br>";
            echo "Apellido: ".$json['apellido']. "<br>";
            echo "Email: ".$json['email']. "<br>";
            echo "Telefono: ".$json['telefono']. "<br>";
            echo "Fecha de contratacion: ".$json['fecha_contratacion']. "<br>";
            echo "Puesto: ".$json['puesto']. "<br>";
            echo "Salario: ".$json['salario']. "<br>";
            echo "Departamento: ".$json['departamento']. "<br>";
            echo "<br>";
        }
    }
}
