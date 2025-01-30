<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductModel extends Model
{
    protected $table = 'products'; 

    protected $fillable = [
        'name',                // Nome do produto
        'description',         // Descrição do produto
        'price',               // Preço do produto
        'sales_count',         // Quantidade de vendas
        'is_trending',         // Produto em alta (booleano)
        'rating',              // Avaliação média do produto
        'link',                // Link do produto no marketplace
        'image_url',           // URL da imagem do produto
        'category',            // ID da categoria (inteiro)
        'status',              // Status do produto (inteiro) (1: visível, 0: não visível)
        'possible_profit',     // Lucro possível do produto
        'created_at',          // Data de criação
        'updated_at',          // Data de atualização
        'id_store'
    ];

    // Definir o tipo de chave primária como UUID
    protected $keyType = 'string';

    // Não auto-incrementar a chave primária
    public $incrementing = false;

    // Definir UUID como padrão
    protected static function booted()
    {
        static::creating(function ($product) {
            // Gerar UUID antes de criar um novo produto
            $product->id = (string) str::uuid();
        });
    }

    public function isFavoritedByUser($user)
    {
        return $this->favorites()->where('id_user', $user->id)->exists();
    }

        public function favorites()
    {
        return $this->hasMany(ProductFavoriteModel::class, 'id_product');
    }


    public function categoryR()
    {
        return $this->hasOne(CategoryModel::class, 'id', 'category');
    }

    /**
     * Relacionamento com a loja.
     */
    public function store()
    {
        return $this->belongsTo(StoreModel::class, 'id_store', 'id');
    }
}
