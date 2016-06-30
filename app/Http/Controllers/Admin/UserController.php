<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/6/30
 * Time: 15:14
 */

namespace App\Http\Controllers\Admin;


use App\Models\Role;
use App\Models\User;

class UserController extends AdminController
{
    public function index(User $user,Role $role)
    {
        $users = $user->paginate(50);

        $roles = $role->get();

        return view('admin.user.index',[
            'users' => $users,
            'roles' => $roles
        ]);
    }
}