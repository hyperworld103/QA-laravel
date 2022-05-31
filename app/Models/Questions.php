<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    public $fillable = [
        'id',
        'u_id',
        's_id',
        'q_title',
        'question',
        'statu'
    ];

    public function Answers_List() {
        return $this->hasMany('App\Models\Answers', 'q_id', 'id');
    }
   
    public function UploadFile_List() {
        return $this->hasOne('App\Models\UploadFiles', 'q_id', 'id');
    }

    public function Question_user() {
        return $this->belongsTo('App\User', 'u_id', 'id');
    }

    public function Subjects_List() {
        return $this->belongsTo('App\Models\Subjects', 's_id', 'id');
    }
    
    
}
