@extends('../welcome') 
            <!-- @section('slider')
                @include('page.slider')
            @endsection -->
            @section('content')
                <!---------------- Truyện mới ------------------>
                <div class="album py-3 bg-body-tertiary">
                    <div class="container">
                        
                    @php
                        $count =count($truyen);
                    @endphp
                    @if($count==0)
                        <p>Truyện đang cập nhật .....</p>
                    @else
                        <p>Thể loại : {{$tendanhmuc}}</p>
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4  row-cols-xl-5 g-3">
                            @foreach($truyen as $key => $value)
                            <div class="col">
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
                                            
                                    </div>
                                </div>
                            @endforeach
                    @endif
                        </div>
                        <a class="btn btn-success mt-3" href="">Xem tất cả</a>
                    </div>
                </div>

            
            @endsection