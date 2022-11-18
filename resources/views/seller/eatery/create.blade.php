<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-200">
<div class="py-8 px-8 w-2/3 min-h-screen rounded shadow-lg bg-white mx-auto">
    <h1 class="pb-4 mb-12 text-center text-2xl font-bold">فرم تکمیل اطلاعات رستوران</h1>
    <hr>
    <form action="{{route('seller.eateries.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mt-12 mb-8">
            <label class="inline-block ml-8 w-1/6">نام رستوران : </label>
            <input  value="{{old('name')}}" name="name" class="inline-block w-1/2 py-2 h-8 rounded outline-none border">
            @error('name') <div class="my-2 text-red-500 ">{{$message}}</div> @enderror
        </div>
        <div class="my-8">
            <label class="inline-block ml-8 w-1/4">شماره تماس رستوران : </label>
            <input  value="{{old('phone')}}" name="phone" class="inline-block w-1/2 py-2 h-8 rounded outline-none border">
            @error('phone') <div class="my-2 text-red-500 ">{{$message}}</div> @enderror
        </div>
        <div class="my-8">
            <label class="inline-block ml-2 w-1/4">عرض جغرافیایی :</label>
            <input  value="{{old('address_lat')}}" name="address_lat" class="inline-block w-1/5 py-2 h-8 rounded outline-none border">
            <label class="inline-block ml-2 w-1/4">طول جغرافیایی : </label>
            <input value="{{old('address_long')}}" name="address_long" class="inline-block w-1/5 py-2 h-8 rounded outline-none border">
        </div>
        @error('address_long') <div class="my-2 text-red-500 ">{{$message}}</div> @enderror
        @error('address_lat') <div class="my-2 text-red-500 ">{{$message}}</div> @enderror
        <div class="my-8">
            <label class="inline-block ml-8 w-1/4">آدرس رستوران : </label>
            <textarea name="address_text"
                      class="inline-block w-1/2 py-2 h-16 align-middle  rounded outline-none border">{{old('address_lat')}}</textarea>
            @error('address_text') <div class="my-2 text-red-500 ">{{$message}}</div> @enderror
        </div>
        <div class="my-8">
            <label class="inline-block ml-8 w-1/4">شماره حساب : </label>
            <input value="{{old('credit')}}" name="credit" class="inline-block w-1/2 py-2 h-8 rounded outline-none border">
            @error('credit') <div class="my-2 text-red-500 ">{{$message}}</div> @enderror
        </div>
        <div class="my-8">
            <label class="inline-block ml-8 w-1/4">هزینه ارسال پیک : </label>
            <input value="{{old('deliveryCost')}}" name="deliveryCost" class="inline-block w-1/2 py-2 h-8 rounded outline-none border">
            @error('deliveryCost') <div class="my-2 text-red-500 ">{{$message}}</div> @enderror
        </div>
        <div class="my-8">
            <label class="inline-block ml-2 w-1/4">زمان شروع کار شنبه :</label>
            <input type="time" name="work[sat][open]" class="inline-block w-1/5 py-2 h-8 rounded outline-none border">
            <label class="inline-block ml-2 w-1/4">زمان پایان کار شنبه: </label>
            <input type="time" name="work[sat][close]" class="inline-block w-1/5 py-2 h-8 rounded outline-none border">
        </div>
        <div class="my-8">
            <label class="inline-block ml-2 w-1/4">زمان شروع کار یک شنبه :</label>
            <input type="time" name="work[sun][open]" class="inline-block w-1/5 py-2 h-8 rounded outline-none border">
            <label class="inline-block ml-2 w-1/4">زمان پایان کار یک شنبه: </label>
            <input type="time" name="work[sun][close]" class="inline-block w-1/5 py-2 h-8 rounded outline-none border">
        </div>
        <div class="my-8">
            <label class="inline-block ml-2 w-1/4">زمان شروع کار دوشنبه :</label>
            <input type="time" name="work[mon][open]" class="inline-block w-1/5 py-2 h-8 rounded outline-none border">
            <label class="inline-block ml-2 w-1/4">زمان پایان کار دوشنبه: </label>
            <input type="time" name="work[mon][close]" class="inline-block w-1/5 py-2 h-8 rounded outline-none border">
        </div>
        <div class="my-8">
            <label class="inline-block ml-2 w-1/4">زمان شروع کار سه شنبه :</label>
            <input type="time" name="work[tue][open]" class="inline-block w-1/5 py-2 h-8 rounded outline-none border">
            <label class="inline-block ml-2 w-1/4">زمان پایان کار سه شنبه: </label>
            <input type="time" name="work[tue][close]" class="inline-block w-1/5 py-2 h-8 rounded outline-none border">
        </div>
        <div class="my-8">
            <label class="inline-block ml-2 w-1/4">زمان شروع کار چهار شنبه :</label>
            <input type="time" name="work[wed][open]" class="inline-block w-1/5 py-2 h-8 rounded outline-none border">
            <label class="inline-block ml-2 w-1/4">زمان پایان کار چهار شنبه: </label>
            <input type="time" name="work[wed][close]" class="inline-block w-1/5 py-2 h-8 rounded outline-none border">
        </div>
        <div class="my-8">
            <label class="inline-block ml-2 w-1/4">زمان شروع کار پنج شنبه :</label>
            <input type="time" name="work[thus][open]" class="inline-block w-1/5 py-2 h-8 rounded outline-none border">
            <label class="inline-block ml-2 w-1/4">زمان پایان کار پنج شنبه: </label>
            <input type="time" name="work[thus][close]" class="inline-block w-1/5 py-2 h-8 rounded outline-none border">
        </div>
        <div class="my-8">
            <label class="inline-block ml-2 w-1/4">زمان شروع کار جمعه :</label>
            <input type="time" name="work[fri][open]" class="inline-block w-1/5 py-2 h-8 rounded outline-none border">
            <label class="inline-block ml-2 w-1/4">زمان پایان کار جمعه : </label>
            <input type="time" name="work[fri][close]" class="inline-block w-1/5 py-2 h-8 rounded outline-none border">
        </div>
        <div class="my-16">
            <label class="block my-3">نوع کیترینگ</label>
            <select name="type">
                @foreach($eatery_types as $eatery_type)
                    <option value="{{$eatery_type->id}}">{{$eatery_type->title}}</option>
                @endforeach
            </select>
            @error('eatery_type_id') <div class="my-2 text-red-500">{{$message}}</div> @enderror
        </div>
        <div class="my-8">
        <label class="inline-block ml-8 w-1/4">انتخاب تصویر: </label>
        <input name="image" type="file">
        </div>
        @error('image') <div class="my-2 text-red-500 ">{{$message}}</div> @enderror
        <button type="submit" class="mt-16 bg-gray-600 text-white py-4 px-12 text-center mx-auto block">ثبت رستوران</button>
    </form>
</div>
</body>
</html>
