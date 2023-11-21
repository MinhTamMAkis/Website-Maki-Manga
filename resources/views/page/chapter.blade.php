@extends('../welcome') 
        @section('content')

        <nav aria-label="breadcrumb" style="margin-top: 30px;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{url('danh-muc/'.$slug_truyen->danhmuctruyen->slug_)}}">{{$slug_truyen->danhmuctruyen->tendanhmuc}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{url('xem-truyen/'.$slug_truyen->slug_truyen)}}">{{$slug_truyen->tentruyen}}</a></li>
                </ol>
        </nav>
            <h4 class="text-light">{{$chapter->truyen->tentruyen}}</h4>
            <p class="d-flex justify-content-center">Chương hiện tại : {{$chapter->tieude}}</p>


            <style>
                .isDisable{
                     opacity: 0.6;
                     pointer-events: none;
                    cursor: default;
                }
                .chap-scroll{
                    position: sticky;
                    top: 10px;
                    width: 100%;
                    z-index: 1000;
                }
            </style>

            
                <div>
                    <div class="chap-scroll row d-flex justify-content-center" >
                            <div class="col-3 d-flex flex-row-reverse">
                                    <p><a class="ml-auto btn btn-primary {{$chapter->id==$min_id->id ? 'isDisable' : ''}}" href="{{url('xem-truyen/'.$chapter->truyen->slug_truyen.'/'.$previous_chapter)}}">Tập Trước</a></p>
                                </div>
                            <div class="col-6">
                                <select class="form-select select-chapter" name="select-chapter">
                                    @foreach($allchapter as $key => $chap)
                                        <option value="{{url('xem-truyen/'.$chap->truyen->slug_truyen.'/'.$chap->slug_chapter)}}">{{$chap->tieude}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-3">
                            <p><a class="btn btn-primary {{$chapter->id==$max_id->id ? 'isDisable' : ''}}" href="{{url('xem-truyen/'.$chapter->truyen->slug_truyen.'/'.$next_chapter)}}">Tập Sau</a></p>
                            </div>
                    </div>

                    <!-- Button  -->

                    <!-- Content -->
                    
                        
                        @php
                            $images = json_decode($chapter->hinhanh, true);
                            asort($images, SORT_NUMERIC); 
                            $images = array_reverse($images);
                        @endphp
                        
                        @foreach($images as $image)
                            <div class="noidung d-flex justify-content-center text-center" >
                                <img src="{{ URL::to($image) }}" alt="image" width="100%">
                            </div>
                        @endforeach

                    
                </div>

                
        @endsection
