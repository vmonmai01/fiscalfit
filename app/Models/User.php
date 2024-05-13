<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Notification;
use App\Models\Expense;
use App\Models\Income;
use App\Models\Balance;
use App\Models\Transaction;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'birthdate',
        'avatar',
        'rol',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = ['deleted_at'];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * Retrieves the notifications associated with this object.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
    public function incomes()
    {
        return $this->hasMany(Income::class);
    }
    /**
     * Define la relación uno a muchos con la tabla 'balances'.
     */
    public function balances()
    {
        return $this->hasMany(Balance::class);
    }

    /**
     * Define la relación uno a muchos con la tabla 'transactions'.
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
