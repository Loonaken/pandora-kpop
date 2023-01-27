<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          画像登録
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-5xl mx-auto sm:px-6 lg:px-4">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
                <form method="POST" action="{{route('admin.images.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="my-4">
                      <div class="p-2 mb-2 w-full lg:w-2/3 mx-auto">
                        <div class="relative">
                          <label for="image" class="leading-7 text-sm text-gray-600">画像</label>
                          <input type="file" id="image" name="files[][image]" multiple accept="image/png,image/jpeg,image/jpg" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          {{-- name = 複数の画像選択を可能にするために[]で連想配列で渡す
                          accept = jpg,jp,png形式のみを指定する --}}
                        </div>
                      </div>
                      <div class="p-2 mb-2 w-full lg:w-2/3 mx-auto ">

                      <div class="flex justify-around items-center p-2 w-full">
                        <button type="button" onclick="location.href='{{route('admin.images.index')}}'" class="border-4 border-gray-500 hover:border-gray-400  py-2 px-6 focus:outline-none  rounded text-lg  transition duration-200 ease-in-out ">戻る</button>
                        <button type="submit" class="border-4 border-lime-500 hover:border-cyan-400  py-2 px-6 focus:outline-none  rounded text-lg  transition duration-200 ease-in-out ">登録</button>
                    </div>
                </form>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
