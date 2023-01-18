<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
年代タグの<br>登録曲追加
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                {{-- Contents --}}
                <x-flash-message status="session('status')" />

                  <div class="my-4">
                    {{-- 年代タグの名前編集 --}}
                    <div class=" w-2/3 max-w-2xl mx-auto bg-pink-400 border-0 p-4 rounded-md focus:outline-none mb-4">
                    <div class="text-white text-center rounded text-lg mb-2">タグ名: {{$period->term}}</div>
                    <div class="text-white text-center rounded text-lg ">表示順: {{$period->sort_order}}</div>
                    </div>


                      {{-- fin  年代タグの名前編集 --}}

                      {{-- 年代タグで使用されている曲一覧 --}}

                      <form method="POST" action="{{route('admin.periods.song.store' , ['song' => $period->id ])}}" >
                        {{-- 上記の$periodはページの年代タグ --}}
                        @csrf
                        @method('put')
                      <div class="p-2 mb-2 w-full lg:w-2/3 mx-auto">
                        <div class="relative">
                          <label for="period_id" class="leading-7 text-sm text-gray-600">曲の選択</label><br>
                          <select name="song_ids[]" multiple="multiple">
                            @foreach ($songs as $song)
                            <option value="{{$song->id}}">
                              {{-- $songs 全ての曲の情報 --}}
                                {{$song->name}}
                              </option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                      {{-- fin 年代タグで使用されている曲一覧 --}}


                    <div class="flex p-2 w-full">
                      <button type="button" onclick="location.href='{{route('admin.periods.show', ['period'=>$period->id])}}'" class="flex mx-auto text-black bg-gray-300 border-0 py-2 px-8 focus:outline-none hover:bg-gray-200 rounded text-lg">戻る</button>
                      <button type="submit" class="flex mx-auto text-black bg-green-300 border-0 py-2 px-8 focus:outline-none hover:bg-gray-200 rounded text-lg">追加</button>
                    </div>
                  </form>

                {{-- fin contents --}}

              </div>
          </div>
      </div>
  </div>

</x-app-layout>
