<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Iluminate\Support\Facades\DB;
use Database\Seeders\Str;


class Grupos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($x=0; $x<100; $x++){
            \DB::table('grupo')->insert([
                'nombre' => \Str::random(10),
                'clave' => \Str::random(10),
            ]);
        }
    }
}
