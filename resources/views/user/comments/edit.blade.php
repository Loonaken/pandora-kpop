<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        コメント編集
      </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto px-2 lg:px-4">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="py-6 text-gray-900">

              {{-- content --}}
              <div class="p-2 mb-2 w-full lg:w-2/3 mx-auto">
              <form method="POST" action="{{route('user.comments.update', ['comment'=>$comment->id])}}" >
                @csrf
                @method('put')
                <div class="my-4">

                  {{-- titleの入力 --}}
                  <x-input-error :messages="$errors->get('title')" class="mt-2" />
                      <div class="relative px-6">
                        <label for="title" class="leading-7 text-sm text-gray-600">タイトル *必須</label>
                        <input type="text"  id="title" name="title" value="{{$comment->title}}"  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        <small class="text-red-500">最大20字</small>
                      </div>
                    </div>
                    {{-- fin titleの入力 --}}

                    {{-- 内容の入力 --}}
                  <x-input-error :messages="$errors->get('body')" class="mt-2" />
                    <div class="p-2 mb-2 w-full lg:w-2/3 mx-auto">
                      <div class="relative px-6">
                        <label for="body" class="leading-7 text-sm text-gray-600">内容 *必須</label>
                        <textarea id="body" name="body" rows="3"   class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{$comment->body}}</textarea>
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

              @can('delete', $comment)
              <form id="delete_{{$comment->id}}" method="post" action="{{route('user.comments.destroy', ['comment'=>$comment->id])}}">
                  @csrf
                  @method('delete')
                  <div class="flex justify-center p-2">
                  <button data-id="{{$comment->id}}" onclick="deletePost(this)"  class="text-black bg-white border-4 transition duration-300 ease-in-out border-red-300 hover:bg-red-200/80 py-2 px-4 focus:outline-none  rounded text-lg mb-2 mx-2" >削除</button>
                </div>
              </form>
              @endcan

              {{-- fin content --}}

            </div>
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
