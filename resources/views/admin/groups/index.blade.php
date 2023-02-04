<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          グループ一覧
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                {{-- Group Column --}}
                <x-flash-message status="session('status')"  />
                <x-original.create onclick="location.href='{{route('admin.groups.create')}}'" />
                    <form method="get" action="{{route('admin.groups.index' )}}" >
                      {{-- @if ($request_type === null) --}}
                        <div class="flex justify-center mb-2 -mt-4">
                          {{-- 定数化した値をValueにそれぞれ当てはめている --}}
                          <input type="radio" name="type" value="{{\Constant::GROUP_LIST['male']}}" id="male">
                          <label for="male" class=" grow text-center border-2 py-3  border-orange-400 rounded  hover:bg-yellow-300/75 transition duration-300 ease-in-out cursor-pointer ">
                            男性アーティスト</label>
                          <input type="radio" name="type" value="0" id="all">
                          <label for="all" class=" grow text-center border-2 py-3  border-orange-400 rounded  hover:bg-yellow-300/75 transition duration-300 ease-in-out cursor-pointer ">
                            全て</label>
                          <input type="radio"  name="type" value="{{\Constant::GROUP_LIST['female']}}" id="female">
                          <label for="female" class="grow text-center border-2 py-3  border-orange-400 rounded hover:bg-yellow-300/75 transition duration-300 ease-in-out cursor-pointer ">
                            女性アーティスト</label>


                    {{-- @elseif($request_type === 1)
                      <div class="flex justify-center  mb-2">
                        <input type="radio" name="type" value="{{\Constant::GROUP_LIST['male']}}" id="male">
                        <label for="male" class="bg-blue-300 grow text-center border-2 py-3 transition duration-300 ease-in-out cursor-pointer ">
                          男性アーティスト</label>
                        <input type="radio" name="type" value="{{\Constant::GROUP_LIST['female']}}" id="female">
                        <label for="female" class="grow text-center border-2 py-3  border-orange-400 rounded hover:bg-yellow-300/75 transition duration-300 ease-in-out cursor-pointer ">
                          女性アーティスト</label>
                      </div>


                    @elseif($request_type === 2)
                        <div class="flex justify-center  mb-2">
                          <input type="radio" name="type" value="{{\Constant::GROUP_LIST['male']}}" id="male">
                          <label for="male" class="grow text-center border-2 py-3  border-orange-400 rounded  hover:bg-yellow-300/75 transition duration-300 ease-in-out cursor-pointer ">
                            男性アーティスト</label>
                          <input type="radio" name="type" value="{{\Constant::GROUP_LIST['female']}}" id="female">
                          <label for="female" class="bg-blue-300 grow text-center border-2 py-3  border-orange-400 rounded hover:bg-yellow-300/75 transition duration-300 ease-in-out cursor-pointer ">
                            女性アーティスト</label>
                        </div>
                        @endif --}}
                      </form>


                  </div>
                  <div class="flex flex-wrap justify-around sm:gap-y-4 md:gap-x-4">
                  @foreach ($groups as $group)
                        <div class=" w-2/3 md:w-1/4 lg:w-1/5 border-2 border-lime-300 p-4 rounded-md focus:outline-none mb-4">
                          <div class="text-black text-center rounded text-lg mb-4">グループ名:{{$group->name}}</div>
                            <div class="flex flex-col  ">
                              {{-- 登録曲一覧ボタン --}}
                              <a class="text-black mb-2 hover:border-cyan-400 border-2 py-2 px-4 focus:outline-none border-white-400 rounded transition duration-300 ease-in-out cursor-pointer  text-lg  " href="{{route('admin.groups.show', ['group'=>$group->id])}}">
                                <div class="flex justify-center">
                                  <p class="mr-1">曲</p>
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                  </svg>
                                </div>
                              </a>
                              {{-- fin 登録曲一覧ボタン --}}
                              {{--  タイトル編集ボタン --}}
                              <a class="text-black hover:border-cyan-400  border-2 py-3  border-white-400 p-2 focus:outline-none  rounded text-lg  " href="{{route('admin.groups.edit' , ['group'=>$group->id] )}}">
                                <div class="flex justify-center">
                                  <p class="mr-1">グループ情報</p>
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                  </svg>
                                </div>
                              </a>
                              {{--  fin タイトル編集ボタン --}}
                            </div>
                          </div>
                          @endforeach
                        </div>
                  </div>
              {{-- End_Group Column --}}
              </div>
          </div>
      </div>
  </div>

{{-- Javascriptを初めて0から実装した！ --}}
  <script>

    const selectAll = document.getElementById('all')
    selectAll.addEventListener('click' , function(){
      this.form.submit();

    })

    const selectMale = document.getElementById('male')
    selectMale.addEventListener('click' , function(){
      this.form.submit();

    })

    const selectFemale = document.getElementById('female')
    selectFemale.addEventListener('click' , function(){
      this.form.submit();

    })


  </script>
</x-app-layout>
