<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'description',
        
    ];

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
