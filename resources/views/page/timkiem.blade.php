@extends('../welcome') 

            @section('content')
                <!---------------- Truyện mới ------------------>
                <div class="album py-3 bg-body-tertiary">
                    <div class="container">
                    <h3>{{$tukhoa}}</h3>
                    @php
                        $count =count($truyen);
                    @endphp
                    @if($count==0)
                        <p>Không tìm thấy .....</p>
                    @else
                        
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
                            @foreach($truyen_tk as $key => $value)
                                <div class="col">
                                    <div class="card shadow-sm" >

                                        
                                            <img class="bd-placeholder-img card-img-top" src="{{ asset('public/upload/truyen/'.$value->hinhanh) }}" >
                                            </img>
                                            <div class="card-body">
                                                <h4>{{$value->tentruyen}}</h4>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="btn-group">
                                                    <a href="{{url('xem-truyen/'.$value->slug_truyen)}}" type="button" class="btn btn-sm btn-outline-secondary" >Đọc ngay</a>
                                                    <a type="button" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-eye"></i>99999</a>
                                                    </div>
                                                    <small class="text-body-secondary">9 mins</small>
                                                </div>
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