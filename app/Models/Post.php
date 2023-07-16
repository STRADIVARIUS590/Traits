<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public static $validation_rules = ['user_id' => 'required|exists:users,id', 'title' => 'required', 'body' =>'required'];
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'user_id' 
    ];
}
