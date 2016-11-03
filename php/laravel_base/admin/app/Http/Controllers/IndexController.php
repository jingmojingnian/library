<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Node;
use App\Models\Role;
use Illuminate\Http\Request;

/**
 * @Controller(prefix="/")
 * @Middleware("web")
 * @Middleware("auth")
 */
class IndexController extends Controller
{
    /**
     * @Get("/", as="index_index")
     */
    public function index()
    {
        $count = [
            'user' => User::count(),
            'node' => Node::count(),
            'role' => Role::count(),
        ];
        
        return view('index.index', compact('count'));
    }
}
