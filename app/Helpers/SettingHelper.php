<?php


namespace App\Helpers;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class SettingHelper
{
    /**
     * Get a user setting.
     *
     * @param string $key
     * @param string $category
     * @param mixed $default
     * @return mixed
     */
    public static function get($key, $category = 'general', $default = null)
    {
        $userId = Auth::id();

        return Cache::remember("user_{$userId}_setting_{$category}_{$key}", 600, function () use ($userId, $key, $category, $default) {
            $setting = Setting::where('user_id', $userId)
                ->where('category', $category)
                ->where('setting_key', $key)
                ->first();

            return $setting ? $setting->setting_value : $default;
        });
    }

    /**
     * Set or update a user setting.
     *
     * @param string $key
     * @param string $value
     * @param string $category
     */
    public static function set($key, $value, $category = 'general')
    {
        $userId = Auth::id();

        $setting = Setting::updateOrCreate(
            ['user_id' => $userId, 'category' => $category, 'setting_key' => $key],
            ['setting_value' => $value]
        );

        // Clear cache
        Cache::forget("user_{$userId}_setting_{$category}_{$key}");

        return $setting;
    }



}
