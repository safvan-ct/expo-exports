<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CenterService;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'email'            => 'required|email',
            'primary_phone'    => 'required|digits_between:12,20',
            'secondary_phone'  => 'nullable|digits_between:12,20',
            'whatsapp'         => 'nullable|digits_between:12,20',
            'whatsapp_message' => 'nullable|string|max:255',

            'instagram'        => 'nullable|string|max:255',
            'facebook'         => 'nullable|string|max:255',
            'twitter'          => 'nullable|string|max:255',
            'linkedin'         => 'nullable|string|max:255',

            'key_services'     => 'nullable|exists:center_services,id',
            'useful_services'  => 'nullable|exists:center_services,id',
            'service_desc'     => 'nullable|string|max:255',
            'service_icon'     => 'nullable|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'about_us'         => 'nullable|string|max:255',
            'address'          => 'nullable|string|max:255',

            'welcome'          => 'nullable|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'who_we_are'       => 'nullable|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'about_large'      => 'nullable|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'about_small_1'    => 'nullable|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'about_small_2'    => 'nullable|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (isset($data['service_icon'])) {
            $data['service_icon'] = uploadFileHelper($data['service_icon'], 'settings', 'service_icon');
            $file                 = Settings::where('key', 'service_icon')->pluck('value')->first();

            if ($file && Storage::disk('public')->exists($file)) {
                Storage::disk('public')->delete($file);
            }
        }

        if (isset($data['welcome'])) {
            $data['welcome'] = uploadFileHelper($data['welcome'], 'settings', 'welcome');
            $file            = Settings::where('key', 'welcome')->pluck('value')->first();

            if ($file && Storage::disk('public')->exists($file)) {
                Storage::disk('public')->delete($file);
            }
        }

        if (isset($data['who_we_are'])) {
            $data['who_we_are'] = uploadFileHelper($data['who_we_are'], 'settings', 'who_we_are');
            $file               = Settings::where('key', 'who_we_are')->pluck('value')->first();

            if ($file && Storage::disk('public')->exists($file)) {
                Storage::disk('public')->delete($file);
            }
        }

        if (isset($data['about_large'])) {
            $data['about_large'] = uploadFileHelper($data['about_large'], 'settings', 'about_large');
            $file                = Settings::where('key', 'about_large')->pluck('value')->first();

            if ($file && Storage::disk('public')->exists($file)) {
                Storage::disk('public')->delete($file);
            }
        }

        if (isset($data['about_small_1'])) {
            $data['about_small_1'] = uploadFileHelper($data['about_small_1'], 'settings', 'about_small_1');
            $file                  = Settings::where('key', 'about_small_1')->pluck('value')->first();

            if ($file && Storage::disk('public')->exists($file)) {
                Storage::disk('public')->delete($file);
            }
        }

        if (isset($data['about_small_2'])) {
            $data['about_small_2'] = uploadFileHelper($data['about_small_2'], 'settings', 'about_small_2');
            $file                  = Settings::where('key', 'about_small_2')->pluck('value')->first();

            if ($file && Storage::disk('public')->exists($file)) {
                Storage::disk('public')->delete($file);
            }
        }

        foreach ($data as $key => $value) {
            Settings::updateOrCreate(
                ['key' => $key],
                ['value' => is_array($value) ? implode(',', $value) : $value]
            );
        }

        return back()->with('success', 'Settings saved');
    }
}
