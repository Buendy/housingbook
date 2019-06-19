<?php
namespace App\Helpers;

class Helper {

    public static function uploadFile($photo)
    {

        $filenameWithExt = $photo->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $photo->getClientOriginalExtension();
        $filenameToStore = $filename.'_'.time().'.'.$extension;
        $photo->storeAs('public/photos/', $filenameToStore);

        return $filenameToStore;
    }

//    public static function categoriesTableFill($apartment, $objects)
//    {
//        foreach($objects as $object)
//        {
//            $apartment->categories()->attach($object);
//        }
//    }

    public static function servicesTableFill($apartment, $objects)
    {
        $apartment->services()->detach();

        foreach($objects as $object)
        {
            $apartment->services()->attach($object);
        }
    }

    public static function validateFile($photo)
    {
        $extension = $photo->getClientOriginalExtension();

        if($extension == 'png'){
            return true;
        }else if($extension == 'jpg'){
            return true;
        }else if($extension == 'jpeg'){
            return true;
        }else{
            return false;
        }
    }
}