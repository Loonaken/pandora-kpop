{{-- @php

if ($type === 'songs') {
  $path = 'storage/songs/';
}
if ($type === 'groups') {
  $path = 'storage/groups/';
}


@endphp --}}



<div {{ $attributes->merge([
  'class' => 'mb-4'
]) }} >
  @if (empty($filename))
  <img src="{{ asset('images/no_image.jpg')}}">

  @else
  <img src="{{ asset('storage/songs/' . $filename)}}" >
  {{-- 画像がアップロードしたフォルダ(storage/songs/)の中の特定のファイルを選択している --}}
  @endif
</div>
