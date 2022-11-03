<x-seller-layout>
    <div class="w-[70rem] mt-32 px-6 pt-6 pb-32 mx-auto">
        <img src="{{config('image.food').$food->image}}" class="text-xl w-full h-64 px-2 shadow-lg rounded-lg bg-white mb-8 font-bold text-center">
        <form method="post" action="{{route('seller.foods.destroy',['food'=>$food->id])}}" class="w-full p-8 border-collapse shadow-lg text-sm rounded-lg bg-white">
            @csrf
            @method('delete')
            <div class="my-8">
                <label class="block my-3">عنوان غذا :</label>
                <div >
                    {{$food->title}}
            </div >
            <div class="my-8">
                <label class="block my-3">قیمت :</label>
                <div >
                    {{$food->cost}}
                </div >
            <div class="my-16">
                <label class="block my-3">دسته یندی مرتبط</label>
                <div>{{$food->category->title}}</div>

            </div>
            <div class="my-8">
                <label class="block my-3">مواد اولیه :</label>
                <div>{{$food->ingredients}}</div>
            </div >
                <button type="submit" class="py-4 text-lg px-16 text-white bg-red-600 text-center rounded shadow-sm">حذف</button>
        </form>
    </div>


</x-seller-layout>
