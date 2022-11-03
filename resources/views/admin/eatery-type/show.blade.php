<x-admin-layout>
    <div class="w-[70rem] mt-32 px-6 pt-6 pb-32 mx-auto">
        <h1 class="text-xl py-16 px-2 shadow-lg rounded-lg bg-white mb-8 font-bold text-center"> دسته بندی کیترینگ</h1>
        <div class="my-32">
                <label class="block my-3 inline-block">عنوان دسته کیترینگ :</label>
                <span class="rounded-lg p-1 text-lg w-1/3 inline-block font-bold">{{$eatery_type->title}}</span>
            </div >
            <form action="{{route('admin.eatery-types.destroy',['eatery_type'=>$eatery_type->id])}}" method="post">
                @csrf
                @method('delete')
                <input type="hidden" value="{{$eatery_type->id}}">
                <button type="submit" class="py-4 text-lg px-16 text-white bg-red-600 text-center rounded shadow-sm">حذف</button>
            </form>
        </div>
    </div>


</x-admin-layout>
