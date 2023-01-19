<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Butcher extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'butchers';
    protected $fillable = [
        'name','price','skin_grade','deleted_at'
    ];
}
