<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meat extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'meats';
    protected $fillable = [
        'butcher_id','weight','price','meat_grade','total_price','deleted_at'
    ];
}
