<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
グループの編集
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                {{-- Contents --}}
                <x-flash-message status="session('status')" />
                <form method="POST" action="{{route('admin.groups.update', ['group'=>$group->id ])}}" >
                  @csrf
                  @method('put')
                  <div class="my-4">
                    {{-- グループ名の入力 --}}
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                      <div class="p-2 mb-2 w-full lg:w-2/3 mx-auto">
                        <div class="relative">
                          <label for="name" class="leading-7 text-sm text-gray-600">グループ名 *必須</label>
                          <input type="text" id="name" name="name" value="{{$group->name}}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                      </div>
                      {{-- fin グループ名の入力 --}}

                      {{-- グループ情報の入力 --}}
                    <x-input-error :messages="$errors->get('information')" class="mt-2" />
                      <div class="p-2 mb-2 w-full lg:w-2/3 mx-auto">
                        <div class="relative">
                          <label for="information" class="leading-7 text-sm text-gray-600">グループについて</label>
                          <textarea id="information" name="information" rows="3" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{$group->information}}</textarea>
                        </div>
                      </div>
                      {{-- fin グループ情報の入力 --}}

                      <div class="flex mx-auto w-full lg:w-2/3 mb-6 ">
                        {{-- Typeの入力 --}}
                        <div class="p-2 mb-2  ">
                        <x-input-error :messages="$errors->get('type')" class="mt-2" />
                          <div class="relative ">
                            <div>
                              <label for="type" class="leading-7 text-sm text-gray-600">アーティスト属性</label>
                            </div>
                            <div>
                              <select name="type">
                                <option value="{{\Constant::GROUP_LIST['male']}}"
                                {{-- アーティスト属性を示す"type = 1" は男性アーティストを指し、
                                "type = 1"を定数に置き換えた結果 "option value = 1" ではなく、
                                <option value="{{\Constant::GROUP_LIST['male']}}"となっている --}}
                                  @if ($group->type == \Constant::GROUP_LIST['male']) selected @endif>
                                  1, 男性アーティスト
                                </option>
                                <option value="{{\Constant::GROUP_LIST['female']}}"
                                {{-- 女性アーティストも上記と同様に定数化し、
                                "type = 2"ではなく、<option value="{{\Constant::GROUP_LIST['female']}}" --}}
                                  @if ($group->type == \Constant::GROUP_LIST['female']) selected @endif>
                                  2, 女性アーティスト
                                </option>
                              </select>
                            </div>
                          </div>
                        </div>
                      {{-- fin Typeの入力 --}}

                      {{-- 表示順の入力 --}}
                        {{-- <div class="p-2 mb-2  mx-auto">
                        <x-input-error :messages="$errors->get('sort_order')" class="mt-2" />
                          <div class="relative">
                            <div>
                            <label for="sort_order" class="leading-7 text-sm text-gray-600">表示順</label>
                            </div>
                            <div>
                            <input type="text" placeholder="1 or 2" id="sort_order" name="sort_order" value="{{$group->sort_order}}" class="bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                          </div>
                        </div> --}}
                        {{-- fin 表示順の入力 --}}
                      </div>


                      {{-- 画像選択 --}}
                      <x-original.select-image_edit :images="$images" currentId="{{$group->image_id}}" currentImage="{{$group->image->filename}}" name="images" />
                        {{-- currentIdの値はマイグレーションファイルのカラム名であり、
                        currentImageの値はモデルのメソッド名である --}}
                      <x-input-error :messages="$errors->get('images')" class="mt-2" />
                      {{-- fin 画像選択 --}}

                    </div>
                    <div class="flex justify-around items-center p-2 w-full">
                      <x-original.return onclick="location.href='{{route('admin.groups.index')}}'" />
                      <x-original.action action=更新 />
                  </div>
                </form>

                <form id="delete_{{$group->id}}" method="post" action="{{route('admin.groups.group.destroy', ['group'=>$group->id])}}">
                  @csrf
                  @method('delete')
                  <div class="flex justify-center mt-16 p-4 w-full">
                  <a href="#" data-id="{{$group->id}}" onclick="deletePost(this)"  class="text-black bg-white border-4 transition duration-300 ease-in-out border-red-300 hover:bg-red-200/80 py-2 px-8 focus:outline-none  rounded text-lg mb-2 mx-2" >削除</a>
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

    function deletePost(e) {
  'use strict';
  if (confirm('本当に削除してもいいですか?')) {
  document.getElementById('delete_' + e.dataset.id).submit();
  }
  }

  </script>

</x-app-layout>
