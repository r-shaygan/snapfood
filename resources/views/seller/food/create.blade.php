<x-seller-layout>
    <div class="w-[70rem] mt-32 px-6 pt-6 pb-32 mx-auto">
        <h1 class="text-xl py-16 px-2 shadow-lg rounded-lg bg-white mb-8 font-bold text-center"> افزودن غذای جدید</h1>
        <form method="post" action="{{route('seller.foods.store')}}" enctype="multipart/form-data" class="w-full p-8 border-collapse shadow-lg text-sm rounded-lg bg-white">
            @csrf
            <div class="my-8">
                <label class="block my-3">عنوان غذای جدید :</label>
                <input value="{{old('title')}}" name="title" class="rounded-lg p-1 border w-1/3">
                @error('title') <div class="my-2 text-red-500 ">{{$message}}</div> @enderror
            </div >
            <div class="my-8">
                <label class="block my-3">قیمت :</label>
                <input value="{{old('cost')}}" name="cost" class="rounded-lg p-1 border w-1/3">
                @error('cost') <div class="my-2 text-red-500 ">{{$message}}</div> @enderror
            </div >
            <div class="my-16">
                <label class="block my-3">دسته یندی مرتبط</label>
                <select name="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
                @error('category_id') <div class="my-2 text-red-500">{{$message}}</div> @enderror
            </div>
            <div class="my-8">
                <label class="block my-3">مواد اولیه :</label>
                <textarea name="ingredients" class="inline-block w-1/2 py-2 h-16 align-middle  rounded outline-none border">{{old('image')}}</textarea>
                @error('ingredients') <div class="my-2 text-red-500 ">{{$message}}</div> @enderror
            </div >
            <div class="my-16">
                <label class="block my-3">بارگذاری تصویر</label>
                <input value="{{old('image')}}" type="file" name="image" class="rounded-lg p-1 border w-1/3">
                @error('image') <div class="my-2 text-red-500 ">{{$message}}</div> @enderror
            </div>

            <button type="submit" class="py-2 px-8 bg-blue-600 rounded text-white text-center">ثبت</button>
        </form>
    </div>


</x-seller-layout>
