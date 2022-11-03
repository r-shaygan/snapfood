<x-admin-layout>
    <div class="w-[70rem] mt-32 px-6 pt-6 pb-32 mx-auto">
        <img src="/images/banners/{{$banner->image}}" class="text-xl w-full h-64 px-2 shadow-lg rounded-lg bg-white mb-8 font-bold text-center">
        <div>
            <div class="my-8">
                <label class="block my-3">عنوان بنر :</label>
                <span class="rounded-lg p-1 text-lg w-1/3">{{$banner->title}}</span>
            </div >
            <div class="my-8">
                <label class="block my-3">لینک :</label>
                <span  class="rounded-lg p-1 text-lg w-1/3"><a href="{{$banner->url}}">{{$banner->url}}</a></span>
            </div >
            <form action="{{route('admin.banners.destroy',['banner'=>$banner->id])}}" method="post">
                @csrf
                @method('delete')
                <input type="hidden" value="{{$banner->id}}">
                <button type="submit" class="py-4 text-lg px-16 text-white bg-red-600 text-center rounded shadow-sm">حذف</button>
            </form>
        </div>
    </div>


</x-admin-layout>
