@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm thể loại</div>
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
                    <form method="POST" action="{{route('theloai.store')}}">
                        <!-- gán token nếu k gán @csrf thì sẽ page exist 419 -->
                        @csrf 
                        <div class="mb-3">
                            <label for="slug" class="form-label">Tên thể loại</label>
                            <input type="text" class="form-control" value="{{old('tentheloai')}}" name="tentheloai" onkeyup="ChangeToSlug();" id="slug" aria-describedby="Tên thể loại ....">
                        </div>

                        <div class="mb-3">
                            <label for="convert-slug" class="form-label">Slug thể loại</label>
                            <input type="text" class="form-control" value="{{old('slug_theloai')}}" name="slug_theloai" id="convert_slug" aria-describedby="Tên thể loại ....">
                        </div>

                        <div class="mb-3">
                            <label for="mota" class="form-label">Mô tả thể loại</label>
                            <input type="text" class="form-control" value="{{old('mota')}}" name="mota" id="mota" aria-describedby="Mô tả  thể loại ....">
                        </div>
                        <div class="mb-3">
                            <label for="kichhot" class="form-label">Kích hoạt thể loại</label>
                            <select class="form-select" name="kichhoat" aria-label="Default select example">
                                <option value="0">Kích hoạt</option>
                                <option value="1">Không kích hoạt</option>
                            </select> 
                        </div>
                        
                        <button type="submit" name="themtheloai" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
