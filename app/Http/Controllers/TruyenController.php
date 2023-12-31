<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Chapter;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\DanhmucTruyen;
use App\Models\Truyen;
use App\Models\TheLoai;
use App\Models\ThuocDanhMuc;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\fileExists;

class TruyenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $list_truyen = Truyen::with('danhmuctruyen')->orderBy('id','DESC')->paginate(6);
        $catogery= DanhmucTruyen::orderBy('id','DESC')->get();
        $category_list = ThuocDanhMuc::orderBy('id','DESC')->get();
        return view('admincp.truyen.index')->with(compact('list_truyen','catogery','category_list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $danhmuc  = DanhmucTruyen::orderBy('id','DESC')->where('kichhoat',0)->get();
        return view('admincp.truyen.create')->with(compact('danhmuc'));
    }


    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request -> validate(
            [
                'tentruyen' => 'required|unique:truyen|max:255',
                'slug_truyen' => 'required|unique:truyen|max:255',
                'tomtat'  => 'required',
                'hinhanh' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5000',
                'kichhoat' => 'required',
                'tac_gia' => 'nullable',
                'danhmuc' => 'required',
                'tenkhac' => 'nullable'

            ],[
                'tentruyen.required' => 'Tên truyện phải có ',
                'tac_gia.required' => 'Tên tác giả phải có ',
                'tomtat.required' => 'Tóm tắt truyện phải có ',
                'tentruyen.unique' => 'Tên truyện đã có ',
                'slug_truyen.unique' => 'Slug truyện đã có',
                'hinhanh.required' => 'Hình ảnh phải có'
                

            ]

    );
    $truyen = new Truyen();
    $truyen->tentruyen = $data['tentruyen'];
    
    if(empty($data['tac_gia'])){
        $truyen->tac_gia = 'Đang cập nhật';
    }else{
        $truyen->tac_gia =$data['tac_gia'];
    }

    
    $truyen->slug_truyen = $data['slug_truyen'];
    $truyen->tomtat = $data['tomtat'];
    $truyen->kichhoat = $data['kichhoat'];

    foreach($data['danhmuc'] as $key=> $value){
        $truyen->danhmuc_id = $value[0];
    }
    
    
    if(empty($data['tenkhac'])){
        $truyen->tenkhac = 'Đang cập nhật';
    }else{
        $truyen->tenkhac = $data['tenkhac'];
    }
    $truyen->update_at = Carbon::now('Asia/Ho_Chi_Minh');
    $truyen->create_at = Carbon::now('Asia/Ho_Chi_Minh');
    //themanhvaofloder
    $get_image = $request->hinhanh;
    $path ='public/upload/truyen/';
    $get_name_image = $get_image->getClientOriginalName(); //lấy tên file
    $name_image = current(explode('.',$get_name_image));
    $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
    $get_image->move($path,$new_image);
    $truyen->hinhanh = $new_image;
    
    $truyen->save();

    $truyen->thuocdanhmuctruyen()->attach($data['danhmuc']);

    return redirect()->back()->with('status','Thêm truyện thành công');
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
        $truyen = Truyen::find($id);
        $danhmuc  = DanhmucTruyen::orderBy('id','DESC')->get();
        return view('admincp.truyen.edit')->with(compact('truyen','danhmuc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         //
        $data = $request -> validate(
            [
                'tentruyen' => 'required|max:255',
                'slug_truyen' => 'required|max:255',
                'tomtat'  => 'required',
                'hinhanh' => 'image|mimes:jpg,png,jpeg,gif,svg|max:50000|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
                'kichhoat' => 'required',
                'danhmuc' => 'required'

            ],[
                'tentruyen.required' => 'Tên truyện phải có ',
                'tomtat.required' => 'Tóm tắt truyện phải có ',
                'tentruyen.unique' => 'Tên truyện đã có ',
                'slug_truyen.unique' => 'Slug truyện đã có',
                

            ]

    );
    $truyen = Truyen::find($id);
    $truyen->tentruyen = $data['tentruyen'];
    $truyen->slug_truyen = $data['slug_truyen'];
    $truyen->tomtat = $data['tomtat'];
    $truyen->danhmuc_id= $data['danhmuc'];
    $truyen->kichhoat = $data['kichhoat'];
    //themanhvaofloder
    
    foreach($data['danhmuc'] as $key=> $value){
        $truyen->danhmuc_id = $value[0];

    }
    
    $get_image = $request->hinhanh;
    if($get_image = $request->hinhanh){
        $path ='public/upload/truyen/'.$truyen->hinhanh;
        if(file_exists($path)){
            unlink($path);
        }
        $path ='public/upload/truyen/';
        $get_name_image = $get_image->getClientOriginalName(); //lấy tên file
        $name_image = current(explode('.',$get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path,$new_image);
        $truyen->hinhanh = $new_image;
    }else{
        $get_image = $truyen->hinhanh ;
    }
    ThuocDanhMuc::with('truyen')->where('truyen_id',$truyen->id)->delete();
    $truyen->thuocdanhmuctruyen()->attach($data['danhmuc']);
    $truyen->save();
    return redirect('truyen')->with('status','Cập nhật truyện thành công');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $truyen = Truyen::find($id);   
        $path ='public/upload/truyen/'.$truyen->hinhanh;
        // dd($path);
        if(file_exists($path)){
            unlink($path);
        }
        //xóa thứ mục có id truyện
        $check_path =public_path('upload/chapter/'.$truyen->slug_truyen);
        if(File::exists($check_path)){
            
            File::deleteDirectory($check_path);
            
        }

        
       
        
        Chapter::with('truyen')->where('truyen_id',$truyen->id)->delete();
        ThuocDanhMuc::with('truyen')->where('truyen_id',$truyen->id)->delete();
        Truyen::find($id)->delete();
        return redirect()->back()->with('status','Xóa truyện thành công');
    }


    // Tạo chapter ngay tại truyện đó
    public function createchapter($id)
    {
        $id_truyen = Truyen::find($id);
        $truyen = Truyen::orderBy('id','DESC')->get();
        return view('admincp.truyen.create_chapter')->with(compact('truyen','id_truyen'));
        
        
    }

    public function create_chapter(Request $request)
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

    public function view_chapter($id){
        $id_truyen = Truyen::find($id);
        $list_truyen = Truyen::with('danhmuctruyen')->orderBy('id','DESC')->get();
        $list_chapter = Chapter::with('truyen')->orderBy('id','DESC')->get();
        $tentruyen= Truyen::where('id','=',$id)->first();
        return view('admincp.truyen.view_chapter')->with(compact('list_truyen','id_truyen','list_chapter','tentruyen',));
    }
}
