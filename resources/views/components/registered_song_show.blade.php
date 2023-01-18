<div class="flex flex-wrap">
  @if(!empty($songs->toArray()))
  @foreach ($songs as $song)
      <div class="w-1/2 md:w-1/3 lg:w-1/4 p-4 ">
        <div class=" rounded-md p-4">
          <x-thumbnail :filename="$song->image->filename" type="songs" />
          <div class="text-lg text-center border-x-2 border-b-2 text-gray-500">曲ID{{$song->id}}</div>
          <div class="text-lg text-center border-x-2 border-b-2 text-gray-500">グループ名{{$song->group->name}}</div>
          <div class="text-lg text-center border-x-2 border-b-2 text-gray-500">曲名{{$song->name}}</div>
          @if ($song->emotion === null)
            <div class="text-lg text-center border-x-2 border-b-2 text-gray-500">#登録なし</div>
          @elseif($song->emotion !== null)
            <div class="text-lg text-center border-x-2 border-b-2 text-gray-500">#{{$song->emotion->name}}</div>
          @endif
          @if ($song->period === null)
            <div class="text-lg text-center border-x-2 border-b-2 text-gray-500">#登録なし</div>
          @elseif ($song->period !== null)
            <div class="text-lg text-center border-x-2 border-b-2 text-gray-500">#{{$song->period->term}}</div>
          @endif
        </div>
      </div>
  @endforeach
  @endif

  @if(empty($songs->toArray()))
    <div class="m-8 mx-auto ">
      <p class="text-lg text-gray-400">このタグに登録されている曲は現在ありません。</p>
  @endif

</div>
