<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\CenterService;
use App\Models\GovernmentCenter;
use App\Models\Settings;

class ServiceController extends Controller
{
    public function index()
    {
        $key = Settings::where('key', 'key_services')->pluck('value');

        $services = CenterService::select('id', 'name', 'slug')
            ->whereIn('id', explode(',', $key))
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('web.service-list', compact('services'));
    }

    public function show($slug)
    {
        $type = 'service';

        $service = CenterService::select('id', 'menu_id', 'government_center_id', 'name', 'slug', 'tagline', 'notes', 'ad_image')
            ->with([
                'menu'                     => fn($q)                     => $q->select('id', 'name')->where('is_active', true),
                'governmentCenter'         => fn($q)         => $q->select('id', 'name')->where('is_active', true),
                'documentGroups.documents' => fn($q) => $q->where('is_active', true),
                'documents'                => fn($q)                => $q->where('is_active', true),
            ])
            ->where('slug', $slug)
            ->first();

        if (! $service) {
            abort(404);
        }

        $relatedServices = CenterService::select('id', 'name', 'slug')
            ->where('menu_id', $service->menu_id)
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('web.service-details', compact('service', 'relatedServices', 'type'));
    }

    public function center($slug)
    {
        $type = 'center';

        $service = GovernmentCenter::select('id', 'menu_id', 'name', 'slug', 'tagline', 'desc_title', 'description', 'ad_image')
            ->with([
                'menu'                     => fn($q)                     => $q->select('id', 'name')->where('is_active', true),
                'centerServices.documents' => fn($q) => $q->where('is_active', true),
            ])
            ->where('slug', $slug)
            ->first();

        if (! $service) {
            abort(404);
        }

        $relatedServices = GovernmentCenter::select('id', 'name', 'slug')
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('web.service-details', compact('service', 'relatedServices', 'type'));
    }
}
