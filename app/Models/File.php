<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        "file",
        "filename",
        "branch",
        "department",
        "receiver",

    ];

    public function sender(){
        return $this->belongsTo(User::class ,'user_id');
    }
}
