@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm Truyện</div>
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
                    <form method="POST" action="{{route('truyen.store')}}" enctype='multipart/form-data'>
                        <!-- gán token nếu k gán @csrf thì sẽ page exist 419 -->
                        @csrf 
                        <div class="mb-3">
                            <label for="slug" class="form-label">Tên Truyện</label>
                            <input type="text" class="form-control" value="{{old('tentruyen')}}" name="tentruyen" onkeyup="ChangeToSlug();" id="slug" aria-describedby="Tên truyện ....">
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label">Tên Khac</label>
                            <input type="text" class="form-control" value="{{old('tenkhac')}}" name="tenkhac"  id="tenkhac" aria-describedby="Tên khác ....">
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Tác giả</label>
                            <input type="text" class="form-control" value="{{old('tac_gia')}}" name="tac_gia" onkeyup="ChangeToSlug();" id="slug" aria-describedby="Tác giả....">
                        </div>

                        <div class="mb-3">
                            <label for="convert-slug" class="form-label">Slug Truyện</label>
                            <input type="text" class="form-control" value="{{old('slug_truyen')}}" name="slug_truyen" id="convert_slug" aria-describedby="Slug truyện ....">
                        </div>

                        <div class="mb-3">
                            <label for="motadanhmuc" class="form-label">Tóm tắt truyện</label>
                            <textarea class="form-control" name="tomtat" value="{{old('tomtat')}}" rows="5" style="resize: none;" id="tomtat"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="kichhot" class="form-label">Danh mục truyện</label>
                                @foreach($danhmuc as $key => $muc)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="danhmuc_{{$muc->id}}" value="{{$muc->id}}" name="danhmuc[]">
                                    <label class="form-check-label" for="danhmuc_{{$muc->id}}">{{$muc->tendanhmuc}}</label>
                                </div>
                                @endforeach
                        </div>

                        <div class="mb-3">
                            <label for="convert-slug" class="form-label">Hình ảnh</label><br>
                            <input type="file" class="form-control-file"  name="hinhanh">
                        </div>

                        <div class="mb-3">
                            <label for="kichhot" class="form-label">Kích hoạt truyện</label>
                            <select class="form-select" name="kichhoat" aria-label="Default select example">
                                <option value="0">Kích hoạt</option>
                                <option value="1">Không kích hoạt</option>
                            </select> 
                        </div>
                        
                        <button type="submit" name="themtruyen" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
