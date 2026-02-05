<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Jobs\SendBookingAdminMail;
use App\Models\Category;
use App\Models\ClientReview;
use App\Models\ConsultantRequest;
use App\Models\Product;
use App\Models\Settings;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::select('id', 'title', 'description', 'image')->where('is_active', true)->get();

        $about = Settings::select('key', 'value')
            ->whereIn('key', ['home_about_heading', 'home_about_desc', 'home_about_image'])
            ->pluck('value', 'key');

        $categories = Category::select('id', 'name', 'slug')
            ->with(['products' => fn($query) => $query->where('is_active', true)->latest()->limit(4)])
            ->where('is_featured', true)
            ->where('is_active', true)
            ->get();

        $clientReviews = ClientReview::select('id', 'name', 'comment', 'rating')->where('is_active', true)->get();

        return view('web.index', compact('sliders', 'about', 'categories', 'clientReviews'));
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

    public function products(Request $request)
    {
        $slugs = $request->filled('categories') ? explode(',', $request->categories) : [];

        $categories = Category::select('id', 'name', 'slug')->where('is_active', true)->get();

        $products = Product::select('id', 'name', 'slug', 'image', 'description', 'category_id')
            ->withWhereHas('category', function ($query) use ($slugs) {
                $query->select('id', 'name', 'slug')
                    ->when($slugs, fn($q) => $q->whereIn('slug', $slugs))
                    ->where('is_active', true);
            })
            ->where('is_active', true)
            ->paginate(12);

        return view('web.product-list', compact('categories', 'products'));
    }

    public function services()
    {
        return view('web.services');
    }

    public function contact()
    {
        return view('web.contact');
    }

    public function contactStore(Request $request)
    {
        $request->validate([
            'first_name'    => 'required|string|max:255',
            'last_name'     => 'nullable|string|max:255',
            'email'         => 'required|email',
            'contact_phone' => 'required|string',
            'country_code'  => 'nullable|string',
            'message'       => 'required|string',
        ]);

        $booking = ConsultantRequest::create([
            'name'         => $request->first_name . ' ' . $request->last_name,
            'email'        => $request->email,
            'country_code' => $request->country_code,
            'phone'        => preg_replace('/\D+/', '', $request->contact_phone),
            'message'      => $request->message,
        ]);

        SendBookingAdminMail::dispatch($booking->toArray())->delay(now()->addSeconds(5));

        return back()->with('success', 'Thank you! Our consultant will contact you shortly.');
    }
}
