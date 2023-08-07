
                <h3>Truyện hay nên đọc</h3>
                <div class="owl-carousel owl-theme">
                        @foreach($truyen as $key => $value)
                        <div class="shadow-sm card_slider">
                            <div class="image">
                                <img  class="bd-placeholder-img card-img-top" src="{{ asset('public/upload/truyen/'.$value->hinhanh) }}" ></img>
                                </div>
                                <div class="card-bd-slider">
                                    <h4>{{$value->tentruyen}}</h4>
                                        <!-- <p class="card-text">{{$value->tomtat}}</p> -->
                                            <div class="btn-group">
                                                <a href="{{url('xem-truyen/'.$value->slug_truyen)}}" type="button" class="btn btn-sm btn-outline-secondary" >Đọc ngay</a>
                                                <a type="button" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-eye"></i>99999</a>
                                            </div>
                                    </div>
                        </div>
                        @endforeach
                    
                    
                </div>
                