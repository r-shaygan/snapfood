<x-admin-layout>
    <div class="w-[70rem] mt-32 px-6 pt-6 pb-32 mx-auto">
        <img src="/images/banners/{{$banner->image}}" class="text-xl w-full h-64 px-2 shadow-lg rounded-lg bg-white mb-8 font-bold text-center">
        <form method="post" action="{{route('admin.banners.update',['banner'=>$banner->id])}}" enctype="multipart/form-data" class="w-full p-8 border-collapse shadow-lg text-sm rounded-lg bg-white">
            @method('put')
            @csrf
            <div class="my-8">
                <label class="block my-3"> ویرایش عنوان بنر :</label>
                <input value="{{$banner->title}}" name="title" class="rounded-lg p-1 border w-1/3">
                @error('title') <div class="my-2 text-red-500 ">{{$message}}</div> @enderror
            </div >
            <div class="my-8">
                <label class="block my-3">ویرایش لینک:</label>
                <input value="{{$banner->url}}" name="url" class="rounded-lg p-1 border w-1/3">
                @error('url') <div class="my-2 text-red-500 ">{{$message}}</div> @enderror
            </div >
            <div class="my-16">
                <label class="block my-3">بارگذاری تصویر جدید</label>
                <input type="file" name="edit_image" class="rounded-lg p-1 border w-1/3">
                @error('image') <div class="my-2 text-red-500 ">{{$message}}</div> @enderror
            </div>

            <button type="submit" class="py-2 px-8 bg-blue-600 rounded text-white text-center">ثبت</button>
        </form>
    </div>


</x-admin-layout>
