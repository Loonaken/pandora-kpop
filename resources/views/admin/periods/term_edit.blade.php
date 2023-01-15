<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
年代タグの編集
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                {{-- Contents --}}
                <x-flash-message status="session('status')" />
                <x-input-error :messages="$errors->get('term')" class="mt-2" />
                <x-input-error :messages="$errors->get('sort_order')" class="mt-2" />
                <form method="POST" action="{{route('admin.periods.term.update', ['term'=>$period->id ])}}" >
                  @csrf
                  @method('put')
                    {{-- 年代タグの編集 --}}
                      <div class="p-2 mb-2 w-full lg:w-2/3 mx-auto">
                        <div class="relative flex ">
                          <div class="basis-3/4">
                          <label for="term" class=" ml-2 text-sm text-gray-600">年代タグ</label>
                          <input type="text" id="term" name="term" value="{{$period->term}}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          </div>
                          <div class="basis-1/4">
                          <label for="sort_order" class=" ml-2 text-sm text-gray-600">表示順</label>
                          <input type="text" id="sort_order" name="sort_order" value="{{$period->sort_order}}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          </div>
                        </div>

                      {{-- fin  年代タグの編集 --}}

                      {{-- 気分タグで使用されている曲一覧 --}}
                      <div class="p-2 my-4 w-full lg:w-3/4 mx-auto bg-blue-300/25">
                        <p class="text-center underline tracker-wider underline-offset-4 text-lg ">登録曲一覧</p>
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
                  </div>
                      {{-- fin 気分タグで使用されている曲一覧 --}}
                    </div>
                    <div class="flex p-2 w-full">
                        <button type="button" onclick="location.href='{{route('admin.periods.index')}}'" class="flex mx-auto text-black bg-gray-300 border-0 py-2 px-8 focus:outline-none hover:bg-gray-200 rounded text-lg">戻る</button>
                        <button type="submit" class="flex mx-auto text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg">更新</button>
                    </div>
                </form>



                {{-- fin contents --}}

              </div>
          </div>
      </div>
  </div>

</x-app-layout>
