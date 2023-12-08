<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apitut extends Model
{
    use HasFactory;
    protected $fillable=[
        'name','email','contact','password','pincode','adress'
    ];
}
