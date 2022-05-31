<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    public $fillable = [
        'id',
        'name',
        'color'
    ];

    public function Questions_List() {
        return $this->hasOne('App\Models\Questions');
    }
}
