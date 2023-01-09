<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          画像編集
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-5xl mx-auto sm:px-6 lg:px-4">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                <form method="POST" action="{{route('admin.images.update', ['image'=>$image->id] )}}">
                    @csrf
                    @method('put')
                    <div class="my-4">
                      <div class="p-2 mb-2 w-full lg:w-2/3 mx-auto">
                        <div class="relative">
                          <label for="title" class="leading-7 text-sm text-gray-600">画像タイトル</label>
                          <input type="text" id="title" name="title" value="{{$image->title}}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                      </div>
                      <div class="p-2 mb-2 w-1/2 mx-auto ">
                        <div class="border rounded-md p-4">
                          <x-thumbnail :filename="$image->filename" type="songs" />
                        </div>
                      </div>

                      <div class="flex p-2 w-full">
                        <button type="button" onclick="location.href='{{route('admin.images.index')}}'" class="flex mx-auto text-black bg-gray-300 border-0 py-2 px-8 focus:outline-none hover:bg-gray-200 rounded text-lg">戻る</button>
                        <button type="submit" class="flex mx-auto text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg">更新</button>
                    </div>
                </form>
                <form id="delete_{{$image->id}}" method="POST" action="{{route('admin.images.destroy', ['image' => $image->id])}}">
                @csrf
                @method('delete')
                <div class="flex justify-center mt-8 p-4 w-full">
                  <a href="#" data-id="{{ $image->id }}" onclick="deletePost(this)" class=" text-white bg-red-500 border-0 py-2 px-8   focus:outline-none hover:bg-red-600 rounded text-base">削除</a>
                </div>
                </form>
              </div>
          </div>
      </div>
  </div>
  <script>
    function deletePost(e) {
    'use strict';
    if (confirm('本当に削除してもいいですか?')) {
    document.getElementById('delete_' + e.dataset.id).submit();
    }
    }
    </script>

</x-app-layout>
