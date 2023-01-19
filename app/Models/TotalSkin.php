<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TotalSkin extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'total_skin';
    protected $fillable = [
        'total_skin'
    ];
}
