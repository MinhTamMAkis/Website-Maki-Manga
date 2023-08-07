<?php

namespace App\Http\Controllers;

use App\Models\TheLoai;
use Illuminate\Http\Request;

class TheLoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $theloai = TheLoai::orderBy('id','DESC')->get(); // 
        return view('admincp.theloai.index')->with(compact('theloai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admincp.theloai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request -> validate(
            [
            'tentheloai' => 'required|unique:theloai|max:255',
            'slug_theloai' => 'required|unique:theloai|max:255',
            'mota' => 'required|max:255',
            'kichhoat' => 'required',
            ],
            [
                'tentheloai.unique' => 'Tên thể loại đã có, vui long điền tên khác',
                'slug_theloai.unique' => 'Slug thể loại đã có, vui long điền tên khác',
                'tentheloai.required' => 'thể loại tên phải có',
                'mota.required' => 'mô tả phải có',
            ]
        );
        $theloai  = new TheLoai();
        $theloai->tentheloai  = $data['tentheloai'];
        $theloai->slug_theloai  = $data['slug_theloai'];
        $theloai->mota = $data['mota'];
        $theloai->kichhoat = $data['kichhoat'];
        $theloai->save();
        return redirect('theloai')->with('status','Đã cập nhật chapter thành công');
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
        $theloai = TheLoai::find($id);
        return view('admincp.theloai.edit')->with(compact('theloai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request -> validate(
            [
            'tentheloai' => 'required|unique:theloai|max:255',
            'slug_theloai' => 'required|unique:theloai|max:255',
            'mota' => 'required|max:255',
            'kichhoat' => 'required',
            ],
            [
                'tentheloai.unique' => 'Tên thể loại đã có, vui long điền tên khác',
                'slug_theloai.unique' => 'Slug thể loại đã có, vui long điền tên khác',
                'tentheloai.required' => 'thể loại tên phải có',
                'mota.required' => 'mô tả phải có',
            ]
        );
        $theloai  = TheLoai::find($id);
        $theloai->tentheloai  = $data['tentheloai'];
        $theloai->slug_theloai  = $data['slug_theloai'];
        $theloai->mota = $data['mota'];
        $theloai->kichhoat = $data['kichhoat'];
        $theloai->save();
        return redirect('theloai')->with('status','Đã cập nhật chapter thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        TheLoai::find($id)->delete();
        return redirect()->back()->with('status','Xoa danh muc thanh cong');
    }
} 
