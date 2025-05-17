<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drazba extends Model
{
    use HasFactory;

    protected $table = 'drazbas';

    protected $fillable = [
        'ime_izdelka',
        'izvajalec',
        'datum_zacetka',
        'trajanje',
        'price'
    ];

}
