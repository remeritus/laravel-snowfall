<picture>
    <source media="(prefers-color-scheme: dark)" 
            srcset="https://remerit.us/open-source/banners/laravel-snowfall/dark.png">
    <img alt="Logo for laravel-snowfall" 
         src="https://remerit.us/open-source/banners/laravel-snowfall/light.png">
</picture>    

# Add Snowfall to your Laravel Project

A configurable snowfall effect for Laravel applications. 
Add festive snow to your site easily with multiple layers, seasonal activation, and fully customizable settings.

<img alt="Preview of remeritus/laravel-snowfall" 
         src="https://remerit.us/open-source/previews/laravel-snowfall/preview.gif">

## Features

- Multiple snow layers with configurable flake count, size, and speed.
- Seasonal activation: automatically show snow between configurable start and end dates.
- Blade directive: `@snowfall` for effortless inclusion.
- Fully configurable via `config/snowfall.php`.
- Lightweight, vanilla JS implementation using `<canvas>`.

## Requirements / Compatibility

| Dependency | Version |
|------------|---------|
| Laravel | `^10.0` \| `^11.0` \| `^12.0` |
| PHP | `^8.1` \| `^8.2` |

## Installation and Usage

### 1. Require the package

You can install this package via composer using:

```bash
composer require remeritus/laravel-snowfall
```
The package will automatically register its service provider.


### 2. Publish the configuration
To publish the config file to config/snowfall.php run:

```bash
php artisan vendor:publish --provider="Remeritus\Snowfall\SnowfallServiceProvider" --tag=config
```
### 3. Usage in Blade
Simply add the directive where you want the snowfall to appear:
```php
@snowfall
```

### 4. Configuration
Edit `config/snowfall.php` to customize:

- **activate**: Enable or disable globally.
- **start_date / end_date**: Optional seasonal activation.
- **layers**: Array of snow layers. Each layer supports:
	- **flake_count**: Number of flakes in this layer.
	- **max_size**: Maximum flake size.
	- **max_speed**: Maximum falling speed.
	- **swing_min / swing_max**: Side-to-side swinging amplitude.
- **color**: Snow RGB color (e.g., `'255,255,255'`).
- **opacity**: Snow opacity (`0.0`–`1.0`).
- **canvas_z_index**: Z-index of the snow `<canvas>`.

Example:
```php
'layers' => [
    [
        'flake_count' => 60,
        'max_size' => 4,
        'max_speed' => 1,
        'swing_min' => 0.5,
        'swing_max' => 1.5,
    ],
    // Add more layers as needed
],

```

#### Environment Variables
You may override any configuration setting via .env.
Here are the available keys:

##### Master switch
```env
SNOWFALL_ENABLED=true
```
`true` → package loads and snow logic runs (default value)

`false` → package does nothing, no assets included
##### Mode control
```env
SNOWFALL_MODE=seasonal
```
Possible values:
| Value | Description|
|-------|------------|
| `seasonal` | Snow only appears between the configured dates (default value) |
| `always` | Snow appears all the time |

##### Seasonal dates
```env
SNOWFALL_START_DATE=2025-12-01
SNOWFALL_END_DATE=2025-12-31
```
If not provided, the package defaults to:

December 1 → December 31 of the current year.

### 5. Notes

The snow is rendered via a `<canvas>` overlay with pointer-events: none so it won’t block user interaction.
Works on all modern browsers with JavaScript enabled.
Multiple layers create depth for a more realistic snowfall effect.

## License

MIT License.

