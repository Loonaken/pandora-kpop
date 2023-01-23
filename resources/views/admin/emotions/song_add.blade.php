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
                    <div class=" w-2/3 max-w-2xl mx-auto border-2 border-lime-300 p-4 rounded-md focus:outline-none mb-4">
                      <div class="text-black text-center rounded text-xl  mb-2">タグ名: {{$emotion->name}}</div>
                      <div class="text-black text-center rounded text-xl ">表示順: {{$emotion->sort_order}}</div>
                    </div>


                      {{-- fin  気分タグの名前編集 --}}

                      {{-- 気分タグで使用されている曲一覧 --}}

                      <form method="POST" action="{{route('admin.emotions.song.store' , ['song' => $emotion->id ])}}" >
                        {{-- 上記の$periodはページの年代タグ --}}
                        @csrf
                        @method('put')

                      <div class="p-2 mb-2 w-full lg:w-2/3 mx-auto ">
                        <div class="relative">
                          <label for="emotion_id" class="leading-7 text-sm text-gray-600">曲の選択　(複数選択が可能です。)</label><br>
                          <select name="song_ids[]" multiple="multiple">
                            @foreach ($songs as $song)
                            <option class="py-2 pr-32 -ml-2 border-2" value="{{$song->id}}">
                              {{-- $songs 全ての曲の情報 --}}
                                {{$song->name}} | {{$song->emotion ? $song->emotion->name : '登録なし' }}
                              </option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      @if ($errors->any())
                      <div class="text-red-600 text-center text-bold" role="alert">
                          <ul>
                              @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                      @endif

                      {{-- fin 気分タグで使用されている曲一覧 --}}


                      <div class="flex justify-around items-center p-2 mt-12 w-full">
                        <x-original.return onclick="location.href='{{route('admin.emotions.index')}}'" />
                        <x-original.action action=追加 />
                    </div>
                  </form>

                {{-- fin contents --}}

              </div>
          </div>
      </div>
  </div>

</x-app-layout>
