<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
気分タグの<br>登録曲一覧
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                {{-- Contents --}}
                <x-flash-message status="session('status')" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />

                  <div class="my-4">
                    {{-- 気分タグの名前編集 --}}
                    <div class=" w-2/3 max-w-2xl mx-auto bg-pink-400 border-0 p-4 rounded-md focus:outline-none mb-4">
                    <div class="text-white text-center rounded text-lg mb-2">タグ名: {{$emotion->name}}</div>
                    <div class="text-white text-center rounded text-lg ">表示順: {{$emotion->sort_order}}</div>
                    </div>
                  <div class="text-center flex justify-center">
                    <form id="delete_{{$emotion->id}}" action="{{route('admin.emotions.destroy' , ['emotion'=>$emotion->id])}}" method="post">
                      @csrf
                      @method('delete')
                        <button type='submit' data-id="{{$emotion->id}}}" onclick="deletePost(this)" class="text-black bg-white border-4 transition duration-300 ease-in-out border-red-300 hover:bg-red-200/80 py-2 px-8 focus:outline-none  rounded text-lg mb-2 mx-2 ">削除</button>
                    </form>
                    <button onclick="location.href='{{route('admin.emotions.name.edit' , ['name'=>$emotion->id])}}'"  class="text-black bg-white border-4 transition duration-300 ease-in-out border-yellow-300 hover:bg-yellow-200/80 py-2 px-8 focus:outline-none  rounded text-lg mb-2 mx-2 ">更新</button>
                  </div>


                      {{-- fin  気分タグの名前編集 --}}

                      {{-- 気分タグで使用されている曲一覧 --}}
                      <div class="p-2 my-4 w-full mx-auto bg-blue-300/25">
                        <p class="text-center underline tracker-wider underline-offset-4 text-lg ">登録曲一覧</p>
                        <div class="flex justify-end mb-4 border-b-2 border-gray-500">
                          <button onclick="location.href='{{route('admin.emotions.song.add', ['song'=>$emotion->id])}}'" class="text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg mb-2 mr-4 ">追加</button>
                        </div>

                        {{-- 登録曲一覧 --}}
                        <div class="flex flex-wrap">
                          @if(!empty($songs->toArray()))
                          @foreach ($songs as $song)
                          <div class="w-1/2 md:w-1/3 lg:w-1/4 p-4 ">
                            <div class=" rounded-md p-4">
                                  <form method="POST" action="{{route('admin.emotions.song.destroy', ['song'=>$song->id])}}" >
                                    @csrf
                          <x-registered_song_show :song="$song" />
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
                      {{-- fin 気分タグで使用されている曲一覧 --}}


                    </div>
                    <div class="flex p-2 w-full">
                        <button type="button" onclick="location.href='{{route('admin.emotions.index')}}'" class="flex mx-auto text-black bg-gray-300 border-0 py-2 px-8 focus:outline-none hover:bg-gray-200 rounded text-lg">戻る</button>
                    </div>

                {{-- fin contents --}}

              </div>
          </div>
      </div>
  </div>

  <script>

    function deletePost(e) {
  'use strict';
  if (confirm('気分タグに登録されている曲の「全ての気分Id」が削除されます。本当に削除してもいいですか?')) {
  document.getElementById('delete_' + e.dataset.id).submit();
  }
  }

  </script>

</x-app-layout>
