<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    // Show settings page
    public function index()
    {
        $settings = Setting::whereNull('user_id')->get()->groupBy('category');
        return view('backend.settings.index', compact('settings'));
    }

    // Update settings
    public function update(Request $request)
    {
        $validated = $request->validate([
            'settings' => 'array',
            'settings.*.category' => 'required|string',
            'settings.*.key' => 'required|string',
            'settings.*.value' => 'nullable|string',
        ]);

        foreach ($validated['settings'] as $setting) {
            Setting::updateOrCreate(
                [
                    'category' => $setting['category'],
                    'setting_key' => $setting['key'],
                    'user_id' => null
                ],
                ['setting_value' => $setting['value']]
            );
        }

        return redirect()->route('settings.index')->with('success', 'Settings updated successfully.');
    }
}
