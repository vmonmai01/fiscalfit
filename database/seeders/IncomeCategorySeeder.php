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
            ['type' => 'Salary', 'description' => 'Regular income from employment'],
            ['type' => 'Freelance', 'description' => 'Income from freelance work'],
            ['type' => 'Investment', 'description' => 'Income from investments'],
            ['type' => 'Other', 'description' => 'Any other type of income not covered in the above categories'],
        ];

        DB::table('income_categories')->insert($incomeCategories);
    }
}
