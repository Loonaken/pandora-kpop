@props(['status' => 'info'])
@php

if(session('status') === 'info'){$bgColor ='bg-blue-300';}
if(session('status') === 'error'){$bgColor ='bg-red-500';}
@endphp
@if(session('message'))
<div class="{{ $bgColor }} w-1/2 mx-auto p-2 mt-4 mb-8 text-white">
{{ session('message' )}}
</div>
@endif
