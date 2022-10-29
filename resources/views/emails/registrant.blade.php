@component('mail::message')
# Halo Admin

Ada pendaftar baru

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
