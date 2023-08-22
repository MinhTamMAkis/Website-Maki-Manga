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
        <link rel="stylesheet" href="{{asset('public/css/card.css')}}">
        <link rel="stylesheet" href="{{asset('public/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/css/owl.theme.default.min.css')}}">
        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    </head>
    <body class="antialiased">
        
        
            <div class="container">
                <!---------------- Menu ------------------>
                @include('page.nav')
                <!---------------- END MENU ------------------>
                <!---------------- Slider ------------------>
                @yield('slider')
                <!---------------- Truyện Mới ------------------>
                @yield('content')
                <!---------------- Footer ------------------>
                @include('page.footer');
            </div>



                <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <script type="text/javascript">
                    $('.owl-carousel').owlCarousel({
                        loop:true,
                        dots: false,
                        nav: false,
                        margin:50,
                        stagePadding: 20,
                        nav:true,
                        autoplay:false,
                        autoplayTimeout:1000,
                        autoplayHoverPause:false,
                        responsive:{
                            0:{
                                items:1
                            },
                            600:{
                                items:2
                            },
                            1000:{
                                items:3
                            },
                            1025:{
                                items:4
                            }
                        }
                    })
                </script>
            <script type="text/javascript">
                    $('.select-chapter').on('change',function(){
                        var url = $(this).val();

                        if(url){
                            window.location = url;
                            
                        }
                        return false;
                    });
                    
                    current_chapter();

                    function current_chapter() {
                        var url = window.location; 
                        $('.select-chapter').find('option[value="' + url + '"]').attr("selected", true);
                    }

                </script>
    </body>
    
</html>
