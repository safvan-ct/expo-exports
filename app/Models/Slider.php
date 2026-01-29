<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['title', 'description', 'image', 'is_active'];

    protected $appends = ['image_src'];

    public function getImageSrcAttribute()
    {
        return globalFileView($this->image);
    }
}
