<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTipo extends Model
{
    protected $guarded = ['id'];
    protected $table = 'users_tipos';

    use HasFactory;
}
