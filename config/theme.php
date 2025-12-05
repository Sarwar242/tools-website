<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Theme
    |--------------------------------------------------------------------------
    |
    | This value determines the default theme for the application.
    | Supported: "light", "dark"
    |
    */

    'default' => env('THEME_DEFAULT', 'light'),

    /*
    |--------------------------------------------------------------------------
    | Primary Color
    |--------------------------------------------------------------------------
    |
    | The primary color for the application theme.
    | Supported: "green", "blue", "purple", "red", "yellow", "indigo"
    |
    */

    'primary_color' => env('THEME_PRIMARY_COLOR', 'green'),

    /*
    |--------------------------------------------------------------------------
    | Theme Settings
    |--------------------------------------------------------------------------
    |
    | Configuration for different theme modes
    |
    */

    'settings' => [
        'enable_dark_mode' => env('THEME_ENABLE_DARK_MODE', true),
        'auto_detect_system_theme' => env('THEME_AUTO_DETECT_SYSTEM', true),
        'show_theme_switcher' => env('THEME_SHOW_SWITCHER', true),
    ],

    /*
    |--------------------------------------------------------------------------
    | Color Palettes
    |--------------------------------------------------------------------------
    |
    | Define color palettes for different primary colors
    |
    */

    'colors' => [
        'green' => [
            'light' => [
                'primary' => '#22c55e',
                'primary-hover' => '#16a34a',
                'primary-dark' => '#15803d',
                'secondary' => '#f3f4f6',
                'accent' => '#dcfce7',
                'background' => '#ffffff',
                'surface' => '#f9fafb',
                'text-primary' => '#111827',
                'text-secondary' => '#6b7280',
                'border' => '#e5e7eb',
                'success' => '#10b981',
                'warning' => '#f59e0b',
                'error' => '#ef4444',
                'info' => '#3b82f6',
            ],
            'dark' => [
                'primary' => '#22c55e',
                'primary-hover' => '#16a34a',
                'primary-dark' => '#15803d',
                'secondary' => '#374151',
                'accent' => '#064e3b',
                'background' => '#111827',
                'surface' => '#1f2937',
                'text-primary' => '#f9fafb',
                'text-secondary' => '#d1d5db',
                'border' => '#374151',
                'success' => '#10b981',
                'warning' => '#f59e0b',
                'error' => '#ef4444',
                'info' => '#3b82f6',
            ],
        ],
        'blue' => [
            'light' => [
                'primary' => '#3b82f6',
                'primary-hover' => '#2563eb',
                'primary-dark' => '#1d4ed8',
                'secondary' => '#f3f4f6',
                'accent' => '#dbeafe',
                'background' => '#ffffff',
                'surface' => '#f9fafb',
                'text-primary' => '#111827',
                'text-secondary' => '#6b7280',
                'border' => '#e5e7eb',
                'success' => '#10b981',
                'warning' => '#f59e0b',
                'error' => '#ef4444',
                'info' => '#3b82f6',
            ],
            'dark' => [
                'primary' => '#3b82f6',
                'primary-hover' => '#2563eb',
                'primary-dark' => '#1d4ed8',
                'secondary' => '#374151',
                'accent' => '#1e3a8a',
                'background' => '#111827',
                'surface' => '#1f2937',
                'text-primary' => '#f9fafb',
                'text-secondary' => '#d1d5db',
                'border' => '#374151',
                'success' => '#10b981',
                'warning' => '#f59e0b',
                'error' => '#ef4444',
                'info' => '#3b82f6',
            ],
        ],
    ],

];