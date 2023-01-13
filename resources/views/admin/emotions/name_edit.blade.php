<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
気分タグの編集
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                {{-- Contents --}}
                <x-flash-message status="session('status')" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                <x-input-error :messages="$errors->get('sort_order')" class="mt-2" />
                <form method="POST" action="{{route('admin.emotion_name.update', ['emotion_name'=>$emotion->id ])}}" >
                  @csrf
                  @method('put')
                  <div class="my-4">
                    {{-- 気分タグの名前編集 --}}
                      <div class="p-2 mb-2 w-full lg:w-2/3 mx-auto">
                        <div class="relative flex ">
                          <div class="basis-3/4">
                          <label for="name" class=" ml-2 text-sm text-gray-600">気分タグ名</label>
                          <input type="text" id="name" name="name" value="{{$emotion->name}}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          </div>
                          <div class="basis-1/4">
                          <label for="name" class=" ml-2 text-sm text-gray-600">表示順</label>
                          <input type="text" id="sort_order" name="sort_order" value="{{$emotion->sort_order}}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          </div>
                        </div>
                      </div>

                      {{-- fin  気分タグの名前編集 --}}

                      {{-- 気分タグで使用されている曲一覧 --}}
                      <div class="flex flex-wrap">
                        @if(!empty($songs->toArray()))
                        @foreach ($songs as $song)
                            <div class="w-1/2 md:w-1/3 lg:w-1/4 p-4 ">
                              <div class=" rounded-md p-4">
                                <x-thumbnail :filename="$song->image->filename" type="songs" />
                                <div class="text-lg text-center border-x-2 border-b-2 text-gray-500">曲ID{{$song->id}}</div>
                                <div class="text-lg text-center border-x-2 border-b-2 text-gray-500">グループ名{{$song->group->name}}</div>
                                <div class="text-lg text-center border-x-2 border-b-2 text-gray-500">曲名{{$song->name}}</div>
                                <div class="text-lg text-center border-x-2 border-b-2 text-gray-500">#{{$song->emotion->name}}</div>
                                <div class="text-lg text-center border-x-2 border-b-2 text-gray-500">#{{$song->period->term}}</div>
                              </div>
                            </div>

                            @endforeach
                            @endif

                            @if(empty($songs->toArray()))
                            <div class="m-8 mx-auto ">
                            <p class="text-lg text-gray-400">このタグに登録されている曲は現在ありません。</p>
                            @endif


                  </div>
                      {{-- fin 気分タグで使用されている曲一覧 --}}


                    </div>
                    <div class="flex p-2 w-full">
                        <button type="button" onclick="location.href='{{route('admin.emotions.index')}}'" class="flex mx-auto text-black bg-gray-300 border-0 py-2 px-8 focus:outline-none hover:bg-gray-200 rounded text-lg">戻る</button>
                        <button type="submit" class="flex mx-auto text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg">更新</button>
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
