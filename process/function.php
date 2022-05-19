<?php

if (!function_exists('connDb')) {
    function connDb() {
        $link =  "mysql:host=localhost;dbname=kulinermahasiswa";
        return new PDO ($link, 'root', '');
    }
}

if (!function_exists('resize_image')) {
    function resize_image ($file, $ext, $resolution) {
        if(file_exists($file)) {
            switch($ext) {
                case "jpg":
                case "jpeg":
                    $img = imagecreatefromjpeg($file);
                    break;
                case "png":
                    $img = imagecreatefrompng($file);
                    break;
                default:
                    die("Jenis foto ini tidak didukung.");
            }
            $w = imagesx($img);
            $h = imagesy($img);

            if($h > $w) {
                $ratio = $resolution / $w;
                $neww = $resolution;
                $newh = $h * $ratio;

            }else {
                $ratio = $resolution / $h;
                $newh = $resolution;
                $neww = $w * $ratio;

            }

            if($img) {
                $newimg = imagecreatetruecolor($neww, $newh);
                imagecopyresampled($newimg, $img, 0, 0, 0, 0, $neww, $newh, $w, $h);

                $ext == "png" ? imagepng($newimg, $file) : imagejpeg($newimg, $file);
            }
        }
    }
}

?>