<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name', 'email', 'password', 'role_id'];
    
    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }
    
    static public function pages($data = [], $num = 15)
    {
        $user = self::where('id', '>', 0);
        if (!empty($data['name'])) {
            $user->where('name', 'like', '%'.$data['name'].'%');
        }
        if (!empty($data['email'])) {
            $user->where('email', 'like', '%'.$data['email'].'%');
        }
        if (!empty($data['role_id'])) {
            $user->where('role_id', $data['role_id']);
        }
        
        return $user->paginate($num);
    }
}
