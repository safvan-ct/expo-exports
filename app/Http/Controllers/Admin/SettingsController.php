<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Settings::pluck('value', 'key');

        return view('admin.settings', compact('settings'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'address_1'        => 'nullable|string|max:255',
            'address_2'        => 'nullable|string|max:255',

            'email'            => 'required|email',
            'primary_phone'    => 'required|digits_between:11,20',
            'secondary_phone'  => 'nullable|digits_between:11,20',

            'whatsapp'         => 'nullable|digits_between:12,20',
            'whatsapp_message' => 'nullable|string|max:255',

            'instagram'        => 'nullable|string|max:255',
            'facebook'         => 'nullable|string|max:255',
            'twitter'          => 'nullable|string|max:255',
            'linkedin'         => 'nullable|string|max:255',

            'about_us'         => 'nullable|string|max:255',
        ]);

        foreach ($data as $key => $value) {
            Settings::updateOrCreate(['key' => $key], [
                'value' => is_array($value) ? implode(',', $value) : $value,
            ]);

            Cache::forget('general_settings');
        }

        return back()->with('success', 'Settings saved');
    }
}
