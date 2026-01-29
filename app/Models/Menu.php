<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['name', 'slug', 'is_active', 'sort_order'];

    public function governmentCenters()
    {
        return $this->hasMany(GovernmentCenter::class);
    }

    public function centerServices()
    {
        return $this->hasMany(CenterService::class);
    }
}
