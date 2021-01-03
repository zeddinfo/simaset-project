<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Md\User;
use App\Models\Setting\Role;
use App\Models\Setting\UserRole;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function index(){
        $title = 'Setting User';
        $user = User::get();
        $role = Role::get();
        return view('admin.setting.user.index', compact('title', 'user', 'role'));
    }

    public function create(Request $request){
        $model = new UserRole();
        $model->id_user = $request->user;
        $model->id_role = $request->role;
        $model->is_delete = '0';
        $model->save();

        return response()->json('Data Berhasil Disimpan');
    }

    public function update(Request $request, $id){
        // dd($request->all());
        $model = UserRole::where(['id' => $id])->first();

        $model->id_user = $request->user;
        $model->id_role = $request->role;
        $model->save();

        return response()->json('Data Berhasil disimpan');
    }
}
