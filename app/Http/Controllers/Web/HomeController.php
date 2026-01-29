<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Jobs\SendBookingAdminMail;
use App\Models\CenterService;
use App\Models\ConsultantRequest;
use App\Models\GovernmentCenter;
use App\Models\Partner;
use App\Models\Poster;
use App\Models\Settings;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $key = Settings::where('key', 'key_services')->pluck('value')->first();

        $services = CenterService::select('id', 'name', 'slug', 'tagline', 'ad_image')
            ->whereIn('id', explode(',', $key))
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $govtCenters = GovernmentCenter::select('id', 'name', 'slug', 'tagline', 'ad_image')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $posters  = Poster::select('id', 'name', 'image')->where('is_active', true)->get();
        $partners = Partner::select('id', 'name', 'image')->where('is_active', true)->get();

        return view('web.index', compact('services', 'partners', 'posters', 'govtCenters'));
    }

    public function about()
    {
        $partners = Partner::select('id', 'name', 'image')->where('is_active', true)->get();

        return view('web.about', compact('partners'));
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
