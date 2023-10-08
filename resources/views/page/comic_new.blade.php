
            @vite([ 'public/css/card.css'])
                <!---------------- Truyện mới ------------------>
                <div class="album py-3 ">
                    <div class="container">
                    <h3 class="text-light">Latest Update</h3>
                    
                        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-4 row-cols-lg-6  row-cols-xl-6 repon_new">
                            @foreach($truyen_new as $key => $value) 
                                <div class="col " >
                                        <div class="card-comic" id="data-container" title="{{$value->tentruyen}}"><a href="{{url('xem-truyen/'.$value->slug_truyen)}}">
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
                                                            <p class="text-light">Chưa có chapter</p>       
                                                    
                                                    @endif
                                                @endforeach
                                                </div>
                                                
                                            </div>
                                            
                                        </div>
                                    </a>   
                                </div>
                            @endforeach
                        </div>
                    </div>
                    </div>
                </div>
                <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
                

                
               