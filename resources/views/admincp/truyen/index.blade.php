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
                    
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">IMAGE</th>
                                <th scope="col">NAME</th>
                                <th scope="col">CATEGORY</th>
                                <th scope="col">STATUS</th>
                                <th scope="col" id="create">CREATE</th>
                                <th scope="col" id="update">UPDATE</th>
                                <th scope="col">MANAGE</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                        
                            @foreach($list_truyen as $key => $truyen)
                            <tr>
                                <th scope="row">{{$key}}</th>
                                
                                <td><img src="{{asset('public/upload/truyen/'.$truyen->hinhanh)}}" alt="" height="150" width="150"></td>
                                <td style="max-width: 200px;">{{$truyen->tentruyen}}</td>
                                <td>
                                    @foreach($category_list as $key => $list)
                                        @foreach($catogery as $key => $ct)
                                            @if($list->truyen_id == $truyen->id && $ct->id == $list->danhmuc_id)
                                                    {{$ct->tendanhmuc}}<br>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </td>
                                <td >
                                    @if($truyen->kichhoat==0)
                                        <span class="text text-success">activated</span>
                                    @else
                                        <span class="text text-danger">not activated</span>
                                    @endif
                                </td>
                                <th scope="col" id="create_data"><p>{{$truyen->create_at}}</p></th>
                                <th scope="col" id="update_data"><p>{{$truyen->update_at}}</p></th>
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
                    <div class="d-flex justify-content-center">{{$list_truyen->links()}}</div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
