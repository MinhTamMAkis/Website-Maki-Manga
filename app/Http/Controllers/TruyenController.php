<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\DanhmucTruyen;
use App\Models\Truyen;
use App\Models\TheLoai;

use function PHPUnit\Framework\fileExists;

class TruyenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $list_truyen = Truyen::with('danhmuctruyen')->orderBy('id','DESC')->get();
        return view('admincp.truyen.index')->with(compact('list_truyen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $danhmuc  = DanhmucTruyen::orderBy('id','DESC')->get();
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
                'tac_gia' => 'required',
                'danhmuc' => 'required'

            ],[
                'tentruyen.required' => 'Tên truyện phải có ',
                'tac_gia.required' => 'TêTác giả phải có ',
                'tomtat.required' => 'Tóm tắt truyện phải có ',
                'tentruyen.unique' => 'Tên truyện đã có ',
                'slug_truyen.unique' => 'Slug truyện đã có',
                'hinhanh.required' => 'Hình ảnh phải có'
                

            ]

    );
    $truyen = new Truyen();
    $truyen->tentruyen = $data['tentruyen'];
    $truyen->tac_gia =$data['tac_gia'];
    $truyen->slug_truyen = $data['slug_truyen'];
    $truyen->tomtat = $data['tomtat'];
    $truyen->danhmuc_id= $data['danhmuc'];
    $truyen->kichhoat = $data['kichhoat'];

    //themanhvaofloder
    $get_image = $request->hinhanh;
    $path ='public/upload/truyen/';
    $get_name_image = $get_image->getClientOriginalName(); //lấy tên file
    $name_image = current(explode('.',$get_name_image));
    $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
    $get_image->move($path,$new_image);
    $truyen->hinhanh = $new_image;

    $truyen->save();
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
                'hinhanh' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:50000|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
                'kichhoat' => 'required',
                'danhmuc' => 'required'

            ],[
                'tentruyen.required' => 'Tên truyện phải có ',
                'tomtat.required' => 'Tóm tắt truyện phải có ',
                'tentruyen.unique' => 'Tên truyện đã có ',
                'slug_truyen.unique' => 'Slug truyện đã có',
                'hinhanh.required' => 'Hình ảnh phải có'
                

            ]

    );
    $truyen = Truyen::find($id);
    $truyen->tentruyen = $data['tentruyen'];
    $truyen->slug_truyen = $data['slug_truyen'];
    $truyen->tomtat = $data['tomtat'];
    $truyen->danhmuc_id= $data['danhmuc'];
    $truyen->kichhoat = $data['kichhoat'];

    //themanhvaofloder
    $get_image = $request->hinhanh;
    if($get_image){
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
    }


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
        $check_path =public_path('upload/chapter/'.$truyen->id);
        if(File::exists($check_path)){
            File::deleteDirectory($check_path);
        }

        Truyen::find($id)->delete();
        return redirect()->back()->with('status','Xóa truyện thành công');
    }
}