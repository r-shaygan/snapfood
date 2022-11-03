<x-seller-layout>
    <div class="w-[70rem] mt-32 px-6 pt-6 pb-32 mx-auto">
        <img src="{{config('image.eatery').$eatery->image}}" class="text-xl w-full h-64 px-2 shadow-lg rounded-lg bg-white mb-8 font-bold text-center">
        <form method="post" action="{{route('seller.eateries.update',['eatery'=>$eatery->id])}}" enctype="multipart/form-data" class="w-full p-8 border-collapse shadow-lg text-sm rounded-lg bg-white">
            @method('put')
            @csrf
            <div class="my-8">
                <label class="block my-3"> ویرایش نام رستوران :</label>
                <input value="{{$eatery->name}}" name="name" class="rounded-lg p-1 border w-1/3">
                @error('name') <div class="my-2 text-red-500 ">{{$message}}</div> @enderror
            </div >

            <div class="my-8">
                <label class="inline-block ml-8 w-1/8">شماره تماس رستوران : </label>
                <input  value="{{$eatery->phone}}" name="phone" class="inline-block w-1/2 py-2 h-8 rounded outline-none border">
                @error('phone') <div class="my-2 text-red-500 ">{{$message}}</div> @enderror
            </div>
            <div class="my-8">
                <label class="inline-block ml-2 w-1/8">عرض جغرافیایی :</label>
                <input  value="{{$eatery->address_lat}}" name="address_lat" class="inline-block w-1/3 py-2 h-8 rounded outline-none border">
                <label class="inline-block ml-2 w-1/8">طول جغرافیایی : </label>
                <input value="{{$eatery->address_long}}" name="address_long" class="inline-block w-1/3 py-2 h-8 rounded outline-none border">
            </div>
            @error('address_long') <div class="my-2 text-red-500 ">{{$message}}</div> @enderror
            @error('address_lat') <div class="my-2 text-red-500 ">{{$message}}</div> @enderror
            <div class="my-8">
                <label class="inline-block ml-8 w-1/8">آدرس رستوران : </label>
                <textarea  name="address_text"
                          class="inline-block w-1/2 py-2 h-16 align-middle  rounded outline-none border">{{$eatery->address_text}}</textarea>
                @error('address_text') <div class="my-2 text-red-500 ">{{$message}}</div> @enderror
            </div>
            <div class="my-8">
                <label class="inline-block ml-8 w-1/8">شماره حساب : </label>
                <input value="{{$eatery->credit}}" name="credit" class="inline-block w-1/2 py-2 h-8 rounded outline-none border">
                @error('credit') <div class="my-2 text-red-500 ">{{$message}}</div> @enderror
            </div>
            <div class="my-8">
                <label class="inline-block ml-8 w-1/8">هزینه ارسال پیک : </label>
                <input value="{{$eatery->deliveryCost}}" name="deliveryCost" class="inline-block w-1/2 py-2 h-8 rounded outline-none border">
                @error('deliveryCost') <div class="my-2 text-red-500 ">{{$message}}</div> @enderror
            </div>
            <div class="my-8">
                <label class="inline-block ml-2 w-1/8">زمان شروع کار :</label>
                <input type="time" name="opening_time" class="inline-block w-1/3 py-2 h-8 rounded outline-none border">
                <label class="inline-block ml-2 w-1/8">زمان پایان کار: </label>
                <input type="time" name="closing_time" class="inline-block w-1/3 py-2 h-8 rounded outline-none border">
            </div>
            <div class="my-16">
                <label class="block my-3">نوع کیترینگ</label>
                <select name="type">
                    @foreach($eatery_types as $eatery_type)
                        <option {{$eatery_type->id===$eatery->type?'selected':''}} value="{{$eatery_type->id}}">{{$eatery_type->title}}</option>
                    @endforeach
                </select>
                @error('eatery_type_id') <div class="my-2 text-red-500">{{$message}}</div> @enderror
            </div>
            <div class="my-8">
                <label class="inline-block ml-8 w-1/8">انتخاب تصویر: </label>
                <input name="edit_image" type="file">
            </div>
            @error('edit_image') <div class="my-2 text-red-500 ">{{$message}}</div> @enderror
            <button type="submit" class="py-2 px-8 bg-blue-600 rounded text-white text-center">ثبت</button>
        </form>
    </div>


</x-seller-layout>
