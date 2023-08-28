<?php

namespace App\Http\Controllers;

use Browser;
use Illuminate\Http\Request;
use App\Models\DanhmucTruyen;
use App\Models\Truyen;
use App\Models\Chapter;
class IndexController extends Controller
{
    //
    public function home(){
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        $lastChapter = Chapter::orderByDesc('id')->first();
        $chapter = Chapter::orderBy('id','DESC')->get();
        $truyen_new = Truyen::with('chapter')->orderBy('update_at','DESC')->where('kichhoat', 0)->take(6)->get();
        $truyen = Truyen::with('chapter')->orderBy('id','DESC')->where('kichhoat', 0)->paginate(12);
        return view('page.home')->with(compact('danhmuc','truyen','chapter','truyen_new'));
    }

    public function comic_all(){

        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        $lastChapter = Chapter::orderByDesc('id')->first();
        $chapter = Chapter::orderBy('id','DESC')->get();
        $truyen = Truyen::with('chapter')->orderBy('id','DESC')->where('kichhoat', 0)->paginate(12);
        return view('page.all_comic')->with(compact('danhmuc','truyen','chapter'));
    }
    public function danhmuc($slug){
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();

        $danhmuc_id = DanhmucTruyen::where('slug_',$slug)->first();
        $chapter = Chapter::orderBy('id','DESC')->get();
        $tendanhmuc = $danhmuc_id->tendanhmuc;
        $truyen_new = Truyen::with('chapter')->orderBy('update_at','DESC')->where('kichhoat', 0)->take(6)->get();
        $truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->where('danhmuc_id',$danhmuc_id->id)->paginate(12);
        
        return view('page.danhmuc')->with(compact('danhmuc','truyen','tendanhmuc','truyen_new','chapter'));
    }
    public function xemtruyen($slug){
        //biến danh mục lấy id danh mục trong Models DanhmucTruyen
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        //biến truyện có Models Truyện với func danhmuctruyen trong Models Truyện có slug và kich haotj bằng 0 -> tìm
        $truyen = Truyen::with('danhmuctruyen')->where('slug_truyen',$slug)->where('kichhoat',0)->first();
        //biến chapter có Models Chapter với func truyen Models Chapter -> dữ liệu dựa trên id ->điều kiện có id truyện 
        $chapter = Chapter::with('truyen')->orderBy('id','DESC')->where('truyen_id',$truyen->id)->get();
        
        $chapter_dau = Chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyen->id)->first();
        $cungdanhmuc = Truyen::with('danhmuctruyen')->where('danhmuc_id',$truyen->danhmuctruyen->id)->whereNotIn('id',[$truyen->id])->get();
        return view ('page.truyen')->with(compact('danhmuc','truyen','chapter','cungdanhmuc','chapter_dau'));
    }

    public function xemchapter(  $slug_truyen,$slug_chapter){
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();

        $slug_truyen = Truyen::with('danhmuctruyen')->where('slug_truyen',$slug_truyen)->where('kichhoat',0)->first();

        $truyen = Chapter::with('truyen')->where('slug_chapter',$slug_chapter)->where('truyen_id',$slug_truyen->id)->first();
        
        $chapter = Chapter::with('truyen')->where('slug_chapter',$slug_chapter)->where('truyen_id',$truyen->truyen_id)->first();
        
        $allchapter = Chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyen->truyen_id)->get();

        $next_chapter = Chapter::where('truyen_id',$truyen->truyen_id)->where('id','>',$chapter->id)->orderBy('id')->value('slug_chapter');

        $previous_chapter = Chapter::where('truyen_id',$truyen->truyen_id)->where('id','<',$chapter->id)->orderByDesc('id')->value('slug_chapter');

        $max_id = Chapter::where('truyen_id',$truyen->truyen_id)->orderBy('id','DESC')->first();
        
        $min_id = Chapter::where('truyen_id',$truyen->truyen_id)->orderBy('id','ASC')->first();

        return view('page.chapter')->with(compact('danhmuc','chapter','allchapter','next_chapter','previous_chapter','max_id','min_id','slug_truyen'));
    }   


    public function timkiem(){
        $truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->get();
        $danhmuc= DanhmucTruyen::orderBy('id','DESC')->get();
        $tukhoa = $_GET['tukhoa'];

        $truyen_tk = Truyen::with('danhmuctruyen')->where('tentruyen','LIKE','%'.$tukhoa.'%')->get();
        return view('page.timkiem')->with(compact('danhmuc','truyen','tukhoa','truyen_tk'));
    }
}
