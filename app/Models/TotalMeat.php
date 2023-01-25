<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalMeat extends Model
{
    use HasFactory;

    protected $table = 'total_meat';
    protected $fillable = [
        'total_meat'
    ];
}
