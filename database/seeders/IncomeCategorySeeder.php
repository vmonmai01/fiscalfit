<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IncomeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $incomeCategories = [
            ['type' => 'Salario', 'description' => 'Ingresos regulares del empleo'],
            ['type' => 'Trabajo Freelance', 'description' => 'Ingresos de trabajo autónomo o independiente'],
            ['type' => 'Inversiones', 'description' => 'Ingresos de inversiones'],
            ['type' => 'Otros', 'description' => 'Cualquier otro tipo de ingreso no cubierto en las categorías anteriores'],
        ];
        

        DB::table('income_categories')->insert($incomeCategories);
    }
}
