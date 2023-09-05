<style>
    
   .navbar {
        position: sticky;
        top: 0;
        width: 100%;
        z-index: 1000;
        background: rgb(240,240,240);
        background: linear-gradient(360deg, rgba(240,240,240,0.8099614845938375) 0%, rgba(255,255,255,1) 54%);
        
    }
    .navbar-collapse.in {
    overflow: hidden;
    max-height: none !important;
    height: auto !important;
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
                            <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <!-- Danh mục truyện -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Thể loại
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach($danhmuc as $key => $dm)
                                        <li><a class="dropdown-item" href="{{url('danh-muc/'.$dm->slug_)}}">{{$dm->tendanhmuc}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <!-- Thể Loại -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Contact
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                </ul>
                            </li>

                        </ul>

                        <form class="d-flex" role="search" action="{{url('tim-kiem')}}" method="GET">
                            @csrf
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                        </div>
                    </div>
                </nav>


