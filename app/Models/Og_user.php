<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Og_user extends Model
{
    use HasFactory;

    protected $table='og_users';
    protected $primarykey='id';
}
