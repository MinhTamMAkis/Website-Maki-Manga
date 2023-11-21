<?php

namespace App\Http\Controllers;

use Browser;
use Illuminate\Http\Request;
use App\Models\DanhmucTruyen;
use App\Models\Truyen;
use App\Models\Chapter;
use App\Models\ThuocDanhMuc;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Translation\PseudoLocalizationTranslator;

class IndexController extends Controller
{


    public function search_ajax(Request $request){
        $data = $request->all();

        if($data['keywords']){
            $truyen = Truyen::where('kichhoat',0)->where('tentruyen','LIKE','%'.$data['keywords'].'%')->get();
            $output =' <ul class="search-dropdow" style="display:block;">';
            $danhmuc = DanhmucTruyen::with('truyen')->where('id','ASC')->get();
            
            foreach ($truyen as $key => $tr){
                $thuocdanhmuc= ThuocDanhMuc::orderBy('id','DESC')->where('truyen_id',$tr->id)->get();
                $output .='<li class="item-search">
                            <a href="'.url('xem-truyen/'.$tr->slug_truyen).'"> 
                                <div class="d-flex">
                                    <figure class="figure-img">
                                        <img class="search-img" src="'. asset('public/upload/truyen/'. $tr->hinhanh).'">
                                    </figure>
                                    <div class="content-search">
                                        <p>';

                                            if(strlen($tr->tentruyen) <=100){
                                                $output.=  $tr->tentruyen;

                                            }else{
                                                $output.= substr($tr->tentruyen,0,100).'...';
                                            }
                                        
                $output.=               '</p>
                                        <div class="d-flex">';
                                            foreach($thuocdanhmuc as $key => $dm){
                                                    $category = DanhmucTruyen::find($dm->danhmuc_id);
                $output.=                           '<p class="the_loai">'. $category->tendanhmuc.'</p>';
                                            }
                $output.=               '</div>
                                    </div>
                                </div>
                            
                            </a>
                        </li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

    //
    public function home(){
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        $lastChapter = Chapter::orderByDesc('id')->first();
        $chapter = Chapter::orderBy('id','DESC')->get();
        $truyen_new = Truyen::with('chapter')->orderBy('update_at','DESC')->where('kichhoat', 0)->take(6)->get();
        $getday = Truyen::orderBy('id','DESC')->get();
        $truyen = Truyen::with('chapter')->orderBy('id','DESC')->where('kichhoat', 0)->paginate(12);
        return view('page.home')->with(compact('danhmuc','truyen','chapter','truyen_new'));
    }

    public function comic_all(){

        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        $lastChapter = Chapter::orderByDesc('id')->first();
        $chapter = Chapter::orderBy('id','DESC')->get();
        $truyen_new = Truyen::with('chapter')->orderBy('update_at','DESC')->where('kichhoat', 0)->take(6)->get();
        $truyen = Truyen::with('chapter')->orderBy('id','DESC')->where('kichhoat', 0)->paginate(12);
        $truyen_count = Truyen::with('chapter')->orderBy('id','DESC')->where('kichhoat', 0)->get();
        return view('page.all_comic')->with(compact('danhmuc','truyen','chapter','truyen_new','truyen_count'));
    }
    public function danhmuc($slug){
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();

        $danhmuc_id = DanhmucTruyen::where('slug_',$slug)->first();
        $thuocdanhmuc = ThuocDanhMuc::where('danhmuc_id',$danhmuc_id->id)->get();
       
        $chapter = Chapter::orderBy('id','DESC')->get();
        $tendanhmuc = $danhmuc_id->tendanhmuc;
        
        
        
        $truyen_new = Truyen::with('chapter')->orderBy('update_at','DESC')->where('kichhoat', 0)->take(6)->get();
        
        $truyen = Truyen::with('thuocdanhmuctruyen')->orderBy('id','DESC')->where('kichhoat',0)->paginate(12);
        
        
        return view('page.danhmuc')->with(compact('danhmuc','truyen','tendanhmuc','truyen_new','chapter','thuocdanhmuc'));
    }
    public function xemtruyen($slug){
        
        //biến danh mục lấy id danh mục trong Models DanhmucTruyen
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        //biến truyện có Models Truyện với func danhmuctruyen trong Models Truyện có slug và kich haotj bằng 0 -> tìm
        $truyen = Truyen::with('danhmuctruyen')->where('slug_truyen',$slug)->where('kichhoat',0)->first();
        //biến chapter có Models Chapter với func truyen Models Chapter -> dữ liệu dựa trên id ->điều kiện có id truyện 
        $chapter = Chapter::with('truyen')->orderBy('id','DESC')->where('truyen_id',$truyen->id)->get();
        $chapter_asc = Chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyen->id)->get();
        
        $thuocdanhmuc= ThuocDanhMuc::orderBy('id','DESC')->where('truyen_id',$truyen->id)->get();
        
        $chapter_dau = Chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyen->id)->first();
        $chapter_cuoi = Chapter::with('truyen')->orderBy('id','DESC')->where('truyen_id',$truyen->id)->first();
        $category_list = Truyen::with('thuocdanhmuctruyen')->whereNotIn('id',[$truyen->id])->get();
        return view ('page.truyen')->with(compact('danhmuc','truyen','chapter','category_list','chapter_dau','thuocdanhmuc','chapter_asc','chapter_cuoi'));
    }

    public function xemchapter(  $slug_truyen,$slug_chapter){
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();

        $slug_truyen = Truyen::with('danhmuctruyen')->where('slug_truyen',$slug_truyen)->where('kichhoat',0)->first();

        $truyenid = Chapter::with('truyen')->where('slug_chapter',$slug_chapter)->where('truyen_id',$slug_truyen->id)->first();
        
        $chapter = Chapter::with('truyen')->where('slug_chapter',$slug_chapter)->where('truyen_id',$truyenid->truyen_id)->first();

        $truyen = Truyen::where('id',$slug_truyen->id)->first();
        $truyen->comic_view = (int)$truyen->comic_view + 1;
        $truyen->save();
        
        $allchapter = Chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyenid->truyen_id)->get();

        $next_chapter = Chapter::where('truyen_id',$truyenid->truyen_id)->where('id','>',$chapter->id)->orderBy('id')->value('slug_chapter');

        $previous_chapter = Chapter::where('truyen_id',$truyenid->truyen_id)->where('id','<',$chapter->id)->orderByDesc('id')->value('slug_chapter');

        $max_id = Chapter::where('truyen_id',$truyenid->truyen_id)->orderBy('id','DESC')->first();
        
        $min_id = Chapter::where('truyen_id',$truyenid->truyen_id)->orderBy('id','ASC')->first();

        return view('page.chapter')->with(compact('danhmuc','chapter','allchapter','next_chapter','previous_chapter','max_id','min_id','slug_truyen'));
    }   


    public function timkiem(Request $request){
        $data = $request->all();
        $truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->get();
        $danhmuc= DanhmucTruyen::orderBy('id','DESC')->get();
        $tukhoa = $data['tukhoa'];
        $chapter = Chapter::orderBy('id','DESC')->get();
        $truyen_tk = Truyen::with('danhmuctruyen')->where('tentruyen','LIKE','%'.$tukhoa.'%')->get();
        return view('page.timkiem')->with(compact('danhmuc','truyen','tukhoa','truyen_tk','chapter'));
    }

    public function bookmark(Request $request){
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        $data =$request->all();
        $chapter = Chapter::orderBy('id','DESC')->get();
        $truyen = Truyen::with('chapter')->orderBy('id','DESC')->where('kichhoat', 0)->paginate(12);
        return view('page.bookmark')->with(compact('danhmuc','truyen','chapter'));
    }
   
}