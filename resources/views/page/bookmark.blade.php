@extends('../welcome') 
            
            @section('content')
            @vite([ 'public/css/card.css' ,'public/css/pagination.css'])

            
                <!---------------- Truyện mới ------------------>
                <div class="album py-3 ">
                    <div class="container">
                    
                    <h3 class="text-light">BOOKMARK</h3>
                    
                    <div class="row row-cols-2 row-cols-sm-2 row-cols-md-4 row-cols-lg-6  row-cols-xl-6 "id="bookmarked" >
                           
                            
                        </div>
                    </div>
                </div>
        <script>
            $(document).ready(function() {
                    const id = $(".bookmark").data("id"); // Get the id from the data attribute
                
                    if(localStorage.getItem('bookmark') != null) {
                        var data_bookmark = localStorage.getItem('bookmark');
                        var bookmarkedIds = JSON.parse(data_bookmark);
                        bookmarkedIds.forEach(function(bookmark) {
                            var id = bookmark.id;
                            var img = bookmark.img;
                            var title = bookmark.title;
                            var url = bookmark.url;
                            $('#bookmarked').append(`
                            <div class="col">
                           
                                <div class="card-comic" id="data-container"> <a href="`+url+`">
                                            <div class="blob"></div>
                                                <div class="image">
                                                    <figure><img src="`+img+`" alt="`+title+`"></figure>
                                                </div>
                                                <div class="bg-name">
                                                    <div class="Name">
                                                        <p>`+title+`</p>
                                                    </div>
                                                </div>
                                                
                                                
                                        </div>
                                        </a>
                                    </div>
                                    
                                </div>`
                                );
                        });
                    
                }
            
        });   
            
        </script>

            @endsection
            
