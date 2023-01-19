<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
年代タグの<br>登録曲一覧
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                {{-- Contents --}}
                <x-flash-message status="session('status')" />
                {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}

                  <div class="my-4">
                    {{-- 年代タグの名前編集 --}}
                    <div class=" w-2/3 max-w-2xl mx-auto bg-pink-400 border-0 p-4 rounded-md focus:outline-none mb-4">
                    <div class="text-white text-center rounded text-lg mb-2">タグ名: {{$period->term}}</div>
                    <div class="text-white text-center rounded text-lg ">表示順: {{$period->sort_order}}</div>
                    </div>
                    <div class="text-center flex justify-center">
                      <form id="delete_{{$period->id}}" action="{{route('admin.periods.destroy' , ['period'=>$period->id])}}" method="post">
                        @csrf
                        @method('delete')
                          <button type='submit' data-id="{{$period->id}}}" onclick="deletePost(this)" class="text-black bg-white border-4 transition duration-300 ease-in-out border-red-300 hover:bg-red-200/80 py-2 px-8 focus:outline-none  rounded text-lg mb-2 mx-2 ">削除</button>
                      </form>
                      <button onclick="location.href='{{route('admin.periods.term.edit' , ['term'=>$period->id])}}'"  class="text-black bg-white border-4 transition duration-300 ease-in-out border-yellow-300 hover:bg-yellow-200/80 py-2 px-8 focus:outline-none  rounded text-lg mb-2 mx-2 ">更新</button>
                    </div>



                      {{-- fin  年代タグの名前編集 --}}

                      {{-- 登録曲追加 --}}
                      <div class="p-2 my-4 w-full mx-auto bg-blue-300/25">
                        <p class="text-center underline tracker-wider underline-offset-4 text-lg ">登録曲一覧</p>
                        <div class="flex justify-end mb-4 border-b-2 border-gray-500">
                          <button onclick="location.href='{{route('admin.periods.song.add', ['song'=>$period->id])}}'" class="text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg mb-2 mr-4 ">追加</button>
                        </div>
                      {{-- fin 登録曲追加 --}}

                      {{-- 登録曲一覧 --}}
                      <div class="flex flex-wrap">
                        @if(!empty($songs->toArray()))
                        @foreach ($songs as $song)
                            <div class="w-1/2 md:w-1/3 lg:w-1/4 p-4 ">
                              <div class=" rounded-md p-4">
                                <form method="POST" action="{{route('admin.periods.song.destroy', ['song'=>$song->id])}}">
                                  @csrf
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
                                <div class="text-lg text-center border-x-2 border-b-2 text-gray-500">グループ名{{$song->period->name}}</div>
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
                            <p class="text-lg text-gray-400">このグループに登録されている曲は現在ありません。</p>
                        @endif

                      </div>
                      {{-- fin 登録曲一覧 --}}

                  </div>
                      {{-- fin 年代タグで使用されている曲一覧 --}}


                    </div>
                    <div class="flex p-2 w-full">
                        <button type="button" onclick="location.href='{{route('admin.periods.index')}}'" class="flex mx-auto text-black bg-gray-300 border-0 py-2 px-8 focus:outline-none hover:bg-gray-200 rounded text-lg">戻る</button>
                    </div>

                {{-- fin contents --}}

              </div>
          </div>
      </div>
  </div>

  <script>

    function deletePost(e) {
  'use strict';
  if (confirm('年代タグに登録されている曲の「全ての年代Id」が削除されます。 本当に削除してもいいですか?')) {
  document.getElementById('delete_' + e.dataset.id).submit();
  }
  }

  </script>

</x-app-layout>
