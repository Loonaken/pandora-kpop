@php

if ($type === 'songs') {
  $path = 'storage/songs/';
}
if ($type === 'groups') {
  $path = 'storage/groups/';
}


@endphp



<div class="mb-4">
  @if (empty($filename))
  <img src="{{ asset('images/no_image.jpg')}}">
  @else
  <img src="{{ asset($path . $filename)}}" >
  @endif
</div>
