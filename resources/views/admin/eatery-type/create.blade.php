<x-admin-layout>
    <div class="w-[70rem] mt-32 px-6 pt-6 pb-32 mx-auto">
        <h1 class="text-xl py-16 px-2 shadow-lg rounded-lg bg-white mb-8 font-bold text-center"> افزودن دسته کیترینگ جدید</h1>
        <form method="post" action="{{route('admin.eatery-types.store')}}" enctype="multipart/form-data" class="w-full p-8 border-collapse shadow-lg text-sm rounded-lg bg-white">
            @csrf
            <div class="my-8">
                <label class="block my-3">عنوان دسته کیترینگ :</label>
                <input value="{{old('title')}}" name="title" class="rounded-lg p-1 border w-1/3">
                @error('title') <div class="my-2 text-red-500 ">{{$message}}</div> @enderror
            </div >
            <button type="submit" class="py-2 px-8 bg-blue-600 rounded text-white text-center">ثبت</button>
        </form>
    </div>


</x-admin-layout>
