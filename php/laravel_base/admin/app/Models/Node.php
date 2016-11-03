<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    protected $table = 'node';
    protected $fillable = ['name', 'path', 'alias', 'pid', 'status'];
    
    static public function getList($ids)
    {
        $nodes = self::find(explode(',', $ids));
        
        return $nodes ? array_column($nodes->toArray(), 'name', 'alias') : [];
    }
}
