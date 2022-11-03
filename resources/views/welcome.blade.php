<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>اسنپ فود</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="rounded shadow-lg w-1/4 h-[20rem] mx-auto mt-32 py-8">
<div class="py-4 mt-2 mx-4 text-center text-lg bg-gray-700 text-white"><a href="{{route('admin.login')}}"> ورود به عنوان مدیر</a></div>
<div class="py-4 mt-2 mx-4 text-center text-lg bg-gray-700 text-white"><a href="{{route('seller.login')}}"> ورود به عنوان فروشنده</a></div>
{{--<div class="py-4 mt-2 mx-4 text-center text-lg bg-gray-700 text-white"><a href="{{route('seller.register')}}"> ثبت نام فروشنده</a></div>--}}
</div>
</body>
</html>
