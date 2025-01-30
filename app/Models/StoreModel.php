<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreModel extends Model
{
    protected $table = 'stores'; 

    protected $fillable = ['name', 'url_imagem'];
}
