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
                    <div class=" w-2/3 max-w-2xl mx-auto border-2 border-lime-300 p-4 rounded-md focus:outline-none mb-4">
                    <div class="text-black text-center rounded text-xl mb-2">年代: {{$period->term}}年</div>
                    <div class="text-black text-center rounded text-xl ">表示順: {{$period->sort_order}}</div>
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
                      <div class="p-2 my-4 w-full mx-auto ">
                        <p class="text-center underline tracker-wider underline-offset-4 text-lg ">登録曲一覧</p>
                        <x-original.create create="曲登録" onclick="location.href='{{route('admin.periods.song.add', ['song'=>$period->id])}}'" />
                      {{-- fin 登録曲追加 --}}

                      {{-- 登録曲一覧 --}}
                      <div class="flex flex-wrap">
                        @if(!empty($songs->toArray()))
                        @foreach ($songs as $song)
                        <div class="w-1/2 md:w-1/3 lg:w-1/4 p-4 ">
                          <div class=" rounded-md p-4">
                            <form method="POST" action="{{route('admin.periods.song.destroy', ['song'=>$song->id])}}" >
                              @csrf
                        <x-original.registered_song_show :song="$song" />
                            </div>
                          </div>
                        @endforeach
                        @endif

                        @if(empty($songs->toArray()))
                          <div class="m-8 mx-auto ">
                            <p class="text-lg text-gray-400">このグループに登録されている曲は現在ありません。</p>
                        @endif
                          </div>

                      </div>
                      {{-- fin 登録曲一覧 --}}

                  </div>
                      {{-- fin 年代タグで使用されている曲一覧 --}}


                    </div>
                    <div class="flex justify-around items-center p-2 w-full">
                      <x-original.return onclick="location.href='{{route('admin.periods.index')}}'" />
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
