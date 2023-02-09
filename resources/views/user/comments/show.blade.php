<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        投稿したコメント
      </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto px-2 lg:px-4">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="py-6 text-gray-900">

              {{-- content --}}
              <x-original.create onclick="location.href='{{route('user.comments.create')}}'" />
              <section class="text-gray-600 body-font">
                <div class="container p-2 mx-auto flex flex-wrap">
                    <div class="p-4 w-full max:w-lg">

                      {{-- Hv comment --}}
                      @if (!empty(($comments)->toArray()))
                      <x-original.comment :comments=$comments />
                      @endif
                      {{-- fin Hvcomment --}}
                      @if (empty(($comments)->toArray()))
                      <div class="m-8  ">
                        <p class="text-lg text-center text-gray-400">コメントが投稿されていません。</p>
                      </div>
                      @endif

                    </div>
                </div>
              </section>

              <div class="flex justify-around items-center p-2 w-full">
                <x-original.return onclick="location.href='{{route('user.comments.index')}}'" />
              </div>
              {{-- fin content --}}


            </div>
          </div>
      </div>
  </div>


</x-app-layout>
