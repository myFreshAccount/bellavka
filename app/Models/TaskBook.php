<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskBook extends Model
{
    protected $fillable = [
        'user_name',
        'email',
        'body',
        'checked',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'checked' => 'bool',
    ];
}
