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

                $diff = $newh - $neww;

                $x = 0;
                $y = round($diff / 2);
            }
            else {
                $ratio = $resolution / $h;
                $newh = $resolution;
                $neww = $w * $ratio;

                $diff = $neww - $newh;

                $x = round($diff / 2);
                $y = 0;
            }

            if($img) {
                $newimg = imagecreatetruecolor($neww, $newh);
                imagecopyresampled($newimg, $img, 0, 0, 0, 0, $neww, $newh, $w, $h);

                $cropimg = imagecreatetruecolor($resolution, $resolution);
                imagecopyresampled($cropimg, $newimg, 0, 0, $x, $y, $resolution, $resolution, $resolution, $resolution);

                $ext == "png" ? imagepng($cropimg, $file, 90) : imagejpeg($cropimg, $file, 90);
            }
        }
    }
}

?>