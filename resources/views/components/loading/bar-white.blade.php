
<div  style="color: #ffffff" {!! $attributes->merge(['class' => '']) !!} >
    <div></div>
</div>

@push('bar-styles')
    <link rel="stylesheet" href="{{ asset('css/bar.css') }}">
@endpush