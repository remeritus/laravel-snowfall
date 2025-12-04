<?php

return [
    'activate' => true,  // manual global on/off

    // Optional seasonal activation (YYYY-MM-DD)
    'start_date' => '2025-12-01',
    'end_date' => '2025-12-31',

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

    'color' => '255,255,255',  // RGB
    'opacity' => 0.8,
    'canvas_z_index' => 1000,
];
