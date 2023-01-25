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

              {{-- content --}}

              <form method="POST" action="{{route('user.comments.store')}}" >
                @csrf
                <div class="my-4">
                  {{-- User_id取得 --}}
                  <input type="hidden" id="user_id" name="user_id" value="{{$user->id}}">
                  {{-- fin User_id取得 --}}

                  {{-- titleの入力 --}}
                  <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    <div class="p-2 mb-2 w-full lg:w-2/3 mx-auto">
                      <div class="relative px-6">
                        <label for="title" class="leading-7 text-sm text-gray-600">タイトル *必須</label>
                        <input type="text"  id="title" name="title" value="{{old('title')}}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        <small class="text-red-500">最大20字</small>
                      </div>
                    </div>
                    {{-- fin titleの入力 --}}

                    {{-- 内容の入力 --}}
                  <x-input-error :messages="$errors->get('body')" class="mt-2" />
                    <div class="p-2 mb-2 w-full lg:w-2/3 mx-auto">
                      <div class="relative px-6">
                        <label for="body" class="leading-7 text-sm text-gray-600">内容 *必須</label>
                        <textarea id="body" name="body" rows="3" value="{{old('body')}}"  required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                        <small class="text-red-500">最大100字</small>
                      </div>
                    </div>
                    {{-- fin 内容の入力 --}}
                </div>

                <div class="flex justify-around items-center p-2 w-full">
                  <x-original.return onclick="location.href='{{route('user.comments.index')}}'" />
                  <x-original.action action=登録 />
              </div>
            </form>

              {{-- fin content --}}

            </div>
          </div>
      </div>
  </div>


</x-app-layout>
