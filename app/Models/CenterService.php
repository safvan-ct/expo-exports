<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CenterService extends Model
{
    protected $fillable = [
        'menu_id', 'government_center_id', 'name', 'slug', 'tagline', 'notes', 'ad_image', 'is_active', 'sort_order',
    ];

    protected $appends = ['ad_image_src'];

    public function getAdImageSrcAttribute()
    {
        return globalFileView($this->ad_image);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function governmentCenter()
    {
        return $this->belongsTo(GovernmentCenter::class, 'government_center_id');
    }

    public function documentGroups()
    {
        return $this->hasMany(DocumentGroup::class, 'center_service_id');
    }

    public function documents()
    {
        return $this->hasMany(Document::class, 'center_service_id')->whereNull('document_group_id');
    }
}
