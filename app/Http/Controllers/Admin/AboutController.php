<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $settings = Settings::select('key', 'value')
            ->whereIn('key', [
                'about_header',
                'home_about_heading', 'home_about_desc', 'home_about_image',
                'about_heading', 'about_desc_1', 'about_desc_2', 'about_image', 'about_features',
                'years_of_experience', 'total_clients', 'tons_exported', 'countries_served',
                'vision', 'mission',
            ])
            ->pluck('value', 'key');

        return view('admin.about', compact('settings'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'about_header'     => 'required|string|max:255',

            'home_about_heading'  => 'required|string|max:255',
            'home_about_desc'     => 'required|string',
            'home_about_image'    => 'nullable|file|image|mimes:jpeg,png,jpg,gif,svg,avif|max:2048',

            'about_heading'       => 'required|string|max:255',
            'about_desc_1'        => 'required|string',
            'about_desc_2'        => 'nullable|string',
            'about_image'         => 'nullable|file|image|mimes:jpeg,png,jpg,gif,svg,avif|max:2048',
            'about_features'      => 'required|string',

            'years_of_experience' => 'required|integer',
            'total_clients'       => 'required|integer',
            'tons_exported'       => 'required|integer',
            'countries_served'    => 'required|integer',

            'vision'              => 'required|string',
            'mission'             => 'required|string',
        ]);

        if ($request->hasFile('home_about_image')) {
            $data['home_about_image'] = uploadFileHelper($data['home_about_image'], 'about');
            $file                     = Settings::where('key', 'home_about_image')->pluck('value')->first();

            if ($file && Storage::disk('public')->exists($file)) {
                Storage::disk('public')->delete($file);
            }
        }

        if ($request->hasFile('about_image')) {
            $data['about_image'] = uploadFileHelper($data['about_image'], 'about');
            $file                = Settings::where('key', 'about_image')->pluck('value')->first();

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

        return back()->with('success', 'About saved');
    }
}
