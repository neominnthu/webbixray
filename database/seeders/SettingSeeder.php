<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // General Settings
            ['user_id' => 1, 'category' => 'general', 'setting_key' => 'theme', 'setting_value' => 'dark'],
            ['user_id' => 1, 'category' => 'general', 'setting_key' => 'language', 'setting_value' => 'en'],

            ['user_id' => null, 'category' => 'general', 'setting_key' => 'site_title', 'setting_value' => 'Webbix Ray'],
            ['user_id' => null, 'category' => 'general', 'setting_key' => 'site_description', 'setting_value' => 'The best platform for innovation.'],
            ['user_id' => null, 'category' => 'general', 'setting_key' => 'site_url', 'setting_value' => 'https://webbixray.com'],
            ['user_id' => null, 'category' => 'general', 'setting_key' => 'site_email', 'setting_value' => 'support@webbixray.com'],
            ['user_id' => null, 'category' => 'general', 'setting_key' => 'site_logo', 'setting_value' => '/storage/logo.png'],
            ['user_id' => null, 'category' => 'general', 'setting_key' => 'timezone', 'setting_value' => 'UTC'],
            ['user_id' => null, 'category' => 'general', 'setting_key' => 'transaction_fees', 'setting_value' => '2'],

            // Social Settings
            ['user_id' => 1, 'category' => 'social', 'setting_key' => 'allow_sharing', 'setting_value' => 'true'],
            ['user_id' => 1, 'category' => 'social', 'setting_key' => 'show_online_status', 'setting_value' => 'false'],

            ['user_id' => null, 'category' => 'social', 'setting_key' => 'facebook_url', 'setting_value' => 'https://facebook.com/webbixray'],
            ['user_id' => null, 'category' => 'social', 'setting_key' => 'twitter_url', 'setting_value' => 'https://twitter.com/webbixray'],
            ['user_id' => null, 'category' => 'social', 'setting_key' => 'linkedin_url', 'setting_value' => 'https://linkedin.com/company/webbixray'],
            ['user_id' => null, 'category' => 'social', 'setting_key' => 'instagram_url', 'setting_value' => 'https://instagram.com/webbixray'],

            // Security Settings
            ['user_id' => null, 'category' => 'security', 'setting_key' => 'enable_recaptcha', 'setting_value' => 'true'],
            ['user_id' => null, 'category' => 'security', 'setting_key' => 'recaptcha_site_key', 'setting_value' => 'your-site-key'],
            ['user_id' => null, 'category' => 'security', 'setting_key' => 'recaptcha_secret_key', 'setting_value' => 'your-secret-key'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                [
                    'user_id' => $setting['user_id'],
                    'category' => $setting['category'],
                    'setting_key' => $setting['setting_key']
                ],
                ['setting_value' => $setting['setting_value']]
            );
        }
    }
}
