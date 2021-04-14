<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chatRoom extends Model
{
    use HasFactory;

    public function messages(){
        return $this->hasMany('App\Models\chatMessage');
    }
}
