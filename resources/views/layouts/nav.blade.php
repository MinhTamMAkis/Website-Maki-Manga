<div class="container">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{route('admin')}}">Home</a>
                                </li>
                                <!-- Thể loại -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Genre
                                </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="{{route('danhmuc.create')}}">Add Genre </a></li>
                                        <li><a class="dropdown-item" href="{{route('danhmuc.index')}}">List Genre</a></li>
                                        <li class="bg-primary"><hr class="dropdown-divider"></li>
                                        
                                    </ul>
                                </li>
                                
                                <!-- Truyện -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Manga/Manhwa
                                </a>
                                    <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="{{route('truyen.create')}}">Add Manga/Manhwa</a></li>
                                        <li><a class="dropdown-item" href="{{route('truyen.index')}}">List Manga/Manhwa</a></li>
                                        <li class="bg-primary"><hr class="dropdown-divider"></li>
                                    </ul>
                                </li>
                                <!-- CHAPTER -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Chapter 
                                </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="{{route('chapter.create')}}">Add chapter </a></li>
                                        <li><a class="dropdown-item" href="{{route('chapter.index')}}">List chapter</a></li>
                                        <li class="bg-primary"><hr class="dropdown-divider"></li>
                                    </ul>
                                </li>
                                
                            </ul>
                            
                                <form autocomplete="off" class="d-flex" role="search" action="{{url('search-admin')}}" method="POST">
                                    @csrf
                                    <input class="form-control me-2" id="keywords" name="tukhoa" type="search" placeholder="Search" aria-label="Search">
                                    <div id="sreach_ajax"></div>
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                            
                            </div>
                        </div>
                </nav>
</div>