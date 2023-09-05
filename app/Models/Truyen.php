<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truyen extends Model
{
    
    use HasFactory;
    protected $dates = [
        'update_at'

    ];
    public $timestamps = false;
    protected $fillable =[
        'tentruyen','tenkhac','tac_gia','tomtat','kichhoat','slug_truyen','hinhanh','danhmuc_id','update_at'

    ];
    protected $primaryKey = 'id';
    protected $table ='truyen';

    public function danhmuctruyen(){
        return $this->belongsTo('App\Models\DanhmucTruyen','danhmuc_id','id');
    }
    public function chapter(){
        return $this->hasMany('App\Models\Chapter','truyen_id','id');
    }
}
