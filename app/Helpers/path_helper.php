<?php

use Illuminate\Support\Facades\File;

if (! function_exists('khatushyam_base_path')) {
    function khatushyam_base_path(string $append = ''): string
    {
        // Adjust to your real structure if needed
        $root = rtrim(base_path('../public_html/khatushyam'), '/');
        return $append ? $root . '/' . ltrim($append, '/') : $root;
    }
}
if (! function_exists('khatushyam_base_url')) {
    function khatushyam_base_url(string $append = ''): string
    {
        $base = rtrim(config('app.url'), '/') . '/khatushyam';
        return $append ? $base . '/' . ltrim($append, '/') : $base;
    }
}
if (! function_exists('ensure_dir')) {
    function ensure_dir(string $path, int $mode = 0775): void
    {
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, $mode, true, true);
        }
    }
}
