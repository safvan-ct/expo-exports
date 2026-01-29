<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['center_service_id', 'document_group_id', 'name', 'notes', 'sort_order', 'is_active'];

    public function centerService()
    {
        return $this->belongsTo(CenterService::class);
    }

    public function documentGroup()
    {
        return $this->belongsTo(DocumentGroup::class);
    }
}
