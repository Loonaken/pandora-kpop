<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        ランダム再生
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-2 lg:px-4">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="py-6 text-gray-900">
                {{-- Contents --}}

                {{-- song --}}

                {{-- song name --}}
                <div class="my-4">
                  <div class=" w-1/2 max-w-2xl mx-auto bg-pink-400 border-0 p-2 rounded-md focus:outline-none -mt-6 mb-4">
                  <div class="text-white text-center rounded text-3xl mb-2"> {{$song->name}}</div>
                  </div>
                {{-- song name --}}

                <section class="text-gray-600 body-font overflow-hidden">
                  <div class="container mt-4 py-8 mx-auto">
                    <div class="lg:w-4/5 mx-auto flex flex-wrap items-center border-b-2 border-gray-200 ">
                      <div class="basis-1/3 -mt-12 hover:border-4 hover:border-lime-300 transition delay-100 ease-in-out">
                        <a href="{{$song->youtube_link}}" target="_blank">
                        <x-thumbnail :filename="$song->image->filename" type="songs" class="mb-0  " />
                        </a>
                      </div>

                      <div class="basis-2/3 pl-8">
                        <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{$song->group->name}}</h1>
                        <p class="leading-relaxed"> {{$song->information}} </p>
                        <div class="flex  gap-4 mt-4">
                          <p>#{{$song->emotion->name}}</p>
                          <p>#{{$song->period->term}}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
                {{-- fin song --}}



                {{-- group --}}

                {{-- fin group --}}


                {{-- return button --}}
                <div class="flex justify-around items-center p-2 w-full">
                  <x-original.return return=ホーム onclick="location.href='{{route('user.dashboard')}}'" />
                  <x-original.action onclick="location.href='{{route('user.outputs.random')}}'" action=もう一回！ />
              </div>

                {{-- fin return button --}}

                {{-- fin contents --}}

              </div>
          </div>
      </div>
  </div>

</x-app-layout>
