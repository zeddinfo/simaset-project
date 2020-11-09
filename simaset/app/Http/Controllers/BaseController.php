<?php

namespace App\Http\Controllers;

use App\Models\Setting\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use View;

class BaseController extends Controller
{
    public function __construct()
    {    
        $role_id = Session::get('id_role');
        $menu =  Menu::where(['parent' => '0'])
                ->with(['sub_menu2' => function($q) use ($role_id) {
                    $q->join('menu_detail as a', 'id', '=', 'a.id_menu')->where('a.id_role', $role_id);
                }])
            ->join('menu_detail as a', 'menu.id', '=', 'a.id_menu')
            ->where([
                'a.id_role' => $role_id,
            ])
            ->get();

        View::share('menuList', $menu);
        // dd($menu);
    }
}
