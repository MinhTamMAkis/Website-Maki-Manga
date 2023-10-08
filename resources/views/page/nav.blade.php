<style>
    
   .navbar {
        top: 0;
        width: 100%;
        z-index: 1000;
        background: #16151D;
    }
    .navbar-collapse.in {
    overflow: hidden;
    max-height: none !important;
    height: auto !important;
}
    .navbar-brand,.nav-link{
        color: #fff;
    }
    

    .navbar-toggler{
        background-color: #7C4519;
    }
    .navbar-nav .nav-link.show ,.nav-link:hover, .nav-link:focus{
        color: #B17B47 !important
    }

    .dropdown-menu{
        
        --bs-dropdown-bg: #16151D !important;
        border-color: #7C4519 !important;
    }
    .dropdown-item{
        color: #fff !important;
    }
    .dropdown-item:hover, .dropdown-item:focus{
        background-color: #7C4519;
        color: #fff;
    }
    .btn-outline-success{
        --bs-btn-color:#7C4519 !important;
        --bs-btn-border-color:  #7C4519 !important;
    }
   
</style>


<nav class="nav navbar navbar-expand-lg ">
                    <div class="container">
                        <a class="navbar-brand" href="#">Maki</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{url('/')}}">HOME <span class="sr-only">(current)</span></a>
                            </li>
                            <!-- Thể Loại -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                GENRE
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach($danhmuc as $key => $dm)
                                        <li><a class="dropdown-item" href="{{url('danh-muc/'.$dm->slug_)}}">{{$dm->tendanhmuc}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            
                            <li class="nav-item">
                                
        <a id="bookmark_btn" type="submit" class="nav-link bookmark_btn" aria-current="page" href="{{url('/book-mark')}}">BOOKMARK</a>


                        
            
                                
                                
                                
                            </li>

                        </ul>

                        <style>
                            form{
                                position: relative;
                            }
                            #sreach_ajax{
                                position: absolute;
                                top: 50px;
                                right: 0;
                            }
                            .search-dropdow {
                                list-style: none;
                                max-height: 500px;
                                width:500px;
                                border-radius: 10px;
                                overflow-x: hidden;
                                overflow-y: scroll;
                            }
                            .search-dropdow::-webkit-scrollbar {
                                display: none;
                            }

                            .item-search {
                                border-radius: 10px;
                                background: #fff;   
                                border-bottom: #B17B47 2px solid;
                                margin-bottom: 5px;
                                
                            }
                            .item-search a{
                                text-decoration: none;
                                color: black;
                            }
                            .content-search{
                                margin-left:10px;
                                width: 100%;

                            }
                            .figure-img{
                                width:100px;
                                height:100px;
                                margin:0;
                                
                            }
                            .figure-img img{
                                border-radius: 5px;
                                width:100%;
                                height:100%;
                            }
                            .the_loai{
                                border-radius: 5px;
                                margin-left:10px;
                                padding:5px;
                                border: black 1px solid;
                            
                            }
                        </style>
                        <form autocomplete="off" class="d-flex" role="search" action="{{url('tim-kiem')}}" method="POST">
                            @csrf
                            <input class="form-control me-2" id="keywords" name="tukhoa" type="search" placeholder="Search" aria-label="Search">
                            <div id="sreach_ajax"></div>
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                        </div>
                    </div>
                </nav>


                
                <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
                <script>
                    $('#keywords').keyup( function(){
                        var keywords = $(this).val();
                        
                        if(keywords != ''){
                            var _token = $('input[name="_token"]').val();

                            $.ajax({
                                url:"{{url('/timkiem-ajax')}}",
                                method:'POST',
                                data:{keywords:keywords,_token:_token},
                                success:function(data){
                                    $('#sreach_ajax').fadeIn();
                                    $('#sreach_ajax').html(data);
                                }
                            });
                        }else{
                            $('#sreach_ajax').fadeOut();
                        }

                    });
                    $(document).click(function(event) {
                        if (!$('#sreach_ajax').is(event.target) && !$('#keywords').is(event.target) && $('#sreach_ajax').has(event.target).length === 0) {
                            $('#sreach_ajax').fadeOut();
                        }
                    });

                    $(document).on('click','.item-search',function(){
                        $('#keywords').val($this.text());
                        $('#sreach_ajax').fadeOut();
                        
                    });

                    



                </script>

