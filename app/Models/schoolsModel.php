<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class schoolsModel extends Model
{
    protected $table = 'noko_schools';
    public $timestamps = false;

    protected $fillable = ['deleted','ate','name', 'con','vib','address','site'];
}
