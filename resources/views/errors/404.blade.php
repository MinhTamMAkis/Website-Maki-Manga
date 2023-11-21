<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    @vite(['resources/sass/app.scss', 'public/css/erorr.css'])
</head>
<style>
    
</style>
<body >
    <div class=" bg">
        <figure>
            <div class="circle_1"></div>
            <button><a href="{{url('/')}}">Go Back</a></button>
            <img src="{{asset('public/image/404_bg.png')}}" alt="">
            <div class="circle_2"></div>
        </figure>
        
    </div>
</body>
</html>
