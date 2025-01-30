<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionModel extends Model
{
    protected $table = 'subscriptions'; 

    protected $fillable = [
        'user_id', 'offer_id', 'status', 'price', 'payment_method', 'paid_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
