@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập nhật Truyện</div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{route('truyen.update',[$truyen->id])}}" enctype='multipart/form-data'>
                        <!-- gán token nếu k gán @csrf thì sẽ page exist 419 -->
                        @method('PUT')
                        @csrf 
                        <div class="mb-3">
                            <label for="slug" class="form-label">Tên Truyện</label>
                            <input type="text" class="form-control" value="{{$truyen->tentruyen}}" name="tentruyen" onkeyup="ChangeToSlug();" id="slug" aria-describedby="Tên truyện ....">
                        </div>

                        <div class="mb-3">
                            <label for="convert-slug" class="form-label">Slug Truyện</label>
                            <input type="text" class="form-control" value="{{$truyen->slug_truyen}}" name="slug_truyen" id="convert_slug" aria-describedby="Slug truyện ....">
                        </div>

                        <div class="mb-3">
                            <label for="motadanhmuc" class="form-label">Tóm tắt truyện</label>
                            <textarea class="form-control" name="tomtat"  rows="5" style="resize: none;" id="tomtat">{{$truyen->tomtat}}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="kichhot" class="form-label">Danh mục truyện</label>
                            <select name="danhmuc" class="form-select" >
                                @foreach($danhmuc as $key => $muc)
                                    <option {{$muc->id==$truyen->danhmuc_id ? 'selected' : ''}} value="{{$muc->id}}">{{$muc->tendanhmuc}}</option>
                                @endforeach
                            </select> 
                        </div>

                        <div class="mb-3">
                            <label for="convert-slug" class="form-label">Hình ảnh</label><br>
                            <input type="file" class="form-control-file"  name="hinhanh"><br>
                            <img src="{{asset('public/upload/truyen/'.$truyen->hinhanh)}}" alt="" height="150" width="150">
                        </div>

                        <div class="mb-3">
                            <label for="kichhot" class="form-label">Kích hoạt truyện</label>
                            <select class="form-select" name="kichhoat" aria-label="Default select example">
                            @if($truyen->kichhoat==0)
                                <option selected value="0">Kích hoạt</option>
                                <option value="1">Không kích hoạt</option>
                                @else
                                <option  value="0">Kích hoạt</option>
                                <option selected value="1">Không kích hoạt</option>
                                @endif
                            </select> 
                        </div>
                        
                        <button type="submit" name="themtruyen" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
