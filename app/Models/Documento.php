<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $fillable = ['NOME','ORDEM_I','ORDEM_II'
    ];

    use HasFactory;
}