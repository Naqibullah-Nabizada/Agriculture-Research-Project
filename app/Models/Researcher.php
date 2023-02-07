<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Researcher extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function classes(){
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function faculty(){
        return $this->belongsTo(Faculty::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
}
