@extends('layouts.app')
@section('content')

@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Danh sách danh mục</div>

                <div class="card-body">
                <h3>{{$tukhoa}}</h3>
                    @php
                        $count =count($truyen);
                    @endphp
                    @if($count==0)
                        <p>Can not find .....</p>
                    @else
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NAME</th>
                                <th scope="col">IMAGE</th>
                                <th scope="col">SLUG</th>
                                <th scope="col">SUMMARY</th>
                                <th scope="col">CATEGORY</th>
                                <th scope="col">STATUS</th>
                                <th scope="col">UPDATE DAY</th>
                                <th scope="col">MANAGE</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                        
                            @foreach($truyen_tk as $key => $truyen)
                            <tr>
                                <th scope="row">{{$key}}</th>
                                <td>{{$truyen->tentruyen}}</td>
                                <td><img src="{{asset('public/upload/truyen/'.$truyen->hinhanh)}}" alt="" height="150" width="150"></td>
                                <td>{{$truyen->slug_truyen}}</td>
                                <td>{{$truyen->tomtat}}</td>
                                <td>{{$truyen->danhmuctruyen->tendanhmuc}}</td>
                                <td >
                                    @if($truyen->kichhoat==0)
                                        <span class="text text-success">kich hoat</span>
                                    @else
                                        <span class="text text-danger">Khong kich hoat</span>
                                    @endif
                                </td>
                                <th scope="col"><p>{{$truyen->update_at}}</p></th>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="{{route('truyen.edit',[$truyen->id])}}" class="btn btn-primary">Edit</a>
                                        <form action="{{route('truyen.destroy',[$truyen->id])}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button onclick="return confirm('Bạn chắc chắn muốn xóa truyện này ?')" class="btn btn-danger">Delete</button>
                                        </form>
                                        
                                    </div>
                                    <div class="mt-1">
                                    
                                        <a href="{{route('truyen.chapter.create',[$truyen->id])}}" class="btn btn-primary">Add chapter</a> 
                                    
                                    </div>
                                    <div class="mt-1">
                                    
                                        <a href="{{route('truyen.view_chapter',[$truyen->id])}}" class="btn btn-primary">Chapter</a> 
                                    
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
