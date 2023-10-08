<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThuocDanhMuc extends Model
{
    use HasFactory;
    protected $fillable =[
        'danhmuc_id','truyen_id'

    ];
    protected $primaryKey = 'id';
    protected $table ='thuocdanhmuc';

    public function truyen(){
        return $this->hasMany('App\Models\Truyen');
    }

    public function danhmuctruyen(){
        return $this->hasMany('App\Models\Truyen');
    }
}
