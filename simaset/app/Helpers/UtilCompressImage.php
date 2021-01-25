<?php 
namespace App\Helpers;

class UtilCompressImage {
    public static function compressImage($source, $destination, $quality = 75){
        // dd($source, $destination, $quality);
        $info = getimagesize($source);
        if($info['mime'] == 'image/jpeg')
            $image = imagecreatefromjpeg($source);
        elseif($info['mime'] == 'image/gif')
            $image = imagecreatefromgif($source);
        elseif($info['mime'] == 'image/png')
            $image = imagecreatefrompng($source);
        imagejpeg($image, $destination, $quality);
    }
    
}

?>