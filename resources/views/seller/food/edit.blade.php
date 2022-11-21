<x-seller-layout>
    <div class="w-[70rem] mt-32 px-6 pt-6 pb-32 mx-auto">
        <img src="{{config('image.food').$food->image}}" class="text-xl w-full h-64 px-2 shadow-lg rounded-lg bg-white mb-8 font-bold text-center">
        <form method="post" action="{{route('seller.foods.update',['food'=>$food->id])}}" enctype="multipart/form-data" class="w-full p-8 border-collapse shadow-lg text-sm rounded-lg bg-white">
            @csrf
            @method('put')
            <div class="my-8">
                <label class="block my-3">عنوان غذا :</label>
                <input value="{{$food->title}}" name="title" class="rounded-lg p-1 border w-1/3">
                @error('title') <div class="my-2 text-red-500 ">{{$message}}</div> @enderror
            </div >
            <div class="my-8">
                <label class="block my-3">قیمت :</label>
                <input value="{{$food->cost}}" name="cost" class="rounded-lg p-1 border w-1/3">
                @error('cost') <div class="my-2 text-red-500 ">{{$message}}</div> @enderror
            </div >
            <div class="my-16">
                <label class="block my-3">انتخاب تخفیف</label>
                <select name="discount_id">
                    @foreach($discounts as $discount)
                        <option value="{{$discount->id}}">{{$discount->code}}</option>
                    @endforeach
                </select>
            </div>
            <div class="my-16">
                <label class="block my-3">دسته یندی مرتبط</label>
                <select name="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"
                        {{$category->id===$food->category_id?'selected':''}}
                            >{{$category->title}}</option>
                    @endforeach
                </select>
                @error('category_id') <div class="my-2 text-red-500">{{$message}}</div> @enderror
            </div>
            <div class="my-8">
                <label class="block my-3">مواد اولیه :</label>
                <textarea name="ingredients" class="inline-block w-1/2 py-2 h-16 align-middle  rounded outline-none border">{{$food->ingredients}}</textarea>
                @error('ingredients') <div class="my-2 text-red-500 ">{{$message}}</div> @enderror
            </div >
            <div class="my-16">
                <label class="block my-3">بارگذاری تصویر</label>
                <input type="file" name="edit_image" class="rounded-lg p-1 border w-1/3">
                @error('edit_image') <div class="my-2 text-red-500 ">{{$message}}</div> @enderror
            </div>

            <button type="submit" class="py-2 px-8 bg-blue-600 rounded text-white text-center">ثبت</button>
        </form>
    </div>


</x-seller-layout>
