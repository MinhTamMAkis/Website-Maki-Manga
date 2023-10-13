@extends('../welcome') 
            @section('slider')
                @include('page.slider')
            @endsection
            @section('content')
                <!---------------- Truyện mới ------------------>
                <div class="album py-3">
                    <div class="container">
                        
                    @php
                        $count =count($truyen);
                    @endphp
                    @if($count==0)
                        <p>Truyện đang cập nhật .....</p>
                    @else
                        <p class="text-light">Thể loại : {{$tendanhmuc}}</p>
                        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-4 row-cols-lg-6  row-cols-xl-6">
                            @foreach($thuocdanhmuc as $key => $tdm)
                                @foreach($truyen as $key => $value)
                                    @if($tdm->truyen_id == $value->id)
                        
                                        <div class="col">
                                            <div class="card-comic" title="{{$value->tentruyen}}"><a href="{{url('xem-truyen/'.$value->slug_truyen)}}">
                                                    <div class="blob"></div>
                                                        <div class="image">
                                                            <figure><img src="{{ asset('public/upload/truyen/'.$value->hinhanh) }}" alt=""></figure>
                                                        </div>
                                                        <div class="bg-name">
                                                            <div class="Name">
                                                                <p >
                                                                <!-- Đoạn php này dùng để kiểm tra ký tự nếu vượt số ký tự kiểm tra thì sẽ trả về ... từ ký tự thứ 0  -->
                                                                <!-- @php
                                                                    if(strlen($value->tentruyen) <=20){
                                                                        echo $value->tentruyen;

                                                                    }else{
                                                                        echo substr($value->tentruyen,0,20).'...';
                                                                    }
                                                                @endphp -->
                                                                {{$value->tentruyen}}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="chapter">
                                                            <div class="show-chapter">
                                                            @php
                                                                $chapterCount = 0;
                                                            @endphp
                                                            @foreach($chapter as $key => $chap)
                                                                @if($value->id == $chap->truyen_id && $chapterCount < 2)
                                                                    @php
                                                                        $chapterCount++; 
                                                                    @endphp
                                                                        <p><a href="{{url('xem-truyen/'.$value->slug_truyen.'/'.$chap->slug_chapter)}}">✿ {{$chap->tieude}}</a></p>       
                                                                
                                                                @endif
                                                            @endforeach

                                                            @foreach($chapter as $key => $chap)
                                                                @if($value->id != $chap->truyen_id && $chapterCount == 0)
                                                                    @php
                                                                        $chapterCount++; 
                                                                    @endphp
                                                                        <p>Chưa có chapter</p>       
                                                                
                                                                @endif
                                                            @endforeach
                                                            </div>
                                                            
                                                        </div>
                                                </a>   
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach
                    @endif
                    
                        </div>
                        @if($count > 12){
                            <div class="d-flex justify-content-center">{{$truyen->links()}}</div>
                        }
                        @endif
                    </div>
                </div>

            
            @endsection