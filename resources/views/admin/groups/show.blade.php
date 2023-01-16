<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
グループの<br>登録曲一覧
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
                    <div class=" w-1/2 max-w-2xl mx-auto bg-pink-400 border-0 p-2 rounded-md focus:outline-none mb-4">
                    <div class="text-white text-center rounded text-3xl mb-2"> {{$group->name}}</div>
                    </div>


                      {{-- fin  年代タグの名前編集 --}}

                      {{-- 年代タグで使用されている曲一覧 --}}
                      <div class="p-2 my-4 w-full lg:w-3/4 mx-auto bg-blue-300/25">
                        <p class="text-center underline tracker-wider underline-offset-4 text-lg ">登録曲一覧</p>
                        <div class="flex justify-end mb-4 border-b-2 border-gray-500">
                          <button onclick="location.href='{{route('admin.groups.destroy' , ['group'=>$group->id])}}'" class="text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-500 rounded text-lg mb-2 mr-8 ">削除</button>
                        </div>
                        <div class="flex flex-wrap">
                          @if(!empty($songs->toArray()))
                          @foreach ($songs as $song)
                              <div class="w-1/2 md:w-1/3 lg:w-1/4 p-4 ">
                                <div class=" rounded-md p-4">
                                  <x-thumbnail :filename="$song->image->filename" type="songs" />
                                  <div class="text-lg text-center border-x-2 border-b-2 text-gray-500">曲ID{{$song->id}}</div>
                                  <div class="text-lg text-center border-x-2 border-b-2 text-gray-500">グループ名{{$song->group->name}}</div>
                                  <div class="text-lg text-center border-x-2 border-b-2 text-gray-500">曲名{{$song->name}}</div>
                                  <div class="text-lg text-center border-x-2 border-b-2 text-gray-500">#{{$song->emotion->name}}</div>
                                  <div class="text-lg text-center border-x-2 border-b-2 text-gray-500">#{{$song->group->name}}</div>
                                </div>
                              </div>
                          @endforeach
                          @endif

                          @if(empty($songs->toArray()))
                            <div class="m-8 mx-auto ">
                              <p class="text-lg text-gray-400">このタグに登録されている曲は現在ありません。</p>
                          @endif

                        </div>
                  </div>
                      {{-- fin 年代タグで使用されている曲一覧 --}}


                    </div>
                    <div class="flex p-2 w-full">
                        <button type="button" onclick="location.href='{{route('admin.groups.index')}}'" class="flex mx-auto text-black bg-gray-300 border-0 py-2 px-8 focus:outline-none hover:bg-gray-200 rounded text-lg">戻る</button>
                    </div>

                {{-- fin contents --}}

              </div>
          </div>
      </div>
  </div>

  <script>

    function deletePost(e) {
  'use strict';
  if (confirm('本当に削除してもいいですか?')) {
  document.getElementById('delete_' + e.dataset.id).submit();
  }
  }

  </script>

</x-app-layout>
