<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageModification extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id',
        'type',
        'old_value',
        'new_value',
    ];

    public function page()
    {
        return $this->belongsTo(PageModel::class);
    }
}