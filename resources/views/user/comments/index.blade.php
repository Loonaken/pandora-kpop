<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        コメント
      </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto px-2 lg:px-4">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="py-6 text-gray-900">
              <x-flash-message status="session('status')" />

              {{-- content --}}
              <div class="flex justify-between mb-4 border-b-2 border-gray-500">
                <a href="{{route('user.comments.show')}}" class=" border-4 border-lime-500 hover:border-cyan-400  py-2 px-6 focus:outline-none  rounded text-lg mb-2 ml-4 transition duration-200 ease-in-out ">
                  自分の投稿
                </a>
                <a href="{{route('user.comments.create')}}" class="border-4 border-lime-500 hover:border-cyan-400  py-2 px-6 focus:outline-none  rounded text-lg mb-2 mr-4 transition duration-200 ease-in-out ">
                  新規登録
                </a>
                </div>

              <section class="text-gray-600 body-font">
                <div class="container p-2 mx-auto flex flex-wrap">
                    <div class="p-4 w-full max:w-lg">

                      {{-- comment --}}
                    <x-original.comment :comments=$comments />
                      {{-- fin comment --}}
                    </div>
                </div>
              </section>

              <div class="flex justify-around items-center p-2 w-full">
                <x-original.return return=ホーム onclick="location.href='{{route('user.dashboard')}}'" />
            </div>

              {{-- fin content --}}


            </div>
          </div>
      </div>
  </div>


</x-app-layout>
