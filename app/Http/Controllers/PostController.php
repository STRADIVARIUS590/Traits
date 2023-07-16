<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Traits\CrudResponseTrait;
use App\Services\CrudService;

class PostController extends Controller

{
    use CrudResponseTrait;

    public function service()
    {
        return CrudService::class;
    }

    public function model(){
        return Post::class;
    }

    public function response(){
        return 'WEB';
    }



    public static function static_test($value){

        //   una variable 'static' nos permite almacanar valores entre llamadas a la function 
        static $array = [];
        if(in_array($value, $array)){
            echo 'EXISTE EN EL ARREGLO';
         } else{
            array_push($array, $value);
             echo 'ELEMENTO GUARDADO';
        }

        print_r($array);
    }
}
