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
                    <div class=" w-2/3 max-w-2xl mx-auto border-2 border-lime-300 px-4 pb-4 pt-2 rounded-md focus:outline-none mb-4">
                      <a href='{{route('admin.emotions.name.edit' , ['name'=>$emotion->id])}}'  class="text-black bg-white border-2 transition duration-300 ease-in-out border-yellow-300 hover:bg-yellow-200/80 py-2 focus:outline-none rounded text-sm -ml-4">タグ名編集</a>
                    <div class="text-black text-center rounded text-xl -mt-4 mb-2">タグ名: {{$emotion->name}}</div>
                    {{-- <div class="text-black text-center rounded text-xl ">表示順: {{$emotion->sort_order}}</div> --}}
                    </div>

                      {{-- fin  気分タグの名前編集 --}}

                      {{-- 気分タグで使用されている曲一覧 --}}
                      <div class="p-2 my-4 w-full mx-auto">
                        <p class="text-center underline tracker-wider underline-offset-4 text-lg ">登録曲一覧</p>
                        <x-original.create create="曲登録" onclick="location.href='{{route('admin.emotions.song.add', ['song'=>$emotion->id])}}'" />


                        {{-- 登録曲一覧 --}}
                        <div class="flex flex-wrap">
                          @if(!empty($songs->toArray()))
                          @foreach ($songs as $song)
                          <div class="w-1/2 md:w-1/3 lg:w-1/4 p-4 ">
                            <div class=" rounded-md p-4">
                                  <form method="POST" action="{{route('admin.emotions.song.destroy', ['song'=>$song->id])}}" >
                                    @csrf
                                    <div class="flex justify-end -mb-6">
                                      <button type="submit" class=" text-rose-500 z-10 bg-white  border-rose-500 focus:outline-none rounded-full ">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 ">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    </form>
                              <x-original.simple-show :song="$song" />
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

                    <div class="flex justify-around items-center p-2 mt-8 w-full">
                      <x-original.return onclick="location.href='{{route('admin.emotions.index')}}'" />
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
