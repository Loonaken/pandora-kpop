<x-app-layout>

  <div class="py-12">
      <div class="max-w-7xl mx-auto px-2 lg:px-4">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="py-6 text-gray-900">
                {{-- Contents --}}
                <div class=" w-2/3 max-w-2xl mx-auto border-2 border-lime-300 p-2 rounded-md focus:outline-none mb-4">
                  <div class="text-black text-center rounded text-xl mb-2 pt-2"># {{$period->term}}</div>
                  </div>

                {{-- song --}}

                @if (!empty($songs->toArray()))
                @foreach ($songs as $song)
                <div class="my-12 border-b-2 border-gray-400 last:border-0">
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
