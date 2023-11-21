
                @vite([ 'public/css/slider.css'])
                
                <div class="owl-carousel owl-theme ">
                        @foreach($truyen_new as $key => $value)
                        <div class="card_slider">
                            <a href="{{url('xem-truyen/'.$value->slug_truyen)}}">
                                <div class="circle"></div>
                                <div class="circle"></div>
                                <div class="view-silder d-flex">
                                        <div class="" style="width: 100px;">
                                            <img  class="bd-placeholder-img card-img-top" src="{{ asset('public/upload/truyen/'.$value->hinhanh) }}"  ></img>
                                        </div>
                                        <div class="content-slider">
                                            <!--  Đoạn php này dùng để kiểm tra ký tự nếu vượt số ký tự kiểm tra thì sẽ trả về ... từ ký tự thứ 0  --> 
                                            <p>
                                                        @php
                                                            if(strlen($value->tentruyen) <=100){
                                                                echo $value->tentruyen;

                                                            }else{
                                                                echo substr($value->tentruyen,0,100).'...';
                                                            }
                                                        @endphp
                                            </p>

                                            <div class="button-click d-flex gap-1">
                                                <a href="{{url('xem-truyen/'.$value->slug_truyen)}}" type="button" class="btn btn-sm btn-outline-secondary" >Read</a>
                                                <a type="button" class="btn btn-sm btn-outline-secondary">
                                                    @if($value->comic_view=="")
                                                        <i class="fa-solid fa-eye"> </i> no views yet
                                                    @else
                                                        <i class="fa-solid fa-eye"></i>{{$value->comic_view}}
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                        
                </div>
                