<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomainModel extends Model
{
    use HasFactory;

    protected $table = 'domains';


    protected $fillable = [
        'user_id',
        'domain',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pages()
    {
        return $this->hasMany(PageModel::class);
    }
}
