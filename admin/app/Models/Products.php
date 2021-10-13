<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Get the variants for the Product.
     */
    public function variants()
    {
        return $this->hasMany(Variants::class);
    }

    public function provider()
    {
        return $this->hasOne(Providers::class);
    }

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
}
