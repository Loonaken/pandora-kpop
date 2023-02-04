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
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                      <div class="p-2 mb-2 w-full lg:w-2/3 mx-auto">
                        <div class="relative">
                          <label for="name" class="leading-7 text-sm text-gray-600">曲名</label>
                          <input type="text" id="name" name="name" value="{{old('name')}}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                      {{-- fin 曲名の入力 --}}

                      {{-- 曲情報の入力 --}}
                    <x-input-error :messages="$errors->get('information')" class="mt-2" />
                          <label for="information" class="leading-7 text-sm text-gray-600">曲について *任意</label>
                          <textarea id="information" name="information" rows="3"  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                      {{-- fin 曲情報の入力 --}}

                      {{-- youtube_linkの入力 --}}
                    <x-input-error :messages="$errors->get('youtube_link')" class="mt-2" />

                          <label for="youtube_link" class="leading-7 text-sm text-gray-600">Youtube_link </label>
                          <input type="text" id="youtube_link" name="youtube_link" value="{{old('youtube_link')}}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                      {{-- fin youtube_linkの入力 --}}

                      <div class="my-4 md:flex justify-between">
                      {{-- groupタグ選択 --}}
                        <div class="mt-2 md:mt-0">
                          <p class="leading-7 text-sm text-gray-600">グループ名</p>
                          <select name="group">
                            <option value = "">
                              選択してください
                            </option>
                            @foreach ($groups as $group)
                            <option value="{{$group->id}}">
                              {{$group->name}}
                            </option>
                            @endforeach
                          </select>
                        </div>
                      {{-- fin groupタグ選択 --}}

                      {{-- emotionタグ選択 --}}
                        <div class="mt-2 md:mt-0">
                          <p class="leading-7 text-sm text-gray-600">気分タグ</p>
                          <select name="emotion">
                            <option value = "">
                              選択してください
                            </option>
                            @foreach ($emotions as $emotion)
                            <option value="{{$emotion->id}}">
                              {{$emotion->name}}
                            </option>
                            @endforeach
                          </select>
                        </div>
                      {{-- fin emotionタグ選択 --}}

                      {{-- periodタグ選択 --}}
                      <div class="my-2 md:my-0">
                          <p class="leading-7 text-sm text-gray-600">年代タグ</p>
                          <select name="period">
                            <option value = "">
                              選択してください
                            </option>
                            @foreach ($periods as $period)
                            <option value="{{$period->id}}">
                              {{$period->term}}
                            </option>
                            @endforeach
                          </select>
                        </div>
                      {{-- fin periodタグ選択 --}}
                    </div>


                      {{-- 画像選択 --}}
                      {{-- 記述量が多く、使い回しをするのでComponent化をした --}}
                      {{-- - ??? 以下のconponent SHOW --}}
                      <x-original.select-image_create :images="$images" name="images" />
                      <x-input-error :messages="$errors->get('images')" class="mt-2" />
                      {{-- fin 画像選択 --}}


                    <div class="flex justify-around items-center p-2 mt-12 w-full">
                      <x-original.return onclick="location.href='{{route('admin.songs.index')}}'" />
                      <x-original.action action=登録 />
                  </div>
                </form>

                {{-- fin contents --}}

              </div>
          </div>
      </div>
  </div>

  <script>
    'use strict'
    const images = document.querySelectorAll('.image') //全てのimageタグを取得

    images.forEach(image => { // 1つずつ繰り返す
      image.addEventListener('click', function(e){ // クリックしたら
        const imageName = e.target.dataset.id.substr(0, 6) //data-idの6文字
        const imageId = e.target.dataset.id.replace(imageName + '_', '') // 6文字カット
        const imageFile = e.target.dataset.file
        const imagePath = e.target.dataset.path
        const modal = e.target.dataset.modal
        // サムネイルと input type=hiddenのvalueに設定
        document.getElementById(imageName + '_thumbnail').src = imagePath + '/' + imageFile
        document.getElementById(imageName + '_hidden').value = imageId
        MicroModal.close(modal); //モーダルを閉じる
      })
    })
  </script>

</x-app-layout>
