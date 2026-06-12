<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('categorias')->insert([
            [
                "nome" => "Programação",
                "cor" => "#3B52F6"
            ],
            [
                "nome" => "Inteligência Artificial",
                "cor" => "#8B5CF6"
            ],
            [
                "nome" => "Hardware",
                "cor" => "#108981"
            ],
        ]);
    }
}
