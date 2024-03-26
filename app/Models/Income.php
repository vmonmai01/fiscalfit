<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Income extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'amount',
        'description',
        'date',
        'recurring_period',
        'photo',
        'income_category_id',
    ];
    protected $dates = ['deleted_at'];
    public function category()
    {
        return $this->belongsTo(IncomeCategory::class);
    }
}
