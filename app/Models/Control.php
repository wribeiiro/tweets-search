<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    protected $fillable = ['name'];

    function selectAll($limit = 100)
    {
        return $this->limit($limit)->orderBy('id', 'desc')->get()->toArray();
    }
}
