<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Orders;
use Codexshaper\WooCommerce\Facades\Order;
use Codexshaper\WooCommerce\Facades\Refund;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    //
    public function all(Request $request) {

//        $orders = Order::find(117279);
//        return $orders;
        $total_pages = 84;
        for ($i = 80; $i <= 84; $i++) {
            echo 'page' . $i;  echo '<br>';
            $orders = Order::paginate(100, $i);
            foreach ($orders['data'] as $data) {
//                $customer = Customers::where('user_email', $data->billing->email)->first();
//                if (!$customer) {
//                    Customers::create([
//                        'user_id' => 0,
//                        'user_email' => $data->billing->email,
//                        'first_name' => $data->billing->first_name,
//                        'last_name' => $data->billing->last_name,
//                        'billing' => json_encode($data->billing),
//                        'shipping' => json_encode($data->shipping),
//                        "billing_first_name" => $data->billing->first_name,
//                        "billing_last_name" => $data->billing->last_name,
//                        "billing_company" => $data->billing->company,
//                        "billing_address_1" => $data->billing->address_1,
//                        "billing_address_2" => $data->billing->address_2,
//                        "billing_city" => $data->billing->city,
//                        "billing_postcode" => $data->billing->postcode,
//                        "billing_country" => $data->billing->country,
//                        "billing_state" => $data->billing->state,
//                        "billing_phone" => $data->billing->phone,
//                        "billing_email" => $data->billing->email,
//                        "shipping_first_name" => $data->shipping->first_name,
//                        "shipping_last_name" => $data->shipping->last_name,
//                        "shipping_company" => $data->shipping->company,
//                        "shipping_address_1" => $data->shipping->address_1,
//                        "shipping_address_2" => $data->shipping->address_2,
//                        "shipping_city" => $data->shipping->city,
//                        "shipping_postcode" => $data->shipping->postcode,
//                        "shipping_country" => $data->shipping->country,
//                        "shipping_state" => $data->shipping->state,
//                        "shipping_phone" => $data->shipping->phone,
//                    ]);
//                }
                $refund_id = 0;
                if(!empty($data->refund)) {
                    $refund_id = $data->refund[0]->id;
                }
                $order = Orders::where('order_id', $data->id)->first();
                echo '<br>';
                if(!$order) {
                    echo 'new' . $data->id;
                    Orders::create([
                        'order_id' => $data->id,
                        'status' => $data->status,
                        'date_created' => $data->date_created,
                        'date_modified' => $data->date_modified,
                        'discount_total' => $data->discount_total,
                        'discount_tax' => $data->discount_tax,
                        'shipping_total' => $data->shipping_total,
                        'shipping_tax' => $data->shipping_tax,
                        'cart_tax' => $data->cart_tax,
                        'total' => $data->total,
                        'total_tax' => $data->total_tax,
                        'user_email' => $data->billing->email,
                        'payment_method' => $data->payment_method,
                        'date_paid' => $data->date_paid,
                        'date_completed' => $data->date_completed,
                        'refund_id' => $refund_id,
                    ]);
                } else {
                    echo 'old' . $order->order_id; echo '<br>';
                }
            }
        }
//        return $orders;
    }
}


