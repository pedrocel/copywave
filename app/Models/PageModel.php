<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class PageModel extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'pages';

    protected $fillable = [
        'id',
        'name',
        'url_page',
        'url_checkout',
        'external_id',
        'user_id',
        'visits',
        'is_public',
        'status',
        'content',
        'url_old',
        'domain_id',
    ];

    protected $keyType = 'string';
    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function domain()
    {
        return $this->belongsTo(DomainModel::class);
    }
}