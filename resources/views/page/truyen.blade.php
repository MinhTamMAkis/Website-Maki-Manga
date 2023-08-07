@extends('../welcome') 
            @section('content')
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('danh-muc/'.$truyen->danhmuctruyen->slug_)}}">{{$truyen->danhmuctruyen->tendanhmuc}}</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{url('xem-truyen/'.$truyen->slug_truyen)}}">{{$truyen->tentruyen}}</a></li>
            </ol>
            </nav>
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{ asset('public/upload/truyen/'.$truyen->hinhanh) }}" alt="" style="width: 200px;">
                        </div>
                        <div class="col-md-9">
                            <style>
                                .infortruyen{
                                    list-style: none;
                                }
                            </style>
                            <ul class="infortruyen">
                                <li>Name : {{$truyen->tentruyen}}</li>
                                <li>Tác giả : {{$truyen->tac_gia}}</li>
                                <li>Thể loại : <a href="{{url('danh-muc/'.$truyen->danhmuctruyen->slug_)}}">{{$truyen->danhmuctruyen->tendanhmuc}}</a></li>
                                <li>Số chapter : {{$count = count($chapter)}}</li>
                                <li>Số lược xem: 2000</li>
                                <li><a href="#">Xem mục lục</a></li>

                                @if($chapter_dau)
                                
                                <li><a href="{{url('xem-truyen/'.$truyen->slug_truyen.'/'.$chapter_dau->slug_chapter)}}" class="btn btn-primary">Đọc Ngay</a></li>
                                
                                @else
                                <li><a href="" class="btn btn-primary">Chưa có chap nào</a></li>
                            @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <p>{{$truyen->tomtat}}</p><hr>
                        <h4>Mục lục</h4>
                        <ul class="muclucchapter" >
                            @php
                                $count = count($chapter);
                            @endphp

                            @if($count>0)
                                @foreach($chapter as $key => $chap)
                                    <li><a href="{{url('xem-truyen/'.$truyen->slug_truyen.'/'.$chap->slug_chapter)}}">{{$chap->tieude}} </a></li>
                                @endforeach
                            @else
                                <li>Hiện tại chưa có chapter</li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                </div>
            </div>
            <div>
                <h4>Truyện cũng thể loại</h4>
                <div class="row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4  row-cols-xl-5 g-3">
                    @foreach($cungdanhmuc as $key => $value)
                                <div class="col-md-2">
                                    <div class="card shadow-sm" >

                                        
                                            <img  class="bd-placeholder-img card-img-top" src="{{ asset('public/upload/truyen/'.$value->hinhanh) }}" >
                                            </img>
                                            <div class="card-bd">
                                                <h4>{{$value->tentruyen}}</h4>
                                            </div>
                                            <div>
                                                <a href="{{url('xem-truyen/'.$value->slug_truyen)}}" type="button" class="btn btn-sm btn-outline-secondary" >Đọc ngay</a>
                                                    <a type="button" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-eye"></i>99999</a>
                                            </div>
                                            
                                    </div>
                                </div>
                            @endforeach
                </div>
            </div>                   

            @endsection
