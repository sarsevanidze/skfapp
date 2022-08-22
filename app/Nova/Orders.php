<?php

namespace App\Nova;

use App\Nova\Actions\UpdateOrder;
use App\Nova\Filters\DateCompleted;
use App\Nova\Filters\DateCompletedFrom;
use App\Nova\Filters\Status;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Orders extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Orders::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'user_email',
        'order_id'
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
            TEXT::make('Order ID'),
            TEXT::make('User Email'),
            TEXT::make('Status'),
            TEXT::make('Discount Tax')->hideFromIndex(),
            TEXT::make('Discount Total')->hideFromIndex(),
            TEXT::make('Shipping Tax')->hideFromIndex(),
            TEXT::make('Shipping Total')->hideFromIndex(),
            TEXT::make('Cart Tax')->hideFromIndex(),
            TEXT::make('Total Tax'),
            TEXT::make('Total')->sortable(true),
            TEXT::make('Payment Method')->hideFromIndex(),
            TEXT::make('Date Paid')->hideFromIndex(),
            TEXT::make('Date Completed')->hideFromIndex(),
            TEXT::make('Date Created')->hideFromIndex(),
            TEXT::make('Date Modified')->hideFromIndex(),

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
        return [
            new Status(),
//            new DateCompleted(),

        ];
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
        return [
            (new UpdateOrder())
                ->confirmText('Are you sure you want to update this order?')
                ->confirmButtonText('Yes')
                ->cancelButtonText("No"),
        ];
    }

//    public static function authorizedToCreate(Request $request)
//    {
//        return false;
//    }
//
//    public function authorizedToDelete(Request $request)
//    {
//        return false;
//    }
//
//    public function authorizedToUpdate(Request $request)
//    {
//        return false;
//    }
}
