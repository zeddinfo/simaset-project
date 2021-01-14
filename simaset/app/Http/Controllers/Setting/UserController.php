<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Setting\Users;
use App\Models\Md\User;
use App\Models\Setting\Role;
use App\Models\Setting\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserController extends BaseController
{
    public function index(){
        $title = 'Setting User';
        $user = User::get();
        $role = Role::get();
        return view('admin.setting.user.index', compact('title', 'user', 'role'));
    }

    public function create(Request $request){
        // dd($request->all());
        $model = new User();
        $model->name = $request->user;
        $model->username = $request->username;
        $model->password = md5($request->password);
        $model->save();

        if(isset($request->role)){
              $role = new UserRole();
              $role->id_user = $model->id;
              $role->id_role = $request->role;
              $role->is_delete = '0';
              $role->save();
        }
        return response()->json('Data Berhasil Disimpan');
    }

    public function update(Request $request, $id){
        dd($request->all());
        $model = empty($id) ? new User() : User::find($id)->first();
        $model->name = $request->user;
        $model->username = $request->username;
        $model->password = $request->password == $model->password ? $request->password : md5($request->password);
        $model->save();

        if(isset($request->role)){
            $role = empty($request->role) ? new UserRole() : UserRole::find($model->id)->first();
            // dd($role);
            $role->id_role = $request->role;
            $role->is_delete = '0';
            $role->save();
        }

        // $model = UserRole::where(['id' => $id])->first();

        // $model->id_user = $request->user;
        // $model->id_role = $request->role;
        // $model->password = bcrypt($request->input('password'));
        // $model->save();

        return response()->json('Data Berhasil disimpan');
    }
    
    public function delete($id){
        $model1 = User::where(['id' => $id])->first();
        $model2 = UserRole::where(['id' => $id])->first();
        $model1->delete();
        $model2->delete();
    }
}
