<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_email',
        'first_name',
        'last_name',
        'billing',
        'shipping',
        "billing_first_name",
        "billing_last_name",
        "billing_company",
        "billing_address_1",
        "billing_address_2",
        "billing_city",
        "billing_postcode",
        "billing_country",
        "billing_state",
        "billing_phone",
        "billing_email",
        "shipping_first_name",
        "shipping_last_name",
        "shipping_company",
        "shipping_address_1",
        "shipping_address_2",
        "shipping_city",
        "shipping_postcode",
        "shipping_country",
        "shipping_state",
        "shipping_phone",
        "shipping_email",
    ];

    protected $casts = [
        'shipping' => 'array',
        'billing' => 'json'
    ];

    public function getUserTotalAmount(Request $request) {
        $orders = Orders::where('user_email', $request->user_email)->get();
        return $orders;
    }
}
