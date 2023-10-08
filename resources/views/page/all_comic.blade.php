@extends('../welcome') 
            @section('slider')
                @include('page.slider')
            @endsection
            
            @section('content')
            @vite([ 'public/css/card.css' ,'public/css/pagination.css'])

                <!---------------- Truyện mới ------------------>
                <div class="album py-3 ">
                    <div class="container">
                    <h3>Truyện</h3>
                    
                    <div class="row row-cols-2 row-cols-sm-2 row-cols-md-4 row-cols-lg-6  row-cols-xl-6 ">
                            @foreach($truyen as $key => $value)
                                <div class="col ">
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
                                            
                                        </div>
                                    </a>   
                                </div>
                            @endforeach
                        </div>
                            <div class="d-flex justify-content-center">{{$truyen->links()}}</div>
                        </div>
                        
                    </div>
                </div>
            
                
            @endsection