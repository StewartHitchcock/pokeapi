<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $table = 'Pokemon';

    protected $fillable = ['name', 'url'];
}
