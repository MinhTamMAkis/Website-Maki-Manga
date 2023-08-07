<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhmucTruyen;
class DanhmucController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $danhmuctruyen = DanhmucTruyen::orderBy('id','DESC')->get(); // sap xep danh muc theo id tu thap den cao (DESC) tu cao den thap(ASC)
        return view('admincp.danhmuctruyen.index')->with(compact('danhmuctruyen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admincp.danhmuctruyen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 
        $data = $request -> validate(
            [
            'tendanhmuc' => 'required|unique:danhmuc|max:255',
            'slug_' => 'required|unique:danhmuc|max:255',
            'motadanhmuc' => 'required|max:255',
            'kichhoat' => 'required',
            ],
            [
                'tendanhmuc.unique' => 'Tên danh mục đã có, vui long điền tên khác',
                'slug_.unique' => 'Slug danh mục đã có, vui long điền tên khác',
                'tendanhmuc.required' => 'DANH MUC NAME PHAI CO',
                'motadanhmuc.required' => 'MO TA DANH MUC PHAI CO',
            ]
    );
    $danhmuctruyen  = new DanhmucTruyen();
    $danhmuctruyen->tendanhmuc  = $data['tendanhmuc'];
    $danhmuctruyen->slug_  = $data['slug_'];
    $danhmuctruyen->mota = $data['motadanhmuc'];
    $danhmuctruyen->kichhoat = $data['kichhoat'];
    $danhmuctruyen->save();
    return redirect()->back()->with('status','Them danh muc thanh cong');
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
        $danhmuc = DanhmucTruyen::find($id);
        return view('admincp.danhmuctruyen.edit')->with(compact('danhmuc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // 
        $data = $request -> validate(
            [
            'tendanhmuc' => 'required|max:255',
            'slug_' => 'required|max:255',
            'motadanhmuc' => 'required|max:255',
            'kichhoat' => 'required',
            ],
            [
                'slug_.required' => 'DANH MUC SLUG PHAI CO',
                'tendanhmuc.required' => 'DANH MUC NAME PHAI CO',
                'motadanhmuc.required' => 'MO TA DANH MUC PHAI CO',
            ]
    );
    $danhmuctruyen  =  DanhmucTruyen::find($id);
    $danhmuctruyen->tendanhmuc  = $data['tendanhmuc'];
    $danhmuctruyen->slug_  = $data['slug_'];
    $danhmuctruyen->mota = $data['motadanhmuc'];
    $danhmuctruyen->kichhoat = $data['kichhoat'];
    $danhmuctruyen->save();
    return redirect()->back()->with('status','Them danh muc thanh cong');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DanhmucTruyen::find($id)->delete();
        return redirect()->back()->with('status','Xoa danh muc thanh cong');
    }
}
