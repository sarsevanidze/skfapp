<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Codexshaper\WooCommerce\Facades\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    //


    public function all(Request $request)
    {
        $per_page = 100;
        $total_pages = 15;
        for ($i = 1; $i <= $total_pages; $i++) {
            $customers = Customer::paginate($per_page, $i);
            foreach ($customers['data'] as $data) {
                $customer = Customers::where('user_id', $data->id)->first();
//                $billing =
//                dd($data->billing->first_name);
                if(!$customer) {
                    Customers::create([
                        'user_id' => $data->id,
                        'user_email' => $data->email,
                        'first_name' => $data->first_name,
                        'last_name' => $data->last_name,
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
                } else {
                    $customer->update([
                        'user_id' => $data->id,
                        'user_email' => $data->email,
                        'first_name' => $data->first_name,
                        'last_name' => $data->last_name,
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

    }
}
