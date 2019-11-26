<?php 

namespace App\Services;

class CloudinaryConfigService
{
    public static function configuration()
    {
        \Cloudinary::config([
            "cloud_name" => "dmkphpnmg", 
            "api_key" => "988112472568339", 
            "api_secret" => "QjV7lIeJTXvbCxUpiENFfgbYT5U", 
            "secure" => true
        ]);
    }
}