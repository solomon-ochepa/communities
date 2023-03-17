<?php

use App\Models\Currency;
use App\Models\Setting;
use App\Models\Status;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
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
    function status(int|string $code, $default = null): Int|String|null
    {
        $changed    = false; // $user->isDirty(); // true
        $key        = "statuses." . Str::slug($code, '.');
        if (Cache::has($key) and cache($key) !== null and !$changed) {
            return Cache::get($key);
        } else {
            if (is_numeric($code)) {
                $value = Status::where('code', $code)->value('name') ?? $default;
            } else {
                $value = Status::where('name', $code)->orwhere('slug', $code)->value('code') ?? $default;
            }

            cache($key, $value, 10);
            return $value;
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

if (!function_exists('admin_route_prefix')) {
    /**
     * Check if currenct route is using the admin prefix
     */
    function admin_route_prefix(): bool
    {
        return trim(request()->route()->getPrefix(), "/") === setting('admin.dashboard');
    }
}

if (!function_exists('prefix')) {
    /**
     * Get current route prefix
     */
    function prefix($prefix = null)
    {
        $x = trim(request()->route()->getPrefix(), " /");
        $prefix = ($prefix) ? $x === $prefix : $x;

        return $prefix;
    }
}

if (!function_exists('route_is')) {
    /**
     * Check if route matches given $patterns
     */
    function route_is($patterns): bool
    {
        return request()->routeIs($patterns);
    }
}

if (!function_exists('currency')) {
    /**
     * @param Int|String $code
     */
    function currency($code, $default = null)
    {
        $changed    = false; // $user->isDirty(); // true
        $key        = "currencies." . Str::slug($code, '.');
        if (Cache::has($key) and !$changed) {
            return Cache::get($key);
        } else {
            if (is_int($code)) {
                $value = Currency::where('code', $code)->value('name') ?? $default;
            } else {
                $value = Currency::where('name', $code)->Orwhere('slug', $code)->value('id') ?? $default;
            }

            Cache::put($key, $value, 60);
            return $value;
        }
    }
}
