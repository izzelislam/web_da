@component('mail::message')
# Halo admin

ada pembayaran yang menunggu konfirmasi

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
