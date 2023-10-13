<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Truyện tranh</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('public/css/reset.css')}}">
        <link rel="stylesheet" href="{{asset('public/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('public/css/card.css')}}">
        <link rel="stylesheet" href="{{asset('public/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/css/owl.theme.default.min.css')}}">
        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        @vite([ 'public/css/card.css','public/css/button.css','public/css/truyen.css'])
    </head>
    <body class="antialiased">
    @include('page.nav')
            <div class="container">
                
            
            
                
                
                    <!---------------- Menu ------------------>
                    
                    <!---------------- END MENU ------------------>

                    
                    <!---------------- Slider ------------------>
                    @yield('slider')
                    <div class="content">
                       
                            <!---------------- END Slider ------------------>
                            
                    @yield('comic_new')
                    @yield('content')
                    
                    </div>
                    <!---------------- Truyện Mới ------------------>
                    
                    <!---------------- Footer ------------------>
                    @include('page.footer')
               

            </div>

                <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <script type="text/javascript" src="{{asset('public/js/slider_owl.js')}}">
                    
                </script>
                <script type="text/javascript" src="{{asset('public/js/select_chapter.js')}}">
                </script>
                <script type="text/javascript" src="{{asset('public/js/main.js')}}">
                </script>
                <script type="text/javascript">
                $(document).ready(function() {
                    const id = $(".bookmark").data("id"); // Get the id from the data attribute
                
                    if(localStorage.getItem('bookmark') != null) {
                        var data_bookmark = localStorage.getItem('bookmark');
                        var bookmarkedIds = JSON.parse(data_bookmark);
                        var isBookmarked = bookmarkedIds.some(obj => obj.id === id);
                        if (isBookmarked) {
                            $('.bookmark_color').css('background-color', '#9e540f').html("<i class='fas fa-bookmark'></i> Bookmarked");
                            
                    }
                    
                }
            
        });    

                 $(document).on('click', '.bookmark', function () {
                        const id = $(".bookmark").data("id");
                        const title =$(".title_comic").val();
                        const url =$(".url_comic").val();
                        const img =$(".card-img-comic").attr('src');
                        const item = {
                            'id':id,
                            'title':title,
                            'url':url,
                            'img':img
                        }
                        console.log(item);
                        if(localStorage.getItem('bookmark') == null) {
                            localStorage.setItem('bookmark', '[]');
                        }

                        var bookmarkedIds = JSON.parse(localStorage.getItem('bookmark'));
                        var matches = $.grep(bookmarkedIds, function (obj) {
                            return obj.id == id;
                        })
                        if(matches.length){
                            bookmarkedIds = bookmarkedIds.filter(obj => obj.id !== id);
                            $('.bookmark_color').css('background-color', '#B17B47').html("<i class='far fa-bookmark'></i> Bookmark");
                        }else{
                            
                            bookmarkedIds.push(item);

                            

                            localStorage.setItem('bookmark',JSON.stringify(bookmarkedIds));
                            $('.bookmark_color').css('background-color', '#9e540f').html("<i class='fas fa-bookmark'></i> Bookmarked");

                            
                        }

                        localStorage.setItem('bookmark',JSON.stringify(bookmarkedIds));
                        
                    });
</script>

                
    </body>
    
</html>
