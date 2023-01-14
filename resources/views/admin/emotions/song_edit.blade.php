<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
気分タグの<br>登録曲編集
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                {{-- Contents --}}
                <x-flash-message status="session('status')" />

                  <div class="my-4">
                    {{-- 気分タグの名前編集 --}}
                    <div class=" w-2/3 max-w-2xl mx-auto bg-pink-400 border-0 p-4 rounded-md focus:outline-none mb-4">
                    <div class="text-white text-center rounded text-lg mb-2">タグ名: {{$emotion->name}}</div>
                    <div class="text-white text-center rounded text-lg ">表示順: {{$emotion->sort_order}}</div>
                    </div>


                      {{-- fin  気分タグの名前編集 --}}

                      {{-- 気分タグで使用されている曲一覧 --}}

                      <form method="POST" action="{{route('admin.emotions.song.update' , ['song' => $emotion->id ])}}" >
                        @csrf
                        @method('put')
                      <div class="p-2 mb-2 w-full lg:w-2/3 mx-auto">
                        <div class="relative">
                          <label for="emotion_registered_song" class="leading-7 text-sm text-gray-600">曲の選択</label><br>
                          <select name="emotion_registered_song" multiple="multiple">
                            @foreach ($songs as $song)
                              <option value="{{$song->image->id}}">
                                {{$song->name}}
                              </option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </form>

                      {{-- fin 気分タグで使用されている曲一覧 --}}


                    </div>
                    <div class="flex p-2 w-full">
                        <button type="button" onclick="location.href='{{route('admin.emotions.show', ['emotion'=>$emotion->id])}}'" class="flex mx-auto text-black bg-gray-300 border-0 py-2 px-8 focus:outline-none hover:bg-gray-200 rounded text-lg">戻る</button>
                        <button type="submit" class="flex mx-auto text-black bg-green-300 border-0 py-2 px-8 focus:outline-none hover:bg-gray-200 rounded text-lg">更新</button>
                    </div>

                {{-- fin contents --}}

              </div>
          </div>
      </div>
  </div>

</x-app-layout>
