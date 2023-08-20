<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Truyen;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $list_chapter = Chapter::with('truyen')->orderBy('id','DESC')->get();
        return view('admincp.chapter.index')->with(compact('list_chapter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $truyen = Truyen::orderBy('id','DESC')->get();
        return view('admincp.chapter.create')->with(compact('truyen'));
    }

    /**
     * Store a newly created resource in storage.
     */

    

    public function store(Request $request)
    {
        
        $data = $request->validate(
            [
                'tieude' => 'required|max:255',
                'slug_chapter' => 'required|max:255',
                'tomtat' => 'required',
                'noidung' => 'required',
                'kichhoat' => 'required',
                'truyen_id' => 'required',
                'hinhanh' => 'required'
                
            ],
            [
                'tieude.required' => 'Tên chapter phải có ',
                'slug_chapter.required' => 'Slug chapter phải có',
                'tieude.unique' => 'Tên chapter đã có',
                'slug_chapter.unique' => 'Slug chapter đã có',
                'tomtat.required' => 'Tóm tắt phải có',
                'noidung.required' => 'Nội dung phải có'
            ]
        );
        $chapter = new Chapter();
        $chapter->tieude = $data['tieude'];
        $chapter->slug_chapter = $data['slug_chapter'];
        $chapter->tomtat = $data['tomtat'];
        $chapter->noidung = $data['noidung'];
        $chapter->kichhoat = $data['kichhoat'];
        $chapter->truyen_id = $data['truyen_id'];
        
        $truyen = Truyen::where('id',$chapter->truyen_id)->first();
        $slug_truyen = $truyen->slug_truyen;
        
        
        //thêm nhiều hình ảnh của chapter
        $file = $request->hinhanh;
        $hinhanh=array();
        
        $path =$slug_truyen.'/'.$chapter->slug_chapter.'/'; 
        if($files = $request->file('hinhanh')){
            foreach($files as $file){
                $get_name = $file ->getClientOriginalName();
                $image_name = current(explode('.',$get_name));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                Storage::makeDirectory($path, $mode = 0777, true, true);
                $uploads_path ='public/upload/chapter/'.$path;
                $image_url = $uploads_path.$image_full_name;
                $file->move($uploads_path,$image_full_name);
                    $hinhanh[] = $image_url;
                }
            }
            
            
        $chapter->hinhanh = json_encode($hinhanh);
        
        $chapter->save();
        return redirect()->back()->with('status','Đã thêm chapter thành công');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $chapter = Chapter::find($id);
        $truyen_id  = Truyen::orderBy('id','DESC')->get();
        return view('admincp.chapter.edit')->with(compact('chapter','truyen_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request->validate(
            [
                'tieude' => 'required|max:255',
                'slug_chapter' => 'required|max:255',
                'tomtat' => 'required',
                'noidung' => 'required',
                'kichhoat' => 'required',
                'truyen_id' => 'required',
                'hinhanh' => 'required'
                
            ],
            [
                'tieude.required' => 'Tên chapter phải có ',
                'slug_chapter.required' => 'Slug chapter phải có',
                'tieude.unique' => 'Tên chapter đã có',
                'slug_chapter.unique' => 'Slug chapter đã có',
                'tomtat.required' => 'Tóm tắt phải có',
                'noidung.required' => 'Nội dung phải có'
            ]
        );
        $chapter =  Chapter::find($id);
        $chapter->tieude = $data['tieude'];
        $chapter->slug_chapter = $data['slug_chapter'];
        $chapter->tomtat = $data['tomtat'];
        $chapter->noidung = $data['noidung'];
        $chapter->kichhoat = $data['kichhoat'];
        $chapter->truyen_id = $data['truyen_id'];

        $truyen = Truyen::where('id',$chapter->truyen_id)->first();
        $slug_truyen = $truyen->slug_truyen;
        
        $file = $request->hinhanh;
        if($file){
            $uploads_path ='public/upload/chapter/'.$slug_truyen.'/'.$chapter->slug_chapter.'/'.$chapter->hinhanh;
            foreach (json_decode($chapter->hinhanh) as $image) {
                //tạo biến path chứa đường dẫn của hình ảnh
                $uploads_path =$image;
                //kiểm tra coi có hình ảnh không
                if(file_exists($uploads_path)){
                    // có thì xóa hinh ảnh 
                    unlink($uploads_path);
                }
            }
            $path =$slug_truyen.'/'.$chapter->slug_chapter.'/';
            $hinhanh=array();
            if($files = $request->file('hinhanh')){
                foreach($files as $file){
                    $get_name = $file ->getClientOriginalName();
                    $image_name = current(explode('.',$get_name));
                    $ext = strtolower($file->getClientOriginalExtension());
                    $image_full_name = $image_name.'.'.$ext;
                    $uploads_path_update ='public/upload/chapter/'.$path;
                    $image_url = $uploads_path_update.$image_full_name;
                    $file->move($uploads_path_update,$image_full_name);
                    $hinhanh[] = $image_url;
                    
                    
                }
            }
        }
        $chapter->hinhanh = json_encode($hinhanh);
        // dd( $chapter->hinhanh);
        $chapter->save();
        // return redirect()->back()->with('status','Đã cập nhật chapter thành công');
        return redirect('chapter')->with('status','Đã cập nhật chapter thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        //tìm id của chapter

        $chapter = Chapter::find($id);
        $truyen = Truyen::where('id',$chapter->truyen_id)->first();
        $slug_truyen = $truyen->slug_truyen;
        $slug_chapter = $slug_truyen.'/'.$chapter->slug_chapter;
        //mã hóa dữ liệu bằng json_decode đưa vào vòng lạp
        // foreach (json_decode($chapter->hinhanh) as $image) {
        //     //tạo biến path chứa đường dẫn của hình ảnh
        //     $path ='public/upload/chapter/'.$slug_chapter.'/'.$image;
        //     //kiểm tra coi có hình ảnh không
        //     if(file_exists($path)){
        //         // có thì xóa hinh ảnh 
                
        //         unlink($path);
        //     }
            
        // }
        $check_path = public_path('upload/chapter/'.$slug_chapter);
        
        if(File::exists($check_path)){
            File::deleteDirectory($check_path);
        }
        
        Chapter::find($id)->delete();
        return redirect()->back()->with('status', 'Xóa tap này thành công');

    }



    
    
}
