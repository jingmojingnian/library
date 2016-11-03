<?php

namespace App\Http\Controllers\System;

use App\Models\Node;
use App\Console\Commands\UpdateNode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @Controller(prefix="/node")
 * @Middleware("web")
 * @Middleware("auth")
 * @Middleware("power")
 */
class NodeController extends Controller
{
    /**
     * @Get("/{id?}", as="system_node_index", where={"id": "[0-9]+"})
     */
    public function index(Request $request, $id = null)
    {
        $id = $id > 0 ? $id : 0;
        $nodes = Node::where('pid', $id)->paginate();
        
        return view('system.node.index', compact('nodes', 'id'));
    }
    
    /**
     * @Get("/{id}/update", as="system_node_update", where={"id": "[0-9]+"})
     */
    public function update($id)
    {
        $node = Node::findOrFail($id);
        
        return view('system.node.update', compact('node'));
    }
    
    /**
     * @Put("/{id}", as="system_node_storeupdate", where={"id": "[0-9]+"})
     */
    public function storeUpdate($id, Request $request)
    {
        $this->validate($request, ['name' => 'required|max:100|unique:node']);
        $node = Node::findOrFail($id);
        $node->name = $request->get('name');
        if ($node->save()) {
            return $node->pid ? redirect('/node/'.$node->pid) : redirect('/node');
        }
        
        return back()->withInput();
    }
    
    /**
     * @Get("/sync", as="system_node_sync")
     */
    public function sync()
    {
        $model = new UpdateNode();
        $model->handle();
        
        return redirect('/node');
    }
}
