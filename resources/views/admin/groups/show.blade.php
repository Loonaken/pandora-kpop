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
                    <div class=" w-1/2 max-w-2xl mx-auto border-2 border-lime-400 p-2 rounded-md focus:outline-none -mt-6 mb-6">
                    <div class="text-black text-center rounded text-3xl mb-2"> {{$group->name}}</div>
                    </div>


                    <div class="border-2 mt-4 border-gray-300 ">
                      <div class="w-1/2 lg:w-1/3 mx-auto border-4 my-2 border-gray-300">
                        <x-thumbnail :filename="$group->image->filename" class="mb-0" />
                      </div>
                      <div class="flex border-4 mx-24 md:mx-32 border-gray-400 ">
                        <div class="w-1/6 my-auto ">
                          <script src="https://code.iconify.design/3/3.0.1/iconify.min.js"></script>
                          <span class="iconify text-cyan-300 ml-2 w-8 h-8 md:w-12 md:h-12 " data-icon="ant-design:info-circle-outlined"></span>
                        </div>
                        <div class="w-5/6 sm:ml-4 md:text-lg lg:text-xl ml-2 lg:-ml-8 lg:-mr-4 ">
                          <div>・グループ名：{{$group->name}}</div>
                          {{-- アーティスト属性を表示させるため、条件分岐を行なっている --}}
                          @if ($group->type == \Constant::GROUP_LIST['male'])
                          <div>・アーティスト属性：男性アーティスト</div>
                          @elseif ($group->type == \Constant::GROUP_LIST['female'])
                          <div class=" flex flex-col md:flex-row" >
                            <div>・アーティスト属性</div>
                            <div class="ml-4 md:ml-0">：女性アーティスト</div>
                          </div>
                          @endif
                          <div>・表示順：{{$group->sort_order}}</div>
                        </div>
                      </div>

                      <div class="mt-6 mx-12">
                        <div class="border-b-4 border-black border-dotted">
                          グループについて
                        </div>
                        <div class="my-4">
                          {{$group->information ? $group->information : "グループの詳しい情報は記載されていません"}}
                        </div>
                      </div>

                      <div class="text-center flex justify-center">
                        <button onclick="location.href='{{route('admin.groups.edit' , ['group'=>$group->id])}}'"  class="text-black bg-white border-4 transition duration-300 ease-in-out border-yellow-300 hover:bg-yellow-200/80 py-2 px-8 focus:outline-none  rounded text-lg mb-2 mx-2 ">グループ編集</button>
                      </div>

                    </div>



                      {{-- fin  グループの名前編集 --}}

                      <div class="p-2 my-4 w-full mx-auto  ">
                        <p class="text-center underline tracker-wider underline-offset-4 text-lg ">登録曲一覧</p>
                        <x-original.create create="曲の作成" onclick="location.href='{{route('admin.songs.create')}}'" />
                        {{-- グループで使用されている曲一覧 --}}
                        <div class="flex flex-wrap">
                          @if(!empty($songs->toArray()))
                          @foreach ($songs as $song)
                          <div class="w-1/2 md:w-1/3 lg:w-1/4 p-4 ">
                            <div class=" rounded-md p-4">
                              <form id="delete_{{$song->id}}"  method="POST" action="{{route('admin.groups.song.destroy', ['song'=>$song->id])}}" >
                                @csrf
                                @method('delete')
                                <div class="flex justify-end -mb-6">
                                  <a href="#" data-id="{{$song->id}}" onclick="deletePost(this)"  type="submit" class=" text-rose-500 z-10 bg-white  border-rose-500 focus:outline-none rounded-full ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 ">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                  </a>
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
                        {{-- fin グループで使用されている曲一覧 --}}
                      </div>


                    </div>
                    <div class="flex justify-around items-center p-2 w-full">
                      <x-original.return onclick="location.href='{{route('admin.groups.index')}}'" />
                  </div>


                {{-- fin contents --}}

              </div>
          </div>
      </div>
  </div>

  <script>

    function deletePost(e) {
  'use strict';
  if (confirm('曲の「全ての情報」が削除されます。本当に削除してもいいですか?')) {
  document.getElementById('delete_' + e.dataset.id).submit();
  }
  }

  </script>

</x-app-layout>
