<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Setting\Role;
use App\Models\Setting\Menu;
use App\Models\Setting\MenuDetail;
use Yajra\DataTables\Facades\DataTables;


class RoleController extends BaseController
{
    public function index(){
        $title = 'Setting Role dan Menu';
        return view('admin.setting.role.index', compact('title'));
    }

    public function view(Request $request, $id){
        $model = Role::where(['id' => $id])->first();
        $title = 'Detail Role';
        $menu = Menu::where([
            ['parent', 0],
        ])
        ->get();
        
        // dd($model, $menu);
        return view('admin.setting.role.view', compact('model', 'menu', 'title'));

    }

    public function create(Request $request){
        $title = 'Tambah Role Baru';
        $model = new Role();
        $role = Role::get();

        $menu = Menu::where([
            ['parent', 0],
        ])
        ->get();

        if($request->isMethod('post')){
            // dd($request->all());
            DB::beginTransaction();
            try{
                $validator = Validator::make($request->all(),[
                    'role' => 'required|unique:role',
                ]);

                if($validator->fails()){
                    toastr()->warning('Role tidak boleh sama !!');
                }

                $model = new Role();
                $model->role = strtolower($request->role);
                $model->save();

                if(isset($request->menuDetail)){
                    $model->menuDetail = $request->menuDetail;
                    foreach($request->menuDetail as $r){
                        $Menu = new MenuDetail();
                        $Menu->id_menu = $r;
                        $Menu->id_role = $model->id;
                        $Menu->save();
                    }
                }

                if(isset($error)){
                    toastr()->warning('Internal Server Error');
                    return view('admin.setting.role.create', compact('model', 'menu', 'role'));

                }

                DB::commit();

                toastr()->success('Data Berhasil Disimpan');
                return redirect('/setting/role/view/'.$model->id);
            } catch(\Exception $e){
                DB::rollBack();
                return $e;
            }
        }
        return view('admin.setting.role.create', compact('model', 'menu', 'role', 'title'));
    }

    public function listRole(){
        $list = Role::get();

        return DataTables::of($list)
        ->addIndexColumn()
        ->editColumn('user', function($data){
            $user = $data->role;
            return $user;
        })
        // ->editColumn('role', function($data){
        //     $role = $data->namaRole->role;
        //     return $role;
        // })
        ->addColumn('action', function($data){
            $button = '<button type="button" title="Edit" data-id="'.$data->id.'" onclick="edit('.$data->id.')" class="btn btn-info btn-xs"> 
             <i class="fas fa-book"></i>
             </button>';

             $button .= '&nbsp';

            $button .= '<button type="button" title="Hapus" data-id="'.$data->id.'" onclick="hapus('.$data->id.')" class="btn btn-danger btn-xs"> 
             <i class="fa fa-trash"></i>
             </button>';

         return $button;
        })
        ->make(true);
    }
}
