<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Jobs\SendBookingAdminMail;
use App\Models\ClientReview;
use App\Models\ConsultantRequest;
use App\Models\Settings;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $about = Settings::select('key', 'value')
            ->whereIn('key', ['home_about_heading', 'home_about_desc', 'home_about_image'])
            ->pluck('value', 'key');

        $clientReviews = ClientReview::select('id', 'name', 'comment', 'rating')->where('is_active', true)->get();

        return view('web.index', compact('about', 'clientReviews'));
    }

    public function about()
    {
        $about = Settings::select('key', 'value')
            ->whereIn('key', [
                'about_header',
                'about_heading', 'about_desc_1', 'about_desc_2', 'about_image', 'about_features',
                'years_of_experience', 'total_clients', 'tons_exported', 'countries_served',
                'vision', 'mission',
            ])
            ->pluck('value', 'key');

        return view('web.about', compact('about'));
    }

    public function products()
    {
        return view('web.product-list');
    }

    public function contact()
    {
        return view('web.contact');
    }

    public function contactStore(Request $request)
    {
        $request->validate([
            'contact_name'    => 'required|string|max:255',
            'contact_email'   => 'required|email',
            'contact_phone'   => 'required|string',
            'contact_message' => 'required|string',
        ]);

        $booking = ConsultantRequest::create([
            'name'        => $request->contact_name,
            'email'       => $request->contact_email,
            'phone'       => preg_replace('/\D+/', '', $request->contact_phone),
            'message'     => $request->contact_message,
            'opened_from' => 'contact_callback',
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        SendBookingAdminMail::dispatch($booking->toArray())->delay(now()->addSeconds(5));

        return back()->with('success', 'Thank you! Our consultant will contact you shortly.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email',
            'phone'       => 'required|string',
            'message'     => 'required|string',
            'opened_from' => 'nullable|string',
        ]);

        $booking = ConsultantRequest::create([
            'name'        => $request->name,
            'email'       => $request->email,
            'phone'       => preg_replace('/\D+/', '', $request->phone),
            'message'     => $request->message,
            'opened_from' => $request->opened_from,
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        SendBookingAdminMail::dispatch($booking->toArray())->delay(now()->addSeconds(5));

        return back()->with('success', 'Thank you! Our consultant will contact you shortly.');
    }
}
