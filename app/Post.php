<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['titulo', 'tipo','descricao','animal','cidade','user_id'];

    public $timestamps = false;
}
