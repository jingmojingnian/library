<?php

namespace App\Http\Controllers\System;

use App\Models\Role;
use App\Models\Node;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @Controller(prefix="/role")
 * @Middleware("web")
 * @Middleware("auth")
 * @Middleware("power")
 */
class RoleController extends Controller
{
    /**
     * @Get("/", as="system_role_index")
     */
    public function index(Request $request)
    {
        $searchData = [
            'name' => $request->get('name'),
            'status' => $request->get('status'),
        ];
        $roles = Role::pages($searchData);
        
        return view('system.role.index', compact('roles', 'searchData'));
    }
    
    /**
     * @Get("/create", as="system_role_create")
     */
    public function create()
    {
        $nodes = $this->_getNodes();

        return view('system.role.create', compact('nodes'));
    }
    
    /**
     * @Post("/create", as="system_role_storecreate")
     */
    public function storeCreate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'description' => 'max:200',
        ]);
        
        $data = $request->all();

        $data['status'] = 1;
        $data['action'] = empty($data['action']) ? '' : join(',', $data['action']);
        if (Role::create($data)) {
            return redirect('/role');
        }
        
        return back()->withInput();
    }


    /**
     * @Get("/{id}/update", as="system_role_update", where={"id": "[0-9]+"})
     */
    public function update($id)
    {
        $role = Role::findOrFail($id);
        $nodes = $this->_getNodes();
        $actions = $role->action ? explode(',', $role->action) : [];
        
        return view('system.role.update', compact('role', 'nodes', 'actions'));
    }
    
    /**
     * @Put("/{id}", as="system_role_storeupdate", where={"id": "[0-9]+"})
     */
    public function storeUpdate($id, Request $request)
    {
        $this->validate($request, ['name' => 'required|max:100']);
        
        $role = Role::findOrFail($id);
        $role->name = $request->get('name');
        $role->action = $request->get('action') ? join(',', $request->get('action')) : '';
        if ($role->save()) {
            return redirect('/role');
        }
        
        return back()->withInput();
    }
    
    /**
     * @Get("/{id}", as="system_role_show", where={"id": "[0-9]+"})
     * @param type $id
     * @return type
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);
        $actions = $role->action ? Node::getList($role->action) : [];

        return view('system.role.show', compact('role', 'actions'));
    }
    
    private function _getNodes()
    {
        $nodes = Node::all();
        $return = [];
        
        foreach ($nodes as $node) {
            if (!$node->pid) {
                $return[$node->id] = [
                    'id' => $node->id,
                    'name' => $node->name,
                ];
            } else {
                $return[$node->pid]['childs'][] = [
                    'id' => $node->id,
                    'name' => $node->name,
                ];
            }
        }
        
        return $return;
    }
}
