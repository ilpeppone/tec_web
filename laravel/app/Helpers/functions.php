<?php
if (!function_exists('isMobile')) {
    function isMobile() {
        // Controllo del dispositivo mobile tramite userAgent
        return preg_match('/(android|iphone|ipod|ipad|mobile|opera mini|blackberry|webos)/i', request()->userAgent()) || isset($_COOKIE['is_mobile']);
    }
}
