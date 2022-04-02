<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTypes extends Model
{
    use HasFactory;

    protected $fillable = ['user_type'];

    protected $primaryKey = 'id';
    public $incrementing = true;
 
}
