<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Codexshaper\WooCommerce\Facades\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    //
    public function all(Request $request) {
        $total_pages = 83;
        for ($i = 20; $i <= 22; $i++) {
            echo $i;
            $orders = Order::paginate(100, $i);
            foreach ($orders['data'] as $data) {
                $customer = Customers::where('user_email', $data->billing->email)->first();
                if (!$customer) {
                    Customers::create([
                        'user_id' => 0,
                        'user_email' => $data->billing->email,
                        'first_name' => $data->billing->first_name,
                        'last_name' => $data->billing->last_name,
                        'billing' => json_encode($data->billing),
                        'shipping' => json_encode($data->shipping),
                        "billing_first_name" => $data->billing->first_name,
                        "billing_last_name" => $data->billing->last_name,
                        "billing_company" => $data->billing->company,
                        "billing_address_1" => $data->billing->address_1,
                        "billing_address_2" => $data->billing->address_2,
                        "billing_city" => $data->billing->city,
                        "billing_postcode" => $data->billing->postcode,
                        "billing_country" => $data->billing->country,
                        "billing_state" => $data->billing->state,
                        "billing_phone" => $data->billing->phone,
                        "billing_email" => $data->billing->email,
                        "shipping_first_name" => $data->shipping->first_name,
                        "shipping_last_name" => $data->shipping->last_name,
                        "shipping_company" => $data->shipping->company,
                        "shipping_address_1" => $data->shipping->address_1,
                        "shipping_address_2" => $data->shipping->address_2,
                        "shipping_city" => $data->shipping->city,
                        "shipping_postcode" => $data->shipping->postcode,
                        "shipping_country" => $data->shipping->country,
                        "shipping_state" => $data->shipping->state,
                        "shipping_phone" => $data->shipping->phone,
                    ]);
                }
            }
        }
//        return $orders;
    }
}
