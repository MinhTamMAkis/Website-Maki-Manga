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
                                    <img  class="card-img-comic" src="{{ asset('public/upload/truyen/'.$truyen->hinhanh) }}" alt="" >
                                </div>
                                
                            </div>
                            <div class="col-md-9 p-0 m-0 col-sm-12 info" >
                                <div class="view_infor">
                                    <img  src="{{ asset('public/upload/truyen/'.$truyen->hinhanh) }}" alt="" >
                                </div>
                                <ul class="infortruyen bg-text">
                                    <input type="hidden" value="{{$truyen->tentruyen}}" class="title_comic">
                                    <input type="hidden" value="{{\URL::current()}}" class="url_comic">
                                    
                                    <li >Name : {{$truyen->tentruyen}}</li>
                                    <li>Author : {{$truyen->tac_gia}}</li>
                                    <li class="category_list">
                                            @foreach($danhmuc as $key => $dm)
                                                @foreach($thuocdanhmuc as $key => $value)
                                                    @if( $dm->id == $value->danhmuc_id)
                                                        <a href="{{url('danh-muc/'.$dm->slug_)}}">{{$dm->tendanhmuc}}</a>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                    </li>
                                    <li>Views: 
                                        @if($truyen->comic_view == "")
                                            0
                                        @else
                                            {{$truyen->comic_view}}
                                        @endif
                                    </li>
                                    <li>Update On: {{\Carbon\Carbon::parse($truyen->update_at)->format('d-m-Y')}}</li>
                                    
                                </ul>
                                
                            </div>
                        </div>
                        
                        <div class="row mt-3">
                        
                            <div class="col-md-5 text-light col-sm-12">
                                <div data-id="{{$truyen->id}}" class="bookmark bookmark_color"><i class="far fa-bookmark" aria-hidden="true"></i> Bookmark</div>
                                <p>{{$truyen->tomtat}}</p>
                            </div>
                            <div class="col-md-7 col-sm-12 ">
                                @if($chapter_dau)
                                        <div class="d-flex gap-2">
                                            <button><a href="{{url('xem-truyen/'.$truyen->slug_truyen.'/'.$chapter_dau->slug_chapter)}}" class="btn-comic ">First Chapter</a></button>                @if($chapter_cuoi)
                                            <button> <a href="{{url('xem-truyen/'.$truyen->slug_truyen.'/'.$chapter_cuoi->slug_chapter)}}" class="btn-comic">New Chapter</a></button></button>
                                            @endif
                                        </div>
                                        @else
                                        <button ><a href="" class="btn btn-primary ">There are no chapters yet</a></button>
                                @endif
                                
                                <h4 class="text-light mt-4">CHAPTERS</h4>
                                @php
                                    $count = count($chapter);
                                @endphp

                                @if($count > 0)
                                    <ul class="muclucchapter" id="desc">
                                    @foreach($chapter as $key => $chap)
                                        <li class="chapter-item" >
                                            <a href="{{url('xem-truyen/'.$truyen->slug_truyen.'/'.$chap->slug_chapter)}}">{{$chap->tieude}}</a>
                                            <p>{{\Carbon\Carbon::parse($chap->create_at)->format('d-m-Y H:i')}}</p>
                                        </li>
                                    
                                    @endforeach
                                    </ul>
                                @else
                                    <span class="text-light">There are currently no chapters</span>
                                @endif
                        
                            </div>
                        </div>
                        <div class="comment">
                        
                            
                        
                        </div>
                    </div>
                </div>
                
            </div>



            @endsection
