<?php

namespace App\Services;
use Illuminate\Http\Request;

class CrudService{



    public static function store(Request $request, $model){
        $created = $model::create($request->all());
        return isset($created) ? $created : false;
    }

    public static function delete($model_id, $model){
        $model = $model::find($model_id);
        return isset($model) ? $model->delete() : false;
    }

    public static function update(Request $request, $model){
        $updating_model = $model::find($request->model_id);
       return isset($updating_model) ? $updating_model->update($request->all()) : false;
    }
}
