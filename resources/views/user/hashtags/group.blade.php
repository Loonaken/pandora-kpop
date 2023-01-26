<x-app-layout>

  <div class="py-12">
      <div class="max-w-7xl mx-auto px-2 lg:px-4">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="py-6 text-gray-900">
                {{-- Contents --}}
                <div class=" w-2/3 max-w-2xl mx-auto border-2 border-lime-300 p-2 rounded-md focus:outline-none mb-4">
                  <div class="text-black text-center rounded text-xl mb-2 pt-2"># {{$group->name}}</div>
                  </div>

                {{-- song --}}

                @if (!empty($songs->toArray()))
                @foreach ($songs as $song)

                {{-- song name --}}
                <div class="my-12 border-b-2 border-gray-400 last:border-0">
                  <div class=" w-1/2 max-w-2xl mx-auto bg-pink-400 border-0 p-2 rounded-md focus:outline-none -mt-6 mb-4">
                    <div class="text-white text-center rounded text-3xl mb-2"> {{$song->name}}</div>
                  </div>
                {{-- fin song name --}}

                    <section class="text-gray-600 body-font overflow-hidden ">
                      <div class="container mb-4 py-2 mx-auto  ">
                        <div class="lg:w-4/5 mx-auto flex flex-wrap items-center ">
                          <div class="basis-1/3 hover:border-4 hover:border-lime-300 transition delay-100 ease-in-out">
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
