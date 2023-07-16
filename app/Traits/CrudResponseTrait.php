<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

trait CrudResponseTrait{

    abstract function service();
    abstract function model();
    abstract function response();

    public function index(Request $request){

        $name = Str::plural($this->get_class_name());
        $data = $this->model()::all();

        switch($this->response()){
            case 'WEB':{
                return view($name.'.index', [$name => $data]);
                break;
            }
            case 'JSON':{
                return response()->json([
                    'Message' => 'Registro consultado correctamente',
                    'data' => [
                        $name => $data
                    ]
                ]);
                break;
            }
        }
    }

    public function show($model_id){
        $data = $this->model()::findOrFail($model_id);
        
        $name = $this->get_class_name();
        
        switch($this->response()){
            case 'WEB':{
                return view(
                    Str::plural($name).'.show', 
                    [$name => $data]);
                break;
            }
            case 'JSON':{
                return response()->json([
                    'message' => ($data) ? 'Registro consultado correctamente' : 'Ha ocurrido un error',
                    'data' => [
                        [$name => $data]
                    ]
                ]);
            }       
        }
    }

    public function create(Request $request){
    
        $validator = Validator::make($request->all(), $this->model()::$validation_rules ?? []);        
        $data = false;
        if($validator->passes()){
            $data = $this->service()::store($request, $this->model());
        }

            switch($this->response()){
            
            case 'WEB':{
                    return ($data) ? redirect()->back()->with('status', 'ok') : 
                    redirect()->back()->withErrors($validator->errors());
                break;
            }
            case 'JSON':{
                return response()->json([
                'message' => ($data) ? 'Rcgistro creado correctamente' : 'Ha ocurrido un error',
                'data' => $data ?: $validator->errors()
                ]);
                break;
            }
        }    
    }        
      



    public function destroy($model_id){

        $result = $this->service()::delete($model_id, $this->model());

        switch($this->response()){

            case 'WEB':{
                return ($result) ?  redirect()->back()->with('status', 'ok') :
                                    redirect()->back()->with('status', 'error');
                break;
            }
            case 'JSON':{
                return response()->json(
                    [
                        'message' => ($result) ? 'Registro eliminado correctamente' : 'Ha ocurrido un error',
                        'data' => [
                            'id' => $model_id
                        ]
                    ]
                );
                break;
            }
        }
    }


    public function update(Request $request){
        
        $validator = Validator::make($request->all(), $this->model()::$validation_rules ?? []);
        $result = false;

        if($validator->passes()){
            $result = $this->service()::update($request, $this->model());
        }

        switch($this->response()){

            case 'WEB' :{
                return ($result) ? redirect()->back()->with('status', 'ok') :
                redirect()->back()->withErrors($validator->errors());    
                break;

            }
            case 'JSON': {
                
                $message = ($result) ? 'Registro actualizado correctamente' : 'Ha ocurrido un error';
            
                return response()->json([
                    'message' => $message,
                    'data' => $result ?: $validator->errors()
                ]);
                break;
            }
        }
    }
    // 'App\Models\Car' => 'car' 
    function get_class_name(){
         return (strtolower(class_basename($this->model())));
    }

}
