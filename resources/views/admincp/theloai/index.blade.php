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
                            @foreach($theloai as $key => $tl)
                            <tr>
                                <th scope="row">{{$key}}</th>
                                <td>{{$tl->tentheloai}}</td>
                                <td>{{$tl->slug_theloai}}</td>
                                <td>{{$tl->mota}}</td>
                                <td>
                                    @if($tl->kichhoat==0)
                                        <span class="text text-success">kich hoat</span>
                                    @else
                                        <span class="text text-danger">Khong kich hoat</span>
                                    @endif
                                </td>
                                <td class="d-flex gap-1">
                                    <a href="{{route('theloai.edit',[$tl->id])}}" class="btn btn-primary">Edit</a>

                                    <form action="{{route('theloai.destroy',[$tl->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Bạn chắc chắn muốn xóa thể loại này ?')" class="btn btn-danger">Delete</button>
                                    </form>
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
