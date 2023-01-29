<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      あなたが聞きたかった曲
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto px-4 lg:px-4">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="py-6 text-gray-900">
                {{-- Contents --}}
                <div class=" w-2/3 max-w-2xl mx-auto border-2 border-lime-300 p-2 rounded-md focus:outline-none mb-4">
                    <div class="text-black text-center rounded text-xl  mb-2">あなたが検索したキーワード</div>
                    <div class="text-black text-center rounded text-base  mb-2"># {{$emotion->name ?? '気分タグ -> 未選択'}}</div>
                    <div class="text-black text-center rounded text-base  mb-2"># {{$period->term ?? '年代 -> 未選択' }}</div>
                    <div class="text-black text-center rounded text-base  mb-2">
                        @if ($typeId == 1){{--ここは後で修正して--}}
                        # 男性アーティスト
                        @elseif($typeId == 2){{--ここは後で修正して--}}
                        # 女性アーティスト
                        @else
                        # アーティスト種類 -> 未選択
                        @endif
                    </div>
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
                            <x-thumbnail :filename="$song->image->filename" class="mb-0  " />
                            </a>
                          </div>

                          <div class="basis-2/3 pl-8">
                            <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{$song->group->name}}</h1>
                            <p class="leading-relaxed"> {{$song->information}} </p>
                            <div class="flex gap-4 mt-4">
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
                {{-- <div class=" w-2/3 max-w-2xl mx-auto border-2 border-lime-300 p-2 rounded-md focus:outline-none mb-4">
                  <div class="text-black text-center rounded text-xl  mb-2">あなたが検索したキーワード</div>
                  <div class="text-black text-center rounded text-base  mb-2"># {{$emotion ? $view_emotion->name : '気分タグ -> 未選択'}}</div>
                  <div class="text-black text-center rounded text-base  mb-2"># {{$period ? $view_period->term : '年代 -> 未選択' }}</div>
                  <div class="text-black text-center rounded text-base  mb-2">
                    @if ($type == 1)
                    # 男性アーティスト
                    @elseif($type == 2)
                    # 女性アーティスト
                    @else
                    # アーティスト種類 -> 未選択
                    @endif
                  </div>
                  </div> --}}
                  <div class="m-8 mx-auto ">
                    <p class="text-xl text-center text-gray-500">あなたが聞きたかった曲が見つかりませんでした。</p>
                  </div>
                @endif
                {{--fin  0 Hit --}}


                {{-- return button --}}
                <div class="flex justify-around items-center p-2 w-full">
                  <x-original.return return=ホーム onclick="location.href='{{route('user.dashboard')}}'" />
                  <x-original.action onclick="location.href='{{route('user.outputs.create')}}'" action=やり直す！ />
              </div>
                {{-- fin return button --}}

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
