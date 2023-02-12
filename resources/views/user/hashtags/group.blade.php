<x-app-layout>

  <div class="">
      <div class="max-w-7xl mx-auto px-2 lg:px-4">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="py-6 text-gray-900">
                {{-- Contents --}}
                  <div class=" max-w-xl mx-auto border-2 border-lime-400 p-2 rounded-md focus:outline-none mb-6">
                    <div class="text-black text-center rounded text-3xl mb-2"> {{$group->name}}</div>
                    </div>


                    <div class="border-2 mt-4 border-gray-300 ">
                      <div class="w-2/3 sm:w-1/3 max-w-md mx-auto border-4 my-2 border-gray-300">
                        <x-thumbnail :path="$group->image->path" class="mb-0" />
                      </div>
                      <div class="flex border-4 mx-4 sm:mx-32 border-gray-400 ">
                        <div class="w-1/6 my-auto ">
                          <script src="https://code.iconify.design/3/3.0.1/iconify.min.js"></script>
                          <span class="iconify text-cyan-300 ml-2 w-8 h-8 md:w-12 md:h-12 " data-icon="ant-design:info-circle-outlined"></span>
                        </div>
                        <div class="w-5/6 sm:ml-4 md:text-lg lg:text-xl ml-2 lg:-ml-8 lg:-mr-4 ">
                          <div>・グループ名：{{$group->name}}</div>
                          {{-- アーティスト属性を表示させるため、条件分岐を行なっている --}}
                          @if ($group->type == \Constant::GROUP_LIST['male'])
                          <div>・男性アーティスト</div>
                          @elseif ($group->type == \Constant::GROUP_LIST['female'])
                          <div>・女性アーティスト</div>
                          @endif
                          {{-- <div>・表示順：{{$group->sort_order}}</div> --}}
                        </div>
                      </div>

                      <div class="mt-6 mx-4 sm:mx-12">
                        <div class="border-b-4 border-black border-dotted">
                          グループについて
                        </div>
                        <div class="my-4">
                          {{$group->information ? $group->information : "グループの詳しい情報は記載されていません"}}
                        </div>
                      </div>
                    </div>

                {{-- song --}}

                @if (!empty($songs->toArray()))
                @foreach ($songs as $song)

                <div class="my-8 border-b-2 border-gray-400 last:border-0">
                  <x-original.user-show :song=$song /> {{--一つ一つの曲情報を表示している --}}
                </div>
                @endforeach
                @endif

                {{-- fin song --}}

                {{-- 0 Hit --}}
                @if (empty($songs->toArray()))
                  <div class="m-8 mx-auto ">
                    <p class="text-xl text-center text-gray-500">このハッシュタグに当てはまる曲は見つかりませんでした。</p>
                  </div>
                @endif
                {{--fin  0 Hit --}}


                {{-- return button --}}
                <div class="flex justify-around items-center p-2 w-full">
                  <x-original.return return=ホーム onclick="location.href='{{route('user.dashboard')}}'" />
                  <x-original.action onclick="location.href='{{route('user.hashtags.refer')}}'" action=#再選択 />
              </div>
                {{-- fin return button --}}

                {{-- fin contents --}}

              </div>
          </div>
      </div>
  </div>

</x-app-layout>
