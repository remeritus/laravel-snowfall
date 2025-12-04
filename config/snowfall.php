<?php

use Carbon\Carbon;

$currentYear = Carbon::now()->year;

return [
    /*
    |--------------------------------------------------------------------------
    | Activate Snowfall
    |--------------------------------------------------------------------------
    | Default is false. Can be overridden via .env by setting SNOWFALL_ACTIVE=true
    */
    'activate' => env('SNOWFALL_ACTIVE', false),

    /*
    |--------------------------------------------------------------------------
    | Seasonal Activation Dates
    |--------------------------------------------------------------------------
    | Defaults to current year's December 1st to December 31st.
    | Format: YYYY-MM-DD
    */
    'start_date' => env('SNOWFALL_START_DATE', Carbon::createFromDate($currentYear, 12, 1)->toDateString()),
    'end_date'   => env('SNOWFALL_END_DATE', Carbon::createFromDate($currentYear, 12, 31)->toDateString()),

    /*
    |--------------------------------------------------------------------------
    | Snow Layers
    |--------------------------------------------------------------------------
    | Each layer can have its own count, size, speed, and swing amplitude.
    */
    'layers' => [
        [
            'flake_count' => 60,
            'max_size' => 4,
            'max_speed' => 1,
            'swing_min' => 0.5,
            'swing_max' => 1.5,
        ],
        [
            'flake_count' => 40,
            'max_size' => 2,
            'max_speed' => 0.5,
            'swing_min' => 0.2,
            'swing_max' => 0.8,
        ],
        [
            'flake_count' => 20,
            'max_size' => 6,
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
    'color' => '255,255,255',  // RGB
    'opacity' => 0.8,
    'canvas_z_index' => 1000,
];
