<?php

    namespace App\Helper;

    class Storage
    {
        public static function uploadImageProduct($fileImage)
        {
            $ext = $fileImage->getClientOriginalExtension();
            $name = Uuid::createNameForImage($ext);
            $fileImage->move(base_path("public/assets/img/products"), $name);

            return $name;
        }
        
        public static function uploadImageProfile($fileImage)
        {
            $ext = $fileImage->getClientOriginalExtension();
            $name = Uuid::createNameForImage($ext);
            $fileImage->move(base_path("public/assets/img/profile"), $name);
            
            return $name;
        }

        public static function getImageProduct($fileImage)
        {
            return 'assets/img/products/' . $fileImage;
        }
        
        public static function getImageProfile($fileImage)
        {
            return 'assets/img/profile/' . $fileImage;
        }
    }
