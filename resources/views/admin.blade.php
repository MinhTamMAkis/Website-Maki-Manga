@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Quản lý</div>
                <img src="{{asset('public/image/admin_wc.png')}}" alt="">
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    {{ __('You are logged in!') }}<br>
                
                </div>
                <div class="row ps-3">
                        <div class="col-6 ">
                            <div class="d-flex justify-content-center"><p>GENRE</p></div>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-primary mb-3">
                                <a class="text-light text-decoration-none" href="{{route('danhmuc.index')}}">List Genre</a>
                            </button>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-primary mb-3">
                                    <a class="text-light text-decoration-none" href="{{route('danhmuc.create')}}">Add Genre</a>
                                </button>
                            </div>
                        </div>
                        <div class="col-6 ">
                            <div class="d-flex justify-content-center"><p>MANGA</p></div>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-primary mb-3"> 
                                    <a class="text-light text-decoration-none" href="{{route('truyen.index')}}">List Manga</a>
                                </button>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-primary mb-3">
                                    <a class="text-light text-decoration-none" href="{{route('truyen.create')}}">Add Manga</a>
                                </button>
                            </div>
                        </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection