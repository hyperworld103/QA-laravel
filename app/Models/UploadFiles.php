<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UploadFiles extends Model
{
    public $fillable = [
        'id',
        'q_id',
        'file_path',
        'file_name'
    ];

    public function Question_files() {
        return $this->belongsTo('App\Models\Questions', 'q_id', 'id');
    }
}
