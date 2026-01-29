<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GovernmentCenter extends Model
{
    protected $fillable = [
        'menu_id', 'name', 'slug', 'tagline', 'desc_title', 'description', 'ad_image', 'is_active', 'sort_order',
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

    public function centerServices()
    {
        return $this->hasMany(CenterService::class);
    }
}
