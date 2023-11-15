<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Employee extends Model
{
    use HasFactory;
    protected $table ="employees";
    protected $fillable=[
        'name',
        'email',
        'password',
        'address',
        'image',
        'phone',
        'salary',
        'position',
        'date_of_birth',
        'user_id',

    ];
    public function users(): BelongsTo
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    public function staffs() 
    {
        return $this->HasMany('App\Models\Staff','employee_id', 'id');
    }
}
