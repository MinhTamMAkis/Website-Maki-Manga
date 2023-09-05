<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    
    use HasFactory;
    protected $dates = [
        'create_at',
        'update_at'
    ];
    public $timestamps = false;
    protected $fillable =[
        'truyen_id','tomtat','tieude','noidung','kichhoat','slug_chapter','hinhanh','create_at',
        'update_at'
    ];
    protected $primaryKey = 'id';
    protected $table ='chapter';

    public function truyen(){
        return $this->belongsTo('App\Models\Truyen','truyen_id','id');
    }
}
