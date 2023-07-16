<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Services\CrudService;
use App\Traits\CrudResponseTrait;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use CrudResponseTrait {
        // rename para extender metodo desde el trait
        get_class_name as class_name;
        index as overriden_index;
    }
    public function service()
    {
        return CrudService::class;
    }

    public function model()
    {
        return Post::class;
    }

    public function response()
    {
        return 'JSON';
    }

/*     // metodos extendido desde el trait
    public function get_class_name()
    {
        return $this->class_name(). 'overriden';
    }
 */
    public function overriden_index(Request $request){
        $request->merge(['posts_count' => Post::count()]);
        return $this->index($request);
    }
}

