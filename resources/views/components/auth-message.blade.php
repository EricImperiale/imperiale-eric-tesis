@php
use Illuminate\Support\Facades\Session;
@endphp

<div>
    @if(Session::has('message'))
        <x-alert
            type="{{ Session::get('type') }}"
            withHeader=""
            message="{{ Session::get('message') }}"
            style="mb-3"
        />
    @endif
</div>
