<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFavoriteModel extends Model
{
    use HasFactory;

    protected $table = 'product_favorite'; 

    protected $fillable = ['id_product', 'id_user'];

    public function isFavoritedByUser($user)
    {
        return $this->favorites()->where('id_user', $user->id)->exists();
    }

        public function product()
    {
        return $this->belongsTo(ProductModel::class, 'id_product');
    }
}
