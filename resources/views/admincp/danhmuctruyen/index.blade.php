@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Danh sách danh mục</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NAME</th>
                                <th scope="col">SLUG</th>
                                <th scope="col">NOTE</th>
                                <th scope="col">STATUS</th>
                                <th scope="col">MANAGE</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach($danhmuctruyen as $key => $danhmuc)
                            <tr>
                                <th scope="row">{{$key}}</th>
                                <td class="col-2">{{$danhmuc->tendanhmuc}}</td>
                                <td>{{$danhmuc->slug_}}</td>
                                <td>{{$danhmuc->mota}}</td>
                                <td class="col-2">
                                    @if($danhmuc->kichhoat==0)
                                        <span class="text text-success">kich hoat</span>
                                    @else
                                        <span class="text text-danger">Khong kich hoat</span>
                                    @endif
                                </td>
                                <td >
                                    <div class="d-flex gap-1">
                                    <a href="{{route('danhmuc.edit',[$danhmuc->id])}}" class="btn btn-primary">edit</a>
                                        <form action="{{route('danhmuc.destroy',[$danhmuc->id])}}" method="POST" >
                                            @method('DELETE')
                                            @csrf                      
                                            <button onclick="return confirm('Are you sure you want to delete this Genre?')" class="btn btn-danger" title="Delete Genre Confirmation">delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
