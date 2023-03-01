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


    function jalali()
    {
        return verta($this->created_at)->format('Y-m-d');
    }

    public function FarsiDate($date)
    {
        $year = '1 years';
        $end_date = date('Y-m-d', strtotime($date . $year));
        return verta($end_date)->format('Y/m/d');
    }
}
