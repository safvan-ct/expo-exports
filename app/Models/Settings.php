<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Settings extends Model
{
    protected $fillable = ['key', 'value'];

    protected static function booted()
    {
        static::saved(fn() => self::clearMenuCache());
        static::deleted(fn() => self::clearMenuCache());
    }

    protected static function clearMenuCache(): void
    {
        collect(['general_settings', 'useful_services'])->each(fn($key) => Cache::forget($key));
    }
}
