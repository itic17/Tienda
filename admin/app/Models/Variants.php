<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variants extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function product()
    {
        /**
         * Aqui no supe que relación colocar
         */
        return $this->belongsTo(Products::class);
    }
}
