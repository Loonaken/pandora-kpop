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
                <x-original.create onclick="location.href='{{route('admin.songs.create')}}'" />
                {{-- Contents --}}
                <x-flash-message status="session('status')" />
                <div class="flex flex-wrap">
                  @foreach ($songs as $song)
                  <div class="w-1/2 md:w-1/3 lg:w-1/4 p-4 ">
                    <a href="{{route('admin.songs.edit' , ['song'=>$song->id] )}}">
                      <div class="border-2 border-lime-400 hover:border-cyan-300 ">
                      <x-original.simple-show :song="$song" />
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
