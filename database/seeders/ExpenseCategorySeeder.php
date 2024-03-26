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
            ['type' => 'Rent or Mortgage', 'description' => 'Monthly payments for housing rent or mortgage'],
            ['type' => 'Utilities', 'description' => 'Payments for basic utilities such as electricity, water, gas, phone, internet, etc.'],
            ['type' => 'Groceries', 'description' => 'Expenses related to purchasing food and groceries'],
            ['type' => 'Transportation', 'description' => 'Expenses related to transportation, such as gasoline, public transportation, vehicle maintenance, etc.'],
            ['type' => 'Healthcare', 'description' => 'Expenses related to healthcare, such as medical insurance, doctor visits, medications, etc.'],
            ['type' => 'Education', 'description' => 'Expenses related to education, such as tuition fees, books, school supplies, etc.'],
            ['type' => 'Entertainment', 'description' => 'Expenses related to leisure and entertainment activities, such as movies, restaurants, trips, etc.'],
            ['type' => 'Clothing', 'description' => 'Expenses related to purchasing clothing and accessories'],
            ['type' => 'Savings and Investments', 'description' => 'Funds allocated for savings or investments'],
            ['type' => 'Debts', 'description' => 'Payments for loans, credit cards, or other outstanding debts'],
            ['type' => 'Insurance', 'description' => 'Payments for insurance, such as life insurance, home insurance, car insurance, etc.'],
            ['type' => 'Gifts and Donations', 'description' => 'Expenses related to gifts for friends and family, as well as donations to charitable organizations'],
            ['type' => 'Taxes', 'description' => 'Payments for taxes, such as income taxes, property taxes, etc.'],
            ['type' => 'Other', 'description' => 'Any other type of expense not covered in the above categories']
        ];

        DB::table('expense_categories')->insert($expenseCategories);
    }
}
