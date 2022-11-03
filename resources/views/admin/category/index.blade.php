<x-admin-layout>

    <div class="w-[70rem] mt-32 px-6 pt-6 pb-32 mx-auto">
        <h1 class="text-xl py-16 px-2 shadow-lg rounded-lg bg-white mb-8 font-bold text-center"> مشاهده دسته بندی غذاها</h1>
        <a href="{{route('admin.categories.create')}}" class="py-2 px-4 text-center text-white bg-green-700 w-1/5 rounded shadow-sm mb-12 float-left">
            اضافه کردن دسته بندی جدید
        </a>
        <table class="w-full border-collapse shadow-lg text-sm rounded-lg bg-white  ">
            <thead>
            <tr class="border-b">
                <th class="py-4 px-2 mb-4">ردیف</th>
                <th class="py-4 px-2 mb-4">عنوان دسته</th>
                <th class="py-4 px-2 mb-4">کیترینگ مرتبط</th>
                <th class="py-4 px-2 mb-4">ویرایش</th>
                <th class="py-4 px-2 mb-4">مشاهده</th>

            </tr>
            </thead>
            <tbody class="py-8 mt-32">
            @foreach($categories as $i=>$category)
            <tr class="border-b">
                <td class="py-4 px-2 text-center">{{$i+1}}</td>
                <td class="py-4 px-2 text-center">{{$category->title}}</td>
                <td class="py-4 px-2 text-center">{{$category->eateryType->title}}</td>
                <td class="text-center"><a href="{{route('admin.categories.edit',['category'=>$category->id])}}"><i class=" material-icons text-cyan-500 text-sm">mode_edit</i></a></td>
                <td class="text-center"><a href="{{route('admin.categories.show',['category'=>$category->id])}}"><i
                            class=" material-icons text-gray-500 text-sm text-green-600">visibility</i></a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>


</x-admin-layout>
