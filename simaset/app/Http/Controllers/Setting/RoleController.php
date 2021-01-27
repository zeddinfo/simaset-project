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
        $list = Role::where('is_delete', 0)->get();

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
            $button = '<a href="'.url("setting/role/update/".$data->id).'" title = "Edit" data-id="'.$data->id.'" class="btn btn-primary btn-xs"> <i class="fa fa-book"></i></a>';

             $button .= '&nbsp';

            $button .= '<button type="button" title="Hapus" data-id="'.$data->id.'" onclick="hapus('.$data->id.')" class="btn btn-danger btn-xs"> 
             <i class="fa fa-trash"></i>
             </button>';

         return $button;
        })
        ->make(true);
    }

    public function update(Request $request, $id){
        $title = 'Detail Role';
        $model = Role::where(['id' => $id])->first();

        $role = Role::get();
        $menu = Menu::where([
            'parent' => 0,
        ])
            ->get();

        if ($request->isMethod('post')) {

            DB::beginTransaction();
            try {
                $model->role = strtolower($model->role);
                $model->save();

                $delete = MenuDetail::where(['id_role' => $id])->delete();

                if (isset($request->menuDetail)) {
                    foreach ($request->menuDetail as $r) {
                        $Menu = new MenuDetail();
                        $Menu->id_menu = $r;
                        $Menu->id_role = $model->id;
                        $Menu->save();
                    }
                }

                DB::commit();
                // dd($model);
                toastr()->success('Data berhasil disimpan');
                return redirect('/setting/role/view/' . $model->id);
            } catch (\Exception $e) {
                DB::rollBack();
                return $e;
            }
        }
        return view('admin.setting.role.create', compact('model', 'menu', 'role', 'title'));
    }
    public function delete(Request $request, $id){
        $model = Role::query()->where('id', $request->id)->first();
        // dd($model);
        
        $model->is_delete = '1';
        $model->save();

        // dd($model,$model->id_user);

        
    }
}
