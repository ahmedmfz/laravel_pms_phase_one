@component('mail::message')
# welcome  {{ $data['customer_name']}}


<h3> Your Order Number : {{ $data['id']}}</h3>
<h3> Your Email        : {{ $data['customer_email']}}</h3>
<h3> Your Address      : {{ $data['address']}}</h3>
<h3> Your Total        : {{ $data['total']}}</h3>
<h3> Status of order   : pending </h3>


@component('mail::button', ['url' => 'https://pms.comma-software.com/'])
        Back to site
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
