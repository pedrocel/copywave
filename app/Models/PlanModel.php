<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanModel extends Model
{
    use HasFactory;

    protected $table = 'plans'; 
    //s
    protected $fillable = [
        'name',
        'description',
        'link_image',
        'id_plan_external',
        'id_offer_external',
        'link_checkout_external',
        'value',
        'page_quantity',
        'billing_cycle',
        'status',
    ];
}
