@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm danh mục</div>
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
                    <form method="POST" action="{{route('danhmuc.store')}}">
                        <!-- gán token nếu k gán @csrf thì sẽ page exist 419 -->
                        @csrf 
                        <div class="mb-3">
                            <label for="slug" class="form-label">Tên danh mục</label>
                            <input type="text" class="form-control" value="{{old('tendanhmuc')}}" name="tendanhmuc" onkeyup="ChangeToSlug();" id="slug" aria-describedby="Tên danh mục ....">
                        </div>

                        <div class="mb-3">
                            <label for="convert-slug" class="form-label">Slug danh mục</label>
                            <input type="text" class="form-control" value="{{old('slug_')}}" name="slug_" id="convert_slug" aria-describedby="Tên danh mục ....">
                        </div>

                        <div class="mb-3">
                            <label for="motadanhmuc" class="form-label">Mô tả danh mục</label>
                            <input type="text" class="form-control" value="{{old('motadanhmuc')}}" name="motadanhmuc" id="motadanhmuc" aria-describedby="Mô tả danh mục ....">
                        </div>
                        <div class="mb-3">
                            <label for="kichhot" class="form-label">Kích hoạt danh mục</label>
                            <select class="form-select" name="kichhoat" aria-label="Default select example">
                                <option value="0">Kích hoạt</option>
                                <option value="1">Không kích hoạt</option>
                            </select> 
                        </div>
                        
                        <button type="submit" name="themdanhmuc" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
