<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'description', 'action', 'status'];
    
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }


    static public function getList()
    {
        $roles = self::all();
        return $roles ? array_merge([0 => '选择角色'], array_column($roles->toArray(), 'name', 'id')) : [0 => '选择角色'];
    }
    
    static public function pages($data = [], $num = 15)
    {
        $role = self::where('id', '>', 0);
        if (!empty($data['name'])) {
            $role->where('name', 'like', '%'.$data['name'].'%');
        }
        if (!empty($data['status'])) {
            $role->where('status', $data['status']);
        }
        
        return $role->paginate($num);
    }
}
