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

                {{--
                コード説明
                  - L_23,4.. 絞り込み検索がされた際は気分タグの名前/年代名を表示、
                              されていない時は未選択であることを表示
                  --}}

                {{-- 検索キーワード --}}
                <div class=" w-2/3 max-w-2xl mx-auto border-2 border-lime-300 p-2 rounded-md focus:outline-none mb-4">
                    <div class="text-black text-center rounded text-xl  mb-2">あなたが検索したキーワード</div>
                    <div class="text-black text-center rounded text-base  mb-2"># {{$catchEmotionName ? $catchEmotionName->name : '気分タグ -> 未選択'}}</div>
                    <div class="text-black text-center rounded text-base  mb-2"># {{$catchPeriodTerm ? $catchPeriodTerm->term : '年代 -> 未選択' }}</div>
                    <div class="text-black text-center rounded text-base  mb-2">
                        @if ($typeId == \Constant::GROUP_LIST['male'])
                        # 男性アーティスト
                        @elseif($typeId == \Constant::GROUP_LIST['female'])
                        # 女性アーティスト
                        @else
                        # アーティスト種類 -> 未選択
                        @endif
                    </div>
                </div>
                {{-- fin 検索キーワード --}}

                {{-- song --}}

                @if (!empty($songs->toArray()))
                @foreach ($songs as $song)

                <div class="my-12 border-b-2 border-gray-400 last:border-0">
                  <x-original.user-show :song=$song /> {{--一つ一つの曲情報を表示している --}}
                </div>
                @endforeach
                @endif

                {{-- 0 Hit --}}
                @if (empty($songs->toArray()))
                  <div class="m-8 mx-auto ">
                    <p class="text-xl text-center text-gray-500">あなたが聞きたかった曲が見つかりませんでした。</p>
                  </div>
                @endif
                {{--fin  0 Hit --}}

                {{-- fin song --}}

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

</x-app-layout>
