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
                {{-- Image Column --}}
                <x-flash-message status="session('status')" />
                <div class="flex justify-end mb-4 border-b-2 border-gray-500">
                  <button onclick="location.href='{{route('admin.emotions.create')}}'" class="text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded text-lg mb-2 mr-4 ">新規登録</button>
                  </div>
                  <div class="flex flex-wrap">
                    @foreach ($emotions as $emotion)
                    <div class="w-1/2 md:w-1/3 lg:w-1/4 ">
                      <a href="{{route('admin.emotions.edit' , ['emotion'=>$emotion->id] )}}">
                          <div class="text-white text-center bg-pink-400 border-0 p-2 focus:outline-none hover:bg-pink-300 rounded text-lg mb-2 mr-4 ">タグ名:{{$emotion->name}}</div>
                      </a>
                      </div>
                    @endforeach
                  </div>
              {{-- End_Image Column --}}
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
