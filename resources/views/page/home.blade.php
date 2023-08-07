        @extends('../welcome') 
            @section('slider')
                @include('page.slider')
            @endsection
            @section('content')
                <!---------------- Truyện mới ------------------>
                <div class="album py-3 bg-body-tertiary">
                    <div class="container">
                    <h3>Truyện mới</h3>
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4  row-cols-xl-5 g-3">
                            @foreach($truyen as $key => $value)
                                <div class="col ">
                                    <div class="card shadow-sm card_view" >
                                            <div class="image">
                                                <img  class="bd-placeholder-img card-img-top" src="{{ asset('public/upload/truyen/'.$value->hinhanh) }}" >
                                                </img>
                                            </div>
                                            <div class="card-bd">
                                                <h4>{{$value->tentruyen}}</h4>
                                            </div>
                                            <div>
                                                <a href="{{url('xem-truyen/'.$value->slug_truyen)}}" type="button" class="btn btn-sm btn-outline-secondary" >Đọc ngay</a>
                                                    <a type="button" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-eye"></i>99999</a>
                                            </div>
                                            <!-- hover -->
                                    <style>
                                        .col-hover{
                                            display: none;
                                        }
                                        .card_view{
                                            position: relative;
                                        }
                                        .card_view:hover .col-hover{
                                            position: absolute;
                                            display: block;
                                            
                                        }
                                    </style>
                                    <div class="card shadow-sm col-hover" >
                                            <div class="image">
                                                <img  class="bd-placeholder-img card-img-top" src="{{ asset('public/upload/truyen/'.$value->hinhanh) }}" >
                                                </img>
                                            </div>
                                            <div class="card-bd">
                                                <h4>{{$value->tentruyen}}</h4>
                                            </div>
                                            <div>
                                                <a href="{{url('xem-truyen/'.$value->slug_truyen)}}" type="button" class="btn btn-sm btn-outline-secondary" >Đọc ngay</a>
                                                    <a type="button" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-eye"></i>99999</a>
                                            </div>
                                            
                                    </div>
                                    </div>
                                </div>
                               
                            @endforeach
                        </div>
                        <a class="btn btn-success mt-3" href="">Xem tất cả</a>
                    </div>
                </div>

                
            @endsection