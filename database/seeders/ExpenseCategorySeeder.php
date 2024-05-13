<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpenseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $expenseCategories = [
            ['type' => 'Alquiler o Hipoteca', 'description' => 'Pagos mensuales por alquiler de vivienda o hipoteca'],
            ['type' => 'Servicios', 'description' => 'Pagos por servicios básicos como electricidad, agua, gas, teléfono, internet, etc.'],
            ['type' => 'Comestibles', 'description' => 'Gastos relacionados con la compra de alimentos y comestibles'],
            ['type' => 'Transporte', 'description' => 'Gastos relacionados con el transporte, como gasolina, transporte público, mantenimiento de vehículos, etc.'],
            ['type' => 'Cuidado de la Salud', 'description' => 'Gastos relacionados con la atención médica, como seguro médico, visitas al médico, medicamentos, etc.'],
            ['type' => 'Educación', 'description' => 'Gastos relacionados con la educación, como matrículas, libros, material escolar, etc.'],
            ['type' => 'Entretenimiento', 'description' => 'Gastos relacionados con actividades de ocio y entretenimiento, como películas, restaurantes, viajes, etc.'],
            ['type' => 'Ropa', 'description' => 'Gastos relacionados con la compra de ropa y accesorios'],
            ['type' => 'Ahorros e Inversiones', 'description' => 'Fondos asignados para ahorros o inversiones'],
            ['type' => 'Deudas', 'description' => 'Pagos de préstamos, tarjetas de crédito u otras deudas pendientes'],
            ['type' => 'Seguros', 'description' => 'Pagos por seguros, como seguros de vida, seguros de hogar, seguros de automóvil, etc.'],
            ['type' => 'Regalos y Donaciones', 'description' => 'Gastos relacionados con regalos para amigos y familiares, así como donaciones a organizaciones benéficas'],
            ['type' => 'Impuestos', 'description' => 'Pagos de impuestos, como impuestos sobre la renta, impuestos sobre la propiedad, etc.'],
            ['type' => 'Otros', 'description' => 'Cualquier otro tipo de gasto no cubierto en las categorías anteriores']
        ];

        DB::table('expense_categories')->insert($expenseCategories);
    }
}
