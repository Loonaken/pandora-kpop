<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
曲の作成
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                {{-- Contents --}}

                <form method="POST" action="{{route('admin.songs.store')}}" >
                    @csrf

                    <div class="my-4">
                      {{-- 曲名の入力 --}}
                      <div class="p-2 mb-2 w-full lg:w-2/3 mx-auto">
                        <div class="relative">
                          <label for="name" class="leading-7 text-sm text-gray-600">曲名 *必須</label>
                          <input type="text" id="name" name="name" value="{{old('name')}}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                      </div>
                      {{-- fin 曲名の入力 --}}

                      {{-- 曲情報の入力 --}}
                      <div class="p-2 mb-2 w-full lg:w-2/3 mx-auto">
                        <div class="relative">
                          <label for="information" class="leading-7 text-sm text-gray-600">曲について</label>
                          <textarea id="information" name="information" rows="10" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                        </div>
                      </div>
                      {{-- fin 曲情報の入力 --}}

                      {{-- emotionタグ選択 --}}
                      <div class="p-2 mb-2 w-full lg:w-2/3 mx-auto">
                        <div class="relative">
                          <p class="leading-7 text-sm text-gray-600">気分タグ</p>
                          <select name="emotion">
                            @foreach ($emotions as $emotion)
                            <option value="{{$emotion->id}}">
                              {{$emotion->name}}
                            </option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      {{-- fin emotionタグ選択 --}}

                      {{-- periodタグ選択 --}}
                      <div class="p-2 mb-2 w-full lg:w-2/3 mx-auto">
                        <div class="relative">
                          <p class="leading-7 text-sm text-gray-600">年代タグ</p>
                          <select name="period">
                            @foreach ($periods as $period)
                            <option value="{{$period->id}}">
                              {{$period->term}}
                            </option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      {{-- fin periodタグ選択 --}}

                      {{-- groupタグ選択 --}}
                      <div class="p-2 mb-2 w-full lg:w-2/3 mx-auto">
                        <div class="relative">
                          <p class="leading-7 text-sm text-gray-600">グループ名</p>
                          <select name="group">
                            @foreach ($groups as $group)
                            <option value="{{$group->id}}">
                              {{$group->name}}
                            </option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      {{-- fin groupタグ選択 --}}

                    </div>
                    <div class="flex p-2 w-full">
                        <button type="button" onclick="location.href='{{route('admin.songs.index')}}'" class="flex mx-auto text-black bg-gray-300 border-0 py-2 px-8 focus:outline-none hover:bg-gray-200 rounded text-lg">戻る</button>
                        <button type="submit" class="flex mx-auto text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg">登録</button>
                    </div>
                </form>

                {{-- fin Contents --}}
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
