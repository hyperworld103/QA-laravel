<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    public $fillable = [
        'id',
        'u_id',
        'q_id',
        's_id',
        'answers',
        'select',
        'read'
    ];

    public function Answers_File() {
        return $this->hasMany(AnswerFile::class, 'a_id', 'id');
    }

    public function Answers_user() {
        return $this->belongsTo('App\User', 'u_id', 'id');
    }

    public function Question_List() {
        return $this->belongsTo('App\Models\Questions', 'q_id', 'id');
    }

}
