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
                      @foreach ($comments as $comment)
                      <div class="border-2 rounded-lg border-gray-200 border-opacity-50 px-8 py-6 sm:flex-row flex-col mb-2">
                        @can('update', $comment)
                        <div class="flex justify-end border-gray-500">
                          <a href="{{route('user.comments.edit', ['comment'=>$comment->id])}}" class="border-2 border-lime-500 hover:border-cyan-400 p-2 focus:outline-none rounded text-lg -my-2 transition duration-200 ease-in-out ">
                          編集
                        </a>
                        </div>
                        @endcan

                      <div class="flex">
                        <div class="flex-none w-16 h-16 sm:mr-8 sm:mb-0 mb-4 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 flex-shrink-0">
                          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                          </svg>
                        </div>
                        <div class="grow">
                          <h2 class="text-gray-900 text-lg title-font font-medium underline underline-offset-1 mb-3">{{$comment->title}}</h2>
                          <p class="leading-relaxed text-base mt-2">{{$comment->body}}</p>
                          <p class="text-right mt-4">
                            投稿日  {{$comment->created_at->format('Y-m-d');}}　 投稿者 {{$comment->user->name}}</p>
                        </div>
                      </div>
                      </div>
                      @endforeach
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

              {{-- fin content --}}


            </div>
          </div>
      </div>
  </div>


</x-app-layout>
