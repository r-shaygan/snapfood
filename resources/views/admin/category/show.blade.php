<x-admin-layout>
    <div class="w-[70rem] mt-32 px-6 pt-6 pb-32 mx-auto">
        <h1 class="text-xl py-16 px-2 shadow-lg rounded-lg bg-white mb-8 font-bold text-center"> دسته بندی غذا</h1>
        <div>
            <div class="my-8">
                <label class="block my-3 inline-block">عنوان دسته :</label>
                <span class="rounded-lg p-1 text-lg w-1/3 inline-block mr-8 font-bold" >{{$category->title}}</span>
            </div >
            <div class="my-8">
                <label class="block my-3 inline-block">دسته والد :</label>
                <span  class="rounded-lg p-1 text-lg w-1/3 inline-block mr-8 font-bold ">{{$category->eateryType->title}}</span>
            </div >
            <form action="{{route('admin.categories.destroy',['category'=>$category->id])}}" method="post">
                @csrf
                @method('delete')
                <input type="hidden" value="{{$category->id}}">
                <button type="submit" class="py-4 text-lg px-16 text-white bg-red-600 text-center rounded shadow-sm">حذف</button>
            </form>
        </div>
    </div>


</x-admin-layout>
