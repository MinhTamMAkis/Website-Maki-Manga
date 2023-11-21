<?php

namespace App\Http\Controllers;

use App\Models\DanhmucTruyen;
use App\Models\Truyen;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin');
    }

    public function search(Request $request){
        $data = $request->all();
        $truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->get();
        $danhmuc= DanhmucTruyen::orderBy('id','DESC')->get();
        $tukhoa = $data['tukhoa'];
        $truyen_tk = Truyen::with('danhmuctruyen')->where('tentruyen','LIKE','%'.$tukhoa.'%')->get();
        return view('admincp.truyen.search')->with(compact('danhmuc','truyen','tukhoa','truyen_tk'));
    }
    

    
}

