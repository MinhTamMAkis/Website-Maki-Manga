@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Danh sách danh mục</div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                    {{$tentruyen->tentruyen}}
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">tên chapter</th>
                                <th scope="col">SLUG</th>
                                <th scope="col">Tóm tắt</th>
                                <th scope="col">Truyện</th>
                                <th scope="col">kích hoạt</th>
                                <th scope="col">quản lý</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                       
                            @foreach($list_chapter as $key => $chapter)
                                @if($id_truyen->id == $chapter->truyen_id)
                                    <tr>
                                        <th scope="row">{{$key}}</th>
                                        <td>{{$chapter->tieude}}</td>
                                        <td>{{$chapter->slug_chapter}}</td>
                                        <td>{{$chapter->tomtat}}</td>
                                        <td>{{$chapter->truyen->tentruyen}}</td>
                                        <td >
                                            @if($chapter->kichhoat==0)
                                                <span class="text text-success">kich hoat</span>
                                            @else
                                                <span class="text text-danger">Khong kich hoat</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <a href="{{route('chapter.edit',[$chapter->id])}}" class="btn btn-primary">edit</a>
                                                <form action="{{route('chapter.destroy',[$chapter->id])}}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button onclick="return confirm('Bạn chắc chắn muốn xóa tập này ?')" class="btn btn-danger">delete</button>
                                                </form>      
                                            </div>
                                        </td>
                                    </tr>
                                
                                
                                @endif
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
