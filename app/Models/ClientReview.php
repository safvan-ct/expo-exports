<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientReview extends Model
{
    protected $fillable = ['name', 'comment', 'rating', 'is_active'];

    public function getImageSrcAttribute()
    {
        return globalFileView($this->image);
    }
}
