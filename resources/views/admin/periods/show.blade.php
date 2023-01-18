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



                      {{-- fin  年代タグの名前編集 --}}

                      {{-- 登録曲追加 --}}
                      <div class="p-2 my-4 w-full mx-auto bg-blue-300/25">
                        <p class="text-center underline tracker-wider underline-offset-4 text-lg ">登録曲一覧</p>
                        <div class="flex justify-end mb-4 border-b-2 border-gray-500">
                          <button onclick="location.href='{{route('admin.periods.song.add', ['song'=>$period->id])}}'" class="text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg mb-2 mr-4 ">追加</button>
                        </div>
                      {{-- fin 登録曲追加 --}}

                      {{-- 登録曲一覧 --}}
                        <x-registered_song_show :songs="$songs" />
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
  if (confirm('本当に削除してもいいですか?')) {
  document.getElementById('delete_' + e.dataset.id).submit();
  }
  }

  </script>

</x-app-layout>
