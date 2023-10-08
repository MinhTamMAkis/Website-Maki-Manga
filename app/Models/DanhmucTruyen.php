<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhmucTruyen extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable =[
        'tendanhmuc','mota','kichhoat','slug_'
    ];
    protected $primaryKey = 'id';
    protected $table ='danhmuc';

    public function truyen(){
        return $this->hasMany('App\Models\Truyen');
    }
    public function thuocdanhmuctruyen(){
        return $this->belongsToMany(DanhmucTruyen::class,'thuocdanhmuc','truyen_id','danhmuc_id');
    }
}
