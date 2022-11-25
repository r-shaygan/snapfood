<x-seller-layout>
    <div class="w-[70rem] mt-32 px-6 pt-6 pb-32 mx-auto">
        <form method="post" action="{{route('seller.invoices.update',['invoice'=>$invoice->id])}}" class="w-full p-8 border-collapse shadow-lg text-sm rounded-lg bg-white">
            @csrf
            @method('put')
            <div class="my-8">
                <label class="block my-3">غذاهای سفارش داده شده :</label>
                <ul>
                    @foreach($invoice->foods as $food)
                        <li class="text-violet-700">{{$food->title}}</li>
                    @endforeach
                </ul>
            </div >
            <div class="my-8">
                <label class="block my-3">قیمت کل :</label>
                <span>{{$invoice->cost}}</span>
            </div >
            <div class="my-16">
                <label class="block my-3">وضعیت سفارش : </label>
                <select name="status_id">
                    @foreach($statuses as $status)
                        <option value="{{$status->id}}"
                            {{$status->id===$invoice->status_id?'selected':''}}
                        >{{$status->title}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="py-2 px-8 bg-blue-600 rounded text-white text-center">ثبت</button>
        </form>
    </div>


</x-seller-layout>
