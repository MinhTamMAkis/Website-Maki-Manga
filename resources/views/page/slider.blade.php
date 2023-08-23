
                @vite([ 'public/css/slider.css'])
                
                <div class="owl-carousel owl-theme ">
                        @foreach($truyen as $key => $value)
                        <div class="card_slider">
                            <div class="circle"></div>
                            <div class="circle"></div>
                            <div class="view-silder d-flex">
                                    <img  class="bd-placeholder-img card-img-top" src="{{ asset('public/upload/truyen/'.$value->hinhanh) }}" ></img>

                                    <div class="content-slider">
                                        <p>{{$value->tentruyen}}</p>

                                        <div class="button-click d-flex gap-2">
                                            <a href="{{url('xem-truyen/'.$value->slug_truyen)}}" type="button" class="btn btn-sm btn-outline-secondary" >Đọc ngay</a>
                                            <a type="button" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-eye"></i>99999</a>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        @endforeach
                        
                </div>
                