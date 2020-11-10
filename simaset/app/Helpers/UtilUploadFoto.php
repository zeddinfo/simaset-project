<?php
namespace App\Helpers;

class UtilUploadFoto {
    
    public static function UploadFoto($file, $basePath, $size){

        $thn = date('Y');
        $bln = date('F');
        $day = date('d');
        $folder = 'public/file/foto/'.$thn.'/'.$bln.'/'.$day; 
        
        if(!file_exists($folder)){
            mkdir($folder, 0777, true);
        }

        $fileName = $file->getClientOriginalName();
        $path = $file->storeAs($folder, $fileName);
        $fileNameDB = date('Y-m-d-H-i-s') . $fileName;
        $filetemp =  $basePath . $folder.'\\' . $fileName;
        $fileDest = $basePath . $folder.'\\'. date('Y-m-d-H-i-s') . $fileName;
        UtilCompressImage::compressImage($filetemp, $fileDest, $size);
        unlink($filetemp);

        $data = array(
            'fileDB' => $fileNameDB,
            'path' => $filetemp,
        );

        return $data;
    }
}
?>