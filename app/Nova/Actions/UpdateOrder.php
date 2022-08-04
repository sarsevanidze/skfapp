<?php

namespace App\Nova\Actions;

use App\Models\Customers;
use App\Models\Orders;
use Codexshaper\WooCommerce\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Http\Requests\NovaRequest;

class UpdateOrder extends Action
{
    use InteractsWithQueue, Queueable;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        //
        foreach ($models as $model) {
            $data = Order::withOriginal()->find($model->order_id);

            $order = Orders::where('order_id', $model->order_id)->first();


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
            } else {
                $customer->update([
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

            $order->update([
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
                'refund' => json_encode($data->refunds),
                'total_items' => json_encode($data->line_items)
            ]);


        }

        return Action::message('Done!');

    }

    /**
     * Get the fields available on the action.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [];
//        return Action::message('It worked!');
    }
}
