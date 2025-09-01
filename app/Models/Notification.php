<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $connection='mysql2';

    protected $fillable = ['condition'];
}
