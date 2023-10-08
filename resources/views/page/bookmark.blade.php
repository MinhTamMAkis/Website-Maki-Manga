@extends('../welcome') 
           
            
            @section('content')
            @vite([ 'public/css/card.css' ,'public/css/pagination.css'])
           

               

            </script>
           
                <!---------------- Truyện mới ------------------>
                <div class="album py-3 ">
                    <div class="container">
                    <?php
                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                $dataFromJS = $_POST['data'];

                                // Do something with $dataFromJS, like storing it in a database or processing it
                                echo 'Received data from JavaScript: ' . $dataFromJS;

                            }
                            
                    ?>
                    <h3 class="text-light">BOOKMARK</h3>
                    
                    <div class="row row-cols-2 row-cols-sm-2 row-cols-md-4 row-cols-lg-6  row-cols-xl-6 ">
                                                        
                            @foreach($truyen as $key => $value)
                                <div class="comic_item" data-comic-id="{{$value->id}}">
                                    <div class="col">
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
                                </div>
                            @endforeach
                        </div>
                        </div>
                        </div>
                            <div class="d-flex justify-content-center"></div>
                        </div>
                        
                        </div>
                </div>
                <script>
        // Read data from local storage
            var dataFromLocalStorage = localStorage.getItem('bookmark');
            console.log(dataFromLocalStorage)
            var baseUrl = 'http://localhost:3000/laravel_truyentranh/book-mark';
            // Send the data to a PHP script using AJAX
            var xhr = new XMLHttpRequest();
            xhr.open('POST', baseUrl, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Handle the response from PHP if needed
                    console.log(xhr.responseText);
                }
            };
            xhr.send('data=' + encodeURIComponent(dataFromLocalStorage));
    </script>
                <!-- <script>
                    $(document).ready(function() {
                    // Get all elements with the class 'comic_item'
                        var comicItems = document.querySelectorAll('.comic_item');
                        var data = $('[data-comic-id]');
                        // Create an empty array to store the data-comic-id values
                        

                        // Loop through each comic item and retrieve its data-comic-id attribute
                        // comicItems.forEach(function(comicItem) {
                        //     var comicId = comicItem.getAttribute('data-comic-id');
                            
                        //     // Push the comicId to the comicIds array
                        //     comicIds.push(comicId);
                        // })

                
                    if(localStorage.getItem('bookmark') != null) {
                        var data_bookmark = localStorage.getItem('bookmark');
                        var bookmarkedIds = JSON.parse(data_bookmark);
                        var comicIds = [];
                        bookmarkedIds.forEach(function(bookmarkedIds) {
                        if (bookmarkedIds.includes(bookmarkedIds)) {
                            comicIds.push(bookmarkedIds);
                        }else{
                        }
                        
                    });
                    console.log(comicIds)
                                
                            }
            
        });    
                </script> -->
            @endsection
            
    