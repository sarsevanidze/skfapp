<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Http\Requests\NovaRequest;


class Customers extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Customers::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = '';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'first_name', 'last_name', 'user_email'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {

        return [
            Text::make('User Email')->sortable(true),
            Text::make('Billing First Name'),
            Text::make('Billing Last Name'),
            Text::make('Billing Company')->hideFromIndex(),
            Text::make('Billing Address 1')->hideFromIndex(),
            Text::make('Billing Address 2')->hideFromIndex(),
            Text::make('Billing Country', function(){
                return $this->countryName;
            }),
            Text::make('Billing State')->hideFromIndex(),
            Text::make('Billing City')->hideFromIndex(),
            Text::make('Billing Postcode')->hideFromIndex(),
            Text::make('Billing Phone')->hideFromIndex(),
            Text::make('Shipping First Name')->hideFromIndex(),
            Text::make('Shipping Last Name')->hideFromIndex(),
            Text::make('Shipping Company')->hideFromIndex(),
            Text::make('Shipping Address 1')->hideFromIndex(),
            Text::make('Shipping Address 2')->hideFromIndex(),
            Text::make('Shipping Country', function(){
                return $this->countryName;
            })->hideFromIndex(),
            Text::make('Shipping State')->hideFromIndex(),
            Text::make('Shipping City')->hideFromIndex(),
            Text::make('Shipping Postcode')->hideFromIndex(),
            Text::make('Shipping Phone')->hideFromIndex(),
            TEXT::make('Completed Orders', function(){
                return $this->completedOrders;
            })->sortable(true),
            TEXT::make('Refunded Orders', function(){
                return $this->refundedOrders;
            })->sortable(true),
            TEXT::make('Total Tax', function(){
                return $this->totalTax;
            })->sortable(true),
            TEXT::make('Total', 'totalAmount', function(){
                return $this->totalAmount;
            })->sortable(true),

//            Text::make('Billing'),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }

    public static function authorizedToCreate(Request $request)
    {
        return false;
    }

    public function authorizedToDelete(Request $request)
    {
        return false;
    }

    public function authorizedToUpdate(Request $request)
    {
        return false;
    }

}
