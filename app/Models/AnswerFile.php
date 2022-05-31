<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnswerFile extends Model
{
    public $fillable = [
        'id',
        'a_id',
        'file_path',
        'file_name'
    ];

    public function Answers_files() {
        return $this->belongsTo('App\Models\Answers', 'a_id', 'id');
    }
    
}
