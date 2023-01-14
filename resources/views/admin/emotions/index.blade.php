<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          気分タグ一覧
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                {{-- Emotion Column --}}
                <x-flash-message status="session('status')" />
                <div class="flex justify-end mb-4 border-b-2 border-gray-500">
                  <button onclick="location.href='{{route('admin.emotions.create')}}'" class="text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded text-lg mb-2 mr-4 ">新規登録</button>
                  </div>
                  <div class="flex flex-wrap justify-around sm:gap-y-4 md:gap-x-4">
                  @foreach ($emotions as $emotion)
                        <div class=" w-2/3 md:w-1/4 lg:w-1/5 bg-pink-400 border-0 p-4 rounded-md focus:outline-none mb-4">
                          <div class="text-white text-center rounded text-lg mb-4">タグ名:{{$emotion->name}}</div>
                            <div class="flex grow justify-around  ">
                              {{-- 登録曲一覧ボタン --}}
                              <a class="text-white bg-white/25 py-2 px-4 focus:outline-none hover:bg-green-400/60 border-2 border-white-400 rounded text-lg  " href="{{route('admin.emotions.show', ['emotion'=>$emotion->id])}}">
                                <div class="flex">
                                  <p class="mr-1">曲</p>
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                  </svg>
                                </div>
                              </a>
                              {{-- fin 登録曲一覧ボタン --}}
                              {{--  タイトル編集ボタン --}}
                              <a class="text-white bg-white/25 border-2 border-white-400 p-2 focus:outline-none hover:bg-green-400/60 rounded text-lg  " href="{{route('admin.emotions.name.edit' , ['name'=>$emotion->id] )}}">
                                <div class="flex">
                                  <p class="mr-1">名前</p>
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                  </svg>
                                </div>
                              </a>
                              {{--  fin タイトル編集ボタン --}}
                            </div>
                          </div>
                          @endforeach
                        </div>
                  </div>
              {{-- End_Emotion Column --}}
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
