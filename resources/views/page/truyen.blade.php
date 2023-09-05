@extends('../welcome') 
            @section('content')
            @vite(['public/css/truyen.css'])
            <div class="bread_cumb">
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{url('danh-muc/'.$truyen->danhmuctruyen->slug_)}}">{{$truyen->danhmuctruyen->tendanhmuc}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{url('xem-truyen/'.$truyen->slug_truyen)}}">{{$truyen->tentruyen}}</a></li>
                </ol>
                </nav>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="bg">
                        <div class="row">
                            <div class="col-md-3 col-sm-12 ">
                                <div class="images">
                                    <img  src="{{ asset('public/upload/truyen/'.$truyen->hinhanh) }}" alt="" >
                                </div>
                                
                            </div>
                            <div class="col-md-9 p-0 m-0 col-sm-12 info" >
                                <style>
                                    .view_infor{
                                        background-image: url("{{ asset('public/upload/truyen/'.$truyen->hinhanh) }}"); 
                                    }

                                </style>
                                <ul class="infortruyen bg-text">
                                    <li>Name : {{$truyen->tentruyen}}</li>
                                    <li>Tác giả : {{$truyen->tac_gia}}</li>
                                    <li>Thể loại : <a href="{{url('danh-muc/'.$truyen->danhmuctruyen->slug_)}}">{{$truyen->danhmuctruyen->tendanhmuc}}</a></li>
                                    <li>Số chapter : {{$count = count($chapter)}}</li>
                                    <li>Số lược xem: 2000</li>

                                    @if($chapter_dau)
                                    
                                    <li><a href="{{url('xem-truyen/'.$truyen->slug_truyen.'/'.$chapter_dau->slug_chapter)}}" class="btn btn-primary mt-3">Chapter đầu tiên</a></li>
                                    
                                    @else
                                    <li ><a href="" class="btn btn-primary mt-3">Chưa có chap nào</a></li>
                                @endif
                                </ul>
                                <div class="view_infor"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <p class="content-truyen">{{$truyen->tomtat}}</p><hr>
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
                
            </div>

            @endsection
