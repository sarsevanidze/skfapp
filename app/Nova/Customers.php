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
            Text::make('User ID')->hideFromIndex(),
            Text::make('First Name'),
            Text::make('Last Name'),
            Text::make('User Email'),
            Text::make('Billing First Name')->hideFromIndex(),
            Text::make('Billing Last Name')->hideFromIndex(),
            Text::make('Billing Address 1')->hideFromIndex(),
            Text::make('Billing Address 2')->hideFromIndex(),
            Text::make('Billing City')->hideFromIndex(),
            Text::make('Billing Postcode')->hideFromIndex(),
            Text::make('Billing Country')->hideFromIndex(),
            Text::make('Billing State')->hideFromIndex(),
            Text::make('Billing Email')->hideFromIndex(),
            Text::make('Billing Phone')->hideFromIndex(),
            Text::make('Shipping First Name')->hideFromIndex(),
            Text::make('Shipping Last Name')->hideFromIndex(),
            Text::make('Shipping Address 1')->hideFromIndex(),
            Text::make('Shipping Address 2')->hideFromIndex(),
            Text::make('Shipping City')->hideFromIndex(),
            Text::make('Shipping Postcode')->hideFromIndex(),
            Text::make('Shipping Country')->hideFromIndex(),
            Text::make('Shipping State')->hideFromIndex(),
            Text::make('Shipping Phone')->hideFromIndex(),

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
