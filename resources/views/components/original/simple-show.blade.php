  <div class=" rounded-md p-4">
    <x-thumbnail :filename="$song->image->filename" />
    <div class="text-lg text-center -mt-4 border-x-2 border-b-2 text-gray-500">曲ID{{$song->id}}</div>
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
