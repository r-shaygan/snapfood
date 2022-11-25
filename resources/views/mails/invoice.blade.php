<x-mail::message>
<h1>کاربر گرامی <p>{{$invoice->user->full_name}}</p></h1>

<p>    وضعیت سفارش شما با کد پیگیری {{$invoice->id}}
    {{$status_title}}
    میباشد
</p>
<h3>اطلاعات سفارش شما به شرح زیر میباشد</h3>
<p>

    نام رستوران {{$invoice->eatery->name}}
    مبلغ پرداختی: {{$invoice->cost}}

    لیست سفارشات:
    @foreach($invoice->foods as $food)
        {{$food->title}}
    @endforeach

</p>

باتشکر,<br>
{{ config('app.name') }}
</x-mail::message>
