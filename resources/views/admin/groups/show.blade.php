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
                    {{-- グループの名前編集 --}}
                    <div class=" w-1/2 max-w-2xl mx-auto bg-pink-400 border-0 p-2 rounded-md focus:outline-none -mt-6 mb-6">
                    <div class="text-white text-center rounded text-3xl mb-2"> {{$group->name}}</div>
                    </div>

                    <div class="flex justify-between mb-4 border-b-8 border-gray-500">
                      <button onclick="location.href='{{route('admin.groups.create')}}'" class="text-black bg-white border-4 transition duration-300 ease-in-out border-blue-300 hover:bg-blue-200/80 py-2 px-8 focus:outline-none  rounded text-lg mb-2 ml-2 ">グループ追加</button>
                      <button onclick="location.href='{{route('admin.songs.create')}}'" class="text-black bg-white border-4 transition duration-300 ease-in-out border-blue-300 hover:bg-blue-200/80 py-2 px-8 focus:outline-none  rounded text-lg mb-2 mr-2 ">曲の追加</button>
                    </div>

                    <div class="border-2 mt-4 border-gray-300 ">
                      <div class="w-1/2 lg:w-1/3 mx-auto border-4 my-2 border-orange-300">
                        <x-thumbnail :filename="$group->image->filename" type="songs" class="mb-0" />
                      </div>
                      <div class="flex border-4 mx-24 md:mx-32 border-gray-400 ">
                        <div class="w-1/6 my-auto ">
                          <script src="https://code.iconify.design/3/3.0.1/iconify.min.js"></script>
                          <span class="iconify text-red-300 ml-2 w-8 h-8 md:w-12 md:h-12 " data-icon="ant-design:info-circle-outlined"></span>
                        </div>
                        <div class="w-5/6 md:text-lg lg:text-xl ml-2 lg:-ml-8 lg:-mr-4 ">
                          <div>・グループ名：{{$group->name}}</div>
                          <div>・アーティスト属性：{{$group->type}}</div>
                          <div>・表示順：{{$group->sort_order}}</div>
                        </div>
                      </div>

                      <div class="mt-6 mx-12">
                        <div class="border-b-4 border-black border-dotted">
                          グループについて
                        </div>
                        @if (!empty($group->information))
                        <div class="my-4">
                          {{$group->information}}
                        </div>
                        @endif
                        @if (empty($group->information))
                        <div class="my-4">
                          グループの詳しい情報は記載されていません
                        </div>
                        @endif
                      </div>
                      <div class="text-center">
                        <button onclick="location.href='{{route('admin.groups.edit' , ['group'=>$group->id])}}'"  class="text-black bg-white border-4 transition duration-300 ease-in-out border-yellow-300 hover:bg-yellow-200/80 py-2 px-8 focus:outline-none  rounded text-lg mb-2 mr-2 ">更新</button>
                      </div>

                    </div>



                      {{-- fin  グループの名前編集 --}}

                      {{-- グループで使用されている曲一覧 --}}
                      <div class="p-2 my-4 w-full mx-auto  bg-blue-300/25">
                        <div class="flex mb-4 border-b-2 justify-center border-gray-500 text-lg leading-8">
                        登録曲一覧
                        </div>
                        <div class="flex flex-wrap">
                          @if(!empty($songs->toArray()))
                          @foreach ($songs as $song)
                              <div class="w-1/2 md:w-1/3 lg:w-1/4 p-4 ">
                                <div class=" rounded-md p-4">
                                  <form id="delete_{{$song->id}}" method="POST" action="{{route('admin.groups.song.destroy', ['song'=>$song->id])}}">
                                    @csrf
                                    @method('delete')
                                    <div class="flex justify-end -mb-6">
                                      <a href='#' data-id="{{$song->id}}" onclick="deletePost(this)" type="submit" class=" text-white z-10 bg-red-500 border-0 focus:outline-none hover:bg-red-600 rounded-full text-base">
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
                                  <div class="text-lg text-center border-x-2 border-b-2 text-gray-500">#{{$song->emotion->name}}</div>
                                  <div class="text-lg text-center border-x-2 border-b-2 text-gray-500">#{{$song->group->name}}</div>
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
                      {{-- fin グループで使用されている曲一覧 --}}


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
