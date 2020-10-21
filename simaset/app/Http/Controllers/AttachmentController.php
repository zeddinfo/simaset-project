<?php

namespace App\Http\Controllers;

use App\Models\Md\Dokumentasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AttachmentController extends Controller
{
    public function index($id){
        $model = Dokumentasi::query()->where(['id' => $id])->first();
        
        if($model){
            return Storage::response($model->path);
        }else{
            return response()->json(['message' => 'Page Not Found'], 404);
        }
    }
}
