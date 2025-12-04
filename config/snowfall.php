<?php

use Carbon\Carbon;

$currentYear = Carbon::now()->year;

return [

    /*
    |--------------------------------------------------------------------------
    | Package Enabled
    |--------------------------------------------------------------------------
    | Master switch. If false, nothing loads and no snow is rendered.
    */
    'enabled' => env('SNOWFALL_ENABLED', true),

    /*
    |--------------------------------------------------------------------------
    | Snowfall Mode
    |--------------------------------------------------------------------------
    | Values:
    | 'seasonal' : Snow shows only between start_date and end_date.
    | 'always'   : Snow shows all the time.
    */
    'mode' => env('SNOWFALL_MODE', 'seasonal'),

    /*
    |--------------------------------------------------------------------------
    | Seasonal Date Range
    |--------------------------------------------------------------------------
    | Defaults: December 1 – December 31 of current year.
    */
    'start_date' => env('SNOWFALL_START_DATE', Carbon::createFromDate($currentYear, 12, 1)->toDateString()),
    'end_date'   => env('SNOWFALL_END_DATE', Carbon::createFromDate($currentYear, 12, 31)->toDateString()),

    /*
    |--------------------------------------------------------------------------
    | Snow Layers
    |--------------------------------------------------------------------------
    */
    'layers' => [
        [
            'flake_count' => 60,
            'max_size'  => 4,
            'max_speed' => 1,
            'swing_min' => 0.5,
            'swing_max' => 1.5,
        ],
        [
            'flake_count' => 40,
            'max_size'  => 2,
            'max_speed' => 0.5,
            'swing_min' => 0.2,
            'swing_max' => 0.8,
        ],
        [
            'flake_count' => 20,
            'max_size'  => 6,
            'max_speed' => 2,
            'swing_min' => 0.7,
            'swing_max' => 1.8,
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Snow Appearance
    |--------------------------------------------------------------------------
    */
    'color' => '255,255,255',
    'opacity' => 0.8,
    'canvas_z_index' => 1000,
];
