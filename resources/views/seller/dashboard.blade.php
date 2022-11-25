<x-seller-layout>
    <div class="w-[70rem] mt-32 px-6 pt-6 pb-32 mx-auto">
        <h1 class="text-xl py-16 px-2 shadow-lg rounded-lg bg-white mb-8 font-bold text-center"> لیست سفارشات</h1>
        <table class="w-full border-collapse shadow-lg text-sm rounded-lg bg-white">
            <thead>
            <tr class="border-b">
                <th class="py-4 px-2 mb-4">ردیف</th>
                <th class="py-4 px-2 mb-4">آدرس</th>
                <th class="py-4 px-2 mb-4">زمان سفارش</th>
                <th class="py-4 px-2 mb-4">وضعیت</th>
                <th class="py-4 px-2 mb-4">مشاهده و تغییر وضعیت</th>
            </tr>
            </thead>
            <tbody class="py-8 mt-32">
            @foreach($invoices as $i=>$invoice)
                <tr class="border-b">
                    <td class="py-4 px-2 text-center">{{$i+1}}</td>
                    <td class="py-4 px-2 text-center">{{\Illuminate\Support\Str::limit($invoice->userAddress->address_text,15)}}</td>
                    <td class="py-4 px-2 text-center">{{$invoice->ordered_at}}</td>
                    <td class="py-4 px-2 text-center text-orange-500">{{$invoice->status->title}}</td>
                    <td class="text-center"><a href="{{route('seller.invoices.edit',['invoice'=>$invoice->id])}}"><i
                                class=" material-icons text-gray-500 text-sm text-green-600">visibility</i></a></td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


</x-seller-layout>
