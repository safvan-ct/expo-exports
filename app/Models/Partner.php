<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = ['name', 'image', 'is_active'];

    protected $appends = ['image_src'];

    public function getImageSrcAttribute()
    {
        return globalFileView($this->image);
    }
}
