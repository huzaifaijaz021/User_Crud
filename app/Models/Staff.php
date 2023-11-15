<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Staff extends Model
{
    use HasFactory;
    protected $table ="staff_employees";
    protected $fillable=[
        'name',
        'email',
        'salary',
        'position',
        'user_id',
        'employee_id,'
    ];
    public function employees(): BelongsTo
    {
        return $this->belongsTo('App\Models\Employee', 'employee_id', 'id');
    }
}
