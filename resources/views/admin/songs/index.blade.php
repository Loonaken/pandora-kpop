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
                {{-- 登録曲一覧 --}}
                <x-flash-message status="session('status')" />
                <x-registered_song_show :songs="$songs" />
                {{-- fin 登録曲一覧 --}}
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
