@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm Chapter</div>
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
                    <form method="POST" action="{{route('chapter.store')}}" enctype='multipart/form-data'>
                        <!-- gán token nếu k gán @csrf thì sẽ page exist 419 -->
                        @csrf 
                        <div class="mb-3">
                            <label for="slug" class="form-label">Tên Chapter</label>
                            <input type="text" class="form-control" value="{{old('tieude')}}" name="tieude" onkeyup="ChangeToSlug();" id="slug" aria-describedby="Tên chapter ....">
                        </div>

                        <div class="mb-3">
                            <label for="convert-slug" class="form-label">Slug chapter</label>
                            <input type="text" class="form-control" value="{{old('slug_chapter')}}" name="slug_chapter" id="convert_slug" aria-describedby="Slug chapter ....">
                        </div>
                        <!-- tóm tắt chapter -->
                        <div class="mb-3">
                            <label for="convert-slug" class="form-label">Tóm tắt chapter</label>
                            <input type="text" class="form-control" value="{{old('tomtat')}}" name="tomtat" id="convert_slug" aria-describedby="">
                        </div>

                        <div class="mb-3">
                            <label for="motadanhmuc" class="form-label">nội dung</label>
                            <textarea class="form-control" name="noidung" value="{{old('noidung')}}" rows="5" style="resize: none;" id="tomtat"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="convert-slug" class="form-label">Hình ảnh</label><br>
                            <input type="file" class="custom-file-input"  name="hinhanh[]" multiple>
                        </div>

                        <div class="mb-3">
                            <label for="kichhot" class="form-label">Thuộc truyện</label>
                            <select name="truyen_id" class="form-select" >
                                @foreach($truyen as $key => $value)
                                    <option value="{{$value->id}}" >
                                    <img src="{{asset('public/upload/truyen/'.$value->hinhanh)}}" alt="" height="150" width="150"></td>
                                        {{$value->tentruyen}}
                                        </div>

                                    </option>
                                @endforeach
                            </select> 
                        </div>

                        

                        <div class="mb-3">
                            <label for="kichhot" class="form-label">Kích hoạt truyện</label>
                            <select class="form-select" name="kichhoat" aria-label="Default select example">
                                <option value="0">Kích hoạt</option>
                                <option value="1">Không kích hoạt</option>
                            </select> 
                        </div>
                        
                        <button type="submit" name="themchapter" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
