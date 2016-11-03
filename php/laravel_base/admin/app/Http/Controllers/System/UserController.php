<?php

namespace App\Http\Controllers\System;

use Hash;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @Controller(prefix="/user")
 * @Middleware("web")
 * @Middleware("auth")
 * @Middleware("power")
 */
class UserController extends Controller
{
    /**
     * @Get("/", as="system_user_index")
     */
    public function index(Request $request)
    {
        $roles = Role::getList();
        $searchData = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'role_id' => $request->get('role_id'),
        ];
        $users = User::pages($searchData);
        
        return view('system.user.index', compact('users', 'roles', 'searchData'));
    }
    
    /**
     * @Get("/create", as="system_user_create")
     */
    public function create()
    {
        $roles = Role::getList();
 
        return view('system.user.create', compact('roles'));
    }
    
    /**
     * @Post("/create", as="system_user_storecreate")
     * @param Request $request
     */
    public function storecreate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:100|confirmed'
        ]);
        
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        if (User::create($data)) {
            return redirect('/user');
        }
        
        return back()->withInput();
    }
    
    /**
     * @Get("/{id}", as="system_user_show", where={"id": "[0-9]+"})
     * @param type $id
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        
        return view('system.user.show', compact('user'));
    }
    
    /**
     * @Get("/{id}/update", as="system_user_update", where={"id": "[0-9]+"})
     * @param type $id
     */
    public function update($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::getList();
        
        return view('system.user.update', compact('user', 'roles'));
    }
    
    /**
     * @Put("/{id}/update", as="system_user_storeupdate", where={"id": "[0-9]+"})
     */
    public function storeUpdate($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'email' => 'required|email',
            'password' => 'min:5|max:100|confirmed'
        ]);
        
        $user = User::findOrFail($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->role_id = $request->get('role_id');
        if ($request->get('password')) {
            $user->password = Hash::make($request->get('password'));
        }

        if ($user->save()) {
            return redirect('/user');
        }
        
        return back()->withInput();
    }
}
