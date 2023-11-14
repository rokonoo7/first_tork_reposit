<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laravel extends Model
{
    use HasFactory;
    protected $table='laravel';
    protected $primaryKey='id';

    function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
