<?php

namespace App\Nova\Filters;

use App\Nova\Customers;
use rcknr\Nova\Filters\MultiselectFilter;
use Laravel\Nova\Filters\BooleanFilter;
use Laravel\Nova\Http\Requests\NovaRequest;

class CustomerEmail extends MultiselectFilter
{
    /**
     * Apply the filter to the given query.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(NovaRequest $request, $query, $value)
    {
//        return $query->whereHas('', function ($query) use ($value) {
//            $query->whereIn('author_id', $value);
//        });
        return $query->whereIn('user_email', $value);
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function options(NovaRequest $request)
    {
        return \App\Models\Customers::all()->pluck('id', 'user_email');
    }
}
