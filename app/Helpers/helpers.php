<?php

use Illuminate\Support\Arr;
use Modules\Setting\app\Models\Setting;
use Modules\Status\app\Models\Status;
use Modules\User\app\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

if (!function_exists('setting')) {
    function setting(String $slug, $default = null, bool $string = true)
    {
        $changed    = false; // $user->isDirty(); // true
        $key        = "settings." . Str::slug($slug, '.');
        if (Cache::has($key) and !$changed) {
            return Cache::get($key);
        }

        $setting = Setting::where('name', $slug)->Orwhere('slug', $slug)->Orwhere('config', $slug)->value('value');
        if ($setting and $string) {
            // dd($setting);
            if (is_array($setting) and count($setting) > 1) {
                $value = implode(',', $setting);
            } else if (is_array($setting)) {
                $value = $setting[0];
            } else {
                $value = $setting;
            }
        } else if ($setting) {
            $value = $setting;
        } else {
            $value = $default;
        }

        Cache::put($key, $value, 60);
        return $value;
    }
}

if (!function_exists('status')) {
    /**
     * @param Int|String $code
     */
    function status(int|string|array $code = null, $default = null): Int|String|array|null
    {
        $key        = "status" . ($code ? '.' . Str::slug(is_array($code) ? Arr::join($code, '.') : $code, '.') : '');

        if (Cache::has($key) and cache($key) !== null) {
            return Cache::get($key);
        } else {
            if (is_array($code)) {
                $value = collect();
                foreach ($code as $key => $_code) {
                    if (is_numeric($_code)) {
                        $status = Status::where('code', $_code)->select('name', 'id')->first();
                        $value->put($status->id, $status->name);
                    } elseif (is_string($_code) and strlen($_code)) {
                        $status = Status::where('name', $_code)->orwhere('slug', $_code)->select('name', 'id')->first();
                        $value->put($status->id, $status->name);
                    }
                }
                $value = $value->toArray();
            } elseif (is_numeric($code)) {
                $value = Status::where('code', $code)->value('name');
            } elseif (is_string($code) and strlen($code)) {
                $value = Status::where('name', $code)->orwhere('slug', $code)->value('code');
            } else {
                $value = Status::pluck('name', 'id')->toArray();
            }

            Cache::remember($key, 30, fn () => $value);
            return $value ?? $default;
        }
    }
}

if (!function_exists('user')) {
    /**
     * Get user instance
     *
     * @param array|int|string $id The user identifier to fetch e.g. array of IDs, ID, username, email, phone [string]
     */
    function user(array|int|string $id = null)
    {
        if (is_array($id)) {
            return User::whereIn('id', $id)->get();
        } else if (is_int($id)) {
            return User::find($id);
        } else if (is_string($id)) {
            return User::where('username', $id)
                ->orWhere('email', $id)
                ->orWhere('phone', $id)
                ->first();
        } else {
            return auth()->user();
        }
    }
}

if (!function_exists('greeting')) {
    /**
     * Greet users
     */
    function greeting(String $prefix = null)
    {
        $date = now();
        $prefix = $prefix ?? "Good";
        $greeting = "";
        if ($date->hour < 12) {
            $greeting = "morning";
        } elseif ($date->hour < 16) {
            $greeting = "afternoon";
        } else {
            $greeting = "evening";
        }

        return $prefix . " " . $greeting;
    }
}

if (!function_exists('number_format_k')) {
    /**
     * Check if route matches given $patterns
     */
    function number_format_k(float $number): string
    {
        $number = number_format($number, 2, '.', '');

        if ($number >= $b = 1000000000) {
            $number = number_format($number / $b, 2);
            return "{$number}b";
        } else if ($number >= $m = 1000000) {
            $number = number_format($number / $m, 2);
            return "{$number}m";
        } else if ($number >= $k = 1000) {
            $number = number_format($number / $k, 2);
            return "{$number}k";
        } else {
            return number_format($number);
        }
    }
}

include __DIR__ . '/barcode/barcode.php';

if (!function_exists('barcode')) {
    function barcode($data, $path = '', $symbology = 'qr', $options = ['f' => 'svg'])
    {
        $path = storage_path($path);

        /**
         * f - Format. One of:
            png
            gif
            jpeg
            svg
         */

        /**
         * s - Symbology (type of barcode). One of:
            upc-a          code-39         qr     dmtx
            upc-e          code-39-ascii   qr-l   dmtx-s
            ean-8          code-93         qr-m   dmtx-r
            ean-13         code-93-ascii   qr-q   gs1-dmtx
            ean-13-pad     code-128        qr-h   gs1-dmtx-s
            ean-13-nopad   codabar                gs1-dmtx-r
            ean-128        itf
         */

        $generator = new barcode_generator();

        if (isset($options['f']) and $options['f'] === 'svg') {
            /* Generate SVG markup and write to file. */
            $svg = $generator->render_svg($symbology, $data, $options);

            return $svg;
        } else {
            /* Create bitmap image and write to file. */
            $image = $generator->render_image($symbology, $data, $options);
            // imagepng($image, $path);
            // imagedestroy($image);

            return $image;
        }
    }
}
