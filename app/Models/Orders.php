<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'status',
        'date_created',
        'date_modified',
        'discount_total',
        'discount_tax',
        'shipping_total',
        'shipping_tax',
        'cart_tax',
        'total',
        'total_tax',
        'user_email',
        'payment_method',
        'date_paid',
        'date_completed',
        'refund_id',
    ];
    public function getCustomerName() {
        $customer = Customers::where('user_email', request()->user_email)->first();
        $name = $customer->first_name;
        if(!empty($name)) {
            return $name;
        } else {
            return '';
        }
//        return $name;
    }
}


