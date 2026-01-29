<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

if (! function_exists('formatUaePhone')) {
    function formatUaePhone(string $phone): string
    {
        $digits = preg_replace('/\D+/', '', $phone);

        if (strlen($digits) >= 8 && Str::startsWith($digits, '971')) {
            return sprintf(
                '+%s %s %s %s',
                substr($digits, 0, 3),
                substr($digits, 3, 2),
                substr($digits, 5, 3),
                substr($digits, 8)
            );
        }

        return $phone;
    }
}

if (! function_exists('uploadFileHelper')) {
    function uploadFileHelper($file, string $folder)
    {
        $filename = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
        return $file->storeAs($folder, $filename, 'public');
    }
}

if (! function_exists('globalFileView')) {
    function globalFileView($file)
    {
        if (config('app.env') === 'dev') {
            return ! empty($file) && Storage::disk('public')->exists($file)
                ? asset('typing-center/storage/app/public/' . $file)
                : 'https://placehold.net/default.png';
        }

        return ! empty($file) && Storage::disk('public')->exists($file)
            ? Storage::url($file)
            : 'https://placehold.net/default.png';
    }
}
