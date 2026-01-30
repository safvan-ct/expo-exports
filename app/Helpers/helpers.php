<?php

use Illuminate\Support\Facades\Storage;

if (! function_exists('formatPhoneNumber')) {
    function formatPhoneNumber(string $phone, ?string $countryCode = '91'): string
    {
        $digits = preg_replace('/\D+/', '', $phone);
        $count  = strlen($countryCode);
        $inc    = $count <= 2 ? 3 : 2;
        $start  = $count == 1 ? 4 : 5;
        $start2 = $count == 1 ? 7 : 8;

        if (strlen($digits) >= 8) {
            return sprintf(
                '+%s %s %s %s',
                substr($digits, 0, $count),
                substr($digits, $count, $inc),
                substr($digits, $start, 3),
                substr($digits, $start2)
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
