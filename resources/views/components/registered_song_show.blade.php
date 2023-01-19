  <div class="flex justify-end -mb-6">
    <button type="submit" class=" text-white z-10 bg-red-500 border-0 focus:outline-none hover:bg-red-600 rounded-full text-base">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 ">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
    </a>
  </div>
</form>
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
