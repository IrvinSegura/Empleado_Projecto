<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Iluminate\Support\Facades\DB;

class Alumno extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        function matriculaNumero(){
            $numero = "";
            $longitudNumero = 8;
            for($i=1; $i<=$longitudNumero; $i++){
                $numero .= rand(0,9);
            }
            return $numero;
        }

        function nombreCadena(){
            $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
            $longitudCadena=strlen($cadena);
            $nombre = "";
            $longitudNombre = 10;
            for($i=1; $i<=$longitudNombre; $i++){
                $pos = rand(0,$longitudCadena-1);
                $nombre .= substr($cadena,$pos,1);
            }
            return $nombre;
        }

        function apellido_paternoCadena(){
            $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
            $longitudCadena=strlen($cadena);
            $apellido_paterno = "";
            $longitudApellido_paterno = 10;
            for($i=1; $i<=$longitudApellido_paterno; $i++){
                $pos = rand(0,$longitudCadena-1);
                $apellido_paterno .= substr($cadena,$pos,1);
            }
            return $apellido_paterno;
        }

        function apellido_maternoCadena(){
            $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
            $longitudCadena=strlen($cadena);
            $apellido_materno = "";
            $longitudApellido_materno = 10;
            for($i=1; $i<=$longitudApellido_materno; $i++){
                $pos = rand(0,$longitudCadena-1);
                $apellido_materno .= substr($cadena,$pos,1);
            }
            return $apellido_materno;
        }

        for($x=0; $x<100; $x++){
            \DB::table('alumno')->insert([
                'matricula' => matriculaNumero(),
                'nombre' => nombreCadena(),
                'apellido_paterno' => apellido_paternoCadena(),
                'apellido_materno' => apellido_maternoCadena(),
            ]);
        }
}
}