<x-seller-layout>
    <div class="w-[70rem] mt-32 px-6 pt-6 pb-32 mx-auto">
        <h1 class="pb-4 mb-12 text-center text-2xl font-bold">افزودن تخفیف</h1>
        <hr>
        <form method="post" action="{{route('seller.discounts.update',['discount'=>$discount->id])}}" class="w-full p-8 border-collapse shadow-lg text-sm rounded-lg bg-white">
            @method('put')
            @csrf
            <div class="my-8">
                <label class="inline-block ml-8 w-1/8">درصد تخفیف : </label>
                <input  value="{{$discount->percent}}" name="percent" class="inline-block w-1/2 py-2 h-8 rounded outline-none border">
                @error('percent') <div class="my-2 text-red-500 ">{{$message}}</div> @enderror
            </div>
            <div class="my-8">
                <label class="inline-block ml-8 w-1/8">کد تخفیف : </label>
                <input  value="{{$discount->code}}" name="code" class="inline-block w-1/2 py-2 h-8 rounded outline-none border">
                @error('code') <div class="my-2 text-red-500 ">{{$message}}</div> @enderror
            </div>
            <div class="my-8">
                <label class="inline-block ml-8 w-1/8">زمان شروع : </label>
                <input type="date"  name="start" class="inline-block w-1/2 py-2 h-8 rounded outline-none border">
                @error('start') <div class="my-2 text-red-500 ">{{$message}}</div> @enderror
            </div>
            <div class="my-8">
                <label class="inline-block ml-8 w-1/8">زمان پایان : </label>
                <input type="date"  name="end" class="inline-block w-1/2 py-2 h-8 rounded outline-none border">
                @error('end') <div class="my-2 text-red-500 ">{{$message}}</div> @enderror
            </div>

            <button type="submit" class="py-2 px-8 bg-blue-600 rounded text-white text-center">ثبت</button>
        </form>
    </div>


</x-seller-layout>
