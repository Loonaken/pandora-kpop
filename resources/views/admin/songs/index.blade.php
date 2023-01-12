<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
曲の管理
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                <div class="flex justify-end mb-4 border-b-2 border-gray-500">
                  <button onclick="location.href='{{route('admin.songs.create')}}'" class="text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded text-lg mb-2 mr-4 ">新規登録</button>
                </div>
                {{-- Contents --}}
                <x-flash-message status="session('status')" />
                <div class="flex flex-wrap">
                  @foreach ($songs as $song)
                      <div class="w-1/2 md:w-1/3 lg:w-1/4 p-4 ">
                      <a href="{{route('admin.songs.edit' , ['song'=>$song->id] )}}">
                        <div class=" rounded-md p-4">
                          <x-thumbnail :filename="$song->image->filename" type="songs" />
                          <div class="text-lg text-center border-x-2 border-b-2 text-gray-500">曲ID{{$song->id}}</div>
                          <div class="text-lg text-center border-x-2 border-b-2 text-gray-500">グループ名{{$song->group->name}}</div>
                          <div class="text-lg text-center border-x-2 border-b-2 text-gray-500">曲名{{$song->name}}</div>
                          <div class="text-lg text-center border-x-2 border-b-2 text-gray-500">#{{$song->emotion->name}}</div>
                          <div class="text-lg text-center border-x-2 border-b-2 text-gray-500">#{{$song->period->term}}</div>
                      </div>
                      </a>
                      </div>
                  @endforeach
            </div>
                {{-- fin Contents --}}
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
