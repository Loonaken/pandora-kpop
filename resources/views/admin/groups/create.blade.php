<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
グループの作成
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                {{-- Contents --}}
                <form method="POST" action="{{route('admin.groups.store')}}" >
                  @csrf

                  <div class="my-4">
                    {{-- グループ名の入力 --}}
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                      <div class="p-2 mb-2 w-full lg:w-2/3 mx-auto">
                        <div class="relative">
                          <label for="name" class="leading-7 text-sm text-gray-600">グループ名 *必須</label>
                          <input type="text" placeholder="例: Loona" id="name" name="name" value="{{old('name')}}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                      </div>
                      {{-- fin グループ名の入力 --}}

                      {{-- グループ情報の入力 --}}
                    <x-input-error :messages="$errors->get('information')" class="mt-2" />
                      <div class="p-2 mb-2 w-full lg:w-2/3 mx-auto">
                        <div class="relative">
                          <label for="information" class="leading-7 text-sm text-gray-600">グループについて</label>
                          <textarea id="information" placeholder="例: このグループはエネルギッシュです。" name="information" rows="3" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                        </div>
                      </div>
                      {{-- fin グループ情報の入力 --}}

                      <div class="flex mx-auto w-full lg:w-2/3 mb-6 ">
                        {{-- Typeの入力 --}}
                        <div class="p-2 mb-2  ">
                        <x-input-error :messages="$errors->get('type')" class="mt-2" />
                          <div class="relative ">
                            <div>
                              <label for="sort_order" class="leading-7 text-sm text-gray-600">アーティスト属性</label>
                            </div>
                            <div>
                              <select name="type">
                                <option value = "">
                                  選択してください
                                </option>
                                <option value="{{ \Constant::GROUP_LIST['male']}}">
                                  1, 男性アーティスト
                                </option>
                                <option value="{{ \Constant::GROUP_LIST['female']}}">
                                  2, 女性アーティスト
                                </option>
                              </select>
                            </div>
                          </div>
                        </div>
                      {{-- fin Typeの入力 --}}

                      {{-- 表示順の入力 --}}
                        <div class="p-2 mb-2  mx-auto">
                        <x-input-error :messages="$errors->get('sort_order')" class="mt-2" />
                          <div class="relative">
                            <div>
                            <label for="sort_order" class="leading-7 text-sm text-gray-600">表示順</label>
                            </div>
                            <div>
                            <input type="text" id="sort_order" name="sort_order" value="{{old('sort_order')}}" class="bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                          </div>
                        </div>
                      </div>
                      {{-- fin 表示順の入力 --}}


                    {{-- 画像選択 --}}
                    <x-select-image_create :images="$images" name="images" />
                    <x-input-error :messages="$errors->get('images')" class="mt-2" />
                      {{-- fin 画像選択 --}}

                    </div>


                    <div class="flex justify-around items-center p-2 w-full">
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
