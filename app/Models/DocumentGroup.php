<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentGroup extends Model
{
    protected $fillable = ['center_service_id', 'name', 'notes', 'sort_order', 'is_active'];

    public function service()
    {
        return $this->belongsTo(CenterService::class, 'center_service_id');
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
