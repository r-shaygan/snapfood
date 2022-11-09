<x-seller-layout>
    <div class="w-[70rem] mt-32 px-6 pt-6 pb-32 mx-auto">
        <h1 class="text-xl py-16 px-2 shadow-lg rounded-lg bg-white mb-8 font-bold text-center"> مشاهده تخفیف ها</h1>
        <a href="{{route('seller.discounts.create')}}" class="py-2 px-4 text-center text-white bg-green-700 w-1/5 rounded shadow-sm mb-12 float-left">
            اضافه کردن تخفیف جدید
        </a>
        <table class="w-full border-collapse shadow-lg text-sm rounded-lg bg-white  ">
            <thead>
            <tr class="border-b">
                <th class="py-4 px-2 mb-4">ردیف</th>
                <th class="py-4 px-2 mb-4">کد تخفیف</th>
                <th class="py-4 px-2 mb-4">درصد تخفیف</th>
            </tr>
            </thead>
            <tbody class="py-8 mt-32">
            @foreach($discounts as $i=>$discount)
            <tr class="border-b">
                <td class="py-4 px-2 text-center">{{$i+1}}</td>
                <td class="py-4 px-2 text-center">{{$discount->code}}</td>
                <td class="py-4 px-2 text-center">{{$discount->percent}}</td>
                <td class="text-center"><a href="{{route('seller.discounts.edit',['discount'=>$discount->id])}}"><i class=" material-icons text-cyan-500 text-sm">mode_edit</i></a></td>
                <td class="text-center"><a href="{{route('seller.discounts.show',['discount'=>$discount->id])}}"><i
                            class=" material-icons text-gray-500 text-sm text-green-600">visibility</i></a></td>

            </tr>
            @endforeach
            </tbody>
        </table>
    </div>


</x-seller-layout>
