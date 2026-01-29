<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CenterService;
use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Settings::pluck('value', 'key');
        $services = CenterService::select('id', 'name', 'slug')->get();

        return view('admin.settings', compact('settings', 'services'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'address_1'        => 'nullable|string|max:255',
            'address_2'        => 'nullable|string|max:255',

            'email'            => 'required|email',
            'primary_phone'    => 'required|digits_between:12,20',

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
        }

        return back()->with('success', 'Settings saved');
    }
}
