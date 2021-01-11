<?php

namespace App\Http\Controllers\Api\Md;

use App\Http\Controllers\Controller;
use App\Models\Setting\UserRole;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ApiUserController extends Controller
{
    public function list(){
        $list = UserRole::where('is_delete', 0)->get();

        return DataTables::of($list)
        ->addIndexColumn()
        ->editColumn('user', function($data){
            $user = $data->namauser->name;
            return $user;
        })
        ->editColumn('role', function($data){
            $role = $data->namaRole->role;
            return $role;
        })
        ->addColumn('action', function($data){
            $button = '<button type="button" title="Edit" data-id="'.$data->id.'" onclick="edit('.$data->id.')" class="btn btn-info btn-sm"> 
            <i class="fas fa-edit-sm"></i></a>
             </button>';

             $button .= '&nbsp';

            $button .= '<button type="button" title="Hapus" data-id="'.$data->id.'" onclick="hapus('.$data->id.')" class="btn btn-danger btn-sm"> 
             <i class="fa fa-trash-sm"></i>
             </button>';

         return $button;
        })
        ->make(true);
    }

    public function view($id){
        $data = UserRole::where(['id' => $id])->with('namaUser', 'namaRole')->first();

        return response()->json($data);
    }
}
