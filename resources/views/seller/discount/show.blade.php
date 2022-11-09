<x-seller-layout>
    <div class="w-[70rem] mt-32 px-6 pt-6 pb-32 mx-auto">
        <h1 class="text-xl py-16 px-2 shadow-lg rounded-lg bg-white mb-8 font-bold text-center">مشاهده تخفیف</h1>
        <div>
            <div class="my-8">
                <label class="block my-3 inline-block">کد تخفیف</label>
                <span class="rounded-lg p-1 text-lg w-1/3 inline-block mr-8 font-bold" >{{$discount->code}}</span>
            </div >
            <div class="my-8">
                <label class="block my-3 inline-block">درصد تخفیف</label>
                <span  class="rounded-lg p-1 text-lg w-1/3 inline-block mr-8 font-bold ">{{$discount->percent}}</span>
            </div >
             <div class="my-8">
                <label class="block my-3 inline-block">زمان شروع</label>
                <span  class="rounded-lg p-1 text-lg w-1/3 inline-block mr-8 font-bold ">{{$discount->start}}</span>
            </div >
             <div class="my-8">
                <label class="block my-3 inline-block">زمان پایان</label>
                <span  class="rounded-lg p-1 text-lg w-1/3 inline-block mr-8 font-bold ">{{$discount->end}}</span>
            </div >

            <form action="{{route('seller.discounts.destroy',['discount'=>$discount->id])}}" method="post">
                @csrf
                @method('delete')
                <input type="hidden" value="{{$discount->id}}">
                <button type="submit" class="py-4 text-lg px-16 text-white bg-red-600 text-center rounded shadow-sm">حذف</button>
            </form>
        </div>
    </div>


</x-seller-layout>
