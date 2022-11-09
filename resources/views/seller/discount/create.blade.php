<x-seller-layout>
    <div class="w-[70rem] mt-32 px-6 pt-6 pb-32 mx-auto">
        <h1 class="text-xl py-16 px-2 shadow-lg rounded-lg bg-white mb-8 font-bold text-center"> افزودن تخفیف جدید</h1>
    <form action="{{route('seller.discounts.store')}}" method="post" >
        @csrf
        <div class="mt-12 mb-8">
            <label class="inline-block ml-8 w-1/6">کد تخفیف : </label>
            <input  value="{{old('code')}}" name="code" class="inline-block w-1/2 py-2 h-8 rounded outline-none border">
            @error('code') <div class="my-2 text-red-500 ">{{$message}}</div> @enderror
        </div>
        <div class="my-8">
            <label class="inline-block ml-8 w-1/8">درصد تخفیف : </label>
            <input  value="{{old('percent')}}" name="percent" class="inline-block w-1/2 py-2 h-8 rounded outline-none border">
            @error('percent') <div class="my-2 text-red-500 ">{{$message}}</div> @enderror
        </div>
        <div class="my-8">
            <label class="inline-block ml-8 w-1/8">زمان شروع : </label>
            <input type="date"  value="{{old('start')}}" name="start" class="inline-block w-1/2 py-2 h-8 rounded outline-none border">
            @error('start') <div class="my-2 text-red-500 ">{{$message}}</div> @enderror
        </div>
        <div class="my-8">
            <label class="inline-block ml-8 w-1/8">زمان پایان : </label>
            <input type="date"  value="{{old('end')}}" name="end" class="inline-block w-1/2 py-2 h-8 rounded outline-none border">
            @error('end') <div class="my-2 text-red-500 ">{{$message}}</div> @enderror
        </div>

        <button type="submit" class="mt-16 bg-gray-600 text-white py-4 px-12 text-center mx-auto block">ثبت تخفیف</button>
    </form>
</div>
</x-seller-layout>
