<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        ランダム再生
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-2 lg:px-4">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="py-6 px-2 text-gray-900">
                {{-- Contents --}}

                {{-- song --}}

                {{-- song name --}}
                <div class="my-4">
                  <x-original.user-show :song=$song /> {{--一つ一つの曲情報を表示している --}}
                </div>


                {{-- return button --}}
                <div class="flex justify-around items-center p-2 w-full">
                  <x-original.return return=ホーム onclick="location.href='{{route('user.dashboard')}}'" />
                  <x-original.action onclick="location.href='{{route('user.outputs.random')}}'" action=もう一度! />
              </div>

                {{-- fin return button --}}

                {{-- fin contents --}}

              </div>
          </div>
      </div>
  </div>

</x-app-layout>
