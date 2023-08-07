@extends('../welcome') 
        @section('content')
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{url('danh-muc/'.$slug_truyen->danhmuctruyen->slug_)}}">{{$slug_truyen->danhmuctruyen->tendanhmuc}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="">{{$slug_truyen->tentruyen}}</a></li>
                </ol>
        </nav>
            <h4>{{$chapter->truyen->tentruyen}}</h4>
            <p>Chương hiện tại : {{$chapter->tieude}}</p>


            <style>
                .isDisable{
                    display: none;
                }

            </style>

            <!-- Menu truyện -->
            <div class="chap row" >
                <div class="col-md-4">
                    <select class="form-select select-chapter" name="select-chapter">
                        @foreach($allchapter as $key => $chap)
                            <option value="{{url('xem-truyen/'.$chap->truyen->slug_truyen.'/'.$chap->slug_chapter)}}">{{$chap->tieude}} </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-8"></div>
            </div>

            <!-- Button  -->
            <div class="row">
                <div class="col-md-3">
                    <p><a class="btn btn-primary {{$chapter->id==$min_id->id ? 'isDisable' : ''}}" href="{{url('xem-truyen/'.$chapter->truyen->slug_truyen.'/'.$previous_chapter)}}">Tập Trước</a></p>
                </div>
                <div class="col-md-3">
                <p><a class="btn btn-primary {{$chapter->id==$max_id->id ? 'isDisable' : ''}}" href="{{url('xem-truyen/'.$chapter->truyen->slug_truyen.'/'.$next_chapter)}}">Tập Sau</a></p>
                </div>
                <div class="col-md-6"></div>
            </div>

            <!-- Content -->
            <div class="d-flex justify-content-center text-center">
                <div class="noidung mt-3" >
                @php
                    $images = json_decode($chapter->hinhanh, true);
                    asort($images); // Sort the images array alphabetically by their filenames
                @endphp

                @foreach($images as $image)
                    <img src="{{ URL::to($image) }}" alt="" width="70%">
                @endforeach

                </div>
            </div>
            <!-- Menu truyện -->
            <div class="chap row" >
                <div class="col-md-4">
                    <select class="form-select select-chapter" name="select-chapter">
                        @foreach($allchapter as $key => $chap)
                            <option value="{{url('xem-truyen/'.$chap->truyen->slug_truyen.'/'.$chap->slug_chapter)}}">{{$chap->tieude}} </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-8"></div>
            </div>
        @endsection
