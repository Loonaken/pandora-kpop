<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
年代タグの編集
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                {{-- Contents --}}
                <x-flash-message status="session('status')" />
                <x-input-error :messages="$errors->get('term')" class="mt-2" />
                <x-input-error :messages="$errors->get('sort_order')" class="mt-2" />
                <form method="POST" action="{{route('admin.periods.term.update', ['term'=>$period->id ])}}" >
                  @csrf
                  @method('put')
                    {{-- 年代タグの編集 --}}
                      <div class="p-2 mb-2 w-full lg:w-2/3 mx-auto">
                        <div class="relative flex ">
                          <div class="basis-3/4">
                          <label for="term" class=" ml-2 text-sm text-gray-600">年代</label>
                          <input type="text" id="term" name="term" value="{{$period->term}}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          </div>
                          <div class="basis-1/4">
                          <label for="sort_order" class=" ml-2 text-sm text-gray-600">表示順</label>
                          <input type="text" id="sort_order" name="sort_order" value="{{$period->sort_order}}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          </div>
                        </div>
                      </div>

                      {{-- fin  年代タグの編集 --}}

                      {{-- 年代タグで使用されている曲一覧 --}}
                      <div class="p-2 my-4 w-full lg:w-3/4 mx-auto ">
                        <p class="text-center underline tracker-wider underline-offset-4 text-lg ">登録曲一覧</p>
                        <div class="flex flex-wrap">
                          @if(!empty($songs->toArray()))
                          @foreach ($songs as $song)
                            <div class="w-1/2 md:w-1/3 lg:w-1/4 p-4 ">
                              <x-original.simple-show :song="$song" />
                            </div>
                          @endforeach
                          @endif

                          @if(empty($songs->toArray()))
                            <div class="m-8 mx-auto ">
                              <p class="text-lg text-gray-400">このタグに登録されている曲は現在ありません。</p>
                          @endif

                        </div>
                  </div>
                      {{-- fin 気分タグで使用されている曲一覧 --}}
                    </div>
                    <div class="flex justify-around items-center p-2 w-full">
                      <x-original.return onclick="location.href='{{route('admin.periods.index')}}'" />
                      <x-original.action action=更新 />
                  </div>
                </form>

                <div class="text-center flex justify-center">
                  <form id="delete_{{$period->id}}" action="{{route('admin.periods.destroy' , ['period'=>$period->id])}}" method="post">
                    @csrf
                    @method('delete')
                      <a href="#" type='submit' data-id="{{$period->id}}" onclick="deletePost(this)" class="text-black bg-white border-4 transition duration-300 ease-in-out border-red-300 hover:bg-red-200/80 py-2 px-6 focus:outline-none  rounded text-lg mb-2 mx-2 ">削除</a>
                  </form>
                </div>

                {{-- fin contents --}}

              </div>
          </div>
      </div>
  </div>

  <script>

    function deletePost(e) {
  'use strict';
  if (confirm('年代タグに登録されている曲の「全ての年代Id」が削除されます。本当に削除してもいいですか?')) {
  document.getElementById('delete_' + e.dataset.id).submit();
  }
  }

  </script>

</x-app-layout>
